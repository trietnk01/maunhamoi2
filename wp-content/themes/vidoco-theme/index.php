<?php
/*
	Home template default
*/	
	get_header();
	?>
	<h1 style="display: none;"><?php echo bloginfo( "name" ); ?></h1>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="body-bg">
					<div class="row">
						<div class="col-lg-8">
							<div class="owl-carousel-banner owl-carousel owl-theme owl-loaded">	
								<?php 
								for ($i=0;$i<10;$i++) {
									?>
									<div class="item">
										<div style="background-image: url('<?php echo wp_get_upload_dir()["url"]."/biet-thu-1.jpg" ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (775/415))">				
										</div>		
										<hr class="banner-line">	
										<div class="banner-title-excerption">
											<div class="banner-title"><a href="javascript:void(0);">Ngôi nhà biệt thự 3 tầng đẹp, độc, sang giữa thành phố Sài gòn.</a></div>
											<div class="banner-excerption">Sở hữu ngôi nhà biệt thự 3 tầng đẹp, độc, sang giữa thành phố Sài gòn. Để chính thức sở hữu cho mình một ngôi</div>
										</div>
									</div>								
									<?php									
								}
								?>								
							</div>
							<div class="circle-wrapper">
								<?php
								$k=0; 
								for ($i=1; $i <= 12; $i++) { 
									if($k%3==0){
										echo '<div class="row">';					
									}
									?>
									<div class="col-md-4">
										<div class="category-frontend">
											<div class="category-frontend-halo">
												<div class="category-frontend-title-left"><a href="javascript:void(0);">Biệt thự đẹp</a></div>												
												<div class="clr"></div>
											</div>
											<div>
												<a href="javascript:void(0);">
													<figure>
														<div style="background-image: url('<?php echo wp_get_upload_dir()["url"]."/phoi-nha-phoi-canh.jpg" ; ?>');background-repeat:no-repeat;background-size: cover;padding-top: calc(100% / (500/500));"></div>	
													</figure>
												</a>												
											</div>
											<h3 class="title-category-frontend"><a href="javascript:void(0);">Kiên Trúc Sáng Tạo , Đẳng Cấp Sáng Tạo Nhà Đẹp, Thiết Kế Biệt Thự Đẹp | Hiện Đại | Cổ Điển | Kiểu Pháp | Nhà Vườn</a></h3>
											<div class="category-frontend-readmore">
												<a href="javascript:void(0);">Xem chi tiết</a>
												<div class="clr"></div>
											</div>
										</div>
									</div>
									<?php
									$k++;
									if($k%3==0 || $k==12){
										echo '</div>';
									}
								}
								?>								
							</div>
							<h2 class="tham-gia-thiet-ke">Tham gia thiết kế cùng mẫu nhà mới - Bằng ý kiến của mình</h2>
							<div class="margin-top-5">
								<div class="row">
									<div class="col-md-8">
										<div class="f-category-left">
											<div>
												<a href="javascript:void(0);">
													<figure>
														<div style="background-image: url('<?php echo wp_get_upload_dir()["url"]."/phoi-canh-1.jpg" ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (200/200));"></div>	
													</figure>
												</a>
											</div>											
											<div class="ranet">
												<a href="javascript:void(0);">Tham gia bình luận cùng MẪU NHÀ MỚI</a>
											</div>											
										</div>	
										<div class="f-category-right">
											<h3 class="y-kien"><a href="javascript:void(0);">Tham khảo mẫu thiết kế nhà phố hiện đại 4 tầng đẹp</a></h3>
											<div class="margin-top-15">Mãn nhạn với mẫu thiết kế nhà phố 4 tầng kích thước 4x13m có lửng, kiến trúc mặt tiền đẹp, có nhiều nét đẹp mềm</div>
											<div class="margin-top-5">Bình luận :</div>
											<div class="lp-comment">
												<a href="javascript:void(0);">Mời bạn tham gia bình luận cùng chúng tôi</a>
											</div>
										</div>	
										<div class="clr"></div>															
									</div>
									<div class="col-md-4">
										<?php 
										for ($i=1; $i <= 3; $i++) { 
											?>
											<div class="bao-gia">
												<div class="bao-gia-left">
													<div>
														<a href="javascript:void(0);">
															<figure>
																<div style="background-image: url('<?php echo wp_get_upload_dir()["url"]."/bang-bao-gia-phan-tho.jpg"; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (100/100));"></div>	
															</figure>
														</a>
													</div>																						
												</div>
												<div class="bao-gia-right">
													<h4 class="nam-nay"><a href="javascript:void(0);">Bảng báo giá phần thô năm 2019</a></h4>
												</div>
												<div class="clr"></div>
											</div>
											<?php
										}
										?>										
									</div>
								</div>
							</div>
							<h2 class="tham-gia-thiet-ke margin-top-30">Tham gia thiết kế</h2>
							<div class="margin-top-5">
								<?php 
								$k=0;
								for ($i=1; $i <= 4; $i++) { 
									if($k%2==0){
										echo '<div class="row">';
									}
									?>
									<div class="col-md-6">
										<div class="mau-nha">
											<div class="mau-nha-left">
												<a href="javascript:void(0);">
													<figure>
														<div style="background-image: url('<?php echo wp_get_upload_dir()["url"]."/bang-bao-gia-phan-tho.jpg"; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (100/100));"></div>	
													</figure>
												</a>
											</div>
											<div class="mau-nha-right">
												<h3 class="mau-nha-right-title"><a href="javascript:void(0);">Kinh ngạc mẫu thiết kế nhà phố 3 tầng kích thước 4x14m thiết kế với</a></h3>
												<div class="readmore"><a href="javascript:void(0);">Xem chi tiết</a></div>
											</div>
											<div class="clr"></div>
										</div>
									</div>
									<?php
									$k++;
									if($k%2 == 0 || $k == 4){
										echo '</div>';
									}
								}
								?>								
							</div>
							<h2 class="tham-gia-thiet-ke margin-top-30">Mẫu nhà mới</h2>
							<div class="margin-top-5">
								<?php 
								$k=0;
								for ($i=1; $i <= 4; $i++) { 
									if($k%2==0){
										echo '<div class="row">';
									}
									?>
									<div class="col-md-6">
										<div class="mau-nha">
											<div class="mau-nha-left">
												<a href="javascript:void(0);">
													<figure>
														<div style="background-image: url('<?php echo wp_get_upload_dir()["url"]."/bang-bao-gia-phan-tho.jpg"; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (100/100));"></div>	
													</figure>
												</a>
											</div>
											<div class="mau-nha-right">
												<h3 class="mau-nha-right-title"><a href="javascript:void(0);">Kinh ngạc mẫu thiết kế nhà phố 3 tầng kích thước 4x14m thiết kế với</a></h3>
												<div class="readmore"><a href="javascript:void(0);">Xem chi tiết</a></div>
											</div>
											<div class="clr"></div>
										</div>
									</div>
									<?php
									$k++;
									if($k%2 == 0 || $k == 4){
										echo '</div>';
									}
								}
								?>								
							</div>
						</div>
						<div class="col-lg-4"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	get_footer();
	?>