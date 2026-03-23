<?php get_header(); ?>

<?php
$type = get_post_type_object($post->post_type);
$terms = get_the_terms( $post->ID, 'blogcat' );
$template_uri = get_template_directory_uri();
 ?>

<div class="single_news__wrapper">

<?php if (have_posts()) : ?>
<?php while ( have_posts() ) : the_post(); ?>

  <div class="single_news l_1 l_side">
    <section class="single_news__wrap">

        <div class="single_news__head">
          <h2 class="fz_24 single_news__ttl"><?php the_title(); ?></h2>
        </div>
        <div class="postEntry single_news__content">
          <?php the_content(); ?>
        </div>
        <div class="single_news__link">
          <a href="<?php echo home_url('/'); ?>news/">お知らせ一覧</a>
        </div>

    </section>
  </div>


  <?php endwhile; ?>
<?php endif; ?>


</div>

<?php get_footer(); ?>

