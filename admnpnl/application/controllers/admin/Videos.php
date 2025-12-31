<?php
class Videos extends CI_Controller
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
            $data['main'] = 'vw_videos_home';
            $data['video'] = $this->Model_videos->getAllVideos();
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
    function addVideos()
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
                ),
				array(
                    'field' => 'video_path',
                    'label' => 'video_path',
                    'rules' => 'required'
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false)
            {
                $data['title'] = "Janata Bank PLC.";
                if ($_SESSION['username'] == 'batayan')
                {
                    $data['main'] = 'vw_videos_add';
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
                $this->Model_videos->addVideo();
                $this->session->set_flashdata('message', 'Video Added Successfully!');
                redirect('admin/Videos/index', 'refresh');
            }

        }
        else
        {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan')
            {
                $data['main'] = 'vw_videos_add';
                $data['video'] = $this->Model_videos->getTopVideos();
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
            //$this->load->model('Mvideos');
            $this->Model_videos->updateVideo($id);
            $this->session->set_flashdata('message', 'Successfully Updated!');
            redirect('admin/Videos/index', 'refresh');
        }
        else
        {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan')
            {
                $data['main'] = 'vw_videos_edit';
                $data['video'] = $this->Model_videos->getVideo($id);             
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
            $this->Model_videos->deleteVideo($id);
            $this->session->set_flashdata('message', 'Video Deleted Successfully');
        }
        else
        {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Videos/index', 'refresh');
    }
}

