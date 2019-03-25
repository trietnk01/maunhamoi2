<?php
// -------------------------------
//  Load support
// -------------------------------
add_action('init','p_load_support');
function p_load_support(){
    register_nav_menus(
        array(
            'primary'    => __( 'Primay Menu', TDM  ),
            'mobile'  => __( 'Mobile Menu', TDM  ),
            'cateproduct'  => __( 'Danh mục sản phẩm', TDM  ),
            'intromenu'    => __( 'Giới thiệu', TDM  ),
            'productmenuleft'    => __( 'Sản phẩm trái', TDM  ),
            'productmenuright'    => __( 'Sản phẩm phải', TDM  ),
        )
    );

}
