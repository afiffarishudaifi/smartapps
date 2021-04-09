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
            <!-- begin breadcrumb -->
            <ol class="breadcrumb float-xl-right">
                <a href="<?php echo base_url('public/Dashboard/M_pengguna_apps/form_tambah') ?>" type="button"
                    class="btn btn-success mb-2"><i class="fas fa-plus"></i> Tambah Data</a>
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
                                        <th class="text-nowrap">KTP</th>
                                        <th class="text-nowrap">Username</th>
                                        <th class="text-nowrap">Nama Lengkap</th>
                                        <th class="text-nowrap">Email</th>
                                        <th class="text-nowrap">Alamat</th>
                                        <th class="text-nowrap">No HP</th>
                                        <th class="text-nowrap">Foto Pengguna</th>
                                        <th class="text-nowrap">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($apps as $item) {
                                    ?>
                                    <tr>
                                        <td width="1%"><?= $no++; ?></td>
                                        <td><?= $item['KTP']; ?></td>
                                        <td><?= $item['USERNAME_PENGGUNA_APPS']; ?></td>
                                        <td><?= $item['NAMA_LENGKAP_APPS']; ?></td>
                                        <td><?= $item['EMAIL_PENGGUNA_APPS']; ?></td>
                                        <td><?= $item['ALAMAT_PENGGUNA_APPS']; ?></td>
                                        <td><?= $item['NO_HP_PENGGUNA_APPS']; ?></td>
                                        <td>
                                            <center>
                                                <img class="img-rounded" style="width: 60px; height: 80px;" src="<?= 'http://localhost/api_smartapps//public/' . $item['FOTO_PENGGUNA_APPS']; ?>">
                                            </center>
                                        <td>
                                            <center>
                                                <a href="<?php base_url() ?>M_pengguna_apps/detail_pengguna_apps/<?php echo $item['ID_PENGGUNA_APPS']; ?>" class="btn btn-circle btn-edit btn-warning"><i
                                                class="fa fa-pen"></i></a>

                                                <button type="button" onclick="Hapus(<?= $item['ID_PENGGUNA_APPS']; ?>)" class="btn btn-circle btn-danger" id="btn-delete" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></button>
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

        <!-- Modal Delete Class-->
        <form action="<?php echo base_url('public/Dashboard/M_pengguna_apps/delete_pengguna_apps'); ?>" method="post">
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <h4>Apakah Ingin menghapus Pengguna ini?</h4>

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_pengguna" class="id_pengguna">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Modal Delete Class-->

        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
            data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
    function Hapus(id){
            $('.id_pengguna').val(id);
            $('#deleteModal').modal('show');
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
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
</body>

</html>