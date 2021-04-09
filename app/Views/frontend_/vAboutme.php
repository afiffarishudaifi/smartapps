<!DOCTYPE html>
<html lang="en">
        <?= $this->include("frontend/template/head"); ?>
<body>
	<!-- begin #header -->
        <?= $this->include("frontend/template/header"); ?>
	<!-- end #header -->
	
	<!-- begin #page-title -->
	<div id="page-title" class="page-title has-bg">
		<div class="bg-cover" data-paroller="true" data-paroller-factor="0.5" data-paroller-factor-xs="0.2" style="background: url(<?= base_url() ?>/docs/frontend/assets/img/cover/cover-7.jpg) center 0px / cover no-repeat"></div>
		<div class="container">
			<h1>Official Color Admin Blog</h1>
			<p>Blog Concept Front End Page</p>
		</div>
	</div>
	<!-- end #page-title -->
	
	<!-- begin #content -->
	<div id="content" class="content">
		<!-- begin container -->
		<div class="container">
			<!-- begin row -->
			<div class="row row-space-30">
				<!-- begin col-12 -->
				<div class="col-lg-12">
					<!-- begin section-container -->
					<div class="section-container">
						<div class="post-image">
							<div class="post-image-cover" style="background-image: url(<?= base_url() ?>/docs/frontend/assets/img/about/about-me.jpg)"></div>
						</div>
						<h3 class="about-me-title">Simpel Dasar</h3>
						<p class="about-me-desc" style="text-align: justify;">
							Simpel dasar kepanjangan dari Sistem Pengolahan Data Smartapps dan E-Complaint berbasis website.
							Aplikasi ini merupakan sebuah aplikasi yang dikembang untuk dapat mengelola sebuah pengaduan yang
							dilakukan oleh masyarakat. Selain untuk mengelola sebuah pengaduan, sistem ini juga memiliki
							fitur untuk dapat mengelola data yang digunakan oleh aplikasi SmartApps Berbasis Android. Tujuan dibuat
							dari aplikasi ini : 
							<br>
							<br>
							1. Pengaduan lebih cepat di proses
							<br><br>
							2. Pengaduan langsung ditujukan kepada pihak terkait
							<br><br>
							3. Meningkatkan pelayanan kepada masyarakat
						</p>
					</div>
					<!-- end section-container -->
				</div>
				<!-- end col-12 -->
			</div>
			<!-- end row -->
		</div>
		<!-- end container -->
	</div>
	<!-- end #content -->
	
	<!-- begin #footer -->
        <?= $this->include("frontend/template/footer"); ?>
	<!-- end #footer -->
    
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= base_url() ?>/docs/frontend/assets/js/blog/app.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</body>
</html>