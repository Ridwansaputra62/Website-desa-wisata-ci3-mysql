<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_wisata extends CI_Controller {

    public function __construct()
{
    parent::__construct();
    $this->load->model('M_Jenis'); // ⬅ WAJIB supaya bisa akses $this->M_Jenis
    $this->load->model('M_User');  // Jika kamu pakai user session juga
    $this->load->library('form_validation');
    if (!$this->session->userdata('email')) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Silakan login terlebih dahulu.</div>');
        redirect('auth');}
}
    public function index()
    {
        $data['judul'] = 'Data Jenis Wisata';
        $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['jenis'] = $this->M_Jenis->getAll()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('jenis_wisata/jenis', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Jenis Wisata';
        $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_wisata', 'Nama Wisata', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('harga_tiket', 'Harga Tiket', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('jenis_wisata/jenis-add', $data);
            $this->load->view('templates/footer');
        } else {
            $gambar = $_FILES['gambar']['name'];
            if ($gambar) {
                $config['upload_path'] = './assets/img/jenis/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 2048;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama_wisata' => $this->input->post('nama_wisata'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga_tiket' => $this->input->post('harga_tiket'),
                'gambar' => $gambar
            ];

            $this->db->insert('jenis_wisata', $data);
            redirect('jenis_wisata');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Ubah Jenis Wisata';
        $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['jenis'] = $this->M_Jenis->getById($id);

        $this->form_validation->set_rules('nama_wisata', 'Nama Wisata', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('harga_tiket', 'Harga Tiket', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('jenis_wisata/jenis-edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->M_Jenis->update($id);
            redirect('jenis_wisata');
        }
    }

    public function hapus($id)
    {
        $this->M_Jenis->delete($id);
        redirect('jenis_wisata');
    }
}
