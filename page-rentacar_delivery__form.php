<?php get_header() ; ?>

<main class="l_1 c_single_wrap">

    <div class="con_form__wrap">
        <h2 class="fz_24 con_form__ttl">宅配レンタカーフォーム</h2>
        <?php if (have_posts()) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

</main>

<?php get_footer() ; ?>
