<?php 
class Register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		if ($this->session->userdata('login')) {
			redirect('admin');
		}
	}

//register
	public function index()
	{
		if ($this->form_validation->run('register') == false) {
			$data['judul'] = 'Halaman Register';
			$this->load->view('register/index', $data);
		} else {
			$data = [
				'id_user' => uniqid(),
				'email' => htmlspecialchars(trim($this->input->post('email', true))),
				'username' => htmlspecialchars(trim($this->input->post('username', true))),
				'password' => password_hash(trim($this->input->post('password')), PASSWORD_DEFAULT),
				'level' => 'user',
				'image' => 'default.jpg',
				'active_at' => '',
				'created_at' => date('Y-m-d H:i:s'),
			];

			$this->Register_model->input_data($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success mx-2" role="alert">Selamat Anda sudah terdaftar, link Aktifasi dikirim ke email anda.</div>');
			redirect('login');
		}
	}
}
