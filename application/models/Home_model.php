<?php

class Home_model extends CI_Model {

    function __construct() {
        parent::__construct();
//        $this->load->model('menu_model');
    }

    public function mainmenu() {
        $this->db->select('*,mainmenu.mainmenu_id as mid,submenu_parent as spid,mainmenu.name as mname');
        $this->db->from('mainmenu');
        $this->db->join('submenu', ' submenu.submenu_parent = mainmenu.mainmenu_id', 'left');
        $this->db->group_by('name');
        $this->db->order_by('priority');
        $this->db->where('status', 'Active');
        $this->db->where_not_in('name', 'Other / Home');
        $query = $this->db->get();
        return $query->result();
    }

    public function submenu() {
        $this->db->select('*');
        $this->db->from('submenu');
        $this->db->order_by('submenu_priority');
        $this->db->where('submenu_status', 'Active');
        $query = $this->db->get();
        return $query->result();
    }

    public function childmenu() {
        $this->db->select('*');
        $this->db->from('childmenu');
        $this->db->order_by('childmenu_priority');
        $this->db->where('childmenu_status', 'Active');
        $query = $this->db->get();
        return $query->result();
    }

    public function slider() {
        $this->db->select('image_title,image_path,slide_order');
        $this->db->from('images');
        //$this->db->where('image_parent_id', 0);
        $this->db->where('extra_information', 'slide_show');
        $this->db->where('image_status', 'Active');
        $this->db->order_by('slide_order', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function notice_board() {
        $sql = "SELECT * FROM ms_files WHERE name='notice' AND (expiry_date >=CURDATE() OR expiry_date is NULL OR expiry_date='0000-00-00') and status='active' order by id desc";
        $query = $this->db->query($sql);
        return $query->result_array();

//        $this->db->select('title,path');
//        $this->db->from('ms_files');
//        $this->db->where('name','notice');
//        $this->db->where('expiry_date','>=CURDATE()');
//        $this->db->or_where('expiry_date',NULL);	 
    }

    public function active_tender() {
        $sql = "SELECT * FROM `tender` WHERE `tender_closing_date` >= now( )  AND tender_status='Active' ORDER BY `tender_id` DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function jblRateCash() {
        $sql = "SELECT * FROM jblratecash";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function searchItem($keyword) {
        /* $sql = "SELECT name AS name, url AS url FROM mainmenu WHERE 
          name LIKE '%" . $this->db->escape_like_str($keyword) . "%' AND status='Active'
          UNION SELECT submenu_name AS name, submenu_url AS
          url FROM submenu WHERE submenu_name LIKE '%" . $this->db->escape_like_str($keyword) . "%' AND submenu_status='Active' UNION SELECT
          childmenu_name AS name, childmenu_url AS url FROM childmenu WHERE
          childmenu_name LIKE '%" . $this->db->escape_like_str($keyword) . "%' AND childmenu_status='Active'";
         */
        $sql = "SELECT 
                  name collate utf8mb3_general_ci as name, 
                  url collate utf8mb3_general_ci as url 
                FROM 
                  jbwebsite.mainmenu 
                where 
                  name like '%" . $this->db->escape_like_str($keyword) . "%' 
                  and url != '' 
                  and status = 'Active' 
                union 
                select 
                  submenu_name as name, 
                  submenu_url as url 
                from 
                  submenu 
                where 
                  submenu_name like '%" . $this->db->escape_like_str($keyword) . "%' 
                  and submenu_url != '' 
                  and submenu_status = 'Active' 
                union 
                select 
                  childmenu_name as name, 
                  childmenu_url as url 
                from 
                  childmenu 
                where 
                  childmenu_name like '%" . $this->db->escape_like_str($keyword) . "%' 
                  and childmenu_url != '' 
                  and childmenu_status = 'Active' 
                union 
                select 
                  tender_title as name, 
                  concat(
                    'assets/file/tender/', tender_pdf_link
                  ) as url 
                from 
                  tender 
                where 
                  tender_title like '%" . $this->db->escape_like_str($keyword) . "%' 
                  and tender_status = 'Active' 
                union 
                select 
                  employee_name as name, 
                  concat(
                    'assets/file/noc/', employee_noc_file
                  ) as url 
                from 
                  passport_noc 
                where 
                  employee_name like '%" . $this->db->escape_like_str($keyword) . "%' 
                  or employee_file like '%" . $this->db->escape_like_str($keyword) . "%' 
                  and status = 'Active' 
                union 
                select 
                  news_date as name, 
                  concat('assets/file/news/', news_links) as url 
                from 
                  news 
                where 
                  news_date like '%" . $this->db->escape_like_str($keyword) . "%' 
                  and news_status = 'Active' 
                union 
                select 
                  title as name, 
                  concat('assets/file/', path) as url 
                from 
                  ms_files 
                where 
                  title like '%" . $this->db->escape_like_str($keyword) . "%' 
                  or name like '%" . $this->db->escape_like_str($keyword) . "%' 
                  and status = 'Active' 
                union 
                select 
                  annual_report_title as name, 
                  concat(
                    'assets/file/annualReports/', annual_report_pdf_link
                  ) as url 
                from 
                  annual_report 
                where 
                  annual_report_title like '%" . $this->db->escape_like_str($keyword) . "%' 
                  and annual_report_status = 'Active' 
                union 
                select 
                  circular_title as name, 
                  concat(
                    'assets/file/circular/', circular_pdf_link
                  ) as url 
                from 
                  circular_new 
                where 
                  circular_title like '%" . $this->db->escape_like_str($keyword) . "%' 
                  or circular_no like '%" . $this->db->escape_like_str($keyword) . "%' 
                  and circular_status = 'Active' 
                union 
                select 
                  p.product_scheme, 
                  c.childmenu_url 
                from 
                  product p 
                  inner join childmenu c on p.productForChildMenu = c.childmenu_id 
                  inner join submenu s on p.productForSubMenu = s.submenu_id 
                  inner join mainmenu m on p.productForMainMenu = m.mainmenu_id 
                where 
                  p.product_scheme like '%" . $this->db->escape_like_str($keyword) . "%' 
                  or p.product_group like '%" . $this->db->escape_like_str($keyword) . "%' 
                  and p.product_status = 'Active' ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function passportNOC() {
        $this->db->select('employee_id,employee_name,employee_desig,employee_file,noc_date,employee_noc_file');
        $this->db->from('passport_noc');
        $this->db->where('status', 'Active');
        $this->db->order_by('employee_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function marquee_modal() {
        //$sql = "SELECT * FROM marquee_modal WHERE expiryDate >=CURDATE() and status='1' order by priority asc";
        //$query = $this->db->query($sql);
        //return $query->result();

        date_default_timezone_set("Asia/Dhaka");
        //$dt = date('Y-m-d h:i:s');
        $today = strtotime("today midnight");
        $sql = "SELECT * FROM marquee_modal WHERE status='1' order by priority asc";
        $query = $this->db->query($sql);
        foreach ($query->result() as $row) {
            if ($today > strtotime($row->expiryDate)) {
                $data = array(
                    'priority' => '0',
                    'status' => '0'
                );
                $this->db->where('id', $row->id);
                $this->db->update('marquee_modal', $data);
            }
        }
        return $query->result();
    }

    public function getNews() {
        //$sql = "SELECT * FROM news WHERE news_status='Approved' ORDER BY news_id DESC LIMIT 0,30";
        $sql = "SELECT * FROM news ORDER BY news_id DESC LIMIT 0,30";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function innovation_team() {
        $sql = "SELECT * FROM innovation_team WHERE status='1' ORDER BY priority ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function innovation_actionPlan() {
        $sql = "SELECT * FROM innovation_file WHERE  file_type = 'innovation_action_plan' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function innovation_initiative() {
        $sql = "SELECT * FROM innovation_file WHERE  file_type = 'innovation_initiatives' ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function sme_masterCircular() {
        $sql = "SELECT * FROM circular_new where circular_title='Master Circular on SME Financing' and circular_status='Active' order by circular_date desc limit 1";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getFinLitImages() {
        $query = "select * from gallery where albumID='54' AND `imageStatus`= 'Active' ORDER BY galleryID DESC";
        $runQuery = $this->db->query($query);
        return $runQuery->result();
    }

    public function addInnovative_idea() {
        $title1 = trim($_POST['title']);
        $title2 = htmlspecialchars($title1);
        $title = stripcslashes($title2);
        
        $description1 = trim($_POST['description']);
        $description2 = htmlspecialchars($description1);
        $description = stripcslashes($description2);
        
        $objective1 = trim($_POST['objective']);
        $objective2 = htmlspecialchars($objective1);
        $objective = stripcslashes($objective2);
        
        $proced1 = trim($_POST['proced']);
        $proced2 = htmlspecialchars($proced1);
        $proced = stripcslashes($proced2 );
        
        $usefullness1 = trim($_POST['usefullness']);
        $usefullness2 = htmlspecialchars($usefullness1);
        $usefullness = stripcslashes($usefullness2 );
        
        $maintainCost1 = trim($_POST['maintainCost']);
        $maintainCost2 = htmlspecialchars($maintainCost1);
        $maintainCost = stripcslashes($maintainCost2);
        
        $duration1 = trim($_POST['duration']);
        $duration2 = htmlspecialchars($duration1);
        $duration = stripcslashes($duration2);
        
        $benificiaryCost1 = trim($_POST['benificiaryCost']);
        $benificiaryCost2 = htmlspecialchars($benificiaryCost1);
        $benificiaryCost = stripcslashes($benificiaryCost2);
        
        $expandFacility1 = trim($_POST['expandFacility']);
        $expandFacility2 = htmlspecialchars($expandFacility1);
        $expandFacility = stripcslashes($expandFacility2);
        
        $probableRisk1 = trim($_POST['probableRisk']);
        $probableRisk2 = htmlspecialchars($probableRisk1);
        $probableRisk = stripcslashes($probableRisk2);
        
        $miscellenous1 = trim($_POST['miscellenous']);
        $miscellenous2 = htmlspecialchars($miscellenous1);
        $miscellenous = stripcslashes($miscellenous2);
        
        $data = array(
            'title' => $title,
            'description' => $description,
            'objective' => $objective,
            'proced' => $proced,
            'usefullness' => $usefullness,
            'maintainCost' => $maintainCost,
            'duration' =>  $duration,
            'benificiaryCost' => $benificiaryCost,
            'expandFacility' => $expandFacility,
            'probableRisk' => $probableRisk,
            'miscellenous' => $miscellenous
        );

        $this->db->insert('innovativeIdea', $data);
    }

    public function citizen_services() {
        $query = "SELECT * FROM citizen_charter WHERE displayInBoard='1' AND status='1' ";
        $runQuery = $this->db->query($query);
        return $runQuery->result();
    }

    public function citizenServices_products() {
        $query = "SELECT product_scheme, interest_rate FROM product WHERE product_group='Deposit' AND product_type='Term' AND product_status='Active'";
        $runQuery = $this->db->query($query);
        return $runQuery->result();
    }

    public function citSrv_marquee() {
        $query = "SELECT * FROM citizen_charter WHERE marquee='1' AND status='1' ";
        $runQuery = $this->db->query($query);
        return $runQuery->result();
    }

    function display_branches() {
        $sql = "SELECT branch_code,branch_name,branch_address,swift_code,routing_number,branch_manager_name,branch_manager_contact FROM jb_branches_pmis ORDER BY branch_name ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function specific_branch($brcode) {
        //$sql = "SELECT * FROM citizen_charter WHERE branch_code='$brcode'";
        //$sql = "SELECT a.*, b.branchname FROM citizen_charter a LEFT JOIN jbl_branches b ON a.branch_code = b.brcode WHERE status='1' AND a.branch_code='$brcode'; ";
        $sql = "SELECT c.*, a.branchname FROM jbl_branches a, citizenservicesbybranches b, citizen_charter c WHERE a.brcode=b.brcode AND b.service_id=c.service_id AND b.brcode='$brcode';  ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getDivision() {
        //$sql = "select division_id ,division_name from division_atm order by division_name ASC";
        $sql = "SELECT DISTINCT administrative_division_code,  	administrative_division_name  FROM jb_branches_pmis ORDER BY administrative_division_name ASC";
        $query = $this->db->query($sql);
        //echo '<pre>';
        //print_r($query); die();
        return $query->result_array();
    }

    public function getDistrictByDivision($id_division) {
        /*
          $this->db->select('district_id,district_name');
          $this->db->from('district_atm');
          $this->db->where('division_id', $id_division);
          $query = $this->db->get();
         */
        $sql = "SELECT DISTINCT administrative_district_code, administrative_district_name FROM jb_branches_pmis WHERE administrative_division_code='$id_division' ORDER BY administrative_district_name ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getUpazilaByDistrict($id_district) {
        //$this->db->select('upazila_id,upazila_name');
        //$this->db->from('upazila_atm');
        //$this->db->where('district_id', $id_district);
        //$query = $this->db->get();
        $sql = "SELECT DISTINCT administrative_upazila_code, administrative_upazila_name FROM jb_branches_pmis WHERE administrative_district_code='$id_district' ORDER BY administrative_upazila_name ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function branchDivisionWise($division_id) {
        $sql = "SELECT * FROM jb_branches_pmis WHERE administrative_division_code= '$division_id'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function branchDistrictWise($district_id) {
        $sql = "SELECT * FROM jb_branches_pmis WHERE administrative_district_code= '$district_id'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function branchUpazilaWise($upazila_id) {
        $sql = "SELECT * FROM jb_branches_pmis WHERE administrative_upazila_code= '$upazila_id'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function home_modal() {
        //$curDt = date("Y-m-d H:i:s");
        // $curDat = strtotime($curDt);
        $sql = "SELECT * FROM top_modal WHERE valid_until > NOW()";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function immigration_noc(){
        $this->db->select('*');
        $this->db->from('immigration_noc');
        $this->db->where('status', 'Active');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
}
