<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warehouse_model extends CI_model{
  public function __construct()
  {

  }

  public function getAllData($table)
  {
    $query = $this->db->get($table);
    return $query->result();
  }

  public function createItem()
  {
    $data = array(
      'item' => $this->input->post('item'),
      'stock' => $this->input->post('stock'),
      'id_pic' => $this->session->userdata['id'],
     );

     $this->db->insert('item', $data);
     $this->updateStockItem($this->db->insert_id(), $this->input->post('stock'));
  }

  public function updateStockItem($id_item, $qty_in)
  {
    $data = array(
      'id_item' => $id_item,
      'qty_in' => $qty_in,
      'id_pic' => $this->session->userdata['id'],
      'information' => 'Barang masuk ke gudang ',
      'batch' => $this->input->post('batch')
     );
     $this->db->insert('update_stock', $data);
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

  public function updateItem($id)
  {
    $where = array('id' => $id);
    $data = array('item' => $this->input->post('item'));
    $this->db->where($where);
    $this->db->update('item', $data);
  }

  public function checkOrder($id_item, $qty_out)
  {
    $where = array(
      'id_item' => $id_item,
//      'status' => 0
     );
    $query = $this->db->get_where('view_difference_order', $where);
    if($qty_out<=$query->row('qty_diff') || $query->num_rows()==0){
      $status = 0;
    } else {
      $status = 1;
    }
    return $status;
  }


  public function getSelectedData($var, $arg, $table)
  {
    $where = array($var => $arg);
    $query = $this->db->get_where($table, $where);
    return $query->row();
  }

  public function checkBatch($id_item, $batch)
  {
    $where = array(
      'id_item' => $id_item,
      'batch' => $batch
     );
     $query = $this->db->get_where('update_stock', $where);
     return $query->num_rows();
  }


  public function createItemOut()
  {
    #var_dump($this->input->post('id_item').' = '.$this->input->post('qty_out').' = '.$this->input->post('batch'));die;
    $amount = $this->getDataRow($this->input->post('id_item'), 'view_item');
    $qtyStatus = $this->checkOrder($this->input->post('id_item'), $this->input->post('qty_out'));
    $batchStatus = $this->checkBatch($this->input->post('id_item'), $this->input->post('batch'));
    //var_dump($amount->stock <= $this->input->post('qty_out'));die;
    if ($amount->stock < $this->input->post('qty_out')) {
      $status = 0;
    } elseif ($qtyStatus == 1) {
      $status = 1;
    } elseif ($batchStatus == 0) {
      $status = 2;
    } else {
      $data = array(
        'id_item' => $this->input->post('id_item'),
        'qty_out' => $this->input->post('qty_out'),
        'batch' => $this->input->post('batch'),
        'status' => 1,
        'id_pic' => $this->session->userdata['id'],
        'information' => 'Barang keluar pada '.date('d-m-Y')
       );
      $this->db->insert('update_stock', $data);
      $this->checkDifference($this->input->post('id_item'));
      $status = 3;
    }
    return $status;
  }

  public function checkDifference($id_item)
  {
    $checkFull = $this->getSelectedData('id_item', $id_item, 'view_difference_order');
    if ($checkFull->qty_diff==0) {
      $this->updateStatusStock($this->input->post('id_item'), 1, 2);
      $this->updateStatusOrder($this->input->post('id_item'), 2, 3);

    }
    $query = $this->db->get('view_difference_order');
    if ($query->num_rows()==0) {
      $this->updateStatusGlobalInvoices(2,4);
    }
  }

  public function updateStatusStock($id_item, $from, $value)
  {
    $where = array(
      'id_item' => $id_item,
      'status' => $from
    );
    $data = array('status' => $value );
    $this->db->where($where);
    $this->db->update('update_stock', $data);
  }

  public function updateStatusOrder($id_item, $from, $value)
  {
    $where = array(
      'id_item' => $id_item,
      'status' => $from
    );
    $data = array('status' => $value );
    $this->db->where($where);
    $this->db->update('detail_order', $data);
  }

  public function updateStatusGlobalInvoices($from, $to)
  {
    $where = array('status' => $from);
    $data = array('status' => $to );
    $this->db->where($where);
    $this->db->update('global_invoice', $data);
  }

}
 ?>
