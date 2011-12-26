<?php

class Users extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('Auth');
  }

  public function login()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required|callback__authorization');
    $this->form_validation->set_error_delimiters('<div class="ui-state-error ui-corner-all ui-widget-content">', '</div>');
    if ($this->form_validation->run())
    {
      redirect('admin/front');
    }
    $this->load->view('users/login');
  }

  public function _authorization()
  {
    if ($this->auth->login($_POST['username'], $_POST['password']))
    {
      return TRUE;
    }
    else
    {
      $this->form_validation->set_message('_authorization', 'Username and Pasword is invalid');
      return FALSE;
    }
  }

  public function register()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required|matches[password]');
    $this->form_validation->set_error_delimiters('<div class="ui-state-error ui-corner-all ui-widget-content">', '</div>');

    if ($this->form_validation->run())
    {
      $this->auth->register($this->input->post('username'), $this->input->post('password'));
      redirect('users/login');
    }
    $this->load->view('users/register');
  }
}
