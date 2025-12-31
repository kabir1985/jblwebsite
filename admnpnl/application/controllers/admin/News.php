<?php
class News extends CI_Controller
{  
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        //session_start();
        if ($_SESSION['userid'] < 1)
        {
            redirect('Welcome/index', 'refresh');
        }
    }

    function index()
    {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'jbprd' || $_SESSION['username'] == 'batayan')
        {
            $data['main'] = 'vw_news_home';
            $data['news_all'] = $this->Model_news->getAllNews();
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

    function addNews()
    {
        if ($this->input->post('news_title'))
        {
            $this->load->helper(array('form','url'));
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'news_title',
                    'label' => 'news_title',
                    'rules' => 'required'
                ) ,

                array(
                    'field' => 'news_date',
                    'label' => 'news_date',
                    'rules' => 'required'
                ) ,
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false)
            {
                $data['title'] = "Janata Bank PLC.";
                if ($_SESSION['username'] == 'jbprd' || $_SESSION['username'] == 'batayan')
                {
                    $data['main'] = 'vw_news_add';
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
                $this->Model_news->addNews();
                $this->session->set_flashdata('message', 'News Added Successfully!');
                redirect('admin/News', 'refresh');
            }

        }
        else
        {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'jbprd' || $_SESSION['username'] == 'batayan')
            {
                $data['main'] = 'vw_news_add';
                $data['news_all'] = $this->Model_news->getTopNews();
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

    function edit($news_id = 0)
    {
        if ($this->input->post('news_id'))
        {
            $this->Model_news->updateNews();
            $this->session->set_flashdata('message', 'News Updated Successfully');
            redirect('admin/News/index', 'refresh');
        }
        else
        {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'jbprd' || $_SESSION['username'] == 'batayan')
            {

                $data['main'] = 'vw_news_edit';
                $data['news'] = $this->Model_news->getNews($news_id);
                //$data['news_all'] = $this->Model_news->getTopNews();
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
        if ($_SESSION['username'] == 'jbprd' || $_SESSION['username'] == 'batayan')
        {
            $this->Model_news->deleteNews($id);
            $this->session ->set_flashdata('message', 'Deleted/Deactivated Successfully');
        }
        else
        {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/News/index', 'refresh');
    }

    function approve($id)
    {
        $news_id = $this->uri->segment(4);
        $this->Model_news->approveNews($news_id);
        $this->session->set_flashdata('message', 'Approved');
        redirect('admin/News/news_approval/', 'refresh');
    }

    function news_approval()
    {

        $data['title'] = "News";
        if ($_SESSION['username'] == 'jbprd2' || $_SESSION['username'] == 'batayan')
        {
            $data['main'] = 'vw_news_approval';
            $data['news_all'] = $this->Model_news->getNews_notapproved();
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

    function approval($news_id = 0)
    {
        if ($this->input->post('news_id'))
        {
            $this->Model_news->updateNews_approval();
            $this->session->set_flashdata('message', 'News Updated');
            redirect('admin/News/news_approval', 'refresh');
        }
        else
        {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] != 'jbprd2')
            {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            else
            {
                $data['main'] = 'vw_news_edit_approval';
                $data['news'] = $this->Model_news->getNews($news_id);
                $data['news_all'] = $this->Model_news->getTopNews();
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

} 

?>
