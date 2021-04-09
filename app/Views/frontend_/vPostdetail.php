<!DOCTYPE html>
<html lang="en">
        <?= $this->include("frontend/template/head"); ?>
<body>
  <!-- begin #header -->
        <?= $this->include("frontend/template/header"); ?>
	<!-- end #header -->
	
	<!-- begin #content -->
	<div id="content" class="content">
		<!-- begin container -->
		<div class="container">
			<!-- begin row -->
			<div class="row row-space-30">
				<!-- begin col-9 -->
				<div class="col-lg-9">
					<!-- begin post-detail -->
					<div class="post-detail section-container">
						<h4 class="post-title">
							<a href="post_detail.html">Bootstrap Carousel Blog Post</a>
						</h4>
						<div class="post-by">
							Posted By <a href="#">admin</a> <span class="divider">|</span> 10 June 2018 <span class="divider">|</span> <a href="#">Sports</a>, <a href="#">Mountain</a>, <a href="#">Bike</a> 
						</div>
						<!-- begin post-image -->
						<div class="post-image">
							<div class="post-image-cover" style="background-image: url(<?= base_url() ?>/docs/frontend/assets/img/post/post-1.jpg)"></div>
						</div>
						<!-- end post-image -->
						<!-- begin post-desc -->
						<div class="post-desc" style="text-align: justify;">
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed commodo eget quam sed tempor. 
								Morbi vel libero eget urna interdum accumsan nec non nibh. Nam aliquam id ligula convallis egestas. 
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum lacinia lectus nibh, nec 
								pellentesque lorem iaculis ut. Cras finibus arcu eget feugiat hendrerit. Suspendisse quis 
								molestie velit. In hendrerit justo ac magna tristique viverra. Pellentesque rhoncus metus 
								eget ex sagittis lacinia. In at dapibus erat. Phasellus imperdiet dui risus, eget efficitur 
								tortor egestas nec. Integer fermentum sit amet mauris sollicitudin pulvinar.
								Quisque et viverra leo. Suspendisse neque nisi, lacinia facilisis sem ac, tincidunt lacinia augue. 
								Etiam in dapibus nisl, non blandit urna. Proin scelerisque venenatis vestibulum. 
								Proin iaculis finibus turpis, eget rhoncus tortor tempor a.
							</p>
						</div>
						<!-- end post-desc -->
					</div>
					<!-- end post-detail -->
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