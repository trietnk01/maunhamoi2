<div class="total-right maradies">
	<div class="h-total-right">
		<h3 class="h-total-right-tieu-de">Fanpage</h3>
		<div class="clr"></div>
	</div>
	<div class="margin-top-5">
		<?php 
		$setting_fanpage_permalink=get_field("setting_fanpage_permalink","option");
		?>
		<div class="fb-page" data-href="<?php echo @$setting_fanpage_permalink; ?>" data-tabs="timeline" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/kientrucmaunhamoi/" class="fb-xfbml-parse-ignore"><a href="<?php echo @$setting_fanpage_permalink; ?>">Mẫu nhà mới</a></blockquote></div>
	</div>
</div>