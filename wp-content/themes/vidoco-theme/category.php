<?php
get_header();
?>
<div class="container">
	<div class="row">
		<div class="col">
			<div class="body-bg">
				<div class="row">
					<div class="col-lg-8">
						<form name="frm_category" method="POST">
							<input type="hidden" name="filter_page" value="1" />
							<h1 class="category-header"><?php single_cat_title(); ?></h1>
							<div class="category-block">
								<?php 
								for ($i=0; $i < 10; $i++) { 
									?>
									<div class="category-box">
										<div class="row">
											<div class="col-md-3">
												<a href="javascript:void(0);">
													<figure>
														<div style="background-image: url('<?php echo wp_get_upload_dir()["url"]."/200x163-thi-truong-bds-tp-hcm-phan-khuc-nha-o-vua-tui-tien-chiem-chu-dao.jpg"; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (800/600))"></div>
													</figure>
												</a>
											</div>
											<div class="col-md-9">
												<h2 class="category-title"><a href="javascript:void(0);">Thị trường BĐS Tp.HCM: phân khúc nhà ở vừa túi tiền chiếm chủ đạo</a></h2>
												<div class="category-excerpt">
													Theo số liệu từ Hiệp hội BĐS Tp.HCM (HoRea), trong năm 2016, với tỷ lệ 79,7%, phân khúc nhà ở vừa túi tiền đang là phân khúc chủ đạo của thị trường BĐS Tp.HCM
												</div>
											</div>
										</div>
									</div>		
									<?php
								}
								?>														
							</div>							
						</form>						
					</div>
					<div class="col-lg-4">
						<?php include get_template_directory()."/block/block-search.php"; ?>
						<?php include get_template_directory()."/block/block-fanpage.php"; ?>
						<?php include get_template_directory()."/block/block-video.php"; ?>
						<?php include get_template_directory()."/block/block-mau-thiet-ke.php"; ?>														
						<?php include get_template_directory()."/block/block-y-kien-khach-hang.php"; ?>
						<?php include get_template_directory()."/block/block-ban-quan-tam.php"; ?>
						<?php include get_template_directory()."/block/block-visitor-counter.php"; ?>
					</div>
				</div>
				<?php include get_template_directory()."/block/block-menu-content-bottom.php"; ?>
			</div>
		</div>
	</div>
</div>
<?php
get_footer(); 
?>