<?php unset( $_GET['q'] ); global $acf_pr;  $acf_pr = p_var_ar("acf_pr"); ?>
<!DOCTYPE html>
<html <?php language_attributes() ?> data-user-agent="<?php echo $_SERVER['HTTP_USER_AGENT'] ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="icon" href="<?php echo p_acf_o("logo_favicon") ? p_acf_o("logo_favicon") : P_IMG  . '/wp.png' ?>" sizes="16x16" />

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php if ( is_singular() && pings_open( get_queried_object())) { ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php } ?>
	<!-- Yoast seo build title,description. (No code title,des,keywords)  -->
	<?php wp_head(); ?>

	
	<?php if( !is_localhost() ) { //  google analytics ?> 
	
	
	<?php } ?>

	<?php do_action("p_add_code_head") ?>
	
</head>
<body <?php body_class() ?> id="body-top">
<div class="header_bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="logo_img">
					<a href="<?php echo home_url() ?>" title="Logo">					
						<img src="<?php echo get_field('logo_header','option'); ?>" alt="Logo" >
					</a>
				</div>				
			</div>
			<div class="col-lg-9">
				<div class="hotline_box">
					<div class="hotline_box_icon">
						<div class="hotline_box_icon_ball">
							<img src="<?php echo P_IMG.'/icon_phone.png'; ?>">
						</div>						
					</div>
					<div class="hotline_box_info">
						<div class="hotline_box_info_phone_1">Hotline</div>
						<div class="hotline_box_info_phone_2"><a href="tel:<?php echo get_field('tel_alo','option'); ?>"><?php echo get_field('sdt','option'); ?></a></div>
					</div>
				</div>
				<div class="email_box">
					<div class="email_box_icon">
						<div class="email_box_icon_ball">
							<img src="<?php echo P_IMG.'/icon_mail.png'; ?>">
						</div>						
					</div>
					<div class="email_box_info">
						<div class="email_box_info_email_1">Email</div>
						<div class="email_box_info_email_2"><a href="mailto:<?php echo get_field('email_info','option'); ?>"><?php echo get_field('email_info','option'); ?></a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="header_bg_mobile">
	<div class="logo_mobile">
		<a href="<?php echo home_url() ?>" title="Logo">					
			<img src="<?php echo get_field('logo_header','option'); ?>" alt="Logo" >
		</a>
	</div>
	<div class="phone_mobile_view">
		<a href="tel:<?php echo get_field('tel_alo','option'); ?>"><i class="fa fa-phone" aria-hidden="true"></i></a>		
	</div>
	<div class="mobile_navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">				
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<?php
				wp_nav_menu( array(
					'theme_location'  => 'mobile',
					'menu_class'      => 'navbar-nav mr-auto',											
				) );
				?>				
			</div>
		</nav>
	</div>	
</div>
<div class="line_middle_menu"></div>
<div class="mainmenu_box">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<div id="smoothmainmenu" class="ddsmoothmenu">
					<?php			
					$args = array( 
						'menu'              => '', 
						'container'         => '', 
						'container_class'   => '', 
						'container_id'      => '', 
						'menu_class'        => 'main_menu',                             
						'echo'              => true, 
						'fallback_cb'       => 'wp_page_menu', 
						'before'            => '', 
						'after'             => '', 
						'link_before'       => '', 
						'link_after'        => '', 
						'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',  
						'depth'             => 3, 
						'walker'            => '', 
						'theme_location'    => 'primary' ,
						'menu_li_actived'       => 'current-menu-item',
						'menu_item_has_children'=> 'menu-item-has-children',
					);
					wp_nav_menu($args);
					?>        		
				</div>			
			</div>
			<div class="col-lg-3">
				<div class="search_box">
					<a href="javascript:void(0);" onclick="showFrmSearch();"><i class="fa fa-search" aria-hidden="true"></i></a>
				</div>
				<?php 
				$source_social=get_field('op_inf_sn_repeat','option');				
				if(count(@$source_social) > 0){
					?>
					<ul class="footer_social">
						<li><a href="<?php echo @$source_social[0]['op_inf_sn_repeat_link']; ?>" title="tiêu đề tên" target="_blank" rel="nofollow"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="<?php echo @$source_social[1]['op_inf_sn_repeat_link']; ?>" title="tiêu đề tên" target="_blank" rel="nofollow"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="<?php echo @$source_social[2]['op_inf_sn_repeat_link']; ?>" title="tiêu đề tên" target="_blank" rel="nofollow"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>					
						<li><a href="<?php echo @$source_social[3]['op_inf_sn_repeat_link']; ?>" title="tiêu đề tên" target="_blank" rel="nofollow"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
					</ul>	
					<?php
				}
				?>				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<?php do_action('p_after_header') ; ?>
