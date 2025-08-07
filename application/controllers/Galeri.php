<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Jenis');
        $this->load->model('M_Gallery');
        $this->load->model('M_Video');
        $this->load->model('M_Home');
    }

    public function index()
    {
        // Data untuk header dan footer
        $data['user'] = $this->M_User->get_user_logo();
        $data['title'] = 'Galeri - Desa Wisata Sedari';
        
        // Data jenis wisata untuk ditampilkan
        $data['jenis'] = $this->M_Jenis->getAll()->result_array();
        
        // Data kontak untuk footer
        $data['kontak'] = $this->M_Home->getKontak();
        
        // Load view
        $this->load->view('fe/galeri', $data);
    }

    public function foto($id_jenis = null)
    {
        if (!$id_jenis) {
            redirect('galeri');
        }

        // Data untuk header dan footer
        $data['user'] = $this->M_User->get_user_logo();
        $data['kontak'] = $this->M_Home->getKontak();
        
        // Data jenis wisata
        $jenis = $this->M_Jenis->getById($id_jenis);
        if (!$jenis) {
            redirect('galeri');
        }
        $data['jenis'] = $jenis;
        $data['title'] = 'Galeri Foto ' . $data['jenis']['nama_wisata'] . ' - Desa Wisata Sedari';
        
        // Data galeri foto untuk jenis wisata ini
        $data['gallery'] = $this->M_Gallery->getGalleryByJenis($id_jenis);

        
        // Load view
        $this->load->view('fe/galeri-foto', $data);
    }

    public function video($id_jenis = null)
    {
        if (!$id_jenis) {
            redirect('galeri');
        }

        // Data untuk header dan footer
        $data['user'] = $this->M_User->get_user_logo();
        $data['kontak'] = $this->M_Home->getKontak();
        
        // Data jenis wisata
        $jenis = $this->M_Jenis->getById($id_jenis);
        if (!$jenis) {
            redirect('galeri');
        }
        $data['jenis'] = $jenis;
        $data['title'] = 'Galeri Video ' . $data['jenis']['nama_wisata'] . ' - Desa Wisata Sedari';
        
        // Data video untuk jenis wisata ini
        $data['video'] = $this->M_Video->getVideoByJenis($id_jenis);

        
        // Load view
        $this->load->view('fe/galeri-video', $data);
    }
}