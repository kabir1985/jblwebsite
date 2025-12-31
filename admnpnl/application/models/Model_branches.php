<?php

class Model_branches extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getBranch($br_id) {
        $data = array();
        $options = array('id' => $br_id);
        $Q = $this->db->get_where('jbl_branches', $options, 1);
        if ($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }

        $Q->free_result();
        return $data;
    }

    function getAllBranch() {
        $data = array();
        $Q = $this->db->get('jbl_branches');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    //////////////

    function getAllOnlineBranch() {
        $data = array();
        $this->db->where('isonlinebranch', 'yes');
        $Q = $this->db->get('jbl_branches');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    //////////////


    function getTopBranch() {
        $data[0] = 'root';
        $Q = $this->db->get('jbl_branches');
        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $data[$row['id']] = $row['branchname']; // I couldn't Understand............
            }
        }
        $Q->free_result();
        return $data;
    }

    function addBranch() {
        $data = array(
            'branchname' => $_POST['branchname'],
            'jbdvcode' => $_POST['jbdvcode'],
            'dvname' => $_POST['dvname'],
            'admindvcode' => $_POST['admindvcode'],
            'addvname' => $_POST['addvname'],
            'dtcode' => $_POST['dtcode'],
            'dtname' => $_POST['dtname'],
            'thcode' => $_POST['thcode'],
            'thname' => $_POST['thname'],
            'brcode' => $_POST['brcode'],
            'bbbrcode' => $_POST['bbbrcode'],
            'address' => $_POST['address'],
            'postname' => $_POST['postname'],
            'postcodereal' => $_POST['postcodereal'],
            'postcode' => $_POST['postcode'],
            'ucpcode' => $_POST['ucpcode'],
            'ucpname' => $_POST['ucpname'],
            'gradecode' => $_POST['gradecode'],
            'gradesname' => $_POST['gradesname'],
            'Opndate' => $_POST['Opndate'],
            'SwiftCode' => $_POST['SwiftCode'],
            'adcode' => $_POST['adcode'],
            'OfficePhone' => $_POST['OfficePhone'],
            'FAX' => $_POST['FAX'],
            'urcode' => $_POST['urcode'],
            'urname' => $_POST['urname'],
            'znname' => $_POST['znname'],
            'zncode' => $_POST['zncode'],
            'ucptypename' => $_POST['ucptypename'],
            'routingno' => $_POST['routingno'],
            'email' => $_POST['email'],
            'status' => $_POST['status']
        );

        $this->db->insert('jbl_branches', $data);
    }

    function updateBranch() {
        $data = array(
            'branchname' => $_POST['branchname'],
            'jbdvcode' => $_POST['jbdvcode'],
            'dvname' => $_POST['dvname'],
            'admindvcode' => $_POST['admindvcode'],
            'addvname' => $_POST['addvname'],
            'dtcode' => $_POST['dtcode'],
            'dtname' => $_POST['dtname'],
            'thcode' => $_POST['thcode'],
            'thname' => $_POST['thname'],
            'brcode' => $_POST['brcode'],
            'bbbrcode' => $_POST['bbbrcode'],
            'address' => $_POST['address'],
            'postname' => $_POST['postname'],
            'postcodereal' => $_POST['postcodereal'],
            'postcode' => $_POST['postcode'],
            'ucpcode' => $_POST['ucpcode'],
            'ucpname' => $_POST['ucpname'],
            'gradecode' => $_POST['gradecode'],
            'gradesname' => $_POST['gradesname'],
            'Opndate' => $_POST['Opndate'],
            'SwiftCode' => $_POST['SwiftCode'],
            'adcode' => $_POST['adcode'],
            'OfficePhone' => $_POST['OfficePhone'],
            'FAX' => $_POST['FAX'],
            'urcode' => $_POST['urcode'],
            'urname' => $_POST['urname'],
            'znname' => $_POST['znname'],
            'zncode' => $_POST['zncode'],
            'ucptypename' => $_POST['ucptypename'],
            'routingno' => $_POST['routingno'],
            'email' => $_POST['email'],
            'status' => $_POST['status']
        );
        $this->db->where('id', $_POST['id']);
        $this->db->update('jbl_branches', $data);
    }

    function deleteBranch($id) {
        $data = array(
            'status' => 'inactive');
        $this->db->where('id', $id);
        $this->db->update('jbl_branches', $data);
    }

}

?>