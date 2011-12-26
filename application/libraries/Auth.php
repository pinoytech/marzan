<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth
{
  var $CI;
  var $config;

  function __construct()
  {
    $this->CI =& get_instance();
    $this->CI->load->model('user_model', 'user', TRUE);
    $this->config['salt_pattern'] = preg_split('/,\s*/', $this->CI->config->item('salt_pattern'));
  }

  function restrict($role = NULL)
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
    if ($result = $this->CI->user->login($username, $this->hash_password($password, $this->find_salt($password))))
    {
      $this->CI->session->set_userdata('user_id', $result->users_id);
      $this->CI->session->set_userdata('username', $result->username);
      $this->CI->session->set_userdata('logged_in', TRUE);
      session_start();
      $_SESSION['logged_in'] = TRUE;
      return TRUE;
    }
    return FALSE;
  
  } // function login()

  function hash_password($password = '', $salt)
  {
    $last_offset = 0;

    // Password hash that the salt will be inserted into
    $hash = sha1($salt.$password);

    // Change salt to an array
    if ( ! function_exists('str_split'))
    {
      $salt = $this->str_split($salt, 1);
    }
    else
    {
      $salt = str_split($salt, 1);
    }

    // Returned password
    $password = '';

    // Used to calculate the length of splits
    $last_offset = 0;

    foreach ($this->config['salt_pattern'] as $offset)
    {
      // Split a new part of the hash off
      $part = substr($hash, 0, $offset - $last_offset);
 
      // Cut the current part out of the hash
      $hash = substr($hash, $offset - $last_offset);
 
      // Add the part to the password, appending the salt character
      $password .= $part.array_shift($salt);
 
      // Set the last offset to the current offset
      $last_offset = $offset;
    }
    return $password.$hash;
  }

  function str_split($str)
  {
    $str_array = array();

    $len = strlen($str);

    for($i=0; $i<$len; $i++)
    {
      $str_array[] = $str{$i};
    }
    return $str_array;
  }

  function find_salt($password)
  {
    $salt = '';

    foreach ($this->config['salt_pattern'] as $i => $offset)
    {
      // Find salt characters, take a good long look...
      $salt .= substr($password, $offset + $i, 1);
    }

    return $salt;
  }

  function set_role($role, $id)
  {
    if ($role == 'login')
    {
      $this->CI->user->set_role(array(1), $id);
    }
    elseif ($role == 'admin')
    {
      $this->CI->user->set_role(array(1, 2), $id);
    }
    else
    {
      $this->CI->user->set_role(array(), $id);
    }
  }

  function update($data, $id)
  {
    if (isset($data['password']))
    {
      $data['password'] = $this->hash_password($data['password'], $this->find_salt($password));
    }

    if ($data['role'] == '1')
    {
      $this->set_role('login', $id);
    }
    elseif ($data['role'] == '2')
    {
      $this->set_role('admin', $id);
    }
    else
    {
      $this->set_role('banned', $id);
    }

    unset($data['role']);

    if (count($data) > 1)
    {
      return $this->CI->user->update($data, $id);
    }
  }

  function logout()
  {
    $this->CI->session->unset_userdata('user_id');
    $this->CI->session->unset_userdata('username');
    $this->CI->session->unset_userdata('logged_in');
    session_start();
    $_SESSION['logged_in'] = FALSE;
    return TRUE;

  } // function logout()
	
  function register($username, $password)
  {
    if (isset($password))
    {
      $password = $this->hash_password($password, $this->find_salt($password));
    }

    return $this->CI->user->register($username, $password);
  } // function register()

} // class Auth
