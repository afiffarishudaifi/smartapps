<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="<?= base_url()?>/docs/admin/assets/img/foto_logo/logo.png">
    <title><?= $judul; ?></title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="<?= base_url() ?>/docs/admin/assets/css/google/app.min.css" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->
</head>
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show">
		<span class="spinner"></span>
	</div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
		<!-- begin register -->
		<div class="register register-with-news-feed">
			<!-- begin news-feed -->
			<div class="news-feed">
                <div class="news-image"
                    style="background-image: url(<?= base_url(); ?>/docs/admin/assets/img/login-bg/login.jpg)"></div>
            </div>
			<!-- end news-feed -->
			<!-- begin right-content -->
			<div class="right-content">
           
				<!-- begin register-header -->
				<h1 class="register-header">
					Lupa Katasandi
					<small>Fitur untuk melakukan reset ulang password pengguna</small>
				</h1>
				
				<?php $session = session();
	            if ($session->getFlashdata('msg')) { ?>
	            	<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <p><?php echo $session->getFlashdata('msg'); ?></p>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
	            <?php } ?>


	            <?php if ($session->getFlashdata('sukses')) { ?>
	            	<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <p><?php echo $session->getFlashdata('sukses'); ?></p>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
	            <?php } ?>
				<!-- end register-header -->
				<!-- begin register-content -->
				<div class="register-content">
					<form action="<?php echo base_url('Dashboard/Login/check') ?>" method="POST" class="margin-bottom-0" data-parsley-validate="true">
                        <?= csrf_field(); ?>
						<label class="control-label">Username <span class="text-danger">*</span></label>
						<div class="row row-space-10">
							<div class="col-md-12 m-b-15">
								<input type="text" name="username" id="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" placeholder="Username" data-parsley-required="true" value="<?= old('username'); ?>"/>
							</div>
                            <div class="invalid-feedback">
                            	<small>
                              		<?= $validation->getError('username'); ?>
                              	</small>
                            </div>
						</div>
						<label class="control-label">Email <span class="text-danger">*</span></label>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="text" name="email" id="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder="Email" data-parsley-required="true" data-parsley-type="email" value="<?= old('email'); ?>"/>
							</div>
                            <div class="invalid-feedback">
                            	<small>
                              		<?= $validation->getError('email'); ?>
                              	</small>
                            </div>
						</div>
						<label class="control-label">Password <span class="text-danger">*</span></label>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="password" name="password" id="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="Password" data-parsley-required="true" data-parsley-minlength="8" value="<?= old('password'); ?>"/>
							</div>
                            <div class="text-danger">
                            	<small>
                              		<?= $validation->getError('password'); ?>
                              	</small>
                            </div>
						</div>
						<label class="control-label">Ulangi Password <span class="text-danger">*</span></label>
						<div class="row m-b-15">
							<div class="col-md-12">
								<input type="password" name="repassword" id="repassword" class="form-control <?= ($validation->hasError('repassword')) ? 'is-invalid' : ''; ?>" placeholder="Ulangi Password" data-parsley-required="true" data-parsley-minlength="8" value="<?= old('repassword'); ?>"/>
							</div>
                            <div class="invalid-feedback">
                            	<small>
                              		<?= $validation->getError('repassword'); ?>
                              	</small>
                            </div>
						</div>
						<div class="register-buttons">
							<button type="submit" class="btn btn-primary btn-block btn-lg">Reset Password</button>
						</div>
						<div class="m-t-30 m-b-30 p-b-30">
							Sudah memiliki akun ? Click <a href="<?= base_url('Dashboard/Login')?>">Disini</a> untuk login.
						</div>
						<hr />
						<p class="text-center mb-0">
							&copy; Color Admin All Right Reserved 2020
						</p>
					</form>
				</div>
				<!-- end register-content -->
			</div>
			<!-- end right-content -->
		</div>
		<!-- end register -->

		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= base_url()?>/docs/admin/assets/js/app.min.js"></script>
	<script src="<?= base_url()?>/docs/admin/assets/js/theme/google.min.js"></script>
    <script src="<?php echo base_url('docs/admin/assets/plugins/parsleyjs/dist/parsley.min.js') ?>"></script>
</body>
</html>