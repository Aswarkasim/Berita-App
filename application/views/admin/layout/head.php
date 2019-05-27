
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/datatables/dataTables.min.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/admin/img/favicon.ico">

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

        <!-- Tiny MCE -->
   <script type="text/javascript" src="<?php echo base_url() ?>assets/tinymce/jquery.tinymce.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>assets/tinymce/tinymce.min.js"></script>

   <script>
       tinymce.init({
         selector: '.editor',
         height: 500,
         theme: 'modern',
         toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
         image_advtab: true,
         templates: [
           { title: 'Test template 1', content: 'Test 1' },
           { title: 'Test template 2', content: 'Test 2' }
         ],
         content_css: [
           '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
           '//www.tinymce.com/css/codepen.min.css'
         ]
        });
   </script>
  </head>
  <body>
    <div class="page">
