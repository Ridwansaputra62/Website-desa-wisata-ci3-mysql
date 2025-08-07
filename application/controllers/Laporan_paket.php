<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once FCPATH . 'vendor/autoload.php';
use Dompdf\Dompdf;

class Laporan_paket extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Paket');
        $this->load->model('M_Fasilitas');
        if (!$this->session->userdata('email')) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Silakan login terlebih dahulu.</div>');
        redirect('auth');}
    }

    private function _getPaketWithFasilitas()
{
    $paket = $this->M_Paket->getPaket()->result_array();

    foreach ($paket as &$p) {
        $ids = explode(',', $p['id_fasilitas']); // perbaikan di sini
        $nama_fasilitas = [];

        if (!empty($ids)) {
            $this->db->where_in('id_fasilitas', $ids);
            $fasilitas = $this->db->get('fasilitas')->result_array();
            $nama_fasilitas = array_column($fasilitas, 'nama_fasilitas');
        }

        $p['nama_fasilitas'] = implode(', ', $nama_fasilitas);
    }

    return $paket;
}


    public function index()
{
    $data['judul'] = 'Laporan Data Paket Wisata';
    $data['paket'] = [];

    $paket_raw = $this->M_Paket->getPaket()->result_array();

    foreach ($paket_raw as $p) {
        $id_fasilitas = explode(',', $p['id_fasilitas']);
        $nama_fasilitas = [];

        if (!empty($id_fasilitas)) {
            $this->db->where_in('id_fasilitas', $id_fasilitas);
            $fasilitas = $this->db->get('fasilitas')->result_array();
            foreach ($fasilitas as $f) {
                $nama_fasilitas[] = $f['nama_fasilitas'];
            }
        }

        $p['nama_fasilitas'] = implode(', ', $nama_fasilitas); // nama_fasilitas yang akan ditampilkan di view
        $data['paket'][] = $p; // masukkan ke data paket final
    }

    $data['total'] = count($data['paket']);

    // Load view
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('laporan_paket/index', $data);
    $this->load->view('templates/footer');
}
    public function cetak_pdf()
    {
        $data['judul'] = 'Laporan Paket Wisata';
        $data['paket'] = $this->_getPaketWithFasilitas();
        $html = $this->load->view('laporan_paket/laporan_pdf', $data, true);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        ob_end_clean(); // bersihkan buffer sebelum mengirim output PDF
        $dompdf->stream("laporan-paket.pdf", array("Attachment" => true));
        exit;
    }

    public function print()
    {
        $data['judul'] = 'Print Data Paket';
        $data['paket'] = $this->_getPaketWithFasilitas();
        $this->load->view('laporan_paket/print', $data);
    }

    public function export_excel()
    {
        $paket = $this->_getPaketWithFasilitas();

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"laporan_paket.xls\"");

        echo "<table border='1'>";
        echo "<thead><tr>
                <th>No</th>
                <th>Nama Paket</th>
                <th>Fasilitas</th>
                <th>Harga</th>
                <th>Keterangan</th>
              </tr></thead><tbody>";
        $no = 1;
        foreach ($paket as $row) {
            echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['nama_paket']}</td>
                    <td>{$row['nama_fasilitas']}</td>
                    <td>Rp" . number_format($row['harga'], 0, ',', '.') . "</td>
                    <td>{$row['keterangan']}</td>
                  </tr>";
            $no++;
        }
        echo "</tbody></table>";
    }

    public function export_csv()
    {
        $paket = $this->_getPaketWithFasilitas();

        header("Content-Type: text/csv");
        header("Content-Disposition: attachment; filename=\"laporan_paket.csv\"");

        $output = fopen("php://output", "w");
        fputcsv($output, ['No', 'Nama Paket', 'Fasilitas', 'Harga', 'Keterangan']);

        $no = 1;
        foreach ($paket as $row) {
            fputcsv($output, [
                $no++,
                $row['nama_paket'],
                $row['nama_fasilitas'],
                $row['harga'],
                $row['keterangan']
            ]);
        }

        fclose($output);
        exit;
    }
}
