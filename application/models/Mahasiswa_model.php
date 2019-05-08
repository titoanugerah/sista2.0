<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_model{
  public function __construct()
  {
    $this->load->database();
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
    return 1;
  }

  public function deleteData($table, $var, $val)
  {
    $where = array($var => $val);
    $query = $this->db->delete($table, $where);
    return $query;
  }

  //Functional


  //Application
  public function cStatusKP($notification)
  {
    $data['theme'] = $this->getAllData('view_tema');
    $data['title'] = 'Status Kerja Praktik';
    $data['view_name'] = 'statusKP'.$this->session->userdata['skp'];
    $data['notification'] = 'no';
    $data['dosen'] = $this->getAllData('account_dosen');

    return $data;
  }

  public function createKKP($id)
  {
    if ($this->input->post('id_dosen')!=0 && (($this->input->post('sksd')<=24)||($this->input->post('sksd')==''))) {
      if (($this->input->post('skss')>=110)||(($this->input->post('sksd')+($this->input->post('skss'))>=110))) {
        $data = array('id_mahasiswa' => $id, 'id_dosen'=> $this->input->post('id_dosen'), 'skss'=> $this->input->post('skss'), 'sksd'=> $this->input->post('sksd'));
        $data['status']=$this->db->insert('kelayakan_kerjapraktik', $data)+2;
        $this->updateData('account_mahasiswa', 'id', $id, 'skp', 1);
        $data['session'] = $this->account_model->setSession($this->session->userdata['id']);
      } else {$data['status']=2;}
    } else {$data['status']=2;}
    return $data;
  }

  public function cPrint($docs)
  {
    if ($docs==1) {
      $data['content'] = $this->getDataRow('view_kelayakan_kerjapraktik', 'id_mahasiswa', $this->session->userdata['id']);
    }
    return $data;
  }

  public function createKP()
  {

  }

}
 ?>
