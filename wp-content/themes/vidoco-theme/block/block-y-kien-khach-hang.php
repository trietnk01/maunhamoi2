<?php
$args = array(
	'author_email' => '',
	'author_url' => '',
	'author__in' => '',
	'author__not_in' => '',
	'include_unapproved' => '',
	'fields' => '',
	'ID' => '',
	'comment__in' => '',
	'comment__not_in' => '',
	'karma' => '',
	'number' => '',
	'offset' => '',
	'no_found_rows' => true,
	'orderby' => '',
	'order' => 'DESC',
	'parent' => '',
	'parent__in' => '',
	'parent__not_in' => '',
	'post_author__in' => '',
	'post_author__not_in' => '',
	'post_id' => 0,
	'post__in' => '',
	'post__not_in' => '',
	'post_author' => '',
	'post_name' => '',
	'post_parent' => '',
	'post_status' => '',
	'post_type' => '',
	'status' => 'all',
	'type' => '',
	'type__in' => '',
	'type__not_in' => '',
	'user_id' => '',
	'search' => '',
	'hierarchical' => false,
	'count' => false,
	'cache_domain' => 'core',
	'meta_key' => '',
	'meta_value' => '',
	'meta_query' => '',
    'date_query' => null, // See WP_Date_Query
    'update_comment_meta_cache' => true,
    'update_comment_post_cache' => false,
);
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query( $args );
if(count(@$comments)>0){
	?>
	<div class="total-right mau-thiet-ke-block">
		<div class="h-total-right">
			<h3 class="h-total-right-tieu-de">Ý kiến khách hàng</h3>
			<div class="clr"></div>
		</div>
		<div class="margin-top-5 bo-mau-thiet-ke">
			<?php
			foreach ($comments as $key => $value) {
				$args=array(
						"post_type"=>"post",
						"p"=>(float)@$value->comment_post_ID,
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
						<div class="roda-mau-thiet-ke">
							<div class="mau-thiet-ke-left">
								<a href="<?php echo @$permalink; ?>">
									<figure>
										<div style="background-image: url('<?php echo wp_get_upload_dir()["url"].'/no-user-image.gif'; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (100/100));"></div>
									</figure>
								</a>
							</div>
							<div class="mau-thiet-ke-right">
								<h4 class="mau-thiet-ke-right-h4"><a href="<?php echo @$permalink; ?>"><?php echo @$value->comment_author; ?></a></h4>
								<div class="margin-top-10 icon-heart">
									<span><i class="far fa-clock"></i></span><span class="margin-left-5"><?php echo @$date_post; ?></span><span class="margin-left-5"><i class="far fa-heart"></i></span>
								</div>
								<div class="margin-top-5"><?php echo @$value->comment_content; ?></div>
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
	<?php
}
?>
