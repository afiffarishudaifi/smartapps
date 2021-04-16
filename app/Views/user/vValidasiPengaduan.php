<!DOCTYPE html>
<html lang="en">

<?= $this->include("user/template/head") ?>

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
        <?= $this->include("user/template/header") ?>
        <!-- end #header -->

        <!-- begin #sidebar -->
        <?= $this->include("user/template/sidebar") ?>
        <!-- end #sidebar -->

        <!-- begin #content -->
        <div id="content" class="content">
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
                            <table id="data-table-responsive" style="width: 100%"
                                class="table table-striped table-bordered table-td-valign-middle">
                                <thead>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th class="text-nowrap">Nama Pengguna Apps</th>
                                        <th class="text-nowrap">Kategori Pengaduan</th>
                                        <th class="text-nowrap">Isi Pengaduan</th>
                                        <th class="text-nowrap">Waktu Pengaduan</th>
                                        <th class="text-nowrap">Foto Kejadian</th>
                                        <th class="text-nowrap">Status Pengaduan</th>
                                        <th class="text-nowrap">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pengaduan as $item) {
                                    ?>
                                    <tr>
                                        <td width="1%"><?= $no++; ?></td>
                                        <td><?= $item['NAMA_LENGKAP_APPS']; ?></td>
                                        <td><?= $item['NAMA_KATEGORI_PENGADUAN']; ?></td>
                                        <td><?= $item['ISI_PENGADUAN']; ?></td>
                                        <td><?= $item['WAKTU_PENGADUAN']; ?></td>
                                        <td>
                                            <center>
                                                <img class="img-rounded" style="width: 60px; height: 80px;"
                                                    src="<?= 'http://localhost/api_smartapps/' . $item['FOTO_PENGADUAN']; ?>">
                                            </center>
                                        </td>
                                        <td><?= $item['STATUS_PENGADUAN']; ?></td>
                                        <td>
                                            <center>
                                                <?php if ($item['STATUS_PENGADUAN'] != 'Penanganan') { ?>
                                                <a href="" type="button"
                                                    onclick="validasi_penanganan(<?= $item['ID_PENGADUAN']; ?>)"
                                                    class="btn btn-success" data-toggle="modal"
                                                    data-target="#validasiModal">Penanganan</a>
                                                <?php } else { ?>
                                                <a href="" type="button"
                                                    onclick="validasi_selesai(<?= $item['ID_PENGADUAN']; ?>)"
                                                    class="btn btn-dark" data-toggle="modal"
                                                    data-target="#validasiModalSelesai">Selesai</a>
                                                <?php } ?>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
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

        <!-- Modal penanganan Class-->
        <form action="<?php echo base_url('User/M_validasi/validasi_pengaduan'); ?>" method="post">
            <div class="modal fade" id="validasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Validasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <h4>Apakah ingin menangani pengaduan ini?</h4>

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_pengaduan" class="id_pengaduan">
                            <input type="hidden" name="status_pengaduan" class="status_pengaduan" value="Penanganan">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tangani</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Modal penanganan Class-->

        <!-- Modal Selesai Class-->
        <form action="<?php echo base_url('User/M_validasi/validasi_pengaduan'); ?>" method="post">
            <div class="modal fade" id="validasiModalSelesai" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Validasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <h4>Apakah ingin mengkonfirmasi selesai pengaduan ini?</h4>

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_pengaduan" class="id_pengaduan">
                            <input type="hidden" name="status_pengaduan" class="status_pengaduan" value="Selesai">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Selesai</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Modal Selesai Class-->

        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
            data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
    function validasi_penanganan(id) {
        // Set data to Form Edit
        $('.id_pengaduan').val(id);
        // Call Modal Edit
        $('#validasiModal').modal('show');
    };

    function validasi_selesai(id) {
        // Set data to Form Edit
        $('.id_pengaduan').val(id);
        // Call Modal Edit
        $('#validasiModalSelesai').modal('show');
    };
    </script>

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?= base_url() ?>/docs/admin/assets/js/app.min.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/js/theme/google.min.js"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js">
    </script>
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js">
    </script>
    <script
        src="<?= base_url() ?>/docs/admin/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
    </script>
    <script src="<?= base_url() ?>/docs/admin/assets/js/demo/table-manage-responsive.demo.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/plugins/gritter/js/jquery.gritter.js"></script>
    <script src="<?= base_url() ?>/docs/admin/assets/js/demo/ui-gritter.js"></script>
    <script type="text/javascript">
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