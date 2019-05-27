<?php
/**
 *
 */
class Berita_model extends CI_Model
{

  public function listingBerita(){
    $this->db->select('berita.*,
                       kategori.nama_kategori,
                       user.nama');
    $this->db->from('berita');
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
    $this->db->order_by('id_berita', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function listingBeritaUser($username){
    $this->db->select('berita.*,
                       kategori.nama_kategori,
                       user.nama');
    $this->db->from('berita');
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
    $this->db->where('username', $username);
    $this->db->order_by('id_berita', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function listingBeritaHomeBaru(){
    $this->db->select('berita.*,
                       kategori.nama_kategori,
                       user.nama');
    $this->db->from('berita');
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
    $this->db->where('status_berita', 'Aktif');
    $this->db->where('jenis_berita', 'Berita');
    $this->db->limit(3);
    $this->db->order_by('id_berita', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  public function listingBeritaHomeLama(){
    $this->db->select('berita.*,
                       kategori.nama_kategori,
                       user.nama');
    $this->db->from('berita');
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
    $this->db->where('status_berita', 'Aktif');
    $this->db->where('jenis_berita', 'Berita');
    $this->db->limit(7);
    $this->db->order_by('id_berita', 'ASC');
    $query = $this->db->get();
    return $query->result();
  }

  public function listingBeritaHomeRandom(){
    $this->db->select('berita.*,
                       kategori.nama_kategori,
                       user.nama');
    $this->db->from('berita');
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
    $this->db->where('status_berita', 'Aktif');
    $this->db->where('jenis_berita', 'Berita');
    $this->db->limit(5);
    $this->db->order_by('id_berita', 'RANDOM');
    $query = $this->db->get();
    return $query->result();
  }
  public function listingBeritaHomeSlider(){
    $this->db->select('berita.*,
                       kategori.nama_kategori,
                       user.nama');
    $this->db->from('berita');
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
    $this->db->where('status_berita', 'Aktif');
    $this->db->where('jenis_berita', 'Slider');
    $this->db->limit(5);
    $this->db->order_by('id_berita', 'RANDOM');
    $query = $this->db->get();
    return $query->result();
  }

  public function listingBeritaKategori($nama_kategori){
    $this->db->select('berita.*,
                       kategori.nama_kategori,
                       user.nama');
    $this->db->from('berita');
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
    $this->db->where('status_berita', 'Aktif');
    $this->db->where('nama_kategori', $nama_kategori);
    $this->db->limit(5);
    $this->db->order_by('id_berita', 'RANDOM');
    $query = $this->db->get();
    return $query->result();
  }

  public function detailBerita($id_berita){
    $this->db->select('berita.*,
                       kategori.nama_kategori,
                       user.nama');
    $this->db->from('berita');
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
    $this->db->where('status_berita', 'Aktif');
    $this->db->where('id_berita', $id_berita);
    $this->db->order_by('id_berita', 'DESC');
    $query = $this->db->get();
    return $query->row();
  }

  public function cari($keywords){
    $this->db->select('berita.*,
                       kategori.nama_kategori,
                       user.nama');
    $this->db->from('berita');
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
    $this->db->where('status_berita', 'Aktif');
    $this->db->like('berita.judul_berita', $keywords);
    $this->db->limit(5);
    $this->db->order_by('id_berita', 'RANDOM');
    $query = $this->db->get();
    return $query->result();
  }



  public function post($id_berita, $slug_berita){
    $this->db->select('berita.*,
                       kategori.nama_kategori,
                       user.nama');
    $this->db->from('berita');
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori', 'LEFT');
    $this->db->join('user', 'user.id_user = berita.id_user', 'LEFT');
    $this->db->where('status_berita', 'Aktif');
    $this->db->where('id_berita', $id_berita);
    $this->db->where('slug_berita', $slug_berita);
    $this->db->order_by('id_berita', 'DESC');
    $query = $this->db->get();
    return $query->row();
  }

function tambahBerita($data/*$id_user, $id_kategori, $slug_berita, $judul_berita, $isi_berita, $gambar, $status_berita, $jenis_berita, $keyword, $tanggal_post*/){
      // $query = $this->db->query("INSERT INTO 'berita' ('id_user', 'id_kategori', 'slug_berita','judul_berita', 'isi_berita', 'gambar', 'status_berita', 'jenis_berita', 'keyword', 'tanggal_post')
      //                           VALUES ('$id_user', '$id_kategori', '$slug_berita', '$judul_berita', '$isi_berita', '$gambar', '$status_berita', '$jenis_berita', '$keyword', '$tanggal_post')");
      // return $query;
      $this->db->insert('berita', $data);
  }

  function editBerita($data){
    $this->db->where('id_berita', $data['id_berita']);
    $this->db->update('berita', $data);
  }

  function hapusBerita($id_berita){
    $this->db->query("DELETE FROM berita WHERE berita.id_berita = '$id_berita'");
  }

  function listingKategori(){
    $query = $this->db->query("SELECT * FROM kategori ORDER BY id_kategori ASC");
    return $query->result();
  }

  function detailKategori($id_kategori){
    $query = $this->db->query("SELECT * FROM kategori WHERE id_kategori = '$id_kategori'");
    return $query->row();
  }

  function tambahKategori($nama_kategori){
    $query = $this->db->query("INSERT INTO `kategori` (`nama_kategori`) VALUES ('$nama_kategori')");
    return $query;
  }

  function editKategori($id_kategori, $nama_kategori){
    $query  = $this->db->query("UPDATE `kategori` SET `nama_kategori` = '$nama_kategori' WHERE `kategori`.`id_kategori` = '$id_kategori'");
    return $query;
  }

  public function hapusKategori($id_kategori){
    $query = $this->db->query("DELETE FROM kategori WHERE kategori.id_kategori = '$id_kategori'");
  }
}
