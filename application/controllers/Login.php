<?php 

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if ($this->session->userdata('login')) {
			redirect('admin');
		}
	}

	//login
	public function index()
	{
		if ($this->form_validation->run('login') == false) {
			$data['judul'] = 'Login';
			$this->load->view('login/index', $data);
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$user = $this->Login_model->get_user($username)[0];

			if ($user) {
				if ($user['is_active'] == 1) {
					if (password_verify($password, $user['password'])) {
						$data = array(
							'email' => $user['email'],
							'username' => $user['username'],
							'level' => $user['level'],
							'image' => $user['image'],
						);

						$this->session->set_userdata('login', $data);
						redirect('admin');
					} else {
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger mx-2" role="alert">Password Salah</div>');
						redirect('login');
					}
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger mx-2" role="alert">Username belum diaktifkan</div>');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger mx-2" role="alert">Username tidak terdaftar</div>');
				redirect('login');
			}
		}
	}
}
