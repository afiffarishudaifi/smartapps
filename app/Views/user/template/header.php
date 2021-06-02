<?php $session = session(); ?>
<div id="header" class="header navbar-default">
    <!-- begin navbar-header -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed navbar-toggle-left" data-click="sidebar-minify">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="" class="navbar-brand">
            <b class="mr-1">Sistem Pengelolaan Data Smartapps</b>
        </a>
        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <!-- end navbar-header -->
    <!-- begin header-nav -->
    <ul class="navbar-nav d-flex flex-grow-1">
        <li class="navbar-form flex-grow-1">

        </li>
        <li class="">
            <a href="<?php echo base_url('User/M_validasi'); ?>" data-toggle="tooltip" data-placement="top" title="Validasi Pengaduan">
                <i class="fa fa-check-circle"></i>
                <span class="label label-primary" id="total_pengaduan"><?= $jml_pengaduan['ID_PENGADUAN']; ?></span>
            </a>
        </li>
        <li class="">
            <a href="<?php echo base_url('User/M_validasi/index_penanganan'); ?>" data-toggle="tooltip" data-placement="top" title="Validasi Penanganan">
                <i class="fa fa-hourglass-half"></i>
                <span class="label label-primary" id="total_penanganan"><?= $jml_penanganan['ID_PENGADUAN']; ?></span>
            </a>
        </li>
        <li class="dropdown navbar-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= 'http://smartapps.tamif2021.my.id/api_smartapps/' . $session->get('foto_login'); ?>" alt="" />
                <span class="d-none d-md-inline"><?= $session->get('nama_login'); ?></span> <b class="caret"></b>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="<?php echo base_url('User/M_pengaturan'); ?>" class="dropdown-item">Pengaturan</a>
                <div class="dropdown-divider"></div>
                <a href="" data-toggle="modal" data-target="#logoutModal" class="dropdown-item">Keluar</a>
            </div>
        </li>
    </ul>
    <!-- end header-nav -->
</div>

<!-- begin modal logout -->
<div class="modal" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Keluar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
      <div class="modal-body">
        <p><i class="fa fa-question-circle"></i> Apakah anda yakin ingin keluar? <br /></p>
        <div class="actionsBtns">
            <center>
                <a href="<?php echo base_url('Dashboard/Login/logout'); ?>" class="btn btn-default btn-danger">Keluar</a>
                <button class="btn btn-default" data-dismiss="modal">Batal</button>
            </center>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end modal logout -->

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
        }, 5000)
    })
    </script>