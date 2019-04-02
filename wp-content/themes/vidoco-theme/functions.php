<?php
clearstatcache();
ob_start();
require_once trailingslashit( get_template_directory() ) . 'inc/init.php';
function is_localhost(){
    return in_array( $_SERVER["SERVER_ADDR"] ,  ['127.0.0.1' , "::1"] ) ;
}
if ( is_localhost() ) {
	show_admin_bar( false );
}
ob_get_clean();
add_theme_support( 'post-thumbnails' );
// start ajaxurl 
add_action('wp_head', 'myplugin_ajaxurl');
function myplugin_ajaxurl() {
   echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}
// end add ajaxurl
// start datetime converter
function datetimeConverter($date,$format_to){
	$result="";
	$arrDate    = date_parse_from_format('Y-m-d H:i:s', $date) ;
	$ts         = mktime($arrDate["hour"],$arrDate["minute"],$arrDate["second"],$arrDate['month'],$arrDate['day'],$arrDate['year']);
	$result     = date($format_to, $ts);
	return $result;
}
// end datetime converter
// start ddsmoothmenu
add_action('wp_head', 'add_code_ddsmoothmenu');
function add_code_ddsmoothmenu(){			
	$chuoi= '	
	<script type="text/javascript" language="javascript">	
	ddsmoothmenu.init({
			mainmenuid: "smoothmainmenu", 
			orientation: "h", 
			classname: "ddsmoothmenu",
			contentsource: "markup" 
		});	
	ddsmoothmenu.init({
			mainmenuid: "smoothmainmenumobile", 
			orientation: "h", 
			classname: "ddsmoothmobile",
			contentsource: "markup" 
		});
	</script>
	    ';				
	echo $chuoi;
}
// end ddsmoothmenu
/* begin template include */
add_filter( 'template_include', 'portfolio_page_template');
function portfolio_page_template( $template ) {

	$id=get_queried_object_id();
	$slug="";
	$term=get_term_by('id', $id,'category');
	if(!empty($term)){
		$slug=$term->slug;
	}	
	if(get_query_var('za_category') != ''){
		$file = get_template_directory() . '/template-za-category.php';
		if(file_exists($file)){
			return $file;
		}			
	}	
	if(get_query_var('zaproduct') != ''){
		$file = get_template_directory() . '/template-product-detail.php';
		if(file_exists($file)){
			return $file;
		}			
	}		
	return $template;
}
/* end template include */
/* begin str_slug */
function str_slug( $filename ) {
    $sanitized_filename = remove_accents( $filename ); // Convert to ASCII
    // Standard replacements
    $invalid = array(
        ' '   => '-',
        '%20' => '-',
        '_'   => '-',
    );
    $sanitized_filename = str_replace( array_keys( $invalid ), array_values( $invalid ), $sanitized_filename );
    $sanitized_filename = preg_replace('/[^A-Za-z0-9-\. ]/', '', $sanitized_filename); // Remove all non-alphanumeric except .
    $sanitized_filename = preg_replace('/\.(?=.*\.)/', '', $sanitized_filename); // Remove all but last .
    $sanitized_filename = preg_replace('/-+/', '-', $sanitized_filename); // Replace any more than one - in a row
    $sanitized_filename = str_replace('-.', '.', $sanitized_filename); // Remove last - if at the end
    $sanitized_filename = strtolower( $sanitized_filename ); // Lowercase
    return $sanitized_filename;
}
/* end str_slug */
/* begin comment */
function bcd_comment($comment, $args, $depth)    {
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class();?> id="li-comment-<?php comment_ID();?>">
     
        <div id="comment-<?php comment_ID();?>" class="clearfix comment-body">
            <div class="comment-author vcard">
                <?php echo get_avatar($comment, $size='60', $default='<path_to_url>'); ?>
                <?php printf(__('<span class="fn">%s</span><br />'), get_comment_author_link()); ?>
                <?php if($comment->comment_approved == '0') : ?>
                <em><?php echo 'Your coment is waiting for moderation.';?></em>
                <?php endif; ?>
            </div><!-- end comment autho vcard-->
            <div class="comment-meta commentmetadata">
            <?php printf(get_comment_date());?><?php edit_comment_link(__('(Edit)'),' ',''); ?>
            </div><!--end .comment-meta-->
            <p class="commentcontent"><?php comment_text(); ?></p>
            <div class="reply">
                <?php comment_reply_link(array_merge($args,array('depth' => $depth, 'max_depth'=> $args['max_depth'])));?>
            </div><!--end .reply-->
        </div><!--end #comment-author-vcard-->
<?php }
/* end comment */