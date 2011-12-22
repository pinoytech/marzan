<?php

class Migrations extends CI_Controller {


  public function __contruct()
  {
    parent::__construct();
  }

  public function migrate ()
  {
    $this->load->library('migration');
    
    if ( ! $this->migration->current())
    {
      show_error($this->migration->error_string());
    }
  }
}
