<?php 

class Login_model extends CI_Model
{
  public $_table = 'tb_user';

  public function get_user($username)
  {
    $this->db->select('*');
    $this->db->from($this->_table);
    $this->db->where('username', $username);
    return $this->db->get()->result_array();
  }
}
