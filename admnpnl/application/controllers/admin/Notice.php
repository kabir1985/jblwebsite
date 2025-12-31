<?php
class Notice extends CI_Controller
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
        if ($_SESSION['username'] == 'batayan')
        {
            $data['main'] = 'vw_notice_home';
            $data['notice_all'] = $this->Model_notice->getAllNotice();
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

    function addNotice()
    {
        if ($this
            ->input
            ->post('title'))
        {
            $this->load->helper(array('form','url'));
            $this->load->library('form_validation');
          $data['categorized_page'] = $this->Model_pages->getCategorizedPages();
            $config = array(
                array(
                    'field' => 'title',
                    'label' => 'title',
                    'rules' => 'required'
                )
            );

            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == false)
            {
                $data['title'] = "Janata Bank PLC.";
                $data['categorized_page'] = $this->Model_pages->getCategorizedPages();
                if ($_SESSION['username'] == 'batayan')
                {
                    $data['main'] = 'vw_notice_add';
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
                $this->Model_notice->addNotice();
                $this->session->set_flashdata('message', 'Notice Added Successfully!');
                redirect('admin/Notice/index', 'refresh');
            }

        }
        else
        {
            $data['title'] = "Janata Bank PLC.";
            $data['categorized_page'] = $this->Model_pages->getCategorizedPages();
            if ($_SESSION['username'] == 'batayan')
            {
                $data['main'] = 'vw_notice_add';
                $data['notice_all'] = $this->Model_notice->getTopNotice();
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
        if ($this->input->post('id'))
        {
            $this->Model_notice->updateNotice();
            $this->session->set_flashdata('message', 'Notice Successfully Updated!');
            redirect('admin/Notice/index', 'refresh');
        }
        else
        {
            $data['title'] = "Janata Bank PLC.";
            $data['categorized_page'] = $this->Model_pages->getCategorizedPages();
            $data['mainMenu'] = $this->Model_pages->getMainMenusForEdit();
            if ($_SESSION['username'] == 'batayan')
            {
                $data['mainMenu'] = $this->Model_pages->getMainMenusForEdit();
                $data['main'] = 'vw_notice_edit';
                $data['notice'] = $this->Model_notice->getNotice($id);
                $data['notice_all'] = $this->Model_notice->getTopNotice();
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
        if ($_SESSION['username'] == 'batayan')
        {
            $notice_id = $this->uri->segment(4);
            $this->Model_notice->deleteNotice($id);
            $this->session->set_flashdata('message', 'Notice Successfully Deleted');
        }
        else
        {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Notice/index', 'refresh');
    }
} 
?>
