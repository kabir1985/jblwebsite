<?php

class Model_govtloan extends CI_Model{

	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

function getAllGovtloan(){
    $data = array();
	$Q="SELECT  
		loan_tbl.*,
		CONCAT(trim(branch_tbl.branchname),', ',trim(branch_tbl.thname),', ',trim(branch_tbl.dtname)) AS applied_branch,
		loan_type_tbl.loanTypeText,loan_type_tbl.loanTypeTextBang 
		FROM govt_loan AS loan_tbl 
		JOIN jbl_branches AS branch_tbl ON loan_tbl.brCode=branch_tbl.brcode
		JOIN loan_type AS loan_type_tbl ON loan_tbl.loanType=loan_type_tbl.loanTypeId ORDER BY id DESC";
		$Q= $this->db->query($Q);
	 if ($Q->num_rows() > 0)
	 {
       foreach ($Q->result_array() as $row)
	   {
         $data[] = $row;
       }
    }
    $Q->free_result();  
    return $data; 
 }
 
 
 // for house loan applicants
 
 function getHouseGovtloan(){
    $data = array();
	$Q="SELECT  
		loan_tbl.*,
		CONCAT(trim(branch_tbl.branchname),', ',trim(branch_tbl.thname),', ',trim(branch_tbl.dtname)) AS applied_branch,
		loan_type_tbl.loanTypeText,loan_type_tbl.loanTypeTextBang 
		FROM govt_loan AS loan_tbl 
		JOIN jbl_branches AS branch_tbl ON loan_tbl.brCode=branch_tbl.brcode
		JOIN loan_type AS loan_type_tbl ON loan_tbl.loanType=loan_type_tbl.loanTypeId WHERE loanType='1' ORDER BY id DESC";
		$Q= $this->db->query($Q);
	 if ($Q->num_rows() > 0)
	 {
       foreach ($Q->result_array() as $row)
	   {
         $data[] = $row;
       }
    }
    $Q->free_result();  
    return $data; 
 }
 
 // for flat loan applicants
 
 function getFlatGovtloan(){
    $data = array();
	$Q="SELECT  
		loan_tbl.*,
		CONCAT(trim(branch_tbl.branchname),', ',trim(branch_tbl.thname),', ',trim(branch_tbl.dtname)) AS applied_branch,
		loan_type_tbl.loanTypeText,loan_type_tbl.loanTypeTextBang 
		FROM govt_loan AS loan_tbl 
		JOIN jbl_branches AS branch_tbl ON loan_tbl.brCode=branch_tbl.brcode
		JOIN loan_type AS loan_type_tbl ON loan_tbl.loanType=loan_type_tbl.loanTypeId WHERE loanType='2' ORDER BY id DESC";
		$Q= $this->db->query($Q);
	 if ($Q->num_rows() > 0)
	 {
       foreach ($Q->result_array() as $row)
	   {
         $data[] = $row;
       }
    }
    $Q->free_result();  
    return $data; 
 }
 
 
 // for edit specific loan info.
 
 function getloaninfo($loan_id){
    $data = array();
    $options = array('id' => $loan_id);
    $Q = $this->db->get_where('govt_loan',$options,1);
    if ($Q->num_rows() > 0){
      $data = $Q->row_array();
    }

    $Q->free_result();    
    return $data;    
 }
 
 
 function getBranchesGovtLoan()
{		
	$sql="SELECT brcode, branchname FROM `jbl_branches` Order by `branchname` ASC";
	$query=$this->db->query($sql);
	
	if($query->num_rows > 0)
	{		
		//$data[''] = '--Select Branch Name--';
		foreach ($query->result_array() as $row)
		{
			$data[$row['brcode']] = $row['branchname'];
		}
	}

	$query->free_result();  
	//return $data;    
}


function getLoanType()
{		
	$sql="SELECT * FROM `loan_type` Order by `loanId` ASC";
	$query=$this->db->query($sql);
	
	if($query->num_rows > 0)
	{
		
		//$data[''] = '--Select Loan Type--';
		foreach ($query->result_array() as $row)
		{
			$data[$row['loanTypeId']] = $row['loanTypeText'];
		}
	}
	$query->free_result();  
	//return $data;    
}
 
 
 
 // print loan information
 
 function fetch_applicant_details($applicant_id=0)
 {
	 
	$return_data=array();
	if($applicant_id>0)
	{
		$tracksql= "SELECT  
		loan_tbl.*,
		CONCAT(trim(branch_tbl.branchname),', ',trim(branch_tbl.thname),', ',trim(branch_tbl.dtname)) AS applied_branch,
		loan_type_tbl.loanTypeText,loan_type_tbl.loanTypeTextBang 
		FROM govt_loan AS loan_tbl 
		JOIN jbl_branches AS branch_tbl ON loan_tbl.brCode=branch_tbl.brcode
		JOIN loan_type AS loan_type_tbl ON loan_tbl.loanType=loan_type_tbl.loanTypeId
		WHERE 
		loan_tbl.id='".$applicant_id."'";
		$query=$this->db->query($tracksql);
		//if($query->num_rows > 0)
		//{
		   $return_data= $query->row_array();
		//}
	}
	return $return_data; 
	 
 }
 
 // print all applicants' list
 function fetch_applicant_all_list()
 {
	$data = array();
	$Q="SELECT  
		loan_tbl.*,
		CONCAT(trim(branch_tbl.branchname),', ',trim(branch_tbl.thname),', ',trim(branch_tbl.dtname)) AS applied_branch,
		loan_type_tbl.loanTypeText,loan_type_tbl.loanTypeTextBang 
		FROM govt_loan AS loan_tbl 
		JOIN jbl_branches AS branch_tbl ON loan_tbl.brCode=branch_tbl.brcode
		JOIN loan_type AS loan_type_tbl ON loan_tbl.loanType=loan_type_tbl.loanTypeId ORDER BY id DESC";
		$Q= $this->db->query($Q);
	 if ($Q->num_rows() > 0)
	 {
       foreach ($Q->result_array() as $row)
	   {
         $data[] = $row;
       }
    }
    $Q->free_result();  
    return $data; 
	 
 }
 
 // print house loan applicants' list
 function fetch_applicant_house_list()
 {
	$data = array();
	$Q="SELECT  
		loan_tbl.*,
		CONCAT(trim(branch_tbl.branchname),', ',trim(branch_tbl.thname),', ',trim(branch_tbl.dtname)) AS applied_branch,
		loan_type_tbl.loanTypeText,loan_type_tbl.loanTypeTextBang 
		FROM govt_loan AS loan_tbl 
		JOIN jbl_branches AS branch_tbl ON loan_tbl.brCode=branch_tbl.brcode
		JOIN loan_type AS loan_type_tbl ON loan_tbl.loanType=loan_type_tbl.loanTypeId WHERE loanType='1' ORDER BY id DESC";
		$Q= $this->db->query($Q);
	 if ($Q->num_rows() > 0)
	 {
       foreach ($Q->result_array() as $row)
	   {
         $data[] = $row;
       }
    }
    $Q->free_result();  
    return $data; 
	 
 }
 
 // print flat loan applicants' list
 function fetch_applicant_flat_list()
 {
	$data = array();
	$Q="SELECT  
		loan_tbl.*,
		CONCAT(trim(branch_tbl.branchname),', ',trim(branch_tbl.thname),', ',trim(branch_tbl.dtname)) AS applied_branch,
		loan_type_tbl.loanTypeText,loan_type_tbl.loanTypeTextBang 
		FROM govt_loan AS loan_tbl 
		JOIN jbl_branches AS branch_tbl ON loan_tbl.brCode=branch_tbl.brcode
		JOIN loan_type AS loan_type_tbl ON loan_tbl.loanType=loan_type_tbl.loanTypeId WHERE loanType='2' ORDER BY id DESC";
		$Q= $this->db->query($Q);
	 if ($Q->num_rows() > 0)
	 {
       foreach ($Q->result_array() as $row)
	   {
         $data[] = $row;
       }
    }
    $Q->free_result();  
    return $data; 
	 
 }
 
 /* update loan info.*/
 function updateGovtLoan(){
	 
	 
	// track application edited date and time
	date_default_timezone_set('Asia/Dhaka');
	//$date_time = date('Y/m/d h:i:s a', time());
	$date_time= date("Y-m-d H:i:s");
	
	/*echo "<pre>";
	print_r($date_time);
	die();*/
	
	// tracking number update
	$tracking_id="JBL-".$_POST['brcode']."-".$_POST['loan_type']."-".$_POST['loan_id'];
	
	
	$data = array( 
		
		// loan information
		'brCode' => $_POST['brcode'],
		'trackNumber'=>$tracking_id,
		'loanType'=>$_POST['loan_type'],
		'loanAmount' => $_POST['loan_amount'],
		'loanPeriod' => $_POST['loan_period'],
		
		// personal information
		'applicantName' => $_POST['applicant_name'],
		'fatherName' => $_POST['father_name'],
		'motherName' => $_POST['mother_name'],
		'spouseName' => $_POST['spouse_name'],
		'dob' => $_POST['date_birth'],
		'gender' => $_POST['gender'],
		'presentAddress' => $_POST['pre_add'],
		'permanentAddress' => $_POST['per_add'],
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
		'applicationEditDateTime' => $date_time,
		'status' => $_POST['status']
		);
		
		/*echo "<pre>";
		print_r($data);
		die();*/
		
 	$this->db->where('id', $_POST['loan_id']);	
	$this->db->update('govt_loan', $data);
	}
	
	
	function deleteLoan($loan_id)
	{
		$data = array('status' => '0');
		$this->db->where('id', $loan_id);
		$this->db->update('govt_loan', $data);	
 	}


	
}

?>