<?php

class Admin_users extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('Auth');
  }

  public function index()
  {
    $this->load->model('user_model', 'user', TRUE);
    $data['users'] = $this->user->get(10);
    $this->load->vars($data);
    $this->load->view('admin/users/index');
  }
}
