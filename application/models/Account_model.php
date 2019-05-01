<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_model{

  public function __construct()
  {

  }

  public function createCaptcha()
  {
    $data['aCaptcha'] =  rand( 1 , 10 );
    $data['bCaptcha'] =  rand( 1 , 10 );
    $data['result'] = $data['aCaptcha'] + $data['bCaptcha'];
    return $data;
  }

  public function loginValidation()
  {
    $where = array(
      'username' => $this->input->post('username'),
      'password' => md5($this->input->post('password'))
     );
     $query = $this->db->get_where('account', $where);
     $account['status'] = $query->num_rows();
     $account['session'] = array (
       'login' => true,
       'id' => $query->row('id'),
       'username' => $query->row('username'),
       'password' => $query->row('password'),
       'fullname' => $query->row('fullname'),
       'email' => $query->row('email'),
       'phone' => $query->row('phone'),
       'display_picture' => $query->row('display_picture'),
       'other_info' => $query->row('other_info'),
       'role' => $query->row('role')
     );
     return $account;
  }

  public function getDataRow($id, $table)
  {
    $where = array('id' => $id);
    $query = $this->db->get_where($table, $where);
    return $query->row();
  }

  public function findAccountByUsername()
  {
    $where = array('username' => $this->input->post('username'));
    $query = $this->db->get_where('account', $where);
    $account['status'] = $query->num_rows();
    $this->resetPassword($query->row('id'));
    return $account;
  }

  public function resetPassword($id)
  {
    $newPassword = rand(1001, 9999);
    $data = array(
      'password' => md5($newPassword),
      'other_info' => $newPassword
    );
    $where = array('id' => $id);
    $this->db->where($where);
    $this->db->update('account', $data);
    $message = "Bersamaan dengan email ini kami informasikan bahwa password akun anda berhasil direset, password baru anda adalah ".$newPassword;
    $this->sentEmail($id, $message);
  }

  public function sentEmail($id, $message)
  {
    $account = $this->getDataRow($id, 'account');
    $emailConf = $this->getDataRow(1, 'webconf');
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
    $this->email->from('admin@sipmaft.com');
    $this->email->to($account->email);
    $this->email->subject('Password baru akun Wardah');
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

  public function updateAccount()
  {
    $where = array('id' => $this->session->userdata['id']);
    if ($this->input->post('password')=="") {
      $data = array(
        'username' => $this->input->post('username'),
        'fullname' => $this->input->post('fullname'),
        'phone' => $this->input->post('phone'),
        'email' => $this->input->post('email')
      );
    } else {
      $data = array(
        'username' => $this->input->post('username'),
        'password' => md5($this->input->post('password')),
        'fullname' => $this->input->post('fullname'),
        'phone' => $this->input->post('phone'),
        'email' => $this->input->post('email')
      );
    }
    $this->db->where($where);
    $account['status'] = $this->db->update('account', $data);
    $query = $this->getDataRow($this->session->userdata['id'], 'account');
    $account['session'] = array (
      'login' => true,
      'id' => $query->id,
      'username' => $query->username,
      'password' => $query->password,
      'fullname' => $query->fullname,
      'email' => $query->email,
      'phone' => $query->phone,
      'display_picture' => $query->display_picture,
      'other_info' => $query->other_info,
      'role' => $query->role
    );
    return $account;

  }

  public function uploadPicture()
  {
    $config['upload_path']   = APPPATH.'../assets/upload/';
    $config['overwrite'] = TRUE;
    $config['file_name']     = "display_picture_".$this->session->userdata['id'];
    $config['allowed_types'] = 'jpg|png';
    $config['max_width']  = 800;
    $config['max_height'] = 800;
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('image_address')) {
      $upload['status']=0;
      $upload['message']= "Mohon maaf terjadi error saat proses upload : ".$this->upload->display_errors();
    } else {
      $upload['status']=1;
      $upload['session'] = $this->updateImage($this->session->userdata['id'], $config['file_name']);
      $upload['message'] = "Lampiran berhasil di upload";
    }
    return $upload;
  }

  public function updateImage($id, $filename)
  {
    $where = array('id' => $id);
    $data = array('display_picture' => $filename.'.jpg');
    $this->db->where($where);
    $this->db->update('account', $data);
    $query = $this->getDataRow($this->session->userdata['id'], 'account');
    $account['session'] = array (
      'login' => true,
      'id' => $query->id,
      'username' => $query->username,
      'password' => $query->password,
      'fullname' => $query->fullname,
      'email' => $query->email,
      'phone' => $query->phone,
      'display_picture' => $query->display_picture,
      'other_info' => $query->other_info,
      'role' => $query->role
    );
    return $account;
  }

}

 ?>
