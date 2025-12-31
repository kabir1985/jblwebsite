<?php
class Model_advance extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getAdvances($product_id) {
        $data = array();
        $options = array('product_id' => $product_id);
        $Q = $this->db->get_where('product', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }
        $Q->free_result();
        return $data;
    }

    function getAllAdvances() {
        $data = array();
        $this->db->where('product_group', 'Loans& Adv.');
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
        $Q = $this->db->get('ms_categories');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[$row['id']] = $row['name'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function getTopAdvances() {
        $data[0] = 'root';
        $Q = $this->db->get('product');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[$row['product_id']] = $row['product_scheme'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function getPublishAdvances() {
        $data[0] = 'root';
        $this->db->where('parentid', 0);
        $this->db->where('status', 'active');
        $Q = $this->db->get('product_advance');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[$row['id']] = $row['name'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function addAdvance() {
        $data = array(
            'productForMainMenu' => $_POST['mainmenu_id'],
            'productForSubMenu' => $_POST['submenu_id'],
            'productForChildMenu' => $_POST['childmenu_id'],
            'product_group' => $_POST['product_group'],
            'product_Scheme' => $_POST['product_scheme'],
            'product_type' => $_POST['product_type'],
            'loan_installment_type' => $_POST['loan_installment_type'],
            'loan_eligibility' => $_POST['loan_eligibility'],
            'loan_interest_rate' => $_POST['loan_interest_rate'],
            'loan_period' => $_POST['loan_period'],
            'loan_security' => $_POST['loan_security'],
            'loan_branches' => $_POST['loan_branches'],
            'loan_limit' => $_POST['loan_limit'],
            'product_status' => $_POST['product_status']
        );
        $this->db->insert('product', $data);
    }

    function updateAdvance() {
        $data = array(
            'productForMainMenu' => $_POST['mainmenu_id'],
            'productForSubMenu' => $_POST['submenu_id'],
            'productForChildMenu' => $_POST['childmenu_id'],
            'product_group' => $_POST['product_group'],
            'product_Scheme' => $_POST['product_scheme'],
            'product_type' => $_POST['product_type'],
            'loan_installment_type' => $_POST['loan_installment_type'],
            'loan_eligibility' => $_POST['loan_eligibility'],
            'loan_interest_rate' => $_POST['loan_interest_rate'],
            'loan_period' => $_POST['loan_period'],
            'loan_security' => $_POST['loan_security'],
            'loan_branches' => $_POST['loan_branches'],
            'loan_limit' => $_POST['loan_limit'],
            'product_status' => $_POST['product_status']
        );
        $this->db->where('product_id', $_POST['product_id']);
        $this->db->update('product', $data);
    }

    function get_prodtype() {
        $sql = "select product_type from product";
        $query = $this->db->query($sql);
        if ($query->num_rows > 0) {
            $data[0] = '-select-';
            $data['Savings'] = 'Savings';
            $data['Current'] = 'Current';
            $data['Scheme'] = 'Scheme';
            $data['Term'] = 'Term';
            $data['Short Term'] = 'Short Term';
            $data['Retail Customer'] = 'Retail Customer';
            $data['Agriculture Loan Program'] = 'Agriculture Loan Program';
            $data['Continious Loan'] = 'Continious Loan';
            $data['Rural Credit'] = 'Rural Credit';
            $data['credit_card'] = 'Credit Card';
            $data['Tannery'] = 'Tannery';
            $data['Real Estate'] = 'Real Estate';
            $data['House Building'] = 'House Building';
            $data['Summer Crops'] = 'Summer Crops';
            $data['Cow'] = 'Cow';
            $data['Consumer Financing'] = 'Consumer Financing';
            $data['Specialized Loan'] = 'Specialized Loan';
            $data['education_loan'] = 'education_loan';
            $data['health_service'] = 'health_service';
            $data['pensioner_loan'] = 'Pensioner Loan';
            $data['Working Capital Loan'] = 'Working Capital Loan';
            $data['Green Financing'] = 'Green Financing';
            foreach ($query->result_array as $row) {
                $data['product_type'] = $row['product_type'];
            }
            return $data;
        }

        function get_installtype() {
            $sql = "select loan_installment_type from product ";
            $query = $this->db->query($sql);
            if ($query->num_rows > 0) {
                $data[0] = '-select-';
                $data['চলমান ঋণ'] = 'চলমান ঋণ';
                $data['চলমান ধাপ'] = 'চলমান ধাপ';
                $data['এককালীন'] = 'এককালীন';
                $data['মাসিক'] = 'মাসিক';
                $data['মাসিক/সেমিস্টার অনুযায়ী'] = 'মাসিক/সেমিস্টার অনুযায়ী';
                $data['ত্রৈমাসিক'] = 'ত্রৈমাসিক';
                $data['ষান্মাসিক'] = 'ষান্মাসিক';
                $data['ত্রৈমাসিক/ষান্মাসিক'] = 'ত্রৈমাসিক/ষান্মাসিক';
                $data['অর্ধ বার্ষিক'] = 'অর্ধ বার্ষিক';
                $data['বার্ষিক'] = 'বার্ষিক';
                $data['পাক্ষিক'] = 'পাক্ষিক';
                foreach ($query->result_array as $row) {
                    $data['installment_type'] = $row['installment_type'];
                }
                return $data;
            }
        }

        function get_status() {
            $sql = "select product_status from product";
            $query = $this->db->query($sql);
            if ($query->num_rows > 0) {
                $data[0] = '-select-';
                $data['Active'] = 'Active';
                $data['Inactive'] = 'Inactive';
                foreach ($query->result_array() as $row) {
                    $data['product_status'] = $row['product_status'];
                }
                return $data;
            }
        }

        function deleteAdvance($product_id) {
            $data = array('product_status' => 'Inactive');
            $this->db->where('product_id', $product_id);
            $this->db->update('product', $data);
        }

        function exportCsv() {
            $this->load->dbutil();
            $Q = $this->db->query("select * from product_advance");
            return $this->dbutil->csv_from_result($Q, ",", "\n");
        }

    }

}
