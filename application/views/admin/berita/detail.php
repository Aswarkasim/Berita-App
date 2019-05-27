<button class="btn btn-info btn-xs" data-toggle="modal" data-target="#Detail<?php echo $berita->id_berita ?>">
<i class="fa fa-eye"></i>
</button>


<div class="modal fade" id="Detail<?php echo $berita->id_berita ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"></h4>
    </div>
    <div class="modal-body">
      <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-12">

        <!-- Title -->
        <h1 class="mt-4"><?php echo $berita->judul_berita; ?></h1>

        <!-- Author -->
        <p class="lead">
          oleh
          <a href="#"><?php echo $berita->nama; ?></a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>diposting pada <?php echo $berita->tanggal_post; ?></p>

        <hr>

        <!-- Preview Image -->
        <div class="text-center">

          <img class="img-fluid rounded" src="<?php echo base_url('assets/uploads/images/berita/'.$berita->gambar); ?>" alt="">
        </div>
        <hr>
          <p>
            <?php echo $berita->isi_berita; ?>
          </p>
        <hr>




      </div>
    </div>
  </div>

    </div>
    <div class="modal-footer">
        <a href="<?php echo base_url('admin/berita/hapusBerita/'.$berita->id_berita) ?>" class="btn btn-danger"><i class="fa fa-trash-o"> </i> Hapus</a>
        <a href="<?php echo base_url('admin/berita/editBerita/'.$berita->id_berita) ?>" class="btn btn-warning"><i class="fa fa-edit"> </i> Edit</a>

        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
    </div>
</div>
</div>
</div>
