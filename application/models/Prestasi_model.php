<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi_model extends CI_Model{

  public function listing(){
    $query = $this->db->query("SELECT * FROM prestasi");
    return $query->result();
  }

  public function detail($id_prestasi){
    $this->db->query("SELECT * FROM prestasi WHERE id_prestasi = '$id_prestasi'");
  }

  public function tambah($nama_peraih, $ajang, $tempat_pelaksanaan, $tahun, $keterangan, $foto){
    $this->db->query("INSERT INTO `prestasi` (`nama_peraih`, `ajang`, `tempat_pelaksanaan`, `tahun`, `foto`, `keterangan`) VALUES ('$nama_peraih', '$ajang', '$tempat_pelaksanaan', '$tahun', '$foto', '$keterangan')");
  }

  public function edit(){

  }

  public function hapus($id_prestasi){
    $this->db->query("DELETE FROM prestasi WHERE `prestasi.`id_prestasi` = '$id_prestasi'");
  }

}
