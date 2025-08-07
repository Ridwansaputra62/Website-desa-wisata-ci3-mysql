<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Home extends CI_Model
{
  public function getPaket()
  {
    return $this->db->get('paket')->result_array();
  }

  public function getKontak()
  {
    return $this->db->get('kontak')->result_array();
  }

  public function getVisiMisi()
  {
    return $this->db->get('visi')->row_array();
  }

  public function getSejarah()
  {
    return $this->db->get('sejarah')->row_array();
  }
  public function getGallery()
{
    return $this->db->get('gallery')->result_array();
}

public function getVideo()
{
    return $this->db->get('video')->result_array();
}

}
