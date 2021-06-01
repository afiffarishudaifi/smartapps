<!DOCTYPE html>
<html lang="en">
<head>
	<?= $this->include("frontend/template/head"); ?>
</head>
<body data-spy="scroll" data-target="#header" data-offset="51">
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
		<!-- begin #header -->
		<?= $this->include("frontend/template/header"); ?>
		<!-- end #header -->
		
		<!-- begin #home -->
		<div id="home" class="content has-bg home">
			<!-- begin content-bg -->
			<div class="content-bg" style="background-image: url(<?= base_url() ?>/docs/frontend/assets/img/bg/bg-home3.jpg);" 
				>
			</div>
			<!-- end content-bg -->
			<!-- begin container -->
			<div class="container home-content">
				<h1>Selamat Datang Di Sistem Pengelolaan Data Smartapps Dan E-Complaint</h1>
				<!-- <p>
					We have created a multi-purpose theme that take the form of One-Page or Multi-Page Version.<br />
					Use our <a href="#">theme panel</a> to select your favorite theme color.
				</p> -->
				<!-- <a href="#pengaduan" data-click="scroll-to-target" class="btn btn-theme btn-primary">Pengaduan</a> <a href="#contact" data-click="scroll-to-target" class="btn btn-theme btn-outline-white">Kontak</a><br /> -->
			</div>
			<!-- end container -->
		</div>
		<!-- end #home -->
		
		<!-- begin #about -->
		<?= $this->include("frontend/vAbout"); ?>
		<!-- end #about -->

		<!-- beign #kegunggulan -->
		<?= $this->include("frontend/vKeunggulan"); ?>
		<!-- end #keunggulan -->
		
		<!-- begin #kontak -->
		<?= $this->include("frontend/vKontak"); ?>
		<!-- end #kontak -->

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
