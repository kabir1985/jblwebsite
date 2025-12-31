<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('menu_helper');
        $this->load->helper('breadcrumb_helper');
    }

    public function current_deposit() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('current_deposit');
        $data['image_details'] = $this->About_model->GetImageInfo('current_deposit');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('current_deposit');
        $data['product'] = $this->Product_model->productByGroup('Deposit', 'Current');
        $data['main_content'] = 'depositProduct_view';
        $this->load->view('template/common_template', $data);
    }

    public function savings_deposit() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('savings_deposit');
        $data['image_details'] = $this->About_model->GetImageInfo('savings_deposit');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('savings_deposit');
        $data['product'] = $this->Product_model->productByGroup('Deposit', 'Savings');
        $data['main_content'] = 'depositProduct_view';
        $this->load->view('template/common_template', $data);
    }

    public function special_notice_deposit() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('special_notice_deposit');
        $data['image_details'] = $this->About_model->GetImageInfo('special_notice_deposit');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('special_notice_deposit');
        $data['product'] = $this->Product_model->productByGroup('Deposit', 'Short Term');
        $data['main_content'] = 'depositProduct_view';
        $this->load->view('template/common_template', $data);
    }

    public function term_deposit() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('term_deposit');
        $data['image_details'] = $this->About_model->GetImageInfo('term_deposit');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('term_deposit');
        $data['product'] = $this->Product_model->productByGroup('Deposit', 'Term');
        $data['main_content'] = 'depositProduct_view';
        $this->load->view('template/common_template', $data);
    }

    public function scheme_deposit() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('scheme_deposit');
        $data['image_details'] = $this->About_model->GetImageInfo('scheme_deposit');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('scheme_deposit');
        $data['product'] = $this->Product_model->productByGroup('Deposit', 'Scheme');
        $data['main_content'] = 'depositProduct_view';
        $this->load->view('template/common_template', $data);
    }
	
	// New generation double benifit scheme (updated on 06.01.2025)
	public function ngdbs() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('ngdbs');
        $data['image_details'] = $this->About_model->GetImageInfo('ngdbs');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('ngdbs');
        $data['product'] = $this->Product_model->productByGroup('Deposit', 'Double Benefit');
        $data['main_content'] = 'depositProduct_view';
        $this->load->view('template/common_template', $data);
    }

    public function agriculture_loans() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('agriculture_loans');
        $data['image_details'] = $this->About_model->GetImageInfo('agriculture_loans');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('agriculture_loans');
        $data['product'] = $this->Product_model->productByGroup('Loans& Adv.', 'Agriculture Loan Program');
        $data['main_content'] = 'loanProduct_view';
        $this->load->view('template/common_template', $data);
    }

    public function working_capital_loan() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('working_capital_loan');
        $data['image_details'] = $this->About_model->GetImageInfo('working_capital_loan');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('working_capital_loan');
        $data['product'] = $this->Product_model->productByGroup('Loans& Adv.', 'Working Capital Loan');
        $data['main_content'] = 'loanProduct_view';
        $this->load->view('template/common_template', $data);
    }

    public function green_financing() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('green_financing');
        $data['image_details'] = $this->About_model->GetImageInfo('green_financing');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('green_financing');
        $data['product'] = $this->Product_model->productByGroup('Loans& Adv.', 'Green Financing');
        $data['main_content'] = 'loanProduct_view';
        $this->load->view('template/common_template', $data);
    }

    public function rural_credit() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('rural_credit');
        $data['image_details'] = $this->About_model->GetImageInfo('rural_credit');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('rural_credit');
        $data['product'] = $this->Product_model->productByGroup('Loans& Adv.', 'Rural Credit');
        $data['main_content'] = 'loanProduct_view';
        $this->load->view('template/common_template', $data);
    }

    public function tannery_trading() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('tannery_trading');
        $data['image_details'] = $this->About_model->GetImageInfo('tannery_trading');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('tannery_trading');
        $data['product'] = $this->Product_model->productByGroup('Loans& Adv.', 'Tannery');
        $data['main_content'] = 'loanProduct_view';
        $this->load->view('template/common_template', $data);
    }

    public function real_estate_loan() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('real_estate_loan');
        $data['image_details'] = $this->About_model->GetImageInfo('real_estate_loan');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('real_estate_loan');
        $data['product'] = $this->Product_model->productByGroup('Loans& Adv.', 'Real Estate');
        $data['main_content'] = 'loanProduct_view';
        $this->load->view('template/common_template', $data);
    }

    public function house_building_apartment() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('house_building_apartment');
        $data['image_details'] = $this->About_model->GetImageInfo('house_building_apartment');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('house_building_apartment');
        $data['product'] = $this->Product_model->productByGroup('Loans& Adv.', 'House Building');
        $data['main_content'] = 'loanProduct_view';
        $this->load->view('template/common_template', $data);
    }

    public function consumer_financing() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('consumer_financing');
        $data['image_details'] = $this->About_model->GetImageInfo('consumer_financing');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('consumer_financing');
        $data['product'] = $this->Product_model->productByGroup('Loans& Adv.', 'Consumer Financing');
        $data['main_content'] = 'loanProduct_view';
        $this->load->view('template/common_template', $data);
    }

    public function education_loan() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('education_loan');
        $data['image_details'] = $this->About_model->GetImageInfo('education_loan');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('education_loan');
        $data['product'] = $this->Product_model->productByGroup('Loans& Adv.', 'education_loan');
        $data['main_content'] = 'loanProduct_view';
        $this->load->view('template/common_template', $data);
    }

    public function health_service() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('health_service');
        $data['image_details'] = $this->About_model->GetImageInfo('health_service');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('health_service');
        $data['product'] = $this->Product_model->productByGroup('Loans& Adv.', 'health_service');
        $data['main_content'] = 'loanProduct_view';
        $this->load->view('template/common_template', $data);
    }

    public function pensioner_loan() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('pensioner_loan');
        $data['image_details'] = $this->About_model->GetImageInfo('pensioner_loan');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('pensioner_loan');
        $data['product'] = $this->Product_model->productByGroup('Loans& Adv.', 'pensioner_loan');
        $data['main_content'] = 'loanProduct_view';
        $this->load->view('template/common_template', $data);
    }

    public function specialized_loan() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('specialized_loan');
        $data['image_details'] = $this->About_model->GetImageInfo('specialized_loan');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('specialized_loan');
        $data['product'] = $this->Product_model->productByGroup('Loans& Adv.', 'Specialized Loan');
        $data['main_content'] = 'loanProduct_view';
        $this->load->view('template/common_template', $data);
    }

    public function govt_loan() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('govt_loan');
        //echo '<pre>';
       // print_r($data['page_details']); die();
        $data['image_details'] = $this->About_model->GetImageInfo('govt_loan');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('govt_loan');
        $data['main_content'] = 'govtLoan_view';
        $this->load->view('template/common_template', $data);
    }

    public function online_application_govt_loan() {
        if (isset($_POST['submit']) && $_POST['submit'] == 'Submit Application') {
            $check_loan_amount_value = $_POST['loan_period'];
            if ($check_loan_amount_value <= 240) {
                $this->load->helper(array('form', 'url'));
                $this->load->library('form_validation');
                $config = array(
                    array(
                        'field' => 'brcode',
                        'label' => 'Branch Name',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'loan_type',
                        'label' => 'Loan Type',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'loan_amount',
                        'label' => 'Loan Amount',
                        'rules' => 'required|numeric'
                    ),
                    array(
                        'field' => 'loan_period',
                        'label' => 'Loan Period',
                        'rules' => 'required|numeric'
                    ),
                    array(
                        'field' => 'applicant_name',
                        'label' => 'Applicant Name',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'father_name',
                        'label' => 'Father Name',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'mother_name',
                        'label' => 'Mother Name',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'birth_date',
                        'label' => 'Date of Birth',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'sex',
                        'label' => 'Gender',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'present_address',
                        'label' => 'Present Address',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'permanent_address',
                        'label' => 'Permanent Address',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'mobile_number',
                        'label' => 'Mobile Number',
                        'rules' => 'required|is_unique[govt_loan.mobileNumber]|numeric'
                    ),
                    array(
                        'field' => 'nid',
                        'label' => 'NID',
                        'rules' => 'required|is_unique[govt_loan.nid]|numeric'
                    ),
                    array(
                        'field' => 'tin',
                        'label' => 'TIN',
                        'rules' => 'required|is_unique[govt_loan.tin]|numeric'
                    ),
                    array(
                        'field' => 'office_name',
                        'label' => 'Office Name',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'office_address',
                        'label' => 'Office Address',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'department',
                        'label' => 'Department',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'curr_desig',
                        'label' => 'Current Designation',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'dt_join_curr_desig',
                        'label' => 'Joining Date at Current Designation',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'tnt_office',
                        'label' => 'Office TNT',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'dt_join',
                        'label' => 'Joining Date',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'dt_rtd',
                        'label' => 'Retirement Date',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'gpf',
                        'label' => 'GPF Number',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'basic',
                        'label' => 'Basic Salary',
                        'rules' => 'required|numeric'
                    )
                );
                $this->form_validation->set_rules($config);
                if ($this->form_validation->run() == false) {
                    $data['title'] = "Janata Bank PLC.";
                    $data['page_details'] = $this->About_model->GetPageInformation('govt_loan');
                    $data['image_details'] = $this->About_model->GetImageInfo('online_application_govt_loan');
                    $data['document_details'] = $this->About_model->GetPageDocumentInfo('online_application_govt_loan');
                    $data['branches'] = $this->Product_model->getBranchesGovtLoan();
                    $data['loantype'] = $this->Product_model->getLoanType();
                    $data['main_content'] = 'govtLoanApplication_view';
                    $this->load->view('template/common_template', $data);
                } else {
                    $data['title'] = "Janata Bank PLC.";
                    $data['applicant_details_info'] = $this->Product_model->addgovtLoan();
                    $data['specific_forms'] = $this->Product_model->fetch_specific_forms($_POST['loan_type']);
                    $data['page_details'] = $this->About_model->GetPageInformation('govt_loan');
                    $data['main_content'] = 'online_application_form_successful';
                    $this->load->view('template/common_template', $data);
                }
            } else {
                $data['title'] = "Janata Bank PLC.";
                $data['page_details'] = $this->About_model->GetPageInformation('govt_loan');
                $data['image_details'] = $this->About_model->GetImageInfo('online_application_govt_loan');
                $data['document_details'] = $this->About_model->GetPageDocumentInfo('online_application_govt_loan');
                $data['branches'] = $this->Product_model->getBranchesGovtLoan();
                $data['loantype'] = $this->Product_model->getLoanType();
                $data['error_mssg'] = "Loan Period cann't greater than 240 Installment!";
                $data['main_content'] = 'govtLoanApplication_view';
                $this->load->view('template/common_template', $data);
            }
        } else {
            $data['title'] = "Janata Bank PLC.";
            $data['page_details'] = $this->About_model->GetPageInformation('govt_loan');
            $data['image_details'] = $this->About_model->GetImageInfo('online_application_govt_loan');
            $data['document_details'] = $this->About_model->GetPageDocumentInfo('online_application_govt_loan');
            $data['branches'] = $this->Product_model->getBranchesGovtLoan();
            $data['loantype'] = $this->Product_model->getLoanType();
            $data['main_content'] = 'govtLoanApplication_view';
            $this->load->view('template/common_template', $data);
        }
    }

    public function tracking_number_search() {
        if (isset($_POST['submit']) && $_POST['submit'] == 'Search Tracking Number') {
            $search_mobile = $_POST['mobile_number'];
            $search_nid = $_POST['nid'];

            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'mobile_number',
                    'label' => 'Mobile Number',
                    'rules' => 'required|numeric'
                ),
                array(
                    'field' => 'nid',
                    'label' => 'NID Number',
                    'rules' => 'required|numeric'
                )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false) {
                $data['title'] = "Janata Bank PLC.";
                $data['page_details'] = $this->About_model->GetPageInformation('govt_loan');
                $data['image_details'] = $this->About_model->GetImageInfo('online_application_govt_loan');
                $data['document_details'] = $this->About_model->GetPageDocumentInfo('online_application_govt_loan');
                $data['main_content'] = 'tracking_number_search_result';
                $this->load->view('template/common_template', $data);
            } else {
                $data['title'] = "Janata Bank PLC.";
                $data['search_result'] = $this->Product_model->search_result_tracking_number($search_mobile, $search_nid);
                $data['page_details'] = $this->About_model->GetPageInformation('govt_loan');
                $data['main_content'] = 'tracking_number_search_result';
                $this->load->view('template/common_template', $data);
            }
        } else {
            $data['title'] = "Janata Bank PLC.";
            $data['page_details'] = $this->About_model->GetPageInformation('govt_loan');
            $data['image_details'] = $this->About_model->GetImageInfo('online_application_govt_loan');
            $data['document_details'] = $this->About_model->GetPageDocumentInfo('online_application_govt_loan');
            $data['main_content'] = 'tracking_number_search_result';
            $this->load->view('template/common_template', $data);
        }
    }

    public function download_success_pdf() {
        $applicant_id = 0;
        if (isset($_GET['applicant_id'])) {
            $applicant_id = $_GET['applicant_id'];
        }

        //$this->load->helper('mediatutorialpdf');
         $this->load->library('Pdf');
         //$this->load->library('DOMPDF');

        //fetch applicant details
        $data = array();
        $data['applicant_details'] = $this->Product_model->fetch_applicant_details($applicant_id);

        //Download PDF
        $pdf_filename = 'GEHBL_NULL.pdf';
        if (!empty($data['applicant_details'])) {
            if (isset($data['applicant_details']['nid'])) {
                $pdf_filename = 'JBL_GEHBL_' . $data['applicant_details']['nid'] . '.pdf';
            }
        }
        $pdf_content = $this->load->view('online_application_form_successful_print', $data, true);
        //generate_pdf($pdf_content, $pdf_filename, true);
        $this->dompdf->loadHtml($pdf_content);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        //$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
        $this->dompdf->stream($pdf_filename);
    }

    public function edit_application() {
        $data['page_details'] = $this->About_model->GetPageInformation('edit_application');
        $data['image_details'] = $this->About_model->GetImageInfo('edit_application');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('edit_application');
        $loan_id = $this->input->post('trk');
        //print_r($loan_id);
        $password = $this->input->post('password');
        //print_r($password);
        $id = $this->input->post('loan_id');
        //print_r($id); die();
        if ($id) {
            $data['title'] = "Janata Bank PLC.";
            $this->Product_model->updateGovtLoan($id);
            $data['applicant_details_info'] = $this->Product_model->getLoanInfoByid($id);
            $data['specific_forms'] = $this->Product_model->fetch_specific_forms($_POST['loan_type']);
            $data['main_content'] = 'online_application_form_successful';
            $this->load->view('template/common_template', $data);
        } else {
            $data['title'] = "Janata Bank PLC.";
            $data['loan'] = $this->Product_model->getLoanInfo($loan_id, $password);
            $data['main_content'] = 'online_application_form_edit';
            $data['branches'] = $this->Product_model->getBranchesGovtLoan();
            $data['loantype'] = $this->Product_model->getLoanType();
            $this->load->view('template/common_template', $data);
        }
    }
    
    public function credit_card(){
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('credit_card');
        $data['image_details'] = $this->About_model->GetImageInfo('credit_card');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('credit_card');
        $data['product'] = $this->Product_model->productByGroup('Loans& Adv.', 'credit_card');
        $data['main_content'] = 'loanProduct_view';
        $this->load->view('template/common_template', $data);
    }
    
    public function rate_of_interest(){
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('rate_of_interest');
        $data['image_details'] = $this->About_model->GetImageInfo('rate_of_interest');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('rate_of_interest');
        $data['main_content'] = 'textFile_view';
        $this->load->view('template/common_template', $data);
    }
    
      public function personal_loan() {
        $data['title'] = "Janata Bank PLC.";
        $data['page_details'] = $this->About_model->GetPageInformation('personal_loan');
        $data['image_details'] = $this->About_model->GetImageInfo('personal_loan');
        $data['document_details'] = $this->About_model->GetPageDocumentInfo('personal_loan');
        $data['product'] = $this->Product_model->productByGroup('Loans& Adv.', 'personal_loan');
        $data['main_content'] = 'loanProduct_view';
        $this->load->view('template/common_template', $data);
    }
    
    
    public function product_report_pdf(){
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(195,10,'Product Details',1,1,'C');
		$pdf->Cell(15,10,'Sl.No',1,0,'C');
		$pdf->Cell(65,10,'Tracking',1,0,'C');
		$pdf->Cell(60,10,'Name',1,0,'C');
		$pdf->Cell(55,10,'Address',1,1,'C');
		$data = $this->Product_model->view_product();
		$slno = 1;
		foreach($data as $d){
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(15,10,$slno,1,0,'C');
			$pdf->Cell(65,10, $d->trackNumber,1,0,'C');
			$pdf->Cell(60,10, $d->applicantName,1,0,'C');
			$pdf->Cell(55,10, $d->presentAddress,1,1,'C');
			$slno = $slno+1;
		}
		$curdate = date('d-m-Y His');
		$pdf->Output('product_report'.$curdate.'.pdf', 'I');
		
	}

}
