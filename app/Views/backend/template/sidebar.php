<?php
$uri = service('uri');
$session = session();
?>
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image">
                        <center>
                            <img
                                src="<?= 'http://localhost/api_smartapps//public/' . $session->get('foto_login'); ?>" />
                        </center>
                    </div>
                    <div class="info">
                        <b></b><?= $session->get('nama_login'); ?>
                        <small><?= $session->get('level_login'); ?></small>
                    </div>
                </a>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
            <li class="nav-header">Navigation</li>
            <li class="<?php
                        if ($uri->getSegment(2) == 'Dashboard') {
                            echo "active";
                        } ?>">
                <a href="<?php echo base_url('public/Dashboard/Dashboard'); ?>">
                    <i class="fa fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="has-sub <?php
                                if (
                                    $uri->getSegment(2) == 'M_kategori_tempat' || $uri->getSegment(2) == 'M_tempat' ||
                                    $uri->getSegment(2) == 'M_pengguna_apps' || $uri->getSegment(2) == 'M_pengguna_web' ||
                                    $uri->getSegment(2) == 'M_kategori_pengaduan' || $uri->getSegment(2) == 'M_pengaduan' ||
                                    $uri->getSegment(2) == 'M_komentar'
                                ) {
                                    echo "active";
                                } ?>">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="material-icons">list</i>
                    <span>Manajemen</span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php
                                if ($uri->getSegment(2) == 'M_kategori_tempat') {
                                    echo "active";
                                } ?>"><a href="<?php echo base_url('public/Dashboard/M_kategori_tempat'); ?>">
                            <i class="fas fa-map-marker-alt"></i> &nbsp;Kategori Tempat</a>
                    </li>
                    <li class="<?php
                                if ($uri->getSegment(2) == 'M_tempat') {
                                    echo "active";
                                } ?>"><a href="<?php echo base_url('public/Dashboard/M_tempat'); ?>">
                            <i class="fa fa-map-marker"></i> &nbsp;Tempat</a>
                    </li>
                    <li class="<?php
                                if ($uri->getSegment(2) == 'M_pengguna_apps') {
                                    echo "active";
                                } ?>"><a href="<?php echo base_url('public/Dashboard/M_pengguna_apps'); ?>">
                            <i class="fa fa-mobile"></i> &nbsp;Pengguna Android</a>
                    </li>
                    <li class="<?php
                                if ($uri->getSegment(2) == 'M_pengguna_web') {
                                    echo "active";
                                } ?>"><a href="<?php echo base_url('public/Dashboard/M_pengguna_web'); ?>">
                            <i class="fa fa-desktop"></i> &nbsp;Pengguna Web</a>
                    </li>
                    <li class="<?php
                                if ($uri->getSegment(2) == 'M_kategori_pengaduan') {
                                    echo "active";
                                } ?>"><a href="<?php echo base_url('public/Dashboard/M_kategori_pengaduan'); ?>">
                            <i class="fa fa-folder-open"></i> &nbsp;Kategori Pengaduan</a>
                    </li>
                    <li class="<?php
                                if ($uri->getSegment(2) == 'M_pengaduan') {
                                    echo "active";
                                } ?>"><a href="<?php echo base_url('public/Dashboard/M_pengaduan'); ?>">
                            <i class="fa fa-folder"></i> &nbsp;Pengaduan</a>
                    </li>
                    <li class="<?php
                                if ($uri->getSegment(2) == 'M_komentar') {
                                    echo "active";
                                } ?>"><a href="<?php echo base_url('public/Dashboard/M_komentar'); ?>">
                            <i class="fa fa-comments"></i> &nbsp;Komentar</a>
                    </li>
                </ul>
            </li>
            <li class="has-sub <?php
                                if ($uri->getSegment(2) == 'M_validasi_tempat' || $uri->getSegment(2) == 'M_validasi_pengaduan') {
                                    echo "active";
                                } ?>">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="material-icons">assignment</i>
                    <span>Validasi</span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php
                                if ($uri->getSegment(2) == 'M_validasi_tempat') {
                                    echo "active";
                                } ?>"><a href="<?php echo base_url('public/Dashboard/M_validasi_tempat'); ?>">
                            <i class="fas fa-check"></i> &nbsp;Validasi Tempat</a>
                    </li>
                    <li class="<?php
                                if ($uri->getSegment(2) == 'M_validasi_pengaduan') {
                                    echo "active";
                                } ?>"><a href="<?php echo base_url('public/Dashboard/M_validasi_pengaduan'); ?>">
                            <i class="fa fa-check-circle"></i> &nbsp;Validasi Pengaduan</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>