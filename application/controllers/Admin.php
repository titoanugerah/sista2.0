<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin_model');
    error_reporting(0);
    if (!$this->session->userdata['login']) {
      redirect(base_url('login'));
    } elseif ($this->session->userdata['role']!='admin') {
      redirect(base_url('error404'));
    }
  }

  public function webConf()
  {
    $update['status'] = 0;
    if ($this->input->post('updateEmail')) {$this->admin_model->updateEmail();}
    elseif ($this->input->post('updateWallpaper')) {$this->admin_model->updateWallpaper();}
    elseif ($this->input->post('resetWallpaper')) {$this->admin_model->updateData('webconf', 'id', 1, 'login_image', 'default.jpg');}
    $data['content'] = $this->admin_model->cWebConf($update['status']);
    $this->load->view('template', $data);
  }

  public function account()
  {
    $create['status'] = 0;
    if ($this->input->post('createAccount')) {$create = $this->admin_model->createAccount();}
    $data['content'] = $this->admin_model->cAccount($create['status']);
    $this->load->view('template', $data);
  }

  public function detailAccount($id)
  {
    $delete['status'] = 0;
    if ($this->input->post('deleteAccount')) {$delete = $this->admin_model->deleteAccount($id); redirect(base_url('account'));}
    elseif ($this->input->post('createKKP')) {$delete = $this->admin_model->createKKP($id);}
    elseif ($this->input->post('updateAccount')) {$delete = $this->admin_model->updateAccount($id);}
    $data['content'] = $this->admin_model->cDetailAccount($id, $delete['status']);
    $this->load->view('template', $data);
  }

  public function theme()
  {
    $operation['status'] = 0;
    if ($this->input->post('createTheme')) {$operation = $this->admin_model->createTheme($id);}
    $data['content'] = $this->admin_model->cTheme($operation['status']);
    $this->load->view('template', $data);
  }

  public function detailTheme($id)
  {
    $operation['status'] = 0;
    if ($this->input->post('updateTheme')) {$operation = $this->admin_model->updateTheme($id);}
    elseif ($this->input->post('deleteTheme')) {$operation = $this->admin_model->deleteTheme($id); if($operation['status']==5){redirect(base_url($operation['redirect']));}}
    $data['content'] = $this->admin_model->cDetailTheme($id, $operation['status']);
    $this->load->view('template', $data);

  }


}
 ?>
