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
            <b class="mr-1">Simpel</b>
            <b class="text-blue">D</b>
            <b class="text-red">A</b>
            <b class="text-orange">S</b>
            <b class="text-blue">A</b>
            <b class="text-green">R</b>
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
        <li class="total_tempat">
            <a href="<?php echo base_url('Dashboard/M_validasi_tempat'); ?>" data-toggle="">
                <i class="fa fa-check"></i>
                <span class="label label-primary" id="total_tempat"><?= $jml_tempat['ID_TEMPAT']; ?></span>
            </a>
        </li>
        <li class="total_pengaduan">
            <a href="<?php echo base_url('Dashboard/M_validasi_pengaduan'); ?>" data-toggle="">
                <i class="fa fa-check-circle"></i>
                <span class="label label-primary" id="total_pengaduan"><?= $jml_pengaduan['ID_PENGADUAN']; ?></span>
            </a>
        </li>
        <li class="dropdown navbar-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= 'http://localhost/api_smartapps/public/' . $session->get('foto_login'); ?>" alt="" />
                <span class="d-none d-md-inline"><?= $session->get('nama_login'); ?></span> <b class="caret"></b>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="<?php echo base_url('Dashboard/M_pengaturan'); ?>" class="dropdown-item">Pengaturan</a>
                <div class="dropdown-divider"></div>
                <a href="<?php echo base_url('Dashboard/Login/logout'); ?>" class="dropdown-item">Keluar</a>
            </div>
        </li>
    </ul>
    <!-- end header-nav -->
</div>

<style>
.total_tempat:hover {
    background-color: aqua;

}

.total_pengaduan:hover {
    background-color: aqua;
}
</style>