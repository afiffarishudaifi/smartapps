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
                    <form action="<?php echo base_url('Dashboard/M_tempat/add_tempat') ?>" method="POST"
                        enctype="multipart/form-data" class="form-horizontal" data-parsley-validate="true"
                        name="demo-form">
                        <?= csrf_field(); ?>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Kategori Tempat</label>
                            <div class="col-md-9 col-sm-9">
                                <select name="id_kategori_tempat" id="id_kategori_tempat" style="width: 100%" data-parsley-required="true" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Pengguna Smartapps</label>
                            <div class="col-md-9 col-sm-9">
                                <select name="id_pengguna_apps" id="id_pengguna_apps" style="width: 100%" data-parsley-required="true"
                                    class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Nama Tempat</label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control" type="text" id="nama_tempat" name="nama_tempat"
                                    placeholder="Nama Tempat" data-parsley-required="true" />
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Longitude Tempat</label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control" type="text" id="long_tempat" name="long_tempat"
                                    placeholder="Longitude Tempat" data-parsley-required="true" />
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Latitude Tempat</label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control" type="text" id="lat_tempat" name="lat_tempat"
                                    placeholder="Latitude Tempat" data-parsley-required="true" />
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Alamat Tempat</label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control" type="text" id="alamat_tempat" name="alamat_tempat"
                                    placeholder="Alamat Tempat" data-parsley-required="true" />
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Deskripsi Tempat</label>
                            <div class="col-md-9 col-sm-9">
                                <textarea class="form-control" id="deskripsi_tempat" name="deskripsi_tempat" data-parsley-required="true">
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">No Telp Tempat</label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control" type="text" id="no_telp_tempat" name="no_telp_tempat"
                                    placeholder="No Telp Tempat" data-parsley-required="true" />
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="file">Foto</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="file" id="file" name="file[]" multiple />
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="status">Status Tempat</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" id="status_tempat" name="status_tempat"
                                    data-parsley-required="true">
                                    <option value="Pengajuan">Pengajuan</option>
                                    <option value="Terkonfirmasi">Terkonfirmasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <label class="col-md-3 col-sm-3 col-form-label">&nbsp;</label>
                            <div class="col-md-9 col-sm-9">
                                <button type="submit" name="tambah" class="btn btn-success">SIMPAN</button>
                                <a href="<?php echo base_url('Dashboard/M_tempat') ?>" type="button"
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
    <script
        src="<?php echo base_url('docs/admin/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js') ?>">
    </script>
    <script src="<?php echo base_url('docs/admin/assets/js/demo/form-wysiwyg.demo.js') ?>"></script>

    <script src="<?php echo base_url('docs/admin/assets/plugins/parsleyjs/dist/parsley.min.js') ?>"></script>
    <script src="<?php echo base_url('docs/admin/assets/plugins/highlight.js/highlight.min.js') ?>"></script>
    <script src="<?php echo base_url('docs/admin/assets/js/demo/render.highlight.js') ?>"></script>
    <script src="<?php echo base_url('/docs/admin/assets/plugins/select2/js/select2.full.min.js') ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('/docs/admin/assets/plugins/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('/docs/admin/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
    <!-- ================== END PAGE LEVEL JS ================== -->

    <!-- Script dropdown -->
    <script type="text/javascript">
    $(function() {
        $('#id_pengguna_apps').select2({
            placeholder: "Pilih Pengguna Aps",
            theme: 'bootstrap4',
            ajax: {
                url: '<?php echo base_url('Dashboard/M_tempat/data_pengguna_apps'); ?>',
                dataType: 'json'
            }
        });

        $('#id_kategori_tempat').select2({
            placeholder: "Pilih Kategori Tempat",
            theme: 'bootstrap4',
            ajax: {
                url: '<?php echo base_url('Dashboard/M_tempat/data_kategori_tempat'); ?>',
                dataType: 'json'
            }
        });
    })
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $.ajax({
                    url:"<?= base_url()?>/Dashboard/Dashboard/jumlah_pengajuan",
                    type:"POST",
                    dataType:"json",
                    data:{},
                    success:function(data){
                        $('#total_tempat').html(data.total_tempat);
                        $('#total_pengaduan').html(data.total_pengaduan);
                    }
                })
            }, 5000)
        })
    </script>
</body>

</html>