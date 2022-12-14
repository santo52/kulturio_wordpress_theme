<?php get_header(); ?>
<?php 
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $custom_args = $args = array( 'post_type' => 'post' ,'order' => 'DESC','paged' => $paged);
    $custom_query = new WP_Query( $custom_args ); 
?>

<section class="blog padding-top">

    <div class="blog-title">
        <img src="<?= get_template_directory_uri(); ?>/assets/images/hoja_roja.svg" alt="icon blog">
        <h2>Blog</h2>
    </div>

    <span class="blog-description">
        Conoce mejor a tu consumidor y actualizate con nuestro blog
    </span>

    <?php apply_filters('the_paginator', ''); ?>

    <div class="blog-list">
        <?php while($custom_query->have_posts()): $custom_query->the_post(); ?>
            
            <div class="blog-card">
                <a class="<?= !has_post_thumbnail() ? 'blog-card-noimage' : '' ?>" href="<?= the_permalink(); ?>">
                    <?php if(has_post_thumbnail()): ?>
                        <?= the_post_thumbnail( 'large' ); ?>
                    <?php else: ?>
                        <img src="<?= get_template_directory_uri(); ?>/assets/images/camera.png" alt="camera"/>
                    <?php endif; ?>
                    <div class="blog-card-content">
                        <h4><?= the_title(); ?></h4>
                    </div>
                </a>
            </div>
            
        <?php endwhile; ?>
</div>

</section>


<?php get_footer(); ?>