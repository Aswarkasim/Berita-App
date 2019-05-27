<?php

$this->load->model('berita_model');
$kategori = $this->berita_model->listingKategori();
 ?>

<!-- Navigation -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php if($this->uri->segment(2)=="index"){echo "active";} ?>">
            <a class="nav-link" href="<?php echo base_url('home/index'); ?>"> Beranda</a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php if($this->uri->segment(2)=="berita"){echo "active";} ?>" href="<?php echo base_url('home/berita'); ?>">Berita</a>
          </li>

          <li class="nav-item dropdown <?php if($this->uri->segment(2)=="kategori_berita"){echo "active";} ?>">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori Berita</a>
            <div class="dropdown-menu" aria-labelledby="dropdown03">
              <?php foreach($kategori as $kategori){ ?>
              <a class="dropdown-item" href="<?php echo base_url('home/kategori_berita/'.$kategori->nama_kategori); ?>"><?php echo $kategori->nama_kategori; ?></a>
            <?php } ?>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Profil</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Tanya</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Kontak</a>
          </li>

        </ul>
        <form class="form-inline my-2 my-md-0" action="<?php echo base_url('home/berita'); ?>" method="post">
          <button type="submit" name="button" class="btn  btn-outline-secondary">
            <i class="fa fa-search"></i>
          </button>
          <input name="cari" class="form-control search-form" type="text" placeholder="Search">
        </form>
      </div>
    </nav>
