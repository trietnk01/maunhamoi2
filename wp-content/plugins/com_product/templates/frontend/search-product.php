<?php 
get_header(); 
global $zController,$zendvn_sp_settings;    
$vHtml=new HtmlControl();
$productModel=$zController->getModel("/frontend","ProductModel");   
$totalItemsPerPage=0;
$pageRange=10;
$currentPage=1; 
$the_query=$wp_query;
if(!empty(@$_POST["filter_page"]))          {
    $currentPage=@$_POST["filter_page"];  
}
if(!empty(@$zendvn_sp_settings["product_number"])){
    $totalItemsPerPage=(int)@$zendvn_sp_settings["product_number"];        
}
$args=array();
$q='';
$za_category_id=0;
$za_position_id=0;
if(isset($_POST['q'])){
    $q=trim($_POST['q']);
}
if(isset($_POST["za_category_id"])){
    $za_category_id=(int)@$_POST["za_category_id"];
}
if(isset($_POST["za_position_id"])){
    $za_position_id=(int)@$_POST["za_position_id"];
}
if(!empty(@$q)){
    $args = array(
        'post_type' => 'zaproduct',  
        'orderby' => 'id',
        'order'   => 'DESC'                    
    );  
    $args['s'] =@$q;
}
if((int)@$za_category_id > 0){
    if(count(@$args) == 0){
        $args = array(
            'post_type' => 'zaproduct',  
            'orderby' => 'id',
            'order'   => 'DESC'                    
        ); 
    }
    $args_za_category=array(
        'taxonomy' => 'za_category',
        'field'    => 'term_id',
        'terms'    => array((int)@$za_category_id),         
    );
    $args['tax_query']=array($args_za_category);    
}
if(count($args) > 0){
    $the_query = new WP_Query( $args );    
}
$productModel->setWpQuery($the_query);   
$productModel->setPerpage($totalItemsPerPage);        
$productModel->prepare_items();               
$totalItems= $productModel->getTotalItems();               
$arrPagination=array(
    "totalItems"=>$totalItems,
    "totalItemsPerPage"=>$totalItemsPerPage,
    "pageRange"=>$pageRange,
    "currentPage"=>$currentPage   
);    
$pagination=$zController->getPagination("Pagination",$arrPagination);
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
                                        TÌM KIẾM SẢN PHẨM                                          
                                    </h2>
                                    <div class="slide_breadcrumb">
                                        <ul itemscope="" itemtype="http://schema.org/BreadcrumbList" class="mybreadcrumb">
                                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                                <a itemscope="" itemtype="http://schema.org/Thing" itemprop="item" id="<?php echo site_url('/'); ?>" href="<?php echo site_url('/'); ?>">
                                                    <span itemprop="name">Trang chủ</span>
                                                </a>
                                                <span>|</span>
                                                <meta itemprop="position" content="1">
                                            </li>                                            
                                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                                <a itemscope="" itemtype="http://schema.org/Thing" itemprop="item" id="<?php echo site_url(); ?>" href="<?php echo site_url(); ?>">
                                                    <span itemprop="name">TÌM KIẾM SẢN PHẨM</span>
                                                </a>                                            
                                                <meta itemprop="position" content="2">
                                            </li>                                                       
                                        </ul>
                                    </div>              
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
                    <div class="wpb_column vc_column_container vc_col-sm-3">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">  
                                <?php do_shortcode('[side_bar_may_moc_nep_upvc]'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="wpb_column vc_column_container vc_col-sm-9">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">       
                                <h1 style="display: none;"><?php echo get_bloginfo( 'name','' ); ?></h1>                        
                                <form  method="post"  class="frm margin-top-15" name="frm">
                                    <input type="hidden" name="filter_page" value="1" />
                                    <input type="hidden" name="za_category_id" value="'.@$za_category_id.'" />
                                    <input type="hidden" name="q" value="'.@$q.'" />
                                    <?php 
                                    if($the_query->have_posts()){
                                        ?>
                                        <div class="rafaproduct">
                                            <?php 
                                            while ($the_query->have_posts()){
                                                $the_query->the_post();
                                                $post_id=$the_query->post->ID;                                                                      
                                                $permalink=get_the_permalink($post_id);
                                                $title=get_the_title($post_id);
                                                $thumbnail=get_the_post_thumbnail_url($post_id, 'full'); 
                                                $featured_image=$vHtml->getSmallImage($thumbnail);
                                                $price=get_post_meta($post_id,"price",true);    
                                                $scale_img=get_field('scale_img',@$post_id); 
                                                $term = wp_get_object_terms( $post_id,  'za_category' );                                                                                                      
                                                if((int)@$k%3==0){
                                                    echo '<div class="section_inner_margin clearfix">';
                                                }
                                                ?>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                    <div class="vc_column-inner ">
                                                        <div class="wpb_wrapper">
                                                            <div class="product_box_category">
                                                                <div class="product_box_img">
                                                                    <a href="<?php echo @$permalink; ?>">
                                                                        <img class="first_img" alt="<?php echo @$title; ?>" src="<?php echo @$featured_image; ?>" >
                                                                        <img class="hover_img" alt="<?php echo @$title; ?>" src="<?php echo @$scale_img['sizes']['thumbnail']; ?>"  >
                                                                    </a>                                            
                                                                </div>  
                                                                <h3 class="product_title"><a href="<?php echo @$permalink; ?>"><?php echo @$title; ?></a></h3>
                                                                <?php 
                                                                if(!empty(@$price)){
                                                                    ?>
                                                                    <div class="product_price"><?php echo $vHtml->fnPrice(@$price); ?> 
                                                                    <?php 
                                                                    if(@$term_parent->slug=='may-moc-thiet-bi-xay-dung'){
                                                                        echo 'đ / chiếc';
                                                                    }else{
                                                                        echo 'đ / hộp';
                                                                    }
                                                                    ?>                                                                        
                                                                    </div>
                                                                    <?php
                                                                }
                                                                ?>                                  
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $k++;
                                                if((int)@$k%3==0 || $k == $the_query->post_count){
                                                    echo '</div>';
                                                }   
                                            }
                                            ?>
                                        </div>
                                        <?php                                        
                                        wp_reset_postdata();
                                        ?>
                                        <div>
                                            <center>
                                                <?php echo $pagination->showPagination(); ?>        
                                            </center>                                                                                                
                                        </div>
                                        <?php
                                    }else{
                                        ?>
                                        <div class="rafaproduct">                                     
                                            <center>Đang cập nhật</center>                                          
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </form>         
                            </div>
                        </div>
                    </div>                     
                </div>              
            </div>  
        </div>              
    </div>
</div>
<?php get_footer(); ?>
<?php wp_footer();?>