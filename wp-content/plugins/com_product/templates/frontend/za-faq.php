<?php 
get_header(); 
global $zController,$zendvn_sp_settings;    
$vHtml=new HtmlControl();
$productModel=$zController->getModel("/frontend","ProductModel"); 	
$the_query = $wp_query;
$totalItemsPerPage=0;
$pageRange=10;
$currentPage=1; 
$totalItemsPerPage=9;
if(!empty(@$_POST["filter_page"]))          {
	$currentPage=@$_POST["filter_page"];  
}
if(!empty(@$zendvn_sp_settings["article_number"])){
	$totalItemsPerPage=(int)@$zendvn_sp_settings["article_number"];        
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
?>
<div class="full_width">
	<div class="full_width_inner">
		<div class="vc_row wpb_row section vc_row-fluid grid_section">
			<div class="section_inner clearfix">
				<div class="section_inner_margin clearfix">
					<div class="wpb_column vc_column_container vc_col-sm-9">
						<div class="vc_column-inner">
							<div class="wpb_wrapper">
								<form  method="post"  class="frm margin-top-15" name="frm">
									<input type="hidden" name="filter_page" value="1" />									
									<h1 class="single-title"><?php single_cat_title(); ?></h1>							
									<?php           				
									if($the_query->have_posts()){       
										$k=0;						
										while ($the_query->have_posts()){
											$the_query->the_post();
											$post_id=$the_query->post->ID;																		
											$permalink=get_the_permalink($post_id);
											$title=get_the_title($post_id);			
											$date_post=get_the_date('d/m/Y g:i:s',@$post_id);																								
											$count_view_post=get_post_meta( $post_id, 'count_view_post', true );       				
											?>
											<div class="margin-top-15">
												<div>
													<a href="<?php echo @$permalink; ?>" title="<?php echo @$title; ?>" ><?php echo @$title; ?></a>	
												</div>																								
											</div>					
											<?php					             
										}
										wp_reset_postdata(); 
										?><div class="margin-top-15"><?php echo $pagination->showPagination(); ?></div><?php 	      
									}else{
										?>
										<div class="margin-top-15">Đang cập nhật thông tin...</div>
										<?php
									}       
									?>
								</form>			
							</div>
						</div>
					</div>
					<div class="wpb_column vc_column_container vc_col-sm-3">
						<div class="vc_column-inner">
							<div class="wpb_wrapper">
								<?php require_once PLUGIN_PATH . DS . "templates" . DS . "frontend". DS . "sidebar.php"; ?>
							</div>
						</div>
					</div>
				</div>		
			</div>	
		</div>		
	</div>
</div>
<?php get_footer(); ?>
<?php wp_footer();?>