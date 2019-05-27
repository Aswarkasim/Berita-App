<!-- Set up your HTML -->
<br>
<div class="row">
  <div class="col-md-8">

      <?php foreach($kategori_berita as $kategori_berita){ ?>
        <div class="card mb-3">
        <div class="card-body">
        <h5 class="card-title"><?php echo $kategori_berita->judul_berita; ?></h5>
        <?php echo $kategori_berita->nama_kategori; ?>
        <hr>
        <div class="row">

        <div class="col-md-2">
            <img class="card-img img-thumbnail" src="<?php echo base_url('assets/uploads/images/berita/'.$kategori_berita->gambar); ?>" alt="Card image cap" height="20px">
        </div>
        <div class="col-md-10">
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer...
          <a href="<?php echo base_url('home/post/'.$kategori_berita->id_berita.'/'.$kategori_berita->slug_berita); ?>"> Baca selengkapnya</a></p><hr>
          <p class="card-text text-right"><small class="text-muted"><?php echo $kategori_berita->tanggal_post; ?></small></p>
        </div>
      </div>
      </div>
      </div>
    <?php } ?>


    <div class="float-right">
      <a href="#" class="btn btn-primary" style="margin-top: 30px;"> Lihat Berita Lainnya  <i class="fa fa-arrow-right"></i></a>
    </div>

  </div>

</div>
