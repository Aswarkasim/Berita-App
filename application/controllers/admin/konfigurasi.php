<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('konfigurasi_model');
  }

  public function index()
  {
    $konfigurasi  = $this->konfigurasi_model->listing();
    $valid = $this->form_validation;
    $valid->set_rules('namaweb', 'Nama Web','required', array('required' => ' %s tidak boleh kosong boscu'));

    if($valid->run()===FALSE){
      $data = array('title'       => 'Konfigurasi portal',
                    'konfigurasi' => $konfigurasi,
                    'isi'         => 'admin/konfigurasi/konfigurasi_umum');
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    }else{
      $i = $this->input;

      $data = array('id_konfigurasi'=> $konfigurasi->id_konfigurasi,
                    'namaweb'    => $i->post('namaweb'),
                    'tagline'    => $i->post('tagline'),
                    'email'      => $i->post('email'),
                    'website'    => $i->post('website'),
                    'telepon'    => $i->post('telepon'),
                    'alamat'     => $i->post('alamat'),
                    'facebook'   => $i->post('facebook'),
                    'instagram'  => $i->post('instagram'),
                    'deskripsi'  => $i->post('deskripsi'),
                    'metatext'   => $i->post('metatext'),
                    'keyword'    => $i->post('keyword'),
                    'maps'       => $i->post('maps'),
          );
      $this->konfigurasi_model->update($data);
      $this->session->set_flashdata('msg', ' Konfigurasi telah diatur');
      redirect(base_url('admin/konfigurasi'), 'refresh');
    }
  }

  public function logo(){
    $konfigurasi  = $this->konfigurasi_model->listing();

    $valid = $this->form_validation;
    $valid->set_rules('id_konfigurasi', 'ID Konfigurasi','required',
                array('required' => ' %s tidak boleh kosong boscu'));

    if($valid->run()){
      $config['upload_path']   = './assets/uploads/logo/';
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';
			$config['max_size']      = '12000'; // KB
			$this->upload->initialize($config);
      if(! $this->upload->do_upload('logo')){
        $data = array('title'       => 'Konfigurasi portal',
                      'konfigurasi' => $konfigurasi,
                      'error'       => $this->upload->display_errors(),
                      'isi'         => 'admin/konfigurasi/konfigurasi_logo');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
      }else {
        $upload_data		= array('uploads' => $this->upload->data());
  			// Image Editor
  			$config['image_library']  	= 'gd2';
  			$config['source_image']   	= './assets/uploads/logo/'.$upload_data['uploads']['file_name'];
  			$config['create_thumb']   	= FALSE;
  			$config['quality']       	= "100%";
  			$config['maintain_ratio']   = TRUE;
  			$config['width']       		= 360; // Pixel
  			$config['height']       	= 360; // Pixel
  			$config['x_axis']       	= 0;
  			$config['y_axis']       	= 0;
  			$config['thumb_marker']   	= '';
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        if($konfigurasi->logo != ""){
          unlink('./assets/uploads/logo/'.$konfigurasi->logo);
        }

        $i  = $this->input;
        $data = array('id_konfigurasi'  => $konfigurasi->id_konfigurasi,
                      'logo'            => $upload_data['uploads']['file_name']);
        $this->konfigurasi_model->update($data);
        $this->session->set_flashdata('msg', 'Logo telah diubah');
        redirect(base_url('admin/konfigurasi/logo'),'refresh');
      }
    }
    $data = array('title'       => 'Konfigurasi portal',
                  'konfigurasi' => $konfigurasi,
                  'isi'         => 'admin/konfigurasi/konfigurasi_logo');
    $this->load->view('admin/layout/wrapper', $data, FALSE);


  }

  public function icon(){
    $konfigurasi  = $this->konfigurasi_model->listing();

    $valid = $this->form_validation;
    $valid->set_rules('id_konfigurasi', 'ID Konfigurasi','required',
                array('required' => ' %s tidak boleh kosong boscu'));

    if($valid->run()){
      $config['upload_path']   = './assets/uploads/icon/';
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';
			$config['max_size']      = '12000'; // KB
			$this->upload->initialize($config);
      if(! $this->upload->do_upload('icon')){
        $data = array('title'       => 'Konfigurasi portal',
                      'konfigurasi' => $konfigurasi,
                      'error'       => $this->upload->display_errors(),
                      'isi'         => 'admin/konfigurasi/konfigurasi_icon');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
      }else {
        $upload_data		= array('uploads' => $this->upload->data());
  			// Image Editor
  			$config['image_library']  	= 'gd2';
  			$config['source_image']   	= './assets/uploads/icon/'.$upload_data['uploads']['file_name'];
  			$config['create_thumb']   	= FALSE;
  			$config['quality']       	= "100%";
  			$config['maintain_ratio']   = TRUE;
  			$config['width']       		= 360; // Pixel
  			$config['height']       	= 360; // Pixel
  			$config['x_axis']       	= 0;
  			$config['y_axis']       	= 0;
  			$config['thumb_marker']   	= '';
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        if($konfigurasi->icon != ""){
          unlink('./assets/uploads/icon/'.$konfigurasi->icon);
        }

        $i  = $this->input;
        $data = array('id_konfigurasi'  => $konfigurasi->id_konfigurasi,
                      'icon'            => $upload_data['uploads']['file_name']);
        $this->konfigurasi_model->update($data);
        $this->session->set_flashdata('msg', 'Logo telah diubah');
        redirect(base_url('admin/konfigurasi/icon'),'refresh');
      }
    }
    $data = array('title'       => 'Konfigurasi portal',
                  'konfigurasi' => $konfigurasi,
                  'isi'         => 'admin/konfigurasi/konfigurasi_icon');
    $this->load->view('admin/layout/wrapper', $data, FALSE);


  }


}
