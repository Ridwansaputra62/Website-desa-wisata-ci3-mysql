<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Background extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Background');
        $this->load->library('upload');

        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function index() {
        $data['judul'] = 'Ubah Background User';

        // Pastikan ada 1 baris background, kalau belum ada, insert default
        if ($this->db->count_all('background_home') == 0) {
            $this->db->insert('background_home', ['gambar' => 'default-bg.jpg']);
        }

        $data['background'] = $this->db->get('background_home')->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('background/index', $data);
        $this->load->view('templates/footer');
    }

    public function update() {
        $id = $this->input->post('id');
        $gambar = $_FILES['gambar']['name'];

        if ($gambar) {
            $config['upload_path']   = './assets/images/background/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['file_name']     = 'bghome_' . time();
            $config['overwrite']     = true;
            $config['max_size']      = 51200; // Max 50 MB

            // Buat folder jika belum ada
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0755, true);
            }

            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                $file = $this->upload->data('file_name');

                // Hapus file lama jika ada
                $old = $this->M_Background->getById($id);
                if ($old && $old['gambar'] != 'default-bg.jpg' && file_exists('./assets/images/background/' . $old['gambar'])) {
                    unlink('./assets/images/background/' . $old['gambar']);
                }

                $this->M_Background->update($id, ['gambar' => $file]);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success">Background berhasil diperbarui.</div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
            }
        }

        redirect('background');
    }
}
