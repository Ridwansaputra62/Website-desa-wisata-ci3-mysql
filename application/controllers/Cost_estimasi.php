<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cost_estimasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Paket');
        $this->load->model('M_Fasilitas');
        $this->load->model('M_Home');
    }

    public function index()
    {
        // Data untuk header dan footer
        $data['user'] = $this->M_User->get_user_logo();
        $data['title'] = 'Cost Estimasi - Desa Wisata Sedari';
        $data['kontak'] = $this->M_Home->getKontak();
        
        // Data paket wisata untuk dropdown
        $data['paket'] = $this->M_Paket->getPaket()->result_array();
        
        // Data fasilitas untuk checkbox
        $data['fasilitas'] = $this->M_Fasilitas->getAllArray();
        
        // Load view
        $this->load->view('fe/cost-estimasi', $data);
    }

    public function calculate()
    {
        // Handle AJAX request for cost calculation
        $this->output->set_content_type('application/json');
        
        $paket_id = $this->input->post('paket_id');
        $jumlah_peserta = (int)$this->input->post('jumlah_peserta');
        $fasilitas_ids = $this->input->post('fasilitas_ids');
        
        $total_cost = 0;
        $breakdown = array();
        
        // Calculate package cost
        if ($paket_id && $jumlah_peserta > 0) {
            $paket = $this->M_Paket->getById($paket_id);
            if ($paket) {
                $paket_cost = $paket['harga'] * $jumlah_peserta;
                $total_cost += $paket_cost;
                $breakdown['paket'] = array(
                    'nama' => $paket['nama_paket'],
                    'harga_per_orang' => $paket['harga'],
                    'jumlah_peserta' => $jumlah_peserta,
                    'subtotal' => $paket_cost
                );
            }
        }
        
        // Calculate additional facilities cost
        $fasilitas_cost = 0;
        $fasilitas_list = array();
        
        if ($fasilitas_ids && is_array($fasilitas_ids)) {
            foreach ($fasilitas_ids as $fasilitas_id) {
                $fasilitas = $this->M_Fasilitas->getById($fasilitas_id);
                if ($fasilitas) {
                    $facility_cost = $fasilitas['harga_fasilitas'] * $jumlah_peserta;
                    $fasilitas_cost += $facility_cost;
                    $fasilitas_list[] = array(
                        'nama' => $fasilitas['nama_fasilitas'],
                        'harga_per_orang' => $fasilitas['harga_fasilitas'],
                        'subtotal' => $facility_cost
                    );
                }
            }
        }
        
        $total_cost += $fasilitas_cost;
        $breakdown['fasilitas'] = $fasilitas_list;
        $breakdown['total_fasilitas'] = $fasilitas_cost;
        
        // Calculate discount if applicable (example: 10% for groups > 20 people)
        $discount = 0;
        $discount_percentage = 0;
        if ($jumlah_peserta >= 20) {
            $discount_percentage = 10;
            $discount = $total_cost * ($discount_percentage / 100);
        } elseif ($jumlah_peserta >= 10) {
            $discount_percentage = 5;
            $discount = $total_cost * ($discount_percentage / 100);
        }
        
        $final_total = $total_cost - $discount;
        
        $response = array(
            'success' => true,
            'breakdown' => $breakdown,
            'subtotal' => $total_cost,
            'discount' => $discount,
            'discount_percentage' => $discount_percentage,
            'total' => $final_total,
            'formatted_total' => 'Rp ' . number_format($final_total, 0, ',', '.')
        );
        
        echo json_encode($response);
    }

    public function submit()
    {
        // Handle form submission for cost estimation request
        $this->output->set_content_type('application/json');
        
        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tema_kunjungan' => $this->input->post('tema_kunjungan'),
            'jumlah_peserta' => $this->input->post('jumlah_peserta'),
            'paket_id' => $this->input->post('paket_id'),
            'fasilitas_ids' => $this->input->post('fasilitas_ids'),
            'total_cost' => $this->input->post('total_cost'),
            'tanggal_request' => date('Y-m-d H:i:s')
        );
        
        // In a real application, you would save this to database
        // For now, we'll just return success response
        
        $response = array(
            'success' => true,
            'message' => 'Permintaan estimasi biaya berhasil dikirim! Tim kami akan menghubungi Anda segera.',
            'data' => $data
        );
        
        echo json_encode($response);
    }
}