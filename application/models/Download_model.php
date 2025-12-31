<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Download_model extends CI_Model {

    public function download($tender_id) {
        $query = $this->db->get_where('tender', array('tender_id' => $tender_id));
        return $query->row_array();
    }

    public function pdfname($tender_id) {
        $query = $this->db->query("SELECT tender_pdf_link FROM tender WHERE tender_id= '$tender_id'");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->tender_pdf_link;
        }
    }

    public function download_files($id) {
        $query = $this->db->get_where('ms_files', array('id' => $id));
        return $query->row_array();
    }

    public function pdfname_files($id) {
        $query = $this->db->query("SELECT path FROM ms_files WHERE id= '$id'");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->path;
        }
    }

    public function download_exRate($ex_id) {
        $query = $this->db->get_where('exchange_rate', array('ex_id' => $ex_id));
        return $query->row_array();
    }

    public function pdfname_exRate($ex_id) {
        $query = $this->db->query("SELECT ex_file_path FROM exchange_rate WHERE ex_id= '$ex_id'");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->ex_file_path;
        }
    }

    public function download_noc($employee_id) {
        $query = $this->db->get_where('passport_noc', array('employee_id' => $employee_id));
        return $query->row_array();
    }

    public function pdfname_noc($employee_id) {
        $query = $this->db->query("SELECT employee_noc_file FROM passport_noc WHERE employee_id= '$employee_id'");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->employee_noc_file;
        }
    }

    public function download_news($news_id) {
        $query = $this->db->get_where('news', array('news_id' => $news_id));
        return $query->row_array();
    }

    public function pdfname_news($news_id) {
        $query = $this->db->query("SELECT news_links FROM news WHERE news_id= '$news_id'");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->news_links;
        }
    }

    public function download_report($annual_report_id) {
        $query = $this->db->get_where('annual_report', array('annual_report_id' => $annual_report_id));
        return $query->row_array();
    }
    
    public function pdfname_annualReport($annual_report_id){
        $query = $this->db->query("SELECT annual_report_pdf_link FROM annual_report WHERE annual_report_id= '$annual_report_id'");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->annual_report_pdf_link;
        }
    }
    
    public function immigration_noc($id) {
        $query = $this->db->get_where('immigration_noc', array('id' => $id));
        return $query->row_array();
    }

    public function pdfname_immiNoc($id) {
        $query = $this->db->query("SELECT noc_file FROM immigration_noc WHERE id= '$id'");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->noc_file;
        }
    }
}
