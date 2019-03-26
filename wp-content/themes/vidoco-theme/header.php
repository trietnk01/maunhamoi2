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
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="bg-white-general">
					<div class="banner-header">
						<img src="<?php echo get_template_directory_uri()."/assets/images/banner.jpg"; ?>">
					</div>
					<div class="bg-header">
						<div id="smoothmainmenu" class="ddsmoothmenu">
							<ul>
								<li><a href="javascript:void(0);">Trang chủ</a></li>
								<li><a href="javascript:void(0);">Giới thiệu</a></li>
								<li><a href="javascript:void(0);">Biệt thự đẹp</a></li>
								<li><a href="javascript:void(0);">Nhà phố đẹp</a></li>
								<li><a href="javascript:void(0);">Nhà cấp 4</a></li>
								<li><a href="javascript:void(0);">Nội thất</a></li>
								<li><a href="javascript:void(0);">Dự án đã thực hiện</a></li>
								<li><a href="javascript:void(0);">Liên hệ</a></li>
							</ul>
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