<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packing extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('packing_model');
    error_reporting(0);
    if (!$this->session->userdata['login']) {
      redirect(base_url('login'));
    } elseif ($this->session->userdata['role']!='pick') {
      redirect(base_url('error/501'));
    }
  }

  public function packingOrder()
  {
    $data['list'] = $this->packing_model->getPackingOrder();
    $data['title'] = 'Permintaan Packing';
    $data['view_name'] = 'packingOrder';
    $data['notification'] = 'no';
    $this->load->view('template', $data);
  }

  public function detailPackingIn($id)
  {
    $data['list'] = $this->packing_model->getSomeData('id_global_invoice', $id, 'view_packing');
    #$data['checked'] = $this->packing_model->getCheckedItem($id);
    $data['title'] = 'Detail Order';
    $data['view_name'] = 'detailPackingIn';
    $data['notification'] = 'no';
    $this->load->view('template', $data);
  }

  public function checklistItem($id,$id_global_invoice)
  {
    $this->packing_model->updateStatusItem($id, 3, 4);
    $list = $this->packing_model->getUncheckItem($id_global_invoice);
    if ($list==0) {
      $this->packing_model->updateGlobalInvoice($id_global_invoice, 5);
      redirect(base_url('packingOrder'));
    } else {
      redirect(base_url('detailPackingIn/'.$id_global_invoice));
    }
  }

  public function detailPackingOrder($id)
  {
    $data['list'] = $this->packing_model->getSomeData('id_global_invoice', $id, 'view_dc_order');
    $data['title'] = 'Detail Order';
    $data['view_name'] = 'detailPackingOrder';
    $data['notification'] = 'no';
    $this->load->view('template', $data);
  }

  public function processPacking($id, $id_global_invoice)
  {
    $data['list'] = $this->packing_model->getSomeData('id_order', $id, 'view_detail_order');
    $data['title'] = 'Detail Order';
    $data['view_name'] = 'processPacking';
    $data['notification'] = 'no';
    $this->load->view('template', $data);
  }

  public function checklistPacking($id, $id_order, $id_global_invoice)
  {
    $this->packing_model->checklistPacking($id);
    $uncheck = $this->packing_model->checkUncheckedItem($id_order);
    if ($uncheck==0) {
      $uncheck = $this->packing_model->checkUncheckedOrder($id_global_invoice);
      if ($uncheck==0) {
        $this->packing_model->updateGlobalInvoice($id_global_invoice, 6);
        redirect(base_url('packingOrder'));
      } else {
        redirect(base_url('detailPackingOrder/'.$id_global_invoice));
      }
    } else {
      redirect(base_url('processPacking/'.$id_order.'/'.$id_global_invoice));
    }
  }

}

 ?>
