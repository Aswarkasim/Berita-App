<?php $konfigurasi = $this->konfigurasi_model->listing(); ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/vendor/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/owlcarousel/assets/owl.theme.default.min.css">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/template/css/small-business.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url('assets/uploads/icon/'.$konfigurasi->icon); ?>">

  </head>

  <body>

    <div class="container" id="main-body">
