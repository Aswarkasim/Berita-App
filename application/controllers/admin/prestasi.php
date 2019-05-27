<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('prestasi_model'));
    //Codeigniter : Write Less Do More

  }

  function index()
  {
    $prestasi = $this->prestasi_model->listing();
    $konfigurasi = $this->konfigurasi_model->listing();

    $data = array('title'     => 'Data prestasi '.$konfigurasi->namaweb,
                  'prestasi'  => $prestasi,
                  'isi'       => 'admin/prestasi/list');
    $this->load->view('admin/layout/wrapper', $data, false);
  }

  public function tambah()
  {
    $konfigurasi = $this->konfigurasi_model->listing();

    $valid    = $this->form_validation;

    $valid->set_rules('nama_peraih', 'Nama Peraih', 'required',
                array('required'    => ' %s tidak boleh kosong'));
    $valid->set_rules('ajang', 'Ajang', 'required',
                array('required'    => ' %s tidak boleh kosong'));
    $valid->set_rules('tempat_pelaksanaan', 'Tempat Pelaksanaan', 'required',
                array('required'    => ' %s tidak boleh kosong'));
    $valid->set_rules('tahun', 'Tahun', 'required',
                array('required'    => ' %s tidak boleh kosong'));


    if($valid->run()){

      if(!empty($_FILES['foto']['name'])){
        $config['upload_path']   = './assets/uploads/images/';
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['max_size']      = '12000'; // KB
				$this->upload->initialize($config);

        if(!$this->upload->do_upload('foto')){
          $data = array('title'     => 'Tambah Prestasi '.$konfigurasi->namaweb,
                        'error'     => $this->upload->display_errors(),
                        'isi'       => 'admin/prestasi/tambah'
                      );
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        }else{
          $upload_data = array('uploads' => $this->upload->data());
          // Image Editor
					$config['image_library']  	= 'gd2';
					$config['source_image']   	= './assets/uploads/images/'.$upload_data['uploads']['file_name'];
					$config['new_image']     		= './assets/uploads/images/thumbs/';
					$config['create_thumb']   	= TRUE;
					$config['quality']       		= "100%";
					$config['maintain_ratio']   = TRUE;
					$config['width']       			= 360; // Pixel
					$config['height']       		= 360; // Pixel
					$config['x_axis']       		= 0;
					$config['y_axis']       		= 0;
					$config['thumb_marker']   	= '';

          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          $i = $this->input;

          $nama_peraih       = $i->post('nama_peraih');
          $ajang             = $i->post('ajang');
          $tempat_pelaksanaan= $i->post('tempat_pelaksanaan');
          $tahun             = $i->post('tahun');
          $keterangan        = $i->post('keterangan');
          $foto              = $upload_data['uploads']['file_name'];

          $this->prestasi_model->tambah($nama_peraih, $ajang, $tempat_pelaksanaan, $tahun, $keterangan, $foto);
          $this->session->set_flashdata('msg', $i->post('nama_peraih').' telah ditambahkan');
          redirect(base_url('admin/prestasi'),'refresh');
        }
      }else{

        $i = $this->input;

        $nama_peraih       = $i->post('nama_peraih');
        $ajang             = $i->post('ajang');
        $tempat_pelaksanaan= $i->post('tempat_pelaksanaan');
        $tahun             = $i->post('tahun');
        $keterangan        = $i->post('keterangan');
        $foto              = '';

          $this->prestasi_model->tambah($nama_peraih, $ajang, $tempat_pelaksanaan, $tahun, $keterangan, $foto);
          $this->session->set_flashdata('msg', $i->post('nama_peraih').' telah ditambahkan');
          redirect(base_url('admin/prestasi'),'refresh');
      }
    }
    $data = array('title'     => 'Tambah Prestasi '.$konfigurasi->namaweb,
                  'isi'       => 'admin/prestasi/tambah'
                );
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  public function edit($id_prestasi)
  {
    $konfigurasi = $this->konfigurasi_model->listing();
    $prestasi    = $this->prestasi_model->detail($id_prestasi);

    $valid    = $this->form_validation;

    $valid->set_rules('nama_peraih', 'Nama Peraih', 'required',
                array('required'    => ' %s tidak boleh kosong'));
    $valid->set_rules('ajang', 'Ajang', 'required',
                array('required'    => ' %s tidak boleh kosong'));
    $valid->set_rules('tempat_pelaksanaan', 'Tempat Pelaksanaan', 'required',
                array('required'    => ' %s tidak boleh kosong'));
    $valid->set_rules('tahun', 'Tahun', 'required',
                array('required'    => ' %s tidak boleh kosong'));

    if($valid->run()){

      if(!empty($_FILES['foto']['name'])){
        $config['upload_path']   = './assets/uploads/images/';
        $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
        $config['max_size']      = '12000'; // KB
        $this->upload->initialize($config);

        if(!$this->upload->do_upload('foto')){
          $data = array('title'     => 'Tambah Prestasi '.$konfigurasi->namaweb,
                        'error'     => $this->upload->display_errors(),
                        'prestasi'  => $prestasi,
                        'isi'       => 'admin/prestasi/edit'
                      );
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        }else{
          $upload_data = array('uploads' => $this->upload->data());
          // Image Editor
          $config['image_library']  	= 'gd2';
          $config['source_image']   	= './assets/uploads/images/'.$upload_data['uploads']['file_name'];
          $config['new_image']     		= './assets/uploads/images/thumbs/';
          $config['create_thumb']   	= TRUE;
          $config['quality']       		= "100%";
          $config['maintain_ratio']   = TRUE;
          $config['width']       			= 360; // Pixel
          $config['height']       		= 360; // Pixel
          $config['x_axis']       		= 0;
          $config['y_axis']       		= 0;
          $config['thumb_marker']   	= '';

          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          $i = $this->input;

          $nama_peraih       = $i->post('nama_peraih');
          $ajang             = $i->post('ajang');
          $tempat_pelaksanaan= $i->post('tempat_pelaksanaan');
          $tahun             = $i->post('tahun');
          $keterangan        = $i->post('keterangan');
          $foto              = $upload_data['uploads']['file_name'];

          $this->prestasi_model->edit($nama_peraih, $ajang, $tempat_pelaksanaan, $tahun, $keterangan, $foto);
          $this->session->set_flashdata('msg', $i->post('nama_peraih').' telah dieditkan');
          redirect(base_url('admin/prestasi'),'refresh');
        }
      }else{

        $i = $this->input;

        $nama_peraih       = $i->post('nama_peraih');
        $ajang             = $i->post('ajang');
        $tempat_pelaksanaan= $i->post('tempat_pelaksanaan');
        $tahun             = $i->post('tahun');
        $keterangan        = $i->post('keterangan');
        $foto              = '';

          $this->prestasi_model->edit($nama_peraih, $ajang, $tempat_pelaksanaan, $tahun, $keterangan, $foto);
          $this->session->set_flashdata('msg', $i->post('nama_peraih').' telah dieditkan');
          redirect(base_url('admin/prestasi'),'refresh');
      }
    }
    $data = array('title'     => 'Tambah Prestasi '.$konfigurasi->namaweb,
                  'prestasi'  => $prestasi,
                  'isi'       => 'admin/prestasi/edit'
                );
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }
  public function hapus($id_prestasi){
    $this->prestasi_model->hapus($id_prestasi);
    $this->session->set_flashdata('msg', ' Data prestasi telah dihapus');
    redirect(base_url('admin/prestasi'),'refresh');
  }

}
