<?php
// -------------------------------
//  Load support
// -------------------------------
add_action('init','p_load_support');
function p_load_support(){
    register_nav_menus(
        array(
            "primary"    => __( "Primay Menu"),
            "menu_content_bottom_1"=>("Menu content bottom 1"),
            "menu_content_bottom_2"=>("Menu content bottom 2"),
            "menu_content_bottom_3"=>("Menu content bottom 3"),
            "menu_content_bottom_4"=>("Menu content bottom 4"),
        )
    );

}
