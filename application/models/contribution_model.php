<?php

class Contribution_model extends CI_Model {
  function get($limit = '', $offset = '')
  {
    $query = $this->db->get('contributions', $limit, $offset);

    if ($query->num_rows() > 0)
    {
      return $query->result();
    }
    return FALSE;
  }
}
