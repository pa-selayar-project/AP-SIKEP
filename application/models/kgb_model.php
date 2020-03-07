<?php 

class Kgb_model extends CI_Model{
    public $_table = 'data_kgb';

    public function tambah()
    {
        if(!$this->input->post("no_kgb", true)){
            $nomor_surat = 'W20-A17/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/KP.04.2/'.$this->librari->getRomawi(date('m')).'/'.date('Y');    
        }else{
            $nomor_surat = 'W20-A17/'.$this->input->post("no_kgb", true).'/KP.04.2/'.$this->librari->getRomawi(date('m')).'/'.date('Y');    
        } 

        $data = array(
        'id_kgb' => uniqid(),
        'no_surat' => $nomor_surat,
        'tgl_surat' => $this->input->post("tgl", true),
        'id_pegawai' => $this->input->post("id_pegawai", true),
        'gaji_lama' => $this->input->post("gaji_lama", true),
        'pjbt_gaji_lama' => $this->input->post("pjbt_gaji_lama", true),
        'no_gaji_lama' => $this->input->post("no_kgb_lama", true),
        'tgl_gaji_lama' => $this->input->post("tgl_lama", true),
        'tmt_gaji_lama' => $this->input->post("tmt_lama", true),
        'mk_gol_lama'=> $this->input->post("mk_gol_lama", true),
        'satker_lama'=> $this->input->post("satker_lama", true),
        'gaji_baru'=> $this->input->post("gaji", true),
        'mk_gol'=> $this->input->post("mk_gol", true),
        'tmt'=> $this->input->post("tmt", true),
        'tmt_yad'=> date('Y-m-d', strtotime('+2 year', strtotime($this->input->post("tmt", true)))),
        'created_at' => date('Y-m-d'),
        'updated_at' => '0000-00-00 00:00:00',
        'deleted_at' => '0000-00-00 00:00:00'
        );
      $this->db->insert($this->_table, $data);
    }

    public function edit($id)
	{
       $data = array(
            'no_surat' => $this->input->post("no_kgb", true),
            'tgl_surat' => $this->input->post("tgl", true),
            'id_pegawai' => $this->input->post("id_pgw", true),
            'gaji_lama' => $this->input->post("gaji_lama", true),
            'pjbt_gaji_lama' => $this->input->post("pjbt_gaji_lama", true),
            'no_gaji_lama' => $this->input->post("no_kgb_lama", true),
            'tgl_gaji_lama' => $this->input->post("tgl_lama", true),
            'tmt_gaji_lama' => $this->input->post("tmt_lama", true),
            'mk_gol_lama'=> $this->input->post("mk_gol_lama", true),
            'satker_lama'=> $this->input->post("satker_lama", true),
            'gaji_baru'=> $this->input->post("gaji", true),
            'mk_gol'=> $this->input->post("mk_gol", true),
            'tmt'=> $this->input->post("tmt", true),
            'tmt_yad'=> date('Y-m-d', strtotime('+2 year', strtotime($this->input->post("tmt", true)))),
            'updated_at' => date('Y-m-d'),
        );
      $this->db->where('id_kgb', $id);
      $this->db->update($this->_table, $data);
    }

    public function detail_peg($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('tb_pegawai', 'data_kgb.id_pegawai = tb_pegawai.no_pgw');
        $this->db->where('id_pegawai', $id);
        $this->db->where('data_kgb.deleted_at =', '0000-00-00 00:00:00');
        return $this->db->get()->result_array();
    }

    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('tb_pegawai', 'data_kgb.id_pegawai = tb_pegawai.no_pgw');
        $this->db->where('id_kgb', $id);
        $this->db->where('data_kgb.deleted_at =', '0000-00-00 00:00:00');
        return $this->db->get()->result_array();
    }

     public function hapus($id)
   {
        $this->db->where('id_kgb', $id);
        $this->db->update($this->_table, array('deleted_at' => date("Y-m-d H:i:s")));  
   }

   public function hapus_permanen($id)
   {
        $this->db->delete($this->_table, array('id_kgb' => $id));  
   }

     public function hapus_pdf($id)
   {
        $this->db->where('id_kgb', $id);
        $this->db->update($this->_table, array('path' => ''));  
   }

    public function getPenandatangan($jab)
	{
        $this->db->select('nama_pegawai,nip_pegawai');
        $this->db->from('tb_pegawai');
        $this->db->join('data_jabatan', 'tb_pegawai.id_jabatan = data_jabatan.id_jabatan');
        $this->db->where('nama_jabatan', $jab);
		return $this->db->get()->result_array();
   }

    public function print($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('tb_pegawai', 'data_kgb.id_pegawai = tb_pegawai.no_pgw');
        $this->db->join('data_jabatan', 'tb_pegawai.id_jabatan = data_jabatan.id_jabatan');
		$this->db->join('data_pangkat', 'tb_pegawai.id_pangkat = data_pangkat.id_pangkat');
        $this->db->where('id_kgb', $id);
        return $this->db->get()->result_array();
    }

    public function upload($nama_file, $id)
    {
        $data = array('path' => $nama_file);
        $this->db->where('id_kgb', $id);
        $this->db->update($this->_table, $data);
    }

    public function trash()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('tb_pegawai', 'data_kgb.id_pegawai = tb_pegawai.no_pgw');
        $this->db->where('data_kgb.deleted_at !=', '0000-00-00 00:00:00');
        return $this->db->get()->result_array();
    }
}