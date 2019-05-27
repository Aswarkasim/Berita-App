<!-- Set up your HTML -->
<br>
<div class="row">
  <div class="col-md-8">
    <?php
        if($this->session->flashdata('msg')){
          echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
          echo $this->session->flashdata('msg');
          echo '</div>';
        }
     ?>
      <?php foreach($berita as $berita){ ?>
        <div class="card mb-3">
        <div class="card-body">
        <h5 class="card-title"><?php echo $berita->judul_berita; ?></h5>
        <?php echo $berita->nama_kategori; ?>
        <hr>
        <div class="row">

        <div class="col-md-2">
            <img class="card-img img-thumbnail" src="<?php echo base_url('assets/uploads/images/berita/'.$berita->gambar); ?>" alt="Card image cap" height="20px">
        </div>
        <div class="col-md-10">
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer...
          <a href="<?php echo base_url('home/post/'.$berita->id_berita.'/'.$berita->slug_berita); ?>"> Baca selengkapnya</a></p><hr>
          <p class="card-text text-right"><small class="text-muted"><?php echo $berita->tanggal_post; ?></small></p>
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
       <div class="input-group">

         <form class="" action="<?php echo base_url('home/berita'); ?>" method="post">
           <span class="input-group">
           <input type="text" name="cari" class="form-control" placeholder="Search for...">
             <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
           </span>
         </form>
       </div>
     </div>
   </div>

</div>
