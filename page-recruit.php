<?php get_header() ; ?>

<main class="l_1 c_single_wrap">

    <div class="p_recruit__wrap">
        <h2 class="fz_24 p_recruit__ttl">採用情報<em>Recruit</em></h2>
        <?php if (have_posts()) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

</main>

<?php get_footer() ; ?>
