<?php
get_header();
global $zController;
$productModel=$zController->getModel("/frontend","ProductModel");
/* start set the_query */
$the_query=null;

$args = $wp_query->query;
$args['orderby']='id';
$args['order']='DESC';
$wp_query->query($args);
$the_query=$wp_query;	

/* end set the_query */
/* start setup pagination */
$totalItemsPerPage=16;
$pageRange=3;
$currentPage=1; 
if(!empty(@$_POST["filter_page"]))          {
	$currentPage=@$_POST["filter_page"];  
}
$productModel->setWpQuery($the_query);   
$productModel->setPerpage($totalItemsPerPage);        
$productModel->prepare_items();               
$totalItems= $productModel->getTotalItems();               
$arrPagination=array(
	"totalItems"=>$totalItems,
	"totalItemsPerPage"=>$totalItemsPerPage,
	"pageRange"=>$pageRange,
	"currentPage"=>$currentPage   
);    
$pagination=$zController->getPagination("Pagination",$arrPagination); 
/* end setup pagination */
?>
<div class="container">
	<div class="row">
		<div class="col">
			<div class="body-bg">
				<div class="row">
					<div class="col-lg-8">
						<form name="frm_category" method="POST">
							<input type="hidden" name="filter_page" value="1" />
							<h1 class="category-header"><?php single_cat_title(); ?></h1>
							<div class="category-block">
								<?php 
								if($the_query->have_posts()){
									while ($the_query->have_posts()){
										$the_query->the_post();
										$post_id=$the_query->post->ID;		
										$title=get_the_title($post_id);																
										$permalink=get_the_permalink($post_id);
										$featured_img=get_the_post_thumbnail_url($post_id, 'full');	 
										$excerpt=get_field("single_post_excerpt",@$post_id);
										?>
										<div class="category-box">
											<div class="row">
												<div class="col-md-3">
													<a href="<?php echo @$permalink; ?>">
														<figure>
															<div style="background-image: url('<?php echo $featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (800/600))"></div>
														</figure>
													</a>
												</div>
												<div class="col-md-9">
													<h2 class="category-title"><a href="<?php echo @$permalink; ?>"><?php echo @$title; ?></a></h2>
													<div class="category-excerpt">
														<?php echo @$excerpt; ?>
													</div>
												</div>
											</div>
										</div>		
										<?php
									}
									wp_reset_postdata();
								}								
								?>														
							</div>
							<?php echo @$pagination->showPagination();  ?>							
						</form>						
					</div>
					<div class="col-lg-4">
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
			</div>
		</div>
	</div>
</div>
<?php
get_footer(); 
?>