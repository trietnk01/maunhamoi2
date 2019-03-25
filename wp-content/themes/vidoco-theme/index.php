<?php
/*
	Home template default
*/	
	get_header();
	$source_banner=get_field('op_banner_repeat','option');		
	?>
	<h1 style="display: none"><?php echo get_bloginfo( 'name','' ); ?></h1>
	<div class="banner_slideshow">
		<div class="owl_carousel_banner owl-carousel owl-theme owl-loaded">		
			<?php 
			foreach ($source_banner as $key => $value) {
				?>
				<div class="item">
					<div class="banner_box">
						<div><img src="<?php echo @$value["op_banner_repeat_img"]; ?>" alt="hinhanh"></div>
					</div>					
				</div>
				<?php
			}
			?>								
		</div>
		<div class="gc_cl_cdcs">
			<div class="container">
				<div class="row">
					<div class="col">
						<a class="gc_box gc_cl_cdcs_padd" href="javascript:void(0);">	
							<div class="icon_box"><img src="<?php echo P_IMG.'/icon_b1.png'; ?>" alt="hinhanh"></div>
							<div class="gc_t">Giá cả tốt nhất</div>			
						</a>
						<a class="cl_box gc_cl_cdcs_padd" href="javascript:void(0);">
							<div class="icon_box"><img src="<?php echo P_IMG.'/icon_b2.png'; ?>" alt="hinhanh"></div>			
							<div class="cl_t">Chất lượng tốt nhất</div>			
						</a>
						<a class="cdcskh_box gc_cl_cdcs_padd" href="javascript:void(0);">
							<div class="icon_box"><img src="<?php echo P_IMG.'/icon_b3.png'; ?>" alt="hinhanh"></div>			
							<div class="cskh_t">Có chế độ chăm sóc khách hàng</div>			
						</a>
					</div>
				</div>
			</div>						
		</div>		
	</div>
	<div class="gc_cl_cdcs_mobile">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="gc_mobile">
						<div><img src="<?php echo P_IMG.'/icon_b1.png'; ?>" alt="hinhanh"></div>
						<div class="gc_mobile_txt">Giá cả tốt nhất</div>						
					</div>
				</div>
				<div class="col-md-6">
					<div class="cl_mobile">
						<div><img src="<?php echo P_IMG.'/icon_b2.png'; ?>" alt="hinhanh"></div>
						<div class="cl_mobile_txt">Chất lượng tốt nhất</div>						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="cd_mobile">
						<div><img src="<?php echo P_IMG.'/icon_b3.png'; ?>" alt="hinhanh"></div>
						<div class="cd_mobile_txt">Có chế độ chăm sóc khách hàng</div>						
					</div>
				</div>				
			</div>
		</div>
	</div>
	<?php 
	$about_us_title=get_field('hp_about_us_title','option');
	$about_us_img=get_field('hp_about_us_img','option');
	$about_us_excerpt=get_field('hp_about_us_excerpt','option');
	$about_us_detail_link=get_field('hp_about_us_detail_link','option');
	?>
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<div class="box_intro_img">					
					<a href="<?php echo @$about_us_detail_link; ?>">
						<figure>
							<div style="border-radius: 0px 20px 0px 20px; background-image: url(<?php echo @$about_us_img; ?>);background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (458 / 383))"></div>
						</figure>						
					</a>					
				</div>
			</div>
			<div class="col-lg-7">
				<div class="gioi_thieu_img">					
					<img src="<?php echo P_IMG.'/logo_gioithieu.png'; ?>" alt="<?php echo @$about_us_title; ?>">
				</div>
				<h2 class="box_intro_title"><a href="<?php echo @$about_us_detail_link; ?>"><?php echo @$about_us_title; ?></a></h2>
				<div class="box_intro_content">
					<?php echo $about_us_excerpt; ?>
				</div>				
				<div class="box_intro_readmore">
					<a href="<?php echo @$about_us_detail_link; ?>">Xem chi tiết</a>
				</div>
				<div class="clr"></div>				
			</div>
		</div>
	</div>
	<?php 
	$source_category=get_field('hp_category_rpt','option');
	$k=0;
	if(count($source_category) > 0){
		foreach ($source_category as $key => $value) {
			$category_id=$value['hp_category_id'];		
			$term_data=get_term_by( 'id',$category_id, 'za_category' );		
			$term_link=get_term_link( $term_data, 'za_category' );
			?>
			<div class="box_featured_product_v<?php echo @$k; ?>">
				<div class="box_hp_product_wrapper_title">
					<div class="box_hp_product_title">
						<div>
							<h2>
								<?php echo $term_data->name; ?>
							</h2>
						</div>			
					</div>
				</div>				
				<div class="clr"></div>
				<?php 
				$args = array(
					'post_type' => 'zaproduct',
					'orderby' => 'id',
					'order'   => 'DESC',  	
					'posts_per_page' => 3,
					'tax_query' => array(
						array(
							'taxonomy' => 'za_category',
							'field'    => 'id',
							'terms'    => array($category_id),
						)
					),
				);
				$the_query = new WP_Query( $args );	
				if($the_query->have_posts()){
					?>
					<div class="bx_product">
						<div class="container">
							<div class="row">	
								<?php 						
								while ($the_query->have_posts()) {
									$the_query->the_post();
									$post_id=$the_query->post->ID;                                                       
									$permalink=get_the_permalink($post_id);					
									$title=get_the_title($post_id);							
									$featured_img=get_the_post_thumbnail_url($post_id, 'full'); 
									?>
									<div class="col-sm-4">
										<div class="bx_pr_item">
											<h3 class="bx_pr_item_title"><a href="<?php echo $permalink; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
											<div class="bx_pr_item_img">										
												<a href="<?php echo $permalink; ?>">
													<figure>
														<div style="background-image: url(<?php echo @$featured_img; ?>);background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (200 / 200))"></div>
													</figure>						
												</a>	
											</div>
											<div class="bx_pr_item_detail">
												<a href="<?php echo $permalink; ?>">Chi tiết</a>
											</div>
										</div>
									</div>
									<?php	
								}
								wp_reset_postdata();						
								?>													
							</div>
							<div class="row">
								<div class="col">
									<div class="view_all">
										<a href="<?php echo @$term_link; ?>" title="xemtatca">Xem tất cả</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
				$k++;		
				?>			
			</div>
			<?php
		}	
	}	
	include get_template_directory() . "/block/block-partner.php";
	$source_id=get_field('hp_tax_diem_kinh_doanh','option'); 
	$id=$source_id[0];
	$term_data=get_term_by( 'id',$id, 'category' );		
	$term_link=get_term_link( $term_data, 'category' );
	$args = array(
		'post_type' => 'post',
		'orderby' => 'id',
		'order'   => 'DESC',  	
		'posts_per_page' => 5,
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field'    => 'id',
				'terms'    => $source_id,
			)
		),
	);
	$the_query = new WP_Query( $args );	
	$source_article=array();
	if($the_query->have_posts()){
		while ($the_query->have_posts()) {
			$the_query->the_post();
			$post_id=$the_query->post->ID;                                                                      
			$permalink=get_the_permalink($post_id);					
			$title=get_the_title($post_id);
			$excerpt=get_the_excerpt($post_id);
			$featured_img=get_the_post_thumbnail_url($post_id, 'full'); 
			$date_post=get_the_date('d.m.Y',@$post_id);							
			$data_hot_article["title"]=$title;
			$data_hot_article["permalink"]=$permalink;
			$data_hot_article["featured_img"]=$featured_img;
			$data_hot_article["date_post"]=$date_post;
			$data_hot_article["excerpt"]=$excerpt;
			$source_article[]=$data_hot_article;
		}
		wp_reset_postdata();
	}
	if(count(@$source_article) > 0){
		?>
		<div class="box_business">
			<h2 class="business_title">Các điểm kinh doanh của Vinadasa</h2>
			<div class="business_items">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">							
							<div class="diemkinhdoanh">
								<a href="<?php echo @$source_article[0]['permalink']; ?>">
									<div class="overlay"></div>
									<div class="dkdimg" style="background-image:url(<?php echo @$source_article[0]['featured_img']; ?>);background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (540 / 360));border-radius: 25px; ">
										
									</div>
									<div class="business_item_title">
										<h3><?php echo @$source_article[0]['title']; ?></h3>
									</div>									
								</a>								
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<?php								
								for ($i=1; $i < 5 ; $i++) { 
									$dkkd="";
									switch ($i) {
										case 1:
										case 2:
										$dkkd="dkpadd";
										break;
										case 3:
										case 4:
										$dkkd="dkpadd2";
										break;																		
									}								
									?>
									<div class="col-md-6">
										<div class="diemkinhdoanhv2 <?php echo $dkkd; ?>">											
											<a href="<?php echo @$source_article[$i]['permalink']; ?>">
												<div class="overlay"></div>												
												<div class="dkdimg" style="background-image:url(<?php echo @$source_article[$i]['featured_img']; ?>);background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (540 / 360));border-radius: 25px; ">

												</div>
												<div class="business_item_title">
													<h3><?php echo @$source_article[$i]['title']; ?></h3>
												</div>									
											</a>
										</div>
									</div>
									<?php
								}
								?>							
							</div>						
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="view_all">
								<a href="<?php echo @$term_link; ?>" title="<?php echo @$term_data->name; ?>">Xem tất cả</a>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>
		<?php
	}
	$source_id=get_field('hp_tax_tram_dung_chan','option'); 
	$id=$source_id[0];
	$term_data=get_term_by( 'id',$id, 'category' );		
	$term_link=get_term_link( $term_data, 'category' );
	$args = array(
		'post_type' => 'post',
		'orderby' => 'id',
		'order'   => 'DESC',  	
		'posts_per_page' => 5,
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field'    => 'id',
				'terms'    => $source_id,
			)
		),
	);
	$the_query = new WP_Query( $args );	
	$source_article=array();
	if($the_query->have_posts()){
		while ($the_query->have_posts()) {
			$the_query->the_post();
			$post_id=$the_query->post->ID;                                                                      
			$permalink=get_the_permalink($post_id);					
			$title=get_the_title($post_id);
			$excerpt=get_the_excerpt($post_id);
			$featured_img=get_the_post_thumbnail_url($post_id, 'full'); 
			$date_post=get_the_date('d.m.Y',@$post_id);							
			$data_hot_article["title"]=$title;
			$data_hot_article["permalink"]=$permalink;
			$data_hot_article["featured_img"]=$featured_img;
			$data_hot_article["date_post"]=$date_post;
			$data_hot_article["excerpt"]=$excerpt;
			$source_article[]=$data_hot_article;
		}
		wp_reset_postdata();
	}
	if(count(@$source_article) > 0){
		?>
		<div class="box_business_v2">
			<h2 class="business_title">Trạm dừng chân thuộc Vinadasa</h2>
			<div class="business_items">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="diemkinhdoanh">
								<a href="<?php echo @$source_article[0]['permalink']; ?>">
									<div class="overlay"></div>
									<div class="dkdimg" style="background-image:url(<?php echo @$source_article[0]['featured_img']; ?>);background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (540 / 360));border-radius: 25px; ">
										
									</div>
									<div class="business_item_title">
										<h3><?php echo @$source_article[0]['title']; ?></h3>
									</div>									
								</a>	
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<?php 
								for ($i=1; $i <5 ; $i++) { 
									$dkkd="";
									switch ($i) {
										case 1:
										case 2:
										$dkkd="dkpadd";
										break;
										case 3:
										case 4:
										$dkkd="dkpadd2";
										break;																		
									}								
									?>
									<div class="col-md-6">
										<div class="diemkinhdoanhv2 <?php echo $dkkd; ?>">
											<a href="<?php echo @$source_article[$i]['permalink']; ?>">
												<div class="overlay"></div>
												<div class="dkdimg" style="background-image:url(<?php echo @$source_article[$i]['featured_img']; ?>);background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (540 / 360));border-radius: 25px; ">

												</div>
												<div class="business_item_title">
													<h3><?php echo @$source_article[$i]['title']; ?></h3>
												</div>									
											</a>
										</div>
									</div>
									<?php
								}
								?>							
							</div>						
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="view_all">
								<a href="<?php echo @$term_link; ?>" title="<?php echo @$term_data->name; ?>">Xem tất cả</a>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>
		<?php
	}
	$source_id=get_field('hp_tax_hot_article','option'); 
	$id=$source_id[0];
	$term_data=get_term_by( 'id',$id, 'category' );		
	$term_link=get_term_link( $term_data, 'category' );
	$args = array(
		'post_type' => 'post',
		'orderby' => 'id',
		'order'   => 'DESC',  	
		'posts_per_page' => 2,
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field'    => 'id',
				'terms'    => $source_id,
			)
		),
	);
	$the_query = new WP_Query( $args );	
	$source_article=array();
	if($the_query->have_posts()){
		while ($the_query->have_posts()) {
			$the_query->the_post();
			$post_id=$the_query->post->ID;                                                                      
			$permalink=get_the_permalink($post_id);					
			$title= wp_trim_words( get_the_title($post_id), 5,'...' ) ;
			$excerpt= wp_trim_words( get_the_excerpt($post_id), 7,'...' ) ;
			$featured_img=get_the_post_thumbnail_url($post_id, 'full'); 
			$date_post=get_the_date('d.m.Y',@$post_id);							
			$data_hot_article["title"]=$title;
			$data_hot_article["title_tooltip"]= get_the_title($post_id);
			$data_hot_article["permalink"]=$permalink;
			$data_hot_article["featured_img"]=$featured_img;
			$data_hot_article["date_post"]=$date_post;
			$data_hot_article["excerpt"]=$excerpt;
			$source_article[]=$data_hot_article;
		}
		wp_reset_postdata();
	}
	if(count(@$source_article) > 0){
		?>
		<div class="box_news">
			<div class="container">
				<div class="row">
					<div class="col">
						<h2 class="hot_news_title">Tin tức mới nhất</h2>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<?php 
						for ($i=0; $i < count(@$source_article) ; $i++) { 
							?>
							<div class="box_news_item">
								<div class="box_news_img">
									<a href="<?php echo @$source_article[$i]['permalink']; ?>" title="<?php echo @$source_article[$i]['title_tooltip']; ?>">										
										<div class="box-news-parada" style="background-image:url(<?php echo @$source_article[$i]['featured_img']; ?>)">
										</div>
										
									</a>
								</div>
								<div class="box_news_info">
									<div class="box_news_date"><?php echo @$source_article[$i]['date_post']; ?></div>
									<h3 class="box_news_title">
										<a href="<?php echo @$source_article[$i]['permalink']; ?>" title="<?php echo @$source_article[$i]['title_tooltip']; ?>"><?php echo @$source_article[$i]['title']; ?></a>
									</h3>
									<div class="box_news_intro">
										<?php echo @$source_article[$i]['excerpt']; ?>
									</div>
								</div>	
								<div class="clr"></div>														
							</div>
							<?php
						}
						?>		
					</div>		
				</div>
				<div class="row">
					<div class="col">
						<div class="view_all">
							<a href="<?php echo @$term_link; ?>" title="<?php echo @$term_data->name; ?>">Xem tất cả</a>
						</div>
					</div>
				</div>
			</div>
		</div>	
		<?php
	}	
	get_footer();
	?>