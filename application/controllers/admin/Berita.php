<?php
/**
 *
 */
class Berita extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('berita_model');
  }

  public function index(){
    $id_user = $this->session->userdata('id_user');
    $data_user = $this->user_model->detail($id_user);
    $username = $data_user->username;

    if($this->session->userdata('akses_level')=="Admin"){
      $berita     = $this->berita_model->listingBerita();
      $data = array('title'         => 'Daftar ('.count($berita).') berita',
                    'berita'        => $berita,
                    'isi'           => 'admin/berita/list'
          );
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    }else{

      $berita     = $this->berita_model->listingBeritaUser($username);
      $data = array('title'         => 'Daftar ('.count($berita).') berita',
                    'berita'        => $berita,
                    'isi'           => 'admin/berita/list'
          );
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
  }

  public function tambahBerita(){
    $id_user = $this->session->userdata('id_user');
    $akses_level = $this->session->userdata('akses_level');
    $kategori   = $this->berita_model->listingKategori();


    $valid = $this->form_validation;

    $valid->set_rules('judul_berita', 'Judul Berita', 'required',
                array('required'    => '%s tidak boleh kosong'));
    $valid->set_rules('kategori', 'Kategori', 'required',
                array('required'    => '%s belum dipilih'));
    // $valid->set_rules('gambar', 'Gambar', 'required',
    //             array('required'    => '%s belum dimasukkan'));
    $valid->set_rules('keyword', 'keyword', 'required|min_length[70]',
                array('required'    => '%s tidak boleh kosong',
                      'min_length'  => '%s minimal 70 karakter'));
    $valid->set_rules('isi_berita', 'Isi Berita', 'required|min_length[700]',
                array('required'    => '%s tidak boleh kosong',
                      'min_length'  => '%s minimal 700 karakter'));


    if($valid->run()){
      if(!empty($_FILES['gambar']['name'])){
        $config['upload_path']   = './assets/uploads/images/berita/';
  			$config['allowed_types'] = 'jpg|jpeg|gif|bmp|png';
  			$config['max_size']      = '12000'; // KB
        $this->upload->initialize($config);

        if(!$this->upload->do_upload('gambar')){
          $data = array('title'   => 'Menulis berita',
                        'kategori'=> $kategori,
                        'error'   => $this->upload->display_errors(),
                        'isi'     => 'admin/berita/tambah');
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        }else{
          $upload_data    = array('uploads' => $this->upload->data());
    			// Image Editor
    			$config['image_library']  	= 'gd2';
    			$config['source_image']   	= './assets/uploads/images/berita/'.$upload_data['uploads']['file_name'];
    			$config['new_image']     	= './assets/uploads/images/berita/thumbs/';
    			$config['create_thumb']   	= TRUE;
    			$config['quality']       	= "100%";
    			$config['maintain_ratio']   = TRUE;
    			$config['width']       		= 360; // Pixel
    			$config['height']       	= 360; // Pixel
    			$config['x_axis']       	= 0;
    			$config['y_axis']       	= 0;
    			$config['thumb_marker']   	= '';

          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          $i = $this->input;
          $slug_judul = url_title($this->input->post('judul_berita'),'dash', TRUE);

          if($akses_level=="Admin"){
            $data = array('id_user'       => $id_user,
                          'id_kategori'   => $i->post('kategori'),
                          'slug_berita'   => $slug_judul,
                          'judul_berita'  => $i->post('judul_berita') ,
                          'isi_berita'    => $i->post('isi_berita'),
                          'gambar'        => $upload_data['uploads']['file_name'],
                          'status_berita' => $i->post('status_berita'),
                          'jenis_berita'  => $i->post('jenis_berita'),
                          'keyword'       => $i->post('keyword'),
                          'tanggal_post'  => date('Y-m-d H:i:s')
                        );
          }else {
            $data = array('id_user'       => $id_user,
                          'id_kategori'   => $i->post('kategori'),
                          'slug_berita'   => $slug_judul,
                          'judul_berita'  => $i->post('judul_berita') ,
                          'isi_berita'    => $i->post('isi_berita'),
                          'gambar'        => $upload_data['uploads']['file_name'],
                          'status_berita' => 'Non Aktif',
                          'jenis_berita'  => $i->post('jenis_berita'),
                          'keyword'       => $i->post('keyword'),
                          'tanggal_post'  => date('Y-m-d H:i:s')
                        );
          }

          $this->berita_model->tambahBerita(/*$id_user, $id_kategori, $slug_berita, $judul_berita, $isi_berita, $gambar, $status_berita, $jenis_berita, $keyword, $tanggal_post*/$data);
            if($akses_level=="User"){
              $this->session->set_flashdata('msg', 'Berita telah ditambahkan. Hubungi Admin untuk mempubilkasikan berita anda');
            }else{
              $this->session->set_flashdata('msg', 'Berita telah ditambahkan');
            }
          redirect(base_url('admin/berita'),'refresh');
        }
      }else {
        $i = $this->input;
        $slug_judul = url_title($this->input->post('judul_berita'),'dash', TRUE);

        if($akses_level=="Admin"){
          $data = array('id_user'       => $id_user,
                        'id_kategori'   => $i->post('kategori'),
                        'slug_berita'   => $slug_judul,
                        'judul_berita'  => $i->post('judul_berita') ,
                        'isi_berita'    => $i->post('isi_berita'),
                        'status_berita' => $i->post('status_berita'),
                        'jenis_berita'  => $i->post('jenis_berita'),
                        'keyword'       => $i->post('keyword'),
                        'tanggal_post'  => date('Y-m-d H:i:s')
                      );
        }else {
          $data = array('id_user'       => $id_user,
                        'id_kategori'   => $i->post('kategori'),
                        'slug_berita'   => $slug_judul,
                        'judul_berita'  => $i->post('judul_berita') ,
                        'isi_berita'    => $i->post('isi_berita'),
                        'status_berita' => 'Non Aktif',
                        'jenis_berita'  => $i->post('jenis_berita'),
                        'keyword'       => $i->post('keyword'),
                        'tanggal_post'  => date('Y-m-d H:i:s')
                      );
        }

        $this->berita_model->tambahBerita(/*$id_user, $id_kategori, $slug_berita, $judul_berita, $isi_berita, $gambar, $status_berita, $jenis_berita, $keyword, $tanggal_post*/$data);
        if($akses_level=="User"){
          $this->session->set_flashdata('msg', 'Berita telah ditambahkan. Hubungi Admin untuk mempubilkasikan berita anda');
        }else{
          $this->session->set_flashdata('msg', 'Berita telah ditambahkan');
        }
        redirect(base_url('admin/berita'),'refresh');
      }
    }
    $data = array('title'   => 'Menulis berita',
                  'kategori'=> $kategori,
                  'isi'     => 'admin/berita/tambah');
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function editBerita($id_berita){

    $id_user = $this->session->userdata('id_user');
    $akses_level = $this->session->userdata('akses_level');
    $kategori   = $this->berita_model->listingKategori();
    $berita   = $this->berita_model->detailBerita($id_berita);

    $i = $this->input;
    $slug_judul = url_title($this->input->post('judul_berita'),'dash', TRUE);

    $valid = $this->form_validation;

    $valid->set_rules('judul_berita', 'Judul Berita', 'required',
                array('required'    => '%s tidak boleh kosong'));
    $valid->set_rules('kategori', 'Kategori', 'required',
                array('required'    => '%s belum dipilih'));
    // $valid->set_rules('gambar', 'Gambar', 'required',
    //             array('required'    => '%s belum dimasukkan'));
    $valid->set_rules('keyword', 'keyword', 'required|min_length[70]',
                array('required'    => '%s tidak boleh kosong',
                      'min_length'  => '%s minimal 70 karakter'));
    $valid->set_rules('isi_berita', 'Isi Berita', 'required|min_length[700]',
                array('required'    => '%s tidak boleh kosong',
                      'min_length'  => '%s minimal 700 karakter'));


    if($valid->run()){
      if(!empty($_FILES['gambar']['name'])){
        $config['upload_path']   = './assets/uploads/images/berita/';
        $config['allowed_types'] = 'jpg|jpeg|gif|bmp|png';
        $config['max_size']      = '12000'; // KB
        $this->upload->initialize($config);

        if(!$this->upload->do_upload('gambar')){
          $data = array('title'   => 'Menulis berita',
                        'kategori'=> $kategori,
                        'berita'  => $berita,
                        'error'   => $this->upload->display_errors(),
                        'isi'     => 'admin/berita/edit');
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        }else{
          $upload_data    = array('uploads' => $this->upload->data());
          // Image Editor
          $config['image_library']  	= 'gd2';
          $config['source_image']   	= './assets/uploads/images/berita/'.$upload_data['uploads']['file_name'];
          $config['new_image']     	= './assets/uploads/images/berita/thumbs/';
          $config['create_thumb']   	= TRUE;
          $config['quality']       	= "100%";
          $config['maintain_ratio']   = TRUE;
          $config['width']       		= 360; // Pixel
          $config['height']       	= 360; // Pixel
          $config['x_axis']       	= 0;
          $config['y_axis']       	= 0;
          $config['thumb_marker']   	= '';

          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          if(!empty($berita->gambar)){
            unlink('./assets/uploads/images/berita/'.$berita->gambar);
            unlink('./assets/uploads/images/berita/thumbs/'.$berita->gambar);
          }


          if($akses_level=="Admin"){
            $data = array('id_berita'     => $berita->id_berita,
                          'id_user'       => $id_user,
                          'id_kategori'   => $i->post('kategori'),
                          'slug_berita'   => $slug_judul,
                          'judul_berita'  => $i->post('judul_berita') ,
                          'isi_berita'    => $i->post('isi_berita'),
                          'gambar'        => $upload_data['uploads']['file_name'],
                          'status_berita' => $i->post('status_berita'),
                          'jenis_berita'  => $i->post('jenis_berita'),
                          'keyword'       => $i->post('keyword'),
                          'tanggal_post'  => date('Y-m-d H:i:s')
                        );
          }else {
            $data = array('id_berita'     => $berita->id_berita,
                          'id_user'       => $id_user,
                          'id_kategori'   => $i->post('kategori'),
                          'slug_berita'   => $slug_judul,
                          'judul_berita'  => $i->post('judul_berita') ,
                          'isi_berita'    => $i->post('isi_berita'),
                          'gambar'        => $upload_data['uploads']['file_name'],
                          'status_berita' => 'Non Aktif',
                          'jenis_berita'  => $i->post('jenis_berita'),
                          'keyword'       => $i->post('keyword'),
                          'tanggal_post'  => date('Y-m-d H:i:s')
                        );
          }
          $this->berita_model->editBerita($data);
          if($akses_level=="User"){
            $this->session->set_flashdata('msg', 'Berita telah diedit. Hubungi Admin untuk mempubilkasikan kembali berita anda');
          }else{
            $this->session->set_flashdata('msg', 'Berita telah diedit');
          }
          redirect(base_url('admin/berita'),'refresh');
        }
      }else{
        if($akses_level=="Admin"){
          $data = array('id_berita'     => $berita->id_berita,
                        'id_user'       => $id_user,
                        'id_kategori'   => $i->post('kategori'),
                        'slug_berita'   => $slug_judul,
                        'judul_berita'  => $i->post('judul_berita') ,
                        'isi_berita'    => $i->post('isi_berita'),
                        'status_berita' => $i->post('status_berita'),
                        'jenis_berita'  => $i->post('jenis_berita'),
                        'keyword'       => $i->post('keyword'),
                        'tanggal_post'  => date('Y-m-d H:i:s')
                      );
        }else {
          $data = array('id_berita'     => $berita->id_berita,
                        'id_user'       => $id_user,
                        'id_kategori'   => $i->post('kategori'),
                        'slug_berita'   => $slug_judul,
                        'judul_berita'  => $i->post('judul_berita') ,
                        'isi_berita'    => $i->post('isi_berita'),
                        'status_berita' => 'Non Aktif',
                        'jenis_berita'  => $i->post('jenis_berita'),
                        'keyword'       => $i->post('keyword'),
                        'tanggal_post'  => date('Y-m-d H:i:s')
                      );
        }
        $this->berita_model->editBerita($data);
        if($akses_level=="User"){
          $this->session->set_flashdata('msg', 'Berita telah diedit. Hubungi Admin untuk mempubilkasikan kembali berita anda');
        }else{
          $this->session->set_flashdata('msg', 'Berita telah diedit');
        }
        redirect(base_url('admin/berita'),'refresh');
      }
    }
    $data = array('title'   => 'Menulis berita',
                  'kategori'=> $kategori,
                  'berita'  => $berita,
                  'isi'     => 'admin/berita/edit');
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function hapusBerita($id_berita){
    if($this->session->userdata('id_user')=="" && $this->session->userdata(akses_level)==""){
      $this->session->set_flashdata('msg', ' Anda harus login lebih dulu');
      redirect(base_url('login'),refresh);
    }else{
      $this->berita_model->hapusBerita($id_berita);
      $this->session->set_flashdata('msg', ' Berita telah dihapus');
      redirect(base_url('admin/berita'),'refresh');
    }
  }


  public function kategori(){
    $kategori     = $this->berita_model->listingKategori();
    $valid = $this->form_validation;
    $valid->set_rules('nama_kategori', 'Nama Kategori', 'required|is_unique[kategori.nama_kategori]',
                array('required'  => '%s tidak boleh kosong',
                      'is_unique' => 'Kategori <strong>'.$this->input->post('nama_kategori').'</strong> sudah ada. buat kategori baru'));

    if($valid->run()===FALSE){
      $data         = array('title'   => 'Daftar ('.count($kategori).') kategori',
                    'kategori'  => $kategori,
                    'isi'     => 'admin/kategori/list'
          );
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    }else{
      $i = $this->input;

      $nama_kategori = $i->post('nama_kategori');
      $this->berita_model->tambahKategori($nama_kategori);
      $this->session->set_flashdata('msg', ' Kategori telah ditambahkan');
      redirect(base_url('admin/berita/kategori'),'refresh');
    }
  }

  public function editKategori($id_kategori){
    $kategori = $this->berita_model->detailKategori($id_kategori);
    $valid = $this->form_validation;
    $valid->set_rules('nama_kategori', 'Nama Kategori', 'required',
                array('required'  => '%s tidak boleh kosong'));

    if($valid->run()===FALSE){
      $data = array('title'   => 'Edit kategori '.$kategori->nama_kategori,
                    'kategori'  => $kategori,
                    'isi'     => 'admin/kategori/edit'
          );
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    }else{
      $i = $this->input;

      $id_kategori   = $kategori->id_kategori;
      $nama_kategori = $i->post('nama_kategori');
      $this->berita_model->editKategori($id_kategori, $nama_kategori);
      $this->session->set_flashdata('msg', ' Kategori telah ditambahkan');
      redirect(base_url('admin/berita/kategori'),'refresh');
    }
  }

  public function hapusKategori($id_kategori){
    if($this->session->userdata('id_user') == "" && $this->session->userdata('username')==""){
			$this->session->set_flashdata('msg', ' Anda harus login lebih dulu');
			redirect(base_url('login'),'refresh');
    }else{
      $this->berita_model->hapusKategori($id_kategori);
      $this->session->set_flashdata('msg', ' Kategori telah dihapus');
      redirect(base_url('admin/berita/kategori'),'refresh');
    }
  }
}
