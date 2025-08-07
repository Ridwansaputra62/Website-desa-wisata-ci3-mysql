<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Video extends CI_Model {

    public function getByJenis($id_jenis)
    {
        return $this->db->get_where('video', ['id_jenis' => (int)$id_jenis])->result_array(); // array
    }

    public function getById($id)
    {
        return $this->db->get_where('video', ['id' => (int)$id])->row_array(); // array
    }

    public function insert($data)
    {
        $this->db->insert('video', $data);
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        $this->db->delete('video', ['id' => (int)$id]);
    }
    public function getVideoByJenis($id)
{
    return $this->db->get_where('video', ['id_jenis' => $id])->result_array();
}

}
