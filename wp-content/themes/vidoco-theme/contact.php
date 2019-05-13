<?php
/*
Template name: Template liên hệ
Template Post Type: post, page
*/
get_header();
?>
<div class="container">
	<div class="row">
		<div class="col">
			<div class="body-bg">
				<div class="row">
					<div class="col-lg-8">
						<h1 class="header-page">Gửi tin nhắn cho chúng tôi</h1>
						<div class="contact-body">
							<div class="row">
								<div class="col-md-6">
									<form name="frm_contact" action="" class="frm-contact">
										<div class="ck-contact"><input type="text" name="fullname" class="form-control" placeholder="Họ tên" required></div>
										<div class="ck-contact"><input type="text" name="phone" class="form-control" placeholder="Điện thoại" required></div>
										<div class="ck-contact"><input type="text" name="email" class="form-control" placeholder="Email" required></div>
										<div class="ck-contact"><input type="text" name="title" class="form-control" placeholder="Tiêu đề" required></div>
										<div class="ck-contact">
											<textarea name="message" class="form-control" cols="30" rows="10" placeholder="Nhập nội dung" required=""></textarea>
										</div>
										<div class="ck-submit">
											<a href="javascript:void(0);" onclick="contactNow(this);">Gửi</a>
											<div class="ajax_loader_2"></div>
											<div class="clr"></div>
										</div>
										<div class="note">Cảm ơn đã đặt phòng tại khách sạn của chúng tôi . Chúng tôi sẽ liên hệ lại bạn trong thời gian sớm nhất.</div>
									</form>
								</div>
								<div class="col-md-6">
									<div class="thong-tin-box">
										<div class="thong-tin-lien-he">
											<div class="lien-he-1">Địa chỉ liên hệ</div>
											<h2 class="lien-he-3"><?php echo get_field("setting_address","option"); ?></h2>
										</div>
										<div class="thong-tin-lien-he">
											<div class="lien-he-1">Hotline tư vấn</div>
											<h2 class="lien-he-2"><a href="tel:<?php echo get_field("setting_call_now","option"); ?>"><?php echo get_field("setting_hotline","option"); ?></a></h2>
										</div>
										<div class="thong-tin-lien-he">
											<div class="lien-he-1">Email</div>
											<h2 class="lien-he-2"><a href="mailto:<?php echo get_field("setting_email","option"); ?>"><?php echo get_field("setting_email","option"); ?></a></h2>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="margin-top-15">
							<?php include get_template_directory()."/block/block-main-product.php"; ?>
						</div>
					</div>
					<div class="col-lg-4">
						<?php include get_template_directory()."/block/block-search.php"; ?>
						<?php include get_template_directory()."/block/block-fanpage.php"; ?>
						<?php include get_template_directory()."/block/block-video.php"; ?>
						<?php include get_template_directory()."/block/block-mau-thiet-ke.php"; ?>
						<?php include get_template_directory()."/block/block-y-kien-khach-hang.php"; ?>
						<?php include get_template_directory()."/block/block-ban-quan-tam.php"; ?>
						<?php include get_template_directory()."/block/block-visitor-counter.php"; ?>
					</div>
				</div>
				<?php include get_template_directory()."/block/block-menu-content-bottom.php"; ?>
				<?php include get_template_directory()."/block/block-google-map.php"; ?>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
?>