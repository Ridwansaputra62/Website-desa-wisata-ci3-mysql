<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Gallery extends CI_Model {

    public function getByJenis($id_jenis)
    {
        // kembalikan array of arrays, bukan objek query
        return $this->db->get_where('gallery', ['id_jenis' => (int)$id_jenis])->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('gallery', ['id' => (int)$id])->row_array();
    }
    public function getGalleryByJenis($id)
{
    return $this->db->get_where('gallery', ['id_jenis' => $id])->result_array();
}

}
