<?php
function load_header()
{
  $CI =& get_instance();
  $CI->load->view('layouts/header');
}

function load_footer()
{
  $CI =& get_instance();
  $CI->load->view('layouts/footer');
}
