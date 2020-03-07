<?php 
class Profil extends CI_Controller{
    public function index()
    {
        $data['judul'] = 'Halaman Profil';
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
		$this->load->view('profil/index', $data);
		$this->load->view('templates/footer');        
    }

}