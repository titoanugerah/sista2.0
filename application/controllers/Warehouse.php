<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warehouse Extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('warehouse_model');
    error_reporting(0);
    if (!$this->session->userdata['login']) {
      redirect(base_url('login'));
    } elseif ($this->session->userdata['role']!='warehouse') {
      redirect(base_url('error/501'));
    }
  }

  public function item()
  {
    $data['notification'] = 'no';
    if ($this->input->post('createItem')) {
      $this->warehouse_model->createItem();
      $data['notification'] = 'createItemSuccess';
    } elseif ($this->input->post('updateItem')) {
      $this->warehouse_model->updateStockItem($this->input->post('id_item'), $this->input->post('qty_in'));
      $data['notification'] = 'updateStockItemSuccess';
    }
    $data['list'] = $this->warehouse_model->getAllData('view_item');
    $data['title'] = 'Daftar Item';
    $data['view_name'] = 'item';
    $this->load->view('template', $data);
  }

  public function itemDetail($id)
  {
    $data['notification'] = 'no';
    if ($this->input->post('updateItem')) {
      $this->warehouse_model->updateItem($id);
    }
    $data['stock'] = $this->warehouse_model->getSomeData('id_item',$id,'view_stock');
    $data['detail'] = $this->warehouse_model->getDataRow($id,'view_item');
    $data['title'] = 'Detail Item ';
    $data['view_name'] = 'itemDetail';
    $this->load->view('template', $data);
  }

  public function globalOrder()
  {
    $data['notification'] = 'no';
    if ($this->input->post('itemOut')) {
      $itemOut = $this->warehouse_model->createItemOut();
      $data['notification'] = 'globalOrderNotification'.$itemOut;
    }
    $data['finish'] = $this->warehouse_model->getSomeData('status',3,'view_global_invoices');
    $data['order'] = $this->warehouse_model->getSomeData('status',2,'view_global_invoices');
    $data['handled'] = $this->warehouse_model->getAllData('view_difference_order');
    $data['title'] = 'Pesanan ';
    $data['view_name'] = 'globalOrder';
    $this->load->view('template', $data);
  }

}

 ?>
