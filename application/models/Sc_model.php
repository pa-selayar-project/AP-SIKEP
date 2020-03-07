<?php 

class Sc_model extends CI_Model{
    public $_table = 'data_sc';

    public function tambah()
    {
        $sejak = $this->input->post("sejak", true);
        $sampai = $this->input->post("sampai", true);
        $jumlah = $this->librari->jumlahCuti($sejak, $sampai) - $this->input->post("tgl_merah", true);
        $nomor_surat = $this->input->post("no_surat", true);
        if($nomor_surat < 0 || $nomor_surat==NULL){
            $nomor_surat="W20-A17/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/KP.05.2/".$this->librari->getRomawi(date("m"))."/".date("Y");
        }else{
            $nomor_surat="W20-A17/".$this->input->post("no_surat", true)."/KP.05.2/".$this->librari->getRomawi(date("m"))."/".date("Y");
        }
        
        $data = array(
               'id_sc' => uniqid(),
               'nomor_surat' => $nomor_surat,
               'tgl_surat' => $this->input->post("tgl_sc", true),
               'id_pegawai' => $this->input->post("idPegawai", true),
               'tgl_sejak' => $sejak,
               'tgl_sampai' => $sampai,
               'jumlah_hari' => $jumlah,
               'alamat_cuti' => $this->input->post("alamat", true),
               'created_at' => $this->input->post(time(), true),
            );
      $this->db->insert($this->_table, $data);
    }

    public function edit($id)
	{
        $sejak = $this->input->post("sejak", true);
        $sampai = $this->input->post("sampai", true);
        $jumlah = $this->librari->jumlahCuti($sejak, $sampai) - $this->input->post("tgl_merah", true);
  		$data = array(
               'nomor_surat' => $this->input->post("no_surat", true),
               'tgl_surat' => $this->input->post("tgl_sc", true),
               'id_pegawai' => $this->input->post("idPegawai", true),
               'tgl_sejak' => $sejak,
               'tgl_sampai' => $sampai,
               'jumlah_hari' => $jumlah,
               'alamat_cuti' => $this->input->post("alamat", true),
               'updated_at' => $this->input->post(time(), true),
            );
      $this->db->join('tb_pegawai', 'data_sc.id_pegawai = tb_pegawai.no_pgw');
      $this->db->where('id_sc', $id);
      $this->db->update($this->_table, $data);
   }

    public function detail_by_peg($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('tb_pegawai', 'data_sc.id_pegawai = tb_pegawai.no_pgw');
        $this->db->join('data_jabatan', 'tb_pegawai.id_jabatan = data_jabatan.id_jabatan');
		$this->db->join('data_pangkat', 'tb_pegawai.id_pangkat = data_pangkat.id_pangkat');
        $this->db->where('id_pegawai', $id);
        $this->db->where('data_sc.deleted_at =', '0000-00-00 00:00:00');
        return $this->db->get()->result_array();
    }

    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('tb_pegawai', 'data_sc.id_pegawai = tb_pegawai.no_pgw');
        $this->db->where('id_sc', $id);
        return $this->db->get()->result_array();
    }

    public function print($id)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('tb_pegawai', 'data_sc.id_pegawai = tb_pegawai.no_pgw');
        $this->db->join('data_jabatan', 'tb_pegawai.id_jabatan = data_jabatan.id_jabatan');
		$this->db->join('data_pangkat', 'tb_pegawai.id_pangkat = data_pangkat.id_pangkat');
        $this->db->where('id_sc', $id);
        return $this->db->get()->result_array();
    }

     public function hapus($id)
   {
        $this->db->where('id_sc', $id);
        $this->db->update($this->_table, array('deleted_at' => date("Y-m-d H:i:s")));  
   }

   public function hapus_pdf($id)
   {
        $this->db->where('id_sc', $id);
        $this->db->update($this->_table, array('path' => ''));  
   }


    public function upload($nama_file, $id)
   {
        $data = array('path' => $nama_file);
        $this->db->where('id_sc', $id);
        $this->db->update($this->_table, $data);
   }
}