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
                    <form action="<?php echo base_url('Dashboard/M_pengaduan/update_pengaduan') ?>"
                        method="POST" enctype="multipart/form-data" class="form-horizontal" data-parsley-validate="true"
                        name="demo-form">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id_pengaduan" id="id_pengaduan" value="<?= $pengaduan['ID_PENGADUAN']?>">
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Pengguna Web</label>
                            <div class="col-md-9 col-sm-9">
                                <select name="id_web" id="id_web" data-parsley-required="true" class="form-control">
                                </select>
                            </div>
                        </div> 
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Pengguna Apps</label>
                            <div class="col-md-9 col-sm-9">
                                <select name="id_pengguna_apps" id="id_pengguna_apps" data-parsley-required="true" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Kategori Pengaduan</label>
                            <div class="col-md-9 col-sm-9">
                                <select name="id_kategori_pengaduan" id="id_kategori_pengaduan" data-parsley-required="true" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Judul Pengaduan</label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control" type="text" id="judul_pengaduan"
                                    name="judul_pengaduan" placeholder="Judul Pengaduan"
                                    data-parsley-required="true" value="<?= $pengaduan['JUDUL_PENGADUAN']?>"/>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Isi Pengaduan</label>
                            <div class="col-md-9 col-sm-9">
                                <textarea class="form-control" id="isi_pengaduan"
                                    name="isi_pengaduan"
                                    data-parsley-required="true"><?= $pengaduan['ISI_PENGADUAN']?>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Tempat Kejadian</label>
                            <div class="col-md-9 col-sm-9">
                               <input class="form-control" type="text" id="tempat_kejadian"
                                    name="tempat_kejadian" placeholder="Tempat Kejadian"
                                    data-parsley-required="true" value="<?= $pengaduan['TEMPAT_KEJADIAN']?>" />
                            </div>
                        </div> 
                         <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Tipe Pengaduan</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" id="tipe_pengaduan" name="tipe_pengaduan" data-parsley-required="true">
                                    <?php if ($pengaduan['TIPE_PENGADUAN'] == 'umum') { ?>
                                        <option value="umum" selected="">Umum(Laporan akan di publikasikan)</option>
                                        <option value="rahasia">Rahasia(Laporan tidak akan di publikasikan)</option>
                                    <?php } else { ?>
                                        <option value="umum">Umum(Laporan akan di publikasikan)</option>
                                        <option value="rahasia" selected="">Rahasia(Laporan tidak akan di publikasikan)</option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="title">Status Pengaduan</label>
                            <div class="col-md-9 col-sm-9">
                               <select class="form-control" id="status_pengaduan" name="status_pengaduan" data-parsley-required="true">
                                    <?php if($pengaduan['STATUS_PENGADUAN'] == 'Pengajuan') {?>
                                        <option value="Pengajuan" selected>Pengajuan</option>
                                        <option value="Terkonfirmasi">Laporan Terkonfirmasi</option>
                                        <option value="Penanganan">Dalam Penanganan</option>
                                        <option value="Selesai">Selesai</option>
                                        <option value="Ditolak">Ditolak</option>
                                    <?php } else if($pengaduan['STATUS_PENGADUAN'] == 'Terkonfirmasi') {?>
                                        <option value="Pengajuan">Pengajuan</option>
                                        <option value="Terkonfirmasi" selected="">Laporan Terkonfirmasi</option>
                                        <option value="Penanganan">Dalam Penanganan</option>
                                        <option value="Selesai">Selesai</option>
                                        <option value="Ditolak">Ditolak</option>
                                    <?php } else if($pengaduan['STATUS_PENGADUAN'] == 'Penanganan') {?>
                                        <option value="Pengajuan">Pengajuan</option>
                                        <option value="Terkonfirmasi">Laporan Terkonfirmasi</option>
                                        <option value="Penanganan" selected="">Dalam Penanganan</option>
                                        <option value="Selesai">Selesai</option>
                                        <option value="Ditolak">Ditolak</option>
                                    <?php } else if($pengaduan['STATUS_PENGADUAN'] == 'Selesai') {?>
                                        <option value="Pengajuan">Pengajuan</option>
                                        <option value="Terkonfirmasi">Laporan Terkonfirmasi</option>
                                        <option value="Penanganan">Dalam Penanganan</option>
                                        <option value="Selesai" selected="">Selesai</option>
                                        <option value="Ditolak">Ditolak</option>
                                    <?php } else { ?>
                                        <option value="Pengajuan">Pengajuan</option>
                                        <option value="Terkonfirmasi">Laporan Terkonfirmasi</option>
                                        <option value="Penanganan">Dalam Penanganan</option>
                                        <option value="Selesai">Selesai</option>
                                        <option value="Ditolak" selected="">Ditolak</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="foto" id="foto" value="<?php echo $pengaduan['FOTO_PENGADUAN']; ?>">
                        <div class="form-group row m-b-15">
                            <label class="col-md-3 col-sm-3 col-form-label" for="file">Foto</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="file" id="file" name="file" />
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <label class="col-md-3 col-sm-3 col-form-label">&nbsp;</label>
                            <div class="col-md-9 col-sm-9">
                                <button type="submit" name="edit" class="btn btn-success">SIMPAN</button>
                                <a href="<?php echo base_url('Dashboard/M_pengaduan') ?>" type="button"
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
    <script src="<?php echo base_url('docs/admin/assets/plugins/select2/js/select2.full.min.js') ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('docs/admin/assets/plugins/select2/css/select2.min.css') ?>">
    <link rel="stylesheet"
        href="<?php echo base_url('docs/admin/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
    <script src="<?php echo base_url('docs/admin/assets/plugins/parsleyjs/dist/parsley.min.js') ?>"></script>

    <script src="<?php echo base_url()?>/docs/admin/assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
    <script src="<?php echo base_url()?>/docs/admin/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js"></script>
    <script src="<?php echo base_url()?>/docs/admin/assets/plugins/clipboard/dist/clipboard.min.js"></script>
    <script src="<?php echo base_url()?>/docs/admin/assets/js/demo/form-plugins.demo.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
     <!-- Script dropdown -->
    <script type="text/javascript">
    $(function() {
        $('#id_web').select2({
            placeholder: "Pilih Pengguna Web",
            theme: 'bootstrap4',
            ajax: {
                url: '<?php echo base_url('Dashboard/M_pengaduan/data_web'); ?>',
                dataType: 'json'
            }
        });
        $('#id_pengguna_apps').select2({
            placeholder: "Pilih Pengguna Apps",
            theme: 'bootstrap4',
            ajax: {
                url: '<?php echo base_url('Dashboard/M_pengaduan/data_pengguna_apps'); ?>',
                dataType: 'json'
            }
        });
        $('#id_kategori_pengaduan').select2({
            placeholder: "Pilih Kategori Pengaduan",
            theme: 'bootstrap4',
            ajax: {
                url: '<?php echo base_url('Dashboard/M_pengaduan/data_kategori_pengaduan'); ?>',
                dataType: 'json'
            }
        });


        var isi = document.getElementById("id_pengaduan").value;
        $.getJSON('<?php echo base_url('Dashboard/M_pengaduan/data_edit_dropdown'); ?>' + '/' + isi, {},
            function(json) {
                $('#id_web').append('<option selected value="' + json.id_web + '">' + json.nama_web +
                    '</option>');
                $('#id_web').select2('data', {
                    id: json.id_web,
                    text: json.nama_web
                });
                $('#id_web').trigger('change');

                $('#id_pengguna_apps').append('<option selected value="' + json.id_pengguna_apps + '">' + json.nama_lengkap_apps +
                    '</option>');
                $('#id_pengguna_apps').select2('data', {
                    id: json.id_pengguna_apps,
                    text: json.nama_lengkap_apps
                });
                $('#id_pengguna_apps').trigger('change');

                 $('#id_kategori_pengaduan').append('<option selected value="' + json.id_kategori_pengaduan + '">' + json.nama_kategori_pengaduan +
                    '</option>');
                $('#id_kategori_pengaduan').select2('data', {
                    id: json.id_kategori_pengaduan,
                    text: json.nama_kategori_pengaduan
                });
                $('#id_kategori_pengaduan').trigger('change');
            });
    })
    </script>
    <!-- ================== END PAGE LEVEL JS ================== -->

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