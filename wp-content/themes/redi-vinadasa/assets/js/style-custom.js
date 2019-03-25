function changePage(page,ctrl){
	jQuery('input[name=filter_page]').val(page);
	jQuery(ctrl).closest('form')[0].submit();	
}
function tuVanShowHide(){
	var tu_van_box_ctrl=jQuery('.tu_van_box');
	var right_value=jQuery(tu_van_box_ctrl).css("right");	
	if(right_value == '0px'){
		jQuery(tu_van_box_ctrl).css({
			right: '-180px'
		});
	}else{
		jQuery(tu_van_box_ctrl).css({
			right: '0px'
		});
	}	
}
function changeImg(image,title){    
		var image_detail=jQuery(".box_img_w");
		var imghtml='<a href="'+image+'"  class="smlightbox"><img src="'+image+'" alt="'+title+'"/></a>';        
		jQuery(image_detail).empty();
		jQuery(image_detail).append(imghtml);	
		jQuery('.smlightbox').simpleLightbox();
	}	 
function showFrmSearch(){
	jQuery('.pan_search').show();
}
function closeFrmSearch(){
	jQuery('.pan_search').hide();
}
jQuery(document).ready(function($){		
	/* begin counter */
	$('.counter').counterUp({
            delay: 10,
            time: 1000
        });
	/* end counter */
	/* begin tu_van_box */
	setInterval(tuVanShowHide,9000);
	/* end tu_van_box */
	$('.toggle').on('click',function(){
		var ul_root=$(this).closest('ul.category_product');
		var li_current= $(ul_root).find('li.current_li');
		$(li_current).children('ul').slideUp();		
		var li=$(this).closest('li');
		$(li).addClass('current_li');
		var ul= $(li).children('ul');
		var status=$(ul).css('display');
		if(status=='none'){
			$(ul).slideDown();
			console.log(status);
		}else{
			$(ul).slideUp();
			console.log(status);
		}		
	});
	$('.smlightbox').simpleLightbox();
	// begin menu danh muc san pham
	var menu_item_has_children= $('.category_product').children('li.menu-item-has-children');
	var btn_toggle=$(menu_item_has_children).children('button');	
	$(btn_toggle).click(function() {			
		var li_has_children=$(this).closest('li');
		var ul_submenu=$(li_has_children).children('ul');		
		var ds=$(ul_submenu).css('display');		
		if(ds=='none'){
			$(ul_submenu).slideDown();
		}else{
			$(ul_submenu).slideUp();
		}		
		var i_r=$(this).children('i');
		$(i_r).toggleClass('fa-angle-up fa-angle-down');
	});
	// end menu danh muc san pham
});