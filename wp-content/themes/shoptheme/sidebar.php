<div class="category-box">
    <h3 class="title-sidebar"><i class="fa fa-bars"></i>Danh mục sản phẩm</h3>
    <div class="content-cat">
        <ul>
        <!-- TODO: Display sidebar cat_bike -->
            <?php $cat_bike = get_term_by('id', 48, 'product_cat'); ?>
            <?php
            $args = array(
                'type'      => 'product',
                'child_of'  => 0,
                'hide_empty' => 0,
                'taxonomy' => 'product_cat',
                'parent'    => $cat_bike->term_id,
            );
            $categories = get_categories($args);
            foreach ($categories as $category) { ?>
                <li><i class="fas fa-angle-right"></i><a href="<?php echo get_term_link($category->slug, 'product_cat'); ?>" class="menu-item"><?php echo $category->name ?></a></li>
            <?php } ?>

            <!-- TODO: Display sidebar cat_car -->
            <?php $cat_car = get_term_by('id', 49, 'product_cat'); ?>
            <?php
            $args = array(
                'type'      => 'product',
                'child_of'  => 0,
                'hide_empty' => 0,
                'taxonomy' => 'product_cat',
                'parent'    => $cat_car->term_id,
            );
            $categories = get_categories($args);
            foreach ($categories as $category) { ?>
                <li><i class="fa fa-angle-right"></i><a href="<?php echo get_term_link($category->slug, 'product_cat'); ?>" class="menu-item"><?php echo $category->name ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>

<div class="widget">
    <h3 class="title-sidebar">
        <i class="fa fa-bars"></i>
        Tin tức
    </h3>
    <!-- TODO: Display widget. Use function get_template_part() -->
    <div class="content-w">
        <ul>
            <?php $args = array(
                'post_status' => 'publish',
                'post_type' => 'post',
                'posts_per_page' => 2,
                'cat' => 50
            );
            ?>
            <?php $getposts = new WP_query($args); ?>
            <?php global $wp_query;
            $wp_query->in_the_loop = true; ?>
            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </a>
                    <h4><a href="<?php the_permalink(); ?>" class="title-widget" ><?php the_title(); ?></a></h4>
                    <div class="clear"></div>
                </li>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </ul>
    </div>
</div>

<!-- TODO: Display widget created in admin -->
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar')) : ?><?php endif; ?>