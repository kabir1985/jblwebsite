<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor_model extends CI_Model {

    public function log_visit($ip)
    {
        $date = date('Y-m-d');

        $exists = $this->db
            ->where('ip_address', $ip)
            ->where('visit_date', $date)
            ->get('visitors')
            ->row();

        if ($exists) {
            $this->db->set('hit', 'hit+1', FALSE)
                     ->where('id', $exists->id)
                     ->update('visitors');
        } else {
            $this->db->insert('visitors', [
                'ip_address' => $ip,
                'visit_date' => $date,
                'hit' => 1
            ]);
        }
    }

    public function total_visitors()
    {
        return $this->db->count_all('visitors');
    }

    public function today_visitors()
    {
        return $this->db->where('visit_date', date('Y-m-d'))->count_all_results('visitors');
    }
}
