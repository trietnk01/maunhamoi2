<?php 
$slug='';
$name='';
$source_term=null;
if(is_archive()){
    $term_id = get_queried_object_id();
    $source_term= get_term_by('id', $term_id, 'category');
    if($source_term == null){
        $source_term= get_term_by('id', $term_id, 'za_category');
    }  
    if($source_term == null){
        $source_term= get_term_by('id', $term_id, 'za_project');
    }      
    if($source_term != null){
        $slug=@$source_term->slug;  
        $name=@$source_term->name;  
    }    
}   
if(is_single()){
    if(have_posts()){
        while (have_posts()) {
            the_post();             
            $post_id= get_the_id();
            $source_term = wp_get_object_terms( $post_id,  'category' );                        
        }
        wp_reset_postdata();  
    }    
    if($source_term == null){
        if(have_posts()){
            while (have_posts()) {
                the_post();             
                $post_id= get_the_id();
                $source_term = wp_get_object_terms( $post_id,  'za_category' );                        
            }
            wp_reset_postdata();  
        }
    }
    if($source_term == null){
        if(have_posts()){
            while (have_posts()) {
                the_post();             
                $post_id= get_the_id();
                $source_term = wp_get_object_terms( $post_id,  'za_project' );                        
            }
            wp_reset_postdata();  
        }
    }
    if($source_term != null){
        $slug=@$source_term[0]->slug;
        $name=@$source_term[0]->name;
    }
    
}
if(is_page()){        
    if(have_posts()){
        while (have_posts()) {
            the_post();             
            $post_id= get_the_id();
            $name=get_the_title($post_id);            
            $slug = basename( get_permalink($post_id) );                          
        }
        wp_reset_postdata();  
    }   
}
$source_slug=array($slug);
$args = array(
    'post_type' => 'zabanner',  
    'orderby' => 'id',
    'order'   => 'DESC',                                                  
    'tax_query' => array(
        array(
            'taxonomy' => 'za_banner',
            'field'    => 'slug',
            'terms'    => array('banner-child-page'),                                  
        ),
    ),
); 

$the_query = new WP_Query( $args );
?>
<div class="full_width">
    <div class="full_width_inner">
        <div class="vc_row wpb_row section vc_row-fluid grid_section carahook">
            <div class="section_inner clearfix">
                <div class="section_inner_margin clearfix">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div class="tadahook"><?php echo @$name; ?></div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>        
                   