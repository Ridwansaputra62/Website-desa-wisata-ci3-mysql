<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pesan extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('pesan', $data);
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('pesan', $where);
    }

    public function getPesan()
    {
        return $this->db->get('pesan');
    }

    public function hapusUser($where = null)
    {
        $this->db->delete('pesan', $where);
    }

    //Setting Bagian Kontak
    public function simpanKontak($data = null)
    {
        $this->db->insert('kontak', $data);
    }

    public function cekKontak($where = null)
    {
        return $this->db->get_where('kontak', $where);
    }

    public function getKontak()
    {
        return $this->db->get('kontak');
    }

        public function updateKontak($where = null, $data = null)
    {
        $this->db->update('kontak', $data, $where);
    }

     public function hapusKontak($where = null)
    {
        $this->db->delete('kontak', $where);
    }
}
