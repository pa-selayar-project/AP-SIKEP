<?php 

class Pengaturan_model extends CI_Model{
	public $_table = 'data_kode_surat';

    public function tambah()
    {
        $data = array('kode_surat' => $this->input->post('kodesurat', true),
                 'Ket_kode_surat' => $this->input->post('ket', true));
        
        $this->db->insert($this->_table, $data);
    }

    public function tampil()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        return $this->db->get()->result_array();
    }
}