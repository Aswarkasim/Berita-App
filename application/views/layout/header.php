<?php $konfigurasi = $this->konfigurasi_model->listing(); ?>
<br>
<div class="masthead">
<div class="header">
  <div class="row">
	<div class="col-sm-2">
		<a href="<?php echo base_url(); ?>" title="<?php echo $konfigurasi->namaweb; ?>">
			<img src="<?php echo base_url('assets/uploads/logo/'.$konfigurasi->logo); ?>" alt="<?php echo $konfigurasi->namaweb; ?>" class="img img-responsive img-thumbnail thumb-brand">
		</a>
	</div>

	<div class="col-sm-6">
	   <h3><?php echo $konfigurasi->namaweb; ?></h3>
       <i class="fa fa-map"></i> <?php echo $konfigurasi->alamat; ?><br>
       <i class="fa fa-phone"></i> <?php echo $konfigurasi->telepon; ?> <br>
       <i class="fa fa-envelope"></i> <?php echo $konfigurasi->email; ?></p>
	</div>

  <div class="">

  </div>

	<div class="col-md-3 text-right">
		<p>
			<a href="http://facebook.com/pondokinformatika" target="_blank" class="btn">
				<i class="fa fa-facebook fa-2x"></i>
			</a>
			<a href="http://twitter.com/pondokinformatika" target="_blank" class="btn">
				<i class="fa fa-twitter fa-2x"></i>
			</a>
			<a href="http://instagram.com/pondokinformatika" target="_blank" class="btn">
				<i class="fa fa-instagram fa-2x"></i>
			</a>
		</p>
	</div>
	<div class="clearfix"></div>
</div>
</div>
</div>
