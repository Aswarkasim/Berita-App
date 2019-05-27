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
        echo form_open_multipart('admin/user/edit/'.$user->id_user);
     ?>

    <form class="form-horizontal">

      <div class="form-group row">
        <label class="col-sm-3 form-control-label">Nama</label>
        <div class="col-sm-9">
          <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $user->nama; ?>">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 form-control-label">Username</label>
        <div class="col-sm-9">
          <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username; ?>">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 form-control-label">Email</label>
        <div class="col-sm-9">
          <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email; ?>">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 form-control-label">Password</label>
        <div class="col-sm-9">
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 form-control-label">Retype Password</label>
        <div class="col-sm-9">
          <input type="password" name="re_password" class="form-control" placeholder="Retype Password" value="">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 form-control-label">Akses Level</label>
        <div class="col-sm-9">
          <select class="form-control" name="akses_level">
            <option value="">- Pilih Akses Level -</option>
            <option value="User" <?php if($user->akses_level == "User"){echo "selected";} ?>>User</option>
            <option value="Admin" <?php if($user->akses_level == "Admin"){echo "selected";} ?>>Admin</option>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-3 form-control-label">Foto</label>
        <div class="col-sm-9">
          <input type="file" name="foto" class="form-control" value="<?php echo set_value('foto'); ?>">
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
