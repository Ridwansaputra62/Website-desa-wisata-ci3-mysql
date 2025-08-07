<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load Composer autoload
require_once FCPATH . 'vendor/autoload.php';
use Dompdf\Dompdf;
class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Jenis');
        if (!$this->session->userdata('email')) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Silakan login terlebih dahulu.</div>');
        redirect('auth');}
    }

    public function index()
    {
        $data['judul'] = 'Laporan Data Wisata';
        $data['jenis'] = $this->M_Jenis->getAll()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_pdf()
    {
        
    
        $data['judul'] = 'Laporan Wisata';
        $data['jenis'] = $this->M_Jenis->getAll()->result_array();
    
        // Ambil isi view sebagai HTML string
        $html = $this->load->view('laporan/laporan_pdf', $data, true);
    
        // Inisialisasi Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        // Bersihkan dan hentikan buffer agar tidak kirim output sebelum header PDF
        ob_end_clean();
    
        // Stream PDF (langsung download)
        $dompdf->stream("laporan-wisata.pdf", array("Attachment" => true));
        exit;
    }
    public function print()
{
    $data['judul'] = 'Print Data Wisata';
    $data['jenis'] = $this->M_Jenis->getAll()->result_array();
    $this->load->view('laporan/print', $data);
}
public function export_excel()
{
    $data['jenis'] = $this->M_Jenis->getAll()->result_array();

    // Set header Excel
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"laporan_wisata.xls\"");

    // HTML table
    echo "<table border='1'>";
    echo "<thead><tr>
            <th>No</th>
            <th>Nama Wisata</th>
            <th>Deskripsi</th>
            <th>Harga Tiket</th>
          </tr></thead><tbody>";
    $no = 1;
    foreach ($data['jenis'] as $row) {
        echo "<tr>
                <td>{$no}</td>
                <td>{$row['nama_wisata']}</td>
                <td>{$row['deskripsi']}</td>
                <td>Rp" . number_format($row['harga_tiket'], 0, ',', '.') . "</td>
              </tr>";
        $no++;
    }
    echo "</tbody></table>";
}

public function export_csv()
{
    $data['jenis'] = $this->M_Jenis->getAll()->result_array();

    // Set header CSV
    header("Content-Type: text/csv");
    header("Content-Disposition: attachment; filename=\"laporan_wisata.csv\"");

    $output = fopen("php://output", "w");
    fputcsv($output, ['No', 'Nama Wisata', 'Deskripsi', 'Harga Tiket']);

    $no = 1;
    foreach ($data['jenis'] as $row) {
        fputcsv($output, [
            $no++,
            $row['nama_wisata'],
            $row['deskripsi'],
            $row['harga_tiket']
        ]);
    }

    fclose($output);
    exit;
}



}
