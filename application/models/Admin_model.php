<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_model{

  public function __construct()
  {
    $this->load->model('account_model');
  }

  //core
  public function getAllData($table)
  {
    $query = $this->db->get($table);
    return $query->result();
  }

  public function getDataRow($table, $var, $val)
  {
    $where = array($var => $val);
    $query = $this->db->get_where($table, $where);
    return $query->row();
  }

  public function getDataRow2($table, $var1, $val1, $var2, $val2)
  {
    $where = array($var1 => $val1, $var2 => $val2);
    $data = $this->db->get_where($table, $where);
    return $data->row();
  }

  public function getNumRows($table, $var, $val)
  {
    $where = array($var => $val);
    $query = $this->db->get_where($table, $where);
    return $query->num_rows();
  }

  public function getNumRows2($table, $var1, $val1, $var2, $val2)
  {
    $where = array($var1 => $val1, $var2 => $val2);
    $data = $this->db->get_where($table, $where);
    return $data->num_rows();
  }

  public function updateData($table, $varWhere, $valWhere, $varSet, $valSet)
  {
    $where = array($varWhere => $valWhere);
    $data = array($varSet => $valSet);
    $this->db->where($where);
    $status = $this->db->update($table, $data);
    return $status;
  }

  public function uploadPicture($filename)
  {
    $config['upload_path'] = APPPATH.'../assets/upload/';
    $config['overwrite'] = TRUE;
    $config['file_name']     = $filename;
    $config['allowed_types'] = 'jpg|png';
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('fileUpload')) {
      $upload['status']=0;
      $upload['message']= "Mohon maaf terjadi error saat proses upload : ".$this->upload->display_errors();
    } else {
      $upload['status']=1;
      $upload['message'] = "File berhasil di upload";
    }
    return $upload;
  }

  //functional


  //application
  public function cWebConf($notification)
  {
    $data['config'] = $this->admin_model->getDataRow('webconf', 'id', 1);
    $data['title'] = 'Konfigurasi Website';
    $data['view_name'] = 'webConf';
    $data['notification'] = 'webConf'.$notification;
    return $data;
  }

  public function updateEmail()
  {
    $where = array('id' => 1 );
    $data = array(
      'host' => $this->input->post('host'),
      'username' => $this->input->post('username'),
      'password' => $this->input->post('password'),
      'port' => $this->input->post('port'),
      'crypto' => $this->input->post('crypto')
    );
    $this->db->where($where);
    $update['status']  = $this->db->update('webconf',$data);
    return $update;
  }



  //trash

  public function createAccount()
  {
    $data = array(
      'username' => $this->input->post('username'),
      'fullname' => $this->input->post('fullname'),
      'phone' => $this->input->post('phone'),
      'email' => $this->input->post('email'),
      'role' => $this->input->post('role'),
      'display_picture' => 'no.jpg',
      'password' => md5('0000')
     );

     $this->db->insert('account', $data);
     $this->account_model->sentEmail($this->db->insert_id(), "Akun anda berhasil dibuat, silahkan login dengan usename ".$this->input->post('username').' dengan password 0000');
  }

  public function deleteAccount($id)
  {
    $where = array('id' => $id);
    $this->db->delete('account',$where);
  }

  public function updateAccount($id)
  {
    $where = array('id' => $id );
    $data = array(
      'username' => $this->input->post('username'),
      'role' => $this->input->post('role'),
      'fullname' => $this->input->post('fullname'),
      'phone' => $this->input->post('phone'),
      'email' => $this->input->post('email')
    );
    $this->db->where($where);
    $this->db->update('account', $data);
  }

  public function createItem()
  {
    $data = array(
      'item' => $this->input->post('item'),
      'stock' => $this->input->post('stock'),
      'id_pic' => $this->session->userdata['id'],
     );

     $this->db->insert('item', $data);
     $this->updateStockItem($this->db->insert_id(), $this->input->post('stock'), $this->input->post('batch'));
  }

  public function updateStockItem($id_item, $qty_in, $batch)
  {
    $data = array(
      'id_item' => $id_item,
      'qty_in' => $qty_in,
      'id_pic' => $this->session->userdata['id'],
      'information' => 'Barang masuk ke gudang ',
      'batch' => $batch
     );
     $this->db->insert('update_stock', $data);
  }

  public function deleteItem($id)
  {
    $where = array('id' => $id );
    $this->db->delete('item', $where);
  }

  public function updateItem($id)
  {
    $where = array('id' => $id );
    $data = array(
      'item' => $this->input->post('item'),
  #    'stock' => $this->input->post('stock'),
     );
     $this->db->where($where);
     $this->db->update('item', $data);
  }

  public function updateStatus($table, $param, $id, $value)
  {
    $where = array($param => $id );
    $data = array('status' => $value );
    $this->db->where($where);
    $this->db->update($table, $data);
  }

}
 ?>
