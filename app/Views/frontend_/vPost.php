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
					<!-- begin post-list -->
					<ul class="post-list">
						<li>
							<!-- begin post-left-info -->
							<div class="post-left-info">
								<div class="post-date">
									<span class="day">03</span>
									<span class="month">SEPT</span>
								</div>
								<div class="post-likes">
									<i class="fa fa-heart text-primary"></i>
									<span class="number">520</span>
								</div>
							</div>
							<!-- end post-left-info -->
							<!-- begin post-content -->
							<div class="post-content">
								<!-- begin post-image -->
								<div class="post-image post-image-with-carousel">
									<!-- begin carousel -->
									<div id="carousel-post" class="carousel slide" data-ride="carousel">
										<!-- begin carousel-inner -->
										<div class="carousel-inner">
											<div class="carousel-item active">
												<a href="post_detail.html"><img class="d-block w-100" src="<?= base_url() ?>/docs/frontend/assets/img/post/post-1.jpg" alt="" /></a>
											</div>
											<div class="carousel-item">
												<a href="carousel-post_detail.html"><img class="d-block w-100" src="<?= base_url() ?>/docs/frontend/assets/img/post/post-2.jpg" alt="" /></a>
											</div>
											<div class="carousel-item">
												<a href="carousel-post_detail.html"><img class="d-block w-100" src="<?= base_url() ?>/docs/frontend/assets/img/post/post-3.jpg" alt="" /></a>
											</div>
										</div>
										<!-- end carousel-inner -->
										<!-- begin carousel-control -->
										<a class="carousel-control-prev" href="#carousel-post" role="button" data-slide="prev">
										<i class="fa fa-chevron-left" aria-hidden="true"></i>
										</a>
										<a class="carousel-control-next" href="#carousel-post" role="button" data-slide="next">
										<i class="fa fa-chevron-right" aria-hidden="true"></i>
										</a>
										<!-- end carousel-control -->
									</div>
									<!-- end carousel -->
								</div>
								<!-- end post-image -->
								<!-- begin post-info -->
								<div class="post-info">
									<h4 class="post-title">
										<a href="post_detail.html">Bootstrap Carousel Blog Post</a>
									</h4>
									<div class="post-by">
										Posted By <a href="#">admin</a> <span class="divider">|</span> <a href="#">Sports</a>, <a href="#">Mountain</a>, <a href="#">Bike</a> <span class="divider">|</span> 2 Comments
									</div>
									<div class="post-desc">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elit dolor, elementum ut ligula ultricies, 
										aliquet eleifend risus. Vivamus ut auctor sapien. Morbi at nibh id lorem viverra commodo augue dui, in pellentesque odio tempor.
										Etiam lobortis vel enim vitae facilisis. Suspendisse ac faucibus diam, non malesuada nisl. Maecenas vel aliquam eros, sit amet gravida lacus. 
										nteger dictum, nulla [...]
									</div>
								</div>
								<!-- end post-info -->
								<!-- begin read-btn-container -->
								<div class="read-btn-container">
									<a href="post_detail.html">Read More <i class="fa fa-angle-double-right"></i></a>
								</div>
								<!-- end read-btn-container -->
							</div>
							<!-- end post-content -->
						</li>
						<li>
							<!-- begin post-left-info -->
							<div class="post-left-info">
								<div class="post-date">
									<span class="day">21</span>
									<span class="month">OCT</span>
								</div>
								<div class="post-likes">
									<i class="fa fa-heart text-primary"></i>
									<span class="number">1,292</span>
								</div>
							</div>
							<!-- end post-left-info -->
							<!-- begin post-content -->
							<div class="post-content">
								<!-- begin post-image -->
								<div class="post-image">
									<a href="post_detail.html">
										<div class="post-image-cover" style="background-image: url(<?= base_url() ?>/docs/frontend/assets/img/post/post-4.jpg)"></div>
									</a>
								</div>
								<!-- end post-image -->
								<!-- begin post-info -->
								<div class="post-info">
									<h4 class="post-title">
										<a href="post_detail.html">Demonstration Blog Post</a>
									</h4>
									<div class="post-by">
										Posted By <a href="#">admin</a> <span class="divider">|</span> <a href="#">Sports</a>, <a href="#">Parachute</a>, <a href="#">Blue Sky</a> <span class="divider">|</span> 12 Comments
									</div>
									<div class="post-desc" style="text-align: justify;">
										Pellentesque sit amet lectus at urna tempus tincidunt. Curabitur aliquet nisl ut magna efficitur scelerisque. 
										Mauris molestie elementum massa eget bibendum. Sed mauris tortor, condimentum nec efficitur lobortis, tempus ac metus. 
										Donec molestie, tortor ut rhoncus consectetur, ipsum elit maximus nulla, a vulputate augue massa ac dolor. 
										Quisque euismod ornare cursus. Ut consequat pellentesque mattis [...]
									</div>
								</div>
								<!-- end post-info -->
								<!-- begin read-btn-container -->
								<div class="read-btn-container">
									<a href="post_detail.html" class="read-btn">Read More <i class="fa fa-angle-double-right"></i></a>
								</div>
								<!-- end read-btn-container -->
							</div>
							<!-- end post-content -->
						</li>
						<li>
							<!-- begin post-left-info -->
							<div class="post-left-info">
								<div class="post-date">
									<span class="day">18</span>
									<span class="month">OCT</span>
								</div>
								<div class="post-likes">
									<i class="fa fa-heart text-primary"></i>
									<span class="number">1,743</span>
								</div>
							</div>
							<!-- end post-left-info -->
							<!-- begin post-content -->
							<div class="post-content">
								<!-- begin post-video -->
								<div class="post-video">
									<div class="embed-responsive embed-responsive-16by9">
										<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/_5aKcpAhTOk" allowfullscreen></iframe>
									</div>
								</div>
								<!-- end post-video -->
								<!-- begin post-info -->
								<div class="post-info">
									<h4 class="post-title">
										<a href="post_detail.html">Blog Post Video</a>
									</h4>
									<div class="post-by">
										Posted By <a href="#">admin</a> <span class="divider">|</span> <a href="#">Movies</a>, <a href="#">Minions</a>, <a href="#">Trailer</a> <span class="divider">|</span> 1,292 Comments
									</div>
									<div class="post-desc" style="text-align: justify;">
										Praesent maximus malesuada purus, sit amet auctor velit scelerisque nec. Suspendisse eget pellentesque dui, ut egestas orci. 
										Proin eget massa et magna faucibus pulvinar. Quisque tortor orci, volutpat vel auctor non, varius a augue. Cras non ante arcu. 
										Phasellus sit amet dolor non est dictum convallis vel eu lectus. 
										Etiam consectetur non leo at auctor. Proin porttitor tellus arcu, in accumsan eros tincidunt eget[...]
									</div>
								</div>
								<!-- end post-info -->
								<!-- begin read-btn-container -->
								<div class="read-btn-container">
									<a href="post_detail.html">Read More <i class="fa fa-angle-double-right"></i></a>
								</div>
								<!-- end read-btn-container -->
							</div>
							<!-- end post-content -->
						</li>
						<li>
							<!-- begin post-left-info -->
							<div class="post-left-info">
								<div class="post-date">
									<span class="day">12</span>
									<span class="month">OCT</span>
								</div>
								<div class="post-likes">
									<i class="fa fa-heart text-primary"></i>
									<span class="number">3,673</span>
								</div>
							</div>
							<!-- end post-left-info -->
							<!-- begin post-content -->
							<div class="post-content">
								<!-- begin blockquote -->
								<blockquote>
									"What is design? It's where you stand with a foot in two worlds - the world of technology and the world of people and human purposes - and you try to bring the two together."
								</blockquote>
								<!-- end blockquote -->
								<!-- begin post-info -->
								<div class="post-info">
									<h4 class="post-title">
										<a href="post_detail.html">Blockquote Post</a>
									</h4>
									<div class="post-by">
										Posted By <a href="#">admin</a> <span class="divider">|</span> <a href="#">Animals</a>, <a href="#">Mountain</a>, <a href="#">Natural</a> <span class="divider">|</span> 2 Comments
									</div>
									<div class="post-desc" style="text-align: justify;">
										Ut vulputate sem id egestas faucibus. Phasellus volutpat malesuada lacus, eu semper enim hendrerit a. 
										Mauris vehicula sapien sit amet eros pharetra dignissim. Quisque sed elit hendrerit, tempor sem ut, faucibus massa. 
										Aliquam rutrum id massa interdum dapibus. Proin augue massa, feugiat eu velit vitae, vulputate ullamcorper turpis. 
										Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.  [...]
									</div>
								</div>
								<!-- end post-info -->
								<!-- begin read-btn-container -->
								<div class="read-btn-container">
									<a href="post_detail.html" class="read-btn">Read More <i class="fa fa-angle-double-right"></i></a>
								</div>
								<!-- begin read-btn-container -->
							</div>
							<!-- end post-content -->
						</li>
					</ul>
					<!-- end post-list -->
					<!-- begin pagination -->
					<div class="section-container">
						<div class="pagination-container">
							<ul class="pagination justify-content-center">
								<li class="page-item disabled"><a class="page-link" href="javascript:;">Prev</a></li>
								<li class="page-item active"><a class="page-link" href="javascript:;">1</a></li>
								<li class="page-item"><a class="page-link" href="javascript:;">2</a></li>
								<li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
								<li class="page-item"><span class="text">...</span></li>
								<li class="page-item"><a class="page-link" href="javascript:;">1797</a></li>
								<li class="page-item"><a class="page-link" href="javascript:;">Next</a></li>
							</ul>
						</div>
					</div>
					<!-- end pagination -->
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
    
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= base_url() ?>/docs/frontend/assets/js/blog/app.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</body>
</html>