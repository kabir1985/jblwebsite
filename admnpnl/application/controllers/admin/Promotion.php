<?php
class Promotion extends CI_Controller
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
        if($_SESSION['username']=='jbhrd' || $_SESSION['username'] == 'batayan'){
        
            $data['main'] = 'vw_promotion_home';
            $this->load->model('Model_promotion');
            $data['promotion_all'] = $this->Model_promotion->getAllPromotion();
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

    function addPromotion()
    {
        if ($this->input->post('title'))
        {
            $this->load->helper(array('form','url'));
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'title',
                    'label' => 'title',
                    'rules' => 'required'
                ) ,
                array(
                    'field' => 'prfrom',
                    'label' => 'prfrom',
                    'rules' => 'required'
                ) ,
                array(
                    'field' => 'prto',
                    'label' => 'prto',
                    'rules' => 'required'
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false || (isset($_FILES['path']['error']) && $_FILES['path']['error'] != 0))
            {
                $data['title'] = "Janata Bank PLC.";
                if($_SESSION['username']=='jbhrd' || $_SESSION['username'] == 'batayan'){
                
                    $data['main'] = 'vw_promotion_add';
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
                $this->Model_promotion->addPromotion();
                $this->session->set_flashdata('message', 'Promotion Added Successfully!');
                redirect('admin/Promotion/index', 'refresh');
            }
        }
        else
        {
            $data['title'] = "Janata Bank PLC.";
            if($_SESSION['username']=='jbhrd' || $_SESSION['username'] == 'batayan'){           
                $data['main'] = 'vw_promotion_add';
                $data['notice_all'] = $this->Model_promotion->getTopPromotion();
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

    function edit($pid = 0)
    {
        if ($this->input->post('id'))
        {
            $this->Model_promotion->updatePromotion();
            $this->session->set_flashdata('message', 'Promotion Successfully Updated!');
            redirect('admin/Promotion/index', 'refresh');
        }
        else
        {
            $data['title'] = "Janata Bank PLC.";
           if($_SESSION['username']=='jbhrd' || $_SESSION['username'] == 'batayan'){          
                $data['main'] = 'vw_promotion_edit';
                $data['promotion'] = $this->Model_promotion->getPromotion($pid);
                //$data['promotion_all'] = $this->Model_promotion->getTopPromotion();
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

    function delete($id)
    {
         if($_SESSION['username']=='jbhrd' || $_SESSION['username'] == 'batayan'){       
            $id = $this->uri->segment(4);
            $this->Model_promotion->deletePromotion($id);
            $this->session->set_flashdata('message', 'Promotion Successfully Deleted');
        }
        else
        {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Promotion/index', 'refresh');
    }
}
?>
