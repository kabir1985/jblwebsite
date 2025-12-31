<?php

class govtloan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //session_start();
        if ($_SESSION['userid'] < 1) {
            redirect('Welcome/index', 'refresh');
        }
        $this->tinyMce = '
		<!-- TinyMCE -->
		<script type="text/javascript" src="' . base_url() . 'includes/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript" src="' . base_url() . 'includes/js/my_tinymce.js"></script>
		<!-- /TinyMCE -->
		';
    }

    function index() {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'jblrcd1' || $_SESSION['username'] == 'batayan') {
            $data['main'] = 'vw_govtloan_home';
            $data['govtloan_all'] = $this->Model_govtloan->getAllGovtloan();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    // for house loan
    function govtloanhouse() {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'jblrcd1' || $_SESSION['username'] == 'batayan') {
            $data['main'] = 'vw_govtloan_house';
            $data['govtloan_house'] = $this->Model_govtloan->getHouseGovtloan();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    // for flat loan
    function govtloanflat() {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'jblrcd1' || $_SESSION['username'] == 'batayan') {
            $data['main'] = 'vw_govtloan_flat';
            $data['govtloan_flat'] = $this->Model_govtloan->getFlatGovtloan();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    // create pdf for applicant's details
    function download_success_pdf() {
        $this->load->library('Pdf');
        // $this->load->helper('mediatutorialpdf');
        $applicant_id = 0;
        if (isset($_REQUEST['applicant_id'])) {
            $applicant_id = $_REQUEST['applicant_id'];
        }
        $data = array();
        $data['applicant_details'] = $this->Model_govtloan->fetch_applicant_details($applicant_id);
        //print_r($data['applicant_details']); die();
        //Download PDF
        $pdf_filename = 'GEHBL_NULL.pdf';
        if (!empty($data['applicant_details'])) {
            if (isset($data['applicant_details']['nid'])) {
                $pdf_filename = 'JBL_GEHBL_' . $data['applicant_details']['nid'] . '.pdf';
            }
        }
        $pdf_content = $this->load->view('vw_govtloan_applicantWiseToPdf', $data, true);
        //$this->pdf->createPDF($pdf_content, $pdf_filename, true);
        $this->dompdf->loadHtml($pdf_content);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        //$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
        $this->dompdf->stream($pdf_filename);
    }

    // creat pdf for all applicants' list
    function download_success_pdf_all() {
        $this->load->library('pdf');
        //fetch all applicants' list
        $data = array();
        $data['applicant_all_list'] = $this->Model_govtloan->fetch_applicant_all_list();

        //Download PDF
        $pdf_filename = 'GEHBL_NULL.pdf';
        if (!empty($data['applicant_all_list'])) {
            if (isset($data['applicant_all_list'])) {
                $pdf_filename = 'JBL_GEHBL_ALL.pdf';
            }
        }
        $pdf_content = $this->load->view('vw_govtloan_allApplicantToPdf', $data, true);
        //$this->pdf->createPDF($pdf_content, $pdf_filename, true);
        $this->dompdf->loadHtml($pdf_content);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        //$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
        $this->dompdf->stream($pdf_filename);
    }

    // create pdf for house loan applicants' list
    function download_success_pdf_house() {
         $this->load->library('pdf');
        //fetch all applicants' list
        $data = array();
        $data['applicant_house_list'] = $this->Model_govtloan->fetch_applicant_house_list();
        //Download PDF
        $pdf_filename = 'GEHBL_NULL.pdf';
        if (!empty($data['applicant_house_list'])) {
            if (isset($data['applicant_house_list'])) {
                $pdf_filename = 'JBL_GEHBL_HOUSE_LOAN.pdf';
            }
        }
        $pdf_content = $this->load->view('vw_govtloan_houseLoanApplicantsToPdf', $data, true);
       //$this->pdf->createPDF($pdf_content, $pdf_filename, true);
        $this->dompdf->loadHtml($pdf_content);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        //$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
        $this->dompdf->stream($pdf_filename);
    }

    // create pdf for flat loan applicants' list
    function download_success_pdf_flat() {
        $this->load->library('pdf');
        //fetch all applicants' list
        $data = array();
        $data['applicant_flat_list'] = $this->Model_govtloan->fetch_applicant_flat_list();
        //Download PDF
        $pdf_filename = 'GEHBL_NULL.pdf';
        if (!empty($data['applicant_flat_list'])) {
            if (isset($data['applicant_flat_list'])) {
                $pdf_filename = 'JBL_GEHBL_FLAT_LOAN.pdf';
            }
        }
        $pdf_content = $this->load->view('vw_govtloan_flatLoanApplicantsToPdf', $data, true);
        //$this->pdf->createPDF($pdf_content, $pdf_filename, true);
        $this->dompdf->loadHtml($pdf_content);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        //$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
        $this->dompdf->stream($pdf_filename);
    }

    /* Govt. Loan Edit */

    function edit($loan_id = 0, $loan_type = 0) {
        if ($this->input->post('loan_id')) {
            $loan_type = $_POST['loan_type'];
            $this->session->set_flashdata('message', 'Loan Info. Updated');
            if ($loan_type == '1') {
                redirect('admin/Govtloan/govtloanhouse', 'refresh');
            } else {
                redirect('admin/Govtloan/govtloanflat', 'refresh');
            }
        } else {
            $data['title'] = "Edit Govt. Loan Info.";
            if ($_SESSION['username'] == 'jblrcd1' || $_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_govtloan_edit';
                $data['branches'] = $this->Model_govtloan->getBranchesGovtLoan();
                $data['loantype'] = $this->Model_govtloan->getLoanType();
                $data['loan'] = $this->Model_govtloan->getloaninfo($loan_id);
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = $this->tinyMce;
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    function delete($loan_id) {
        if ($_SESSION['username'] == 'jblrcd1' || $_SESSION['username'] == 'batayan') {
            $loan_id = $this->uri->segment(4); //couldnt understand this line
            $this->Model_govtloan->deleteLoan($loan_id);
            $this->session->set_flashdata('message', 'Loan Deleted Successfully!');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Govtloan/index', 'refresh');
    }

}

?>
