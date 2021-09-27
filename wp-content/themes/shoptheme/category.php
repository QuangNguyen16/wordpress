<!--TODO: Header -->
<?php get_header(); ?>

<!--TODO: Content -->
<div id="content">
    <div class="product-box page-category">
        <div class="container">
            <div class="row">
                <!--TODO: Display -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                    <div class="category-page-content">
                        <h1 class="cat-title" >
                        <!-- Hiển thị tiêu đề bài viết -->
                            <?php single_cat_title(); ?> 
                        </h1>
                        <!--  if -->
                        <?php if (have_posts()) : ?>
                        <!-- while -->
                    <?php while (have_posts()) : the_post(); ?>
                    <div class="list-news">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                            <!-- Hiển thị hình ảnh đại diện của bài viết -->
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('full'); ?>
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                                <h4>
                                <!-- Hiển thị tiêu đề bài viết -->
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>
                                <!-- Hiển thị một đoạn nội dung bị ẩn -->
                                <?php the_excerpt(); ?>
                                <!-- Xem chi tiết  -->
                                <a href="<?php the_permalink(); ?>" class="read-more">Xem chi tiet</a>
                            </div>
                        </div>
                       
                    </div>
                    <?php endwhile;?>
                    <?php endif; ?>
                    </div>
                    
                    <?php if(paginate_links()!='') {?>


                        <div class="quatrang">
                            <?php
                            global $wp_query;
                            $big = 999999999;
                            echo paginate_links( array(
                                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                'format' => '?paged=%#%',
                                'prev_text'    => __('«'),
                                'next_text'    => __('»'),
                                'current' => max( 1, get_query_var('paged') ),
                                'total' => $wp_query->max_num_pages
                                ) );
                            ?>
                        </div>
                    <?php } ?>
                    
                </div>
                 <!--TODO: sidebar và widget -->
                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                    <div class="sidebar">

                        <!--TODO: Display sidebar. Use function get_template_part() -->
                        <?php get_template_part('sidebar'); ?>
                        
                        
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!--TODO: Footer -->
<?php get_footer(); ?>