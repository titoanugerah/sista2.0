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

  public function updateWallpaper()
  {
    $status['upload'] = $this->uploadPicture('login_image');
    $status['status'] = $status['upload']['status'];
    $this->updateData('webconf', 'id', 1, 'login_image', 'login_image.jpg');
    return $status;
  }

  public function cAccount($notification)
  {
    $data['mahasiswa'] = $this->admin_model->getAllData('view_mahasiswa');
    $data['dosen'] = $this->admin_model->getAllData('view_dosen');
    $data['title'] = 'Pengaturan Akun';
    $data['view_name'] = 'account';
    $data['notification'] = 'account'.$notification;
    return $data;
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


}
 ?>
