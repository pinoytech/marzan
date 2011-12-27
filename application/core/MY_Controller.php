<?php

class MY_Controller extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    // $this->output->enable_profiler(TRUE);
  }
}

require_once(APPPATH.'libraries/Admin_Controller.php');
require_once(APPPATH.'libraries/Public_Controller.php');

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
