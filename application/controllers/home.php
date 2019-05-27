
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('berita_model');

  }

  function index()
  {
    $kategori = $this->berita_model->listingKategori();
    $beritaBaru = $this->berita_model->listingBeritaHomeBaru();
    $beritaLama = $this->berita_model->listingBeritaHomeLama();
    $beritaRandom = $this->berita_model->listingBeritaHomeRandom();
    $slider = $this->berita_model->listingBeritaHomeSlider();



    $data = array('title'   => 'Portal Raudhatul Mujaddid',
                  'kategori'=> $kategori,
                  'beritaBaru'  => $beritaBaru,
                  'beritaLama'  => $beritaLama,
                  'beritaRandom' => $beritaRandom,
                  'slider'      => $slider,
                  'isi'     => 'home/list');
    $this->load->view('layout/wrapper',$data, FALSE);
  }

  public function berita()
  {
    $berita   = $this->berita_model->listingBerita();
    $kategori = $this->berita_model->listingKategori();

    $valid = $this->form_validation;
    $valid->set_rules('cari', 'Kata Kunci','required', array('required' => 'Kata Kunci harus diisi'));

      if($valid->run()){
      $cari = strip_tags($this->input->post('cari'));
      $keywords = str_replace(' ', '-', $cari);
      $this->session->set_flashdata('msg', ' Hasil pencarian kata kunci <strong>'.$keywords.'</strong>');
      redirect(base_url('home/cari/'.$keywords), 'refresh');
    }
    $data = array('title'   => 'Portal Raudhatul Mujaddid',
                  'kategori'=> $kategori,
                  'berita'  => $berita,
                  'isi'     => 'berita/list_berita');
    $this->load->view('layout/wrapper',$data, FALSE);
  }

  public function post($id_berita, $slug_berita)
  {
    $post   = $this->berita_model->post($id_berita, $slug_berita);
    $kategori = $this->berita_model->listingKategori();


    $data = array('title'   => 'Portal Raudhatul Mujaddid',
                  'kategori'=> $kategori,
                  'post'    => $post,
                  'isi'     => 'berita/blog_post');
    $this->load->view('layout/wrapper',$data, FALSE);
  }

  public function kategori_berita($nama_kategori)
  {
    $berita            = $this->berita_model->listingBerita();
    $kategori_berita   = $this->berita_model->listingBeritaKategori($nama_kategori);
    $kategori          = $this->berita_model->listingKategori();


    $data = array('title'           => 'Portal Raudhatul Mujaddid',
                  'kategori'        => $kategori,
                  'berita'          => $berita,
                  'kategori_berita' => $kategori_berita,
                  'isi'             => 'berita/list_kategori_berita');
    $this->load->view('layout/wrapper',$data, FALSE);
  }


  public function cari($keywords){
    $keywords  = str_replace('-',' ',strip_tags($keywords));
    $berita    = $this->berita_model->cari($keywords);

    $data = array('title'           => 'Hasil Pencarian : '.$keywords.' ('.count($berita).')',
                  'keywords'        => $keywords,
                  'berita'          => $berita,
                  'isi'             => 'berita/list_berita');
    $this->load->view('layout/wrapper',$data, FALSE);

  }





}
