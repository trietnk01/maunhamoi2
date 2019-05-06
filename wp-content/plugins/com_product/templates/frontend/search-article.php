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
$args=array();
$q='';
if(isset($_POST['q'])){
    $q=trim($_POST['q']);
}
if(!empty(@$q)){
    $args = array(
        'post_type' => 'post',  
        'orderby' => 'id',
        'order'   => 'DESC'                    
    );  
    $args['s'] =@$q;
}
if(!empty(@$_POST["filter_page"]))          {
	$currentPage=@$_POST["filter_page"];  
}
if(!empty(@$zendvn_sp_settings["article_number"])){
	$totalItemsPerPage=(int)@$zendvn_sp_settings["article_number"];        
}
if(count($args) > 0){
    $the_query = new WP_Query( $args );    
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
<div class="slideshow_child_page">        
	<div class="full_width">
		<div class="full_width_inner">		
			<div class="vc_row wpb_row section vc_row-fluid grid_section ">
				<div class="section_inner clearfix">
					<div class="section_inner_margin clearfix">
						<div class="wpb_column vc_column_container vc_col-sm-12">
							<div class="vc_column-inner">
								<div class="wpb_wrapper">
									<h2 class="single_cat">TÌM KIẾM BÀI VIẾT</h2>
									<div class="slide_breadcrumb">
										<ul itemscope="" itemtype="http://schema.org/BreadcrumbList" class="mybreadcrumb">
											<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
												<a itemscope="" itemtype="http://schema.org/Thing"  itemprop="item" id="<?php echo site_url('/'); ?>" href="<?php echo site_url('/'); ?>">
													<span itemprop="name">Trang chủ</span>													
												</a>
												<span>|</span>

												<meta itemprop="position" content="1">												
											</li>
											
											<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
												<a itemscope="" itemtype="http://schema.org/Thing" itemprop="item" id="<?php echo site_url(); ?>" href="<?php echo site_url(); ?>">
													<span itemprop="name">TÌM KIẾM BÀI VIẾT</span>														
												</a>								

												<meta itemprop="position" content="2">												
											</li>														
										</ul>
									</div>				
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="full_width">
	<div class="full_width_inner">      
		<div class="vc_row wpb_row section vc_row-fluid grid_section ">
			<div class="section_inner clearfix">                
				<div class="section_inner_margin clearfix">
					<div class="wpb_column vc_column_container vc_col-sm-3">
						<div class="vc_column-inner">
							<div class="wpb_wrapper">
								<?php do_shortcode('[side_bar]'); ?>
							</div>
						</div>
					</div>
					<div class="wpb_column vc_column_container vc_col-sm-9">
						<div class="vc_column-inner">
							<div class="wpb_wrapper">
								<form  method="post"  class="frm" name="frm">
									<h1 style="display: none;"><?php echo get_bloginfo( 'name','' ); ?></h1> 
									<input type="hidden" name="filter_page" value="1" /> 
									<input type="hidden" name="q" value="'.@$q.'" />                                   
									<?php 
									$intro='';
									$description='';
									if(is_archive()){
										$term_id = get_queried_object_id();
										$source_term= get_term_by('id', $term_id, 'category');              
										$intro=get_field('intro',$source_term); 
										$description=$source_term->description;
									}                                                   
									if($the_query->have_posts()){      
										?>
										<div class="ratafata">
											<?php 
											while ($the_query->have_posts()){
												$the_query->the_post();
												$post_id=$the_query->post->ID;                                                                      
												$permalink=get_the_permalink($post_id);
												$title=get_the_title($post_id);         
												$date_post=get_the_date('l , j F , Y H:i',@$post_id);                                                       
												$featured_image="";
												$thumbnail=get_the_post_thumbnail_url($post_id, 'full');    
												if(!empty($thumbnail)){
													$featured_image=$thumbnail;
												}else{
													$featured_image=site_url("wp-content/uploads/gioi-thieu-450x250.jpg");
												}       
												$intro=get_post_meta($post_id,"intro",true);     
												$intro=mb_substr($intro, 0,200).'...';      
												$count_view_post=get_post_meta( $post_id, 'count_view_post', true );   
												$term = wp_get_object_terms( $post_id,  'category' );       
												?>
												<div class="category_news">
													<div class="section_inner_margin clearfix">
														<div class="wpb_column vc_column_container vc_col-sm-6">
															<div class="vc_column-inner">
																<div class="wpb_wrapper">
																	<a href="<?php echo @$permalink; ?>">
																		<img src="<?php echo @$featured_image; ?>" title="<?php echo @$title; ?>" alt="<?php echo @$title; ?>">
																	</a>
																</div>
															</div>
														</div>
														<div class="wpb_column vc_column_container vc_col-sm-6">
															<div class="vc_column-inner">
																<div class="wpb_wrapper">
																	<div class="date_post"><?php echo @$date_post; ?></div>
																	<h3 class="box_featured_news_title"><a href="<?php echo @$permalink; ?>"><?php echo @$title; ?></a></h3>
																	<div class="box_featured_news_intro"><?php echo @$intro; ?></div>   
																	<div class="category_social_share">
																		<div>
																			<div class="fb-share-button" data-href="<?php echo @$permalink; ?>" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
																		</div>                                                                  
																		<div class="category_twitter"><a href="<?php echo @$permalink; ?>" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></div>
																		<div class="category_linkedin">
																			<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
																			<script type="IN/Share" data-url="<?php echo @$permalink; ?>"></script>
																		</div>
																		<div class="category_g_plus">
																			<div class="g-plus" data-action="share" data-annotation="none" data-height="24" data-href="<?php echo @$permalink; ?>"></div>
																		</div>
																	</div>  
																</div>
															</div>
														</div>
													</div>              
												</div>                                                                                                  
												<?php                                                                           
											}
											?>
										</div>
										<?php                                                                                               
										wp_reset_postdata(); 
										?>                                      
										<div>
											<?php echo $pagination->showPagination(); ?>        
										</div>                                          
										<?php                                 
									}else{
										?>                                      
										<div>
											<center>Đang cập nhật</center>
										</div>                                          
										<?php
									}       
									?>                  
								</form>                                 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>                              
	</div>
</div>    
<?php 
get_footer(); 
wp_footer();
?>