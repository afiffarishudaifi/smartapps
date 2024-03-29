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
    <link href="<?php echo base_url('docs/admin/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" />

    <!-- ================== END PAGE LEVEL STYLE ================== -->
</head>

<body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show">
        <span class="spinner"></span>
    </div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed page-with-wide-sidebar page-with-light-sidebar">
        <!-- begin #header -->
        <?= $this->include("user/template/header") ?>
        <!-- end #header -->

        <!-- begin #sidebar -->
        <?= $this->include("user/template/sidebar") ?>
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
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
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
                    <form action="<?php echo base_url('User/M_pengaduan/update_pengaduan') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal" data-parsley-validate="true" name="demo-form">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id_pengaduan" id="id_pengaduan" value="<?= $pengaduan['ID_PENGADUAN'] ?>">
                        <input type="hidden" name="id_web" id="id_web" class="form-control">
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Pengguna Apps</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="hidden" name="id_pengguna_apps" id="id_pengguna_apps" class="form-control">
                                <input type="text" name="nama_lengkap_apps" id="nama_lengkap_apps" class="form-control" readonly="">
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Kategori Pengaduan</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="hidden" name="id_kategori_pengaduan" id="id_kategori_pengaduan" class="form-control">
                                <input type="text" name="nama_kategori_pengaduan" id="nama_kategori_pengaduan" class="form-control" readonly="">
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Judul Pengaduan</label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control" type="text" id="judul_pengaduan" name="judul_pengaduan" placeholder="Judul Pengaduan" data-parsley-required="true" value="<?= $pengaduan['JUDUL_PENGADUAN'] ?>" readonly />
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Isi Pengaduan</label>
                            <div class="col-md-9 col-sm-9">
                                <textarea class="form-control" id="isi_pengaduan" name="isi_pengaduan" data-parsley-required="true" readonly><?= $pengaduan['ISI_PENGADUAN'] ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Tempat Kejadian</label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control" type="text" id="tempat_kejadian" name="tempat_kejadian" placeholder="Tempat Kejadian" data-parsley-required="true" value="<?= $pengaduan['TEMPAT_KEJADIAN'] ?>" readonly />
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Waktu Pengaduan</label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control" type="text" id="waktu_kejadian" name="waktu_kejadian" placeholder="Tempat Kejadian" data-parsley-required="true" value="<?= $pengaduan['WAKTU_PENGADUAN'] ?>" readonly />
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Tipe Pengaduan</label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control" type="text" id="tipe_pengaduan" name="tipe_pengaduan" placeholder="Tempat Kejadian" data-parsley-required="true" value="<?= $pengaduan['TIPE_PENGADUAN'] ?>" readonly />
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Status Pengaduan</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" id="status_pengaduan" name="status_pengaduan" data-parsley-required="true">
                                    <?php if ($pengaduan['STATUS_PENGADUAN'] == 'Terkonfirmasi') { ?>
                                        <option value="Terkonfirmasi" selected="">Laporan Terkonfirmasi</option>
                                        <option value="Penanganan">Dalam Penanganan</option>
                                        <option value="Selesai">Selesai</option>
                                        <option value="Ditolak">Ditolak</option>
                                    <?php } else if ($pengaduan['STATUS_PENGADUAN'] == 'Penanganan') { ?>
                                        <option value="Terkonfirmasi">Laporan Terkonfirmasi</option>
                                        <option value="Penanganan" selected="">Dalam Penanganan</option>
                                        <option value="Selesai">Selesai</option>
                                        <option value="Ditolak">Ditolak</option>
                                    <?php } else if ($pengaduan['STATUS_PENGADUAN'] == 'Selesai') { ?>
                                        <option value="Terkonfirmasi">Laporan Terkonfirmasi</option>
                                        <option value="Penanganan">Dalam Penanganan</option>
                                        <option value="Selesai" selected="">Selesai</option>
                                        <option value="Ditolak">Ditolak</option>
                                    <?php } else {?>
                                        <option value="Terkonfirmasi">Laporan Terkonfirmasi</option>
                                        <option value="Penanganan">Dalam Penanganan</option>
                                        <option value="Selesai">Selesai</option>
                                        <option value="Ditolak" selected="">Ditolak</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <label class="col-md-3 col-sm-3 col-form-label">&nbsp;</label>
                            <div class="col-md-9 col-sm-9">
                                <button type="submit" name="edit" class="btn btn-success">SIMPAN</button>
                                <a href="<?php echo base_url('User/M_pengaduan') ?>" type="button" class="btn btn-danger">BATAL</a>
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
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?php echo base_url('docs/admin/assets/js/app.min.js') ?>"></script>
    <script src="<?php echo base_url('docs/admin/assets/js/theme/google.min.js') ?>"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="<?php echo base_url('docs/admin/assets/plugins/select2/js/select2.full.min.js') ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('docs/admin/assets/plugins/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('docs/admin/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">

    <script src="<?php echo base_url() ?>/docs/admin/assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
    <script src="<?php echo base_url() ?>/docs/admin/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js"></script>
    <script src="<?php echo base_url() ?>/docs/admin/assets/plugins/clipboard/dist/clipboard.min.js"></script>
    <script src="<?php echo base_url() ?>/docs/admin/assets/js/demo/form-plugins.demo.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    <!-- Script dropdown -->
    <script type="text/javascript">
        $(function() {
            var isi = document.getElementById("id_pengaduan").value;
            $.getJSON('<?php echo base_url('User/M_pengaduan/data_edit_dropdown'); ?>' + '/' + isi, {},
                function(json) {
                    $('#id_web').val(json.id_web);
                    $('#nama_web').val(json.nama_web);
                    $('#id_pengguna_apps').val(json.id_pengguna_apps);
                    $('#nama_lengkap_apps').val(json.nama_lengkap_apps);
                    $('#id_kategori_pengaduan').val(json.id_kategori_pengaduan);
                    $('#nama_kategori_pengaduan').val(json.nama_kategori_pengaduan);
                });
        })

        $(document).ready(function() {
            setInterval(function() {
                $.ajax({
                    url: "<?= base_url() ?>/User/Dashboard/jumlah_pengajuan",
                    type: "POST",
                    dataType: "json",
                    data: {},
                    success: function(data) {
                        $('#total_pengaduan').html(data.total_pengaduan);
                        $('#total_penanganan').html(data.total_penanganan);
                    }
                })
            }, 10000)
        })
    </script>
    <!-- ================== END PAGE LEVEL JS ================== -->
</body>

</html>