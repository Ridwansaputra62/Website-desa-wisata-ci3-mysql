<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    private $authUser; // user yang sedang login

    public function __construct() {
        parent::__construct();
        $this->load->model(['Kategori_model', 'M_User', 'M_Dashboard']);
        $this->load->library(['form_validation', 'session']);

        // Wajib login
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Silakan login terlebih dahulu.</div>');
            redirect('auth');
        }

        // Ambil user dari session
        $this->authUser = $this->M_User->cekData([
            'email' => $this->session->userdata('email')
        ])->row_array();

        // Jika session tidak valid
        if (empty($this->authUser)) {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

    /**
     * Helper untuk render layout lengkap dan memastikan $data['user'] selalu ada.
     */
    private function render($view, $data = []) {
        $data['user'] = $this->authUser; // inject user
        $this->load->view('templates/header',  $data);
        $this->load->view('templates/topbar',  $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view($view,               $data);
        $this->load->view('templates/footer');
    }


    public function index() {
function formatBulanIndonesia($tanggal)
{
    $bulanIndo = [
        'January'   => 'Januari',
        'February'  => 'Februari',
        'March'     => 'Maret',
        'April'     => 'April',
        'May'       => 'Mei',
        'June'      => 'Juni',
        'July'      => 'Juli',
        'August'    => 'Agustus',
        'September' => 'September',
        'October'   => 'Oktober',
        'November'  => 'November',
        'December'  => 'Desember',
    ];

    $format = date('F Y', strtotime($tanggal)); // contoh: August 2025
    $enBulan = date('F', strtotime($tanggal)); // contoh: August

    return str_replace($enBulan, $bulanIndo[$enBulan], $format);
}

        $data['judul'] = 'Dashboard';
        $data['total_jenis_wisata']   = $this->M_Dashboard->totalJenisWisata();
        $data['total_fasilitas']      = $this->M_Dashboard->totalFasilitas();
        $data['total_paket']          = $this->M_Dashboard->totalPaket();
        $data['total_gallery']        = $this->M_Dashboard->totalGallery();
        $data['total_video']          = $this->M_Dashboard->totalVideo();
        $data['total_pengunjung']     = $this->M_Dashboard->totalPengunjung();
        $data['statistik_pengunjung'] = $this->M_Dashboard->statistikPengunjungSatuBulanTerakhir();


        $this->render('admin/index', $data);
    }
    


    public function reset_pengunjung() {
        if (!$this->session->userdata('email')) {
            show_404();
        }
        $this->M_Dashboard->hapusSemuaPengunjung();
        echo json_encode(['status' => 'success']);
    }

    public function profil() {
        $data['judul'] = 'Profil Saya';
        // Tidak ambil user by id=1; cukup gunakan $this->authUser di view
        $this->render('user/profil', $data);
    }

    public function editprofil() {
        $data['judul'] = 'Edit Profil';

        // Rules
        $this->form_validation->set_rules('nama',  'Nama',  'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $this->render('user/editprofil', $data);
            return;
        }

        // Ambil input
        $nama  = $this->input->post('nama',  true);
        $email = $this->input->post('email', true);
        $uid   = (int) $this->authUser['id'];

        // Upload image (opsional)
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path']   = './assets/images/users/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2048; // KB
            $config['file_name']     = time() . '_' . preg_replace('/\s+/', '_', $_FILES['image']['name']);

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                // Hapus gambar lama jika bukan default
                $old_image = $this->authUser['image'];
                if (!empty($old_image) && $old_image !== 'default.jpg') {
                    @unlink(FCPATH . 'assets/images/users/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
                // update session agar langsung konsisten di UI
                $this->session->set_userdata('image', $new_image);
                $this->authUser['image'] = $new_image;
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
                redirect('admin/editprofil');
            }
        }

        // Update nama dan email
        $this->db->set('nama',  $nama);
        $this->db->set('email', $email);
        $this->db->where('id',  $uid);
        $this->db->update('user');

        // Sinkronkan session dan $this->authUser
        $this->session->set_userdata('email', $email);
        $this->authUser['nama']  = $nama;
        $this->authUser['email'] = $email;

        $this->session->set_flashdata('message', '<div class="alert alert-success">Profil berhasil diperbarui!</div>');
        redirect('admin/profil');
    }

    public function ubahpassword() {
        $data['judul'] = 'Ubah Password';

        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password1',    'Password Baru', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2',    'Ulangi Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->render('user/ubahpassword', $data);
            return;
        }

        $password_lama = $this->input->post('password_lama', true);
        $password_baru = $this->input->post('password1',    true);
        $uid           = (int) $this->authUser['id'];

        if (!password_verify($password_lama, $this->authUser['password'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Password lama salah!</div>');
            redirect('admin/ubahpassword');
        }

        if ($password_lama === $password_baru) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Password baru tidak boleh sama dengan yang lama!</div>');
            redirect('admin/ubahpassword');
        }

        $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
        $this->db->set('password', $password_hash);
        $this->db->where('id', $uid);
        $this->db->update('user');

        // Update password di $this->authUser agar konsisten
        $this->authUser['password'] = $password_hash;

        $this->session->set_flashdata('message', '<div class="alert alert-success">Password berhasil diubah.</div>');
        redirect('admin/ubahpassword');
    }

    public function kategori() {
        $data['kategori'] = $this->Kategori_model->get_all();
        $this->render('admin/kategori/index', $data);
    }

    public function pengguna() {
        $data['pengguna'] = $this->M_User->getUser()->result_array();
        $this->render('user/pengguna', $data);
    }
}
