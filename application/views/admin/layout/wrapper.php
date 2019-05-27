<?php
if($this->session->userdata('id_user') == "" && $this->session->userdata('akses_level') == ""){

  $this->session->set_flashdata('msg', ' Anda harus login lebih dulu');
  redirect(base_url('login'));
}else{
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');
}
