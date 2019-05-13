<div class="category-product-block">
    <?php
    $k=0;
    if($the_query->have_posts()){
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $post_id=$the_query->post->ID;
            $title=wp_trim_words( get_the_title($post_id), 10, null ) ;
            $permalink=get_the_permalink($post_id);
            $featured_img=get_the_post_thumbnail_url($post_id, 'full');
            $excerpt=wp_trim_words(  get_the_excerpt( $post_id ), 25,null );
            $date_post=get_the_date('d/m/Y',@$post_id);
            if((float)@$k % 2 == 0){
                echo '<div class="row">';
            }
            ?>
            <div class="col-md-6">
                <div class="product-item-box">
                    <div class="product-item-box-image">
                        <a href="<?php echo @$permalink; ?>">
                            <figure>
                                <div style="background-image: url('<?php echo $featured_img; ?>');background-size: cover;background-repeat: no-repeat;padding-top: calc(100% / (350/200));"></div>
                            </figure>
                        </a>
                    </div>
                    <div class="border-item-detail-product">
                        <h2 class="product-item-box-title-2"><a href="<?php echo @$permalink; ?>"><?php echo @$title; ?></a></h2>
                        <div class="product-detail-exerpt"><?php echo @$excerpt; ?></div>
                        <div class="xem-chi-tiet">
                            <a href="<?php echo @$permalink; ?>">Xem chi tiết</a>
                            <div class="dong-ho">
                                <span><i class="far fa-clock"></i></span><span class="margin-left-5"><?php echo @$date_post; ?></span><span class="margin-left-5"><i class="far fa-heart"></i></span>
                            </div>
                            <div class="clr"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $k++;
            if((float)@$k % 2 == 0 || $k == $the_query->post_count){
                echo "</div>";
            }
        }
        wp_reset_postdata();
    }
    ?>
</div>
<?php echo @$pagination->showPagination();  ?>
<div class="margin-top-15">
    <?php include get_template_directory()."/block/block-main-product.php"; ?>
</div>