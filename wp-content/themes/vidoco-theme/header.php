<!DOCTYPE html>
<html <?php language_attributes() ?> data-user-agent="<?php echo $_SERVER['HTTP_USER_AGENT'] ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="icon" href="<?php echo get_field("op_p_logo_favicon","option"); ?>"/>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php wp_head(); ?>	
</head>
<body >
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=1994326743991661&autoLogAppEvents=1"></script>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="bg-white-general">
					<div class="banner-header">
						<a href="<?php echo home_url( '',null ); ?>">
							<div style="background-image: url('<?php echo wp_get_upload_dir()["url"]."/logo-banner.jpg"; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (979/159));"></div>			
						</a>								
					</div>
					<div class="bg-header">
						<div id="smoothmainmenu" class="ddsmoothmenu">
							<?php			
							$args = array( 
								'menu'              => '', 
								'container'         => '', 
								'container_class'   => '', 
								'container_id'      => '', 
								'menu_class'        => 'main-menu',                             
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
					<div class="header-bg-mobile">
						<div class="mobile-navbar">
							<nav class="navbar navbar-expand-lg navbar-light bg-light">             
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>
								<div class="collapse navbar-collapse" id="navbarSupportedContent">
									<!--<ul class="mobile-menu">
										<li><a href="javascript:void(0);">Trang chủ</a></li>
										<li><a href="javascript:void(0);">Giới thiệu</a></li>
										<li><a href="javascript:void(0);">Biệt thự đẹp</a></li>
										<li><a href="javascript:void(0);">Nhà phố đẹp</a></li>
										<li><a href="javascript:void(0);">Nhà cấp 4</a></li>
										<li><a href="javascript:void(0);">Nội thất</a></li>
										<li><a href="javascript:void(0);">Dự án đã thực hiện</a></li>
										<li><a href="javascript:void(0);">Liên hệ</a></li>
									</ul>-->
									<?php			
									$args = array( 
										'menu'              => '', 
										'container'         => '', 
										'container_class'   => '', 
										'container_id'      => '', 
										'menu_class'        => 'mobile-menu',                             
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
							</nav>
						</div> 
					</div>					
					<ul class="bg-related-product">
						<li><a href="javascript:void(0);">Phòng khách đẹp</a></li>
						<li><a href="javascript:void(0);">Phòng ngủ đẹp</a></li>
						<li><a href="javascript:void(0);">Phòng bếp - Ăn</a></li>
						<li><a href="javascript:void(0);">Sân vườn tiểu cảnh</a></li>
						<li><a href="javascript:void(0);">Nhà xưởng</a></li>
						<li><a href="javascript:void(0);">Công trình công cộng</a></li>
						<li><a href="javascript:void(0);">Báo giá</a></li>
						<li><a href="javascript:void(0);">Tư vấn giám sát</a></li>
						<li><a href="javascript:void(0);">Tuyển dụng</a></li>
					</ul>	
					<div class="breadcrumb-bg">
						<span><a href="javascript:void(0);">Mẫu nhà mới</a></span>
					</div>			
				</div>				
			</div>			
		</div>
	</div>	