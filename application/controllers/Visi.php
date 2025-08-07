<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visi extends CI_Controller {
     public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('email')) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Silakan login terlebih dahulu.</div>');
        redirect('auth');}
    }
    
	public function index()
	{
		$data['judul'] = 'Data Visi Misi';
        $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
        //$this->db->where('role_id', 1);
        $data['visi'] = $this->M_About->getVisi()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('about/visi', $data);
        $this->load->view('templates/footer');
	}

	public function add_visi()
	{
		$data['judul'] = 'Tambah Visi';
        $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
        //$this->db->where('role_id', 1);
        $data['visi'] = $this->db->get('visi')->result_array();
		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('about/visi-add', $data);
        $this->load->view('templates/footer');
	}

	public function simpan_visi()
	{
        $data['judul'] = 'Tambah Visi Misi';
        if ($this->session->userdata('email')) {
            redirect('visi');
        }
        $this->form_validation->set_rules('visi', 'Visi Desa', 'required', [
            'required' => 'Alamat Belum diis!!'
        ]);
        $this->form_validation->set_rules('misi', 'Misi Desa', 'required', [
            'required' => 'Alamat Belum diis!!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('about/visi-add', $data);
            $this->load->view('templates/footer');
        } else {
		
            $data = [
                'visi' => $this->input->post('visi', true),
                'misi' => $this->input->post('misi', true)
            ];

            $this->M_About->simpanVisi($data); //menggunakan model

            $this->session->set_flashdata('pesan', 'Data sudah Tersimpan');
            redirect('visi');
        
	}
}

    public function hapusVisi()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->M_About->hapusVisi($where);
        redirect('visi');
    }
    
    public function ubahVisi()
    {
        $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['visi'] = $this->M_About->cekVisi(['id' => $this->uri->segment(3)])->result_array();

        $this->form_validation->set_rules('visi', 'Visi Desa', 'required', [
            'required' => 'Visi Belum diis!!'
        ]);
        $this->form_validation->set_rules('misi', 'Misi Desa', 'required', [
            'required' => 'Misi Belum diis!!'
        ]);
        
        if ($this->form_validation->run() == false) { 
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('about/ubah-visi', $data);
            $this->load->view('templates/footer');
        } else { 
            $data = [
                'visi' => $this->input->post('visi', true),
                'misi' => $this->input->post('misi', true)
            ];

            $this->M_About->updateVisi(['id' => $this->input->post('id')], $data);
            $this->session->set_flashdata('pesan', 'Data sudah Terupdate');
            redirect('visi');
        } 
    }

}
