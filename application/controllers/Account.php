<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('account_model');
    error_reporting(0);
  }

  public function login()
  {
    $data['notification'] = 'no';
      if ($this->input->post('loginValidation')){
      $login = $this->account_model->loginValidation();
    if($login['status']==1 & ($this->input->post('captcha')==$this->session->userdata('result'))){
        $this->session->set_userdata($login['session']);
        redirect(base_url('dashboard'));
      } elseif($login['status']==1){
        $data['notification'] = 'captchaWrong';
      } else {
        $data['notification'] = 'loginError';
      }
    }
//    var_dump($this->session->userdata['result']);die;
    $captcha = $this->account_model->createCaptcha();
    $this->session->set_userdata($captcha);
    $this->load->view('login', $data);
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('login'));
  }

  public function forgotPassword()
  {
    $data['notification'] = 'no';
    if ($this->input->post('resetPassword')) {
      $account = $this->account_model->findAccountByUsername();
      if($account['status']==1 && ($this->input->post('captcha')==$this->session->userdata('result'))){
        $data['notification'] = 'resetPasswordSuccess';
      } elseif($account['status']==1){
        $data['notification'] = 'captchaWrong';
      } else {
        $data['notification'] = 'usernameWrong';
      }
    }
    $captcha = $this->account_model->createCaptcha();
    $this->session->set_userdata($captcha);
    $this->load->view('forgotPassword', $data);
  }

  public function dashboard()
  {
    $data['title'] = 'Dashboard';
    $data['view_name'] = 'no';
    $data['notification'] = 'loginSuccess';
    $this->load->view('template', $data);
  }

  public function profile()
  {
    $data['notification'] = 'no';
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
    $data['title'] = 'Profil';
    $data['view_name'] = 'profile';
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
