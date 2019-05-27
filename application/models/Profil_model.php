<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model{


  public function listing(){
    $query = $this->db->query("SELECT * FROM profil WHERE id_profil = '1'");
    return $query->row();
  }

  public function update($data){
    $this->db->update('profil', $data);
    $this->db->where('id_profil', $data['id_profil']);
  }


}
