<?php

//echo $_SESSION['username'];
class Model_passportNOC extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getNoc($noc_id) {
        $data = array();
        $options = array('employee_id' => $noc_id);
        $Q = $this->db->get_where('passport_noc', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }
        // $Q->free_result();   
        return $data;
    }

    // updated on 28.08.2016 by wahed khan

    function getAllNoc() {

        $today = date("Y-m-d");
        $tday = strtotime($today);

        $six_month_day = 185 * 24 * 60 * 60;
        $data = array();

        if ($_SESSION['username'] == 'batayan') {
            $this->db->where('status', 'Active');
            $sql = $this->db->get('passport_noc');
            if ($sql->num_rows() > 0) {
                foreach ($sql->result_array() as $row) {
                    $data[] = $row;
                    $nocdate = $row['noc_date'];
                    $em_id = $row['employee_id'];
                    $ndate = strtotime($nocdate);

                    $sub_time = $tday - $ndate;

                    if ($sub_time > $six_month_day) {
                        $info = array(
                            'status' => 'Inactive',
                            'validate_status' => 'Issue Date of NOC Expired!'
                        );
                        $this->db->where('employee_id', $em_id);
                        $this->db->where('status', 'Active');
                        $this->db->update('passport_noc', $info);
                    }
                }
            }
            $this->db->where('status', 'Active');
            $Q = $this->db->get('passport_noc');
            return $Q->result_array();
        } else {
            $data = array();
            $this->db->where('upload_by', $_SESSION['username']);
            $sql = $this->db->get('passport_noc');
            if ($sql->num_rows() > 0) {
                foreach ($sql->result_array() as $row) {
                    $data[] = $row;
                    $nocdate = $row['noc_date'];
                    $em_id = $row['employee_id'];
                    $ndate = strtotime($nocdate);
                    $sub_time = $tday - $ndate;
                    if ($sub_time > $six_month_day) {
                        $info = array(
                            'status' => 'Inactive',
                            'validate_status' => 'Issue Date of NOC Expired!'
                        );
                        $this->db->where('employee_id', $em_id);
                        $this->db->where('status', 'Active');
                        $this->db->update('passport_noc', $info);
                    }
                }
            }

            $this->db->where('upload_by', $_SESSION['username']);
            $this->db->where('status', 'Active');
            $Q = $this->db->get('passport_noc');
            return $Q->result_array();
        }

        //$Q->free_result();  
        return $data;
    }

    function getTopNoc() {
        $data[0] = 'root';
        $Q = $this->db->get('passport_noc');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[$row['employee_id']] = $row['employee_name'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function addNoc() {
        $ext_file = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        $customFileName = "noc_" . $_POST['fileNoPrefix'] . "_" . $_POST['employeefile'] . '.' . $ext_file;
        $file_tmp = $_FILES['myfile']['tmp_name'];
        //local pc file location
        //$file_loc = $_SERVER['DOCUMENT_ROOT'] . '/jb.com.bd-New_Server/assets/file/noc/';
        //live server file save location
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/noc/';
        $posting = htmlspecialchars($_POST['employeeposting']);

        $data = array(
            //'employee_name' =>  preg_replace('/[^A-Za-z0-9\-]/', '', $_POST['employeename']),
            'employee_name' => htmlspecialchars($_POST['employeename']),
            'employee_desig' => $_POST['employeedesig'],
            'employee_file' => htmlspecialchars($_POST['fileNoPrefix'] . "-" . $_POST['employeefile']),
            'employee_father_name' => htmlspecialchars($_POST['employeefathername']),
            'employee_posting_place' => $posting,
            'employee_curr_pass' => htmlspecialchars($_POST['employeecurrpass']),
            'noc_date' => $_POST['nocdate'],
            'upload_date' => $_POST['uploaddate'],
            // 'employee_noc_file' => $_POST['employee_noc_file'],
            'upload_by' => $_POST['upload_by'],
            'status' => $_POST['status'],
            'employee_noc_file' => $customFileName
        );
        //echo '<pre>';
        //print_r($data); die();
        move_uploaded_file($file_tmp, $file_loc . $customFileName);

        $this->db->insert('passport_noc', $data);
    }

    /*     * check duplicate file no  */

    function checkDuplicateFileNo() {
        $employee_file = $_POST['fileNoPrefix'] . "-" . $_POST['employeefile'];
        $sql = "SELECT  employee_file FROM passport_noc WHERE status=? AND employee_file = ?";
        $Q = $this->db->query($sql, array('Active', $employee_file));
        return $Q->num_rows();
    }

    /*     * check duplicate file no  */

    function updateNoc() {
        $ext_file = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        $customFileName = "noc_" . $_POST['fileNoPrefix'] . "_" . $_POST['employeefile'] . "-update" . '.' . $ext_file;
        $file_tmp = $_FILES['myfile']['tmp_name'];
        //local pc file location
        //$file_loc = $_SERVER['DOCUMENT_ROOT'] . '/jb.com.bd-New_Server/assets/file/noc/';
        //live server file save location
        $file_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/file/noc/';
        $posting = htmlspecialchars($_POST['employeeposting']);

        if (is_uploaded_file($_FILES['myfile']['tmp_name'])) {
            $data = array(
                'employee_name' => htmlspecialchars($_POST['employeename']),
                'employee_desig' => $_POST['employeedesig'],
                'employee_file' => htmlspecialchars($_POST['fileNoPrefix'] . "-" . $_POST['employeefile']),
                'employee_father_name' => htmlspecialchars($_POST['employeefathername']),
                'employee_posting_place' => $posting,
                'employee_curr_pass' => htmlspecialchars($_POST['employeecurrpass']),
                'noc_date' => $_POST['nocdate'],
                'upload_date' => $_POST['uploaddate'],
                // 'employee_noc_file' => $_POST['employee_noc_file'],
                'upload_by' => $_POST['upload_by'],
                'status' => $_POST['status'],
                'employee_noc_file' => $customFileName
            );
        } else {
            $data = array(
                'employee_name' => htmlspecialchars($_POST['employeename']),
                'employee_desig' => $_POST['employeedesig'],
                'employee_file' => htmlspecialchars($_POST['fileNoPrefix'] . "-" . $_POST['employeefile']),
                'employee_father_name' => htmlspecialchars($_POST['employeefathername']),
                'employee_posting_place' => $posting,
                'employee_curr_pass' => htmlspecialchars($_POST['employeecurrpass']),
                'noc_date' => $_POST['nocdate'],
                'upload_date' => $_POST['uploaddate'],
                //'employee_noc_file' => $_POST['employee_noc_file'],
                'upload_by' => $_POST['upload_by'],
                'status' => $_POST['status']
            );
        }

        move_uploaded_file($file_tmp, $file_loc . $customFileName);

        $this->db->where('employee_id', $_POST['employee_id']);
        $this->db->update('passport_noc', $data);
    }

    function deleteNoc($employee_id) {
        $data = array('status' => 'Inactive');
        $this->db->where('employee_id', $employee_id);
        $this->db->update('passport_noc', $data);
    }

    /////////////
    function add_link_file($my_file, $customFileName) {
        if ($_FILES[$my_file]) {
            $config['upload_path'] = '../assets/file/noc/';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size'] = '0';
            $config['remove_spaces'] = true;
            $config['overwrite'] = false;
            $config['max_width'] = '0';
            $config['max_height'] = '0';
            $config['file_name'] = $customFileName;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($my_file)) {

                return 'No File Name';
            }
            $U = $this->upload->data();

            if ($U['file_name']) {
                return $U;
            } else
                return 'No File Name';
        }
    }

/////////////


    function getDesignation() {
        $query = $this->db->query("SELECT DISTINCT designation FROM designation WHERE designation <> 'null' ");
        return $query->result();
        /* $sql = "SELECT DISTINCT designation FROM `designation` WHERE designation <> 'null' ";
          $query = $this->db->query($sql);
          // if($query->num_rows>0){
          // 	return $query->result_array();
          //  }

          if ($query->num_rows > 0) {
          $designation[''] = '--Select Designation--';
          foreach ($query->result_array() as $row) {
          $designation[$row['designation']] = $row['designation'];
          }
          //print_r($designation); die();
          }

          $query->free_result();
          return $designation; */
    }

    function getFileNoPrefix() {
        $query = $this->db->query("SELECT DISTINCT fileNoPrefix FROM designation ORDER BY fileNoPrefix ASC ");
        return $query->result();
        /* $sql = "SELECT DISTINCT fileNoPrefix FROM `designation` ORDER BY fileNoPrefix ASC ";
          $query = $this->db->query($sql);

          // if($query->num_rows>0){
          // 	return $query->result_array();
          //  }

          if ($query->num_rows > 0) {
          $getFileNoPrefix[''] = '--Select File no prefix--';
          foreach ($query->result_array() as $row) {
          $getFileNoPrefix[$row['fileNoPrefix']] = $row['fileNoPrefix'];
          }
          }

          $query->free_result();
          return $getFileNoPrefix; */
    }

    function getAllBranches($userName) {
        $query = $this->db->query("select jbdvcode from ms_admins where username='" . $userName . "' ");
        $data = array();
        $data['alloffice'] = $query->result_array();
        $officeCode = $data['alloffice'][0]['jbdvcode'];
        if ($officeCode == 9025 || $officeCode == 9016 || $officeCode == 9032 || $officeCode == 9017  ) {
            $sql = "(SELECT  `ho_division_name` as officeName FROM jbl_ho_secrateriate order by ho_division_name asc)
					UNION
						(SELECT  `ho_division_name` as officeName FROM jbl_ho_divisions WHERE `ho_division_code` != '8018' order by ho_division_name asc)
                        UNION 
                        (SELECT `office_name` as officeName FROM jbl_ho_department WHERE `office_code` != '9042' AND `office_code` != '9990' AND `office_code` != '9991' order by office_name asc)
                        UNION 
                        (SELECT CONCAT(`dvname`,', Div. Office- ',jbdvcode) FROM jbl_division WHERE `jbdvcode`!='7011' AND `jbdvcode`!='7014' order by dvname asc)
                        UNION	
                        (SELECT CONCAT(`znname`,', Area Office- ',zncode) FROM `jbl_all_area` WHERE `zncode`!='5001' AND `zncode`!='5004' ORDER by `znname` ASC)
                        UNION
						(SELECT  `office_name` as officeName FROM jbplc_staff_college order by office_name asc)
                        UNION
                        (SELECT CONCAT(branchname, ' BRANCH- ',brcode) FROM jbl_branches WHERE `id` != '1541' order by brcode ASC)
						UNION
						(SELECT name FROM subsidiary_company)";
        } else {
            $sql = "
                        (SELECT jbdvcode, CONCAT('Divisional Office - ',`dvname`) AS officeName FROM  `jbl_division` WHERE jbdvcode = " . $officeCode . " GROUP BY officeName ASC)
                        UNION
                        (SELECT dvcode, CONCAT('Area Office - ',`znname`) AS OfficeName2 FROM `jbl_all_area` WHERE dvcode = " . $officeCode . " AND jbl_all_area.officestatus ='AO' GROUP BY OfficeName2 ASC)
                        UNION
                        (SELECT jbdvcode, branchname FROM jbl_branches WHERE jbdvcode = " . $officeCode . " GROUP BY branchname ASC)";

            $sql = "(SELECT CONCAT('Divisional Office - ',`dvname`) AS officeName FROM jbl_division  WHERE jbdvcode = " . $officeCode . " order by dvname asc)
                         UNION 
                        (SELECT CONCAT('Area Office - ',`znname`) AS OfficeName2 FROM jbl_all_area WHERE dvcode = " . $officeCode . " AND jbl_all_area.officestatus ='AO' order by znname asc)
                         UNION
                        (SELECT CONCAT(branchname,' BRANCH') FROM jbl_branches  WHERE jbdvcode = " . $officeCode . " order by branchname)";
        }
        $query = $this->db->query($sql);
        return $query->result();

        /* if ($query->num_rows > 0) {
          $branch[''] = '--Select Branch Name--';
          foreach ($query->result_array() as $row) {
          $branch[$row['officeName']] = $row['officeName'];
          }
          } else {
          $branch[0] = 'No Branch Found';
          }
          return $branch; */
    }
}
