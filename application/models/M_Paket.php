<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Paket extends CI_Model
{
    public function simpanPaket($data = null)
    {
        $this->db->insert('paket', $data);
    }

    public function cekPaket($where = null)
    {
        return $this->db->get_where('paket', $where);
    }

    public function getPaket($limit = null)
    {
        if ($limit) {
            $this->db->limit($limit);
        }
        return $this->db->get('paket');
    }

    public function getById($id)
    {
        return $this->db->get_where('paket', ['id' => $id])->row_array();
    }

    public function hapusPaket($where = null)
    {
        $this->db->delete('paket', $where);
    }

    public function updatePaket($where = null, $data = null)
    {
        $this->db->update('paket', $data, $where);
    }
    public function getPaketWithFasilitas()
{
    $paket = $this->db->get('paket')->result_array();
    $result = [];

    foreach ($paket as $p) {
        $ids = explode(',', $p['fasilitas']); // id_fasilitas disimpan comma-separated
        $this->db->where_in('id_fasilitas', $ids);
        $fasilitas = $this->db->get('fasilitas')->result_array();
        $nama_fasilitas = array_column($fasilitas, 'nama_fasilitas');
        $p['nama_fasilitas'] = implode(', ', $nama_fasilitas);
        $result[] = $p;
    }

    return $result;
}

}
