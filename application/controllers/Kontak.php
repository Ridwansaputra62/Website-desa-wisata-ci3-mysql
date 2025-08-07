<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

     public function __construct() {
        parent::__construct();
        $this->load->model('Kategori_model');
        if (!$this->session->userdata('email')) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Silakan login terlebih dahulu.</div>');
        redirect('auth');}
    }

	public function index()
	{
		$data['judul'] = 'Data Kontak';
        $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kontak'] = $this->M_Pesan->getKontak()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pesan/kontak', $data);
        $this->load->view('templates/footer');
	}

	public function add()
	{
		$data['judul'] = 'Tambah Kontak';
        $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kontak'] = $this->db->get('kontak')->result_array();

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pesan/kontak_add', $data);
        $this->load->view('templates/footer');
	}

	public function simpan()
	{
        $data['judul'] = 'Tambah Kontak';

        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('instagram', 'Instagram', 'required');

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pesan/kontak_add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'alamat'    => $this->input->post('alamat', true),
                'email'     => htmlspecialchars($this->input->post('email', true)),
                'telepon'   => $this->input->post('telepon', true),
                'instagram' => $this->input->post('instagram', true),
                'tiktok'    => $this->input->post('tiktok', true)
            ];

            $this->M_Pesan->simpanKontak($data);
            $this->session->set_flashdata('pesan', 'Data sudah Tersimpan');
            redirect('kontak');
        }
	}

    public function hapusKontak()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->M_Pesan->hapusKontak($where);
        redirect('kontak');
    }

    public function ubahKontak()
    {
        $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kontak'] = $this->M_Pesan->cekKontak(['id' => $this->uri->segment(3)])->result_array();

        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('instagram', 'Instagram', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pesan/ubah_kontak', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'alamat'    => $this->input->post('alamat', true),
                'email'     => htmlspecialchars($this->input->post('email', true)),
                'telepon'   => $this->input->post('telepon', true),
                'instagram' => $this->input->post('instagram', true),
                'tiktok'    => $this->input->post('tiktok', true)
            ];

            $this->M_Pesan->updateKontak(['id' => $this->input->post('id')], $data);
            redirect('kontak');
        }
    }
}
