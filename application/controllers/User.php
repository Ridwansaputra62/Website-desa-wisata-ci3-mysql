<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

     public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('email')) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Silakan login terlebih dahulu.</div>');
        redirect('auth');}
    }
    
	public function index()
	{
		$data['judul'] = 'Data User';
        $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('role_id', 1);
        $data['admin'] = $this->db->get('user')->result_array();
        $data['pengguna'] = $this->M_User->getUser()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/pengguna', $data);
        $this->load->view('templates/footer');
	}

	public function add()
	{
		$data['judul'] = 'Tambah User';
        $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('role_id', 1);
        $data['admin'] = $this->db->get('user')->result_array();
		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/pengguna_add', $data);
        $this->load->view('templates/footer');
	}

	public function simpan()
	{
		if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Nama Belum diis!!'
        ]);
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[user.email]', [
            'valid_email' => 'Email Tidak Benar!!',
            'required' => 'Email Belum diisi!!',
            'is_unique' => 'Email Sudah Terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password Tidak Sama!!',
            'min_length' => 'Password Terlalu Pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/add',$data);
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role', true),
                'is_active' => 1,
                'tanggal_input' => time()
            ];

            $this->M_User->simpanData($data); //menggunakan model

            $this->session->set_flashdata('pesan', 'Data sudah Tersimpan');
            redirect('user');
        }
	}

    public function hapusUser()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->M_User->hapusUser($where);
        redirect('user');
    }
    
    public function ubahUser()
    {
        $data['user'] = $this->M_User->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['pengguna'] = $this->M_User->getUserWhere(['id' => $this->uri->segment(3)])->result_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Nama Belum diis!!'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password Tidak Sama!!',
            'min_length' => 'Password Terlalu Pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubah_user', $data);
            $this->load->view('templates/footer');
        } else {

            //$email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
               // 'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            ];

            $this->M_User->updateUser(['id' => $this->input->post('id')], $data);
            $this->session->set_flashdata('pesan', 'Data sudah Terupdate');
            redirect('user');
        }
    }
}
