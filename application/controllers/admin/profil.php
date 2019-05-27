<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('profil_model'));
  }

  public function index()
  {
    $profil = $this->profil_model->listing();
    $konfigurasi = $this->konfigurasi_model->listing();

    $data = array('title'       => 'Konfigurasi Profil '.$konfigurasi->namaweb,
                  'profil'      => $profil,
                  'konfigurasi' => $konfigurasi,
                  'isi'         => 'admin/profil/profil_umum'
      );
    $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function muqaddimah()
    {
      $profil = $this->profil_model->listing();
      $konfigurasi = $this->konfigurasi_model->listing();

      $valid = $this->form_validation;
      $valid->set_rules('muqaddimah', 'Muqaddimah ', 'required',
                  array('required'    => '%s tidak boleh kosong'));

      if($valid->run()===FALSE){
          $data = array('title'       => 'Muqaddimah '.$konfigurasi->namaweb,
                        'profil'      => $profil,
                        'konfigurasi' => $konfigurasi,
                        'isi'         => 'admin/profil/muqaddimah'
            );
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        }else{
          $i = $this->input;

          $data = array('id_profil'      => $profil->id_profil,
                        'muqaddimah'     => $i->post('muqaddimah')
              );
          $this->profil_model->update($data);
          $this->session->set_flashdata('msg', ' Muqaddimah telah diperbaharui');
          redirect(base_url('admin/profil/muqaddimah'),'refresh');
        }
      }

      public function visi()
      {
        $profil = $this->profil_model->listing();
        $konfigurasi = $this->konfigurasi_model->listing();

        $valid = $this->form_validation;
        $valid->set_rules('visi', 'Visi ', 'required',
                    array('required'    => '%s tidak boleh kosong'));
        $valid->set_rules('misi', 'Misi ', 'required',
                    array('required'    => '%s tidak boleh kosong'));

        if($valid->run()===FALSE){
            $data = array('title'       => 'Visi & Misi '.$konfigurasi->namaweb,
                          'profil'      => $profil,
                          'konfigurasi' => $konfigurasi,
                          'isi'         => 'admin/profil/visi'
              );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
          }else{
            $i    = $this->input;
            $data = array('id_profil' => $profil->id_profil,
                          'visi'      => $i->post('visi'),
                          'misi'      => $i->post('misi')
                );
            $this->profil_model->update($data);
            $this->session->set_flashdata('msg', ' Visi Misi telah diperbaharui');
            redirect(base_url('admin/profil/visi'),'refresh');
          }
        }

        public function proker()
        {
          $konfigurasi = $this->konfigurasi_model->listing();
          $profil = $this->profil_model->listing();

          $valid = $this->form_validation;
          $valid->set_rules('proker', 'Proker ', 'required',
                      array('required'    => '%s tidak boleh kosong'));

          if($valid->run()===FALSE){
              $data = array('title'       => 'Program Kerja '.$konfigurasi->namaweb,
                            'profil'      => $profil,
                            'konfigurasi' => $konfigurasi,
                            'isi'         => 'admin/profil/proker'
                );
              $this->load->view('admin/layout/wrapper', $data, FALSE);
            }else{
              $i    = $this->input;
              $data = array('id_profil' => $profil->id_profil,
                            'proker'    => $i->post('proker')
              );
              $this->profil_model->update($data);
              $this->session->set_flashdata('msg', ' Visi Misi telah diperbaharui');
              redirect(base_url('admin/profil/proker'),'refresh');
            }
          }

}
