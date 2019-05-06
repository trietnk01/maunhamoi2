<?php 
get_header();
global $zController;

$vHtml=new HtmlControl();  

$ssValueCart="zcart";
$ssCart        = $zController->getSession('SessionHelper',"vmart",$ssValueCart);    
$arrCart = @$ssCart->get($ssValueCart)['cart'];   

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
?>
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
        <div class="vc_row wpb_row section vc_row-fluid grid_section ">
            <div class="section_inner clearfix">                
                <?php 
                if(count($arrCart) > 0){
                    ?>
                    <div class="section_inner_margin clearfix">
                        <div class="wpb_column vc_column_container vc_col-lg-12">
                            <div class="vc_column-inner">
                                <div class="wpb_wrapper">
                                    <div class="vite">
                                        
                                           <form method="POST" name="frm" class="napnap niphim">
                                                <input type="hidden" name="action" value="update-cart" />
                                                <?php wp_nonce_field("update-cart",'security_code',true);?>
                                                <h3 class="widget_dmsp">GIỎ HÀNG</h3>
                                                <?php 
                                                $total_price=0;
                                                foreach ($arrCart as $key => $value){
                                                    $product_id=$value["product_id"];           
                                                    $product_name=$value["product_name"];
                                                    $product_unit=$value["product_unit"];
                                                    $product_image=$value["product_image"];
                                                    $featured_image=$vHtml->getSmallImage($product_image);          
                                                    $product_link=get_the_permalink($value["product_id"]);
                                                    $product_quantity=$value["product_quantity"];                                                    
                                                    $product_price=$value["product_price"];
                                                    $product_total_price=$value["product_total_price"];       
                                                    $total_price+=(float)$product_total_price;
                                                        $total_quantity+=(float)$product_quantity;                                             
                                                    $link_delete="index.php?action=delete&id=".$product_id;
                                                    ?>
                                                    <div class="row_cart">
                                                        <div class="cart_img"><img src="<?php echo @$featured_image; ?>"></div>
                                                        <div class="cart_info">
                                                            <div><a href="<?php echo @$product_link; ?>"><?php echo @$product_name; ?></a></div>
                                                            <div class="nita nickback">
                                                                <div class="sl_left"><strong>Số lượng:</strong></div>
                                                                <div class="box_quantity_cart_mobile rifaxa">
                                                                        <div ><a href="javascript:void(0);" onclick="plus_cart_mobile(this);" ><i class="fas fa-plus-circle"></i></a></div>
                                                                        <div><input class="quantity_cart" name="quantity[<?php echo $product_id; ?>]" value="<?php echo @$product_quantity; ?>" onkeypress="return isNumberKey(event);" /></div>
                                                                        <div ><a href="javascript:void(0);" onclick="minus_cart_mobile(this);" ><i class="fas fa-minus-circle"></i></a></div>
                                                                    </div> 
                                                                <div class="clr"></div>
                                                            </div>                                                           
                                                            <div class="nita">
                                                                <div class="position_wrapper"><?php echo @$product_quantity ?> x <strong><?php echo $vHtml->fnPrice($product_price); ?> VNĐ / <?php echo @$product_unit; ?></strong></div>
                                                                <div class="raim_right"><a href="<?php echo site_url($link_delete); ?>"><i class="far fa-trash-alt"></i></a></div>
                                                                <div class="clr"></div>
                                                            </div>                  
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <div class="break_module_line"></div>
                                                <div><center><span class="nita"><strong>TỔNG CỘNG :</strong></span> <span class="total_pr"><?php echo $vHtml->fnPrice($total_price); ?> VNĐ</span></center></div>
                                                <div class="break_module_line"></div>
                                                <div  class="cart_update_box"><input type="submit" name="btn_update_cart" class="com_update_cart" value="CẬP NHẬT" /></div>
                                                <?php 
                                                $page_id_zcart = $zController->getHelper('GetPageId')->get('_wp_page_template','zcart.php');    
                                                $page_id_checkout = $zController->getHelper('GetPageId')->get('_wp_page_template','checkout.php');  
                                                $permarlink_zcart = get_permalink($page_id_zcart);      
                                                $permarlink_checkout = get_permalink($page_id_checkout);        
                                                ?>
                                                                                                
                                            </form>
                                            <form method="POST" name="frm" class="hero_cart">
                                                <input type="hidden" name="action" value="update-cart" />
                                                <?php wp_nonce_field("update-cart",'security_code',true);?>
                                                <table  cellpadding="0" cellspacing="0" width="100%" class="tb_cart">
                                                    <thead>
                                                        <tr>    
                                                            <th class="sp_title">Sản phẩm</th>  
                                                            
                                                            <th>Giá</th>                                                        
                                                            <th>Số lượng</th>
                                                            <th class="tc_title">Tổng cộng</th>                                                       
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php                                                        
                                                        foreach ($arrCart as $key => $value) {  
                                                            $product_id=$value["product_id"];           
                                                            $product_name=$value["product_name"];
                                                            $product_unit=$value["product_unit"];
                                                            $product_image=$value["product_image"];
                                                            $featured_image=$vHtml->getSmallImage($product_image);          
                                                            $product_link=get_the_permalink($value["product_id"]);
                                                            $product_quantity=$value["product_quantity"];
                                                            
                                                            $product_price=$value["product_price"];
                                                            $product_total_price=$value["product_total_price"];
                                                            
                                                            $link_delete="index.php?action=delete&id=".$product_id;                                                    
                                                            ?>
                                                            <tr>
                                                                <td class="nickback">
                                                                    <div class="delete_icon">
                                                                        <a href="<?php echo site_url($link_delete); ?>"><i class="far fa-trash-alt"></i></a>                                                                    
                                                                    </div>
                                                                    <div class="img_cart">
                                                                        <img src="<?php echo @$featured_image; ?>">
                                                                    </div>
                                                                    <div class="cart_box_info">
                                                                        <div><a href="<?php echo @$product_link; ?>"><?php echo @$product_name; ?></a></div>
                                                                    </div>
                                                                </td>                                                            
                                                                <td class="nickback"><?php echo $vHtml->fnPrice($product_price)  ; ?> VNĐ / <?php echo @$product_unit; ?></td>
                                                                <td class="nickback">
                                                                    <div class="box_quantity_cart rifaxa">
                                                                        <div ><a href="javascript:void(0);" onclick="plus_cart(this);" class="quantity-right-plus"><i class="fas fa-plus-circle"></i></a></div>
                                                                        <div><input class="quantity_cart" name="quantity[<?php echo $product_id; ?>]" value="<?php echo @$product_quantity; ?>" onkeypress="return isNumberKey(event);" /></div>
                                                                        <div ><a href="javascript:void(0);" onclick="minus_cart(this);" class="quantity-left-minus"><i class="fas fa-minus-circle"></i></a></div>
                                                                    </div> 
                                                                </td>
                                                                <td class="nickback tc_title"><?php echo $vHtml->fnPrice($product_total_price) ; ?> VNĐ</td>
                                                            </tr>
                                                            <?php
                                                        } 
                                                        ?>                  
                                                    </tbody>
                                                </table>
                                                <div class="margin-top-5 kalic">
                                                    <div class="tb_croa"><a href="index.php?action=delete-all" class="com_product28">Xóa giỏ hàng</a></div>
                                                    <div  class="tb_croa"><input type="submit" name="btn_update_cart" class="com_product25" value="Cập nhật" /></div>
                                                    <div  class="tb_croa"><a href="<?php echo site_url(); ?>" class="com_product27">Tiếp tục mua hàng</a></div>
                                                </div>
                                            </form>   
                                    </div>
                                </div>
                            </div>  
                        </div>                        
                    </div>                    
                    <?php
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