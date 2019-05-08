<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_model{
  public function __construct()
  {
    $this->load->database();
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
    return 1;
  }

  public function deleteData($table, $var, $val)
  {
    $where = array($var => $val);
    $query = $this->db->delete($table, $where);
    return $query;
  }

  public function getSomeData($table, $var, $val)
  {
    $where = array($var => $val );
    return $this->db->get_where($table, $where)->result();
  }

  //Functional


  //Application
  public function cKelayakanKP()
  {
    if ($this->session->superdosen==0) {
      $data['list'] = $this->getSomeData('view_kelayakan_kerjapraktik', 'id_dosen', $this->session->userdata['id']);
    } else if ($this->session->superdosen==1) {
      $data['list'] = $this->getAllData('view_kelayakan_kerjapraktik');
    }
    $data['title'] = 'List Kelayakan KP';
    $data['view_name'] = 'kelayakanKP';
    $data['notification'] = 'kelayakanKP';
    return $data;
  }

  public function accKKP($id)
  {
    $this->deleteData('kelayakan_kerjapraktik', 'id_mahasiswa', $id);
    $this->updateData('account_mahasiswa', ' id', $id, 'skp', 2);
    $this->sentEmail($id, 'Fitur KP Sudah Aktif', 'Bersamaan dengan email ini, kami informasikan bahwa fitur KP kamu sudah aktif, silahkan dicek ke http://www.sista.co.id');
  }

  public function accKKPAll()
  {
    foreach ($this->getAllData('kelayakan_kerjapraktik') as $item) {
      $this->accKKP($item->id_mahasiswa);
    }

  }

}
 ?>
