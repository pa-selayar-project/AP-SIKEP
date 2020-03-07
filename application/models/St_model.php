<?php 

class St_model extends CI_Model
{
   public $_table = 'data_st';
   public $site_url = 'admin/surat_tugas';
   public $site_url2 = 'admin/surat_tugas_trash';
   public $id_surat, $no_surat, $tgl_surat, $ditugaskan, $menimbang, $dasar_surat,
      $maksud, $penandatangan, $keterangan;

   public function getSuratTugas($limit, $start)
   {
      $this->db->select('*');
      $this->db->from($this->_table);
      $this->db->where('deleted_at =', '0000-00-00 00:00:00');
      $this->db->limit($limit, $start);
      $query = $this->db->get();
      return $query->result_array();
   }

   public function trashSuratTugas($limit, $start)
   {
      $this->db->select('*');
      $this->db->from($this->_table);
      $this->db->where('deleted_at !=', '0000-00-00 00:00:00');
      $this->db->limit($limit, $start);
      $query = $this->db->get();
      return $query->result_array();
   }

   public function getDitugaskan($ditugaskan)
   {
      $this->db->select('*');
      $this->db->from('tb_pegawai');
      $this->db->join('data_jabatan', 'tb_pegawai.id_jabatan = data_jabatan.id_jabatan');
      $this->db->join('data_pangkat', 'tb_pegawai.id_pangkat = data_pangkat.id_pangkat');
      $this->db->where_in('nip_pegawai', $ditugaskan);
      return $this->db->get()->result_array();
   }

   public function detail($id)
   {
      $this->db->select('*');
      $this->db->from($this->_table);
      $this->db->where('id_surat', $id);
      return $this->db->get()->result_array();
   }

   public function tambah()
   {
      if ($this->input->post("no_st", true) == null) {
         $nomor_surat = 'W20-A17/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/' . $this->input->post("kode_st", true) . '/' . $this->librari->getRomawi(date("m")) . '/' . date("Y");
      } else {
         $nomor_surat = 'W20-A17 /' . $this->input->post("no_st", true) . '/' . $this->input->post("kode_st", true) . '/' . $this->librari->getRomawi(date("m")) . '/' . date("Y");
      }
      $ditugaskan = implode(',', $this->input->post('ditugaskan[]', true));

      $data = array(
         'id_surat' => uniqid(),
         'no_surat' => $nomor_surat,
         'tgl_srt' => $this->input->post("tgl_srt", true),
         'ditugaskan' => $ditugaskan,
         'dasar_surat' => $this->input->post("dasar_st", true),
         'menimbang' => $this->input->post("pertimbangan", true),
         'maksud' => $this->input->post("maksud", true),
         'ket' => $this->input->post("ket", true),
         'penandatangan' => $this->input->post("penandatangan", true)
      );
      $this->db->insert($this->_table, $data);
   }

   public function edit()
   {
      $ditugaskan = implode('|', $this->input->post('ditugaskan', true));
      $data = array(
         'no_surat' => $this->input->post("no_st", true),
         'tgl_srt' => $this->input->post("tgl_srt", true),
         'ditugaskan' => $ditugaskan,
         'dasar_surat' => $this->input->post("dasar_st", true),
         'menimbang' => $this->input->post("pertimbangan", true),
         'maksud' => $this->input->post("maksud", true),
         'ket' => $this->input->post("ket", true),
         'penandatangan' => $this->input->post("penandatangan", true)
      );
      $this->db->where('id_surat', $this->input->post("id_surat", true));
      $this->db->update($this->_table, $data);
   }

   public function hapus($id)
   {
      $this->db->where('id_surat', $id);
      $this->db->update($this->_table, array('deleted_at' => date("Y-m-d H:i:s")));
   }

   public function hapus_permanen($id)
   {
      $this->db->delete($this->_table, array('id_surat' => $id));
   }

   public function hapus_pdf($id)
   {
      $this->db->where('id_surat', $id);
      $this->db->update($this->_table, array('path' => ''));
   }

   public function upload($nama_file, $id)
   {
      $data = array('path' => $nama_file);
      $this->db->where('id_surat', $id);
      $this->db->update($this->_table, $data);
   }

   public function getPenandatangan($jab)
   {
      $this->db->select('nama_pegawai,nip_pegawai');
      $this->db->from('tb_pegawai');
      $this->db->join('data_jabatan', 'tb_pegawai.id_jabatan = data_jabatan.id_jabatan');
      $this->db->where('nama_jabatan', $jab);
      return $this->db->get()->result_array();
   }

   public function paging()
   {
      $this->db->where('deleted_at', '0000-00-00 00:00:00');
      $config['base_url'] = site_url($this->site_url); //site url
      $config['total_rows'] = $this->db->count_all_results($this->_table); //total row
      $config['per_page'] = 5;  //show record per halaman
      $config["uri_segment"] = 3;  // uri parameter
      $choice = $config["total_rows"] / $config["per_page"];
      $config["num_links"] = floor($choice);
      $config['first_link']       = 'First';
      $config['last_link']        = 'Last';
      $config['next_link']        = 'Next';
      $config['prev_link']        = 'Prev';
      $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
      $config['full_tag_close']   = '</ul></nav></div>';
      $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
      $config['num_tag_close']    = '</span></li>';
      $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
      $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
      $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
      $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['prev_tagl_close']  = '</span>Next</li>';
      $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
      $config['first_tagl_close'] = '</span></li>';
      $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['last_tagl_close']  = '</span></li>';
      return $this->pagination->initialize($config);
   }

   public function trash_paging()
   {
      $this->db->where('deleted_at !=', '0000-00-00 00:00:00');
      $config['base_url'] = site_url($this->site_url2); //site url
      $config['total_rows'] = $this->db->count_all_results($this->_table); //total row
      $config['per_page'] = 5;  //show record per halaman
      $config["uri_segment"] = 3;  // uri parameter
      $choice = $config["total_rows"] / $config["per_page"];
      $config["num_links"] = floor($choice);
      $config['first_link']       = 'First';
      $config['last_link']        = 'Last';
      $config['next_link']        = 'Next';
      $config['prev_link']        = 'Prev';
      $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
      $config['full_tag_close']   = '</ul></nav></div>';
      $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
      $config['num_tag_close']    = '</span></li>';
      $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
      $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
      $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
      $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['prev_tagl_close']  = '</span>Next</li>';
      $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
      $config['first_tagl_close'] = '</span></li>';
      $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['last_tagl_close']  = '</span></li>';
      return $this->pagination->initialize($config);
   }

   public function print($id)
   {
      $this->db->select('*');
      $this->db->from($this->_table);
      $this->db->where('id_surat', $id);
      return $this->db->get()->result_array();
   }
}
