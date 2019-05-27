<!-- Page Content -->

  <!-- Heading Row -->
  <div class="row my-4">
    <div class="col-lg-12">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
       <ol class="carousel-indicators">
         <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
         <li data-target="#myCarousel" data-slide-to="1"></li>
         <li data-target="#myCarousel" data-slide-to="2"></li>
         <li data-target="#myCarousel" data-slide-to="3"></li>
         <li data-target="#myCarousel" data-slide-to="4"></li>
       </ol>
       <div class="carousel-inner">


         <?php $i=1; foreach($slider as $slider){ ?>
         <div class="carousel-item <?php if($i==1){echo "active";} ?>">
           <img class="first-slide" src="<?php echo base_url('assets/uploads/images/berita/'.$slider->gambar); ?>" alt="First slide" width="100%">
           <div class="container">
             <div class="carousel-caption text-center">
               <h4><?php echo $slider->judul_berita; ?></h4>
               <p><?php echo character_limiter($slider->isi_berita, 100); ?></p>
               <p><a class="btn btn-sm btn-info" href="<?php echo base_url('home/post/'.$slider->id_berita.'/'.$slider->slug_berita); ?>" role="button">Lihat Selengkapnya</a></p>
             </div>
           </div>
         </div>
       <?php $i++; } ?>


       </div>
       <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
       </a>
       <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
       </a>
     </div>
    </div>
    <!-- /.col-lg-8 -->

  </div>
  <!-- /.row -->

  <!-- Call to Action Well -->
  <div class="card text-white bg-secondary my-4 text-center">
    <div class="card-body">
      <p class="text-white m-0">Berit a terbaru !!!</p>
    </div>
  </div>

  <!-- Content Row -->
  <div class="row">

    <?php foreach($beritaBaru as $beritaBaru) {?>
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title"><?php echo $beritaBaru->judul_berita; ?></h5>
          <p><?php echo $beritaBaru->nama_kategori; ?></p>
          <p class="card-text"><?php echo character_limiter($beritaBaru->isi_berita, 100); ?><a href="<?php echo base_url('home/post/'.$beritaBaru->id_berita.'/'.$beritaBaru->slug_berita); ?>">Baca selengkapnya</a></p>
          <hr>
          <p class="text-right"><small class="text-muted"><?php echo $beritaBaru->tanggal_post; ?></small></p>
        </div>
      </div>
    </div>
  <?php } ?>


  </div>
  <!-- /.row -->

<hr class="line">

  <div class="row">
    <div class="col-md-8">

        <?php foreach($beritaRandom as $beritaRandom){ ?>
          <div class="card mb-3">
          <div class="card-body">
          <h5 class="card-title"><?php echo $beritaRandom->judul_berita; ?></h5>
          <?php echo $beritaRandom->nama_kategori; ?>
          <hr>
          <div class="row">

          <div class="col-md-2">
              <img class="card-img img-thumbnail" src="<?php echo base_url('assets/uploads/images/berita/'.$beritaRandom->gambar); ?>" alt="Card image cap" height="20px">
          </div>
          <div class="col-md-10">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer...
            <a href="<?php echo base_url('home/post/'.$beritaRandom->id_berita.'/'.$beritaRandom->slug_berita); ?>"> Baca selengkapnya</a></p><hr>
            <p class="card-text text-right"><small class="text-muted"><?php echo $beritaRandom->tanggal_post; ?></small></p>
          </div>
        </div>
        </div>
        </div>
      <?php } ?>


      <div class="float-right">
        <a href="#" class="btn btn-primary" style="margin-top: 30px;"> Lihat Berita Lainnya  <i class="fa fa-arrow-right"></i></a>
      </div>

    </div>


     <!-- Sidebar Widgets Column -->
    <div class="col-md-4">
      <!-- Search Widget -->
      <div class="card" style="margin-top: 0px;">
        <h5 class="card-header">Cari</h5>
        <div class="card-body">
          <p class="alert alert-info text-center">Masukkan kata kunci</p>
          <div class="input-group text-center">

            <form class="" action="<?php echo base_url('home/berita'); ?>" method="post">
              <span class="input-group">
              <input type="text" name="cari" class="form-control" placeholder="Search for...">
                <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
              </span>
            </form>
          </div>
        </div>
      </div>

      <!-- Categories Widget -->
      <div class="card my-4">
        <h5 class="card-header">Kategori</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                <?php foreach($kategori as $kategori){ ?>
                <li>
                  <a href="#" class="font-bold"><?php echo $kategori->nama_kategori ?></a>
                </li>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>

      <!-- Side Widget -->
      <div class="card my-4">
        <h5 class="card-header">Berita Lama</h5>
        <div class="card-body">
          <ul class="list-unstyled mb-0">
          <?php foreach($beritaLama as $beritaLama){ ?>
            <li>
              <a href="#" class="font-bold"><?php echo $beritaLama->judul_berita; ?></a>
            </li>
            <hr>
          <?php } ?>
        </ul>
        </div>
      </div>

    </div>


  </div>


<!-- /.container -->

<br>
