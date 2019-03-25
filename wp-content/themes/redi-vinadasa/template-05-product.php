<?php
/*
Template name: Template sản phẩm
Template Post Type: post, page
*/
get_header();
global $zController;
$productModel=$zController->getModel("/frontend","ProductModel");
/* start set the_query */
$the_query=null;
if(is_page()){
	$args = array(
		'post_type' => 'zaproduct',  
		'orderby' => 'id',
		'order'   => 'DESC',  				   
	);
	if(isset($_POST['sortname'])){
		if(!empty($_POST['sortname'])){
			$sortvalue=$_POST['sortname'];
			$args['orderby']='title';
			$args['order']=$sortvalue;
		}
	}
	if(isset($_POST['thuonghieu'])){
		$source_trade=$_POST['thuonghieu'];
		if(count(@$source_trade) > 0){
			$args_tax_query=array(
				'taxonomy' => 'za_trade',
				'field'    => 'id',
				'terms'    => $source_trade,                  
			);
			$args['tax_query']=array($args_tax_query);
		}		
	}	
	if(isset($_POST['vungmien'])){
		$source_trade=$_POST['vungmien'];
		if(count(@$source_trade) > 0){
			$args_tax_query=array(
				'taxonomy' => 'za_vungmien',
				'field'    => 'id',
				'terms'    => $source_trade,                  
			);
			$args['tax_query']=array($args_tax_query);
		}		
	}	
	$the_query = new WP_Query( $args );  		
}else{
	$args = $wp_query->query;	
	$args['orderby']='id';
	$args['order']='DESC';
	if(isset($_POST['sortname'])){
		if(!empty($_POST['sortname'])){			
			$sortvalue=$_POST['sortname'];
			$args['orderby']='title';
			$args['order']=$sortvalue;			
		}		
	}	
	if(isset($_POST['thuonghieu'])){
		$source_trade=$_POST['thuonghieu'];
		if(count(@$source_trade) > 0){
			$args_tax_query=array(
				'taxonomy' => 'za_trade',
				'field'    => 'id',
				'terms'    => $source_trade,                  
			);
			$args['tax_query']=array($args_tax_query);
		}		
	}	
	$wp_query->query($args);
	$the_query=$wp_query;		
}
/* end set the_query */

/* start setup pagination */
$totalItemsPerPage=15;
if(isset($_POST['thuonghieu'])){
	if(!empty($_POST['thuonghieu'])){
		$totalItemsPerPage=999999;
	}	
}
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
<div class="box_product">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<?php include get_template_directory() . "/block/block-category-product.php"; ?>
			</div>
			<div class="col-lg-9">
				<div class="box_product_title_order">
					<h1 class="box_product_title">
						<?php 
						if(is_page()){
							if(have_posts()){
								while(have_posts()){
									the_post();
									the_title();
								}
								wp_reset_postdata();  
							}
						}else{
							single_cat_title();
						}
						?>
					</h1>
					<div class="box_product_order">
						<div class="box_product_sap_xep">Sắp xếp:</div>
						<form class="box_product_ddl" method="POST">
							<?php 
							$sortvalue='';
							if(isset($_POST['sortname'])){
								$sortvalue=@$_POST['sortname'];
							}
							$dataorder=array(
								''=>'Mặc định',
								'ASC'=>'Tăng dần',
								'DESC'=>'Giảm dần',								
							);
							?>
							<select name="sortname" class="order_name" onchange="this.form.submit();">
								<?php 
								foreach ($dataorder as $key => $value) {
									if(strcmp(mb_strtolower($sortvalue),mb_strtolower($key)) == 0){
										?>
										<option value="<?php echo $key; ?>" selected ><?php echo $value; ?></option>		
										<?php
									}else{
										?>
										<option value="<?php echo $key; ?>"><?php echo $value; ?></option>		
										<?php
									}
								}
								?>								
							</select>
							<div class="ddl_i"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
						</form>
						<div class="clr"></div>
					</div>
					<div class="clr"></div>
				</div>
				<form name="frm_prduct_lst" method="POST">
					<input type="hidden" name="filter_page" value="1" />
					<?php 				    			      	
					if($the_query->have_posts()){
						?>
						<div class="product_lst" >
							
							<?php 						
							$k=0;
							while ($the_query->have_posts()) {
								$the_query->the_post();
								$post_id=$the_query->post->ID;		
								$title=get_the_title($post_id);																
								$permalink=get_the_permalink($post_id);
								$featured_img=get_the_post_thumbnail_url($post_id, 'full');	
								if($k%3 == 0){
									echo '<div class="row">';
								}
								?>
								<div class="col-sm-4">
									<div class="bx_pr_item2">
										<h3 class="bx_pr_item_title"><a href="<?php echo $permalink; ?>" title="sanpham"><?php echo $title; ?></a></h3>
										<div class="bx_pr_item_img">										
											<a href="<?php echo $permalink; ?>">
												<figure>
													<div style="background-image: url(<?php echo @$featured_img; ?>);background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (200 / 200))"></div>
												</figure>						
											</a>	
										</div>
										<div class="bx_pr_item_detail">
											<a href="<?php echo $permalink; ?>">Chi tiết</a>
										</div>
									</div>
								</div>
								<?php
								$k++;
								if($k%3 == 0 || $k==$the_query->post_count){
									echo '</div>';
								}		
							}						
							?>								
						</div>	
						<?php									
						wp_reset_postdata();  
						echo @$pagination->showPagination(); 
					}					
					?>				
				</form>								
			</div>
		</div>
	</div>
</div>
<?php
include get_template_directory() . "/block/block-partner.php";
get_footer(); 
?>