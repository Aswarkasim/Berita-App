<?php
/**
 *
 */
class User_model extends CI_Model
{

  function listing()
  {
    $query = $this->db->query("SELECT * FROM USER");
    return $query->result();
  }

  public function detail($id_user){
    $query = $this->db->query("SELECT * FROM user WHERE id_user = '$id_user'");
    return $query->row();
    // $this->db->select('*');
    // $this->db->from('user');
    // $this->db->where('id_user', $id_user);
    // $query = $this->db->get();
    // return $query->row();

  }

  public function login($username, $password){
    $query = $this->db->query("SELECT * FROM user WHERE username = '$username' && password = '$password'");
    return $query->row();
  }

  public function tambah($nama, $username, $email, $password, $akses_level, $foto){
    $query = $this->db->query("INSERT INTO user (`nama`, `email`, `username`, `password`, `akses_level`, `foto`) VALUES ('$nama', '$email', '$username', '$password', '$akses_level', '$foto')");
    return $query;
  }

  public function edit($data){
    $this->db->where('id_user', $data['id_user']);
    $this->db->update('user', $data);
  }

  public  function hapus($id_user){
    $this->db->query("DELETE FROM `user` WHERE `user`.`id_user` = '$id_user'");
  }
}
