<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Fasilitas extends CI_Model {

    public function getAll()
    {
        return $this->db->get('fasilitas');
    }

    public function getAllArray()
    {
        return $this->db->get('fasilitas')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('fasilitas', ['id_fasilitas' => $id])->row_array();
    }

    public function insert()
    {
        $data = [
            'nama_fasilitas' => $this->input->post('nama_fasilitas', true),
            'harga_fasilitas' => $this->input->post('harga_fasilitas', true),
        ];
        $this->db->insert('fasilitas', $data);
    }

    public function update($id)
    {
        $data = [
            'nama_fasilitas' => $this->input->post('nama_fasilitas', true),
            'harga_fasilitas' => $this->input->post('harga_fasilitas', true),
        ];
        $this->db->where('id_fasilitas', $id);
        $this->db->update('fasilitas', $data);
    }

    public function delete($id)
    {
        $this->db->delete('fasilitas', ['id_fasilitas' => $id]);
    }
}
