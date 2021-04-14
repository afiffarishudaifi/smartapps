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
                            <img src="<?= 'http://localhost/api_smartapps/' . $session->get('foto_login'); ?>" />
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
                <a href="<?php echo base_url('User/Dashboard'); ?>">
                    <i class="fa fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="has-sub <?php
                if ($uri->getSegment(2) == 'M_kategori_pengaduan' || $uri->getSegment(2) == 'M_pengaduan') {
                    echo "active";
                } ?>">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="material-icons">list</i>
                    <span>Manajemen</span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php
                            if ($uri->getSegment(2) == 'M_kategori_pengaduan') {
                                echo "active";
                            } ?>"><a href="<?php echo base_url('User/M_kategori_pengaduan'); ?>">
                        <i class="fa fa-folder-open"></i> &nbsp;Kategori Pengaduan</a>
                    </li>
                    <li class="<?php
                            if ($uri->getSegment(2) == 'M_pengaduan') {
                                echo "active";
                            } ?>"><a href="<?php echo base_url('User/M_pengaduan'); ?>">
                        <i class="fa fa-folder"></i> &nbsp;Pengaduan</a>
                    </li>
                </ul>
            </li>
            <li class="has-sub <?php
                if ($uri->getSegment(2) == 'M_validasi') {
                    echo "active";
                } ?>">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="material-icons">assignment</i>
                    <span>Validasi</span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php
                            if ($uri->getSegment(2) == 'M_validasi' && $uri->getSegment(3) == '') {
                                echo "active";
                            } ?>"><a href="<?php echo base_url('User/M_validasi'); ?>">
                        <i class="fa fa-check-circle"></i> &nbsp;Validasi Pengaduan</a>
                    </li>
                    <li class="<?php
                            if ($uri->getSegment(2) == 'M_validasi' && $uri->getSegment(3) == 'index_penanganan') {
                                echo "active";
                            } ?>"><a href="<?php echo base_url('User/M_validasi/index_penanganan'); ?>">
                        <i class="fa fa-hourglass-half"></i> &nbsp;Validasi Penanganan</a>
                    </li>
                </ul>
            </li>
            <li class="<?php
                        if ($uri->getSegment(2) == 'M_laporan') {
                            echo "active";
                        } ?>">
                <a href="<?php echo base_url('User/M_laporan'); ?>">
                    <i class="fa fa-archive"></i>
                    <span>Laporan Pengaduan</span>
                </a>
            </li>
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>