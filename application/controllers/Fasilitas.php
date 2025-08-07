<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Fasilitas');
        if (!$this->session->userdata('email')) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Silakan login terlebih dahulu.</div>');
        redirect('auth');
    }
        
    }

    public function index()
    {
        $data['judul'] = 'Data Fasilitas Wisata';
        $data['fasilitas'] = $this->M_Fasilitas->getAllArray();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('fasilitas/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Fasilitas';
        $this->form_validation->set_rules('nama_fasilitas', 'Nama Fasilitas', 'required');
        $this->form_validation->set_rules('harga_fasilitas', 'Harga Fasilitas', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('fasilitas/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_Fasilitas->insert();
            $this->session->set_flashdata('pesan', 'Fasilitas berhasil ditambahkan!');
            redirect('fasilitas');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Fasilitas';
        $data['fasilitas'] = $this->M_Fasilitas->getById($id);

        $this->form_validation->set_rules('nama_fasilitas', 'Nama Fasilitas', 'required');
        $this->form_validation->set_rules('harga_fasilitas', 'Harga Fasilitas', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('fasilitas/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_Fasilitas->update($id);
            $this->session->set_flashdata('pesan', 'Fasilitas berhasil diubah!');
            redirect('fasilitas');
        }
    }

    public function hapus($id)
    {
        $this->M_Fasilitas->delete($id);
        $this->session->set_flashdata('pesan', 'Fasilitas berhasil dihapus!');
        redirect('fasilitas');
    }
}
