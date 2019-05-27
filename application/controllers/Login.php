<?php
/**
 *
 */
class Login extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');

  }

  function index(){

    $valid = $this->form_validation;

    $valid->set_rules('username', 'Username', 'required',
                array('required'    => ' %s tidak boleh kosong'));
    $valid->set_rules('password', 'Password', 'required',
                array('required'    => ' %s tidak boleh kosong'));

    if($valid->run()===FALSE){
      $this->load->view('login_view', FALSE);
    }else{
      $i = $this->input;
      $username = $i->post('username');
      $password = md5($i->post('password'));
      $cek_login = $this->user_model->login($username, $password);

      if(!empty($cek_login)){
        $this->session->set_userdata('username',  $username);
        $this->session->set_userdata('id_user', $cek_login->id_user);
        $this->session->set_userdata('akses_level',  $cek_login->akses_level);
        $this->session->set_userdata('email',  $cek_login->email);
        redirect(base_url('admin/dashboard'),'refresh');
      }else{
        $this->session->set_flashdata('msg', ' Username atau Password tidak cocok');
        redirect(base_url('login'),'refresh');
      }
    }
  }

  function logout(){
    $this->session->unset_userdata('id_user');
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('akses_level');
    $this->session->unset_userdata('email');
    $this->session->set_flashdata('msg', ' Anda berhasil logout');
    redirect(base_url('login'),'refresh');
  }

}
