<?php
class Model_financialHighlights extends CI_Model
{
  function __construct()
  {
    // Call the Model constructor
    parent::__construct();
  }

  function getHighlights()
  {
    $data[0] = 'root';
    $this->db->where('id', 0);
    $Q = $this->db->get('financial_highlights');

    if ($Q->num_rows() > 0) {
      foreach ($Q->result_array() as $row) {
        $data[$row['id']] = $row['particular'];
      }
    }
    $Q->free_result();
    return $data;
  }

  function getColumnNames()
  {
    $data = array();
    $Q = $this->db->get('financial_highlights');

    if ($Q->num_rows() > 0) {
      foreach ($Q->result_array() as $row) {
        // $data[$row['id']] = $row['particular'];
        $data['column_name'][] = $row['particular'];
      }
    }
    $Q->free_result();

    return $data;
  }

  function getAllHighlights()
  {
    $data = array();
    $Q = $this->db->get('financial_highlights');

    if ($Q->num_rows() > 0) {
      foreach ($Q->result_array() as $row) {
        $data[] = $row;
      }
    }
    $Q->free_result();
    return $data;
  }

  function getTopHighlights($id)
  {
    $data = array();
    $options = array('id' => $id);
    $Q = $this->db->get_where('financial_highlights', $options, 1);
    //if ($Q->num_rows() > 0) {
      $data = $Q->row_array();
    //}
    $Q->free_result();
    return $data;
  }

  function addHighlights()
  {
    $data = array(
      'serial' => $_POST['serial'],
      'particular' => $_POST['particular'],
      '2019' => $_POST['2019'],
      '2018' => $_POST['2018'],
      '2017' => $_POST['2017'],
      '2016' => $_POST['2016'],
      '2015' => $_POST['2015']
    );
    $this->db->insert('financial_highlights', $data);
  }

  function addNewYear()
  {
    $new_year = $_POST['year'];
    $query = "ALTER TABLE `financial_highlights` ADD COLUMN `". $new_year ."` VARCHAR(20) NOT NULL AFTER `particulars`";
    $this->db->query($query);   
  }

  function updateHighlights()
  {
    array_pop($_POST);
    $this->db->where('id', $_POST['id']);
    $this->db->update('financial_highlights', $_POST);
  }

  function deleteHighlights($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('financial_highlights');
    
  }

  function exportCsv()
  {
    $this->load->dbutil();
    $Q = $this->db->query("select * from ms_categories");
    return $this->dbutil->csv_from_result($Q, ",", "\n");
  }
}
