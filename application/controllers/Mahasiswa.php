<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mahasiswa_model');
	}

	public function statusKP()
	{
		$operation['status'] = 0;
//		if ($this->input->post('createAccount')) {$create = $this->admin_model->createAccount();}
		$data['content'] = $this->mahasiswa_model->cStatusKP($operation['status']);
		$this->load->view('template', $data);
	}

}
