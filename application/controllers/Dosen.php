<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dosen_model');
	}

	public function kelayakanKP()
	{
		$data['content'] = $this->dosen_model->cKelayakanKP();
		$this->load->view('template', $data);
	}

	public function accKKP($id)
	{
		if ($id=='all' & $this->session->userdata['superdosen']==1) {$this->dosen_model->accKKPAll();}
		else {$this->dosen_model->accKKP($id);}
		$this->kelayakanKP();
	}

}
