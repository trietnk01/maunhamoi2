<?php
get_header();
$title="";
$content="";
if(have_posts()){
	while (have_posts()) {
		the_post();
        $post_id= get_the_id();
        $title=get_the_title($post_id);
        $content=get_the_content($post_id);
        $excerpt=get_field("single_page_excerpt",$post_id);
	}
	wp_reset_postdata();
}
?>
<div class="container">
	<div class="row">
		<div class="col">
			<div class="body-bg">
				<div class="row">
					<div class="col-lg-8">
						<h1 class="header-page"><?php echo @$title; ?></h1>
						<div class="single-excerpt">
							<?php echo @$excerpt; ?>
						</div>
						<div class="than-bai-viet">
							<?php
							if(have_posts()){
								while (have_posts()){
									the_post();
									the_content( null, false );
								}
								wp_reset_postdata();
							}
							?>
						</div>
						<?php include get_template_directory()."/block/block-main-product.php"; ?>
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
				<?php include get_template_directory()."/block/block-google-map.php"; ?>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
?>