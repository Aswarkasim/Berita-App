<br>
<div class="col-lg-12">
<div class="card">
  <div class="card-header d-flex align-items-center">
    <h3 class="h4"><?php echo $title; ?></h3>
  </div>
  <div class="card-body">
    <?php
        echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i>  ' , ' </div>');

        if(isset($error)){
          echo '<div class="alert alert-warning"><i class="fa fa-warning"></i>';
          echo $error;
          echo '</div>';
        }
        echo form_open_multipart('admin/prestasi/tambah');
     ?>

    <form class="form-horizontal">

      <div class="form-group row">
        <label class="col-sm-3 form-control-label">Nama Peraih</label>
        <div class="col-sm-9">
          <input type="text" name="nama_peraih" class="form-control" placeholder="Nama Peraih" value="<?php echo set_value('nama_peraih'); ?>">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 form-control-label">Ajang</label>
        <div class="col-sm-9">
          <input type="text" name="ajang" class="form-control" placeholder="Ajang" value="<?php echo set_value('ajang'); ?>">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 form-control-label">Tempat Pelaksanaan</label>
        <div class="col-sm-9">
          <input type="text" name="tempat_pelaksanaan" class="form-control" placeholder="Tempat Pelaksanaan" value="<?php echo set_value('tempat_pelaksanaan'); ?>">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 form-control-label">Tahun</label>
        <div class="col-sm-9">
          <input type="text" name="tahun" class="form-control" placeholder="Tahun" value="<?php echo set_value('tahun'); ?>">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 form-control-label">Foto</label>
        <div class="col-sm-9">
          <input type="file" name="foto" class="form-control" value="<?php echo set_value('foto'); ?>">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 form-control-label">foto</label>
        <div class="col-sm-9">
          <textarea name="keternagan" class="form-control" placeholder="Keterangan"><?php echo set_value('keterangan'); ?></textarea>
        </div>
      </div>

      <div class="line"></div>
      <div class="form-group row">
        <div class="col-sm-4 offset-sm-3">
          <a href="<?php echo  base_url('admin/user'); ?>" class="btn btn-secondary"><i class="fa fa-times"></i> Batal</a>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </div>
    </form>

    <?php echo form_close(); ?>
  </div>
</div>
</div>
