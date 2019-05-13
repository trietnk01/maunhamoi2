<div class="total-right mau-thiet-ke-block">
	<div class="h-total-right">
		<h3 class="h-total-right-tieu-de">Mẫu thiết kế nổi bật</h3>
		<div class="clr"></div>
	</div>
	<div class="margin-top-5 bo-mau-thiet-ke">
		<?php
		$args = array(
			'post_type' => 'zaproduct',
			'orderby' => 'id',
			'order'   => 'DESC',
			'posts_per_page' => 4,
			'tax_query' => array(
				array(
					'taxonomy' => 'za_category',
					'field'    => 'slug',
					'terms'    => array("mau-thiet-ke-noi-bat"),
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
				<div class="roda-mau-thiet-ke">
					<div class="mau-thiet-ke-left">
						<a href="<?php echo @$permalink; ?>">
							<figure>
								<div style="background-image: url('<?php echo @$featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (100/100));"></div>
							</figure>
						</a>
					</div>
					<div class="mau-thiet-ke-right">
						<h4 class="mau-thiet-ke-right-h4"><a href="<?php echo @$permalink; ?>"><?php echo @$title; ?></a></h4>
						<div class="margin-top-10 icon-heart">
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
<div class="total-right mau-thiet-ke-block">
	<div class="h-total-right">
		<h3 class="h-total-right-tieu-de">Mẫu thiết kế phổ biến</h3>
		<div class="clr"></div>
	</div>
	<div class="margin-top-5 bo-mau-thiet-ke">
		<?php
		$args = array(
			'post_type' => 'zaproduct',
			'orderby' => 'id',
			'order'   => 'DESC',
			'posts_per_page' => 4,
			'tax_query' => array(
				array(
					'taxonomy' => 'za_category',
					'field'    => 'slug',
					'terms'    => array("mau-thiet-ke-pho-bien"),
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
				<div class="roda-mau-thiet-ke">
					<div class="mau-thiet-ke-left">
						<a href="<?php echo @$permalink; ?>">
							<figure>
								<div style="background-image: url('<?php echo @$featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (100/100));"></div>
							</figure>
						</a>
					</div>
					<div class="mau-thiet-ke-right">
						<h4 class="mau-thiet-ke-right-h4"><a href="<?php echo @$permalink; ?>"><?php echo @$title; ?></a></h4>
						<div class="margin-top-10 icon-heart">
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

