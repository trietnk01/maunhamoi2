<?php
/*
	Home template default
*/	
	get_header();
	?>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="body-bg">
					<div class="row">
						<div class="col-lg-8">
							<div class="owl-carousel-banner owl-carousel owl-theme owl-loaded">	
								<?php 
								for ($i=0;$i<10;$i++) {
									?>
									<div class="item">
										<div style="background-image: url('<?php echo get_template_directory_uri()."/assets/images/biet-thu-1.jpg" ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (775/415))">				
										</div>			
									</div>								
									<?php									
								}
								?>								
							</div>
						</div>
						<div class="col-lg-4"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	get_footer();
	?>