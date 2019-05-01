<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packing_model extends CI_Model{
  public function __construct()
  {

  }

  public function getAllData($table)
  {
    $query = $this->db->get($table);
    return $query->result();
  }

  public function getDataRow($id, $table)
  {
    $where = array('id' => $id);
    $query = $this->db->get_where($table, $where);
    return $query->row();
  }

  public function getSomeData($row, $id, $table)
  {
    $where = array($row => $id);
    $query = $this->db->get_where($table, $where);
    return $query->result();
  }

  public function getPackingOrder()
  {
    $query = $this->db->query('select * from global_invoice where status>=3 and status<=6');
    return $query->result();
  }

  public function getCheckedItem($id)
  {
    $where = array(
      'id_global_invoice' => $id,
      'status' => 4
     );
     $query = $this->db->get_where('view_packing', $where);
     return $query->result();
  }

  public function updateStatusItem($id, $prevVal, $newVal)
  {
    $where = array(
      'id_item' => $id,
      'status' => $prevVal
    );
    $data = array('status' => $newVal);
    $this->db->where($where);
    $this->db->update('detail_order', $data);
  }

  public function getNumRows($arg, $val, $table)
  {
    $where = array($arg => $val);
    $query = $this->db->get_where($table, $where);
    return $query->num_rows();
  }

  public function getUncheckItem($id_global_invoice)
  {
    $where = array(
      'id_global_invoice' => $id_global_invoice,
      'status' => 3
    );
    $query = $this->db->get_where('view_packing', $where);
    return $query->num_rows();
  }

  public function updateGlobalInvoice($id_global_invoice, $val)
  {
    $where = array('id' => $id_global_invoice);
    $data = array('status' => $val);
    $this->db->where($where);
    $this->db->update('global_invoice', $data);
  }

  public function checklistPacking($id)
  {
    $where = array('id' => $id);
    $data = array('status' => 5);
    $this->db->where($where);
    $this->db->update('detail_order', $data);
  }

  public function checkUncheckedItem($id_order)
  {
    $where = array(
      'id_order' => $id_order,
      'status' => 4
    );
    $query = $this->db->get_where('detail_order', $where);
    return $query->num_rows();
  }

  public function checkUncheckedOrder($id_global_invoice)
  {
    $where = array(
      'id_global_invoice' => $id_global_invoice,
      'status' => 4
    );
    $query = $this->db->get_where('view_detail_order', $where);
    return $query->num_rows();
  }
}

 ?>
