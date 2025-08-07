<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Background extends CI_Model {

    public function get() {
        return $this->db->get('background_home')->row_array();
    }


    public function update($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('background_home', $data);
}

public function getById($id) {
    return $this->db->get_where('background_home', ['id' => $id])->row_array();
}

}
