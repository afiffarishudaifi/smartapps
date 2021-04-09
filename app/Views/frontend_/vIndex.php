<!DOCTYPE html>
<html lang="en">
<head>
        <?= $this->include("frontend/template/head"); ?>
<body>
	<!-- begin #header -->
        <?= $this->include("frontend/template/header"); ?>
	<!-- end #header -->
	
	<!-- begin #page-title -->
	<div id="page-title" class="page-title has-bg">
		<div class="bg-cover" data-paroller="true" data-paroller-factor="0.5" data-paroller-factor-xs="0.2" style="background: url(<?= base_url() ?>/docs/frontend/assets/img/cover/cover-5.jpg) center 0px / cover no-repeat"></div>
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
				<!-- begin col-9 -->
				<div class="col-lg-9">
					<h2 class="content-title"><center>Pengaduan Terakhir</center></h2>
							<p class="content-desc" style="text-align: center;">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br />
								sed bibendum turpis luctus eget
							</p>
							<br>
					<div class="post-list post-grid post-grid-3">
						<div class="post-li">
							<!-- begin post-content -->
							<div class="post-content">
								<!-- begin post-image -->
								<div class="post-image">
									<a href="post_detail.html">
										<div class="post-image-cover" style="background-image: url(<?= base_url() ?>/docs/frontend/assets/img/post/post-1.jpg)"></div>
									</a>
								</div>
								<!-- end post-image -->
								<!-- begin post-info -->
								<div class="post-info">
									<h4 class="post-title">
										<a href="post_detail.html">Demonstration Blog Post</a>
									</h4>
									<div class="post-by">
										Posted By <a href="#">admin</a> <span class="divider">|</span> 03 Sep 2018
									</div>
									<div class="post-desc">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elit dolor, elementum ut ligula ultricies, 
										aliquet eleifend risus. Vivamus ut auctor sapien. Etiam consectetur non leo at auctor. [...]
									</div>
									<div class="read-btn-container">
										<a href="post_detail.html">Read More <i class="fa fa-angle-double-right"></i></a>
									</div>
								</div>
								<!-- end post-info -->
							</div>
							<!-- end post-content -->
						</div>
						<div class="post-li">
							<!-- begin post-content -->
							<div class="post-content">
								<!-- begin post-image -->
								<div class="post-image">
									<a href="post_detail.html">
										<div class="post-image-cover" style="background-image: url(<?= base_url() ?>/docs/frontend/assets/img/post/post-2.jpg)"></div>
									</a>
								</div>
								<!-- end post-image -->
								<!-- begin post-info -->
								<div class="post-info">
									<h4 class="post-title">
										<a href="post_detail.html">Demonstration Blog Post</a>
									</h4>
									<div class="post-by">
										Posted By <a href="#">admin</a> <span class="divider">|</span> 21 Oct 2018
									</div>
									<div class="post-desc">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elit dolor, elementum ut ligula ultricies, 
										aliquet eleifend risus. Vivamus ut auctor sapien. Etiam consectetur non leo at auctor. [...]
									</div>
									<div class="read-btn-container">
										<a href="post_detail.html" class="read-btn">Read More <i class="fa fa-angle-double-right"></i></a>
									</div>
								</div>
								<!-- end post-info -->
							</div>
							<!-- end post-content -->
						</div>
						<div class="post-li">
							<!-- begin post-content -->
							<div class="post-content">
								<!-- begin post-image -->
								<div class="post-image">
									<a href="post_detail.html">
										<div class="post-image-cover" style="background-image: url(<?= base_url() ?>/docs/frontend/assets/img/post/post-3.jpg)"></div>
									</a>
								</div>
								<!-- end post-image -->
								<!-- begin post-info -->
								<div class="post-info">
									<h4 class="post-title">
										<a href="post_detail.html">Demonstration Blog Post</a>
									</h4>
									<div class="post-by">
										Posted By <a href="#">admin</a> <span class="divider">|</span> Oct 18, 2018
									</div>
									<div class="post-desc">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elit dolor, elementum ut ligula ultricies, 
										aliquet eleifend risus. Vivamus ut auctor sapien. Etiam consectetur non leo at auctor. [...]
									</div>
									<div class="read-btn-container">
										<a href="post_detail.html">Read More <i class="fa fa-angle-double-right"></i></a>
									</div>
								</div>
								<!-- end post-info -->
							</div>
							<!-- end post-content -->
						</div>
					</div>
					<!-- begin post-list -->
					<div id="service" class="card content" data-scrollview="true">
						<!-- begin container -->
						<div class="container">
							<h2 class="content-title"><center>Pelayanan Tersedia</center></h2>
							<p class="content-desc" style="text-align: center;">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br />
								sed bibendum turpis luctus eget
							</p>
							<br>
							<div class="row">
								<!-- begin col-4 -->
								<div class="col-lg-4 col-md-6">
									<div class="service">
										<div class="info">
											<h4 class="title">Easy to Customize</h4>
											<p class="desc">Duis in lorem placerat, iaculis nisi vitae, ultrices tortor. Vestibulum molestie ipsum nulla. Maecenas nec hendrerit eros, sit amet maximus leo.</p>
										</div>
									</div>
								</div>
								<!-- end col-4 -->
								<!-- begin col-4 -->
								<div class="col-lg-4 col-md-6">
									<div class="service">
										<div class="info">
											<h4 class="title">Clean & Careful Design</h4>
											<p class="desc">Etiam nulla turpis, gravida et orci ac, viverra commodo ipsum. Donec nec mauris faucibus, congue nisi sit amet, lobortis arcu.</p>
										</div>
									</div>
								</div>
								<!-- end col-4 -->
								<!-- begin col-4 -->
								<div class="col-lg-4 col-md-6">
									<div class="service">
										<div class="info">
											<h4 class="title">Well Documented</h4>
											<p class="desc">Ut vel laoreet tortor. Donec venenatis ex velit, eget bibendum purus accumsan cursus. Curabitur pulvinar iaculis diam.</p>
										</div>
									</div>
								</div>
								<!-- end col-4 -->
								<!-- begin col-4 -->
								<div class="col-lg-4 col-md-6">
									<div class="service">
										<div class="info">
											<h4 class="title">Re-usable Code</h4>
											<p class="desc">Aenean et elementum dui. Aenean massa enim, suscipit ut molestie quis, pretium sed orci. Ut faucibus egestas mattis.</p>
										</div>
									</div>
								</div>
								<!-- end col-4 -->
								<!-- begin col-4 -->
								<div class="col-lg-4 col-md-6">
									<div class="service">
										<div class="info">
											<h4 class="title">Online Shop</h4>
											<p class="desc">Quisque gravida metus in sollicitudin feugiat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
										</div>
									</div>
								</div>
								<!-- end col-4 -->
								<!-- begin col-4 -->
								<div class="col-lg-4 col-md-6">
									<div class="service">
										<div class="info">
											<h4 class="title">Free Support</h4>
											<p class="desc">Integer consectetur, massa id mattis tincidunt, sapien erat malesuada turpis, nec vehicula lacus felis nec libero. Fusce non lorem nisl.</p>
										</div>
									</div>
								</div>
								<!-- end col-4 -->
							</div>
							<!-- end row -->
						</div>
						<!-- end container -->
					</div>

					<div id="service" class="card content" data-scrollview="true">
						<!-- begin container -->
						<div class="container">
							<h2 class="content-title"><center>Pelayanan Tersedia</center></h2>
							<p class="content-desc" style="text-align: center;">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br />
								sed bibendum turpis luctus eget
							</p>
							<br>
							<div class="row">
								<!-- begin col-4 -->
								<div class="col-lg-4 col-md-6">
									<div class="service">
										<div class="info">
											<h4 class="title">Easy to Customize</h4>
											<p class="desc">Duis in lorem placerat, iaculis nisi vitae, ultrices tortor. Vestibulum molestie ipsum nulla. Maecenas nec hendrerit eros, sit amet maximus leo.</p>
										</div>
									</div>
								</div>
								<!-- end col-4 -->
								<!-- begin col-4 -->
								<div class="col-lg-4 col-md-6">
									<div class="service">
										<div class="info">
											<h4 class="title">Clean & Careful Design</h4>
											<p class="desc">Etiam nulla turpis, gravida et orci ac, viverra commodo ipsum. Donec nec mauris faucibus, congue nisi sit amet, lobortis arcu.</p>
										</div>
									</div>
								</div>
								<!-- end col-4 -->
								<!-- begin col-4 -->
								<div class="col-lg-4 col-md-6">
									<div class="service">
										<div class="info">
											<h4 class="title">Well Documented</h4>
											<p class="desc">Ut vel laoreet tortor. Donec venenatis ex velit, eget bibendum purus accumsan cursus. Curabitur pulvinar iaculis diam.</p>
										</div>
									</div>
								</div>
								<!-- end col-4 -->
								<!-- begin col-4 -->
								<div class="col-lg-4 col-md-6">
									<div class="service">
										<div class="info">
											<h4 class="title">Re-usable Code</h4>
											<p class="desc">Aenean et elementum dui. Aenean massa enim, suscipit ut molestie quis, pretium sed orci. Ut faucibus egestas mattis.</p>
										</div>
									</div>
								</div>
								<!-- end col-4 -->
								<!-- begin col-4 -->
								<div class="col-lg-4 col-md-6">
									<div class="service">
										<div class="info">
											<h4 class="title">Online Shop</h4>
											<p class="desc">Quisque gravida metus in sollicitudin feugiat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
										</div>
									</div>
								</div>
								<!-- end col-4 -->
								<!-- begin col-4 -->
								<div class="col-lg-4 col-md-6">
									<div class="service">
										<div class="info">
											<h4 class="title">Free Support</h4>
											<p class="desc">Integer consectetur, massa id mattis tincidunt, sapien erat malesuada turpis, nec vehicula lacus felis nec libero. Fusce non lorem nisl.</p>
										</div>
									</div>
								</div>
								<!-- end col-4 -->
							</div>
							<!-- end row -->
						</div>
						<!-- end container -->
					</div>
					<!-- end post-list -->
				</div>
				<!-- end col-9 -->
				<!-- begin col-3 -->
				<div class="col-lg-3">
					<!-- begin section-container -->
					<div class="section-container">
						<h4 class="section-title"><span>Pengaduan Terbaru</span></h4>
						<ul class="sidebar-recent-post">
							<li>
								<div class="info">
									<h4 class="title"><a href="#">Lorem ipsum dolor sit amet.</a></h4>
									<div class="date">23 December 2018</div>
								</div>
							</li>
							<li>
								<div class="info">
									<h4 class="title"><a href="#">Vestibulum a cursus arcu.</a></h4>
									<div class="date">16 December 2018</div>
								</div>
							</li>
							<li>
								<div class="info">
									<h4 class="title"><a href="#">Nullam vel condimentum lectus. </a></h4>
									<div class="date">7 December 2018</div>
								</div>
							</li>
							<li>
								<div class="info">
									<h4 class="title"><a href="#">Proin in dui egestas libero posuere ullamcorper. </a></h4>
									<div class="date">20 November 2018</div>
								</div>
							</li>
							<li>
								<div class="info">
									<h4 class="title"><a href="#">Interdum et malesuada fames ac ante.</a></h4>
									<div class="date">5 November 2018</div>
								</div>
							</li>
						</ul>
					</div>
					<!-- end section-container -->
				</div>
				<!-- end col-3 -->
			</div>
			<!-- end row -->
		</div>
		<!-- end container -->
	</div>
	<!-- end #content -->
    
	<!-- begin #footer -->
        <?= $this->include("frontend/template/footer"); ?>
	<!-- end #footer -->
	
	<!-- begin #footer-copyright -->
	<div id="footer-copyright" class="footer-copyright">
		<!-- begin container -->
		<div class="container">
			<span class="copyright">&copy; 2019 SeanTheme All Right Reserved</span>
		</div>
		<!-- end container -->
	</div>
	<!-- end #footer-copyright -->
    
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= base_url() ?>/docs/frontend/assets/js/blog/app.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</body>
</html>