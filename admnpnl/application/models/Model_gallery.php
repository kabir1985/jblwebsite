<?php

class Model_gallery extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        //$this->gallery_path = realpath(APPPATH . '../includes/uploads');    
    }

    function getAlbums($albumID) {
        $data = array();
        $options = array('albumID' => $albumID);
        $Q = $this->db->get_where('albums', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }

        $Q->free_result();
        return $data;
    }

    function getAllAlbums() {
        $data = array();
        $Q = $this->db->get('albums');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function getTopAlbum() {
        $data[0] = 'root';
        $Q = $this->db->get('albums');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                //$data[$row['id']] = $row['name'];
                $data[$row['albumID']] = $row['albumName'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function addAlbum() {
        $ext_file = pathinfo($_FILES['default_image']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        //$sanitizeAlbumName = preg_replace('/[^A-Za-z0-9\-]/', ' ', $_POST['albumName']);
        //$cutAlbumName = implode(' ', array_slice(explode(' ', $sanitizeAlbumName), 0, 3));
        //$s = ucwords($cutAlbumName);
        //$letterLwrCase = ucwords(strtolower($s));
        //$albumName = preg_replace('/\s+/', '', $letterLwrCase);
        date_default_timezone_set("Asia/Dhaka");
        $dt = date("Y-m-d_h-i-sa");
        $coverImage = 'coverPhoto_' . $dt . '.' . $ext_file;
        $img_tmp = $_FILES['default_image']['tmp_name'];
        
		$img_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/album/';

        $data = array(
            'albumName' => $_POST['albumName'],
            'default_image' => $coverImage,
            'albumDescription' => $_POST['albumDescription'],
            'albumStatus' => $_POST['albumStatus']
        );

        move_uploaded_file($img_tmp, $img_loc . $coverImage);
		

        /* $my_image1 = array();
          $my_image1 = $this->add_link_file('default_image');
          if ($my_image1 != 'No File Name') {
          $data['default_image'] = $my_image1['file_name'];
          } else {
          $data['default_image'] = 'No File Name';
          } */

        $this->db->insert("albums", $data);
    }

    function add_link_file($my_file) {
        if ($_FILES[$my_file]) {
            $config['upload_path'] = '../assets/album/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0';
            $config['remove_spaces'] = true;
            $config['overwrite'] = true;
            $config['max_width'] = '0';
            $config['max_height'] = '0';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($my_file)) {
                return 'No File Name';
            }
            $U = $this->upload->data();
            if ($U['file_name']) {
                return $U;
            } else {
                return 'No File Name';
            }
        }
    }

    function updateAlbum() {
        $ext_file = pathinfo($_FILES['default_image']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        //$sanitizeAlbumName = preg_replace('/[^A-Za-z0-9\-]/', ' ', $_POST['albumName']);
        //$cutAlbumName = implode(' ', array_slice(explode(' ', $sanitizeAlbumName), 0, 3));
        //$s = ucwords($cutAlbumName);
        //$letterLwrCase = ucwords(strtolower($s));
        //$albumName = preg_replace('/\s+/', '', $letterLwrCase);
        date_default_timezone_set("Asia/Dhaka");
        $dt = date("Y-m-d_h-i-sa");
        $coverImage = 'coverPhoto_' . $dt . '.' . $ext_file;
        $img_tmp = $_FILES['default_image']['tmp_name'];
        
		$img_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/album/';

        if (is_uploaded_file($_FILES['default_image']['tmp_name'])) {
            $data = array(
                'albumName' => $_POST['albumName'],
                'default_image' => $coverImage,
                'albumDescription' => $_POST['albumDescription'],
                'albumStatus' => $_POST['albumStatus']
            );
        } else {
            $data = array(
                'albumName' => $_POST['albumName'],
                'albumDescription' => $_POST['albumDescription'],
                'albumStatus' => $_POST['albumStatus']
            );
        }
        move_uploaded_file($img_tmp, $img_loc . $coverImage);

        /* $my_image1 = array();
          $my_image1 = $this->add_link_file('default_image');
          if ($my_image1 != 'No File Name') {
          $data['default_image'] = $my_image1['file_name'];
          } */

        $this->db->where('albumID', $_POST['albumID']);
        $this->db->update("albums", $data);
    }

    function deleteAlbum($albumID) {
        $data = array('albumStatus' => 'Inactive');
        $this->db->where('albumID', $albumID);
        $this->db->update('albums', $data);
    }

    function getAllImages() {
        $data = array();
        $Q = $this->db->get('gallery');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function addImage() {
        date_default_timezone_set("Asia/Dhaka");
		$dt = date("Y-m-d_h-i-sa");
        $ext_file = pathinfo($_FILES['imageName']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        $img = $_POST['albumID'] . '_' . $dt . '.' . $ext_file;
        $img_tmp = $_FILES['imageName']['tmp_name'];
        $img_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/album/';
		//die();

        $data = array(
            'imageName' => $img,
            'caption' => $_POST['caption'],
            'albumID' => $_POST['albumID'],
            'imageStatus' => $_POST['imageStatus']
        );

        move_uploaded_file($img_tmp, $img_loc . $img);

        /* $my_image1 = array();
          $my_image1 = $this->add_link_file('imageName');
          if ($my_image1 != 'No File Name') {
          $data['imageName'] = $my_image1['file_name'];
          } else {
          $data['imageName'] = 'No File Name';
          } */

        $this->db->insert("gallery", $data);
    }

    function getTopImages() {
        $data[0] = 'root';
        $Q = $this->db->get('gallery');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                //$data[$row['id']] = $row['name'];
                $data[$row['galleryID']] = $row['imageName'];
            }
        }
        $Q->free_result();
        return $data;
    }

    function getAlbumID() {
        $sql = "select albumID, albumName from albums where albumStatus='active' order by albumID DESC";
        $query = $this->db->query($sql);
        // if ($query->num_rows > 0) {
        //return $query->result_array();
        $data[0] = '--Please Select--';
        foreach ($query->result_array() as $row) {
            $data[$row['albumID']] = $row['albumID'] . ' - ' . $row['albumName'];
        }
        return $data;
        //}
    }

    function getImages($galleryID) {
        $data = array();
        $options = array('galleryID' => $galleryID);
        $Q = $this->db->get_where('gallery', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }

        $Q->free_result();
        return $data;
    }

    function updateImageToAlbum() {
        $dt = date("Y-m-d_h-i-sa");
        $ext_file = pathinfo($_FILES['imageName']['name'], PATHINFO_EXTENSION);
        $ext_file = strtolower($ext_file);
        $img = $_POST['albumID'] . '_' . $dt . '.' . $ext_file;
        $img_tmp = $_FILES['imageName']['tmp_name'];
        $img_loc = $_SERVER['DOCUMENT_ROOT'] . '/assets/album/';

        $data = array(
            'imageName' => $img,
            'caption' => $_POST['caption'],
            'albumID' => $_POST['albumID'],
            'imageStatus' => $_POST['imageStatus']
        );

        move_uploaded_file($img_tmp, $img_loc . $img);

        /* $my_image1 = array();
          $my_image1 = $this->add_link_file('imageName');
          if ($my_image1 != 'No File Name') {
          $data['imageName'] = $my_image1['file_name'];
          } */

        $this->db->where('galleryID', $_POST['galleryID']);
        $this->db->update("gallery", $data);
    }

    function deleteImageToAlbum($galleryID) {
        $data = array('ImageStatus' => 'Inactive');
        $this->db->where('galleryID', $galleryID);
        $this->db->update('gallery', $data);
    }
}

?>
