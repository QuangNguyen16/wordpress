<!--TODO: Header -->
<?php
get_header(); ?>

<!--TODO: Slider banner -->
<div id="slider">
    <div class="container-fluid">
        <?php get_template_part('slider'); ?>
    </div>
</div>
<!-- Content -->

<div id="content">
    <div class="product-box">
        <div class="container">
            <div class="row">
                <!-- TODO: Display colum sidebar and widget -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 order-lg-0 order-1">
                    <div class="sidebar">
                        <!--  TODO: Display sidebar. Use function get_template_part() -->
                        <?php get_template_part('sidebar'); ?>

                    </div>
                </div>
                <!-- TODO: Display colum product -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 order-lg-1 order-0">
                    <!-- TODO: Display colum product highlights -->
                    <div class="product-section">
                        <h2 class="title-product">
                            <a href="#" class="title">Sản phẩm nổi bật</a>
                            <!--TODO: Display category father -->
                            <div class="list-child">
                                <ul>
                                    <?php
                                    $args = array(
                                        'type'      => 'product',
                                        'child_of'  => 0,
                                        'parent'    => '0',
                                        'taxonomy' => 'product_cat'
                                    );
                                    $categories = get_categories($args);
                                    foreach ($categories as $category) { ?>
                                        <li><a href="<?php echo get_term_link($category->slug, 'product_cat'); ?>" class="menu-item"><?php echo $category->name ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>

                        </h2>
                        <div class="content-product-box">
                            <div class="row">

                                <!-- TODO: Display select product highlights -->
                                <?php
                                $tax_query[] = array(
                                    'taxonomy' => 'product_visibility',
                                    'field'    => 'name',
                                    'terms'    => 'featured', //lấy ra sản phẩm nổi bật
                                    'operator' => 'IN',
                                );
                                ?>
                                <?php $args = array('post_type' => 'product', 'posts_per_page' => 8, 'ignore_sticky_posts' => 1, 'tax_query' => $tax_query); ?>
                                <?php $getposts = new WP_query($args); ?>
                                <?php global $wp_query;
                                $wp_query->in_the_loop = true; ?>
                                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                    <?php global $product; ?>
                                    <?php get_template_part('content/item_product'); ?>
                                <?php endwhile;
                                wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                    <!-- TODO: Display bike product -->
                    <div class="product-section">
                        <h2 class="title-product">
                            <!-- Hiển thị danh mục tất cả danh mục con của danh mục cha bike có id: 48  -->
                            <?php $cat_bike = get_term_by('id', 48, 'product_cat'); ?>
                            <!-- Hiển thị tên danh mục cha -->
                            <a href="<?php echo get_term_link($cat_bike->slug, 'product_cat'); ?>" class="title"><?php echo $cat_bike->name ?></a>

                            <div class="list-child">
                                <ul>
                                    <?php
                                    $args = array(
                                        'type'      => 'product',
                                        'child_of'  => 1,
                                        'parent'    => 0,
                                        'taxonomy' => 'product_cat',
                                        'number'    => '5', // hiển thị số danh mục
                                        'parent'    => $cat_bike->term_id, //lấy ra số id của danh mục cha
                                    );
                                    $categories = get_categories($args);
                                    foreach ($categories as $category) { ?>
                                        <li><a href="<?php echo get_term_link($category->slug, 'product_cat'); ?>" class="menu-item"><?php echo $category->name ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </h2>
                        <div class="content-product-box">
                            <div class="row">
                                <!-- Hiển thị tất cả sản phẩm của xe máy -->
                                <?php
                                $cat_bike = 'xe-may'; // property
                                $args = array(
                                    'post_type' => 'product',
                                    'posts_per_page' => 5,
                                    'product_cat' => $cat_bike, // lấy ra cái property có giá trị là xe-may

                                );
                                ?>
                                <?php global $wp_query;
                                $wp_query->in_the_loop = true; ?>
                                <?php $getposts = new WP_query($args); ?>
                                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                    <?php global $product; ?>
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                        <?php get_template_part('content/item_product'); ?>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata(); ?>

                            </div>
                            <nav>
                                <ul>
                                    <li><?php previous_posts_link('&laquo; PREV', $getposts->max_num_pages) ?></li>
                                    <li><?php next_posts_link('NEXT &raquo;', $getposts->max_num_pages) ?></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="product-section">
                        <h2 class="title-product">
                            <!-- Hiển thị danh mục tất cả danh mục con của danh mục cha bike có id: 48  -->
                            <?php $cat_car = get_term_by('id', 49, 'product_cat'); ?>
                            <!-- Hiển thị tên danh mục cha -->
                            <a href="<?php echo get_term_link($cat_car->slug, 'product_cat'); ?>" class="title"><?php echo $cat_car->name ?></a>

                            <div class="list-child">
                                <ul>
                                    <?php
                                    $args = array(
                                        'type'      => 'product',
                                        'child_of'  => 1,
                                        'parent'    => 0,
                                        'taxonomy' => 'product_cat',
                                        'number'    => '5', // hiển thị số danh mục
                                        'parent'    => $cat_car->term_id, //lấy ra số id của danh mục cha
                                    );
                                    $categories = get_categories($args);
                                    foreach ($categories as $category) { ?>
                                        <li><a href="<?php echo get_term_link($category->slug, 'product_cat'); ?>" class="menu-item"><?php echo $category->name ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </h2>
                        <div class="content-product-box">
                            <div class="row">
                                <!-- Hiển thị tất cả sản phẩm của xe máy -->
                                <?php
                                $cat_car = 'xe-oto'; // property
                                $args = array(
                                    'post_type' => 'product',
                                    'posts_per_page' => 10,
                                    'product_cat' => $cat_car, // lấy ra cái property có giá trị là xe-may
                                    'pagination' => true,
                                );
                                ?>
                                <?php $getposts = new WP_query($args); ?>
                                <?php global $wp_query;
                                $wp_query->in_the_loop = true; ?>
                                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                    <?php global $product; ?>
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                        <?php get_template_part('content/item_product'); ?>
                                    </div>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php get_footer(); ?>