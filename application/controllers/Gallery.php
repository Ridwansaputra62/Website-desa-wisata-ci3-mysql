<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    private $authUser;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_Gallery', 'M_Jenis', 'M_User']);
        $this->load->library(['form_validation', 'session', 'upload']);

        // Wajib login
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Silakan login terlebih dahulu.</div>');
            redirect('auth');
        }

        // Ambil user dari session (Sumber kebenaran tunggal)
        $this->authUser = $this->M_User->cekData([
            'email' => $this->session->userdata('email')
        ])->row_array();

        if (empty($this->authUser)) {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

    /**
     * Helper render agar setiap view selalu menerima $data['user'].
     */
    private function render($view, $data = [])
    {
        $data['user'] = $this->authUser;
        // Urutan: header -> topbar -> sidebar -> konten -> footer
        $this->load->view('templates/header',  $data);
        $this->load->view('templates/topbar',  $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view($view,               $data);
        $this->load->view('templates/footer');
    }

    public function index()
    {
        $data['judul'] = 'Data Galeri per Jenis Wisata';
        $data['jenis'] = $this->M_Jenis->getAllArray();
        $this->render('gallery/index', $data);
    }

    public function lihat($id_jenis)
    {
        $jenis = $this->M_Jenis->getById($id_jenis);
        if (!$jenis) {
            show_404();
        }

        $data['judul']   = 'Galeri Wisata - ' . $jenis['nama_wisata'];
        $data['gallery'] = $this->M_Gallery->getByJenis($id_jenis);
        $data['jenis']   = $jenis;

        $this->render('gallery/lihat', $data);
    }

    public function tambah($id_jenis)
    {
        $jenis = $this->M_Jenis->getById($id_jenis);
        if (!$jenis) {
            show_404();
        }

        $data['judul'] = 'Tambah Galeri';
        $data['jenis'] = $jenis;

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->render('gallery/tambah', $data);
            return;
        }

        // Konfigurasi upload
        $config = [
            'upload_path'   => './assets/img/gallery/',
            'allowed_types' => 'jpg|jpeg|png|webp',
            'max_size'      => 2048, // KB
        ];

        if (!is_dir($config['upload_path'])) {
            @mkdir($config['upload_path'], 0755, true);
        }

        $files   = $_FILES;
        $jumlah  = isset($_FILES['gambar']['name']) ? count($_FILES['gambar']['name']) : 0;
        $sukses  = 0;
        $gagal   = [];

        for ($i = 0; $i < $jumlah; $i++) {
            if (empty($files['gambar']['name'][$i])) {
                continue;
            }

            // Nama file aman
            $origName = preg_replace('/\s+/', '_', $files['gambar']['name'][$i]);
            $safeName = time() . '_' . $i . '_' . $origName;

            $_FILES['gambar']['name']     = $safeName;
            $_FILES['gambar']['type']     = $files['gambar']['type'][$i];
            $_FILES['gambar']['tmp_name'] = $files['gambar']['tmp_name'][$i];
            $_FILES['gambar']['error']    = $files['gambar']['error'][$i];
            $_FILES['gambar']['size']     = $files['gambar']['size'][$i];

            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                $file = $this->upload->data('file_name');

                $this->db->insert('gallery', [
                    'id_jenis'    => (int) $id_jenis,
                    'nama_wisata' => $jenis['nama_wisata'], // ambil dari tabel jenis, bukan dari POST
                    'keterangan'  => $this->input->post('keterangan', true),
                    'gambar'      => $file
                ]);
                $sukses++;
            } else {
                $gagal[] = $this->upload->display_errors('', '');
            }
        }

        if ($sukses > 0) {
            $this->session->set_flashdata('pesan', 'Galeri berhasil ditambahkan. (' . $sukses . ' file)');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Gagal menambahkan galeri. ' . implode('; ', $gagal) . '</div>');
        }

        redirect('gallery/lihat/' . $id_jenis);
    }

    public function edit($id)
    {
        $galeri = $this->M_Gallery->getById($id);
        if (!$galeri) {
            show_404();
        }

        $data['judul']  = 'Edit Galeri';
        $data['galeri'] = $galeri;

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->render('gallery/edit', $data);
            return;
        }

        // Konfigurasi upload (jika ganti gambar)
        $config = [
            'upload_path'   => './assets/img/gallery/',
            'allowed_types' => 'jpg|jpeg|png|webp',
            'max_size'      => 2048,
        ];
        $this->upload->initialize($config);

        $update = [
            'keterangan' => $this->input->post('keterangan', true)
        ];

        if (!empty($_FILES['gambar']['name'])) {
            // Nama file aman
            $origName = preg_replace('/\s+/', '_', $_FILES['gambar']['name']);
            $_FILES['gambar']['name'] = time() . '_' . $origName;

            if ($this->upload->do_upload('gambar')) {
                // Hapus file lama jika ada
                if (!empty($galeri['gambar'])) {
                    @unlink(FCPATH . 'assets/img/gallery/' . $galeri['gambar']);
                }
                $update['gambar'] = $this->upload->data('file_name');
            } else {
                $data['error'] = $this->upload->display_errors();
                $this->render('gallery/edit', $data);
                return;
            }
        }

        $this->db->where('id', (int) $id)->update('gallery', $update);
        $this->session->set_flashdata('pesan', 'Galeri berhasil diperbarui.');
        redirect('gallery/lihat/' . (int) $galeri['id_jenis']);
    }

    public function hapus($id)
    {
        $galeri = $this->M_Gallery->getById($id);
        if ($galeri) {
            if (!empty($galeri['gambar'])) {
                @unlink(FCPATH . 'assets/img/gallery/' . $galeri['gambar']);
            }
            $this->db->delete('gallery', ['id' => (int) $id]);
            $this->session->set_flashdata('pesan', 'Gambar galeri berhasil dihapus.');
            redirect('gallery/lihat/' . (int) $galeri['id_jenis']);
        }
        show_404();
    }
}
