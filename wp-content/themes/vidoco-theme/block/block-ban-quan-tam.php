<?php 
$sidebar_right_product_interested_rpt=get_field("sidebar_right_product_interested_rpt","option");
if(count(@$sidebar_right_product_interested_rpt)){
	?>
	<div class="total-right co-the-ban-se-quan-tam-block">
		<div class="h-total-right">
			<h3 class="h-total-right-tieu-de">Có thể bạn sẽ quan tâm</h3>
			<div class="clr"></div>
		</div>
		<div class="co-the-ban-se-quan-tam-box">
			<ul>
				<?php 
				foreach ($sidebar_right_product_interested_rpt as $key => $value) { 
					$args=array(
						"post_type"=>"zaproduct",
						"p"=>@$value["sidebar_right_product_interested_item"]
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
							<li><a href="<?php echo @$permalink; ?>"><?php echo @$title; ?></a></li>
							<?php
						}
						wp_reset_postdata();
					}					
				}
				?>			
			</ul>
		</div>
	</div>	
	<?php	
}
?>
