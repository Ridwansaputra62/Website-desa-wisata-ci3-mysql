<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {
     public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('email')) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Silakan login terlebih dahulu.</div>');
        redirect('auth');}
    }
    
	public function index()
{
    $data['judul'] = 'Data Paket';
    $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['paket'] = [];

    $paket_raw = $this->M_Paket->getPaket()->result_array();
    foreach ($paket_raw as $p) {
        $id_fasilitas = explode(',', $p['id_fasilitas']);
        $nama_fasilitas = [];

        if (!empty($id_fasilitas)) {
            $this->db->where_in('id_fasilitas', $id_fasilitas);
            $fasilitas = $this->db->get('fasilitas')->result_array();
            foreach ($fasilitas as $f) {
                $nama_fasilitas[] = $f['nama_fasilitas'];
            }
        }

        $p['fasilitas'] = implode(', ', $nama_fasilitas);
        $data['paket'][] = $p;
    }

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('paket/paket', $data);
    $this->load->view('templates/footer');
}


    public function add_paket()
{
    $data['judul'] = 'Tambah Paket';
    $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['fasilitas'] = $this->db->get('fasilitas')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('paket/paket-add', $data);
    $this->load->view('templates/footer');
}


public function simpan()
{
    $data['judul'] = 'Tambah Paket';

    $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required');
    $this->form_validation->set_rules('harga', 'Harga Paket', 'required|numeric');
    $this->form_validation->set_rules('id_fasilitas[]', 'Fasilitas', 'required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

    $config['upload_path'] = './assets/images/paket/';
    $config['allowed_types'] = 'jpg|png|jpeg|webp|gif';
    $config['max_size'] = '2048';
    $config['file_name'] = 'img_' . time();

    $this->load->library('upload', $config);

    if ($this->form_validation->run() == FALSE) {
        $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['fasilitas'] = $this->db->get('fasilitas')->result_array(); // agar select muncul lagi
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('paket/paket-add', $data);
        $this->load->view('templates/footer');
    } else {
        $gambar = '';
        if ($this->upload->do_upload('gambar')) {
            $image = $this->upload->data();
            $gambar = $image['file_name'];
        }

        // Ambil array id_fasilitas lalu gabungkan dengan koma
        $id_fasilitas = $this->input->post('id_fasilitas', true);
        $id_fasilitas_string = is_array($id_fasilitas) ? implode(',', $id_fasilitas) : '';

        $data = [
            'nama_paket'    => $this->input->post('nama_paket', true),
            'harga'         => $this->input->post('harga', true),
            'id_fasilitas'  => $id_fasilitas_string,
            'keterangan'    => $this->input->post('keterangan', true),
            'gambar'        => $gambar
        ];

        $this->db->insert('paket', $data); // langsung ke tabel 'paket'

        $this->session->set_flashdata('pesan', 'Paket berhasil disimpan.');
        redirect('paket');
    }
}



    public function hapusPaket()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->M_Paket->hapusPaket($where);
        redirect('paket');
    }

    public function ubahPaket()
{
    $id = $this->uri->segment(3);
    $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['paket'] = $this->M_Paket->cekPaket(['id' => $id])->result_array();
    $data['fasilitas'] = $this->db->get('fasilitas')->result_array();

    $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required', [
        'required' => 'Nama belum diisi!'
    ]);
    $this->form_validation->set_rules('harga', 'Harga Paket', 'required|numeric', [
        'required' => 'Harga belum diisi!',
        'numeric' => 'Inputan harus berupa angka!'
    ]);
    $this->form_validation->set_rules('id_fasilitas[]', 'Fasilitas Wisata', 'required', [
        'required' => 'Fasilitas belum dipilih!'
    ]);
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', [
        'required' => 'Keterangan belum diisi!'
    ]);

    // Konfigurasi upload gambar
    $config['upload_path'] = './assets/images/paket/';
    $config['allowed_types'] = 'jpg|jpeg|png|webp|gif';
    $config['max_size'] = 2048;
    $config['file_name'] = 'img_' . time();

    $this->load->library('upload', $config);

    if ($this->form_validation->run() == false) {
        // Jika validasi gagal, tampilkan form edit
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('paket/ubah_paket', $data);
        $this->load->view('templates/footer');
    } else {
        // Cek jika ada gambar baru diupload
        if ($this->upload->do_upload('gambar')) {
            $image = $this->upload->data();
            // Hapus gambar lama jika ada
            $old_gambar = $this->input->post('old_pict', true);
            if ($old_gambar && file_exists(FCPATH . 'assets/images/paket/' . $old_gambar)) {
                unlink(FCPATH . 'assets/images/paket/' . $old_gambar);
            }
            $gambar = $image['file_name'];
        } else {
            // Jika tidak ada upload baru, gunakan gambar lama
            $gambar = $this->input->post('old_pict', true);
        }

        // Ambil fasilitas dari input (array), ubah jadi string
        $id_fasilitas = $this->input->post('id_fasilitas', true);
        $id_fasilitas_string = is_array($id_fasilitas) ? implode(',', $id_fasilitas) : '';

        // Siapkan data untuk update
        $update = [
            'nama_paket'    => $this->input->post('nama_paket', true),
            'harga'         => $this->input->post('harga', true),
            'id_fasilitas'  => $id_fasilitas_string,
            'keterangan'    => $this->input->post('keterangan', true),
            'gambar'        => $gambar
        ];

        // Lakukan update
        $this->M_Paket->updatePaket(['id' => $this->input->post('id')], $update);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Paket berhasil diupdate.</div>');
        redirect('paket');
    }
}

}
