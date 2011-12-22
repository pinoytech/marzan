<?php

class Users extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  public function login()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_error_delimiters('<div class="ui-state-error ui-corner-all ui-widget-content">', '</div>');
    $this->form_validation->run();
    $this->load->view('users/login');
  }
}
