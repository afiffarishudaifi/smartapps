<!DOCTYPE html>
<html lang="en">

<?= $this->include("backend/template/head") ?>

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
            if ($session->getFlashdata('sukses')) { ?>
            <input type="hidden" name="pemberitahuan" id="pemberitahuan"
                value="<?php echo $session->getFlashdata('sukses'); ?>">
            <?php } ?>
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
                            <table id="data-table-responsive" style="width: 100%" class="table table-striped table-bordered table-td-valign-middle">    
                                <thead>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th class="text-nowrap">Nama</th>
                                        <th class="text-nowrap">Alamat</th>
                                        <th class="text-nowrap">Longitude</th>
                                        <th class="text-nowrap">Langitude</th>
                                        <th class="text-nowrap">Status</th>
                                        <th class="text-nowrap">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($tempat as $item) {
                                    ?>
                                    <tr>
                                        <td width="1%"><?= $no++; ?></td>
                                        <td><?= $item['NAMA_TEMPAT']; ?></td>
                                        <td><?= $item['ALAMAT_TEMPAT']; ?></td>
                                        <td><?= $item['LONG_TEMPAT']; ?></td>
                                        <td><?= $item['LAT_TEMPAT']; ?></td>
                                        <td><?= $item['STATUS_TEMPAT']; ?></td>
                                        <td>
                                            <center>
                                                <a href="<?php base_url() ?>M_foto_tempat/view/<?php echo $item['ID_TEMPAT']; ?>" class="btn btn-circle btn-edit btn-aqua"><i
                                                class="fas fa-file-image"></i></a>
                                                <a href="" type="button" onclick="validasi(<?= $item['ID_TEMPAT']; ?>)" class="btn btn-circle btn-success" data-toggle="modal" data-target="#validasieModal"><i class="fa fa-check"></i></a>
                                                <a href="" type="button"
                                                    onclick="validasi_hapus(<?= $item['ID_TEMPAT']; ?>)"
                                                    class="btn btn-circle btn-danger"
                                                    data-toggle="modal" data-target="#validasieHapus"><i
                                                        class="fa fa-ban"></i></a>
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

        <!-- Modal Validasi Class-->
        <form action="<?php echo base_url('Dashboard/M_validasi_tempat/validasi_tempat'); ?>" method="post">
            <div class="modal fade" id="validasieModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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

                            <h4>Apakah ingin mengkonfirmasi tempat ini?</h4>

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_tempat" class="id_tempat">
                            <input type="hidden" name="status_tempat" class="status_tempat" value="Terkonfirmasi">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Validasi</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Modal Validasi Class-->

         <!-- Modal Validasi Class-->
        <form action="<?php echo base_url('Dashboard/M_validasi_tempat/validasi_tempat'); ?>" method="post">
            <div class="modal fade" id="validasieHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Tidak Tervalidasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <h4>Apakah ingin menghapus pengajuan tempat ini?</h4>

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_tempat" class="id_tempat">
                            <input type="hidden" name="status_tempat" class="status_tempat" value="Ditolak">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Modal Validasi Class-->

        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
            data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
    function validasi(id){
        $('.id_tempat').val(id);
        $('#validasiModal').modal('show');
    };
    function validasi_hapus(id){
        $('.id_tempat').val(id);
        $('#validasieHapus').modal('show');
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
    <!-- ================== END PAGE LEVEL JS ================== -->
</body>

</html>