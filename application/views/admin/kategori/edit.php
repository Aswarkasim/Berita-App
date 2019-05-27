<br>
<div class="col-lg-6  ">
<div class="card">
  <div class="card-header d-flex align-items-center">
    <h3 class="h4"><?php echo $title; ?></h3>
  </div>
  <div class="card-body">
    <?php
        echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ' , ' </div>');

        if(isset($error)){
          echo '<div class="alert alert-warning"><i class="fa fa-warning"></i>';
          echo $error;
          echo '</div>';
        }
        echo form_open_multipart('admin/berita/editKategori/'.$kategori->id_kategori);
     ?>

    <form class="form-horizontal">

      <div class="form-group row">
        <label class="col-sm-3 form-control-label">Nama</label>
        <div class="col-sm-9">
          <input type="text" name="nama_kategori" class="form-control" placeholder="Nama" value="<?php echo $kategori->nama_kategori; ?>">
        </div>
      </div>

      <div class="line"></div>
      <div class="form-group row">
        <div class="col-sm-4 offset-sm-3">
          <a href="<?php echo  base_url('admin/berita/kategori'); ?>" class="btn btn-secondary"><i class="fa fa-times"></i> Batal</a>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </div>
    </form>

    <?php echo form_close(); ?>
  </div>
</div>
</div>
