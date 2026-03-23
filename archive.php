
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
        <div class="md_blog__pagenav">
            <?php get_template_part( '_pagenav' ); ?>
        </div>
			</div>
		<?php endif; ?>

<?php get_footer(); ?>

