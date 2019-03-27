<div class="total-right y-kien-kh-block">
	<div class="h-total-right">
		<h3 class="h-total-right-tieu-de">Ý kiến khách hàng</h3>
		<div class="clr"></div>
	</div>
	<div class="y-kien-khach-hang-box">
		<?php 
		for ($i=1; $i <= 4; $i++) { 
			?>
			<div class="y-kien-kh-item">
				<div class="y-kien-kh-item-left">
					<div style="background-image: url('<?php echo get_template_directory_uri()."/assets/images/avatar.jpg"; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (300/300));"></div>
				</div>
				<div class="y-kien-kh-item-right">
					<h4 class="ten-khach-hang">Lê Xuân</h4>
					<div class="thang-mua"><span><i class="far fa-clock"></i></span><span class="margin-left-5">September 11, 2018</span></div>
					<div class="comment-khach-hang">Cho mình hỏi ngôi nhà này</div>
				</div>
				<div class="clr"></div>
			</div>
			<?php
		}
		?>		
	</div>
</div>