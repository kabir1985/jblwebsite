<?php
class Circular extends CI_Controller
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

        $this->tinyMce = '
		<!-- TinyMCE -->
		<script type="text/javascript" src="' . base_url() . 'includes/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript" src="' . base_url() . 'includes/js/my_tinymce.js"></script>
		<!-- /TinyMCE -->
		';
    }

    function index()
    {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'batayan')
        {
            $data['main'] = 'vw_circular_home';
            $data['circular_all'] = $this->Model_circular->getAllCircular();
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

    function addCircular()
    {

        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('circular_pdf_link', '', 'callback_file_check');

        if ($this->input->post('circular_title') && $this->input->post('circular_no') && $this->input->post('circular_type') && $this->input->post('circular_department') && $this->input->post('circular_date') && $this->input->post('circular_status'))
        {
            $config = array(
                array(
                    'field' => 'circular_title',
                    'label' => 'circular_title',
                    'rules' => 'required'
                ) ,
                array(
                    'field' => 'circular_no',
                    'label' => 'circular_no',
                    'rules' => 'required'
                ) ,
                array(
                    'field' => 'circular_type',
                    'label' => 'circular_type',
                    'rules' => 'required'
                ) ,

                array(
                    'field' => 'circular_department',
                    'label' => 'circular_department',
                    'rules' => 'required'
                ) ,
               
                array(
                    'field' => 'circular_date',
                    'label' => 'circular_date',
                    'rules' => 'required'
                ) ,
                      
                array(
                    'field' => 'circular_status',
                    'label' => 'circular_status',
                    'rules' => 'required'
                )

            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false)
            {              
                $data['title'] = "Janata Bank PLC.";
                if ($_SESSION['username'] == 'batayan')
                {
                    $data['main'] = 'vw_circular_add';
                }
                else
                {
                    $data['msg'] = 'You are not allowed to access this module';
                    $data['main'] = 'authorization_page';
                }
                $data['tinymce'] = $this->tinyMce;
                $data['varcss'] = 'admin_dashboard.css';
                $this->load->view('dashboard', $data);

            }
            else
            {
                $this->Model_circular->addCircular();
                $this->session->set_flashdata('message', 'Circular Added Successfully!');
                redirect('admin/Circular/index', 'refresh');
            }
        }
        else
        {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan')
            {
                $data['HoDept'] = $this->Model_circular->circularDept();
                $data['main'] = 'vw_circular_add';
                $data['circular_all'] = $this->Model_circular->getTopCircular();
            }
            else
            {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = $this->tinyMce;
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    
    public function file_check() {
        $allowed_mime_type_arr = array('application/msword', 'application/pdf');
        if (!empty($_FILES['circular_pdf_link']['name'])) {

            $mime = get_mime_by_extension($_FILES['circular_pdf_link']['name']);
            if (isset($_FILES['circular_pdf_link']['name']) && $_FILES['circular_pdf_link']['name'] != "") {
                if (in_array($mime, $allowed_mime_type_arr)) {
                    return true;
                } else {
                    //$this->form_validation->set_message('file_check', 'Please select only pdf/doc/docx/gif/jpg/png file.');
                    $this->session->set_flashdata('message', 'Please select only pdf/doc/docx file');
                    //return false;
                    redirect('admin/Circular/addCircular');
                }
            }
        } else {
            $this->session->set_flashdata('message', 'No File Choosen');
            redirect('admin/Circular/addCircular');
        }
    }
    
    
    function edit($circular_id = 0)
    {
        if ($this->input->post('circular_id'))
        {
            $this->Model_circular->updateCircular();
            $this->session->set_flashdata('message', 'Circular Updated Successfully');
            redirect('admin/Circular/index', 'refresh');
        }
        else
        {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan')
            {
                $data['type'] = $this->Model_circular->get_type();
                $data['publish'] = $this->Model_circular->get_pubstatus();
                $data['status'] = $this->Model_circular->get_status();
				$data['HoDept'] = $this->Model_circular->circularDept();
                $data['main'] = 'vw_circular_edit';
                $data['circular'] = $this->Model_circular->getCircular($circular_id);
                $data['circular_all'] = $this->Model_circular->getTopCircular();
            }
            else
            {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = $this->tinyMce;
            //$this->load->vars($data);
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    function delete($circular_id)
    {
        if ($_SESSION['username'] == 'batayan')
        {
            $circular_id = $this->uri->segment(4);
            $this->Model_circular->deleteCircular($circular_id);
            $this->session->set_flashdata('message', 'Circular Deleted Successfully');
        }
        else
        {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Circular/index', 'refresh');
    }

}
?>
