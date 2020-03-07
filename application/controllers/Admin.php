<?php 
class Admin extends CI_Controller
{
	/*Bagian Construct, otomatis dijalankan saat masuk*/
	public function __construct()
	{
		parent::__construct();
		$this->load->library('librari');
		$this->load->library('pagination');
		$this->load->library('form_validation');

		if (!$this->session->userdata('login')) {
			redirect('login');
		}
	}

	/*Bagian index halaman dashboard*/
	public function index()
	{
		$data['judul'] = 'Halaman Admin';
		$data['login'] = $this->session->userdata('login');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	/*Bagian Pegawai menangani tambah, hapus, edit, dan detail pegawai*/
	public function pegawai($param = null, $id = null)
	{
		if ($param && $id && $param != 'tambah' && $param != 'hapus') /* edit & detail */ {
			if ($this->form_validation->run($param) == false) {
				$data['judul'] = $param . ' Pegawai';
				$data['login'] = $this->session->userdata('login');
				($param != 'edit') ? $data['pegawai'] = $this->Pegawai_model->$param($id) : '';
				$data['pegawai'] = $this->Pegawai_model->detail($id);
				$this->load->view('templates/header', $data);
				$this->load->view('templates/nav', $data);
				$this->load->view('admin/pegawai/' . $param, $data);
				$this->load->view('templates/footer');
			} else {
				$this->Pegawai_model->$param();
				redirect('admin/pegawai/index');
			}
		} elseif ($param == 'tambah') {
			if ($this->form_validation->run($param . '_pegawai') == false) {
				$data['judul'] = 'Manajemen Pegawai';
				$data['login'] = $this->session->userdata('login');
				$data['pegawai'] = $this->Pegawai_model->getAllpegawai();
				$this->load->view('templates/header', $data);
				$this->load->view('templates/nav', $data);
				$this->load->view('admin/pegawai/' . $param);
				$this->load->view('templates/footer');
			} else {
				$this->Pegawai_model->$param();
				redirect('admin/pegawai/index');
			}
		} else {
			$data['judul'] = 'Daftar Pegawai';
			$data['login'] = $this->session->userdata('login');
			$data['pegawai'] = $this->Pegawai_model->getAllpegawai();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/nav', $data);
			$this->load->view('admin/pegawai/index', $data);
			$this->load->view('templates/footer');
		}
	}

	/*Bagian Kenaikan Gaji Berkala menangani tambah, hapus, edit, dan detail KGB*/
	public function kenaikan_gaji_berkala($param = null, $id = null)
	{
		if ($param == 'edit' && $id) /* edit */ {
			if (($this->form_validation->run('edit_kgb') == false)) {
				$data['judul'] = $param . ' Kenaikan Gaji Berkala';
				$data['login'] = $this->session->userdata('login');
				$data['kgb'] = $this->Kgb_model->detail($id);
				$this->load->view('templates/header', $data);
				$this->load->view('templates/nav', $data);
				$this->load->view('admin/kenaikan_gaji_berkala/' . $param, $data);
				$this->load->view('templates/footer');
			} else {
				$this->Kgb_model->$param($id);
				redirect('admin/kenaikan_gaji_berkala/index');
			}
		} elseif ($param == 'detail' && $id) /* detail*/ {
			$data['judul'] = $param . ' Kenaikan Gaji Berkala';
			$data['login'] = $this->session->userdata('login');
			$data['pegawai'] = $this->Pegawai_model->detail($id);
			$data['detail'] = $this->Kgb_model->detail_peg($id);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/nav', $data);
			$this->load->view('admin/kenaikan_gaji_berkala/' . $param, $data);
			$this->load->view('templates/modal_upload');
			$this->load->view('templates/modal_download');
			$this->load->view('templates/footer');
		} elseif (($param == 'tambah') && ($id)) /* tambah */ {
			if ($this->form_validation->run($param . '_kgb') == false) {
				$data['judul'] = $param . ' Kenaikan Gaji Berkala';
				$data['login'] = $this->session->userdata('login');
				$data['pegawai'] = $this->Pegawai_model->detail($id);
				$data['ketua'] = $this->Kgb_model->getPenandatangan('Ketua');
				$this->load->view('templates/header', $data);
				$this->load->view('templates/nav', $data);
				$this->load->view('admin/kenaikan_gaji_berkala/' . $param, $data);
				$this->load->view('templates/footer');
			} else {
				$this->Kgb_model->$param($id);
				redirect('admin/kenaikan_gaji_berkala/index');
			}
		} elseif (($param == 'hapus') && ($id)) /* hapus */ {
			$this->Kgb_model->$param($id);
			redirect('admin/kenaikan_gaji_berkala');
		} elseif (($param == 'hapus_permanen') && ($id)) /* hapus */ {
			$this->Kgb_model->$param($id);
			redirect('admin/trash/kenaikan_gaji_berkala');
		} elseif (($param == 'hapus_pdf') && ($id)) /* hapus pdf*/ {
			$this->Kgb_model->$param($id);
			redirect('admin/kenaikan_gaji_berkala');
		} else {
			$data['judul'] = 'Daftar Kenaikan Gaji Berkala';
			$data['login'] = $this->session->userdata('login');
			$data['pegawai'] = $this->Pegawai_model->getAllpegawai();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/nav', $data);
			$this->load->view('admin/kenaikan_gaji_berkala/index', $data);
			$this->load->view('templates/footer');
		}
	}

	/*Bagian Kenaikan Pangkat menangani tambah, hapus, edit, dan detail Kenaikan Pangkat*/
	public function kp()
	{
		$data['judul'] = 'Daftar Kenaikan Pangkat';
		$data['login'] = $this->session->userdata('login');
		$data['pegawai'] = $this->Pegawai_model->getAllpegawai();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
		$this->load->view('admin/kp/index', $data);
		$this->load->view('templates/footer');
	}

	/*Bagian Cuti Pegawai menangani tambah, hapus, edit, dan detail Cuti Pegawai*/
	public function surat_cuti($param = null, $id = null)
	{
		$this->load->model('Sc_model');
		if ($param && $id && $param != 'tambah' && $param != 'hapus') /* edit & detail */ {
			if (($this->form_validation->run($param . '_surat_cuti') == false)) {
				$data['judul'] = $param . ' Surat Cuti';
				$data['login'] = $this->session->userdata('login');
				$data['pegawai'] = $this->Pegawai_model->detail($id);
				($param == 'edit') ? $data['sc'] = $this->Sc_model->detail($id) : $data['sc'] = $this->Sc_model->detail_by_peg($id);
				$this->load->view('templates/header', $data);
				$this->load->view('templates/nav', $data);
				$this->load->view('admin/surat_cuti/' . $param, $data);
				$this->load->view('templates/modal_upload');
				$this->load->view('templates/modal_download');
				$this->load->view('templates/footer');
			} else {
				$this->Sc_model->$param();
				redirect('admin/surat_cuti/index');
			}
		} elseif (($param == 'tambah') && ($id)) /* tambah */ {
			if ($this->form_validation->run($param . '_surat_cuti') == false) {
				$data['judul'] = $param . ' Surat Cuti';
				$data['login'] = $this->session->userdata('login');
				$data['pegawai'] = $this->Pegawai_model->detail($id);

				$this->load->view('templates/header', $data);
				$this->load->view('templates/nav', $data);
				$this->load->view('admin/surat_cuti/' . $param, $data);
				$this->load->view('templates/footer');
			} else {
				$this->Sc_model->$param();
				redirect('admin/surat_cuti/index');
			}
		} elseif (($param == 'hapus') && ($id)) /* hapus */ {
			$this->Sc_model->$param($id);
			redirect('admin/surat_cuti/detail' . $id);
		} else {
			$data['judul'] = 'Daftar Surat Cuti';
			$data['login'] = $this->session->userdata('login');
			$data['pegawai'] = $this->Pegawai_model->getAllpegawai();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/nav', $data);
			$this->load->view('admin/surat_cuti/index', $data);
			$this->load->view('templates/footer');
		}
	}

	/*Bagian Surat Tugas Pegawai menangani tambah, hapus, edit, dan detail Surat Tugas*/
	public function surat_tugas($param = null, $id = null)
	{
		if ($param == 'edit' && $id) /* edit */ {
			if ($this->form_validation->run($param . '_surat_tugas') == false) {
				$data['judul'] = ucfirst($param) . ' Surat Tugas';
				$data['login'] = $this->session->userdata('login');
				$data['st'] = $this->St_model->detail($id);
				$data['pegawai'] = $this->Pegawai_model->getAllpegawai();
				$this->load->view('templates/header', $data);
				$this->load->view('templates/nav', $data);
				$this->load->view('admin/surat_tugas/' . $param, $data);
				$this->load->view('templates/footer');
			} else {
				$this->St_model->$param($id);
				redirect('admin/surat_tugas/index');
			}
		} elseif ($param == 'tambah') /* tambah */ {
			if ($this->form_validation->run($param . '_surat_tugas') == false) {
				$data['judul'] = $param . ' Surat Tugas';
				$data['login'] = $this->session->userdata('login');
				$data['pegawai'] = $this->Pegawai_model->getAllpegawai();
				$data['kode'] = $this->Pengaturan_model->tampil();
				$this->load->view('templates/header', $data);
				$this->load->view('templates/nav', $data);
				$this->load->view('admin/surat_tugas/' . $param, $data);
				$this->load->view('templates/footer');
			} else {
				$this->St_model->$param();
				redirect('admin/surat_tugas/index');
			}
		} elseif ($param == 'hapus' && $id) /* hapus */ {
			$this->St_model->$param($id);
			redirect('admin/surat_tugas');
		} elseif ($param == 'hapus_permanen' && $id) /* hapus permanen*/ {
			$this->St_model->$param($id);
			redirect('admin/surat_tugas/trash');
		} else {
			$data['judul'] = 'Daftar Surat Tugas';
			$data['login'] = $this->session->userdata('login');
			$this->St_model->paging();
			$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['data'] = $this->St_model->getSuratTugas(5, $data['page']);
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/nav', $data);
			$this->load->view('admin/surat_tugas/index', $data);
			$this->load->view('templates/modal_upload');
			$this->load->view('templates/modal_download');
			$this->load->view('templates/footer');
		}
	}

	public function surat_tugas_trash()
	{
		$data['judul'] = 'Surat Tugas Dihapus';
		$data['login'] = $this->session->userdata('login');
		$this->St_model->trash_paging();
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['data'] = $this->St_model->trashSuratTugas(5, $data['page']);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
		$this->load->view('admin/surat_tugas/trash', $data);
		$this->load->view('templates/footer');
	}

	/* Modal */
	public function modal($param)
	{
		switch ($param) {
			case 'surat_tugas':
				$model = 'St_model';
				break;
			case 'surat_cuti':
				$model = 'Sc_model';
				break;
			case 'kenaikan_gaji_berkala':
				$model = 'Kgb_model';
				break;
			case 'kp':
				$model = 'Kp_model';
				break;
			default:
				$model = 'Pegawai_model';
				break;
		}
		echo json_encode($this->$model->detail($_POST['id']));
	}

	/*Laporan PDF*/
	public function reports($param, $id)
	{
		switch ($param) {
			case 'surat_tugas':
				$model = 'St_model';
				break;
			case 'surat_cuti':
				$model = 'Sc_model';
				break;
			case 'kenaikan_gaji_berkala':
				$model = 'Kgb_model';
				break;
			case 'kp':
				$model = 'Kp_model';
				break;
			default:
				$model = 'Pegawai_model';
				break;
		}
		$data['data'] = $this->$model->print($id);
		if ($param == 'surat_tugas') :
			$data['pgw'] = explode(',', $data['data'][0]['ditugaskan']);
			$data['ditugaskan'] = $this->St_model->getDitugaskan($data['pgw']);
			$data['penandatangan'] = $this->St_model->getPenandatangan($data['data'][0]['penandatangan']);
		else : '';
		endif;
		$data['ketua'] = $this->Pegawai_model->getKetua();
		$this->load->library('pdf_generator');
		$this->pdf_generator->setPaper('A4', 'potrait');
		$this->pdf_generator->filename = $param . '_' . date('d_m_Y') . ".pdf";
		$this->pdf_generator->generate('templates/' . $param . '_report', $data);
	}

	/*Upload PDF*/
	public function upload($param, $id)
	{
		switch ($param) {
			case 'surat_tugas':
				$model = 'St_model';
				break;
			case 'surat_cuti':
				$model = 'Sc_model';
				break;
			case 'kenaikan_gaji_berkala':
				$model = 'Kgb_model';
				break;
			case 'kp':
				$model = 'Kp_model';
				break;
			default:
				$model = 'Pegawai_model';
				break;
		}
		$config['upload_path']          = './assets/uploads/pdf';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 2048;
		$config['file_name']            = $param . '_' . $id;
		$config['overwrite']			= true;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('upload_file')) {
			$data['judul'] = "Error Upload";
			$error = $this->upload->display_errors();
			print_r($error);
		} else {
			$result = $this->$model->upload->data();
			$this->$model->upload($result['file_name'], $id);
			redirect('admin/' . $param);
		}
	}

	/*Hapus PDF*/
	public function hapuspdf($param, $id)
	{
		switch ($param) {
			case 'surat_tugas':
				$model = 'St_model';
				break;
			case 'surat_cuti':
				$model = 'Sc_model';
				break;
			case 'kenaikan_gaji_berkala':
				$model = 'Kgb_model';
				break;
			case 'kp':
				$model = 'Kp_model';
				break;
			default:
				$model = 'Pegawai_model';
				break;
		}

		$this->$model->hapus_pdf($id);
		redirect('admin/' . $param);
	}

	//logout
	public function logout()
	{
		$this->session->unset_userdata('login');
		redirect('login');
	}
}
