<!DOCTYPE html>
<html lang="en">
<head>
	<?= $this->include("frontend/template/head"); ?>
</head>
<body data-spy="scroll" data-target="#header" data-offset="51">
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-inverse navbar-fixed-top navbar-expand-lg">
			<!-- begin container -->
			<div class="container">
				<!-- begin navbar-brand -->
				<a href="<?= base_url()?>/Frontend/Frontend" class="navbar-brand">
					<span class="brand-logo">
						<img src="<?= base_url()?>/docs/admin/assets/img/foto_logo/logo.png">
					</span>
					<span class="brand-text">
						<span class="">Simpeldat</span>
					</span>
				</a>
				<!-- end navbar-brand -->
				<!-- begin navbar-toggle -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- end navbar-header -->
				<!-- begin navbar-collapse -->
				<div class="collapse navbar-collapse" id="header-navbar">
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item dropdown">
							<a class="nav-link" href="<?= base_url()?>/Frontend/Frontend">BERANDA</b></a>
						</li>
						<li class="nav-item"><a class="nav-link" href="<?= base_url()?>/Dashboard/Login">LOGIN</a></li>
					</ul>
				</div>
				<!-- end navbar-collapse -->
			</div>
			<!-- end container -->
		</div>
		<!-- end #header -->

		<!-- begin #pengaduan -->

		<div id="pengaduan" class="content" data-scrollview="true">
			<!-- begin container -->
			<div class="container">
				<br><br>
				<h2 class="content-title">Riwaya Pengaduan Masyarakat</h2>
				<br>
				<?php
                foreach ($pengaduan as $item) {
                ?>
				<div class="row row-space-10">
					<div class="col-lg-12 col-md-12">
						<div class="work">
								<h3><?= $item['JUDUL_PENGADUAN']; ?></h3>
								<div class="post-by">
									Posted By admin <span class="divider">|</span> <?= $item['WAKTU_PENGADUAN']; ?>
								</div>
								<span class="desc-text"><?= $item['ISI_PENGADUAN']; ?></span>

							<br><br>

							<div class="image">
								<img src="<?= 'http://smartapps.tamif2021.my.id/api_smartapps/' . $item['FOTO_PENGADUAN']; ?>" alt="Work 1" style="width: 20%; height: 20%" />
							</div>

						</div>
					</div>
				</div>

			<?php } ?>
				<br><br>
				<center>
					<?= $pager->links('t_pengaduan', 'pengaduan_pagination') ?>
				</center>
			</div>
			<!-- end container -->
		</div>
		<!-- end #pengaduan -->

		<!-- begin #footer -->
		<?= $this->include("frontend/template/footer"); ?>
		<!-- end #footer -->
	</div>
	<!-- end #page-container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= base_url() ?>/docs/frontend/assets/js/one-page-parallax/app.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</body>
</html>
