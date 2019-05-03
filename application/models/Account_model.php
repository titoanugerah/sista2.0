<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_model{

  public function __construct()
  {

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

  //functional
  public function findUsername($username)
  {
    $data['status'] = $this->getNumRows('account', 'username', $username);
    if ($data['status']==1) {
      $data['account'] = $this->getDataRow('account', 'username', $username);
    }
    return $data;
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

  //application
  public function cLogin($notification)
  {
    if ($notification=='' && $notification!=0) {
      $notification = 1;
    }
    $data['notification'] = 'login'.$notification;
    $data['webconf'] = $this->getDataRow('webconf', 'id', 1);
    return $data;
  }

  public function loginValidation()
  {
    $data['status'] = $this->getNumRows2('account', 'username', $this->input->post('username'), 'password', md5($this->input->post('password')));
    if ($data['status']==1) {
      $query = $this->getDataRow2('account', 'username', $this->input->post('username'), 'password', md5($this->input->post('password')));
      $account = $this->getDataRow('view_'.$query->role,'id', $query->id);
      if ($query->role=='admin') {
        $data['account'] = array(
          'login' => true,
          'role' => $query->role,
          'id' => $account->id,
          'username' => $account->username,
          'password' => $account->password,
          'fullname' => $account->fullname,
          'email' => $account->email,
          'nip' => $account->nip,
          'display_picture' => $account->display_picture,
         );
      } elseif ($query->role=='dosen') {
        $data['account'] = array(
          'login' => true,
          'role' => $query->role,
          'id' => $account->id,
          'username' => $account->username,
          'password' => $account->password,
          'fullname' => $account->fullname,
          'email' => $account->email,
          'nip' => $account->nip,
          //tambahin
         );
      } elseif ($query->role=='mahasiswa') {
        $data['account'] = array(
          'login' => true,
          'role' => $query->role,
          'id' => $account->id,
          'username' => $account->username,
          'password' => $account->password,
          'fullname' => $account->fullname,
          'email' => $account->email,
          'nip' => $account->nip,
          //tambahin
         );
      }
    }
    return $data;
  }

  public function cForgotPassword($notification)
  {
    $data['notification'] = 'fpass'.($notification);
    return $data;
  }

  public function resetPassword()
  {
    $validation = $this->findUsername($this->input->post('username'));
    if ($validation['status']==1) {
      $newPassword = rand(100001,999999);
      $this->updateData('account', 'id', $validation['account']->id, 'password', md5($newPassword));
      $content = ' Bersamaan dengan email ini kami informasikan bahwa proses reset password anda berhasil, password baru anda adalah = '.$newPassword.'. silahkan kunjungi halaman http://sista.co.id';
      $this->sentEmail($validation['account']->id, 'Reset Password SISTA', $content);
    }
    return $validation['status'];
  }


  public function resetPassword1($id)
  {
    $newPassword = rand(100000, 999999);
    $data = array(
      'password' => md5($newPassword)
    );
    $where = array('id' => $id);
    $this->db->where($where);
    $this->db->update('account', $data);
    $message = "Bersamaan dengan email ini kami informasikan bahwa password akun anda berhasil direset, password baru anda adalah ".$newPassword;
    $this->sentEmail($id, $message);
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
