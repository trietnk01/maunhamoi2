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
					$date_post=get_the_date('d/m/Y',@$post_id);
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
						<div class="margin-top-5"><?php echo @$excerpt; ?></div>
						<div class="margin-top-5 tham-gia-date-post">
							<span><i class="far fa-clock"></i></span><span class="margin-left-5"><?php echo @$date_post; ?></span><span class="margin-left-5"><i class="far fa-heart"></i></span>
						</div>
						<div class="clr"></div>
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
						$date_post=get_the_date('d/m/Y',@$post_id);
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
								<h4 class="nam-nay"><a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words( @$title, 7, null ) ?></a></h4>
								<div class="margin-top-5 icon-heart">
									<span><i class="far fa-clock"></i></span><span class="margin-left-5"><?php echo @$date_post; ?></span><span class="margin-left-5"><i class="far fa-heart"></i></span>
								</div>
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
<h2 class="tham-gia-thiet-ke">Thư viện kiến trúc | Trải Nghiệm Bài Viết Để Có Kinh Nghiêm Xây Nhà</h2>
<div class="border-product-homepage">
	<div class="box-category-hp-title">
		Nội thất đẹp
		<div class="tin-xem-nhieu">Tin xem nhiều</div>
	</div>
	<div class="box-product-hp-wrapper">
		<div class="row">
			<div class="col-md-8">
				<?php
				$args = array(
					'post_type' => 'zaproduct',
					'orderby' => 'id',
					'order'   => 'DESC',
					'posts_per_page' => 3,
					'tax_query' => array(
						array(
							'taxonomy' => 'za_category',
							'field'    => 'slug',
							'terms'    => array("noi-that"),
						),
					),
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
						$date_post=get_the_date('d/m/Y',@$post_id);
						?>
						<div class="box-product-category-hp-1">
							<div class="box-pd-hp-left">
								<div class="featured-img-border">
									<a href="<?php echo @$permalink; ?>">
										<figure>
											<div style="background-image:url('<?php echo @$featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (400/300))"></div>
										</figure>
									</a>
								</div>
							</div>
							<div class="box-pd-hp-right">
								<h3 class="product-hp-title"><a href="javascript:void(0);"><?php echo wp_trim_words( @$title, 13,  null ); ?></a></h3>
								<div class="product-hp-excerpt"><?php echo wp_trim_words( @$excerpt, 25,null ) ; ?></div>
							</div>
							<div class="clr"></div>
						</div>
						<?php
					}
					wp_reset_postdata();
				}
				?>
			</div>
			<div class="col-md-4">
				<div class="tin-xem-nhieu-wrapper">
					<?php
					$args = array(
						'post_type' => 'zaproduct',
						'orderby' => 'id',
						'order'   => 'DESC',
						'posts_per_page' => 3,
						'tax_query' => array(
							array(
								'taxonomy' => 'za_category',
								'field'    => 'slug',
								'terms'    => array("noi-that-dep-tin-xem-nhieu"),
							),
						),
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
							$date_post=get_the_date('d/m/Y',@$post_id);
							?>
							<div class="tin-xem-nhieu-box">
								<div class="tin-xem-nhieu-bx-left">
									<a href="<?php echo @$permalink; ?>">
										<figure>
											<div style="background-image:url('<?php echo @$featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (400/300))"></div>
										</figure>
									</a>

								</div>
								<div class="tin-xem-nhieu-bx-right">
									<h3 class="tin-xem-nhieu-h3"><a href="javascript:void(0);"><?php echo wp_trim_words( @$title, 9, null ) ?></a></h3>
									<div class="margin-top-5 tham-gia-date-post">
										<span><i class="far fa-clock"></i></span><span class="margin-left-5"><?php echo @$date_post; ?></span><span class="margin-left-5"><i class="far fa-heart"></i></span>
									</div>
								</div>
								<div class="clr"></div>
							</div>
							<?php
						}
						wp_reset_postdata();
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="border-product-homepage margin-top-10">
	<div class="box-category-hp-title">
		Kiến trúc đẹp
		<div class="tin-xem-nhieu">Tin xem nhiều</div>
	</div>
	<div class="box-product-hp-wrapper">
		<div class="row">
			<div class="col-md-8">
				<?php
				$args = array(
					'post_type' => 'zaproduct',
					'orderby' => 'id',
					'order'   => 'DESC',
					'posts_per_page' => 3,
					'tax_query' => array(
						array(
							'taxonomy' => 'za_category',
							'field'    => 'slug',
							'terms'    => array("kien-truc-dep"),
						),
					),
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
						$date_post=get_the_date('d/m/Y',@$post_id);
						?>
						<div class="box-product-category-hp-1">
							<div class="box-pd-hp-left">
								<div class="featured-img-border">
									<a href="<?php echo @$permalink; ?>">
										<figure>
											<div style="background-image:url('<?php echo @$featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (400/300))"></div>
										</figure>
									</a>
								</div>
							</div>
							<div class="box-pd-hp-right">
								<h3 class="product-hp-title"><a href="javascript:void(0);"><?php echo wp_trim_words( @$title, 13,  null ); ?></a></h3>
								<div class="product-hp-excerpt"><?php echo wp_trim_words( @$excerpt, 25,null ) ; ?></div>
							</div>
							<div class="clr"></div>
						</div>
						<?php
					}
					wp_reset_postdata();
				}
				?>
			</div>
			<div class="col-md-4">
				<div class="tin-xem-nhieu-wrapper">
					<?php
					$args = array(
						'post_type' => 'zaproduct',
						'orderby' => 'id',
						'order'   => 'DESC',
						'posts_per_page' => 3,
						'tax_query' => array(
							array(
								'taxonomy' => 'za_category',
								'field'    => 'slug',
								'terms'    => array("kien-truc-dep-tin-xem-nhieu"),
							),
						),
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
							$date_post=get_the_date('d/m/Y',@$post_id);
							?>
							<div class="tin-xem-nhieu-box">
								<div class="tin-xem-nhieu-bx-left">
									<a href="<?php echo @$permalink; ?>">
										<figure><div style="background-image: url('<?php echo @$featured_img; ?>');background-size: cover;background-repeat: no-repeat;padding-top: calc(100%/(100/100));"></div></figure>
									</a>
								</div>
								<div class="tin-xem-nhieu-bx-right">
									<h3 class="tin-xem-nhieu-h3"><a href="javascript:void(0);"><?php echo wp_trim_words( @$title, 10, null ) ?></a></h3>
									<div class="margin-top-5 tham-gia-date-post">
										<span><i class="far fa-clock"></i></span><span class="margin-left-5"><?php echo @$date_post; ?></span><span class="margin-left-5"><i class="far fa-heart"></i></span>
									</div>
								</div>
								<div class="clr"></div>
							</div>
							<?php
						}
						wp_reset_postdata();
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="border-product-homepage margin-top-10">
	<div class="box-category-hp-title">
		Không gian đẹp
		<div class="tin-xem-nhieu">Tin xem nhiều</div>
	</div>
	<div class="box-product-hp-wrapper">
		<div class="row">
			<div class="col-md-8">
				<?php
				$args = array(
					'post_type' => 'zaproduct',
					'orderby' => 'id',
					'order'   => 'DESC',
					'posts_per_page' => 3,
					'tax_query' => array(
						array(
							'taxonomy' => 'za_category',
							'field'    => 'slug',
							'terms'    => array("khong-gian-dep"),
						),
					),
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
						$date_post=get_the_date('d/m/Y',@$post_id);
						?>
						<div class="box-product-category-hp-1">
							<div class="box-pd-hp-left">
								<div class="featured-img-border">
									<a href="<?php echo @$permalink; ?>">
										<figure>
											<div style="background-image:url('<?php echo @$featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (400/300))"></div>
										</figure>
									</a>
								</div>
							</div>
							<div class="box-pd-hp-right">
								<h3 class="product-hp-title"><a href="javascript:void(0);"><?php echo wp_trim_words( @$title, 13,  null ); ?></a></h3>
								<div class="product-hp-excerpt"><?php echo wp_trim_words( @$excerpt, 25,null ) ; ?></div>
							</div>
							<div class="clr"></div>
						</div>
						<?php
					}
					wp_reset_postdata();
				}
				?>
			</div>
			<div class="col-md-4">
				<div class="tin-xem-nhieu-wrapper">
					<?php
					$args = array(
						'post_type' => 'zaproduct',
						'orderby' => 'id',
						'order'   => 'DESC',
						'posts_per_page' => 3,
						'tax_query' => array(
							array(
								'taxonomy' => 'za_category',
								'field'    => 'slug',
								'terms'    => array("khong-gian-dep-tin-xem-nhieu"),
							),
						),
					);
					if($the_query->have_posts()){
						while ($the_query->have_posts()) {
							$the_query->the_post();
							$post_id=$the_query->post->ID;
							$permalink=get_the_permalink(@$post_id);
							$title=get_the_title(@$post_id);
							$excerpt=get_the_excerpt(@$post_id);
							$featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
							$date_post=get_the_date('d/m/Y',@$post_id);
							?>
							<div class="tin-xem-nhieu-box">
								<div class="tin-xem-nhieu-bx-left">
									<a href="<?php echo @$permalink; ?>">
										<figure><div style="background-image: url('<?php echo @$featured_img; ?>');background-size: cover;background-repeat: no-repeat;padding-top: calc(100%/(100/100));"></div></figure>
									</a>
								</div>
								<div class="tin-xem-nhieu-bx-right">
									<h3 class="tin-xem-nhieu-h3"><a href="javascript:void(0);"><?php echo wp_trim_words(@$title, 10, null ) ?></a></h3>
									<div class="margin-top-5 tham-gia-date-post">
										<span><i class="far fa-clock"></i></span><span class="margin-left-5"><?php echo @$date_post; ?></span><span class="margin-left-5"><i class="far fa-heart"></i></span>
									</div>
								</div>
								<div class="clr"></div>
							</div>
							<?php
						}
						wp_reset_postdata();
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>