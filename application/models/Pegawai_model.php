<?php 

class Pegawai_model extends CI_Model{
	public $_table = 'tb_pegawai';

	public function getAllpegawai()
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('data_jabatan', 'tb_pegawai.id_jabatan = data_jabatan.id_jabatan');
		$this->db->join('data_pangkat', 'tb_pegawai.id_pangkat = data_pangkat.id_pangkat');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('data_jabatan', 'tb_pegawai.id_jabatan = data_jabatan.id_jabatan');
		$this->db->join('data_pangkat', 'tb_pegawai.id_pangkat = data_pangkat.id_pangkat');
		$this->db->where('no_pgw', $id);
		return $this->db->get()->result_array();
	}

	public function tambah()
	{
		$data = array(
               'no_pgw' => uniqid(),
               'id_pangkat' => $this->input->post("id_pangkat", true),
               'id_jabatan' => $this->input->post("id_jabatan", true),
               'nama_pegawai' => $this->input->post("nama_pegawai", true),
               'nip_pegawai' => $this->input->post("nip_pegawai", true),
			   'tmt_pegawai' => $this->input->post("tmt_pegawai", true),
			   'tmt_pangkat_terakhir' => $this->input->post("tmt_pangkat", true),
               'hp_pegawai' => $this->input->post("hp_pegawai", true),
               'foto_pegawai' => $this->input->post("foto_pegawai", true),
			   'alamat_pegawai' => $this->input->post("alamat_pegawai", true),
			   'created_at' => date('Y-m-d H:i:s'),
			   'updated_at' => '0000-00-00 00:00:00',
			   'deleted_at' => '0000-00-00 00:00:00'
			);
		$this->db->insert($this->_table, $data);
	}

	public function edit()
	{
		$data = array(
			'id_pangkat' => $nomor_surat,
			'id_jabatan' => $this->input->post("tgl_srt", true),
			'nama_pegawai' => $ditugaskan,
			'nip_pegawai' => $this->input->post("dasar_st", true),
			'tmt_pegawai' => $this->input->post("dasar_st", true),
			'tmt_pangkat_terakhir' => $this->input->post("pertimbangan", true),
			'hp_pegawai' => $this->input->post("maksud", true),
			'foto_pegawai' => $this->input->post("ket", true),
			'alamat_pegawai' => $this->input->post("penandatangan", true),
			'updated_at' => date('Y-m-d H:i:s'),
		);
		$this->db->update($this->_table, $data);
	}
	
	public function hapus($id)
	{
		$this->db->where('no_pgw', $id);
		$this->db->update($this->_table, array('deleted_at' => date("Y-m-d H:i:s")));
	}

	public function getKetua()
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->where('id_jabatan', '1');
		return $this->db->get()->result_array();
	}
}