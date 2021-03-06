<?php

class Admin_financecollections extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('Auth');
  }

  public function index()
  {
    $this->load->model('contribution_model', 'contribution', TRUE);
    $data['contributions'] = $this->contribution->get(10);
    $this->load->vars($data);
    $this->load->view('admin/contributions/index');
  }

  public function add()
  {
    $this->load->model('collection_model', 'collection', TRUE);
    $this->load->view('admin/finance/collections/add');
  }
}
