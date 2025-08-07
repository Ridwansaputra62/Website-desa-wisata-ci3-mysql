<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Kategori_model');
        if (!$this->session->userdata('email')) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Silakan login terlebih dahulu.</div>');
        redirect('auth');}
    }

    

    public function tambah() {
        $this->load->view('admin/kategori/tambah');
    }

    public function simpan() {
        $this->Kategori_model->insert([
            'nama_kategori' => $this->input->post('nama_kategori'),
            'deskripsi' => $this->input->post('deskripsi')
        ]);
        redirect('admin/kategori');
    }

    public function edit($id) {
        $data['kategori'] = $this->Kategori_model->get_by_id($id);
        $this->load->view('admin/kategori/edit', $data);
    }

    public function update($id) {
        $this->Kategori_model->update($id, [
            'nama_kategori' => $this->input->post('nama_kategori'),
            'deskripsi' => $this->input->post('deskripsi')
        ]);
        redirect('admin/kategori');
    }

    public function hapus($id) {
        $this->Kategori_model->delete($id);
        redirect('admin/kategori');
    }
}
