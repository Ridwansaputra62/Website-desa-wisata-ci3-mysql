<?php
class M_Jenis extends CI_Model {

    public function getAll()
    {
        return $this->db->get('jenis_wisata');
    }
    public function getAllArray()
{
    return $this->db->get('jenis_wisata')->result_array();
}


    public function getById($id)
    {
        return $this->db->get_where('jenis_wisata', ['id_jenis' => $id])->row_array();
    }

    public function update($id)
    {
        $data = [
            'nama_wisata' => $this->input->post('nama_wisata'),
            'deskripsi' => $this->input->post('deskripsi'),
            'harga_tiket' => $this->input->post('harga_tiket')
        ];

        if ($_FILES['gambar']['name']) {
            $config['upload_path'] = './assets/img/jenis/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $data['gambar'] = $this->upload->data('file_name');
            }
        }

        $this->db->where('id_jenis', $id);
        $this->db->update('jenis_wisata', $data);
    }

    public function delete($id)
    {
        $this->db->delete('jenis_wisata', ['id_jenis' => $id]);
    }
}
