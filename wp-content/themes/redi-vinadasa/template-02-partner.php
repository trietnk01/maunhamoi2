<?php
/*
Template name: Template đối tác
Template Post Type: post, page
*/
get_header();
?>
<div class="p_box_partner">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="part_title_intro">
					<h1 class="part_title"><?php echo get_field('p_partner_title','option'); ?></h1>		
					<div class="part_intro">
						<?php echo get_field('p_partner_content','option'); ?>
					</div>								
				</div>
				<?php 
				$source_logo=get_field('p_partner_logo_rpt','option');
				if(count($source_logo) > 0){
					?>
					<div class="box_outline_partner">
						<?php 
						foreach ($source_logo as $key => $value) { 
							?>
							<div class="box_partner_logo" >					
								<div style="background-image: url(<?php echo $value['p_partner_logo_img']; ?>);"></div>			
							</div>
							<?php
						}
						?>	
						<div class="clr"></div>	
					</div>
					<?php
				}
				?>				
			</div>
		</div>
	</div>
</div>
<?php
get_footer(); 
?>