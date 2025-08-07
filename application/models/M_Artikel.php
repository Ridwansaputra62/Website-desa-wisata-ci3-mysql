<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Artikel extends CI_Model {
    public function getRecent($limit = 3) {
        return $this->db->order_by('tanggal', 'DESC')->limit($limit)->get('artikel')->result_array();
    }

    public function getAll()
    {
        return $this->db->get('artikel');
    }

    public function insert($data)
    {
        return $this->db->insert('artikel', $data);
    }

    public function getById($id)
    {
        return $this->db->get_where('artikel', ['id_artikel' => $id])->row_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id_artikel', $id);
        return $this->db->update('artikel', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('artikel', ['id_artikel' => $id]);
    }
    public function getArtikelEksternal()
    {
        return $this->db->order_by('tanggal', 'DESC')->get('artikel')->result_array();
    }
    public function searchByTitle($keyword)
{
    $this->db->like('judul', $keyword);
    return $this->db->get('artikel')->result_array();
}

}
