<?php
class Atm extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();    
        //session_start();
        if ($_SESSION['userid'] < 1)
        {
            redirect('Welcome/index', 'refresh');
        }
    }
    function index()
    {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'jbcmd' || $_SESSION['username'] == 'batayan')
        {
            $data['atm'] = $this->Model_atm->getallATM();
            $data['main'] = "vw_atm_home";
        }
        else
        {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $this->load->vars($data);
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }
    function addATM()
    {
        $data['district'] = $this->Model_atm->get_district();
        $data['select_branch'] = $this->Model_atm->getSelectBranch();
        if ($this->input->post('branch_name'))
        {           
            $this->load->helper(array('form','url'));
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'branch_name',
                    'label' => 'branch_name',
                    'rules' => 'required'
                ) ,
                array(
                    'field' => 'address',
                    'label' => 'address',
                    'rules' => 'required'
                ) ,
                array(
                    'field' => 'district',
                    'label' => 'district',
                    'rules' => 'required'
                ) ,
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false)
            {
                $data['title'] = "Janata Bank PLC.";
                if ($_SESSION['username'] == 'jbcmd' || $_SESSION['username'] == 'batayan')
                {
                    $data['main'] = 'vw_atm_add';
                }
                else
                {
                    $data['msg'] = 'You are not allowed to access this module';
                    $data['main'] = 'authorization_page';
                }
                $data['tinymce'] = '';
                $data['varcss'] = 'admin_dashboard.css';
                $this->load->view('dashboard', $data);
            }
            else
            {
                $this->Model_atm->addATM();
                $this->session->set_flashdata('message', 'New ATM Successfully Added');
                redirect('admin/Atm/index', 'refresh');
            }
        }
        else
        {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'jbcmd' || $_SESSION['username'] == 'batayan')
            {
                $data['district'] = $this->Model_atm->get_district();
                $data['main'] = 'vw_atm_add';
            }
            else
            {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }
    function edit($id = 0)
    {
        $data['select_branch'] = $this->Model_atm->getSelectBranch();
        $data['select_address'] = $this->Model_atm->getSelectAddress();
        if ($this->input->post('id'))
        {
            $this->Model_atm->updateATM($id);
            $this->session->set_flashdata('message', 'ATM Updated Successfully');
            redirect('admin/Atm/index', 'refresh');
        }
        else
        {
            $data['title'] = 'Janata Bank PLC.';
            if ($_SESSION['username'] == 'jbcmd' || $_SESSION['username'] == 'batayan')
            {

                $data['district'] = $this->Model_atm->get_location();
                $data['upazila'] = $this->Model_atm->get_upazila();
                $data['status'] = $this->Model_atm->get_status();
                $data['main'] = 'vw_atm_edit';
                $data['atm'] = $this->Model_atm->getTopATM($id);
            }
            else
            {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $this->load->vars($data);
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }
    function delete($id)
    {
        if ($_SESSION['username'] == 'jbcmd' || $_SESSION['username'] == 'batayan')
        {
            $this->Model_atm->delete($id);
            $this->session->set_flashdata('message', 'ATM Deleted Successfully');
        }
        else
        {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Atm/index', 'refresh');
    }

    function branch_select_address()
    {
        $br_name = $this->input->post('branch');
        $sql = "SELECT address FROM `jbl_branches` where branchname='$br_name'";
        $records = $this->db->query($sql);
        $output = null;
        foreach ($records->result() as $row)
        {
            $output .= "<option value='" . $row->address . "'>" . $row->address . "</option>";
        }
        echo $output;       
    }

    public function buildDropUpazilas()
    {       
        $id_district = $this->input->post('id', true);     
        $upazilaData['upazilaDrop'] = $this->Model_atm->getUpazilaByDistrict($id_district);
        $output = null;
        $output .= "<option value=''>--select--</option>";
        foreach ($upazilaData['upazilaDrop'] as $row)
        {           
            $output .= "<option value='" . $row->upazila_name . "'>" . $row->upazila_name . "</option>";
        }
        echo $output;
    }

}

