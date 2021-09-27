<?php global $product; ?>
<div class="item-product">
    <div class="thumb">
        <a href="<?php the_permalink(); ?>">
            <?php echo get_the_post_thumbnail(get_the_ID(), 'thumnail', array('class' => 'thumnail')); ?></a>
    </div>
    <div class="info-product">
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <div class="price">
            <?php echo $product->get_price_html(); ?>
        </div>
        <a href="<?php the_permalink(); ?>" class="view-more">Add cart</a>
       
        
    </div>
</div>      