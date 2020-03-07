<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$judul;?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
  <link href="<?=base_url();?>assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?=base_url();?>assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="<?=base_url();?>assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="<?=base_url();?>assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <!-- My Login CSS -->
  <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url('assets/css/login.css');?>">
</head>
<body>
  <div class="bg-image"></div>
  <div class="title">Register</div>
  <div class="containerlogin">
    <div class="registerform">
      <h2 class="mt-5">Aplikasi Pendukung SIKEP (v. BETA)</h2>
        <?=$this->session->flashdata('pesan');?>
      <form action="" method="post">
        <input type="text" name="email" placeholder="Email">
          <?=form_error('email','<small class="text-danger">','</small>'); ?>
        <input type="text" name="username" placeholder="Username">
          <?=form_error('username','<small class="text-danger">','</small>'); ?>
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password2" placeholder="Ulangi Password">
          <?=form_error('username','<small class="text-danger">','</small>'); ?>
        <input type="submit" value="Daftar">
        <input type="reset" value="Reset">
        <a class="btn btn-sm btn-primary font-weight-bold float-right mt-2" href="<?=base_url('login');?>"><i class="fas fa-angle-double-left"></i> Kembali</a>
      </form>
    </div>
  </div>
</body>
</html>