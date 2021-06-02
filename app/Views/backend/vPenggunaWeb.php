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
            <!-- <p class="alert alert-success" id="pemberitahuan"><?php echo $session->getFlashdata('sukses'); ?></p> -->
            <?php } ?>
            <!-- begin breadcrumb -->
            <ol class="breadcrumb float-xl-right">
                <a href="<?php echo base_url('Dashboard/M_pengguna_web/form_tambah') ?>" type="button"
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
                                        <th class="text-nowrap">Username</th>
                                        <th class="text-nowrap">Nama Pengguna Web</th>
                                        <th class="text-nowrap">Email</th>
                                        <th class="text-nowrap">Alamat</th>
                                        <th class="text-nowrap">No Telp</th>
                                        <th class="text-nowrap">Foto</th>
                                        <th class="text-nowrap">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($web as $item) {
                                    ?>
                                    <tr>
                                        <td width="1%"><?= $no++; ?></td>
                                        <td><?= $item['USERNAME_WEB']; ?></td>
                                        <td><?= $item['NAMA_WEB']; ?></td>
                                        <td><?= $item['EMAIL_WEB']; ?></td>
                                        <td><?= $item['ALAMAT_WEB']; ?></td>
                                        <td><?= $item['NO_TELP_WEB']; ?></td>
                                        <td>
                                            <center>
                                                <img class="img-rounded" style="width: 60px; height: 80px;" src="<?= 'http://smartapps.tamif2021.my.id/api_smartapps/' . $item['FOTO_WEB']; ?>">
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <a href="<?php base_url() ?>M_pengguna_web/detail_pengguna_web/<?php echo $item['ID_WEB']; ?>" class="btn btn-circle btn-edit btn-warning"><i
                                                class="fa fa-pen"></i></a>
                                                <a href="" type="button" onclick="Hapus(<?= $item['ID_WEB']; ?>)" class="btn btn-circle btn-danger" id="btn-delete" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></a>
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
        <form action="<?php echo base_url('Dashboard/M_pengguna_web/delete_pengguna_web'); ?>" method="post">
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
                            <input type="hidden" name="id_web" class="id_web">
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
            $('.id_web').val(id);
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