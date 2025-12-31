<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Album_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function queryAll() {
        $this->db->order_by("albums.albumID", "DESC");
        return $this->db->get("albums")->result();
    }

    public function imageAll($key) {
        //$sql = " SELECT * FROM gallery WHERE albumID='$key' ";
        $sql="SELECT albums.albumName, gallery.imageName, gallery.caption FROM gallery INNER JOIN albums
              ON gallery.albumID=albums.albumID WHERE albums.albumID='$key' AND `imageStatus`= 'Active' ORDER BY `galleryID` DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
     function count_rows() {
        //return $this->db->count_all('ms_files');
        $query = $this->db->where('albumStatus', 'Active')
                ->get('albums');
        return $query->num_rows();
    }
    
    function albumPagination($limit, $offset){
        $this->db->limit($limit, $offset);
        $this->db->where('albumStatus', 'Active');
        $this->db->order_by('albumID', 'desc');
        $query = $this->db->get('albums');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
    }
    
     function count_videos() {
       /* $query = $this->db->where('name', 'video_gallery')
                ->get('ms_files');
        return $query->num_rows();
        */     
        $sql='SELECT * FROM ms_files WHERE name="video_gallery" AND status="active"';        
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    
    function videoPagination($limit, $offset){
         $this->db->limit($limit, $offset);
        $this->db->where('name', 'video_gallery');
        $this->db->where('status', 'active');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('ms_files');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return $query->result();
        }
    }

}
