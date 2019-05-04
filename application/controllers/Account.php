<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    error_reporting(0);
    $this->load->model('account_model');
  }

  public function login()
  {
    if ($this->input->post('loginValidation')) {
      $account = $this->account_model->loginValidation();
      $status = $account['status'];
      if ($status==1) {$this->session->set_userdata($account['account']); redirect(base_url('dashboard'));} else {  $data['content'] = $this->account_model->cLogin($status);}
    } else {
      $data['content'] = $this->account_model->cLogin(1);
    }
    $this->load->view('login', $data);
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('login/4'));
  }

  public function forgotPassword()
  {
    $data['content'] = $this->account_model->cForgotPassword(1);
    if ($this->input->post('resetPassword')) {
      $account = $this->account_model->resetPassword();
      $data['content'] = $this->account_model->cForgotPassword($account+1);
    }
    $this->load->view('forgotPassword', $data);
  }

  public function dashboard()
  {
    $data['title'] = 'Dashboard';
    $data['view_name'] = 'no';
    $data['notification'] = 'login2';
    $this->load->view('template', $data);
  }

  public function profile()
  {
    $data['content'] = $this->account_model->cProfile(0);
    if ($this->input->post('updateAccount')) {
      $update = $this->account_model->updateAccount();
      if ($update['status']==1) {
        $this->session->set_userdata($update['session']);
        $data['notification'] = 'updateSuccess';
      } else {
        $data['notification'] = 'updateError';
      }
    } elseif ($this->input->post('uploadFile')) {
      $data['upload'] = $this->account_model->uploadPicture();
      $data['notification'] = 'uploadStatus'.$data['upload']['status'];
      $this->session->set_userdata($data['upload']['session']);
    }
    $this->load->view('template', $data);
  }

  public function error($id)
  {
    $data['title'] = 'Error';
    $data['view_name'] = 'no';
    $data['notification'] = 'error'.$id;
    $this->load->view('template', $data);
  }

  public function error404()
  {
    $data['title'] = 'Error';
    $data['view_name'] = 'no';
    $data['notification'] = 'error404';
    $this->load->view('template', $data);
  }
}

 ?>
