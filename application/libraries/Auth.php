<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth
{
  var $CI;
  
  function __construct()
  {
    $this->CI =& get_instance();
    $this->CI->load->model('users_model', 'user', TRUE);
  }
  
  function logged_in($role = NULL)
  {
    if ( ! $this->CI->session->userdata('logged_in'))
    {
      return FALSE;
    }
  
    if ($this->CI->user->has_role($role, $this->CI->session->userdata('user_id')))
    {
      return TRUE;
    }
  
    return FALSE;
  } // function restrict()
  
  
  function login($username, $password)
  {
    if ($result = $this->CI->user->login($username, $this->hash($password)))
    {
      $this->CI->session->set_userdata('user_id', $result->users_id);
      $this->CI->session->set_userdata('username', $result->username);
      $this->CI->session->set_userdata('logged_in', TRUE);
      return TRUE;
    }
     return FALSE;
  } // function login()
  
  function hash($password)
  {
    return sha1(md5(strrev($password).$this->CI->config->item('encryption_key')).$password);
  }
  
  function logout()
  {
    $this->CI->session->unset_userdata('user_id');
    $this->CI->session->unset_userdata('username');
    $this->CI->session->unset_userdata('logged_in');
    return TRUE;
  } // function logout()
  
  function register($username, $password)
  {
    $this->CI->user->register($username, $this->hash($password));
  } // function register()

} // class Auth
