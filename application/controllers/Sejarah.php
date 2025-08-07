<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sejarah extends CI_Controller {
     public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('email')) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Silakan login terlebih dahulu.</div>');
        redirect('auth');}
    }
    
	public function index()
	{
		$data['judul'] = 'Data Sejarah';
        $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
        //$this->db->where('role_id', 1);
        $data['sejarah'] = $this->M_About->getSejarah()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('about/sejarah', $data);
        $this->load->view('templates/footer');
	}

	public function add_sejarah()
	{
		$data['judul'] = 'Tambah Sejarah';
        $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
        //$this->db->where('role_id', 1);
        $data['sejarah'] = $this->db->get('sejarah')->result_array();
		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('about/sejarah-add', $data);
        $this->load->view('templates/footer');
	}

	public function simpan_sejarah()
	{
        $data['judul'] = 'Tambah Kontak';
        if ($this->session->userdata('email')) {
            redirect('sejarah');
        }
        $this->form_validation->set_rules('Keterangan', 'Keterangan Sejarah', 'required', [
            'required' => 'Alamat Belum diis!!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('about/sejarah-add', $data);
            $this->load->view('templates/footer');
        } else {
		
            $data = [
                'keterangan' => $this->input->post('keterangan', true),
            ];

            $this->M_About->simpanSejarah($data); //menggunakan model

            $this->session->set_flashdata('pesan', 'Data sudah Tersimpan');
            redirect('sejarah');
        
	}
}

    public function hapusSejarah()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->M_About->hapusSejarah($where);
        redirect('sejarah');
    }
    
    public function ubahSejarah()
    {
        $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['sejarah'] = $this->M_About->cekSejarah(['id' => $this->uri->segment(3)])->result_array();

        $this->form_validation->set_rules('keterangan', 'Keterangan Sejarah', 'required', [
            'required' => 'Keterangan Belum diis!!'
        ]);
        
        if ($this->form_validation->run() == false) { 
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('about/ubah-sejarah', $data);
            $this->load->view('templates/footer');
        } else { 
            $data = [
                'keterangan' => $this->input->post('keterangan', true),
            ];

            $this->M_About->updateSejarah(['id' => $this->input->post('id')], $data);
            $this->session->set_flashdata('pesan', 'Data sudah Terupdate');
            redirect('sejarah');
        } 
    }

}
