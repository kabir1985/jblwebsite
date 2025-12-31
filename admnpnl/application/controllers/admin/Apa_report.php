<?php

class Apa_report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        //session_start();
        /* if ($_SESSION['userid'] < 1)
          {
          redirect('welcome/index', 'refresh');

          } */
        $this->tinyMce = '
		<!-- TinyMCE -->
		<script type="text/javascript" src="' . base_url() . 'includes/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript" src="' . base_url() . 'includes/js/my_tinymce.js"></script>
		<!-- /TinyMCE -->
		';
    }

    /* News report for APA dt: 07.09.2021 */

    function view_report() {
        $data['title'] = "Janata Bank PLC.";

        if (isset($_POST['submit']) && $_POST['submit'] == 'SUBMIT') {
            $frm_date = $_POST['frm_date'];
            $to_date = $_POST['to_date'];

            if ($_SESSION['username'] == 'jblmisd_apa' || $_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_apaReport.php';
                $data['apa_report_show'] = $this->Model_apaReport->get_apa_report_view($frm_date, $to_date);
                //echo '<pre>';
                //print_r($data['apa_report_show']);
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
        } else {
            if ($_SESSION['username'] == 'jblmisd_apa' || $_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_apaReport.php';
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    /* APA report user id and password change- 15.09.2021 */

    function admin_user() {
        $data['title'] = "Manage User";
        if ($_SESSION['username'] == 'jblmisd_apa' || $_SESSION['username'] == 'batayan') {
            $data['main'] = "vw_userApa_home";
            $data['admins_user'] = $this->Model_apaReport->getadminUser();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->vars($data);
        $this->load->view('dashboard');
    }

    function admin_user_edit() {
        $this->load->library('encrypt');
        $data['title'] = "Update User/ Password";
        if (isset($_POST['submit']) && $_POST['submit'] == 'Update') {
            if ($_SESSION['username'] == 'jblmisd_apa' || $_SESSION['username'] == 'batayan') {
                $this->Model_apaReport->updateadminUser();
                $this->session->set_flashdata('message', 'Updated Successfully!');
                redirect('admin/Apa_report/admin_user', 'refresh');
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }

            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->vars($data);
            $this->load->view('dashboard');
        } else {
            if ($_SESSION['username'] == 'jblmisd_apa' || $_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_userApa_edit';
                $data['admin'] = $this->Model_apaReport->getFixedUser();
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->vars($data);
            $this->load->view('dashboard');
        }
    }

// create pdf for APA Report: 03.01.2022

    function apa_report_pdf() {
        $frm_dt = "";
        $to_dt = "";

        if (isset($_REQUEST['frm_dt']) && isset($_REQUEST['to_dt'])) {
            $frm_dt = $_REQUEST['frm_dt'];
            $to_dt = $_REQUEST['to_dt'];
        }

        //$this->load->helper('mediatutorialpdf');
         $this->load->library('pdf');

        //fetch report details
        $data = array();
        $data['make_report'] = $this->Model_apaReport->show_apa_report_details($frm_dt, $to_dt);

        //Download PDF
        $pdf_filename = 'APA_REPORT_NULL.pdf';
        if (!empty($data['make_report'])) {
            if (isset($data['make_report'])) {
                $pdf_filename = 'JBL_APA_Report.pdf';
            }
        }
        $pdf_content = $this->load->view('vw_apaReport_print', $data, true);
        //generate_pdf($pdf_content, $pdf_filename, true);
        $this->dompdf->loadHtml($pdf_content);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream($pdf_filename);
        
    }

}

?>
