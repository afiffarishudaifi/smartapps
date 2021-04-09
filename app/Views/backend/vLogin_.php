<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="<?= base_url()?>/public/docs/admin/assets/img/foto_logo/logo.png">
    <title><?= $judul ?></title>
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

    <!-- begin login-cover -->
    <div class="login-cover">
        <div class="login-cover-image"
            style="background-image: url(../../docs/admin/assets/img/login-bg/login-bg-8.jpg)"
            data-id="login-cover-image"></div>
        <div class="login-cover-bg"></div>
    </div>
    <!-- end login-cover -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin login -->
        <div class="row" style="background-color: black;">
            <div class="login login-v2" data-pageload-addclass="animated fadeIn">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        <b>LOGIN</b>
                        <small>Pengguna Penerima Pengaduan</small>
                        <div class="icon">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    <div class="icon">
                        <div class="widget-img rounded widget-img-lg"
                            style="background-image: url(../../docs/admin/assets/img/twh.png)">
                        </div>
                    </div>
                </div>
                <!-- end login-header -->

                <!-- begin login-content -->
                <div class="login-content">
                    <?php if (session()->getFlashdata('sukses')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('sukses') ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <?php endif; ?>
                   <form action="<?php echo base_url('public/Dashboard/Login/login') ?>" method="POST" class="margin-bottom-0" data-parsley-validate="true">
                        <div class="form-group m-b-20">
                             <input type="text" class="form-control form-control-lg" name="username" id="username" 
                                data-parsley-required="true" placeholder="Masukkan Username" autofocus />
                        </div>
                        <div class="form-group m-b-20">
                            <input type="password" class="form-control form-control-lg" data-parsley-required="true" placeholder="Masukkan Katasandi"
                                name="password" id="password" data-parsley-minlength="8" />
                        </div>

                        <div class="login-buttons">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Masuk</button>
                            <a href="<?= base_url('public/Frontend/Frontend')?>" class="btn btn-danger btn-block btn-lg">Batal</a>
                        </div>
                    </form>
                    <br>
                    <br>
                            <p class="text-center text-grey-darker mb-0">
                                &copy; Simpel Dasar All Right Reserved 2021
                            </p>
                </div>
                <!-- end login-content -->
            </div>
            
        </div>
        <!-- end login -->

        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
            data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?php echo base_url('docs/admin/assets/js/app.min.js') ?>"></script>
    <script src="<?php echo base_url('docs/admin/assets/js/theme/google.min.js') ?>"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="<?php echo base_url('docs/admin/assets/js/demo/login-v2.demo.js') ?>"></script>
    <script src="<?php echo base_url('docs/admin/assets/plugins/parsleyjs/dist/parsley.min.js') ?>"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
</body>

</html>