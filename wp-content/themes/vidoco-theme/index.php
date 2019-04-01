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
							$home_page_zaproduct_rpt=get_field("home_page_zaproduct_rpt","option");											
							if(count(@$home_page_zaproduct_rpt) > 0){
								?>
								<div class="owl-carousel-banner owl-carousel owl-theme owl-loaded">
									<?php 
									foreach($home_page_zaproduct_rpt as $key => $value) {
										$post_id=$value["home_page_zaproduct_item"];
										$args=array(
											"post_type"=>"zaproduct",
											"p"=>@$post_id
										);
										$the_query=new WP_Query($args);
										if($the_query->have_posts()){
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
										}																														
									}															
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
										if($k%3==0){
											echo '<div class="row">';					
										}
										$term_za_category_data = get_term_by('id', $value, 'za_category'); 										
										$term_za_category_link=get_term_link( $term_za_category_data, 'za_category' );		
										$term_za_category_featured_img=get_field("za_category_featured_img",$term_za_category_data);					
										?>
										<div class="col-md-4">
											<div class="category-frontend">
												<div class="category-frontend-halo">
													<div class="category-frontend-title-left"><a href="<?php echo @$term_za_category_link; ?>"><?php echo @$term_za_category_data->name; ?></a></div>												
													<div class="clr"></div>
												</div>
												<div>
													<a href="<?php echo @$term_za_category_link; ?>">
														<figure>
															<div style="background-image: url('<?php echo @$term_za_category_featured_img; ?>');background-repeat:no-repeat;background-size: cover;padding-top: calc(100% / (800/600));"></div>	
														</figure>
													</a>												
												</div>
												<h3 class="title-category-frontend"><a href="<?php echo @$term_za_category_link; ?>"><?php echo $term_za_category_data->description; ?></a></h3>
												<div class="category-frontend-readmore">
													<a href="<?php echo @$term_za_category_link; ?>">Xem chi tiết</a>
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
								<?php
							}
							?>														
							<h2 class="tham-gia-thiet-ke">Tham gia thiết kế cùng mẫu nhà mới - Bằng ý kiến của mình</h2>
							<div class="margin-top-5">
								<div class="row">
									<div class="col-md-8">
										<?php 
										$home_page_zaproduct_featured_item=get_field("home_page_zaproduct_featured_item","option"); 
										$args=array(
											"post_type"=>"zaproduct",
											"p"=>@$home_page_zaproduct_featured_item,
										);
										$the_query=new WP_Query($args);
										if($the_query->have_posts()){
											while ($the_query->have_posts()) {
												$the_query->the_post();
												$post_id=$the_query->post->ID;                                                       
												$permalink=get_the_permalink(@$post_id);					
												$title=get_the_title(@$post_id);					
												$excerpt=get_the_excerpt(@$post_id);		
												$featured_img=get_the_post_thumbnail_url(@$post_id, 'full');	
												?>
												<div class="f-category-left">
													<div>
														<a href="<?php echo @$permalink; ?>">
															<figure>
																<div style="background-image: url('<?php echo @$featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (220/155));"></div>	
															</figure>
														</a>
													</div>											
													<div class="ranet">
														<a href="<?php echo @$permalink; ?>">Tham gia bình luận cùng MẪU NHÀ MỚI</a>
													</div>											
												</div>	
												<div class="f-category-right">
													<h3 class="y-kien"><a href="<?php echo @$permalink; ?>"><?php echo @$title; ?></a></h3>
													<div class="margin-top-15"><?php echo @$excerpt; ?></div>
													<div class="margin-top-5">Bình luận :</div>
													<div class="lp-comment">
														<a href="javascript:void(0);">Mời bạn tham gia bình luận cùng chúng tôi</a>
													</div>
												</div>	
												<div class="clr"></div>				
												<?php
											}
											wp_reset_postdata();
										}
										?>																				
									</div>
									<div class="col-md-4">
										<?php 
										$home_page_zaproduct_related_rpt=get_field("home_page_zaproduct_related_rpt","option");																		
										foreach ($home_page_zaproduct_related_rpt as $key => $value) { 
											$args=array(
												"post_type"=>"zaproduct",
												"p"=>@$value["home_page_zaproduct_related_item"],
											);
											$the_query=new WP_Query($args);
											if($the_query->have_posts()){
												while ($the_query->have_posts()) {
													$the_query->the_post();
													$post_id=$the_query->post->ID;                                                       
													$permalink=get_the_permalink(@$post_id);					
													$title=get_the_title(@$post_id);					
													$excerpt=get_the_excerpt(@$post_id);		
													$featured_img=get_the_post_thumbnail_url(@$post_id, 'full');	
													?>
													<div class="bao-gia">
														<div class="bao-gia-left">
															<div>
																<a href="<?php echo @$permalink; ?>">
																	<figure>
																		<div style="background-image: url('<?php echo @$featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (100/100));"></div>	
																	</figure>
																</a>
															</div>																						
														</div>
														<div class="bao-gia-right">
															<h4 class="nam-nay"><a href="<?php echo @$permalink; ?>"><?php echo @$title; ?></a></h4>
														</div>
														<div class="clr"></div>
													</div>
													<?php
												}
												wp_reset_postdata();
											}											
										}
										?>										
									</div>
								</div>
							</div>
							<?php 
							$home_page_zaproduct_group_rpt=get_field("home_page_zaproduct_group_rpt","option");
							foreach ($home_page_zaproduct_group_rpt as $key => $value) {
								$home_page_zaproduct_content_bottom_rpt=@$value["home_page_zaproduct_content_bottom_rpt"];
								$home_page_zaproduct_content_bottom_title=@$value["home_page_zaproduct_content_bottom_title"];								
								?>
								<h2 class="tham-gia-thiet-ke margin-top-30"><?php echo @$home_page_zaproduct_content_bottom_title; ?></h2>
								<div class="margin-top-5">
									<?php 
									$k=0;
									foreach ($home_page_zaproduct_content_bottom_rpt as $key => $value) { 
										if($k%2==0){
											echo '<div class="row">';
										}
										$args=array(
											"post_type"=>"zaproduct",
											"p"=>@$value["home_page_zaproduct_content_bottom_item"],
										);
										$the_query=new WP_Query($args);
										if($the_query->have_posts()){
											while ($the_query->have_posts()){
												$the_query->the_post();
												$post_id=$the_query->post->ID;                                                       
												$permalink=get_the_permalink(@$post_id);					
												$title=get_the_title(@$post_id);					
												$excerpt=get_the_excerpt(@$post_id);		
												$featured_img=get_the_post_thumbnail_url(@$post_id, 'full');	
											}
											wp_reset_postdata();
										}
										?>
										<div class="col-md-6">
											<div class="mau-nha">
												<div class="mau-nha-left">
													<a href="<?php echo @$permalink; ?>">
														<figure>
															<div style="background-image: url('<?php echo @$featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (100/100));"></div>	
														</figure>
													</a>
												</div>
												<div class="mau-nha-right">
													<h3 class="mau-nha-right-title"><a href="<?php echo @$permalink; ?>"><?php echo @$title; ?></a></h3>
													<div class="readmore"><a href="<?php echo @$permalink; ?>">Xem chi tiết</a></div>
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
								<?php
							}
							?>
							<!--<h2 class="tham-gia-thiet-ke margin-top-30">Tham gia thiết kế</h2>
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
							</div>-->
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
					<?php include get_template_directory()."/block/block-google-map.php"; ?>
				</div>				
			</div>
		</div>
	</div>
	<?php
	get_footer();
	?>