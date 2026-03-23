<?php get_header(); ?>

    <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'paged' => $paged,
            'post_type'=>'cars',
            'posts_per_page' => 40,
            'order' => 'DESC',
            'orderby' => 'modified',
            'meta_key' => 'cars_update',
            'meta_query' => array(
                    array(
                        'key'=>'cars_status',
                        'value'=> 'off',
                        'compare' => 'IN',
                    ),
                )
            );
        $query = new WP_Query($args);
    ?>

    <?php $the_query = new WP_Query( $args ); ?>
    <?php if ( $the_query->have_posts() ) : ?>
        <div class="flex carlist l_1">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <?php get_template_part( '_md_cars__postSold' ); ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    <?php endif; ?>


    <div class="l_pagenavi_wrap">
        <div class="l_row">
            <nav id="pagenavi">
                <?php
                global $wp_query;
                $big = 999999999; // need an unlikely integer
                echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format' => '',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $the_query->max_num_pages,
                    'end_size' => 0,
                    'mid_size' => 2,
                    'prev_next' => false,
                    'type' => 'list',
                ) );
                ?>
            </nav>
        </div>
    </div>

<?php get_footer(); ?>
