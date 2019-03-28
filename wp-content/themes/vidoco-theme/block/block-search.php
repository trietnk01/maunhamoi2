<div class="total-right">
	<div class="h-total-right">
		<h3 class="h-total-right-tieu-de">Tìm kiếm</h3>
		<div class="clr"></div>
	</div>
	<form class="frm-search-article margin-top-5" name="frm_search" method="POST" action="">
		<div class="frm-search-left">
			<input value="<?php echo @$q; ?>" name="s" type="search" placeholder="Từ cần tìm..." class="input-box" autocomplete="off" >
		</div>								
		<div class="frm-search-right">
			<a href="javascript:void(0);" onclick="document.forms['frm_search'].submit();">Tìm</a>
		</div>										
	</form>
</div>