<br>
<div class="col-lg-12  ">
<div class="card">
  <div class="card-header d-flex align-items-center">
    <h3 class="h4"><?php echo $title; ?></h3>
  </div>
  <div class="card-body">
    <?php
        echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ' , ' </div>');

        if($this->session->flashdata('msg')){
          echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
          echo $this->session->flashdata('msg');
          echo '</div>';
        }


        echo form_open_multipart('admin/konfigurasi');
     ?>

    <form class="form-horizontal">
<div class="row">


      <div class="col-md-6">

        <div class="form-group">
          <div class="form-group">
            <label class="form-control-label">Nama Web</label>
            <input type="text" name="namaweb" value="<?php echo $konfigurasi->namaweb; ?>" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <div class="form-group">
            <label class="form-control-label">Tagline</label>
            <input type="text" name="tagline" value="<?php echo $konfigurasi->tagline; ?>" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <div class="form-group">
            <label class="form-control-label">Email</label>
            <input type="email" name="email" value="<?php echo $konfigurasi->email; ?>" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <div class="form-group">
            <label class="form-control-label">Website</label>
            <input type="text" name="website" value="<?php echo $konfigurasi->website; ?>" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <div class="form-group">
            <label class="form-control-label">Alamat</label>
            <input type="text" name="alamat" value="<?php echo $konfigurasi->alamat; ?>" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <div class="form-group">
            <label class="form-control-label">Telepon</label>
            <input type="text" name="telepon" value="<?php echo $konfigurasi->telepon; ?>" class="form-control">
          </div>
        </div>


        <div class="form-group">
          <div class="form-group">
            <label class="form-control-label">Facebook</label>
            <input type="text" name="facebook" value="<?php echo $konfigurasi->facebook; ?>" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <div class="form-group">
            <label class="form-control-label">Instagram</label>
            <input type="text" name="instagram" value="<?php echo $konfigurasi->instagram; ?>" class="form-control">
          </div>
        </div>




      </div>

      <div class="col-md-6">


        <div class="form-group">
          <div class="form-group">
            <label class="form-control-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control"><?php echo $konfigurasi->deskripsi; ?></textarea>
          </div>
        </div>

        <div class="form-group">
          <div class="form-group">
            <label class="form-control-label">Metatext</label>
            <textarea name="metatext" class="form-control"><?php echo $konfigurasi->metatext; ?></textarea>
          </div>
        </div>

        <div class="form-group">
          <div class="form-group">
            <label class="form-control-label">Keyword</label>
            <textarea name="keyword" class="form-control"><?php echo $konfigurasi->keyword; ?></textarea>
          </div>
        </div>

        <div class="form-group">
          <div class="form-group">
            <label class="form-control-label">Maps</label>
            <textarea name="maps" class="form-control"><?php echo $konfigurasi->maps; ?></textarea>
          </div>
        </div>

        <div class="form-group">
          <style type="text/css" media="screen">
          	iframe{
          		width: 100%;
          		height: auto;
          		max-height: 500px;
          	}
          </style>
          <?php echo $konfigurasi->maps ?>
        </div>



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
