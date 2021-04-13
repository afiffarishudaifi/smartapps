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
                    <form action="<?php echo base_url('Dashboard/M_kategori_pengaduan/update_kategori_pengaduan') ?>"
                        method="POST" enctype="multipart/form-data" class="form-horizontal" data-parsley-validate="true"
                        name="demo-form">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id_kategori_pengaduan" id="id_kategori_pengaduan"
                            value="<?php echo $kategori['ID_KATEGORI_PENGADUAN']; ?>">
                        <input type="hidden" name="id_web_parameter" id="id_web_parameter"
                            value="<?php echo $kategori['ID_WEB']; ?>">
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Pengguna Web</label>
                            <div class="col-md-9 col-sm-9">
                                <select name="id_web" id="id_web" data-parsley-required="true" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Nama Kategori Pengaduan</label>
                            <div class="col-md-9 col-sm-9">
                            <input class="form-control <?= ($validation->hasError('nama_kategori_pengaduan')) ? 'is-invalid' : ''; ?>" type="text" id="nama_kategori_pengaduan" name="nama_kategori_pengaduan"
                                    placeholder="Nama Kategori Pengaduan" data-parsley-required="true" value="<?= (old('nama_kategori_pengaduan')) ? old('nama_kategori_pengaduan') : $kategori['NAMA_KATEGORI_PENGADUAN']; ?>" />
                                <div class="invalid-feedback">
                                  <?= $validation->getError('nama_kategori_pengaduan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <label class="col-md-3 col-sm-3 col-form-label">&nbsp;</label>
                            <div class="col-md-9 col-sm-9">
                                <button type="submit" name="edit" class="btn btn-success">SIMPAN</button>
                                <a href="<?php echo base_url('Dashboard/M_kategori_pengaduan') ?>" type="button"
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

    <script src="<?php echo base_url('/docs/admin/assets/plugins/select2/js/select2.full.min.js') ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('/docs/admin/assets/plugins/select2/css/select2.min.css') ?>">
    <link rel="stylesheet"
        href="<?php echo base_url('/docs/admin/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">

    <!-- Script dropdown -->
    <script type="text/javascript">
    $(function() {
        $('#id_web').select2({
            placeholder: "Pilih Pengguna Web",
            theme: 'bootstrap4',
            ajax: {
                url: '<?php echo base_url('Dashboard/M_kategori_pengaduan/data_web'); ?>',
                dataType: 'json'
            }
        });
        var isi = document.getElementById("id_web_parameter").value;
        $.getJSON('<?php echo base_url('Dashboard/M_kategori_pengaduan/detail_web'); ?>' + '/' + isi, {},
            function(json) {
                $('#id_web').append('<option selected value="' + json.id_web + '">' + json.nama_web +
                    '</option>');
                $('#id_web').select2('data', {
                    id: json.id_web,
                    text: json.nama_web
                });
                $('#id_web').trigger('change');
            });

    })
    </script>
    <!-- ================== END PAGE LEVEL JS ================== -->

</body>

</html>