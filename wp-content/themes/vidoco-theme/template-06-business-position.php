<?php
/*
Template name: Template điểm kinh doanh
Template Post Type: post, page
*/
get_header();
global $zController;
$productModel=$zController->getModel("/frontend","ProductModel");
$args = $wp_query->query;	
$args['orderby']='id';
$args['order']='DESC';		 
$wp_query->query($args);
$the_query=$wp_query;	
/* start setup pagination */
$totalItemsPerPage=10;
$pageRange=3;
$currentPage=1; 
if(!empty(@$_GET["trang"]))          {
    $currentPage=@$_GET["trang"];  
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
$pagination=$zController->getPagination("PaginationArticle",$arrPagination); 
/* end setup pagination */
?>
<div class="box_diem_kinh_doanh">
	<div class="container">
		<div class="row">
			<div class="col">
				<h1 class="diem_kd_h"><?php single_cat_title(); ?></h1>
			</div>			
		</div>
		<?php
		$k=0;
		if($the_query->have_posts()){
			while ($the_query->have_posts()) {
				$the_query->the_post();
				$post_id=$the_query->post->ID;                                                                      
				$permalink=get_the_permalink($post_id);         
				$title=get_the_title($post_id);
				$excerpt=wp_trim_words( get_the_excerpt($post_id), 20, '...' ) ;
				$featured_img=get_the_post_thumbnail_url($post_id, 'full'); 
				$date_post='';
				$date_post=get_the_date('d/m/Y',@$post_id);
				if($k%2==0){
					echo '<div class="row">';
				}
				?>
				<div class="col-sm-6">
					<div class="diemkinhdoanh">
						<a href="<?php echo $permalink; ?>">
							<div class="overlay"></div>
							<div class="dkdimg">
								<img src="<?php echo @$featured_img; ?>" alt="<?php echo @$title; ?>">
							</div>
							<div class="business_item_title">
								<h3><?php echo @$title; ?></h3>
							</div>
						</a>
					</div>
				</div>
				<?php  
				$k++;
				if($k%2==0 || $k==10){
					echo '</div>';
				}	   
			}
			wp_reset_postdata();
		}				
		?>	
		<div class="row">
			<div class="col">
				<?php echo @$pagination->showPagination(); ?>		
			</div>			
		</div>	
	</div>
</div>
<?php
include get_template_directory() . "/block/block-partner.php";
get_footer(); 
?>