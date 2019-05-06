<?php 
get_header(); 
require_once PLUGIN_PATH . DS . "templates" . DS . "frontend". DS . "banner.php";
global $zController,$zendvn_sp_settings;    
$zController->getController("/frontend","ProductController");
$vHtml=new HtmlControl();    
$width=$zendvn_sp_settings["product_width"];    
$height=$zendvn_sp_settings["product_height"];    
$width_thumbnail=$width/5;
$height_thumbnail=$height/5;
$post_id=0;
$term_id=0;
$term=array();
?>
<div class="full_width">
    <div class="full_width_inner">
        <div class="vc_row wpb_row section vc_row-fluid grid_section">
            <div class="section_inner clearfix">
                <div class="section_inner_margin clearfix">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <div class="margin-top-30">
                                    <p style="text-align: center;"><span class="project_flc_gia_lai"><strong>TỔNG QUAN DỰ ÁN</strong></span></p>
                                </div>
                                <div ><p style="text-align: center;"><span class="flc_gialai_to_hop"><strong>FLC Gia Lai – Tổ hợp sân golf , khu nghỉ dưỡng lý tưởng</strong></span></p></div>
                                <?php 
                                if(have_posts()){
                                    while (have_posts()){
                                        the_post();                            
                                        $post_id=get_the_ID(); 
                                        $title=get_the_title($post_id);          
                                        $permalink=get_the_permalink($post_id);                    
                                        $intro=get_post_meta($post_id,"intro",true);                            
                                        $featured_image="";
                                        $thumbnail=get_the_post_thumbnail_url($post_id, 'full');   
                                        if(!empty($thumbnail)){
                                            $featured_image=$thumbnail;
                                        }else{
                                            $featured_image=site_url("wp-content/uploads/gioi-thieu.jpg");
                                        }
                                        $count_view_post=get_post_meta( $post_id,'count_view_post', true );           
                                        $count  =   0;  
                                        if(!empty($count_view_post)){
                                            $count  =   (int)$count_view_post;                
                                        }           
                                        $count++;        
                                        update_post_meta($post_id, 'count_view_post', $count);    
                                        $date_post=get_the_date('d/m/Y',@$post_id);   
                                        $source_term = wp_get_object_terms( $post_id,  'za_project' );                                                                   
                                        if(count($source_term) > 0){
                                            foreach ($source_term as $key => $value) {
                                                $source_term_id[]=$value->term_id;
                                            }
                                        }             
                                        ?>
                                        <div class="project-single-image">
                                            <figure><img src="<?php echo @$featured_image; ?>" title="<?php echo @$title; ?>" alt="<?php echo @$title; ?>"></figure>
                                        </div>                                        
                                        <div class="box-project-single">
                                            <h1 class="project-single-title"><?php echo @$title; ?></h1>
                                            <?php 
                                            if(!empty(@$intro)){
                                                ?>
                                                <div class="project-single-intro"><?php echo @$intro; ?></div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="box-project-content">
                                            <?php 
                                            the_content();
                                            $title_site=get_bloginfo( 'name','' );  
                                            ?>
                                            <!-- begin detail general site contact -->
                                            <div class="detail_title_site"><b><?php echo @$title_site; ?></b></div>
                                            <div><b>Địa chỉ:</b> <?php echo @$zendvn_sp_settings["address"]; ?></div>
                                            <div><b>Hotline:</b> <span class="detail_hotline"><?php echo @$zendvn_sp_settings["telephone"]; ?></span></div>
                                            <div><b>Webiste:</b> <a href="<?php echo site_url('/') ?>" title="<?php echo @$title_site; ?>"><?php echo site_url('/'); ?></a></div>
                                            <!-- end detail general site contact -->
                                        </div>   
                                        <div class="box-project-single-bottom">
                                            <div><i class="fa fa-eye"></i>  Lượt xem : <?php echo (int)@$count; ?></div>
                                            <div class="margin-left-30"><i class="fa fa-calendar"></i>  Ngày đăng : <?php echo @$date_post; ?></div>
                                        </div>                                     
                                        <?php    
                                    }
                                    wp_reset_postdata();     
                                }
                                ?>                                                                                            
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        <?php 
        echo do_shortcode('[load_equipment_project_bottom]'); 
        $args = array(
            'post_type' => 'zaproject',  
            'orderby' => 'id',
            'order'   => 'DESC',  
            'posts_per_page' => -1,        
            'post__not_in'=>array($post_id),
            'tax_query' => array(
                array(
                    'taxonomy' => 'za_project',
                    'field'    => 'term_id',
                    'terms'    => @$source_term_id,                   
                ),
            ),
        );   
        $the_query=new WP_Query($args);         
        if($the_query->have_posts()){
            ?>
            <div class="vc_row wpb_row section vc_row-fluid">
                <div class=" full_section_inner clearfix">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <?php 
                                $k=0;
                                while ($the_query->have_posts()){
                                    $the_query->the_post();
                                    $post_id=$the_query->post->ID;                                                                      
                                    $permalink=get_the_permalink($post_id);
                                    $title=get_the_title($post_id);
                                    $featured_image="";
                                    $thumbnail=get_the_post_thumbnail_url($post_id, 'full');   
                                    if(!empty($thumbnail)){
                                        $featured_image=$thumbnail;
                                    }else{
                                        $featured_image=site_url("wp-content/uploads/gioi-thieu.jpg");
                                    }
                                    $intro=get_post_meta($post_id,"intro",true);                                                              
                                    if((int)@$k%2==0){
                                        ?>
                                        <div class="zaproject_related">
                                            <div class="zaproject_left">
                                                <figure><img src="<?php echo @$featured_image; ?>" title="<?php echo @$title; ?>" alt="<?php echo @$title; ?>"></figure>
                                            </div>
                                            <div class="zaproject_right">
                                                <div class="za_project_wrapper">
                                                    <h3 class="zaproject_box_title"><center><a href="<?php echo @$permalink; ?>"><?php echo @$title; ?></a></center></h3>
                                                    <div class="category-product-intro"><?php echo @$intro; ?></div>
                                                    <div class="box-featured-detail zaproject_detail_link">
                                                        <center><a href="<?php echo @$permalink; ?>">XEM CHI TIẾT</a></center>
                                                    </div>
                                                </div>                                                
                                            </div>
                                            <div class="clr"></div>
                                        </div>
                                        <?php  
                                    }else{
                                        ?>
                                        <div class="zaproject_related">
                                            <div class="zaproject_left">
                                                <div class="za_project_wrapper">
                                                    <h3 class="zaproject_box_title"><center><a href="<?php echo @$permalink; ?>"><?php echo @$title; ?></a></center></h3>
                                                    <div class="category-product-intro"><?php echo @$intro; ?></div>
                                                    <div class="box-featured-detail zaproject_detail_link">
                                                        <center><a href="<?php echo @$permalink; ?>">XEM CHI TIẾT</a></center>
                                                    </div>
                                                </div>  
                                            </div>
                                            <div class="zaproject_right">
                                                <figure><img src="<?php echo @$featured_image; ?>" title="<?php echo @$title; ?>" alt="<?php echo @$title; ?>"></figure>
                                            </div>
                                            <div class="clr"></div>
                                        </div>
                                        <?php  
                                    }
                                    $k++;                                    
                                }
                                wp_reset_postdata(); 
                                ?>               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php            
        }
        do_shortcode('[load_email_subcribation]'); 
        ?>    
    </div>
</div>
<?php
get_footer();
wp_footer();
?>