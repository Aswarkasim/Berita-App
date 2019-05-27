<!--ICON  -->
<div class="col-lg-6  ">
<div class="card">
  <div class="card-header d-flex align-items-center">
    <h3 class="h4">Konfigurasi Icon</h3>
  </div>
  <div class="card-body">
    <?php
        echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ' , ' </div>');

        if($this->session->flashdata('msg')){
          echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
          echo $this->session->flashdata('msg');
          echo '</div>';
        }


        echo form_open_multipart('admin/konfigurasi/icon');
     ?>

    <form class="form-horizontal">
      <div class="row">
      <div class="col-md-6">
        <img src="<?php echo base_url('assets/uploads/icon/'.$konfigurasi->icon); ?>" alt="Icon" class="img img-thumbnail">
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <input type="hidden" name="id_konfigurasi" value="<?php echo $konfigurasi->id_konfigurasi; ?>">
          <div class="form-group">
            <label class="form-control-label">Deskripsi</label>
            <input type="file" name="icon" value="<?php echo $konfigurasi->logo; ?>" class="form-control">
          </div>
        </div>

            <div class="line"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Upload </button>
            <a href="<?php echo  base_url('admin/berita/kategori'); ?>" class="btn btn-secondary"><i class="fa fa-times"></i> Batal</a>
          </div>
        </div>
      </div>
    </div>

    </form>

    <?php echo form_close(); ?>
  </div>
</div>
