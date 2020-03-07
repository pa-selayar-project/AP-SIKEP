<?php 
class Pengaturan extends CI_Controller{
    public function __construct()
	{
		parent::__construct();
		$this->load->library('librari');
		$this->load->model('Pengaturan_model');
        $this->load->library('form_validation');
        
        if(!$this->session->userdata('login'))
		{
			redirect('login');
		}
	}

    public function index()
    {
        $data['judul'] = 'Halaman Pengaturan';
        $data['login'] = $this->session->userdata('login');
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
		$this->load->view('pengaturan/index', $data);
		$this->load->view('templates/footer');        
    }

     public function kode_surat()
    {
        $data['data'] = $this->Pengaturan_model->tampil();
        $this->load->view('pengaturan/kode_surat', $data);
    }

    public function tambah_kode_surat()
    {
        $this->Pengaturan_model->tambah();
    }
}