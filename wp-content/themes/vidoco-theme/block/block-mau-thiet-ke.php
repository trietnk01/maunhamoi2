<?php 
$sidebar_right_product_block_rpt=get_field("sidebar_right_product_block_rpt","option");
foreach ($sidebar_right_product_block_rpt as $key => $value) {
	?>
	<div class="total-right mau-thiet-ke-block">
		<div class="h-total-right">
			<h3 class="h-total-right-tieu-de"><?php echo @$value["sidebar_right_product_block_title"]; ?></h3>
			<div class="clr"></div>
		</div>
		<?php 
		if(count(@$value["sidebar_right_product_block_list"])){
			?>
			<div class="margin-top-5 bo-mau-thiet-ke">
				<?php 
				foreach (@$value["sidebar_right_product_block_list"] as $key => $value) {
					$args=array(
						"post_type"=>"zaproduct",
						"p"=>@$value["sidebar_right_product_block_item"]
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
											<div style="background-image: url('<?php echo @$featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (100/100));"></div>	
										</figure>
									</a>					
								</div>
								<h4 class="mau-thiet-ke-right"><a href="<?php echo @$permalink; ?>"><?php echo @$title; ?></a></h4>
								<div class="clr"></div>
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
		?>		
	</div>
	<?php
}
?>
