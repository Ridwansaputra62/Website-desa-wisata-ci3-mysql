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



    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan', 'Anda telah logout!!');
        redirect('auth');
    }
}
