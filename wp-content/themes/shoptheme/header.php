<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?> ./assets/css/style.scss">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?> ./assets/font/font-awesome.min.css">
    <script src="<?php bloginfo('stylesheet_directory'); ?> ./assets/font/fontawesome.js"></script>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?> ./assets/css/main.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?> ./assets/css/chill.css">
    <!-- <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?> ./assets/css/responsive.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


    <title><?php bloginfo('title'); ?></title>

</head>

<body <?php body_class(); ?>>
    <header>
        <div class="bottom-container">
            <div class="row">
                <div class=".col-6 .col-md-2 top-logo">
                    <a href=""><img src="<?php bloginfo('stylesheet_directory'); ?> ./assets/images/logo.png" alt="" class="img-logo"></a>
                </div>
                <div class=".col-6 .col-md-8">
                    <div class=".col-6 .col-md-8">
                        <nav class="navbar navbar-expand-lg navbar-light bg-white bottom-menu">
                            <?php wp_nav_menu(
                                array(
                                    'theme_location' => 'header-main',
                                    'container' => 'true',
                                    'menu_id' => 'header-main',
                                    'menu_class' => 'navbar-nav'
                                )
                            ); ?>

                            <form class="form-inline my-2 my-lg-0" action="<?php bloginfo('url'); ?>/" method="GET" role="form">
                                <div class="form-group" style="margin-left: 60px;">
                                    <?php $args = array(
                                        'option_none_value'  => '',
                                        'orderby'            => 'ID',
                                        'order'              => 'ASC',
                                        'show_count'         => 0,
                                        'hide_empty'         => 0,
                                        'child_of'           => 0,
                                        'include'            => '',
                                        'selected'           => 0,
                                        'hierarchical'       => 1,
                                        'name'               => 'product_cat',
                                        'id'                 => 'product_cat',
                                        'class'              => 'btn-outline-success',
                                        'depth'              => 0,
                                        'tab_index'          => 0,
                                        'taxonomy'           => 'product_cat',
                                        'hide_if_empty'      => false,
                                        'value_field'         => 'slug',
                                    ); ?>
                                    <?php wp_dropdown_categories($args); ?>
                                    <script>
                                        document.getElementById('cat').onchange = function() {
                                            // if value is category id
                                            if (this.value !== '-1') {
                                                window.location = '/?cat=' + this.value
                                            }
                                        }
                                    </script>
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="s" id="s" class="form-control" aria-label="Search">
                                </div>
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>

                        </nav>
                    </div>
                </div>
                <div class="col-2 .col-md-4">
                    <button type="button" title="Sản phẩm đã xem" class="btn btn-light" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-eye" aria-hidden="true"></i></button>
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">


                        <?php if (isset($_SESSION["viewed"]) && $_SESSION["viewed"]) {
                            $data = $_SESSION["viewed"];
                            $args = array(
                                'post_type' => 'product',
                                'post_status' => 'publish',
                                'posts_per_page' => 10,
                                'post__in'    => $data
                            );
                        ?>
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <ul>
                                        <li>

                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Images</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $getposts = new WP_query($args); ?>
                                                    <?php global $wp_query;
                                                    $wp_query->in_the_loop = true; ?>
                                                    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
                                                        <?php global $product; ?>
                                                        <tr>
                                                            <td class="view"> <a href="<?php the_permalink(); ?>">
                                                                    <?php echo get_the_post_thumbnail(get_the_ID(), 'thumnail', array('class' => 'thumnail')); ?>
                                                                </a></td>
                                                            <td class="view">
                                                                <h4><a class="name-product" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                            </td>
                                                            <td class="price"><?php echo $product->get_price_html(); ?></td>
                                                            <td class="view"><a class="view-more-seen" href="<?php bloginfo('url'); ?>?add-to-cart=<?php the_ID(); ?>">ADD TO CART</a></td>
                                                        </tr>
                                                </tbody>
                                            <?php endwhile;
                                                    wp_reset_postdata();
                                                } else { ?>
                                            <p>Không có sản phẩm nào đã xem!</p>
                                        <?php } ?>
                                            </table>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
        <script src="<?php bloginfo('stylesheet_directory'); ?> ./assets/vendor/bootstrap/js/jquery-3.5.1.min.js"></script>
        <script src="<?php bloginfo('stylesheet_directory'); ?> ./assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php bloginfo('stylesheet_directory'); ?> ./assets/vendor/bootstrap/js/main.js"></script>
        <!-- Nhúng js -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0" nonce="FoJbguwI"></script>
    </header>

</body>

</html>