<?php 
/*

Footer template

*/
?>
<div class="footer">
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="footer_bx">
						<div class="footer_logo">
							<a href="<?php echo home_url() ?>" title="Logo">					
								<img src="<?php echo get_field('logo_header','option'); ?>" alt="Logo" >
							</a>
						</div>
						<div class="footer_info">
							<h2 class="footer_company_title"><?php echo get_bloginfo( 'name'); ?></h2>
							<div class="box_footer_company_address">
								<span class="footer_company_address">Địa chỉ:</span> 
								<span class="footer_company_address_v2"><?php echo get_field( 'dia_chi', 'option' ); ?></span>
							</div>
							<div>								
								<span class="footer_company_address">Email:</span>
								<span class="footer_company_mailto">
									<a href="mailto:<?php echo get_field('email_info','option'); ?>">
										<?php echo get_field('email_info','option'); ?>
									</a> 
								</span>
								<span class="footer_company_address">-  ĐT:</span> 
								<span class="footer_company_mailto">
									<a href="tel:<?php echo get_field('tel_alo','option'); ?>"><?php echo get_field('sdt','option'); ?></a>
								</span>
							</div>
						</div>	
						<div class="clr"></div>						
					</div>
					<div class="dknbt">
						Đăng ký nhận bản tin
					</div>	
					<?php 
				//echo do_shortcode( '[email-subscribers namefield="YES" desc="" group="Public"]');
					//include get_template_directory().'/inc/subscription/sub_html.php';
					?>	
				<form class="dkfrm" name="frm-subcribe">
					<div class="dkfrm_1"><input type="text" name="email" class="ftemail" placeholder="Nhập email của bạn"></div>
					<div class="dkfrm_2"><a href="javascript:void(0);" onclick="registerSubcriber(this);">Đăng ký</a></div>
					<div class="clr"></div>					
				</form>
				<div class="ajax_loader"></div>
					<div class="note">Cảm ơn đã đặt phòng tại khách sạn của chúng tôi . Chúng tôi sẽ liên hệ lại bạn trong thời gian sớm nhất.</div>       
			</div>
			<div class="col-lg-2">
				<h3 class="footer_tieude">Giới thiệu</h3>
				<?php			
				$args = array( 
					'menu'              => '', 
					'container'         => '', 
					'container_class'   => '', 
					'container_id'      => '', 
					'menu_class'        => 'menu_footer',                             
					'echo'              => true, 
					'fallback_cb'       => 'wp_page_menu', 
					'before'            => '', 
					'after'             => '', 
					'link_before'       => '', 
					'link_after'        => '', 
					'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',  
					'depth'             => 3, 
					'walker'            => '', 
					'theme_location'    => 'intromenu' ,
					'menu_li_actived'       => 'current-menu-item',
					'menu_item_has_children'=> 'menu-item-has-children',
				);
				wp_nav_menu($args);
				?>        		
			</div>
			<div class="col-lg-2">
				<h3 class="footer_tieude">Sản phẩm</h3>
				<?php			
				$args = array( 
					'menu'              => '', 
					'container'         => '', 
					'container_class'   => '', 
					'container_id'      => '', 
					'menu_class'        => 'menu_footer',                             
					'echo'              => true, 
					'fallback_cb'       => 'wp_page_menu', 
					'before'            => '', 
					'after'             => '', 
					'link_before'       => '', 
					'link_after'        => '', 
					'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',  
					'depth'             => 3, 
					'walker'            => '', 
					'theme_location'    => 'productmenuleft' ,
					'menu_li_actived'       => 'current-menu-item',
					'menu_item_has_children'=> 'menu-item-has-children',
				);
				wp_nav_menu($args);
				$source_social=get_field('op_inf_sn_repeat','option');
				if(count(@$source_social) > 0) {
					?>
					<ul class="footer_social_v2">
						<li><a href="<?php echo @$source_social[0]['op_inf_sn_repeat_link']; ?>" title="tiêu đề tên" target="_blank" rel="nofollow"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="<?php echo @$source_social[1]['op_inf_sn_repeat_link']; ?>" title="tiêu đề tên" target="_blank" rel="nofollow"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="<?php echo @$source_social[2]['op_inf_sn_repeat_link']; ?>" title="tiêu đề tên" target="_blank" rel="nofollow"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>					
						<li><a href="<?php echo @$source_social[3]['op_inf_sn_repeat_link']; ?>" title="tiêu đề tên" target="_blank" rel="nofollow"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
					</ul>	
					<?php
				}
				?>        					
			</div>
			<div class="col-lg-2">				
				<?php			
				$args = array( 
					'menu'              => '', 
					'container'         => '', 
					'container_class'   => '', 
					'container_id'      => '', 
					'menu_class'        => 'menu_footer menufooterpadd',                             
					'echo'              => true, 
					'fallback_cb'       => 'wp_page_menu', 
					'before'            => '', 
					'after'             => '', 
					'link_before'       => '', 
					'link_after'        => '', 
					'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',  
					'depth'             => 3, 
					'walker'            => '', 
					'theme_location'    => 'productmenuright' ,
					'menu_li_actived'       => 'current-menu-item',
					'menu_item_has_children'=> 'menu-item-has-children',
				);
				wp_nav_menu($args);
				?>        	
			</div>
		</div>
	</div>
		<div class="footer_copyright">
			<span class="copyright">&copy; 2018</span> <span class="golden_home"><a href="javascript:void(0);" title="tiêu đề tên">VINADASA</a></span> <span class="copyright">.</span> <span class="copyright">Designed by</span> <span  class="redi_link"><a href="https://redi.vn" title="REDI - Thiết kế website chuẩn Marketing &amp; giải pháp Digital Marketing" target="_blank" rel="nofollow">REDI</a></span>
		</div>
	</div>	
</div>
<?php
wp_footer();
?>
</body>
</html>
