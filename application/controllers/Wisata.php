<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Jenis');
        $this->load->model('M_Paket');
        $this->load->model('M_Home');
    }

    public function index()
    {
        // Header/Footer defaults
        $data['user']  = $this->M_User->get_user_logo();
        $data['title'] = 'Wisata - Desa Wisata Sedari';

        // Data jenis wisata & paket (ARRAY asosiatif)
        $data['jenis'] = $this->M_Jenis->getAll()->result_array();
        $data['paket'] = $this->M_Paket->getPaket()->result_array();

        // ================== KONTAK (banyak baris) ==================
        // Ambil semua baris kontak
        $kontak_rows = $this->M_Home->getKontak(); // result_array()

        // Cari baris pertama yang punya kolom 'telepon' terisi
        $kontak_row = null;
        if (is_array($kontak_rows)) {
            foreach ($kontak_rows as $row) {
                // Jika nama kolom berbeda, mis. 'no_telp' atau 'hp', ganti di sini
                if (!empty($row['telepon'])) {
                    $kontak_row = $row;
                    break;
                }
            }
        }

        // Simpan ke view (jika perlu ditampilkan di footer/dll)
        $data['kontak'] = $kontak_row;

        // Normalisasi nomor WA
        $telepon = $kontak_row ? (string)$kontak_row['telepon'] : '';
        $wa_number = $this->normalize_wa($telepon);

        // Base link WA yang dipakai di view
        $data['wa_link_base'] = $wa_number ? ('https://wa.me/' . $wa_number . '?text=') : '';

        // Load view
        $this->load->view('fe/wisata', $data);
    }

    /** Normalisasi nomor ke format 62xxxxxxxxxx */
    private function normalize_wa($telp)
    {
        // Ambil hanya angka
        $telp = preg_replace('/\D+/', '', (string)$telp);
        if ($telp === '') return '';

        // +62xxxxx akan jadi 62xxxxx setelah preg_replace
        if (strpos($telp, '62') === 0) {
            return $telp; // sudah 62...
        }
        if (strpos($telp, '0') === 0) {
            return '62' . substr($telp, 1); // 08xx -> 62xx
        }
        // Jika format lain tapi angka valid, kembalikan apa adanya
        return $telp;
    }
}
