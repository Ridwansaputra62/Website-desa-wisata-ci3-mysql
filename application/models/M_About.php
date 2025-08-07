<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_About extends CI_Model
{
    public function simpanSejarah($data = null)
    {
        $this->db->insert('sejarah', $data);
    }

    public function cekSejarah($where = null)
    {
        return $this->db->get_where('sejarah', $where);
    }

    public function getSejarah()
    {
        return $this->db->get('sejarah');
    }

    public function hapusSejarah($where = null)
    {
        $this->db->delete('sejarah', $where);
    }

    public function updateSejarah($where = null, $data = null)
    {
        $this->db->update('sejarah', $data, $where);
    }

    //Setting Bagian visi misi
    public function simpanVisi($data = null)
    {
        $this->db->insert('visi', $data);
    }

    public function cekVisi($where = null)
    {
        return $this->db->get_where('visi', $where);
    }

    public function getVisi()
    {
        return $this->db->get('visi');
    }

        public function updateVisi($where = null, $data = null)
    {
        $this->db->update('visi', $data, $where);
    }

    public function hapusVisi($where = null)
    {
        $this->db->delete('visi', $where);
    }
}
