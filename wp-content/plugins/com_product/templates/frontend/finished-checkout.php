<?php get_header(); ?>
<div class="slideshow_child_page">        
    <div class="full_width">
        <div class="full_width_inner">      
            <div class="vc_row wpb_row section vc_row-fluid grid_section ">
                <div class="section_inner clearfix">
                    <div class="section_inner_margin clearfix">
                        <div class="wpb_column vc_column_container vc_col-sm-12">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <h2 class="single_cat">
                                        <?php 
                                    if(have_posts()){
                                        while (have_posts()) {
                                            the_post();
                                            echo get_the_title();
                                        }
                                        wp_reset_postdata();
                                    }
                                    ?>
                                    </h2>                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="full_width">
    <div class="full_width_inner">        
        <div class="vc_row wpb_row section vc_row-fluid grid_section">
            <div class="section_inner clearfix">
                <div class="section_inner_margin clearfix">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div class="note note-success">Thanh toán thành công</div>
                            </div>
                        </div>
                    </div>
                </div>                        
            </div>
        </div>
    </div>
</div>
<?php 
$page_id_zcart = $zController->getHelper('GetPageId')->get('_wp_page_template','zcart.php');                    
$permarlink_zcart = get_permalink($page_id_zcart);                
$ssValueCart="zcart";                
$ssCart        = $zController->getSession('SessionHelper',"vmart",$ssValueCart);                    
$arrCart = @$ssCart->get($ssValueCart)['cart'];                     
if(count($arrCart) == 0){        
    wp_redirect($permarlink_zcart);                   
}   
$ssValueCart="zcart";
$ssCart        = $zController->getSession('SessionHelper',"vmart",$ssValueCart);     
$ssCart->reset();    
get_footer(); ?>
<?php wp_footer();?>