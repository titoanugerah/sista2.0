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

  public function sentEmail($id, $subject, $message)
  {
    $account = $this->getDataRow('view_'.$this->getDataRow('account', 'id', $id)->role, 'id', $id);
    $emailConf = $this->getDataRow('webconf', 'id', 1);
    $config = [
      'protocol' => 'sentmail',
      'smtp_host' => $emailConf->host,
      'smtp_user' => $emailConf->username,
      'smtp_pass' => $emailConf->password,
      'smtp_crypto' => $emailConf->crypto,
      'charset' => 'utf-8',
      'crlf' => 'rn',
      'newline' => "\r\n", //REQUIRED! Notice the double quotes!
      'smtp_port' => $emailConf->port
    ];
    $this->load->library('email', $config);
    $this->email->from($emailConf->email);
    $this->email->to($account->email);
    $this->email->subject($subject);
    $this->email->message('
    Yth. '.$account->fullname.'
    Di tempat.

    '.$message.'

    Atas perhatiannya kami ucapkan terima kasih.

    Admin
    ');
    $sent = $this->email->send();
    error_reporting(0);
  }

  public function deleteData($table, $var, $val)
  {
    $where = array($var => $val);
    $query = $this->db->delete($table, $where);
    return $query;
  }

  //functional
  public function getRole($id)
  {
    return $this->getDataRow('account', 'id', $id)->role;
  }


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

  public function createAccount()
  {
    $password = rand(100001,999999);
    $data = array('username' => $this->input->post('username'), 'role' => $this->input->post('role'), 'password'=>md5($password));
    $this->db->insert('account', $data);
    $id = $this->db->insert_id();
    $data = array('id' => $id, 'email' => $this->input->post('email'),'display_picture'=> 'no.jpg');
    $this->db->insert('account_'.$this->input->post('role'),$data);
    $content = "Bersamaan dengan email ini kami informasikan bahwa proses pendaftaran akun anda sudah berhasil, silahkan login ke http://sista.co.id/ dengan username :".$this->input->post('username')." dan password : ".$password;
    $status = $this->sentEmail($id, 'Selamat datang di SISTA', $content);
    return $status;
  }

  public function cDetailAccount($id, $notification)
  {
    $data['account'] = $this->admin_model->getDataRow('view_'.$this->getDataRow('account', 'id', $id)->role, 'id', $id);
    $data['title'] = 'Detail Akun @'.$data['account']->username;
    $data['view_name'] = 'detailAccount'.ucfirst($this->getDataRow('account', 'id', $id)->role);
    $data['notification'] = 'detailAccount'.$notification;
    return $data;
  }

  public function deleteAccount($id)
  {
    $this->deleteData('account', 'id', $id);
    return $this->deleteData('account_'.$getRole($id), 'id', $id);
  }

  //trash

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
