<?php

class Model_apaReport extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    /* News report for APA dt: 07.09.2021 */

    function get_apa_report_view($frm_date, $to_date) {
        $data = array();

        // News
/*
        $q1 = "SELECT YEAR(`news_date`) AS Year,MONTHNAME(`news_date`) AS Month_Name,
		COUNT(*) AS Number_of_News_Uploaded
		FROM
		`news`
		WHERE
		`news_date` BETWEEN '" . $frm_date . "' AND '" . $to_date . "'
		GROUP BY YEAR(`news_date`), MONTHNAME(`news_date`)
		ORDER BY Year(`news_date`),FIELD(MONTHNAME(`news_date`),'January','February','March','April','May','June','July', 'August','September','October','November','December')";

        $Q = $this->db->query($q1);
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data['news'][] = $row;
            }
        }
*/
        // Notice

        $q2 = "SELECT YEAR(`expiry_date`)  AS Year,MONTHNAME(`expiry_date`) AS Month_Name,
  COUNT(*) AS Number_of_Notice_Uploaded
FROM
  `ms_files`
WHERE
  `expiry_date` BETWEEN '" . $frm_date . "' AND '" . $to_date . "'
GROUP BY YEAR(`expiry_date`), MONTHNAME(`expiry_date`)
ORDER BY Year(`expiry_date`),FIELD(MONTHNAME(`expiry_date`),'January','February','March','April','May','June','July', 'August','September','October','November','December')";

        $Q2 = $this->db->query($q2);
        if ($Q2->num_rows() > 0) {
            foreach ($Q2->result_array() as $row) {
                $data['notice'][] = $row;
            }
        }

        // Tender

        $q3 = "SELECT a.Year,
a.Month_Name,
a.Tender,
a.RFQ,
a.LTM,
a.OTM,

a.Tender+a.RFQ+a.LTM+a.OTM Total   from 
(
SELECT 
sum(case when (tender_type = 'Tender') then 1 else 0 END ) as Tender,
sum(case when (tender_type = 'RFQ') then 1 else 0  END )  as RFQ,
sum(case when (tender_type = 'LTM') then 1 else 0  END )  as LTM,
sum(case when (tender_type = 'OTM') then 1 else 0  END )  as OTM,

MONTHNAME(`tender_starting_date`) as Month_Name,
YEAR(`tender_starting_date`) as Year
FROM `tender` 
WHERE `tender_starting_date` BETWEEN '" . $frm_date . "' AND '" . $to_date . "'

GROUP BY YEAR(`tender_starting_date`), MONTHNAME(`tender_starting_date`)
    
    ) a
    
   ORDER BY  a.Year,FIELD(a.Month_Name,'January','February','March','April','May','June','July', 'August','September','October','November','December')";

        $Q3 = $this->db->query($q3);
        if ($Q3->num_rows() > 0) {
            foreach ($Q3->result_array() as $row) {
                $data['tender'][] = $row;
            }
        }


        // JBL Employee Passport NOC

        $q4 = "SELECT a.Year,
a.Month_Name,
a.Head_Office,
a.Local_Office,
a.Dhaka_North,
a.Dhaka_South,
a.Rangpur,
a.Rajshahi,
a.Khulna,
a.Faridpur,
a.Mymenshing,
a.Sylhet,
a.Comilla,
a.Noakhali,
a.Chattragram,

a.Head_Office+a.Local_Office+a.Dhaka_North+a.Dhaka_South+a.Rangpur+a.Rajshahi+a.Khulna+a.Faridpur+a.Mymenshing+a.Sylhet+a.Comilla+a.Noakhali+a.Chattragram Total   from 
(
SELECT 
sum(case when (upload_by = 'jblnochr') then 1 else 0 END ) as Head_Office,
sum(case when (upload_by = 'jblnoclo') then 1 else 0  END )  as Local_Office,
sum(case when (upload_by = 'jblnocdhknor') then 1 else 0  END )  as Dhaka_North,
sum(case when (upload_by = 'jblnocdhksouth') then 1 else 0  END )  as Dhaka_South,
sum(case when (upload_by = 'jblnocrang') then 1 else 0  END )  as Rangpur,
sum(case when (upload_by = 'jblnocraj') then 1 else 0  END )  as Rajshahi,
sum(case when (upload_by = 'jblnockhul') then 1 else 0  END )  as Khulna,
sum(case when (upload_by = 'jblnocfarid') then 1 else 0  END )  as Faridpur,
sum(case when (upload_by = 'jblnocmymen') then 1 else 0  END )  as Mymenshing,
sum(case when (upload_by = 'jblnocsyl') then 1 else 0  END )  as Sylhet,
sum(case when (upload_by = 'jblnoccom') then 1 else 0  END )  as Comilla,
sum(case when (upload_by = 'jblnocnoa') then 1 else 0  END )  as Noakhali,
sum(case when (upload_by = 'jblnocctg') then 1 else 0  END )  as Chattragram,

MONTHNAME(`noc_date`) as Month_Name,
YEAR(`noc_date`) as Year
FROM `passport_noc` 
WHERE `noc_date` BETWEEN '" . $frm_date . "' AND '" . $to_date . "'

GROUP BY YEAR(`noc_date`), MONTHNAME(`noc_date`)
    
    ) a
    
   ORDER BY  a.Year,FIELD(a.Month_Name,'January','February','March','April','May','June','July', 'August','September','October','November','December')";

        $Q4 = $this->db->query($q4);
        if ($Q4->num_rows() > 0) {
            foreach ($Q4->result_array() as $row) {
                $data['passport_noc'][] = $row;
            }
        }

        // Circular

        $q5 = "SELECT a.Year,
a.Month_Name,
a.Instruction_Circular,
a.Information_Circular,
a.Circular_Letter,
a.RCD_Circular,
a.ID_Circular_Letter,
a.ID_Circular,
a.FD_Circular,
a.FD_Circular_Letter,
a.Lost_Notification,
a.Others,

a.Instruction_Circular+a.Information_Circular+a.Circular_Letter+a.RCD_Circular+a.ID_Circular_Letter+a.ID_Circular+a.FD_Circular+a.FD_Circular_Letter+a.Lost_Notification+a.Others Total   from 
(
SELECT 
sum(case when (circular_type = 'Instruction Circular') then 1 else 0 END ) as Instruction_Circular,
sum(case when (circular_type = 'Information Circular') then 1 else 0  END )  as Information_Circular,
sum(case when (circular_type = 'Circular Letter') then 1 else 0  END )  as Circular_Letter,
sum(case when (circular_type = 'RCD Circular') then 1 else 0  END )  as RCD_Circular,
sum(case when (circular_type = 'ID Circular Letter') then 1 else 0  END )  as ID_Circular_Letter,
sum(case when (circular_type = 'ID Circular') then 1 else 0  END )  as ID_Circular,
sum(case when (circular_type = 'FD Circular') then 1 else 0  END )  as FD_Circular,
sum(case when (circular_type = 'FD Circular Letter') then 1 else 0  END )  as FD_Circular_Letter,
sum(case when (circular_type = 'Lost Notification') then 1 else 0  END )  as Lost_Notification,
sum(case when (circular_type = 'Others') then 1 else 0  END )  as Others,

MONTHNAME(`circular_date`) as Month_Name,
YEAR(`circular_date`) as Year
FROM `circular_new` 
WHERE `circular_date` BETWEEN '" . $frm_date . "' AND '" . $to_date . "'

GROUP BY YEAR(`circular_date`), MONTHNAME(`circular_date`)
    
    ) a
    
   ORDER BY  a.Year,FIELD(a.Month_Name,'January','February','March','April','May','June','July', 'August','September','October','November','December')";

        $Q5 = $this->db->query($q5);
        if ($Q5->num_rows() > 0) {
            foreach ($Q5->result_array() as $row) {
                $data['circular'][] = $row;
            }
        }

        // GEHBL

        $Q6 = "SELECT a.Year,a.Month_Name,a.House_Loan,a.Flat_Loan,(a.House_Loan+a.Flat_Loan) as Total_Loan from
(SELECT 
sum(case when (loanType = '1') then 1 else 0 END ) as House_Loan,
sum(case when (loanType = '2') then 1 else 0  END )  as Flat_Loan,

YEAR(`applicationSubmitDateTime`) as Year,
MONTHNAME(applicationSubmitDateTime) as Month_Name
FROM govt_loan 
WHERE `applicationSubmitDateTime` BETWEEN '" . $frm_date . "' AND '" . $to_date . "'

GROUP BY  YEAR(applicationSubmitDateTime),MONTH(applicationSubmitDateTime)
 )a";

        $Q6 = $this->db->query($Q6);
        if ($Q6->num_rows() > 0) {
            foreach ($Q6->result_array() as $row) {
                $data['gehbl'][] = $row;
            }
        }
        /* echo "<pre>";
          print_r($data);
          die();
         */
        return $data;
    }

    /* apa report user id and password change- 15.09.2021 */

    function getadminUser() {
        $data = array();
        $this->db->select('id,username,department,user_group,status');
        $this->db->where('username', 'jblmisd_apa');
        $Q = $this->db->get('ms_admins');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function getFixedUser() {
        $data = array();
        $this->db->select('*');
        $this->db->where('username', 'jblmisd_apa');
        $Q = $this->db->get('ms_admins');
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }
        $Q->free_result();
        return $data;
    }

    function updateadminUser() {
        $data = array('username' => $_POST['username'],
            'email' => $_POST['email'],
            'department' => $_POST['department'],
            'password' => $_POST['password']
        );
        $this->db->where('id', $_POST['id']);
        $this->db->update('ms_admins', $data);
    }

// APA Report Geration

    function show_apa_report_details($frm_date, $to_date) {
        $return_data = array();

        if (!empty($frm_date) && !empty($to_date)) {
            // News

            $q1 = "SELECT YEAR(`news_date`) AS Year,MONTHNAME(`news_date`) AS Month_Name,
			COUNT(*) AS Number_of_News_Uploaded
			FROM
			`news`
			WHERE
			`news_date` BETWEEN '" . $frm_date . "' AND '" . $to_date . "'
			GROUP BY YEAR(`news_date`), MONTHNAME(`news_date`)
			ORDER BY Year(`news_date`),FIELD(MONTHNAME(`news_date`),'January','February','March','April','May','June','July', 'August','September','October','November','December')";

            $Q = $this->db->query($q1);
            if ($Q->num_rows() > 0) {
                foreach ($Q->result_array() as $row) {
                    $return_data['news'][] = $row;
                }
            }

            // Notice

            $q2 = "SELECT YEAR(`expiry_date`)  AS Year,MONTHNAME(`expiry_date`) AS Month_Name,
	  COUNT(*) AS Number_of_Notice_Uploaded
	FROM
	  `ms_files`
	WHERE
	  `expiry_date` BETWEEN '" . $frm_date . "' AND '" . $to_date . "'
	GROUP BY YEAR(`expiry_date`), MONTHNAME(`expiry_date`)
	ORDER BY Year(`expiry_date`),FIELD(MONTHNAME(`expiry_date`),'January','February','March','April','May','June','July', 'August','September','October','November','December')";

            $Q2 = $this->db->query($q2);
            if ($Q2->num_rows() > 0) {
                foreach ($Q2->result_array() as $row) {
                    $return_data['notice'][] = $row;
                }
            }

            // Tender

            $q3 = "SELECT a.Year,
a.Month_Name,
a.Tender,
a.RFQ,
a.LTM,
a.OTM,

a.Tender+a.RFQ+a.LTM+a.OTM Total   from 
(
SELECT 
sum(case when (tender_type = 'Tender') then 1 else 0 END ) as Tender,
sum(case when (tender_type = 'RFQ') then 1 else 0  END )  as RFQ,
sum(case when (tender_type = 'LTM') then 1 else 0  END )  as LTM,
sum(case when (tender_type = 'OTM') then 1 else 0  END )  as OTM,

MONTHNAME(`tender_starting_date`) as Month_Name,
YEAR(`tender_starting_date`) as Year
FROM `tender` 
WHERE `tender_starting_date` BETWEEN '" . $frm_date . "' AND '" . $to_date . "'

GROUP BY YEAR(`tender_starting_date`), MONTHNAME(`tender_starting_date`)
    
    ) a
    
   ORDER BY  a.Year,FIELD(a.Month_Name,'January','February','March','April','May','June','July', 'August','September','October','November','December')";

            $Q3 = $this->db->query($q3);
            if ($Q3->num_rows() > 0) {
                foreach ($Q3->result_array() as $row) {
                    $return_data['tender'][] = $row;
                }
            }

            // Passport NOC Module

            $q4 = "SELECT a.Year,
a.Month_Name,
a.Head_Office,
a.Local_Office,
a.Dhaka_North,
a.Dhaka_South,
a.Rangpur,
a.Rajshahi,
a.Khulna,
a.Faridpur,
a.Mymenshing,
a.Sylhet,
a.Comilla,
a.Noakhali,
a.Chattragram,

a.Head_Office+a.Local_Office+a.Dhaka_North+a.Dhaka_South+a.Rangpur+a.Rajshahi+a.Khulna+a.Faridpur+a.Mymenshing+a.Sylhet+a.Comilla+a.Noakhali+a.Chattragram Total   from 
(
SELECT 
sum(case when (upload_by = 'jblnochr') then 1 else 0 END ) as Head_Office,
sum(case when (upload_by = 'jblnoclo') then 1 else 0  END )  as Local_Office,
sum(case when (upload_by = 'jblnocdhknor') then 1 else 0  END )  as Dhaka_North,
sum(case when (upload_by = 'jblnocdhksouth') then 1 else 0  END )  as Dhaka_South,
sum(case when (upload_by = 'jblnocrang') then 1 else 0  END )  as Rangpur,
sum(case when (upload_by = 'jblnocraj') then 1 else 0  END )  as Rajshahi,
sum(case when (upload_by = 'jblnockhul') then 1 else 0  END )  as Khulna,
sum(case when (upload_by = 'jblnocfarid') then 1 else 0  END )  as Faridpur,
sum(case when (upload_by = 'jblnocmymen') then 1 else 0  END )  as Mymenshing,
sum(case when (upload_by = 'jblnocsyl') then 1 else 0  END )  as Sylhet,
sum(case when (upload_by = 'jblnoccom') then 1 else 0  END )  as Comilla,
sum(case when (upload_by = 'jblnocnoa') then 1 else 0  END )  as Noakhali,
sum(case when (upload_by = 'jblnocctg') then 1 else 0  END )  as Chattragram,

MONTHNAME(`noc_date`) as Month_Name,
YEAR(`noc_date`) as Year
FROM `passport_noc` 
WHERE `noc_date` BETWEEN '" . $frm_date . "' AND '" . $to_date . "'

GROUP BY YEAR(`noc_date`), MONTHNAME(`noc_date`)
    
    ) a
    
   ORDER BY  a.Year,FIELD(a.Month_Name,'January','February','March','April','May','June','July', 'August','September','October','November','December')";

            $Q4 = $this->db->query($q4);
            if ($Q4->num_rows() > 0) {
                foreach ($Q4->result_array() as $row) {
                    $return_data['passport_noc'][] = $row;
                }
            }

            // Circular Module

            $q5 = "SELECT a.Year,
a.Month_Name,
a.Instruction_Circular,
a.Information_Circular,
a.Circular_Letter,
a.RCD_Circular,
a.ID_Circular_Letter,
a.ID_Circular,
a.FD_Circular,
a.FD_Circular_Letter,
a.Lost_Notification,
a.Others,

a.Instruction_Circular+a.Information_Circular+a.Circular_Letter+a.RCD_Circular+a.ID_Circular_Letter+a.ID_Circular+a.FD_Circular+a.FD_Circular_Letter+a.Lost_Notification+a.Others Total   from 
(
SELECT 
sum(case when (circular_type = 'Instruction Circular') then 1 else 0 END ) as Instruction_Circular,
sum(case when (circular_type = 'Information Circular') then 1 else 0  END )  as Information_Circular,
sum(case when (circular_type = 'Circular Letter') then 1 else 0  END )  as Circular_Letter,
sum(case when (circular_type = 'RCD Circular') then 1 else 0  END )  as RCD_Circular,
sum(case when (circular_type = 'ID Circular Letter') then 1 else 0  END )  as ID_Circular_Letter,
sum(case when (circular_type = 'ID Circular') then 1 else 0  END )  as ID_Circular,
sum(case when (circular_type = 'FD Circular') then 1 else 0  END )  as FD_Circular,
sum(case when (circular_type = 'FD Circular Letter') then 1 else 0  END )  as FD_Circular_Letter,
sum(case when (circular_type = 'Lost Notification') then 1 else 0  END )  as Lost_Notification,
sum(case when (circular_type = 'Others') then 1 else 0  END )  as Others,

MONTHNAME(`circular_date`) as Month_Name,
YEAR(`circular_date`) as Year
FROM `circular_new` 
WHERE `circular_date` BETWEEN '" . $frm_date . "' AND '" . $to_date . "'

GROUP BY YEAR(`circular_date`), MONTHNAME(`circular_date`)
    
    ) a
    
   ORDER BY  a.Year,FIELD(a.Month_Name,'January','February','March','April','May','June','July', 'August','September','October','November','December')";

            $Q5 = $this->db->query($q5);
            if ($Q5->num_rows() > 0) {
                foreach ($Q5->result_array() as $row) {
                    $return_data['circular'][] = $row;
                }
            }

            // GEHBL

            $Q6 = "SELECT a.Year,a.Month_Name,a.House_Loan,a.Flat_Loan,(a.House_Loan+a.Flat_Loan) as Total_Loan from
(SELECT 
sum(case when (loanType = '1') then 1 else 0 END ) as House_Loan,
sum(case when (loanType = '2') then 1 else 0  END )  as Flat_Loan,

YEAR(`applicationSubmitDateTime`) as Year,
MONTHNAME(applicationSubmitDateTime) as Month_Name
FROM govt_loan 
WHERE `applicationSubmitDateTime` BETWEEN '" . $frm_date . "' AND '" . $to_date . "'

GROUP BY  YEAR(applicationSubmitDateTime),MONTH(applicationSubmitDateTime)
 )a";

            $Q6 = $this->db->query($Q6);
            if ($Q6->num_rows() > 0) {
                foreach ($Q6->result_array() as $row) {
                    $return_data['gehbl'][] = $row;
                }
            }

            return $return_data;
        }
    }

}

?>