<div class="category-product-block">
    <?php
    $k=0;
    if($the_query->have_posts()){
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $post_id=$the_query->post->ID;
            $title=get_the_title($post_id);
            $permalink=get_the_permalink($post_id);
            $featured_img=get_the_post_thumbnail_url($post_id, 'full');
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
                    <h2 class="product-item-box-title-2"><a href="<?php echo @$permalink; ?>"><?php echo @$title; ?></a></h2>
                    <div class="xem-chi-tiet">
                        <a href="<?php echo @$permalink; ?>">Xem chi tiết</a>
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