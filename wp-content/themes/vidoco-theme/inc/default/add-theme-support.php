<?php
// -------------------------------
//  Load support
// -------------------------------
add_action('init','p_load_support');
function p_load_support(){
    register_nav_menus(
        array(
            "primary"    => __( "Primay Menu"),
            "related_product_menu" => __("Menu sản phẩm liên quan"), 
            "menu_content_bottom_1" => __("menu_content_bottom_1"),       
            "menu_content_bottom_2" => __("menu_content_bottom_2"),       
            "menu_content_bottom_3" => __("menu_content_bottom_3"),       
            "menu_content_bottom_4" => __("menu_content_bottom_4"),       
        )
    );

}
