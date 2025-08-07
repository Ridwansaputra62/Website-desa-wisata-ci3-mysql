<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('email')) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Silakan login terlebih dahulu.</div>');
        redirect('auth');}
    }

	public function index()
	
	{
        $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['pesan'] = $this->M_Pesan->getPesan()->result_array();
        //$data['buku'] = $this->M_Buku->getLimitBuku()->result_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('pesan/pesan',$data);
		$this->load->view('templates/footer',$data);
	}

	public function simpan()
	{
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'subjek' => $this->input->post('subjek', true),
				'pesan' => $this->input->post('pesan', true),
            ];

            $this->M_Pesan->simpanData($data); //menggunakan model
			//echo "<script>alert('Data berhasil disimpan');</script>";
			//echo "<script>window.location='" . site_url('home') . "';</script>";
            //$this->session->set_flashdata('pesan', 'Data sudah Tersimpan');
            //redirect('home');
			 echo "OK";
	}
    
}