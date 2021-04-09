<!DOCTYPE html>
<html lang="en">
        <?= $this->include("frontend/template/head"); ?>
<body>
	<!-- begin #header -->
        <?= $this->include("frontend/template/header"); ?>
	<!-- end #header -->
	
	<!-- begin #page-title -->
	<div id="page-title" class="page-title has-bg">
		<div class="bg-cover" data-paroller="true" data-paroller-factor="0.5" data-paroller-factor-xs="0.2" style="background: url(<?= base_url() ?>/docs/frontend/assets/img/cover/cover-8.jpg) center 0px / cover no-repeat"></div>
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
						<div class="embed-responsive embed-responsive-16by9">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1256.6572666444163!2d111.4359573027277!3d-7.956093667095427!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e797540a131c9f5%3A0x1d0b1689f33c89b8!2sAfif%20Faris%20Hudaifi!5e0!3m2!1sid!2sid!4v1614835100585!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
							<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1151.7801351560008!2d113.72272706402558!3d-8.159755798790583!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf6c4437632474338!2sPoliteknik%20Negeri%20Jember!5e0!3m2!1sid!2sid!4v1614835791848!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
						</div>
					</div>
					 <?php $session = session();
			            if ($session->getFlashdata('error')) { ?>
			            <div class="alert alert-danger m-b-0">
			                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                <h5><i class="fa fa-info-circle"></i> PERINGATAN!</h5>
			                <p><?php echo $session->getFlashdata('error'); ?></p>
			            </div>
			            <?php } ?>
					<!-- end section-container -->
					<!-- begin section-container -->
					<div class="section-container">
						<h4 class="section-title m-b-20"><span>Kontak Kami</span></h4>
						<p class="m-b-30">
							Jika kamu memiliki sebuah pertanyaan, saran dan semua hal yang ingin disampaikan kepada pengembang aplikasi
							"Simpel Dasar", bisa kirim pesan melalui form dibawah ini.
						</p>
						<!-- begin row -->
						<div class="row row-space-30">
							<!-- begin col-8 -->
							<div class="col-md-12">
								<form class="form-horizontal" action="<?php echo base_url('public/Frontend/Contactus/send_mail') ?>" method="post" data-parsley-validate="true">
                        		<?= csrf_field(); ?>
									<div class="form-group row">
										<label class="col-form-label col-md-2 text-md-right">Nama <span class="text-danger">*</span></label>
										<div class="col-md-10">
											<input type="text" class="form-control" name="nama" id="nama" data-parsley-required="true">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-md-2 text-md-right">Email <span class="text-danger">*</span></label>
										<div class="col-md-10">
											<input type="email" class="form-control" data-parsley-type="email" name="email" id="email" data-parsley-required="true">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-md-2 text-md-right">Pesan <span class="text-danger">*</span></label>
										<div class="col-md-10">
											<textarea class="form-control" rows="10" name="komentar" id="komentar" data-parsley-required="true"></textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-md-2 text-md-right"></label>
										<div class="col-md-10 text-left">
											<button type="submit" class="btn btn-inverse btn-lg btn-block">Kirim Pesan</button>
										</div>
									</div>
								</form>
							</div>
							<!-- end col-8 -->
						</div>
						<!-- end row -->
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

    <script src="<?php echo base_url('docs/admin/assets/plugins/parsleyjs/dist/parsley.min.js') ?>"></script>
	<!-- ================== END BASE JS ================== -->
</body>
</html>