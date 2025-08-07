<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

    private $authUser;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['M_Video', 'M_Jenis', 'M_User']);
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

        if (empty($this->authUser)) {
            $this->session->sess_destroy();
            redirect('auth');
        }
    }

    private function render($view, $data = [])
    {
        $data['user'] = $this->authUser;
        $this->load->view('templates/header',  $data);
        $this->load->view('templates/topbar',  $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view($view,               $data);
        $this->load->view('templates/footer');
    }

    public function index()
    {
        $data['judul'] = 'Video Wisata';
        $data['jenis'] = $this->M_Jenis->getAllArray(); // sudah array
        $this->render('video/index', $data);
    }

    public function lihat($id_jenis)
    {
        $id_jenis = (int) $id_jenis; // CAST: cegah karakter terlarang di URL segment
        $jenis = $this->M_Jenis->getById($id_jenis);
        if (!$jenis) {
            show_404();
        }

        $data['judul'] = 'Video Wisata - ' . $jenis['nama_wisata'];
        $data['jenis'] = $jenis;
        $data['video'] = $this->M_Video->getByJenis($id_jenis); // array of arrays

        $this->render('video/lihat', $data);
    }

    public function tambah($id_jenis)
    {
        $id_jenis = (int) $id_jenis; // CAST
        $jenis = $this->M_Jenis->getById($id_jenis);
        if (!$jenis) {
            show_404();
        }

        $data['judul'] = 'Tambah Video';
        $data['jenis'] = $jenis;

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('link_video', 'Link Video', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->render('video/tambah', $data);
            return;
        }

        $link_input = $this->input->post('link_video', true);
        $link_embed = $this->to_youtube_embed($link_input);

        $insert = [
            'id_jenis'    => $id_jenis,
            'nama_wisata' => $jenis['nama_wisata'],
            'keterangan'  => $this->input->post('keterangan', true),
            'link_video'  => $link_embed
        ];
        $this->M_Video->insert($insert);

        $this->session->set_flashdata('pesan', 'Video berhasil ditambahkan.');
        redirect('video/lihat/' . $id_jenis);
    }

    public function edit($id)
    {
        $id    = (int) $id; // CAST
        $video = $this->M_Video->getById($id);
        if (!$video) {
            show_404();
        }

        $data['judul'] = 'Edit Video';
        $data['video'] = $video;

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('link_video', 'Link Video', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->render('video/edit', $data);
            return;
        }

        $link_input = $this->input->post('link_video', true);
        $link_embed = $this->to_youtube_embed($link_input);

        $update = [
            'keterangan' => $this->input->post('keterangan', true),
            'link_video' => $link_embed
        ];

        $this->db->where('id', $id)->update('video', $update);

        $this->session->set_flashdata('pesan', 'Video berhasil diperbarui.');
        $id_jenis = (int) $this->input->post('id_jenis'); // hidden input di form
        redirect('video/lihat/' . $id_jenis);
    }

    public function hapus($id)
    {
        $id    = (int) $id; // CAST
        $video = $this->M_Video->getById($id);
        if (!$video) {
            show_404();
        }
        $this->M_Video->delete($id);
        $this->session->set_flashdata('pesan', 'Video berhasil dihapus.');
        redirect('video/lihat/' . (int)$video['id_jenis']);
    }

    /**
     * Konversi URL YouTube (watch/share/shorts) menjadi embed URL yang aman untuk iframe.
     * Menghindari karakter terlarang di URI segment karena embed dipakai di atribut src (bukan segment URL).
     */
    private function to_youtube_embed($url)
    {
        $url = trim($url);
        if ($url === '') {
            return '';
        }

        $parts = parse_url($url);
        $host  = isset($parts['host']) ? strtolower($parts['host']) : '';
        $path  = isset($parts['path']) ? $parts['path'] : '';
        $query = [];
        if (isset($parts['query'])) {
            parse_str($parts['query'], $query);
        }

        $video_id = '';

        // Pola umum
        // https://www.youtube.com/watch?v=VIDEO_ID
        if (($host === 'www.youtube.com' || $host === 'youtube.com') && isset($query['v'])) {
            $video_id = $query['v'];
        }

        // https://youtu.be/VIDEO_ID
        if (!$video_id && ($host === 'youtu.be')) {
            if (preg_match('~^/([A-Za-z0-9_-]{6,})~', $path, $m)) {
                $video_id = $m[1];
            }
        }

        // https://www.youtube.com/shorts/VIDEO_ID
        if (!$video_id && ($host === 'www.youtube.com' || $host === 'youtube.com')) {
            if (preg_match('~^/shorts/([A-Za-z0-9_-]{6,})~', $path, $m)) {
                $video_id = $m[1];
            }
        }

        if (!$video_id) {
            // fallback: jika tidak bisa di-parse, kembalikan URL asli (tetap aman karena dipakai di iframe src)
            return $url;
        }

        // Kembalikan URL embed
        return 'https://www.youtube.com/embed/' . $video_id;
    }
}
