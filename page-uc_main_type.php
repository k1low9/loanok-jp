<?php get_header() ; ?>

<main>
    <div class="l_1 l_side">
        <section class="car_category__01">
        <?php
        $args = array(
            'taxonomy' => 'cars_categorys',
            'orderby' => 'menu_order',
            'hide_empty' => false,
        );
        $terms = get_terms($args);
        ?>
        <?php if($terms):?>
            <ul class="car_category__wrap">
            <?php foreach($terms as $term) :
                if($term->slug === 'offload'){?>
                 <li style="width:100%;">
                    <div class="innr">
                        <form role="search" method="get" id="searchform" style="width:100%;" action="<?php echo home_url('/'); ?>" >
                            <input type="hidden" name="form_type" value="car_cat">
                            <input type="hidden" name="term" value="<?php echo $term->slug; ?>">
                            <button style="display:flex;cursor:pointer;" type="submit" id="submit_btn__<?php echo $term->slug; ?>" value="" name="s" class="carcat_submit"><img src="<?php echo bloginfo('template_directory'); ?>/assets/img/cars_cat27.png" alt=""></button>
                        </form>
                    </div>
                </li>
                    <?php continue;}?>
                <li>
                    <div class="innr">
                        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>" >
                            <input type="hidden" name="post_type" value="cars">
                            <input type="hidden" name="form_type" value="car_cat">
                            <input type="hidden" name="term" value="<?php echo $term->slug; ?>">
                            <label for="submit_btn__<?php echo $term->slug; ?>" class="carcat_submit__label <?php echo $term->slug; ?>"><span><?php echo $term->name; ?></span></label>
                            <button type="submit" id="submit_btn__<?php echo $term->slug; ?>" value="" name="s" class="carcat_submit"></button>
                        </form>
                    </div>
                </li>
            <?php endforeach; ?>
            </ul>
        <?php endif; ?><!-- if($terms) -->
        </section>
    </div>
</main>

<?php get_footer() ; ?>
