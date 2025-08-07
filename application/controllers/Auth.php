<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
            'required' => 'Email Harus diisi!!',
            'valid_email' => 'Email Tidak Benar!!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Harus diisi'
        ]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login';
            $data['user'] = '';
            //kata 'login' merupakan nilai dari variabel judul dalam array $data dikirimkan ke view aute_header
            $this->load->view('autentifikasi/login',$data);
        } else {
            $this->_login();
        }
	}

	private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);

        $user = $this->M_User->cekData(['email' => $email])->row_array();

        //jika usernya ada
        if ($user) {
            //jika user sudah aktif
            //if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
    // Set session
    $data = [
        'email' => $user['email'],
        'role_id' => $user['role_id']
    ];
    $this->session->set_userdata($data);

    // Redirect ke halaman admin
    redirect('admin');


                } else {
                    $this->session->set_flashdata('pesan', 'Password salah');
                    redirect('auth');
                }
            } //else {
                //$this->session->set_flashdata('pesan', 'User belum diaktifasi!!');
               // redirect('autentifikasi');
            //}
       // } 
	else {
            $this->session->set_flashdata('pesan', 'Email tidak terdaftar!!');
            redirect('auth');
        }
    //}
}

public function registrasi()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        //membuat rule untuk inputan nama agar tidak boleh kosong dengan membuat pesan error dengan 
        //bahasa sendiri yaitu 'Nama Belum diisi'
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Nama Belum diis!!'
        ]);
        //membuat rule untuk inputan email agar tidak boleh kosong, tidak ada spasi, format email harus valid
        //dan email belum pernah dipakai sama user lain dengan membuat pesan error dengan bahasa sendiri 
        //yaitu jika format email tidak benar maka pesannya 'Email Tidak Benar!!'. jika email belum diisi,
        //maka pesannya adalah 'Email Belum diisi', dan jika email yang diinput sudah dipakai user lain,
        //maka pesannya 'Email Sudah dipakai'
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[user.email]', [
            'valid_email' => 'Email Tidak Benar!!',
            'required' => 'Email Belum diisi!!',
            'is_unique' => 'Email Sudah Terdaftar!'
        ]);
        //membuat rule untuk inputan password agar tidak boleh kosong, tidak ada spasi, tidak boleh kurang dari
        //dari 3 digit, dan password harus sama dengan repeat password dengan membuat pesan error dengan  
        //bahasa sendiri yaitu jika password dan repeat password tidak diinput sama, maka pesannya
        //'Password Tidak Sama'. jika password diisi kurang dari 3 digit, maka pesannya adalah 
        //'Password Terlalu Pendek'.
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password Tidak Sama!!',
            'min_length' => 'Password Terlalu Pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
        //jika jida disubmit kemudian validasi form diatas tidak berjalan, maka akan tetap berada di
        //tampilan registrasi. tapi jika disubmit kemudian validasi form diatas berjalan, maka data yang 
        //diinput akan disimpan ke dalam tabel user
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Registrasi Member';
            $this->load->view('autentifikasi/registrasi',$data);
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 1,
                'is_active' => 1,
                'tanggal_input' => time()
            ];

            $this->M_User->simpanData($data); //menggunakan model

            $this->session->set_flashdata('pesan', 'Selamat!! akun member anda sudah dibuat. Silahkan Aktivasi Akun anda');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan', 'Anda telah logout!!');
        redirect('auth');
    }
}
