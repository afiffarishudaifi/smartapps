<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8" />
<link rel="icon" type="image/png" href="<?= base_url()?>/public/docs/admin/assets/img/foto_logo/logo.png">
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
<link href="<?php echo base_url('/docs/admin/assets/plugins/jvectormap-next/jquery-jvectormap.css'); ?>"
    rel="stylesheet" />
<link href="<?php echo base_url('/docs/admin/assets/plugins/gritter/css/jquery.gritter.css'); ?>" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->
<!-- daterange picker -->
<link rel="stylesheet" href="<?= base_url() ?>/docs/admin/assets/plugins/daterangepicker/daterangepicker.css">
<link href="<?= base_url() ?>/docs/admin/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
<link href="<?= base_url() ?>/docs/admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.css"
    rel="stylesheet" />

<!-- daterange picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!-- Mapbox -->
<script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />

<body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show">
        <span class="spinner"></span>
    </div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container"
        class="fade page-sidebar-fixed page-header-fixed page-with-wide-sidebar page-with-light-sidebar page-sidebar-minified">
        <!-- begin #header -->
        <?= $this->include("backend/template/header") ?>
        <!-- end #header -->

        <!-- begin #sidebar -->
        <?= $this->include("backend/template/sidebar") ?>
        <!-- end #sidebar -->

        <!-- begin #content -->
        <div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb float-xl-right">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Dashboard</h1>
            <!-- end page-header -->

            <!-- begin row -->
            <div class="row">
                <!-- begin col-3 -->
                <div class="col-xl-3 col-md-6">
                    <div class="widget widget-stats bg-red">
                        <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                        <div class="stats-info">
                            <h4>TOTAL PENERIMA PENGADUAN</h4>
                            <p><?= $total_web; ?></p>
                        </div>
                        <div class="stats-link">
                            <a href="<?= base_url()?>/public/Dashboard/M_pengguna_web">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-xl-3 col-md-6">
                    <div class="widget widget-stats bg-orange">
                        <div class="stats-icon"><i class="fas fa-paper-plane"></i></div>
                        <div class="stats-info">
                            <h4>PENGAJUAN TEMPAT</h4>
                            <p><?= $total_tempat_pengajuan; ?></p>
                        </div>
                        <div class="stats-link">
                            <a href="<?= base_url()?>/public/Dashboard/M_validasi_tempat">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-xl-3 col-md-6">
                    <div class="widget widget-stats bg-yellow">
                        <div class="stats-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="stats-info">
                            <h4>TEMPAT TERKONFIRMASI</h4>
                            <p><?= $total_tempat_terkonfirmasi; ?></p>
                        </div>
                        <div class="stats-link">
                            <a href="<?= base_url()?>/public/Dashboard/M_tempat">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-xl-3 col-md-6">
                    <div class="widget widget-stats bg-green">
                        <div class="stats-icon"><i class="fa fa-question"></i></div>
                        <div class="stats-info">
                            <h4>PENGAJUAN PENGADUAN</h4>
                            <p><?= $total_pengaduan_pengajuan; ?></p>
                        </div>
                        <div class="stats-link">
                            <a href="<?= base_url()?>/public/Dashboard/Dashboard/detail_pengaduan/Pengajuan">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
            </div>
            <!-- end row -->
            <!-- begin row -->
            <div class="row">
                <!-- begin col-3 -->
               <div class="col-xl-3 col-md-6">
                    <div class="widget widget-stats bg-indigo">
                        <div class="stats-icon"><i class="fa fa-check-circle"></i></div>
                        <div class="stats-info">
                            <h4>PENGADUAN TERKONFIRMASI</h4>
                            <p><?= $total_pengaduan_terkonfirmasi; ?></p>
                        </div>
                        <div class="stats-link">
                            <a href="<?= base_url()?>/public/Dashboard/Dashboard/detail_pengaduan/Terkonfirmasi">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-xl-3 col-md-6">
                    <div class="widget widget-stats bg-blue">
                        <div class="stats-icon"><i class="fa fa-minus-circle"></i></div>
                        <div class="stats-info">
                            <h4>PENGADUAN DITOLAK</h4>
                            <p><?= $total_pengaduan_ditolak; ?></p>
                        </div>
                        <div class="stats-link">
                            <a href="<?= base_url()?>/public/Dashboard/M_pengaduan/detail_pengaduan/Ditolak">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
               <div class="col-xl-3 col-md-6">
                    <div class="widget widget-stats bg-purple">
                        <div class="stats-icon"><i class="fa fa-hourglass-half"></i></div>
                        <div class="stats-info">
                            <h4>PENGADUAN DITANGANI</h4>
                            <p><?= $total_pengaduan_penanganan; ?></p>
                        </div>
                        <div class="stats-link">
                            <a href="<?= base_url()?>/public/Dashboard/Dashboard/detail_pengaduan/Penanganan">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
               <div class="col-xl-3 col-md-6">
                    <div class="widget widget-stats bg-aqua">
                        <div class="stats-icon"><i class="fa fa-thumbs-up"></i></div>
                        <div class="stats-info">
                            <h4>PENGADUAN SELESAI</h4>
                            <p><?= $total_pengaduan_selesai; ?></p>
                        </div>
                        <div class="stats-link">
                            <a href="<?= base_url()?>/public/Dashboard/Dashboard/detail_pengaduan/Selesai">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
            </div>
            <!-- end row -->
            <!-- begin row -->
            <div class="row">
                <!-- begin col-8 -->
                <div class="col-xl-12">
                    <!-- begin panel -->
                    <div class="panel panel-primary" data-sortable-id="index-1">
                        <div class="panel-heading">
                            <h4 class="panel-title" id="title_range">Data Pengaduan Harian <?= $range; ?></h4>
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
                        <div class="panel-body pr-1">
                            <form action="<?php echo base_url('public/Dashboard/Dashboard') ?>" method="POST"
                                id="filter_form">
                                <?= csrf_field(); ?>
                                <div class="form-row">
                                    <div class="d-sm-flex align-items-center mb-5">
                                        <a href="#" class="btn btn-inverse mr-2 text-truncate" id="daterange">
                                            <i class="fa fa-calendar fa-fw ml-n1"></i>
                                            <input type="text" class="btn btn-inverse text-truncate" id="isi_tanggal"
                                                name="daterange" value="<?= $range; ?>" / readonly>
                                            <b class="caret"></b>
                                        </a>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- statistik -->
                        <?php
                        foreach ($pengaduan as $data) {
                            $tanggal[] = $data['WAKTU_PENGADUAN'];
                            $jml[] = $data['ID_PENGADUAN'];
                        }
                            // $jml = implode(" ",$jml);

                            // echo json_encode($jml);
                        ?>
                        <div class="col-xl-12">
                            <!-- begin panel -->
                            <div>
                                <canvas id="line-chart" data-render="chart-js"></canvas>
                            </div>
                            <!-- end panel -->
                        </div>
                    </div>
                </div>
                <!-- end panel -->
            </div>
            <!-- end row -->
        </div>
        <!-- end #content -->

        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
            data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->

    <!-- JS -->
    <?= $this->include("backend/template/js") ?>
    <!-- END JS -->

    <script>
    Chart.defaults.global.defaultFontColor = COLOR_DARK;
    Chart.defaults.global.defaultFontFamily = FONT_FAMILY;
    Chart.defaults.global.defaultFontStyle = FONT_WEIGHT;
    var lineChartData = {
        labels: <?php echo json_encode($tanggal); ?> ,
        datasets : [{
            label: 'Pengaduan',
            borderColor: COLOR_BLUE,
            pointBackgroundColor: COLOR_BLUE,
            pointRadius: 2,
            borderWidth: 2,
            backgroundColor: COLOR_BLUE_TRANSPARENT_3,
            data: <?php echo json_encode($jml); ?>
        }]
    };
    var handleChartJs = function() {
        var ctx = document.getElementById('line-chart').getContext('2d');
        var lineChart = new Chart(ctx, {
            type: 'line',
            data: lineChartData
        });
    };
    var ChartJs = function() {
        "use strict";
        return {
            //main function
            init: function() {
                handleChartJs();
            }
        };
    }();

    $(document).ready(function() {
        ChartJs.init();
    });
    </script>

    <script type="text/javascript">
    $(function() {
        $('#daterange').daterangepicker({
            autoUpdateInput: true,
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#daterange').on('apply.daterangepicker', function(ev, picker) {
            $('input[name="daterange"]').val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker
                .endDate.format('YYYY-MM-DD'));
            filter_form.submit();

        });

        $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
            $('input[name="daterange"]').val('');
            filter_form.submit();
        });

    });
    </script>
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/moment_/min/moment.min.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/js/demo/dashboard-v3.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        setInterval(function() {
            $.ajax({
                url: "<?= base_url() ?>/public/Dashboard/Dashboard/jumlah_pengajuan",
                type: "POST",
                dataType: "json",
                data: {},
                success: function(data) {
                    $('#total_tempat').html(data.total_tempat);
                    $('#total_pengaduan').html(data.total_pengaduan);
                }
            })
        }, 10000)
    })
    </script>
</body>

</html>