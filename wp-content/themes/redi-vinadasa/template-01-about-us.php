<?php
/*
Template name: Template giới thiệu
Template Post Type: post, page
*/
get_header(); 
?>
<div class="container">
	<div class="row">
		<div class="col">
			<h1 class="about_us_title"><?php echo get_field('p_about_us_title','option'); ?></h1>		
		</div>
	</div>
</div>
<div class="box_about_us">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<?php echo get_field('p_about_us_content','option'); ?>
			</div>
			<div class="col-md-5">
				<div class="about_us_img"><img src="<?php echo get_field('p_about_us_img','option'); ?>" alt="hinhanh"></div>
			</div>
		</div>
	</div>
</div>
<?php 
include get_template_directory() . "/block/block-partner.php";
get_footer(); 
?>