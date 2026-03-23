<?php get_header();
if(have_posts()) {
    $term_object = get_queried_object();
    $type = get_post_type_object($post->post_type);
}
?>

<?php if(have_posts()) : ?>
    <div class="flex carlist l_1 car_list__wrap">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( '_md_cars__post' ); ?>
        <?php endwhile; ?>
    </div>
    <div class="fz_18 fw700 pTop_more__btn">
        <span id="page-nav" class="fz_18 fw700"><?php next_posts_link('もっと見る'); ?></span>
    </div>
<?php endif; ?>

<?php get_footer(); ?>

