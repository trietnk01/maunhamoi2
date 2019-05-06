<?php
get_header();
global $zController;
$productModel=$zController->getModel("/frontend","ProductModel");
/* start set the_query */
$q="";
if(isset($_POST["q"])){
    $q=trim($_POST["q"]);
}
$args = array(
    'post_type' => 'zaproduct',
    'orderby' => 'id',
    'order'   => 'DESC',
    "s"=>@$q,
    'posts_per_page' => 9,
  );
$the_query=new WP_Query($args);
/* end set the_query */
/* start setup pagination */
$totalItemsPerPage=14;
$pageRange=3;
$currentPage=1;
if(!empty(@$_POST["filter_page"]))          {
    $currentPage=@$_POST["filter_page"];
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
/* end setup pagination */
$title="";
if(have_posts()){
    while (have_posts()) {
        the_post();
        $post_id= get_the_id();
        $title=get_the_title($post_id);
    }
    wp_reset_postdata();
}
?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="body-bg">
                <div class="row">
                    <div class="col-lg-8">
                        <form name="frm_category" method="POST">
                            <input type="hidden" name="filter_page" value="1" />
                            <h1 class="category-header"><?php echo @$title; ?></h1>
                            <?php require_once PLUGIN_PATH . DS . "templates" . DS . "frontend". DS . "loop-za-category.php"; ?>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <?php include get_template_directory()."/block/block-search.php"; ?>
                        <?php include get_template_directory()."/block/block-fanpage.php"; ?>
                        <?php include get_template_directory()."/block/block-video.php"; ?>
                        <?php include get_template_directory()."/block/block-mau-thiet-ke.php"; ?>
                        <?php include get_template_directory()."/block/block-y-kien-khach-hang.php"; ?>
                        <?php include get_template_directory()."/block/block-ban-quan-tam.php"; ?>
                        <?php include get_template_directory()."/block/block-visitor-counter.php"; ?>
                    </div>
                </div>
                <?php include get_template_directory()."/block/block-menu-content-bottom.php"; ?>
                <?php include get_template_directory()."/block/block-google-map.php"; ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>