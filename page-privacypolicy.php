<?php get_header() ; ?>

<main class="l_1 l_side c_single_wrap">

    <div class="policy__wrap">
        <h2 class="fz_24 ttl">個人情報保護方針</h2>
        <?php if (have_posts()) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php remove_filter ('the_content', 'wpautop'); ?>　
                <?php the_content(); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

</main>

<?php get_footer() ; ?>

