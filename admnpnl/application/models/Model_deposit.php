
<?php

class Model_deposit extends CI_Model {
    /* function MCats(){
      parent::Model();
      }
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function getDeposits($product_id) {
        $data = array();
        $options = array('product_id' => $product_id);
        $Q = $this->db->get_where('product', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }

        $Q->free_result();
        return $data;
    }

    function getAllDeposits() {
        $data = array();
        $this->db->where('product_group', 'Deposit');
        //$Q = $this->db->get('product_deposit');
        $Q = $this->db->get('product');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function getSubCategories($catid) {
        $data = array();
        $this->db->select('id,name,shortdesc');
        $this->db->where('parentid', $catid);
        $this->db->where('status', 'active');
        $this->db->order_by('sortorder', 'asc');
        $Q = $this->db->get('ms_categories');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'shortdesc' => $row['shortdesc']
                );
            }
        }
        $Q->free_result();

        return $data;
    }

    function getCategoriesNav() {
        $data = array();
        $this->db->select('id,name,parentid');
        $this->db->where('status', 'active');
        $this->db->order_by('parentid', 'asc');
        $this->db->order_by('sortorder', 'asc');
        $this->db->group_by('parentid,id');
        $Q = $this->db->get('ms_categories');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result() as $row) {
                if ($row->parentid > 0) {
                    $data[0][$row->parentid]['children'][$row->id] = $row->name;
                } else {
                    $data[0][$row->id]['name'] = $row->name;
                }
            }
        }
        $Q->free_result();
        return $data;
    }

    function getCategoriesDropDown() {
        $data = array();
        $this->db->select('id,name');
        $this->db->where('parentid !=', 0);
        //$this->db->groupby('parentid,id');
        $Q = $this->db->get('ms_categories');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[$row['id']] = $row['name'];
            }
        }
        $Q->free_result();
        return $data;
    }

    /* function getTopDeposits() {
        $data[0] = 'root';
        $Q = $this->db->get('product');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[$row['pd_id']] = $row['pd_name'];
            }
        }
        $Q->free_result();
        return $data;
    } */

    function getPublishDeposits() {
        $data[0] = 'root';
        $this->db->where('parentid', 0);
        $this->db->where('status', 'active');
        // $this->db->order_by('sortorder','asc');
        $Q = $this->db->get('product_deposit');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[$row['id']] = $row['name'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function addDeposit() {

        $data = array(
            'productForMainMenu' => $_POST['mainmenu_id'],
            'productForSubMenu' => $_POST['submenu_id'],
            'productForChildMenu' => $_POST['childmenu_id'],
            'product_group' => $_POST['product_group'],
            'product_scheme' => $_POST['product_scheme'],
            'product_type' => $_POST['product_type'],
            'monthly_installment' => $_POST['monthly_installment'],
            'interest_rate' => $_POST['interest_rate'],
            'installment_date' => $_POST['installment_date'],
            'duration' => $_POST['duration'],
            'related_circular' => $_POST['related_circular'],
            'circular_pdf_link' => $_POST['circular_pdf_link'],
            'opening_rule' => $_POST['opening_rule'],
            'close_before_maturity' => $_POST['close_before_maturity'],
            'product_status' => $_POST['product_status']
        );
        //echo '<pre>';
        //print_r($data);
        //die();
        $this->db->insert('product', $data);
    }

    function updateDeposit() {
        $data = array(
            'productForMainMenu' => $_POST['mainmenu_id'],
            'productForSubMenu' => $_POST['submenu_id'],
            'productForChildMenu' => $_POST['childmenu_id'],
            'product_group' => $_POST['product_group'],
            'product_scheme' => $_POST['product_scheme'],
            'product_type' => $_POST['product_type'],
            'monthly_installment' => $_POST['monthly_installment'],
            'interest_rate' => $_POST['interest_rate'],
            'installment_date' => $_POST['installment_date'],
            'duration' => $_POST['duration'],
            'related_circular' => $_POST['related_circular'],
            'circular_pdf_link' => $_POST['circular_pdf_link'],
            'opening_rule' => $_POST['opening_rule'],
            'close_before_maturity' => $_POST['close_before_maturity'],
            'product_status' => $_POST['product_status']
        );


        if (isset($_FILES['image_path'])) {
            $config['upload_path'] = './includes/uploads/product/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0';
            $config['remove_spaces'] = true;
            $config['overwrite'] = true;
            $config['max_width'] = '0';
            $config['max_height'] = '0';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image_path')) {
                echo $this->upload->display_errors();
                exit();
            }
            $U = $this->upload->data();
            //print_r($U);	die();
            if (isset($U['file_name'])) {
                $data['image_path'] = $U['file_name'];
            }
            /* if ($U['file_name']){$data['path'] = $U['file_name'];} */
        }
        //$this->db->insert('product_deposit', $data);		
        $this->db->where('product_id', $_POST['product_id']);
        $this->db->update('product', $data);
    }

    function deleteDeposit($product_id) {
        $data = array('product_status' => 'Inactive');
        $this->db->where('product_id', $product_id);
        $this->db->update('product', $data);
    }

    function getStatus() {
        $sql = "select product_status from product";
        $query = $this->db->query($sql);
        if ($query->num_rows > 0) {
            $data[0] = '--Please Select--';
            $data['Active'] = 'Active';
            $data['Inactive'] = 'Inactive';
            foreach ($query->result_array() as $row) {
                $data[$row['product_status']] = $row['product_status'];
            }
            return $data;
        }
    }

    function exportCsv() {
        $this->load->dbutil();
        $Q = $this->db->query("select * from product_deposit");
        return $this->dbutil->csv_from_result($Q, ",", "\n");
    }

}

?>