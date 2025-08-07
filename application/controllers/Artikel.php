<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('pesan', 'Silakan login terlebih dahulu.');
            redirect('auth');
        }
        $this->load->model('M_Artikel');
        $this->load->model('M_User');
    }

    public function index() {
        $data['judul'] = 'Data Artikel';
        $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['artikel'] = $this->M_Artikel->getAll()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('artikel/artikel', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $data['judul'] = 'Tambah Artikel';
        $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required|valid_url');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('artikel/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            // upload
            $gambar = '';
            if ($_FILES['gambar']['name']) {
                $config['upload_path'] = './assets/fe/img/blog';
                $config['allowed_types'] = 'jpg|jpeg|png|webp|gif';
                $config['file_name'] = 'artikel_' . time();
                $config['max_size'] = 2048;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                }
            }

            $insert = [
    'judul' => $this->input->post('judul', true),
    'link' => $this->input->post('url', true),
    'gambar' => $gambar,
    'tanggal' => date('Y-m-d')
];

            $this->M_Artikel->insert($insert);
            $this->session->set_flashdata('pesan', 'Artikel berhasil ditambahkan.');
            redirect('artikel');
        }
    }

    public function edit($id) {
        $data['judul'] = 'Edit Artikel';
        $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['artikel'] = $this->M_Artikel->getById($id);

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required|valid_url');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('artikel/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $artikel = $this->M_Artikel->getById($id);
            $gambar = $artikel['gambar'];

            if ($_FILES['gambar']['name']) {
                $config['upload_path'] = './assets/fe/img/blog';
                $config['allowed_types'] = 'jpg|jpeg|png|webp|gif';
                $config['file_name'] = 'artikel_' . time();
                $config['max_size'] = 2048;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    if ($gambar && file_exists('./assets/images/artikel/' . $gambar)) {
                        unlink('./assets/images/artikel/' . $gambar);
                    }
                    $gambar = $this->upload->data('file_name');
                }
            }

            $update = [
                'judul' => $this->input->post('judul', true),
                'url' => $this->input->post('url', true),
                'gambar' => $gambar
            ];

            $this->M_Artikel->update($id, $update);
            $this->session->set_flashdata('pesan', 'Artikel berhasil diupdate.');
            redirect('artikel');
        }
    }

    public function hapus($id) {
        $artikel = $this->M_Artikel->getById($id);
        if ($artikel['gambar'] && file_exists('./assets/images/artikel/' . $artikel['gambar'])) {
            unlink('./assets/images/artikel/' . $artikel['gambar']);
        }

        $this->M_Artikel->delete($id);
        $this->session->set_flashdata('pesan', 'Artikel berhasil dihapus.');
        redirect('artikel');
    }
   public function update()
{
    $id = $this->input->post('id');
    $artikel = $this->M_Artikel->getById($id);
    $gambar = $artikel['gambar'];

    if ($_FILES['gambar']['name']) {
        $config['upload_path'] = './assets/fe/img/blog';
        $config['allowed_types'] = 'jpg|jpeg|png|webp|gif';
        $config['file_name'] = 'artikel_' . time();
        $config['max_size'] = 2048;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            // Hapus gambar lama jika ada
            if ($gambar && file_exists('./assets/fe/img/blog/' . $gambar)) {
                unlink('./assets/fe/img/blog/' . $gambar);
            }
            $gambar = $this->upload->data('file_name');
        }
    }

    $data = [
        'judul' => $this->input->post('judul'),
        'link' => $this->input->post('link'),
        'tanggal' => $this->input->post('tanggal'),
        'gambar' => $gambar
    ];

    $this->db->where('id_artikel', $id);
    $this->db->update('artikel', $data);

    $this->session->set_flashdata('pesan', '<div class="alert alert-success">Artikel berhasil diperbarui.</div>');
    redirect('artikel');
}

}
