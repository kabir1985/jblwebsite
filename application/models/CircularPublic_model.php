<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CircularPublic_model extends CI_Model {

    public function count_circular() {
        return $this->db->count_all('circular_new');
    }

    public function count_public() {
        $this->db->select("COUNT(*) as num_row");
        $this->db->from('circular_new');
        $this->db->where('circular_status', 'Active');
        $this->db->where('publish_status', 'public');
        $query = $this->db->get();
        $result = $query->result();
        return $result[0]->num_row;
    }

    public function count_search($circular_no, $limit, $offset) {
        $this->db->select("COUNT(*) as num_row");
        $this->db->from('circular_new');
        $this->db->like('circular_no', $circular_no);
        $this->db->where('circular_status', 'Active');
        $this->db->where('publish_status', 'public');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        $result = $query->result();
        return $result[0]->num_row;
    }

    public function fetch_circular($limit, $offset) {
        $this->db->limit($limit, $offset);
        $this->db->where('circular_status', 'Active'); //show only active circular
        $this->db->where('publish_status', 'public');
        $this->db->order_by('circular_id', 'desc');
        //$this->db->distinct();
        $query = $this->db->get('circular_new');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            //must use  return $query->result(); when no data in table
            return $query->result();
        }
    }

    public function searchBy_no($circular_no) {
        $this->db->select('*');
        $this->db->from('circular_new');
        $this->db->like('circular_no', $circular_no);
        $this->db->where('publish_status', 'public');
        $this->db->where('circular_status', 'Active');
        $this->db->order_by('circular_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
    }

    public function searchBy_title($circular_title) {
        $this->db->select('*');
        $this->db->from('circular_new');
        $this->db->like('circular_title', $circular_title);
        $this->db->where('publish_status', 'public');
        $this->db->where('circular_status', 'Active');
        $this->db->order_by('circular_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
    }

    public function searchBy_dept($circular_department) {
        $this->db->select('*');
        $this->db->from('circular_new');
        //$this->db->like('circular_department', $circular_department);
        //$this->db->where('circular_dept_code', $circular_department);
		$this->db->where('circular_department', $circular_department);
        $this->db->where('publish_status', 'public');
        $this->db->where('circular_status', 'Active');
        $this->db->order_by('circular_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
    }

    public function searchBy_type($circular_type) {
        $this->db->select('*');
        $this->db->from('circular_new');
        //$this->db->like('circular_type',$circular_type);
        $this->db->where('circular_type', $circular_type);
        $this->db->where('publish_status', 'public');
        $this->db->where('circular_status', 'Active');
        $this->db->order_by('circular_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
    }

    public function searchBy_date($circular_fromdate, $circular_todate) {
        $this->db->select('*');
        $this->db->from('circular_new');
        //$this->db->where("circular_date between '$circular_fromdate' and '$circular_todate'");
        $this->db->where("circular_date between " . $this->db->escape($circular_fromdate) . "  and " . $this->db->escape($circular_todate) . " ");
        $this->db->where('publish_status', 'public');
        $this->db->where('circular_status', 'Active');
        $this->db->order_by('circular_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
    }

    /* public function search_date($circular_fromdate,$circular_todate) {
      $start = $circular_fromdate;
      $end = $circular_todate;
      $sql = "SELECT * FROM circular_new WHERE publish_status='public' AND circular_status='Active'
      AND circular_date BETWEEN ? AND ? ORDER BY circular_id DESC";
      $query = $this->db->query($sql,[$start,$end]);
      //echo '<pre>';
      //print_r($query); die();
      if ($query->num_rows > 0) {
      return $query->result();
      }
      } */

    public function download($circular_id) {
        $query = $this->db->get_where('circular_new', array('circular_id' => $circular_id));
        return $query->row_array();
    }

    public function pdfname($circular_id) {
        $query = $this->db->query("SELECT circular_pdf_link FROM circular_new WHERE circular_id= '$circular_id'");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->circular_pdf_link;
        }
    }

    public function pdfname_files($circular_id) {
        $query = $this->db->query("SELECT circular_pdf_link FROM circular_new WHERE circular_id= '$circular_id'");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->circular_pdf_link;
        }
    }
}
