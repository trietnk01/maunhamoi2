<?php 
get_header();
global $zController;

$vHtml=new HtmlControl();  
$page_id_zcart = $zController->getHelper('GetPageId')->get('_wp_page_template','zcart.php');          
$permarlink_zcart = get_permalink(@$page_id_zcart);
$ssValueCart="zcart";
$ssCart        = $zController->getSession('SessionHelper',"vmart",$ssValueCart);    
$arrCart = @$ssCart->get($ssValueCart)['cart'];   
if(count(@$arrCart) == 0){
    wp_redirect($permarlink_zcart);
} 
$payment=array(
    "thanh-toan-qua-ngan-hang",
    "thanh-toan-bang-tien-mat"
);
$lstPaymentMethod=array();
$lstPaymentMethod[]=array("id"=>0,"title"=>"","content"=>"");
foreach ($payment as $key => $value) {
    $args=array(
        "name"=>$value,
        "post_type"=>"payment_method"
    );
    $the_query = new WP_Query( $args );
    if($the_query->have_posts()){
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $post_id=$the_query->post->ID;
            $title=get_the_title($post_id);
            $content=get_the_content($post_id);
            $item=array();
            $item["id"]=$post_id;
            $item["title"]=$title;
            $item["content"]=$content;
            $lstPaymentMethod[]=$item;
        }
    }
}
$total_price=0;
$total_quantity=0;
$data=array();
foreach ($arrCart as $key => $value) {  
    
    $product_quantity=$value["product_quantity"];
    $product_total_price=$value["product_total_price"];
    $total_price+=(float)$product_total_price;
    $total_quantity+=(float)$product_quantity;
    $linkDelete="index.php?action=delete&id=".$product_id;
} 
?>
<div class="full_width">
    <div class="full_width_inner">      
        <div class="vc_row wpb_row section vc_row-fluid grid_section ">
            <div class="section_inner clearfix">
                <div class="section_inner_margin clearfix">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">                                
                                <div class="breadcrumb_c">
                                    <ul itemscope="" itemtype="http://schema.org/BreadcrumbList" class="mybreadcrumb">
                                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                            <a itemscope="" itemtype="http://schema.org/Thing" itemprop="item" id="<?php echo site_url('/'); ?>" href="<?php echo site_url('/'); ?>">
                                                <span itemprop="name">Trang chủ</span>
                                            </a>
                                            <i class="fa fa-angle-right"></i>
                                            <meta itemprop="position" content="1">
                                        </li>                                        
                                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                            <a itemscope="" itemtype="http://schema.org/Thing" itemprop="item" id="<?php echo site_url('/'); ?>" href="<?php echo site_url('/'); ?>">
                                                <span itemprop="name">
                                                    <?php 
                                                    if(have_posts()){
                                                        while (have_posts()) {
                                                            the_post();
                                                            echo get_the_title();
                                                        }
                                                        wp_reset_postdata();
                                                    }
                                                    ?>
                                                </span>
                                            </a>                                            
                                            <meta itemprop="position" content="2">
                                        </li>                                                       
                                    </ul>
                                </div>              
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                if(count($arrCart) > 0){
                    do_shortcode('[form_checkout]');
                }else{
                    ?>
                    <div class="section_inner_margin clearfix">
                        <div class="wpb_column vc_column_container vc_col-lg-12">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="vite"> 
                                    GIỎ HÀNG RỖNG
                                    </div>
                                </div>
                            </div>  
                        </div>                        
                    </div>
                    <?php
                }
                ?>                
            </div>
        </div>
    </div>
</div> 
<?php 
get_footer(); 
wp_footer();
?>