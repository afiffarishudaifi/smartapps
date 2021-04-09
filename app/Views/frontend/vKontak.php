
		<div id="contact" class="content" data-scrollview="true">
			<!-- begin container -->
			<div class="container">
				<h2 class="content-title"> Kontak</h2>
				<p class="content-desc">
						Jika kamu memiliki sebuah pertanyaan, saran dan semua hal yang ingin disampaikan kepada pengembang<br \> aplikasi
						"Simpel Dasar", bisa kirim pesan melalui form dibawah ini.
				</p>
				<!-- begin row -->
				<div class="row">
					<!-- begin col-6 -->
					<div class="col-lg-6" data-animation="true" data-animation-type="fadeInLeft">
						
							<h3>If you have a project you would like to discuss, get in touch with us.</h3>
							<p>
								Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor a purus.
							</p>
							<p>
								<strong>SeanTheme Studio, Inc</strong><br />
								795 Folsom Ave, Suite 600<br />
								San Francisco, CA 94107<br />
								P: (123) 456-7890<br />
							</p>
							<p>
								<span class="phone">+11 (0) 123 456 78</span><br />
								<a href="mailto:hello@emailaddress.com" class="text-primary">seanthemes@support.com</a>
							</p>
					</div>
					<!-- end col-6 -->
					<!-- begin col-6 -->
					<div class="col-lg-6 form-col" data-animation="true" data-animation-type="fadeInRight">

					<?php $session = session();
			            if ($session->getFlashdata('error')) { ?>
			            <div class="alert alert-danger m-b-0">
			                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                <h5><i class="fa fa-info-circle"></i> PERINGATAN!</h5>
			                <p><?php echo $session->getFlashdata('error'); ?></p>
			            </div>
			        <?php } ?>
						<form class="form-horizontal" action="<?php echo base_url('public/frontend/Frontend/send_mail') ?>" method="post" data-parsley-validate="true">
								<div class="form-group row m-b-15">
									<label class="col-form-label col-lg-3 text-lg-right">Nama <span class="text-primary">*</span></label>
									<div class="col-lg-9">
										<input type="text" name="nama" id="nama" class="form-control" data-parsley-required="true" />
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-lg-3 text-lg-right">Email <span class="text-primary">*</span></label>
									<div class="col-lg-9">
										<input type="text" name="email" id="email" class="form-control" data-parsley-required="true" />
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-lg-3 text-lg-right">Pesan <span class="text-primary">*</span></label>
									<div class="col-lg-9">
										<textarea class="form-control" name="komentar" id="komentar" rows="10" data-parsley-required="true"></textarea>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-form-label col-lg-3 text-lg-right"></label>
									<div class="col-lg-9 text-left">
										<button type="submit" class="btn btn-theme btn-primary btn-block">Kirim Pesan</button>
									</div>
								</div>
						</form>
					</div>
					<!-- end col-6 -->
				</div>
				<!-- end row -->
			</div>
			<!-- end container -->
		</div>