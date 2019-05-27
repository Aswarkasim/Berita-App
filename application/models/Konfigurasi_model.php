<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function listing(){
    $this->db->select('*');
    $this->db->from('konfigurasi');
    $this->db->where('id_konfigurasi', '1');
    $query = $this->db->get();
    return $query->row();

  }

  function update($data){
    $this->db->where('id_konfigurasi', $data['id_konfigurasi']);
    $this->db->update('konfigurasi', $data);
  }

}
