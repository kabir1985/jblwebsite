<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function productByGroup($group, $type) {
        $sql = "select * from product where product_group='" . $group . "' and product_type ='" . $type . "' and product_status='Active'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getBranchesGovtLoan() {
        $sql = "SELECT brcode, branchname FROM jbl_branches Order by branchname ASC";
        $query = $this->db->query($sql);
        $data[''] = '--Select Branch Name--';
        foreach ($query->result_array() as $row) {
            $data[$row['brcode']] = $row['branchname'];
        }
        $query->free_result();
        return $data;
    }

    function getLoanType() {
        $sql = "SELECT * FROM loan_type Order by loanId ASC";
        $query = $this->db->query($sql);
        $data[''] = '--Select Loan Type--';
        foreach ($query->result_array() as $row) {
            $data[$row['loanTypeId']] = $row['loanTypeText'];
        }
        $query->free_result();
        return $data;
    }

    function addgovtLoan() {
        $return_date_array = array();
        $data_insert_array = array();
        if (isset($_POST) && !empty($_POST)) {

            //generate insert data arry
            $data_insert_array = array(
                // loan information
                'brCode' => $_POST['brcode'],
                'loanType' => $_POST['loan_type'],
                'loanAmount' => $_POST['loan_amount'],
                'loanPeriod' => $_POST['loan_period'],
                // personal infomation
                'applicantName' => $_POST['applicant_name'],
                'fatherName' => $_POST['father_name'],
                'motherName' => $_POST['mother_name'],
                'spouseName' => $_POST['spouse_name'],
                'dob' => $_POST['birth_date'],
                'gender' => $_POST['sex'],
                'presentAddress' => $_POST['present_address'],
                'permanentAddress' => $_POST['permanent_address'],
                'mobileNumber' => $_POST['mobile_number'],
                'tntRes' => $_POST['land_phone'],
                'email' => $_POST['email'],
                'nid' => $_POST['nid'],
                'tin' => $_POST['tin'],
                // job information
                'officeName' => $_POST['office_name'],
                'officeAddress' => $_POST['office_address'],
                'dept' => $_POST['department'],
                'designation' => $_POST['curr_desig'],
                'dtCurrDesig' => $_POST['dt_join_curr_desig'],
                'tntOffice' => $_POST['tnt_office'],
                'dtJob' => $_POST['dt_join'],
                'dtRtr' => $_POST['dt_rtd'],
                'gpf' => $_POST['gpf'],
                'officeId' => $_POST['office_id'],
                'designGrade' => $_POST['desig_grade'],
                'salaryScale' => $_POST['scale'],
                'basicPay' => $_POST['basic'],
                'grossPay' => $_POST['gross'],
                'takePay' => $_POST['take_home'],
                'applicationSubmitDateTime' => date("Y-m-d"),
                'status' => $_POST['loan_status'],
                'password' => $_POST['password']
            );

            //insert data
            $new_applicant_id = 0;
            if ($this->db->insert('govt_loan', $data_insert_array)) {
                $new_applicant_id = $this->db->insert_id();

                //generate tracking id
                $tracking_id = 0;
                if ($new_applicant_id > 0) {
                    $tracking_id = "JBL-" . $_POST['brcode'] . "-" . $_POST['loan_type'] . "-" . $new_applicant_id;
                    $data_insert_array = array('trackNumber' => $tracking_id);

                    // update the tracking number with reference to new applicant id
                    $this->db->where('id', $new_applicant_id);
                    $this->db->update('govt_loan', $data_insert_array);

                    //now fetch applicant deateils
                    $return_date_array = $this->fetch_applicant_details($new_applicant_id);
                }
            }
        }
        return $return_date_array;
    }

    function fetch_applicant_details($applicant_id = 0) {
        $return_data = array();
        if ($applicant_id > 0) {
            $tracksql = "SELECT  
		loan_tbl.*,
		CONCAT(trim(branch_tbl.branchname),', ',trim(branch_tbl.thname),', ',trim(branch_tbl.dtname)) AS applied_branch,
		loan_type_tbl.loanTypeText,loan_type_tbl.loanTypeTextBang 
		FROM govt_loan AS loan_tbl 
		JOIN jbl_branches AS branch_tbl ON loan_tbl.brCode=branch_tbl.brcode
		JOIN loan_type AS loan_type_tbl ON loan_tbl.loanType=loan_type_tbl.loanTypeId
		WHERE 
		loan_tbl.id='" . $applicant_id . "'";

            $query = $this->db->query($tracksql);
            $return_data = $query->row_array();
        }
        return $return_data;
    }

    function fetch_specific_forms($loan_type = 0) {
        $return_data = array();

        $id_condition_str = '';
        if ($loan_type == 1) {
            $id_condition_str = ' AND id IN (455,456,459,460)';
        }

        if ($loan_type == 2) {
            $id_condition_str = ' AND id IN (455,456,457,458)';
        }


        $tracksql = "SELECT  
	* FROM ms_files
	WHERE
	page_mainmenu=0
	AND
	name='govt_loan'  " . $id_condition_str . " ORDER BY id DESC";

        $query = $this->db->query($tracksql);

        foreach ($query->result_array() as $row) {
            $return_data[] = $row;
        }


        return $return_data;
    }

    function search_result_tracking_number($mobile_number = 0, $nid_number = 0) {
        $return_data = array();
        if ($mobile_number != "" && $nid_number != "") {
            $tracksql = "SELECT  
		loan_tbl.*,
		CONCAT(trim(branch_tbl.branchname),', ',trim(branch_tbl.thname),', ',trim(branch_tbl.dtname)) AS applied_branch,
		loan_type_tbl.loanTypeText,loan_type_tbl.loanTypeTextBang 
		FROM govt_loan AS loan_tbl 
		JOIN jbl_branches AS branch_tbl ON loan_tbl.brCode=branch_tbl.brcode
		JOIN loan_type AS loan_type_tbl ON loan_tbl.loanType=loan_type_tbl.loanTypeId
		WHERE 
		loan_tbl.mobileNumber='" . $mobile_number . "' AND loan_tbl.nid='" . $nid_number . "'";

            $query = $this->db->query($tracksql);
            $return_data = $query->row_array();
            //now fetch specific document details
            if (isset($return_data['loanType']) && $return_data['loanType'] > 0) {
                $return_data['related_docs'] = $this->fetch_specific_forms($return_data['loanType']);
            }
        }

        return $return_data;
    }

    function getLoanInfo($loan_id, $password) {
        $sql = "SELECT * from govt_loan where trackNumber='$loan_id' and password='$password'";
        $query = $this->db->query($sql);
        //if ($query->num_rows > 0) {
        if($query->num_rows()){
            return $query->row_array();
        } else {
            redirect(base_url('products/govt_loan'));
        }
        //} else {
            //redirect(base_url('products/govt_loan'));
        //}
    }

    function updateGovtLoan($id) {
        date_default_timezone_set('Asia/Dhaka');
        $date_time = date("Y-m-d H:i:s");
        $tracking_id = "JBL-" . $_POST['brcode'] . "-" . $_POST['loan_type'] . "-" . $_POST['loan_id'];
        $data = array(
            // loan information
            'id' => $_POST['loan_id'],
            'brCode' => $_POST['brcode'],
            'trackNumber' => $tracking_id,
            'loanType' => $_POST['loan_type'],
            'loanAmount' => $_POST['loan_amount'],
            'loanPeriod' => $_POST['loan_period'],
            // personal information
            'applicantName' => $_POST['applicant_name'],
            'fatherName' => $_POST['father_name'],
            'motherName' => $_POST['mother_name'],
            'spouseName' => $_POST['spouse_name'],
            'dob' => $_POST['date_birth'],
            'gender' => $_POST['gender'],
            'presentAddress' => $_POST['present_address'],
            'permanentAddress' => $_POST['permanent_address'],
            'mobileNumber' => $_POST['mobile_number'],
            'tntRes' => $_POST['tnt_res'],
            'email' => $_POST['email'],
            'nid' => $_POST['nid'],
            'tin' => $_POST['tin'],
            // job information
            'officeName' => $_POST['office_name'],
            'officeAddress' => $_POST['office_add'],
            'dept' => $_POST['dept'],
            'designation' => $_POST['desig'],
            'dtCurrDesig' => $_POST['date_curr_desig'],
            'tntOffice' => $_POST['office_tnt'],
            'dtJob' => $_POST['date_join'],
            'dtRtr' => $_POST['date_rtr'],
            'gpf' => $_POST['gpf'],
            'officeId' => $_POST['office_id'],
            'designGrade' => $_POST['desig_grade'],
            'salaryScale' => $_POST['salary_scale'],
            'basicPay' => $_POST['basic_pay'],
            'grossPay' => $_POST['gross_pay'],
            'takePay' => $_POST['take_pay'],
            'applicationEditDateTime' => $date_time
        );
        $this->db->where('id', $id);
        $this->db->update('govt_loan', $data);
    }

    function getLoanInfoByid($id) {
        $sql = "SELECT * from govt_loan where id='$id'";
        $query = $this->db->query($sql);
//             if($query->num_rows>0){
        return $query->row_array();
//             }
//             else{
//                 redirect(base_url('about_us/govt_loan'));
//             }
    }
    
    public function view_product(){
		$query = $this->db->query("SELECT * FROM govt_loan");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
		
	}

}
