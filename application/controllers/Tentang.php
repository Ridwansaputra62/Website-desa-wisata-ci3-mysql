<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_About');
        $this->load->model('M_Home');
    }

    public function index()
    {
        // Data untuk header dan footer
        $data['user'] = $this->M_User->get_user_logo();
        $data['title'] = 'Tentang Kami - Desa Wisata Sedari';
        
        // Data sejarah dan visi misi
        $data['sejarah'] = $this->M_About->getSejarah()->result_array();
        $data['visi'] = $this->M_About->getVisi()->result_array();
        
        // Data kontak untuk footer
        $data['kontak'] = $this->M_Home->getKontak();
        
        // Load view
        $this->load->view('fe/tentang', $data);
    }
}