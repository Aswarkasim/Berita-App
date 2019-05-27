<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#TambahKategori">
<i class="fa fa-plus"></i> Tambah Kategori
</button>
<div class="modal fade" id="TambahKategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"></h4>
    </div>
    <div class="modal-body">
      <?php echo form_open('admin/berita/kategori'); ?>
      <div class="form-group">
        <label class="label">Nama Kategori</label>
        <input type="text" placeholder="Nama Kategori" name="nama_kategori" value="<?php echo set_value('nama_kategori'); ?>" class="form-control">
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal"> Tutup</button>
        <input type="submit" value="Simpan" class=" btn btn-success">
    </div>
    <?php echo form_close(); ?>
</div>
</div>
</div>
