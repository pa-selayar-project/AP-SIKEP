<?php 

class Register_model extends CI_Model{
    public $_table = 'tb_user';

    public function input_data($data)
    {
      $this->db->insert($this->_table, $data);
    }
}