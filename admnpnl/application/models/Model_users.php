<?php

class Model_users extends CI_Model {
    /* function MAdmins(){
      parent::Model();
      } */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->library("session");
    }

    function verifyUser($u, $pw) {
        //Active record 
        $this->db->select('id,username,password,department');
        $this->db->where('username', $u);
        //$this->db->where('password', md5($pw));
        //$this->db->where('password', $pw);
        //$this->db->where('expiryDate > ', $today_date);
        $this->db->where('status', '1');
        $this->db->limit(1);
        $Q = $this->db->get('ms_admins');
        $row = $Q->row_array();
        //print_r($row); die();
        $this->session->set_userdata('lastquery', $this->db->last_query());
        $storedPwd = $row['password'];
        //echo '<pre>';
        //print_r($storedPwd); die();
        if ($Q->num_rows() > 0 && password_verify($pw, $storedPwd)) {
            $data = array('login_attempts' => 0);
            $this->db->where('username', $u);
            $this->db->update('ms_admins', $data);
            return $row;
        } else {
            $login_attempts = $this->db->where('username', $u)->get('ms_admins')->row()->login_attempts;
            if ($login_attempts > 1) {
                $data = array('status' => '0');
                $this->db->where('username', $u);
                $this->db->update('ms_admins', $data);
                $this->session->set_flashdata('error', 'Your account is locked!');
                return array();
            } else {
                $this->db->where('username', $u);
                $this->db->set('login_attempts', ($login_attempts + 1));
                //$this->db->set('login_attempts', ($login_attempts + 1), FALSE);
                $this->db->update('ms_admins');
                $this->session->set_flashdata('error', 'Sorry, try again!');
                return array();
            }
        }
    }

    function getExpiryDate($user, $givenPwd) {

        //Active record 
        $this->db->select('id,password,expiryDate');
        $this->db->where('username', $user);
        //$this->db->where('password', md5($pw));
        //$this->db->where('password', $givenPwd);
        //$this->db->where('expiryDate > ', $today_date);
        $this->db->where('status', '1');
        $this->db->limit(1);
        $Q = $this->db->get('ms_admins');
        $row = $Q->result_array();
        if (!empty($row)) {
            //print_r($row); 
            $this->session->set_userdata('lastquery', $this->db->last_query());
            $storedPwd = $row[0]['password'];
            //echo '<pre>';
            //print_r($storedPwd); die();
            if ($Q->num_rows() > 0 && password_verify($givenPwd, $storedPwd)) {
                return $row;
            } else {
                $login_attempts = $this->db->where('username', $user)->get('ms_admins')->row()->login_attempts;
                if ($login_attempts > 1) {
                    $data = array('status' => '0');
                    $this->db->where('username', $user);
                    $this->db->update('ms_admins', $data);
                    $this->session->set_flashdata('error', 'Your account is locked !');
                    redirect(base_url(), 'refresh');
                    return array();
                } else {
                    $this->db->where('username', $user);
                    $this->db->set('login_attempts', ($login_attempts + 1));
                    //$this->db->set('login_attempts', ($login_attempts + 1), FALSE);
                    $this->db->update('ms_admins');
                    $this->session->set_flashdata('error', 'Incorrect Password !');
                    redirect('welcome/index', 'refresh');
                    return array();
                }
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid Username / Password / Account is Locked !');
            redirect(base_url(), 'refresh');
        }
    }

    function getUser($id) {
        $data = array();
        $options = array('id' => $id);
        $Q = $this->db->get_where('ms_admins', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }

        $Q->free_result();
        return $data;
    }

    function getAllUsers() {
        $data = array();
        $Q = $this->db->get('ms_admins');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function getOtherUser($otherUser) {
        if ($otherUser !== 'batayan') {
            $sql = "SELECT * FROM ms_admins where username= '$otherUser'";
        } else {
            $sql = "SELECT * FROM ms_admins";
        }
        $runQuery = $this->db->query($sql);
        return $runQuery->result_array();
    }

    function addUser() {
        $newExpiryDate = date('Y-m-d', strtotime("+60 days"));
        $datechanged = date('Y-m-d');
        $newPasswd = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars($this->input->post('password', true)));
        $pwd = password_hash($newPasswd, PASSWORD_BCRYPT);
        $data = array(
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'status' => $_POST['status'],
            'password' => $pwd,
            'department' => $_POST['department'],
            'jbdvcode' => $_POST['jbdvcode'],
            'user_group' => $_POST['user_group'],
            'login_attempts' => 0,
            'lastChanged' => $datechanged,
            'expiryDate' => $newExpiryDate,
            'otp' => 0
        );

        $this->db->insert('ms_admins', $data);
    }

    function addLog() {
        $data = array(
            'session_id' => $_SESSION['sessionid'],
            'username' => $_SESSION['username'],
            'department' => $_SESSION['department'],
            'login' => date('Y-m-d h:i:s')
        );
        //print_r($data); die();
        $this->db->insert('userlog', $data);
    }

    public function logout($date) {
        $this->db->where('session_id', $_SESSION['sessionid']);
        $this->db->update('userlog', $date);
    }

    function updateUser() {
        $newExpiryDate = date('Y-m-d', strtotime("+60 days"));
        $datechanged = date('Y-m-d');
        $newPasswd = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars($this->input->post('password', true)));
        $pwd = password_hash($newPasswd, PASSWORD_BCRYPT);
        $data = array(
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'status' => $_POST['status'],
            'password' => $pwd,
            'department' => $_POST['department'],
            'jbdvcode' => $_POST['jbdvcode'],
            'user_group' => $_POST['user_group'],
            'login_attempts' => 0,
            'lastChanged' => $datechanged,
            'expiryDate' => $newExpiryDate,
            'otp' => 0
        );
        $this->db->where('id', $_POST['id']);
        $this->db->update('ms_admins', $data);
    }

    function deleteUser($id) {
        $data = array('status' => '0');
        $this->db->where('id', $id);
        $this->db->update('ms_admins', $data);
    }

    //check validity of email addie!
    function insertCode($mail) {
        $insertCode = rand(999999, 111111);
        $data = array(
            'verificationCode' => $insertCode
        );
        $this->db->where('email', $mail);
        $this->db->update('ms_admins', $data);
    }

    function pwdReset() {
        $newExpiryDate = date('Y-m-d', strtotime("+60 days"));
        $datechanged = date('Y-m-d');
        $newPassword = password_hash($_POST['newPwd'], PASSWORD_BCRYPT);
        $data = array(
            'password' => $newPassword,
            'expiryDate' => $newExpiryDate,
            'lastChanged' => $datechanged,
            'status' => '1',
            'login_attempts' => 0,
            'otp' => 0
        );
        //echo '<pre>';
        //print_r($data); die();
        $this->db->where('id', $_POST['id']);
        $this->db->update('ms_admins', $data);
    }

    function otpVerify($otp) {
        $this->db->select('*');
        $this->db->where('otp', $otp);
        //$this->db->where('status', '1');
        $this->db->limit(1);
        $Q = $this->db->get('ms_admins');
        $row = $Q->result_array();
        return $row;
    }

    function getOfficeCodes() {
        $data[0] = '--select first--';
        //$this->db->where('status', 'Active');
        //$Q = $this->db->get('mainmenu');
        $query = "select jbdvcode, concat('Divisional Office-',dvname) as dvname from jbl_division union select office_code, concat('HO Dept-',office_name) as dvname from jbl_ho_department";
        $runQuery = $this->db->query($query);
        //return $records->result_array();
        if ($runQuery->num_rows() > 0) {
            foreach ($runQuery->result_array() as $row) {
                $data[$row['jbdvcode']] = $row['dvname'];
            }
        }
        $runQuery->free_result();
        return $data;
    }

    function getOfficeNames() {
        $data[0] = '--select first--';
        //$this->db->where('status', 'Active');
        //$Q = $this->db->get('mainmenu');
        $query = "select jbdvcode, concat('Divisional Office-',dvname) as dvname from jbl_division union select office_code, concat('HO Dept-',office_name) as dvname from jbl_ho_department";
        $runQuery = $this->db->query($query);
        //return $records->result_array();
        if ($runQuery->num_rows() > 0) {
            foreach ($runQuery->result_array() as $row) {
                $data[$row['dvname']] = $row['dvname'];
            }
        }
        $runQuery->free_result();
        return $data;
    }

}

?>