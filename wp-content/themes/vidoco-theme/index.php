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
							<?php
							$args = array(
								'post_type' => 'zaproduct',
								'orderby' => 'id',
								'order'   => 'DESC',
								'posts_per_page' => 9,
								'tax_query' => array(
									array(
										'taxonomy' => 'za_category',
										'field'    => 'slug',
										'terms'    => array("biet-thu-dep"),
									),
								),
							);
							$the_query=new WP_Query($args);
							if($the_query->have_posts()){
								?>
								<div class="owl-carousel-banner owl-carousel owl-theme owl-loaded">
									<?php
									while ($the_query->have_posts()) {
										$the_query->the_post();
										$post_id=$the_query->post->ID;
										$permalink=get_the_permalink(@$post_id);
										$title=get_the_title(@$post_id);
										$excerpt=get_the_excerpt(@$post_id);
										$featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
										?>
										<div class="item">
											<div style="background-image: url('<?php echo @$featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (775/445))">
											</div>
											<hr class="banner-line">
											<div class="banner-title-excerption">
												<div class="banner-title"><a href="<?php echo @$permalink; ?>"><?php echo @$title; ?></a></div>
												<div class="banner-excerption"><?php echo @$excerpt; ?></div>
											</div>
										</div>
										<?php
									}
									wp_reset_postdata();
									?>
								</div>
								<?php
							}
							$home_page_za_category_selected=get_field("home_page_za_category_selected","option");
							if(count(@$home_page_za_category_selected) > 0){
								?>
								<div class="circle-wrapper">
									<?php
									$k=0;
									foreach ($home_page_za_category_selected as $key => $value) {
										if($k%2==0){
											echo '<div class="row">';
										}
										$term_za_category_data = get_term_by('id', $value, 'za_category');
										$term_za_category_link=get_term_link( $term_za_category_data, 'za_category' );
										$term_za_category_featured_img=get_field("za_category_featured_img",$term_za_category_data);
										?>
										<div class="col-md-6">
											<div class="category-frontend">
												<div class="category-frontend-halo">
													<div class="category-frontend-title-left"><a href="<?php echo @$term_za_category_link; ?>"><?php echo wp_trim_words( @$term_za_category_data->name, 9, null ) ; ?></a></div>
													<div class="clr"></div>
												</div>
												<div>
													<a href="<?php echo @$term_za_category_link; ?>">
														<figure>
															<div style="background-image: url('<?php echo @$term_za_category_featured_img; ?>');background-repeat:no-repeat;background-size: cover;padding-top: calc(100% / (800/600));"></div>
														</figure>
													</a>
												</div>
												<div class="duong-vien">
													<h3 class="title-category-frontend"><a href="<?php echo @$term_za_category_link; ?>"><?php echo wp_trim_words(@$term_za_category_data->description, 9,  null ) ; ?></a></h3>
													<div class="category-frontend-readmore">
														<a href="<?php echo @$term_za_category_link; ?>">Xem chi tiết</a>
														<div class="dong-ho">
															<span><i class="far fa-clock"></i></span><span class="margin-left-5">16/06/2016</span><span class="margin-left-5"><i class="far fa-heart"></i></span>
														</div>
														<div class="clr"></div>
													</div>
												</div>
											</div>
										</div>
										<?php
										$k++;
										if($k%2==0 || $k==count($home_page_za_category_selected)){
											echo '</div>';
										}
									}
									?>
								</div>
								<?php
							}
							?>
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