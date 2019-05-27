<?php

  $akses_level = $this->session->userdata('akses_level');

 ?>
<br>
<div class="col-lg-12">
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
        echo form_open_multipart('admin/berita/editBerita/'.$berita->id_berita);
     ?>

    <form class="form-horizontal">

      <div class="form-group row">
        <label class="col-sm-3 form-control-label">Judul Berita</label>
        <div class="col-sm-9">
          <input type="text" name="judul_berita" class="form-control" placeholder="Judul Berita" value="<?php echo $berita->judul_berita; ?>">
<hr class="line">
          <div class="row">

            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label">Kategori Berita</label>
                  <select class="form-control" name="kategori">
                    <option value="">-Pilih kategori berita-</option>
                    <?php foreach($kategori as $kategori){ ?>
                    <option value="<?php echo $kategori->id_kategori; ?>" <?php if($kategori->id_kategori == $berita->id_kategori){echo "selected";} ?>><?php echo $kategori->nama_kategori; ?></option>
                  <?php } ?>
                  </select>
              </div>


              <div class="form-group">
                <label class="form-control-label">Jenis Berita</label>
                  <select class="form-control" name="jenis_berita">
                    <option value="Berita">Berita</option>
                    <option value="Slider" <?php if($berita->jenis_berita== 'Slider'){echo "selected";} ?>>Slider</option>
                  </select>
              </div>

              <?php if($akses_level == "Admin"){ ?>
              <div class="form-group">
                <label class="form-control-label">Status</label>
                  <select class="form-control" name="status_berita">
                    <option value="Non Aktif">Non Aktif</option>
                    <option value="Aktif" <?php if($berita->status_berita== 'Aktif'){echo "selected";} ?>>Aktif</option>
                  </select>
              </div>
            <?php } ?>

            </div>

            <div class="col-md-6">


                  <div class="form-group">
                    <label class="form-control-label">Gambar</label>
                      <input type="file" name="gambar" class="form-control" value="<?php echo $berita->gambar; ?>">
                  </div>
                  <div class="text-center">

                    <img src="<?php echo base_url('assets/uploads/images/berita/thumbs/'.$berita->gambar); ?>" height="170px" class="img">
                  </div>


            </div>

          </div>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 form-control-label">Keyword</label>
        <div class="col-sm-9">
          <textarea name="keyword" class="form-control"><?php echo $berita->keyword; ?></textarea>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 form-control-label">Isi</label>
        <div class="col-sm-9">
          <textarea name="isi_berita" class="editor form-control"><?php echo $berita->isi_berita; ?></textarea>
        </div>
      </div>




      <div class="line"></div>
      <div class="form-group row">
        <div class="col-sm-4 offset-sm-3">
          <a href="<?php echo  base_url('admin/berita'); ?>" class="btn btn-secondary"><i class="fa fa-times"></i> Batal</a>
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </div>
    </form>

    <?php echo form_close(); ?>
  </div>
</div>
</div>
