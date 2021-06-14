
		<div id="pengaduan" class="content" data-scrollview="true">
			<!-- begin container -->
			<div class="container">
				<h2 class="content-title">Pengaduan</h2>
				<p class="content-desc">
					Riwayat pengaduan masyarakat yang sudah terselesaikan
				</p>
					<!-- begin row -->
				<div class="row row-space-10">
					<!-- begin col-3 -->
					<?php
	                foreach ($pengaduan as $item) {
	                ?>
					<div class="col-lg-3 col-md-4">
						<!-- begin work -->
						<div class="work">
								<h3><?= $item['JUDUL_PENGADUAN']; ?></h3>
								<div class="post-by">
									Posted By admin <span class="divider">|</span> <?= $item['WAKTU_PENGADUAN']; ?>
								</div>
								<span class="desc-text"><?= $item['ISI_PENGADUAN']; ?></span>
								<div class="read-btn-container">
								</div>

						</div>
						<!-- end work -->
					</div>
					<!-- end col-3 -->
					<?php } ?>
				</div>
				<br><br>
				<center>
					<h4>
						<div class="read-btn-container">
							<a href="<?= base_url()?>/Frontend/Pengaduan" class="read-btn">Lihat Lebih Banyak <i class="fa fa-angle-double-right"></i></a>
						</div>
					</h4>
				</center>
			</div>
			<!-- end container -->
		</div>