<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Paket');
        $this->load->model('M_Pengunjung');
        $this->load->model('M_Home');       // kontak, visi, sejarah
        $this->load->model('M_Jenis');      // jenis wisata
        $this->load->model('M_Fasilitas');  // fasilitas
        $this->load->model('M_Artikel');    // ✅ artikel eksternal (DITAMBAHKAN)
        $this->load->database();
    }

    public function index()
    {
        try {
            // User dan logo
            $data['user'] = $this->M_User->get_user_logo(); // harusnya row_array()
            

            // Paket Wisata (hanya 3 data pertama) dengan fasilitas
            $paket_raw = $this->M_Paket->getPaket(3)->result_array();
            $paket_processed = [];
            
            foreach ($paket_raw as $p) {
                $id_fasilitas = explode(',', $p['id_fasilitas']);
                $nama_fasilitas = [];

                if (!empty($id_fasilitas) && $id_fasilitas[0] != '') {
                    $this->db->where_in('id_fasilitas', $id_fasilitas);
                    $fasilitas = $this->db->get('fasilitas')->result_array();
                    foreach ($fasilitas as $f) {
                        $nama_fasilitas[] = $f['nama_fasilitas'];
                    }
                }

                $p['fasilitas'] = implode(', ', $nama_fasilitas);
                $paket_processed[] = (object) $p; // Convert back to object
            }
            $data['paket'] = $paket_processed;

            // Jenis Wisata untuk slider
            $data['jenis'] = $this->M_Jenis->getAll()->result_array();

            // Fasilitas untuk features section
            $data['fasilitas'] = $this->M_Fasilitas->getAll()->result_array();

            // Data tambahan dari database
            $data['kontak']  = $this->M_Home->getKontak();
            $data['visi']    = $this->M_Home->getVisiMisi();
            $data['sejarah'] = $this->M_Home->getSejarah();
            $data['gallery'] = $this->M_Home->getGallery();
            $data['video']   = $this->M_Home->getVideo();
            
            // ✅ Artikel eksternal dari DB/model (DITAMBAHKAN)
            $data['artikel_eksternal'] = $this->M_Artikel->getRecent();

            // ✅ Articles JSON (DITAMBAHKAN + aman)
            $data['articles'] = [];
            $json_path = FCPATH . 'assets/data/articles.json';
            if (is_file($json_path) && is_readable($json_path)) {
                $articles_json = @file_get_contents($json_path);
                if ($articles_json !== false) {
                    $all_articles = json_decode($articles_json, true);
                    if (is_array($all_articles)) {
                        // Sort by date desc & ambil 3 teratas
                        usort($all_articles, function($a, $b) {
                            return strtotime($b['date'] ?? '1970-01-01') - strtotime($a['date'] ?? '1970-01-01');
                        });
                        $data['articles'] = array_slice($all_articles, 0, 3);
                    }
                }
            }

            // Tracking pengunjung
            $ip      = $this->input->ip_address();
            $agent   = $this->input->user_agent();
            $halaman = current_url();
            $tanggal = date('Y-m-d');

            if (!$this->M_Pengunjung->cekHariIni($ip, $tanggal)) {
                $this->M_Pengunjung->simpan([
                    'ip_address' => $ip,
                    'user_agent' => $agent,
                    'halaman'    => $halaman,
                    'tanggal'    => $tanggal,
                    'waktu'      => date('Y-m-d H:i:s')
                ]);
            }

            // View final
            $this->load->view('fe/home', $data);
            
        } catch (Exception $e) {
            log_message('error', 'Home controller error: ' . $e->getMessage());
            show_error('Terjadi kesalahan: ' . $e->getMessage(), 500);
        }
    }

    public function debug()
    {
        echo "Testing models...<br>";
        
        try {
            echo "1. Testing M_User...<br>";
            $user = $this->M_User->get_user_logo();
            var_dump($user);
            echo "<br><br>";
            
            echo "2. Testing M_Paket...<br>";
            $paket = $this->M_Paket->getPaket(3)->result();
            var_dump($paket);
            echo "<br><br>";
            
            echo "3. Testing M_Jenis...<br>";
            $jenis = $this->M_Jenis->getAll()->result_array();
            var_dump($jenis);
            echo "<br><br>";
            
            echo "4. Testing M_Fasilitas...<br>";
            $fasilitas = $this->M_Fasilitas->getAll()->result_array();
            var_dump($fasilitas);
            echo "<br><br>";
            
            echo "5. Testing M_Home...<br>";
            $kontak = $this->M_Home->getKontak();
            var_dump($kontak);
            echo "<br><br>";

            echo "6. Testing Artikel eksternal...<br>";
            $artikel_eksternal = $this->M_Artikel->getRecent();
            var_dump($artikel_eksternal);
            echo "<br><br>";

            echo "7. Testing Articles JSON...<br>";
            $json_path = FCPATH . 'assets/data/articles.json';
            if (is_file($json_path)) {
                echo "JSON exists at: {$json_path}<br>";
                $raw = @file_get_contents($json_path);
                var_dump(json_decode($raw, true));
            } else {
                echo "JSON NOT FOUND at: {$json_path}";
            }
            echo "<br><br>";

            echo "All models working!";
            
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
