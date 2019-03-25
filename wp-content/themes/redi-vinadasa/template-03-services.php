<?php
/*
Template name: Template dịch vụ
Template Post Type: post, page
*/
get_header();
?>
<div class="box_service">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1 class="dvsetup"><?php echo get_field('p_service_title','option'); ?></h1>
				<div class="service_intro">
					<?php echo get_field('p_service_excerpt','option'); ?>
				</div>
				<div>
					<?php 
					$source_slogan=get_field('p_service_slogan_rpt','option');
					?>
					<ul class="service_lst">
						<?php 
						foreach ($source_slogan as $key => $value) {
							?>
							<li><?php echo $value['p_service_slogan_title'] ?></li>
							<?php
						}
						?>														
					</ul>					
					<div class="hotline_call_now">
						<a href="tel:<?php echo get_field('tel_alo','option'); ?>">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<?php echo get_field('sdt','option'); ?>
						</a>
					</div>
					<div class="clr"></div>
				</div>				
			</div>
			<div class="col-md-6">
				<div class="service_img"><img src="<?php echo get_field('p_service_img','option'); ?>" alt="hinhanh"></div>
			</div>
		</div>
	</div>
</div>
<div class="box_ads">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="ads_title">Kết hợp quảng bá thương hiệu</h2>		
			</div>
		</div>
		<?php 
		$source_trade=get_field('p_service_trade_rpt','option');
		if(count($source_trade) == 6){
			?>
			<div class="row">
				<div class="col">
					<div class="box_ads_rela">
						<div class="coperate_left">											
							<div class="ads_c">
								<div class="slogan_intro">
									<h3 class="slogan_title tt_color_do"><?php echo $source_trade[0]['p_service_trade_title']; ?></h3>
									<div class="sl_intro">
										<?php echo $source_trade[0]['p_service_trade_excerpt']; ?>
									</div>
								</div>
								<div class="ads_number">
									<div class="logo_number tt_logo_do logo_sang_tao_cai_tien">
										1
									</div>
								</div>
								<div class="clr"></div>
							</div>
							<div class="ads_c">
								<div class="slogan_intro">
									<h3 class="slogan_title tt_color_cam"><?php echo $source_trade[1]['p_service_trade_title']; ?></h3>
									<div class="sl_intro">
										<?php echo $source_trade[1]['p_service_trade_excerpt']; ?>
									</div>
								</div>
								<div class="ads_number">
									<div class="logo_number tt_logo_cam logo_loi_nhuan_cao">
										2
									</div>
								</div>
								<div class="clr"></div>
							</div>	
							<div class="ads_c">
								<div class="slogan_intro">
									<h3 class="slogan_title tt_color_do"><?php echo $source_trade[2]['p_service_trade_title']; ?></h3>
									<div class="sl_intro">
										<?php echo $source_trade[2]['p_service_trade_excerpt']; ?>
									</div>
								</div>
								<div class="ads_number">
									<div class="logo_number tt_logo_do logo_ngan_sach_hieu_qua">
										3
									</div>
								</div>
								<div class="clr"></div>
							</div>					
						</div>
						<div class="vox">
							<img src="<?php echo P_IMG.'/img_dichvu2.png'; ?>">
						</div>
						<div class="coperate_right">
							<div class="ads_c">
								<div class="ads_number">
									<div class="logo_number tt_logo_cam logo_digital_marketing">
										4
									</div>
								</div>
								<div class="slogan_intro">
									<h3 class="slogan_title tt_color_cam"><?php echo $source_trade[3]['p_service_trade_title']; ?></h3>
									<div class="sl_intro">
										<?php echo $source_trade[3]['p_service_trade_excerpt']; ?>
									</div>
								</div>							
								<div class="clr"></div>
							</div>						
							<div class="ads_c">
								<div class="ads_number">
									<div class="logo_number tt_logo_do logo_cam_ket_doanh_so">
										5
									</div>
								</div>
								<div class="slogan_intro">
									<h3 class="slogan_title tt_color_do"><?php echo $source_trade[4]['p_service_trade_title']; ?></h3>
									<div class="sl_intro">
										<?php echo $source_trade[4]['p_service_trade_excerpt']; ?>
									</div>
								</div>							
								<div class="clr"></div>
							</div>	
							<div class="ads_c">
								<div class="ads_number">
									<div class="logo_number tt_logo_cam logo_muc_tieu_ro_rang">
										6
									</div>
								</div>
								<div class="slogan_intro">
									<h3 class="slogan_title tt_color_cam"><?php echo $source_trade[5]['p_service_trade_title']; ?></h3>
									<div class="sl_intro">
										<?php echo $source_trade[5]['p_service_trade_excerpt']; ?>
									</div>
								</div>							
								<div class="clr"></div>
							</div>						
						</div>					
					</div>				
				</div>			
			</div>
			<?php
		}
		?>		
	</div>	
</div>
<?php 
include get_template_directory() . "/block/block-partner.php";
get_footer(); 
?>