<?php
/*
	Page - Template
*/


?>

<?php get_header() ?>

<div class="p-ptb-50 p767-ptb-30 p767-ptb-20">
	<div class="container">
		<div class="row">

			<div class="col-12">

				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
					
					<?php 

						if ( have_posts() ) :
							while (have_posts()) : the_post();

								include get_template_directory() . '/loop/loop-single.php';

							

							endwhile; 
						endif; 

					?>

					</main>
				</div>

			</div>
		
			
		</div>
	</div>
</div>


<?php get_footer() ?>