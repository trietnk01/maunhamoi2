<?php 
get_header(); 
require_once PLUGIN_PATH . DS . "templates" . DS . "frontend". DS . "banner.php";
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
$za_project_id=0;
$za_position_id=0;
if(isset($_POST['q'])){
    $q=trim($_POST['q']);
}
if(isset($_POST["za_project_id"])){
    $za_project_id=(int)@$_POST["za_project_id"];
}
if(isset($_POST["za_position_id"])){
    $za_position_id=(int)@$_POST["za_position_id"];
}
if(!empty(@$q)){
    $args = array(
        'post_type' => 'zaproject',  
        'orderby' => 'id',
        'order'   => 'DESC'                    
    );  
    $args['s'] =@$q;
}
if((int)@$za_project_id > 0){
    if(count(@$args) == 0){
        $args = array(
            'post_type' => 'zaproject',  
            'orderby' => 'id',
            'order'   => 'DESC'                    
        ); 
    }
    $args_za_project=array(
      'taxonomy' => 'za_project',
      'field'    => 'term_id',
      'terms'    => array((int)@$za_project_id),         
  );
    $args['tax_query']=array($args_za_project);    
}
if((int)@$za_position_id > 0){
    $args_za_position=array(
      'taxonomy' => 'za_position',
      'field'    => 'term_id',
      'terms'    => array((int)@$za_position_id),         
  );
    if(count(@$args) == 0){
        $args = array(
            'post_type' => 'zaproject',  
            'orderby' => 'id',
            'order'   => 'DESC'                    
        ); 
        $args['tax_query']=array($args_za_position);
    }else{        
        if($args['tax_query'] == null){            
            $args['tax_query']=array($args_za_position);
        }else{
            $args['tax_query']['relation']='AND';
            $args['tax_query'][]=($args_za_position);
        }
    }        
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
<div class="full_width">
    <div class="full_width_inner">
        <?php 
        if($the_query->have_posts()){
            ?>
            <div class="vc_row wpb_row section vc_row-fluid">
                <div class=" full_section_inner clearfix">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <h1 style="display: none;"><?php echo get_bloginfo( 'name','' ); ?></h1>        
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
<?php get_footer(); ?>
<?php wp_footer();?>