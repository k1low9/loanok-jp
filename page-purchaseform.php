<?php get_header() ; ?>

<main class="l_1 c_single_wrap">

    <div class="con_form__wrap">
        <h2 class="fz_24 con_form__ttl">買い取りフォーム</h2>
        <div class="fz_18 purchaseform_contact"><a href="tel:092-938-8871">電話で問い合わせる</a></div>
								<?php if (have_posts()) : ?>
								<?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
							  <?php endwhile; ?>
								<?php endif; ?>
    </div>

</main>

<?php get_footer() ; ?>
