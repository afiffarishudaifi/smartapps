<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="<?= base_url()?>/docs/admin/assets/img/foto_logo/logo.png">
    <title><?= $judul ?></title>
    <!-- <title>LOGIN | PENGELOLAAN SMARTAPPS</title> -->
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="<?php echo base_url('docs/admin/assets/css/google/app.min.css') ?>" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->
</head>

<body class="pace-top">
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show">
        <span class="spinner"></span>
    </div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <?php if (session()->getFlashdata('sukses')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('sukses') ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php endif; ?>
        <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image"
                    style="background-image: url(<?= base_url(); ?>/docs/admin/assets/img/login-bg/login.jpg)"></div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        <span class="logo">
                            <b class="mr-1">Simpel</b>
                            <b class="text-blue">D</b>
                            <b class="text-red">A</b>
                            <b class="text-orange">S</b>
                            <b class="text-blue">A</b>
                            <b class="text-green">R</b>
                        </span> <b>Login</b>
                        <small>Penerima Pengaduan Masyarakat</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-lock"></i>
                    </div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                    <?php if (session()->getFlashdata('msg')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('msg') ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <?php endif; ?>
                    <form action="<?php echo base_url('Dashboard/Login/login') ?>" method="POST" class="margin-bottom-0" data-parsley-validate="true">
                        <div class="form-group m-b-15">
                            <input type="text" class="form-control form-control-lg" name="username" id="username" 
                                data-parsley-required="true" placeholder="Masukkan Username" autofocus />
                        </div>
                        <div class="form-group m-b-15">
                            <input type="password" class="form-control form-control-lg" data-parsley-required="true" placeholder="Masukkan Katasandi"
                                name="password" id="password" data-parsley-minlength="8" />
                        </div>
                        <div class="login-buttons">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Masuk</button>
                            <a href="<?= base_url('Frontend/Frontend')?>" class="btn btn-danger btn-block btn-lg">Batal</a>
                        </div>
                        <div class="m-t-30 m-b-30 p-b-30">
                            Lupa password ? Click <a href="<?= base_url('Dashboard/Login/resetPassword')?>">Disini</a> untuk reset Password.
                        </div>
                        <hr />
                        <p class="text-center text-grey-darker mb-0">
                            &copy; Simpel Dasar All Right Reserved 2021
                        </p>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->
    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?php echo base_url('docs/admin/assets/js/app.min.js') ?>"></script>
    <script src="<?php echo base_url('docs/admin/assets/js/theme/google.min.js') ?>"></script>
    <script src="<?php echo base_url('docs/admin/assets/plugins/parsleyjs/dist/parsley.min.js') ?>"></script>
    <!-- ================== END BASE JS ================== -->
</body>

</html>