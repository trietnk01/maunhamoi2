<?php 
get_header(); 
global $zController,$zendvn_sp_settings;    

$vHtml=new HtmlControl();    
$width=$zendvn_sp_settings["product_width"];    
$height=$zendvn_sp_settings["product_height"];    
$width_thumbnail=$width/5;
$height_thumbnail=$height/5;
$post_id=0;
$term_id=0;
$term=array();
$source_term_id=array();
if(have_posts()){
    while (have_posts()){
        the_post();                            
        $post_id=get_the_ID(); 
        $title=get_the_title($post_id);          
        $permalink=get_the_permalink($post_id);                    
        
        $warranty=get_post_meta($post_id,"warranty",true);    
        $intro=get_field("intro",$post_id);                            
        $featured_image="";
        $thumbnail=get_the_post_thumbnail_url($post_id, 'full');   
        if(!empty($thumbnail)){
            $featured_image=$thumbnail;
        }else{
            $featured_image=site_url("wp-content/uploads/gioi-thieu.png");
        }
        $date_post_schema=get_the_date('Y-m-d',@$post_id);   
        $count_view_post=get_post_meta( $post_id,'count_view_post', true );           
        $count  =   0;  
        if(!empty($count_view_post)){
            $count  =   (int)$count_view_post;                
        }           
        $count++;        
        update_post_meta($post_id, 'count_view_post', $count);    
        $date_post=get_the_date('d/m/Y',@$post_id);   
        $source_term = wp_get_object_terms( $post_id,  'za_category' );                                                                   
        if(count($source_term) > 0){
            foreach ($source_term as $key => $value) {
                $source_term_id[]=$value->term_id;
            }
        }    
        $meta_key = '_zendvn_sp_zaproduct_';
        $arrOrdering = get_post_meta($post->ID, $meta_key . 'img-ordering', true);
        $arrPicture = get_post_meta($post->ID, $meta_key . 'img-url', true);
        
        $newPicArray = array();
        foreach ($arrPicture as $key => $val){
            $newPicArray[$val] = $arrOrdering[$key];
        }
        $newPicArray[$thumbnail]=0;        
        asort($newPicArray);        
        $source_term_unit =wp_get_object_terms( $post_id,  'za_unit' );            
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
                                            <h2 class="single_cat"><?php echo @$title; ?></h2>
                                            <div class="slide_breadcrumb">
                                                <ul itemscope="" itemtype="http://schema.org/BreadcrumbList" class="mybreadcrumb">
                                                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                                        <a itemscope="" id="<?php echo site_url('/'); ?>" itemtype="http://schema.org/Thing" itemprop="item" href="<?php echo site_url('/'); ?>">
                                                            <span itemprop="name">Trang chủ</span>
                                                        </a>
                                                        <span>|</span>
                                                        <meta itemprop="position" content="1">
                                                    </li>
                                                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                                        <a itemscope="" id="<?php echo @$term_link; ?>" itemtype="http://schema.org/Thing" itemprop="item" href="<?php echo @$term_link; ?>">
                                                            <span itemprop="name"><?php echo @$source_term[0]->name; ?></span>
                                                        </a>
                                                        <span>|</span>
                                                        <meta itemprop="position" content="2">
                                                    </li> 
                                                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                                        <a itemscope="" id="<?php echo @$permalink; ?>" itemtype="http://schema.org/Thing" itemprop="item" href="<?php echo @$permalink; ?>">
                                                            <span itemprop="name"><?php echo @$title; ?></span>
                                                        </a>

                                                        <meta itemprop="position" content="3">
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
                            <div class="wpb_column vc_column_container vc_col-sm-6">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="ruton">
                                            <div class="img_detail_left">
                                                <?php                                                 
                                                if(count(@$newPicArray) > 0){                                                    
                                                    foreach ($newPicArray as $key => $value) {
                                                        ?>
                                                        <div class="item_product_detail">
                                                            <a href="javascript:void(0);" onclick="changeImg('<?php echo @$key; ?>','<?php echo @$title; ?>');"><img alt="<?php echo @$title; ?>"  title="<?php echo @$title; ?>" src="<?php echo @$key; ?>"></a>
                                                        </div>
                                                        <?php                                                    
                                                    } 
                                                }
                                                ?>
                                            </div>
                                            <div class="img_detail_right">
                                                <div class="image-detail">
                                                    <a class="example-image-link" href="<?php echo @$featured_image; ?>" data-lightbox="example-set" data-title="<?php echo @$title; ?>"><img class="example-image" src="<?php echo @$featured_image; ?>" alt="<?php echo @$title; ?>"/></a>
                                                </div>                                                                
                                            </div>  
                                            <div class="imgdetailnone">
                                                <?php                                                 
                                                if(count(@$newPicArray) > 0){                                                    
                                                    foreach ($newPicArray as $key => $value) {
                                                        ?>
                                                            <a class="example-image-link" href="<?php echo @$key; ?>" data-lightbox="example-set" data-title="<?php echo @$title; ?>"><img class="example-image" src="<?php echo @$key; ?>" alt="<?php echo @$title; ?>"/></a>                                                        
                                                        <?php                                                    
                                                    } 
                                                }
                                                ?>
                                            </div>
                                            <div class="clr"></div>                                           
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-6">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper"> 
                                        <h1 class="product_detail_title"><?php echo @$title; ?></h1>
                                        <div class="rapidshare">                                            
                                            <div class="facebook_button">
                                                <div class="fb-share-button" data-href="<?php echo @$permalink; ?>" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                                            </div>       
                                            <div class="facebook_like_button">
                                                <div class="fb-like" data-href="<?php echo @$zendvn_sp_settings['facebook_url']; ?>" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
                                            </div>
                                            <div class="category_twitter_sg"><a href="<?php echo @$permalink; ?>" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></div>
                                            <div class="category_linkedin_sg">
                                                <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
                                                <script type="IN/Share" data-url="<?php echo @$permalink; ?>"></script>
                                            </div>
                                            <div class="category_g_plus_sg">
                                                <div class="g-plus" data-action="share" data-annotation="none" data-height="24" data-href="<?php echo @$permalink; ?>"></div>
                                            </div>
                                            <div class="clr"></div>
                                        </div>  
                                        <div class="product_detail_intro"><?php echo @$intro; ?></div>
                                        <?php 
                                        $term_parent=get_term_by('id',$source_term[0]->parent,'za_category');                                        
                                        if(@$term_parent->slug=='may-moc-thiet-bi-xay-dung'){
                                            if(!empty(@$warranty)){
                                                ?>
                                                <div class="hl">
                                                    <div class="pddetailleft"><span><b>Bảo hành :</b></span></div> 
                                                    <div class="pddetailright"><?php echo @$warranty ?> tháng</div>
                                                    <div class="clr"></div> 
                                                </div>       
                                                <?php
                                            }    
                                            $source_term_manufacturer =wp_get_object_terms( $post_id,  'za_manufacturer' ); 
                                            if(count($source_term_manufacturer) > 0){
                                                ?>
                                                <div class="hl">
                                                    <div class="pddetailleft"><span><b>Sản xuất tại :</b></span> </div>
                                                    <div class="pddetailright">
                                                        <?php 
                                                        if(count($source_term_manufacturer) > 0){
                                                            foreach ($source_term_manufacturer as $key => $value) {
                                                                $term_link=get_term_link($value,'za_manufacturer');
                                                                ?>
                                                                <span ><?php echo @$value->name; ?></span>
                                                                <?php 
                                                            }
                                                        }             
                                                        ?>
                                                    </div>   
                                                    <div class="clr"></div>                                        
                                                </div>
                                                <?php
                                            }  
                                            $source_term_trade =wp_get_object_terms( $post_id,  'za_product_trade' ); 
                                            if(count($source_term_trade) > 0){
                                                ?>
                                                <div class="hl">
                                                    <div class="pddetailleft"><span><b>Thương hiệu :</b></span> </div>
                                                    <div class="pddetailright">
                                                        <?php 
                                                        if(count($source_term_trade) > 0){
                                                            foreach ($source_term_trade as $key => $value) {
                                                                $term_link=get_term_link($value,'za_product_trade');
                                                                ?>
                                                                <span ><?php echo @$value->name; ?></span>
                                                                <?php 
                                                            }
                                                        }             
                                                        ?>
                                                    </div>   
                                                    <div class="clr"></div>                                        
                                                </div>
                                                <?php
                                            }                                                       
                                        }                                                   
                                        ?>  
                                        <div class="hl">
                                            <div class="pddetailleft"><span><b>Đơn vị tính :</b></span> </div>
                                            <div class="pddetailright">
                                                <?php echo @$source_term_unit[0]->name ?>
                                            </div>  
                                            <div class="clr"></div>                                         
                                        </div>
                                        <div class="hl">
                                            <div class="pddetailleft2"><span><b>Chọn số lượng :</b></span> </div>
                                            <div class="pddetailright2">
                                                <form  name="frm_add_to_cart" method="POST">
                                                    <input type="hidden" name="action" value="add-to-cart">
                                                    <input type="hidden" name="id" value="<?php echo @$post_id; ?>">
                                                    <div class="box_quantity">
                                                        <div ><a href="javascript:void(0);" onclick="minus(this);" class="quantity-left-minus"><i class="fas fa-minus-circle"></i></a></div>
                                                        <div><input name="quantity" value="1"  onkeypress="return isNumberKey(event);" /></div>                                                        
                                                        <div ><a href="javascript:void(0);" onclick="plus(this);" class="quantity-right-plus"><i class="fas fa-plus-circle"></i></a></div>
                                                    </div>    
                                                    <div class="unit_combobox">
                                                        <?php 
                                                        $source_term_unit = wp_get_object_terms( $post_id,  'za_unit' );                                                           
                                                        ?>
                                                        <select name="unit_name">
                                                            <option value="<?php echo @$source_term_unit[0]->name ?>"><?php echo @$source_term_unit[0]->name ?></option>                                                                                                            
                                                        </select>
                                                    </div>   
                                                    <div class="btn_quantity">
                                                        <a href="javascript:void(0);" onclick="document.forms['frm_add_to_cart'].submit();">
                                                            <i class="fas fa-shopping-cart"></i>
                                                            ĐẶT MUA
                                                        </a>
                                                    </div> 
                                                    <div class="clr"></div>                                         
                                                </form>
                                            </div>
                                            <div class="clr"></div> 
                                        </div>  
                                        <?php 
                                        $price=get_post_meta($post_id,"price",true);
                                        if(!empty(@$price)){
                                            ?>
                                            <div class="hl">
                                                <div class="pddetailleft"><span><b>Đơn giá :</b></span> </div>
                                                <div class="pddetailright"><?php echo @$vHtml->fnPrice(@$price); ?> đ / <?php echo @$source_term_unit[0]->name ?>
                                                </div>
                                                <div class="clr"></div> 
                                            </div> 
                                            <?php
                                        }else{
                                            ?>
                                            <div class="hl">
                                                <div class="pddetailleft"><span><b>Đơn giá :</b></span> </div>
                                                <div class="pddetailright"><strong>XIN LIÊN HỆ</strong></div>
                                                <div class="clr"></div> 
                                            </div> 
                                            <?php
                                        }     
                                        ?>                                                            
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>   
                <div class="vc_row wpb_row section vc_row-fluid grid_section">
                    <div class="section_inner clearfix">
                        <div class="section_inner_margin clearfix">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <div class="product_info">
                                            <div class="tab">
                                                <button class="tablinks h-title" onclick="openCity(event, 'gioi-thieu')">Giới thiệu</button>
                                                <button class="tablinks h-title" onclick="openCity(event, 'thong-so-ky-thuat')">Thông số kỹ thuật</button>               
                                                <button class="tablinks h-title" onclick="openCity(event, 'video-huong-dan')">Video hướng dẫn</button>                                                                  
                                                <button class="tablinks h-title" onclick="openCity(event, 'commentfb')">Đánh giá</button>                    
                                            </div>
                                            <div id="gioi-thieu" class="tabcontent">
                                                <div class="product_tab_info" >
                                                    <?php the_content(); ?>              
                                                </div>
                                            </div>
                                            <div id="thong-so-ky-thuat" class="tabcontent">
                                                <div class="product_tab_info" >
                                                    <?php
                                                    $product_parameter=get_post_meta($post_id,"product_parameter",true);

                                                    if(!empty(@$product_parameter)){
                                                        $product_parameter = apply_filters( 'the_content',$product_parameter);
                                                        echo @$product_parameter; 
                                                    }                 
                                                    ?>
                                                </div>
                                            </div>          
                                            <div id="video-huong-dan" class="tabcontent">
                                                <div class="product_tab_info_video" >
                                                    <?php 
                                                    $video_id=get_post_meta($post_id,"video_id",true);
                                                    if(!empty($video_id)){
                                                        ?>
                                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo @$video_id; ?>?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                                        <?php 
                                                    }
                                                    ?>
                                                </div> 
                                            </div>     
                                            <div id="commentfb" class="tabcontent">
                                                <div class="product_tab_info_video" >
                                                    <div class="fb-comments" data-href="<?php echo @$permalink; ?>" data-numposts="10"></div>
                                                </div> 
                                            </div>                                                            
                                        </div>                                        
                                    </div>
                                </div>         
                            </div>                            
                        </div>
                    </div>
                </div>                
                <div class="vc_row wpb_row section vc_row-fluid grid_section">
                    <div class="section_inner clearfix">
                        <div class="section_inner_margin clearfix">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner">
                                    <div class="wpb_wrapper">
                                        <h2 class="related_product">SẢN PHẨM LIÊN QUAN</h2>    
                                        <?php 
                                        $args = array(
                                            'post_type' => 'zaproduct',  
                                            'orderby' => 'id',
                                            'order'   => 'DESC',  
                                            'posts_per_page' => 12,        
                                            'post__not_in'=>array($post_id),
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'za_category',
                                                    'field'    => 'term_id',
                                                    'terms'    => @$source_term_id,                   
                                                ),
                                            ),
                                        );
                                        $the_query=new WP_Query($args);                                         
                                        if($the_query->have_posts()){
                                            ?>
                                            <div class="owl-carousel owl_carousel_related_project product-theraphy owl-theme">
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
                                                    ?>
                                                    <div class="item">
                                                        <div class="product_box">
                                                            <?php 
                                                            if(!empty($scale_img)){
                                                                ?>
                                                                <div class="product_box_img">
                                                                    <center>
                                                                        <a href="<?php echo @$permalink; ?>">
                                                                            <img class="first_img" alt="<?php echo @$title; ?>" src="<?php echo @$featured_image; ?>" >
                                                                            <img class="hover_img" alt="<?php echo @$title; ?>" src="<?php echo @$scale_img['sizes']['thumbnail']; ?>"  >                                                                                   
                                                                        </a>
                                                                    </center>                                                                                   
                                                                </div>  
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <div class="product_box_img_none_hover">
                                                                    <center>
                                                                        <a href="<?php echo @$permalink; ?>">
                                                                            <img alt="<?php echo @$title; ?>" src="<?php echo @$featured_image; ?>" >

                                                                        </a>
                                                                    </center>                                                                                   
                                                                </div>  
                                                                <?php
                                                            }
                                                            ?>              
                                                            <h3 class="product_title"><a href="<?php echo @$permalink; ?>"><?php echo @$title; ?></a></h3>
                                                            <?php 
                                                            if(!empty(@$price)){
                                                                ?>
                                                                <div class="product_price"><?php echo $vHtml->fnPrice(@$price); ?> đ / <?php echo @$source_term_unit[0]->name ?>
                                                            </div>
                                                                <?php
                                                            }
                                                            ?>                                  
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <?php                                            
                                            wp_reset_postdata();  
                                        }
                                        ?>                                                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               
                
            </div>
        </div>
        <?php
    }
    ?>
        <script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "NewsArticle",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "https://google.com/article"
  },
  "headline": "Article headline",
  "image": "<?php echo @$featured_image; ?>",
  "datePublished": "<?php echo @$date_post_schema; ?>",
  "dateModified": "<?php echo @$date_post_schema; ?>",
  "author": {
    "@type": "Person",
    "name": "Administrator"
  },
   "publisher": {
    "@type": "Organization",
    "name": "Google",
    "logo": {
      "@type": "ImageObject",
      "url": "<?php echo site_url('/wp-content/uploads/logo.png'); ?>"
    }
  },
  "description": "<?php echo @$intro; ?>"
}
</script>
    <?php
    wp_reset_postdata();   
}
get_footer();
wp_footer(); 
?>