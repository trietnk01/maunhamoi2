<?php 
global $zController, $zendvn_sp_settings,$qode_options_proya;		
$zController->getController("/frontend","ProductController");
$page_id_search = $zController->getHelper('GetPageId')->get('_wp_page_template','search.php');  
$search_link = get_permalink($page_id_search);
$source_term_project = get_terms( array(
	'taxonomy' => 'za_project',
	'hide_empty' => false, 
	'parent' => 0 ) );	
$data_term_project=array();
$data_term_project[]=array('id'=>0,'name'=>'Tất cả dự án');
foreach ($source_term_project as $key => $value) {
	$data_term_project[]=array('id'=>$value->term_id,'name'=>$value->name);
} 
$source_term_position = get_terms( array(
	'taxonomy' => 'za_position',
	'hide_empty' => false, 
	'parent' => 0) );	
$data_term_position=array();
$data_term_position[]=array('id'=>0,'name'=>'Tất cả vị trí');
foreach ($source_term_position as $key => $value) {
	$data_term_position[]=array('id'=>$value->term_id,'name'=>$value->name);
} 
$q='';
$za_project_id=0;
$za_position_id=0;
if(isset($_POST['q'])){
	$q=trim($_POST['q']);
}    
if(isset($_POST['za_project_id'])){
	$za_project_id=(int)@$_POST['za_project_id'];
}	   	
if(isset($_POST['za_position_id'])){
	$za_position_id=(int)@$_POST['za_position_id'];
}	 
?> 
<div class="box-right">
	<h3 class="box-title">TÌM DỰ ÁN</h3>
	<div class="box-right-wrapper">
		<form name="frm-search" method="POST" class="ritae" action="<?php echo $search_link; ?>">
			<div class="padding-top-15">
				<input type="text" name="q" class="lina" value="<?php echo $q; ?>" placeholder="Tên dự án">
			</div>
			<div class="margin-top-15">
				<select name="za_project_id" class="xima">
					<?php 
					foreach ($data_term_project as $key => $value) {		
						if((int)@$value['id'] == (int)@$za_project_id){
							echo '<option selected value="'.$value['id'].'">'.$value['name'].'</option>';
						}else{
							echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
						}											
					}
					?>
				</select>
			</div>
			<div class="margin-top-15">
				<select name="za_position_id" class="xima">
					<?php 
					foreach ($data_term_position as $key => $value) {		
						if((int)@$value['id'] == (int)@$za_position_id){
							echo '<option selected value="'.$value['id'].'">'.$value['name'].'</option>';
						}else{
							echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
						}											
					}
					?>
				</select>
			</div>			
			<div class="oppo">
				<a href="javascript:void(0);" onclick="document.forms['frm-search'].submit();">TÌM KIẾM</a>
			</div>	
		</form>		
	</div>	
</div>
<div class="box-right">
	<h3 class="box-title">SỰ KIỆN</h3>
	<div class="box-right-wrapper">
		<?php 
		$args = array(
			'post_type' => 'post',  
			'orderby' => 'id',
			'order'   => 'DESC',    
			'posts_per_page'=>6,                                              
			'tax_query' => array(
				array(
					'taxonomy' => 'za_kind_article',
					'field'    => 'slug',
					'terms'    => array('su-kien'),                                  
				),
			),
		); 
		$the_query = new WP_Query( $args );			
		if($the_query->have_posts()){
			?>
			<ul class="kind_news">
				<?php 
				while ($the_query->have_posts()) {
					$the_query->the_post();
					$post_id=$the_query->post->ID;																		
					$permalink=get_the_permalink($post_id);
					$title=get_the_title($post_id);								
					$featured_image="";
					$thumbnail=get_the_post_thumbnail_url($post_id, 'thumbnail');	
					if(!empty($thumbnail)){
						$featured_image=$thumbnail;
					}else{
						$featured_image=site_url("wp-content/uploads/no-image.jpg");
					}							   	
					?>
					<li><a href="<?php echo @$permalink; ?>"><?php echo @$title; ?></a></li>
					<?php
				}
				wp_reset_postdata(); 
				?>
			</ul>
			<?php			
		}
		?>		
	</div>
</div>
<div class="box-right">
	<h3 class="box-title">TIN MỚI NHẤT</h3>
	<div class="box-right-wrapper">
		<?php 
		$args = array(
			'post_type' => 'post',  
			'orderby' => 'id',
			'order'   => 'DESC',    
			'posts_per_page'=>6,                                              
			'tax_query' => array(
				array(
					'taxonomy' => 'za_kind_article',
					'field'    => 'slug',
					'terms'    => array('tin-moi'),                                  
				),
			),
		); 
		$the_query = new WP_Query( $args );			
		if($the_query->have_posts()){ 
			?>
			<ul class="kind_news">
				<?php 
				while ($the_query->have_posts()) {
					$the_query->the_post();
					$post_id=$the_query->post->ID;																		
					$permalink=get_the_permalink($post_id);
					$title=get_the_title($post_id);								
					$featured_image="";
					$thumbnail=get_the_post_thumbnail_url($post_id, 'thumbnail');	
					if(!empty($thumbnail)){
						$featured_image=$thumbnail;
					}else{
						$featured_image=site_url("wp-content/uploads/no-image.jpg");
					}							   	
					?>
					<li><a href="<?php echo @$permalink; ?>"><?php echo @$title; ?></a></li>
					<?php
				}
				wp_reset_postdata(); 
				?>
			</ul>
			<?php			
		}
		?>		
	</div>
</div>
<div class="box-right">
	<h3 class="box-title">TIN NỔI BẬT</h3>
	<div class="box-right-wrapper">
		<?php 
		$args = array(
			'post_type' => 'post',  
			'orderby' => 'id',
			'order'   => 'DESC',    
			'posts_per_page'=>6,                                              
			'tax_query' => array(
				array(
					'taxonomy' => 'za_kind_article',
					'field'    => 'slug',
					'terms'    => array('tin-noi-bat'),                                  
				),
			),
		); 
		$the_query = new WP_Query( $args );			
		if($the_query->have_posts()){
			?>
			<ul class="kind_news">
				<?php 
				while ($the_query->have_posts()) {
					$the_query->the_post();
					$post_id=$the_query->post->ID;																		
					$permalink=get_the_permalink($post_id);
					$title=get_the_title($post_id);								
					$featured_image="";
					$thumbnail=get_the_post_thumbnail_url($post_id, 'thumbnail');	
					if(!empty($thumbnail)){
						$featured_image=$thumbnail;
					}else{
						$featured_image=site_url("wp-content/uploads/no-image.jpg");
					}							   	
					?>
					<li><a href="<?php echo @$permalink; ?>"><?php echo @$title; ?></a></li>
					<?php
				}
				wp_reset_postdata(); 
				?>
			</ul>
			<?php			
		}
		?>		
	</div>
</div>
<div class="box-right">
	<h3 class="box-title">LIÊN HỆ</h3>
	<div class="box-right-wrapper">
		<div class="padding-top-15 let-call">HÃY GỌI CHO CHÚNG TÔI ĐỂ ĐƯỢC TƯ VẤN</div>
		<div class="let-call-telephone"><?php echo @$zendvn_sp_settings["telephone"] ?></div>
		<div class="logo-sidebar"><center><a href="<?php echo site_url('/'); ?>" title="<?php echo @$title_site; ?>"><img alt="<?php echo @$title_site; ?>" title="<?php echo @$title_site; ?>" src="<?php echo @$qode_options_proya['logo_image']; ?>"></a></center></div>
	</div>	
</div>	
<?php 
if(!empty(@$zendvn_sp_settings['facebook_url'])){
	?>
	<div class="box-right">
		<h3 class="box-title">FANPAGE</h3>
		<div class="box-right-wrapper">
			<div class="padding-top-15">
				<div class="fb-page" data-href="<?php echo @$zendvn_sp_settings['facebook_url'] ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?php echo @$zendvn_sp_settings['facebook_url'] ?>" class="fb-xfbml-parse-ignore"><a href="<?php echo @$zendvn_sp_settings['facebook_url'] ?>">Facebook</a></blockquote></div>
			</div>			
		</div>		
	</div>
	<?php
}
if(!empty(@$zendvn_sp_settings["youtube_url"])){
	?>
	<div class="box-right">
		<h3 class="box-title">VIDEO SẢN PHẨM</h3>
		<div class="box-right-wrapper">
			<div class="padding-top-15">
				<iframe width="100%" height="315" src="<?php echo @$zendvn_sp_settings["youtube_url"] ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
			</div>			
		</div>		
	</div>
	<?php
}
?>	