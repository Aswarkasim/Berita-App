<?php
  $id_user = $this->session->userdata('id_user');
  $user_aktif = $this->user_model->detail($id_user);
 ?>
<!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="<?php echo base_url('assets/uploads/images/thumbs/'.$user_aktif->foto) ?>" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4"><?php echo $this->session->userdata('username'); ?></h1>
              <p><?php echo $user_aktif->akses_level; ?>  </p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
              <li class="<?php if($this->uri->segment(2)=="dashboard"){echo "active";} ?>"><a href="<?php echo base_url('admin/dashboard'); ?>"> <i class="fa fa-dashboard" ></i>Dashboard </a></li>

              <li><a href="#BeritaDropDown" aria-expanded="<?php if($this->uri->segment(2)=="berita"){echo "true";}else{echo "false";} ?>" data-toggle="collapse"> <i class="fa fa-newspaper-o"></i>Berita </a>
                <ul id="BeritaDropDown" class="collapse list-unstyled <?php if($this->uri->segment(2)=="berita"){echo "show";} ?>">
                  <li class="<?php if($this->uri->segment(2)=="berita" && $this->uri->segment(3)==""){echo "active";} ?>"><a href="<?php echo base_url('admin/berita'); ?>">Daftar Berita</a></li>
                  <li class="<?php if($this->uri->segment(3)=="tambahBerita"){echo "active";} ?>"><a href="<?php echo base_url('admin/berita/tambahBerita'); ?>">Menulis Berita</a></li>
                </ul>
              </li>

              <li class="<?php if($this->uri->segment(3)=="kategori"){echo "active";} ?>"><a href="<?php echo base_url('admin/berita/kategori'); ?>"> <i class="fa fa-tags"></i>Kategori </a></li>

              <li><a href=""> <i class="fa fa-photo"></i>Galeri </a></li>

              <li><a href="#ProfilDropDown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-home"></i>Profil </a>
                <ul id="ProfilDropDown" class="collapse list-unstyled ">
                  <li><a href="<?php echo base_url('admin/profil'); ?>">Profil Umum</a></li>
                  <li><a href="<?php echo base_url('admin/profil/muqaddimah'); ?>">Muqaddimah</a></li>
                  <li><a href="<?php echo base_url('admin/profil/visi'); ?>">Visi & Misi</a></li>
                  <li><a href="<?php echo base_url('admin/profil/proker'); ?>">Program Kerja</a></li>
                </ul>
              </li>

              <li><a href="#PrestasiDropDown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-group"></i>Data Prestasi </a>
                <ul id="PrestasiDropDown" class="collapse list-unstyled ">
                  <li><a href="<?php echo base_url('admin/prestasi'); ?>">Prestasi</a></li>
                  <li><a href="<?php echo base_url('admin/prestasi/tambah'); ?>">Tambah Prestasi</a></li>
                </ul>
              </li>

              <li><a href="#KonfigurasiDropDown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-wrench"></i>Konfigurasi </a>
                <ul id="KonfigurasiDropDown" class="collapse list-unstyled ">
                  <li><a href="<?php echo base_url('admin/konfigurasi'); ?>">Konfigurasi Umum</a></li>
                  <li><a href="<?php echo base_url('admin/konfigurasi/logo'); ?>">Konfigurasi Logo</a></li>
                  <li><a href="<?php echo base_url('admin/konfigurasi/icon'); ?>">Konfigurasi Icon</a></li>
                </ul>
              </li>

              <li><a href="#DataKaderDropDown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-table"></i>Data Kader </a>
                <ul id="DataKaderDropDown" class="collapse list-unstyled ">
                  <li><a href="<?php echo base_url('admin/konfigurasi'); ?>">Kader</a></li>
                  <li><a href="<?php echo base_url('admin/konfigurasi/logo'); ?>">Tambah Kader</a></li>
                </ul>
              </li>

              <li><a href="#UserDropDown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-user"></i>User </a>
                <ul id="UserDropDown" class="collapse list-unstyled ">
                  <li><a href="<?php echo base_url('admin/user'); ?>">Daftar User</a></li>
                  <li><a href="<?php echo base_url('admin/user/tambah'); ?>">Tambah User</a></li>
                </ul>
              </li>



          </ul>
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom"><?php echo $title; ?></h2>
            </div>
          </header>
