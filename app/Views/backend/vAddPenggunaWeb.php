<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="<?= base_url()?>/docs/admin/assets/img/foto_logo/logo.png">
    <title><?= $judul; ?></title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="<?php echo base_url('docs/admin/assets/css/google/app.min.css') ?>" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link
        href="<?php echo base_url('docs/admin/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css') ?>"
        rel="stylesheet" />

    <!-- ================== END PAGE LEVEL STYLE ================== -->
</head>

<body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show">
        <span class="spinner"></span>
    </div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container"
        class="fade page-sidebar-fixed page-header-fixed page-with-wide-sidebar page-with-light-sidebar">
        <!-- begin #header -->
        <?= $this->include("backend/template/header") ?>
        <!-- end #header -->

        <!-- begin #sidebar -->
        <?= $this->include("backend/template/sidebar") ?>
        <!-- end #sidebar -->

        <!-- begin #content -->
        <div id="content" class="content">
            <?php $session = session();
            if ($session->getFlashdata('eror')) { ?>
            <div class="alert alert-danger m-b-0">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h5><i class="fa fa-info-circle"></i> PERINGATAN!</h5>
                <p><?php echo $session->getFlashdata('eror'); ?></p>
            </div>
            <?php } ?>

            <!-- begin page-header -->
            <h1 class="page-header"><?= $page_header; ?>
            </h1>
            <!-- end page-header -->
            <!-- begin panel -->
            <div class="panel panel-primary">
                <!-- begin panel-heading -->
                <div class="panel-heading">
                    <h4 class="panel-title"><?= $panel_title; ?></h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                            data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                            data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                            data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                            data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <!-- end panel-heading -->
                <!-- begin panel-body -->
                <div class="panel-body">
                    <?php if (session('msg')) : ?>
                    <div class="alert alert-info alert-dismissible">
                        <?= session('msg') ?>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div>
                    <?php endif ?>
                    <form action="<?php echo base_url('Dashboard/M_pengguna_web/add_pengguna_web') ?>"
                        method="POST" enctype="multipart/form-data" class="form-horizontal" data-parsley-validate="true"
                        name="demo-form">
                        <?= csrf_field(); ?>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Username</label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control <?= ($validation->hasError('username_web')) ? 'is-invalid' : ''; ?>" type="text" id="username_web" name="username_web" value="<?= old('username_web'); ?>"
                                    placeholder="Username" data-parsley-required="true" />
                                <div class="invalid-feedback">
                                  <?= $validation->getError('username_web'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Password</label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control <?= ($validation->hasError('password_web')) ? 'is-invalid' : ''; ?>" type="text" id="password_web" name="password_web" value="<?= old('password_web'); ?>"
                                    placeholder="Password" data-parsley-required="true" data-parsley-minlength="8" />
                                <div class="invalid-feedback">
                                  <?= $validation->getError('password_web'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Email</label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control <?= ($validation->hasError('email_web')) ? 'is-invalid' : ''; ?>" type="email" id="email_web" name="email_web" placeholder="Email" value="<?= old('email_web'); ?>"
                                    data-parsley-required="true" data-parsley-type="email" />
                                <div class="invalid-feedback">
                                  <?= $validation->getError('email_web'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Nama Pengguna Web</label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control <?= ($validation->hasError('nama_web')) ? 'is-invalid' : ''; ?>" type="text" id="nama_web" name="nama_web" value="<?= old('nama_web'); ?>"
                                    placeholder="Nama Pengguna Web" data-parsley-required="true"/>
                                <div class="invalid-feedback">
                                  <?= $validation->getError('nama_web'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">No Telp Pengguna Web</label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control <?= ($validation->hasError('no_telp_web')) ? 'is-invalid' : ''; ?>" type="text" id="no_telp_web" data-parsley-minlength="10" name="no_telp_web" placeholder="No Telp Pengguna Web" 
                                 value="<?= old('no_telp_web'); ?>" data-parsley-required="true" data-parsley-type="number" />
                                <div class="invalid-feedback">
                                  <?= $validation->getError('no_telp_web'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Alamat Pengguna Web</label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control <?= ($validation->hasError('alamat_web')) ? 'is-invalid' : ''; ?>" type="text" id="alamat_web" name="alamat_web" placeholder="Alamat Pengguna Web" value="<?= old('alamat_web'); ?>"
                                    data-parsley-required="true" />
                                <div class="invalid-feedback">
                                  <?= $validation->getError('alamat_web'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="file">Foto</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="file" class="<?= ($validation->hasError('file')) ? 'is-invalid' : ''; ?>" id="file" name="file" data-parsley-required="true"
                                    data-parsley-required="true" />
                                <div class="invalid-feedback">
                                  <?= $validation->getError('file'); ?>
                                </div>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Max 1Mb
                                </small>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <label class="col-md-3 col-sm-3 col-form-label">&nbsp;</label>
                            <div class="col-md-9 col-sm-9">
                                <button type="submit" name="tambah" class="btn btn-success">SIMPAN</button>
                                <a href="<?php echo base_url('Dashboard/M_pengguna_web') ?>" type="button"
                                    class="btn btn-danger">BATAL</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end panel-body -->
            </div>
            <!-- end panel -->
        </div>
        <!-- end #content -->

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
    <script src="<?php echo base_url('docs/admin/assets/js/demo/table-manage-default.demo.js') ?>"></script>
    <script src="<?php echo base_url('docs/admin/assets/plugins/ckeditor/ckeditor.js') ?>"></script>

    <script src="<?php echo base_url('docs/admin/assets/plugins/parsleyjs/dist/parsley.min.js') ?>"></script>
    <script src="<?php echo base_url('docs/admin/assets/plugins/highlight.js/highlight.min.js') ?>"></script>
    <script src="<?php echo base_url('docs/admin/assets/js/demo/render.highlight.js') ?>"></script>

</body>

</html>