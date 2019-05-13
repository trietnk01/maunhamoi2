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
						<div class="col-lg-9">
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
												<div class="duong-vien">
													<h3 class="title-category-frontend"><a href="<?php echo @$term_za_category_link; ?>"><?php echo $term_za_category_data->description; ?></a></h3>
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
							<h2 class="tham-gia-thiet-ke-2">Tham gia thiết kế cùng mẫu nhà mới - Bằng ý kiến của mình</h2>
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
								<div class="border-product-homepage">
									<h2 class="tham-gia-thiet-ke"><?php echo @$home_page_zaproduct_content_bottom_title; ?></h2>
									<div class="box-category-hp-title">
										Nội thất đẹp
										<div class="tin-xem-nhieu">Tin xem nhiều</div>
									</div>
									<div class="box-product-hp-wrapper">
										<div class="row">
											<div class="col-md-8">
												<?php
												for ($i=0; $i < 3; $i++) {
													?>
													<div class="box-product-category-hp-1">
														<div class="box-pd-hp-left">
															<div class="featured-img-border">
																<a href="javascript:void(0);">
																	<div style="background-image:url('<?php echo wp_upload_dir()["url"]."/Phoi-canh-nha-pho-3-tang-kich-thuoc-4x14m-view-2-350x230-5.jpg"; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (400/300))"></div>
																</a>
															</div>
														</div>
														<div class="box-pd-hp-right">
															<h3 class="product-hp-title"><a href="javascript:void(0);"><?php echo wp_trim_words( "Giải mã phong cách trang trí nội thất đẹp của cung Bạch Dương (21/3 – 20/4)", 13,  null ); ?></a></h3>
															<div class="product-hp-excerpt">Theo chiêm tinh học phương Tây, mỗi người khi sinh ra đều chịu ảnh hưởng mạnh mẽ từ các cung hoàng đạo. Hiểu một cách đơn giản, khi các hành tinh đi</div>
														</div>
														<div class="clr"></div>
													</div>
													<?php
												}
												?>
											</div>
											<div class="col-md-4">
												<div class="tin-xem-nhieu-wrapper">
													<?php
													for ($i=0; $i < 3; $i++) {
														?>
														<div class="tin-xem-nhieu-box">
															<div class="tin-xem-nhieu-bx-left">
																<div style="background-image: url('<?php echo wp_upload_dir()["url"]."/Phoi-canh-nha-pho-3-tang-kich-thuoc-4x14m-view-2-350x230-5.jpg"; ?>');background-size: cover;background-repeat: no-repeat;padding-top: calc(100%/(100/100));"></div>
															</div>
															<div class="tin-xem-nhieu-bx-right">
																<h3 class="tin-xem-nhieu-h3"><a href="javascript:void(0);"><?php echo wp_trim_words( "10 Mẫu Thiết Kế Nội Thất Phòng Khách Đẹp Hiện Đại 2019", 10, null ) ?></a></h3>
															</div>
															<div class="clr"></div>
														</div>
														<?php
													}
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php
							}
							?>
						</div>
						<div class="col-lg-3">
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