<?php

class User_model extends CI_Model {

  var $table = 'users';

  function __constructl()
  {
    parent::__construct();
  }
  
  function has_role($roles, $user_id)
  {
    $this->db->join('roles_users', 'roles_users.user_id = users.id');
    $this->db->join('roles', 'roles.id = roles_users.role_id');
    if (is_array($roles))
    {
      $this->db->where(array('users.id' => $user_id));
      $this->db->where_in('role', $roles);
    }
    else
    {
      $this->db->where(array('role' => $roles, 'users.id' => $user_id));
    }
    
    $count = (int) $this->db->count_all_results('users');
    
    // echo $this->db->last_query();
    if ($count > 0)
    {
      return TRUE;
    }
    return FALSE;
  }
  
  function login($username, $password)
  {
    $this->db->select('users.id as users_id, users.username');
    $this->db->join('roles_users', 'roles_users.user_id = users.id');
    $this->db->join('roles', 'roles.id = roles_users.role_id');
    $query = $this->db->get_where('users', array('username' => $username, 'password' => $password, 'role' => 'login'));
    
    if ($query->num_rows() > 0)
    {
      return $query->row();
    }
    return FALSE;
  }
  
  function register($username, $password)
  {
    $this->db->query('INSERT INTO '.$this->db->dbprefix('users').' (username, password) VALUES(?, ?)', array($username, $password));
    
    if ($this->db->affected_rows())
    {
      $id = $this->db->insert_id();
  
      $this->db->insert('roles_users', array('role_id' => 1, 'user_id' => $id));
      $this->db->insert('roles_users', array('role_id' => 2, 'user_id' => $id));
  
      return TRUE;
    }
    return FALSE;
  }
  
  function create($post = array())
  {
  	$this->db->insert($this->table, $post);
  
  	if ($this->db->affected_rows())
  	{
  		$id = $this->db->insert_id();
  
  		$this->db->insert('roles_users', array('role_id' => 1, 'user_id' => $id));
  
  		return TRUE;
  	}
  	return FALSE;
  }
  
  function update($post = array(), $id = '')
  {
  	if ($id == '')
  	{
  		return FALSE;
  	}
  
  	if ($post['password'] == '')
  	{
  		unset($post['password']);
  	}
  
  	$this->db->update($this->table, $post, array('id' => $id));
  
  	if ($this->db->affected_rows())
  	{
  		return TRUE;
  	}
  	return FALSE;
  }
  
  function user_exists($username)
  {
  	$this->db->where(array('username' => $username));
  	$result = $this->db->count_all_results('users');
  	$query = $this->db->query('SELECT COUNT(*) as numrows FROM ' .
  		$this->db->dbprefix('users') . ' WHERE username = ?', array($username));
  
  	$result = $query->row();
  
  	return $result > 0 ? TRUE : FALSE;
  }
  
  function get($limit = '', $offset = '')
  {
  	$this->db->where(array('deleted != ' => 1));
  	$query = $this->db->get('users', $limit, $offset);
  
  	if ($query->num_rows() > 0)
  	{
  		return $query->result();
  	}
  	return FALSE;
  }
  
  function get_user($id = '')
  {
  	if ($id == '')
  	{
  		return FALSE;
  	}
  
  	$this->db->select('id, username, fname, lname, address, email, phone, webpage, icq, yahoo, skype, msn');
  
  	$query = $this->db->get_where('users', array('id' => $id, 'deleted != ' => 1));
  
  	if ($query->num_rows() > 0)
  	{
  		return $query->row();
  	}
  	return FALSE;
  }
  
  function count($limit = NULL, $offset = NULL)
  {
  	if ( ! is_null($limit))
  	{
  		$this->db->limit($limit, $offset);
  	}
  
  	$this->db->where(array('deleted != ' => 1));
  	return $this->db->count_all_results($this->table);
  }
  
  function get_last_visit($user_id)
  {
  	$query = $this->db->get_where('user_tracks', array('user_id' => $user_id));
  
  	if ($query->num_rows() > 0)
  	{
  		return $query->row();
  	}
  	return FALSE;
  }
  
  function set_last_visit($user_id, $course_id, $section_id, $page = '')
  {
  	$this->db->where(array('user_id' => $user_id));
  	$count = $this->db->count_all_results('user_tracks');
  
  	if ($count)
  	{
  		$this->db->update('user_tracks', array('course_id' => $course_id, 'section_id' => $section_id, 'page' => $page), array('user_id' => $user_id));
  	}
  	else
  	{
  		$this->db->insert('user_tracks', array('user_id' => $user_id, 'course_id' => $course_id, 'section_id' => $section_id, 'page' => $page));
  	}
  }
  
  function delete($users = '')
  {
  	if ($users === '')
  	{
  		return FALSE;
  	}
  
  	if (is_array($users))
  	{
  		$this->db->where_in('id', $users);
  	}
  	else
  	{
  		$this->db->where('id', $users);
  	}
  	$this->db->delete($this->table);
  	$this->db->update($this->table, array('deleted' => 1));
  }
}

/* End of file users_model.php */
/* Location: ./application/models/users_model.php */
