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
    <link href="<?= base_url() ?>/docs/admin/assets/css/google/app.min.css" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="<?= base_url() ?>/docs/admin/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/docs/admin/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/docs/admin/assets/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/docs/admin/assets/plugins/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>/docs/admin/assets/plugins/daterangepicker/daterangepicker.css">
    <link href="<?= base_url() ?>/docs/admin//assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
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
            if ($session->getFlashdata('sukses')) { ?>
                <input type="hidden" name="pemberitahuan" id="pemberitahuan" value="<?php echo $session->getFlashdata('sukses'); ?>">
            <?php } ?>
            <!-- begin breadcrumb -->
            <ol class="breadcrumb float-xl-right">
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header"><?= $page_header; ?>
            </h1>
            <!-- end page-header -->
            <!-- begin row -->
            <div class="row">
                <!-- begin col-12 -->
                <div class="col-xl-12">
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
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Tanggal</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control float-right" id="tanggal" name="tanggal">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Kategori</label>
                                    <select id="select_kategori" name="kategori" class="form-control" style="width: 100%;" onchange="ganti(this.value,$('#select_status').val())">
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Status Pengaduan</label>
                                    <select id="select_status" name="status" class="form-control" style="width: 100%;" onchange="ganti($('#select_kategori').val(), this.value)">
                                        <option value="null">Pilih Status Pengaduan</option>
                                        <option value="Penanganan">Dalam Penanganan</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
                                </div>
                            </div>
                            <table id="data-table-combine table" style="width: 100%" class="table table-stripe table-responsive table-bordered table-td-valign-middle" width="100%">
                                <!-- <table id="table" class="table table-bordered table-responsive table-striped" width="100%"> -->
                                <thead>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th class="text-nowrap">Nama Pengguna Apps</th>
                                        <th class="text-nowrap">Judul Pengaduan</th>
                                        <th class="text-nowrap">Isi Pengaduan</th>
                                        <th class="text-nowrap">Waktu Pengaduan</th>
                                        <th class="text-nowrap">Status Pengaduan</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- end panel-body -->
                    </div>
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end #content -->

        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->
    <!-- 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?= base_url() ?>/docs/admin/assets/js/app.min.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/js/theme/google.min.js"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->

    <script src="<?= base_url() ?>/docs/admin/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/datatables.net-keytable-bs4/js/keyTable.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/pdfmake/build/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/jszip/dist/jszip.min.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/js/demo/table-manage-combine.demo.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/js/demo/table-manage-responsive.demo.js"></script>
    <!--     <script src="<?= base_url() ?>/docs/admin/assets/plugins/gritter/js/jquery.gritter.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/js/demo/ui-gritter.js"></script> -->
    <script src="<?php echo base_url('docs/admin/assets/plugins/select2/js/select2.full.min.js') ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('docs/admin/assets/plugins/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('docs/admin/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
    <!-- ================== END PAGE LEVEL JS ================== -->

    <script src="<?= base_url() ?>/docs/admin/assets/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript">
        $(function() {

            $('#tanggal').daterangepicker({
                locale: {
                    format: 'DD-MM-YYYY'
                }
            });

            $('#select_kategori').select2({
                placeholder: "Pilih Kategori",
                theme: 'bootstrap4',
                ajax: {
                    url: '<?php echo base_url('User/M_laporan/data_kategori'); ?>',
                    dataType: 'json'
                }
            });
            /* Isi Table */
            $('.table').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "ajax": {
                    "url": "<?= base_url() ?>/User/M_laporan/data/" + $('#tanggal').val() + '/' + $('#select_kategori').val() + '/' + $('#select_status').val(),
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "ID_PENGADUAN"
                    },
                    {
                        "data": "JUDUL_PENGADUAN"
                    },
                    {
                        "data": "ISI_PENGADUAN"
                    },
                    {
                        "data": "ISI_PENGADUAN"
                    },
                    {
                        "data": "WAKTU_PENGADUAN"
                    },
                    {
                        "data": "STATUS_PENGADUAN"
                    },
                ],
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            /* Isi Table */
        });

        function ganti(kategori, status) {
            $('.table').DataTable().ajax.url('<?= base_url() ?>/User/M_laporan/data/' + $('#tanggal').val() + '/' + kategori + '/' + status).load();
        };

        $('#tanggal').on('apply.daterangepicker', function(ev, picker) {
            var tanggal = picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY');
            $('.table').DataTable().ajax.url('<?= base_url() ?>/User/M_laporan/data/' + tanggal + '/' + $('#select_kategori').val() + '/' + $('#select_status').val()).load();
        });

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
</body>

</html>