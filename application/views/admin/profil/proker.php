<br>
<div class="col-lg-6">
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


        echo form_open_multipart('admin/profil/proker/');
     ?>

    <form class="form-horizontal">


<div class="row">

      <div class="col-md-12">

        <div class="form-group">
          <div class="form-group">
            <label class="form-control-label">Visi</label>
            <textarea name="proker" class="editor form-control"><?php echo $profil->proker; ?></textarea>
          </div>
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
