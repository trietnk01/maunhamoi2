<?php 
get_header(); 
global $zController,$zendvn_sp_settings;    
$vHtml=new HtmlControl();
$args = $wp_query->query;
$args['posts_per_page'] = $zendvn_sp_settings['product_number'];
$wp_query->query($args);
$the_query=$wp_query;
$args=array();
$q='';
$za_category_id=0;
if(isset($_GET['q'])){
    $q=trim($_GET['q']);
}
if(isset($_GET["za_category_id"])){
    $za_category_id=(int)@$_GET["za_category_id"];
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
if(count(@$args) > 0){
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args['posts_per_page'] = $zendvn_sp_settings['product_number'];
    $args['paged']=@$paged;
    $the_query = new WP_Query( $args );  
}
$paging  = $zController->getHelper('Paging');
$term_id = get_queried_object_id();
$source_term= get_term_by('id', $term_id, 'za_category');   
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
                                        single_cat_title(); 
                                        ?>                                            
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
                                            <?php 
                                            $term_id = get_queried_object_id();
                                            $source_term= get_term_by('id', $term_id, 'za_category');                                          
                                            $term_link=get_term_link($source_term,'za_category');     
                                            $term_parent=get_term_by('id',$source_term->parent,'za_category');
                                            ?>
                                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                                <a itemscope="" itemtype="http://schema.org/Thing" itemprop="item" id="<?php echo @$term_link; ?>" href="<?php echo @$term_link; ?>">
                                                    <span itemprop="name"><?php single_cat_title(); ?></span>
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
                                <?php 
                                if(@$term_parent->slug=='may-moc-thiet-bi-xay-dung'){
                                    do_shortcode('[side_bar_may_moc]'); 
                                }else{
                                    do_shortcode('[side_bar_nep_upvc]'); 
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="wpb_column vc_column_container vc_col-sm-9">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">       
                                <h1 style="display: none;"><?php echo get_bloginfo( 'name','' ); ?></h1>                        
                                <div class="frm margin-top-15" >
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
                                                $term = wp_get_object_terms( $post_id,  'za_category' );                                    $source_term_unit =wp_get_object_terms( $post_id,  'za_unit' );                                                                 
                                                if((int)@$k%3==0){
                                                    echo '<div class="section_inner_margin clearfix">';
                                                }
                                                ?>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                    <div class="vc_column-inner ">
                                                        <div class="wpb_wrapper">
                                                            <div class="product_box_category">
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
                                        if($the_query->max_num_pages > 1){     
                                            ?>
                                            <div class="paging">
                                                <center>  
                                                    <?php echo $paging->getPaging($the_query);?>  
                                                </center>   
                                            </div>
                                            <?php
                                        }    
                                    }else{
                                        ?>
                                        <div class="rafaproduct">                                     
                                            <center>Đang cập nhật</center>                                          
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
        </div>     

        
                 
    </div>
</div>
<?php get_footer(); ?>
<?php wp_footer();?>