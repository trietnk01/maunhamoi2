<?php
/*

Footer template

*/
?>
<div class="container">
	<div class="row">
		<div class="col">
			<div class="talet">
				&copy;&nbsp;Bản quyền thuộc về www.maunhamoi.com.vn
			</div>
		</div>
	</div>
</div>
<div class="box-so-dien-thoai">
    <a href="tel:<?php echo get_field("setting_call_now","option"); ?>">
        <div class="kts-tu-van-nhanh">KTS. Tư vấn nhanh</div>
        <div class="phone-kts-tu-van-nhanh"><?php echo get_field("setting_hotline","option"); ?></div>
    </a>
</div>
<?php
wp_footer();
?>
</body>
</html>
