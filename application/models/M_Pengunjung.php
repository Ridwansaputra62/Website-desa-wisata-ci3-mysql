<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pengunjung extends CI_Model {
    public function simpan($data) {
        return $this->db->insert('pengunjung', $data);
    }

    public function cekHariIni($ip, $tanggal) {
        return $this->db->where('ip_address', $ip)
                        ->where('tanggal', $tanggal)
                        ->get('pengunjung')
                        ->row();
    }

    public function getStatistikHarian() {
        return $this->db->select('tanggal, COUNT(*) as total')
                        ->group_by('tanggal')
                        ->order_by('tanggal', 'DESC')
                        ->limit(30)
                        ->get('pengunjung')
                        ->result();
    }
}
