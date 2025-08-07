<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('user', $data);
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function getUserWhere($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function getUserLimit()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->limit(10, 0);
        return $this->db->get();
    }
    public function getUserById($id)
{
    return $this->db->get_where('user', ['id' => $id])->row_array();
}
public function get_user_logo()
{
    return $this->db->get('user')->row_array();
}



    public function getUser()
    {
        return $this->db->get('user');
    }

    public function hapusUser($where = null)
    {
        $this->db->delete('user', $where);
    }

        public function updateUser($where = null, $data = null)
    {
        $this->db->update('user', $data, $where);
    }

}
