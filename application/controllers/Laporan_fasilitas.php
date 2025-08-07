<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;


class Laporan_fasilitas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Fasilitas');
        if (!$this->session->userdata('email')) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Silakan login terlebih dahulu.</div>');
        redirect('auth');}
    }

    public function index()
    {
        $data['judul'] = 'Laporan Data Fasilitas';
        $data['fasilitas'] = $this->M_Fasilitas->getAllArray();
$data['total'] = count($data['fasilitas']);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan_fasilitas/index', $data);
        $this->load->view('templates/footer');
    }

    
public function cetak_pdf()
{
    require_once FCPATH . 'vendor/autoload.php';

    $data['judul'] = 'Laporan Data Fasilitas';
    $data['fasilitas'] = $this->M_Fasilitas->getAllArray();
$data['total'] = count($data['fasilitas']);

    $html = $this->load->view('laporan_fasilitas/laporan_pdf', $data, true);

    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream('laporan_fasilitas.pdf', ['Attachment' => true]);
}


    public function export_excel()
    {
        header("Content-Type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan_Fasilitas.xls");

        $data['judul'] = 'Laporan Data Fasilitas';
        $data['fasilitas'] = $this->M_Fasilitas->getAllArray();
$data['total'] = count($data['fasilitas']);

        $this->load->view('laporan_fasilitas/excel', $data);
    }

    public function export_csv()
{
    $this->load->model('M_Fasilitas');
    $fasilitas = $this->M_Fasilitas->getAllArray();

    // Bersihkan output buffer
    ob_clean();

    // Set Header CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="laporan_fasilitas.csv"');

    $output = fopen('php://output', 'w');

    // Header kolom
    fputcsv($output, ['No', 'Nama Fasilitas', 'Harga']);

    // Isi data
    $no = 1;
    foreach ($fasilitas as $row) {
        fputcsv($output, [
            $no++,
            $row['nama_fasilitas'],
            $row['harga_fasilitas']
        ]);
    }

    fclose($output);
    exit;
}


    public function print()
    {
        $data['judul'] = 'Laporan Data Fasilitas';
        $data['fasilitas'] = $this->M_Fasilitas->getAllArray();
$data['total'] = count($data['fasilitas']);

        $this->load->view('laporan_fasilitas/print', $data);
    }
}
