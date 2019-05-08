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
		if ($this->input->post('createKKP')) {$operation = $this->mahasiswa_model->createKKP($this->session->userdata['id']);$this->session->set_userdata($operation['session']);}
		elseif ($this->input->post('createKP')) {$operation = $this->mahasiswa_model->createKP();$this->session->set_userdata($operation['session']);}
		$data['content'] = $this->mahasiswa_model->cStatusKP($operation['status']);
		$this->load->view('template', $data);
	}

	public function print($docs)
	{
		$data = $this->mahasiswa_model->cPrint($docs);
		$this->load->view('mahasiswa/printK'.$docs, $data);
	}

}
