<?php
get_header();
?>
<?php if (have_posts()) : ?>
     <?php while (have_posts()) : the_post(); ?>
          <div class="new-detail">
               <div class="container">
                    <div class="row">
                         <div class="col-lg-9">
                              <div class="border">
                                   <h1 class="new-title"><?php the_title(); ?></h1>
                                   <div class="lh2-date">Ngày đăng: <?php echo get_the_date('d/m/Y') ?></div>
                                   <?php the_content(); ?>
                                   <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5"></div>
                                   <div class="post-other">
                                        <?php
                                        $categories = get_the_category($post->ID);
                                        if ($categories) {
                                             $category_ids = array();
                                             foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;

                                             $args = array(
                                                  'category__in' => $category_ids,
                                                  'post__not_in' => array($post->ID),
                                                  'showposts' => 3, // Số bài viết bạn muốn hiển thị.
                                                  'ignore_sticky_posts ' => 1
                                             );
                                             $my_query = new wp_query($args);
                                             if ($my_query->have_posts()) {
                                                  echo '<p class="title-other">Bài viết liên quan</p><ul>';
                                                  while ($my_query->have_posts()) {
                                                       $my_query->the_post();
                                        ?>
                                                       <li><a href="<?php the_permalink(); ?>"><span><i class="fas fa-angle-double-right"></i></span><span class="title-lq"><?php the_title(); ?></span></a></li>
                                        <?php
                                                  }
                                                  echo '</ul>';
                                             }
                                        }
                                        ?>

                                   </div>
                              </div>
                         </div>
                         <div class="col-md-3">
                              <?php
                              get_sidebar();
                              ?>
                         </div>
                    </div>
               </div>
          </div>
     <?php endwhile;
else : ?>
<?php endif; ?>
<?php
get_footer();
?>