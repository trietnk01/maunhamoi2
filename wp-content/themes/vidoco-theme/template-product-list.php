<?php
/*
Template name: Template danh sách sản phẩm
Template Post Type: post, page
*/
get_header(); 
?>
<div class="container">
	<div class="row">
		<div class="col">
			<div class="body-bg">
				<div class="row">
					<div class="col-lg-8">
						<h1 class="category-header">Biệt thự đẹp</h1>
						<div class="category-product-block">
							<?php
							$k=0; 
							for ($i=1; $i <= 16; $i++) { 
								if((float)@$k % 2 == 0){
									echo '<div class="row">';
								}
								?>
								<div class="col-md-6">
									<div class="product-item-box">
										<h2 class="product-item-box-title">
											<a href="javascript:void(0);">Ngôi nhà biệt thự 3 tầng đẹp, độc, sang giữa thành phố Sài gòn.</a>
										</h2>
										<div class="product-item-box-image">
											<a href="javascript:void(0);">
												<figure>
													<div style="background-image: url('<?php echo wp_get_upload_dir()["url"]."/biet-thu-3.jpg"; ?>');background-size: cover;background-repeat: no-repeat;padding-top: calc(100% / (350/230));"></div>	
												</figure>
											</a>											
										</div>
										<h3 class="product-item-box-title-2"><a href="javascript:void(0);">Ngôi nhà biệt thự 3 tầng đẹp, độc, sang giữa thành phố Sài gòn.</a></h3>
										<div class="xem-chi-tiet">
											<a href="javascript:void(0);">Xem chi tiết</a>
										</div>
									</div>
								</div>
								<?php
								$k++;
								if((float)@$k % 2 == 0 || $k == 16){
									echo "</div>";
								}
							}
							?>							
						</div>
					</div>
					<div class="col-lg-4">
						<?php include get_template_directory()."/block/block-search.php"; ?>
						<?php include get_template_directory()."/block/block-fanpage.php"; ?>
						<?php include get_template_directory()."/block/block-video.php"; ?>
						<?php include get_template_directory()."/block/block-mau-thiet-ke-moi.php"; ?>
						<?php include get_template_directory()."/block/block-mau-thiet-ke-noi-bat.php"; ?>
						<?php include get_template_directory()."/block/block-mau-thiet-ke-pho-bien.php"; ?>
						<?php include get_template_directory()."/block/block-y-kien-khach-hang.php"; ?>
						<?php include get_template_directory()."/block/block-ban-quan-tam.php"; ?>
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