<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dashboard extends CI_Model
{
   public function statistikPengunjungSatuBulanTerakhir()
{
    return $this->db->select('DATE(waktu) as tanggal, COUNT(*) as total')
                    ->from('pengunjung')
                    ->where('waktu >=', date('Y-m-01 00:00:00'))  // Awal bulan ini
                    ->where('waktu <=', date('Y-m-t 23:59:59'))    // Akhir bulan ini
                    ->group_by('DATE(waktu)')
                    ->order_by('DATE(waktu)', 'ASC')
                    ->get()
                    ->result();
}


    public function statistikPengunjungHarian() {
    return $this->db->select('DATE(waktu) as tanggal, COUNT(*) as total')
                    ->from('pengunjung')
                    ->group_by('DATE(waktu)')
                    ->order_by('DATE(waktu)', 'DESC')
                    ->limit(7)
                    ->get()
                    ->result();

}
public function totalPengunjung() {
    return $this->db->count_all('pengunjung');
}

    public function totalJenisWisata()
    {
        return $this->db->get('jenis_wisata')->num_rows();
    }

    public function totalFasilitas()
    {
        return $this->db->get('fasilitas')->num_rows();
    }

    public function totalPaket()
    {
        return $this->db->get('paket')->num_rows();
    }

    public function totalGallery()
    {
        return $this->db->get('gallery')->num_rows();
    }

    public function totalVideo()
    {
        return $this->db->get('video')->num_rows();
    }
    public function hapusSemuaPengunjung() {
        return $this->db->empty_table('pengunjung');
    }
}
