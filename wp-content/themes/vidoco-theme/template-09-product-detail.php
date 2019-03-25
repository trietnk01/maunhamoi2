<?php
/*
Template name: Template sản phẩm chi tiết
Template Post Type: post, page
*/
get_header();
$post_id=0;
$title="";
$excerpt="";
$content="";
$featured_img="";
$source_term_id=array();
$permalink="";
if(have_posts()){
	while (have_posts()) {
		the_post();                            
        $post_id=get_the_ID(); 
        $title=get_the_title($post_id);    
        $excerpt=get_the_excerpt( $post_id );
        $content=get_the_content( $post_id);
        $permalink=get_the_permalink( $post_id );
        $source_term = wp_get_object_terms( $post_id,  'za_category' );                 
        $featured_img=get_the_post_thumbnail_url($post_id, 'full');                   
        if(count($source_term) > 0){
            foreach ($source_term as $key => $value) {
                $source_term_id[]=$value->term_id;
            }
        }    
	}
	wp_reset_postdata();  
}
$source_thumbnail_rpt=get_field('p_product_thumbnail_rpt',$post_id);
$source_thumbnail_img=array();
$source_thumbnail_img[]=$featured_img;
if( !empty($source_thumbnail_rpt) ){
	foreach ($source_thumbnail_rpt as $key => $value) {
		$source_thumbnail_img[]=$value['p_product_thumbnail_img'];
	}
}
if(isset($_COOKIE['sp_da_xem'])){
	$json_data_sp_da_xem=$_COOKIE['sp_da_xem'];
	$data_sp_da_xem=array();
	$data_sp_da_xem=json_decode( $json_data_sp_da_xem);
	if(!in_array($post_id, $data_sp_da_xem)){
		$data_sp_da_xem[]=$post_id;
		setcookie('sp_da_xem',json_encode($data_sp_da_xem));
	}
}else{
	$data_sp_da_xem=array();	
	$data_sp_da_xem[]=$post_id;		
	setcookie('sp_da_xem',json_encode($data_sp_da_xem),time() + 120);
}
?>
<div class="box_product_detail">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<?php include get_template_directory() . "/block/block-category-product.php"; ?>
			</div>
			<div class="col-lg-9">
				<div class="row">
					<div class="col-lg-5">
						<div class="box_sp_img">
							<div class="box_img_w">
								<a href="<?php echo $featured_img; ?>" class="smlightbox"><img src="<?php echo $featured_img; ?>" alt="<?php echo $title; ?>"/></a>
							</div>
							<div>
								<div class="owl_carousel_product_detail owl-carousel owl-theme owl-loaded">		
									<?php 
									foreach($source_thumbnail_img as $key => $value){
										?>
										<div class="item">
											<a href="javascript:void(0);" title="<?php echo $title; ?>" target="_blank" rel="nofollow" onclick="changeImg('<?php echo $value; ?>','<?php echo $title; ?>');" ><img src="<?php echo $value; ?>" alt="<?php echo $title; ?>"></a>
										</div>
										<?php
									}
									?>																								
								</div>							
							</div>							
						</div>
					</div>
					<div class="col-lg-7">
						<h1 class="product_detail_title"><?php echo @$title; ?></h1>
						<?php 
						$product_status=get_field('p_product_status',$post_id);						
						?>
						<div class="product_detailst">							
							<span>Trạng thái:</span> 
							<?php 
							switch ($product_status) {
								case 't1':
									?>
									<span class="product_detail_status_checked"><i class="fa fa-check" aria-hidden="true"></i></span> 
									<span  class="product_detail_status">Còn hàng</span>
									<?php
									break;
								case 't2'								
									?>
									<span class="product_detail_status_checked"><i class="fa fa-times" aria-hidden="true"></i></span> 
									<span  class="product_detail_status">Hết hàng</span>
									<?php
									break;
							}
							?>							
						</div>
						<div class="product_detail_contact">
							<div class="product_detail_contact_left"><span class="lienhe">Liên hệ</span>   <span class="sdt_lh"><a href="tel:<?php echo get_field('tel_alo','option'); ?>"><?php echo get_field('sdt','option'); ?></a></span></div>
							<div class="product_detail_contact_right">
								<div class="nhanbaogia">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#baogiamodal">
										<div><img src="<?php echo P_IMG.'/ngon-tro.png'; ?>"></div>
										<div class="nbg">Nhận báo giá</div>
									</a>
								</div>
							</div>
							<div class="clr"></div>
						</div>
						<div class="product_l_h"></div>
						<div class="product_detail_intro">
							<?php echo $excerpt;?>
						</div>
						<div class="product_l_h"></div>
						<div>
							<div class="facebook_social">
								<div class="fb-share-button" data-href="<?php echo @$permalink; ?>" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
							</div>
							<div class="twitter_social">
								<a href="<?php echo @$permalink; ?>" class="twitter-share-button" data-show-count="false">Tweet</a>
								<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
							</div>
							<div class="google_social">
								<div class="g-plus" data-action="share" data-annotation="none" data-height="20" data-href="<?php echo @$permalink; ?>"></div>
							</div>
						</div>
						<div class="clr"></div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="product_detail_content">
							<?php 
							if(have_posts()){
								while (have_posts()) {
									the_post();                            
									the_content();
								}
								wp_reset_postdata();  
							}
							?>
						</div>
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>

<?php 
if(count($data_sp_da_xem) > 1){
	?>
	<div class="box_featured_product_v6">
		<div class="box_hp_product_wrapper_title">
			<div class="box_hp_product_title">
				<div>
					<h2>
						Sản phẩm đã xem
					</h2>
				</div>			
			</div>
		</div>	
		<div class="clr"></div>	
		<div class="bx_product">
			<div class="container">
				<div class="row">	
					<?php
					$count_pd_viewed=0;
					$k=0;
					if(count($data_sp_da_xem) <= 3){
						$count_pd_viewed=count($data_sp_da_xem);
						$k=count($data_sp_da_xem)-1;	
					}else{
						$count_pd_viewed=3;
						$k=count($data_sp_da_xem)-2;	
					}								
					if(count($data_sp_da_xem) < 3){
						$count_pd_viewed=count($data_sp_da_xem) - 1;
					}
					for ($i=0; $i < $count_pd_viewed; $i++) { 
						$args = array(
							'post_type' => 'zaproduct',  
							'p'=>$data_sp_da_xem[$k],						
						);
						$the_query=new WP_Query($args);
						if($the_query->have_posts()){
							while ($the_query->have_posts()) {
								$the_query->the_post();
								$post_id=$the_query->post->ID;
								$permalink=get_the_permalink($post_id);
								$title=get_the_title($post_id);
								$featured_img=get_the_post_thumbnail_url($post_id, 'full'); 
								?>
								<div class="col-sm-4">
									<div class="bx_pr_item">
										<h3 class="bx_pr_item_title"><a href="<?php echo $permalink; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
										<div class="bx_pr_item_img">										
											<a href="<?php echo $permalink; ?>">
												<figure>
													<div style="background-image: url(<?php echo @$featured_img; ?>);background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (200 / 200))"></div>
												</figure>						
											</a>	
										</div>
										<div class="bx_pr_item_detail">
											<a href="<?php echo $permalink; ?>" title="<?php echo $title; ?>">Chi tiết</a>
										</div>
									</div>
								</div>		
								<?php
							}		
							wp_reset_postdata();
						}
						$k--;					
					} 						
					?>													
				</div>			
			</div>
		</div>
	</div>
	<?php
}
?>


<div class="modal fade" id="baogiamodal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">			
			<div class="modal-body">
				<div class="cbblose">
					<a href="javascript:void(0);" data-dismiss="modal">
						<i class="fa fa-times" aria-hidden="true"></i>
					</a>							
				</div>	
				<div class="radialmodal"></div>
				<form class="info_modal" name="frm_dk_bg">
					<h4 class="info_title">Đăng ký nhận báo giá</h4>
					<div class="ck_contact"><input type="text" name="fullname" class="form-control" placeholder="Họ tên" required></div>
					<div class="ck_contact"><input type="text" name="phone" class="form-control" placeholder="Điện thoại" required></div>
					<div class="ck_contact"><input type="text" name="email" class="form-control" placeholder="Email" required></div>
					<div class="ck_contact">
						<textarea name="message" class="form-control" cols="30" rows="10" placeholder="Ghi chú thêm" required=""></textarea>
					</div>
					<div class="ck_submit">
						<a href="javascript:void(0);" onclick="registerNow();">Đặt mua</a>
						<div class="ajax_loader_contact"></div>
                		<div class="clr"></div>     
					</div>
					<div class="note">Cảm ơn đã đặt phòng tại khách sạn của chúng tôi . Chúng tôi sẽ liên hệ lại bạn trong thời gian sớm nhất.</div>
				</form>	
				<div class="clr"></div>			
			</div>			
		</div>
	</div>
</div>

<?php 
$args = array(
	'post_type' => 'zaproduct',  
	'orderby' => 'id',
	'order'   => 'DESC',  
	'posts_per_page' => 3,        
	'post__not_in'=>array($post_id),
	'tax_query' => array(
		array(
			'taxonomy' => 'za_category',
			'field'    => 'term_id',
			'terms'    => @$source_term_id,                   
		),
	),
);
$the_query=new WP_Query($args);    
if($the_query->have_posts()){
	?>
	<div class="box_featured_product_v7">
		<div class="box_hp_product_wrapper_title">
			<div class="box_hp_product_title">
				<div>
					<h2>
						Sản phẩm liên quan
					</h2>
				</div>			
			</div>
		</div>	
		<div class="clr"></div>	
		<div class="bx_product">
			<div class="container">
				<div class="row">	
					<?php 
					while($the_query->have_posts()){
						$the_query->the_post();
						$post_id=$the_query->post->ID;
						$permalink=get_the_permalink($post_id);
						$title=get_the_title($post_id);
						$featured_img=get_the_post_thumbnail_url($post_id, 'full'); 
						?>
						<div class="col-sm-4">
							<div class="bx_pr_item">
								<h3 class="bx_pr_item_title"><a href="<?php echo $permalink; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
								<div class="bx_pr_item_img">										
											<a href="<?php echo $permalink; ?>">
												<figure>
													<div style="background-image: url(<?php echo @$featured_img; ?>);background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (200 / 200))"></div>
												</figure>						
											</a>	
										</div>
								<div class="bx_pr_item_detail">
									<a href="<?php echo $permalink; ?>" title="<?php echo $title; ?>">Chi tiết</a>
								</div>
							</div>
						</div>						
						<?php							
					}							
					?>											
				</div>				
			</div>
		</div>
	</div>
	<?php
	wp_reset_postdata();
}
include get_template_directory() . "/block/block-partner.php";
get_footer(); 
?>