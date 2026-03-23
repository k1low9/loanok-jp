
<?php get_header();
if(have_posts()) {
	$term_object = get_queried_object();
	$type = get_post_type_object($post->post_type);
	}
?>
lorem1000
		<?php if(have_posts()) : ?>
			<div class="single_news__archiveWrapper">
				  <div class="single_news l_1 l_side">
				  	<h2 class="fz_24 single_news__archiveTtl"><span>お知らせ</span></h2>
				    <ul class="single_news__archiveWrap">
					<?php while ( have_posts() ) : the_post(); ?>
									<li>
									       <div class="fz_16 article_wrap">
                    <div class="article_date"><?php the_time('Y年m月d日'); ?></div>
                    <div class="article_ttl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                </div>					<?php endwhile; ?>
                </li>
				    </ul>
				  </div>
     <div class="md_blog__pagenav">
         <?php get_template_part( '_pagenav' ); ?>
     </div>
			</div>

		<?php endif; ?>

<?php get_footer(); ?>

