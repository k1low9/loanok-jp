 <?php get_header() ;
/**
 * Template Name: rentacars
 **/
?>
<?php
$page = get_post( get_the_ID() );
$store_name = $page->post_name;
$store_name = mb_substr($store_name, 10);
if($store_name === 'tokyo') {
    $store_id = 3;
    $store_title = 'TOKYO店';
} elseif($store_name === 'osaka') {
    $store_id = 2;
    $store_title = '大阪店';
} elseif($store_name === 'fukuoka') {
    $store_id = 1;
    $store_title = '福岡店';
}
 ?>

<?php
    $args = array(
        'post_type'=>'rentacar',
        'posts_per_page' => -1,
        'orderby' => 'modified',
        'meta_query' => array(
            array(
                'key'=>'rentacars_status',
                'value'=> 'on',
                'compare' => 'IN',
            ),
            array(
                'key'=>'rentacars_store',
                'value'=> $store_id,
                'compare' => 'IN'
            ))
        );
    $cars_store__post = get_posts( $args );
    $cars_store__postCount = count( $cars_store__post );
?>
<div class="rent_archive__wrap">
    <div class="l_1">
        <div class="search_head">
            <h2 class="fz_20 search_head__ttl blk"><?php the_title();?></h2>
        </div>
    </div>
<?php if($cars_store__post) :?>
    <?php
    $term_obj = get_term_by('slug', 'etc', 'rentacar_cat');
    $args = array(
        'taxonomy' => 'rentacar_cat',
        'orderby' => 'menu_order',
        'exclude' => $term_obj->term_id,
        'hide_empty' => true,
    );
    $terms = get_terms($args);
    ?>
    <?php if($terms):?>
        <ul class="fz_16 rent_archive__nav">
            <?php foreach($terms as $term) :?>
                <li><a href="#<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
            <?php endforeach; ?>
        </ul>
        <div style="color:red;font-weight:900;text-align:center;">※ETC・カーナビはすでに込みの金額で格安のプランをご案内いたします。</div>
        <?php foreach($terms as $term) :?>
            <?php
            $args = array(
                'post_type'=> 'rentacar',
                'post_status'=> 'publish',
                'ignore_sticky_posts'=> 1,
                'orderby'=> 'modified',
                'posts_per_page'=> -1,
                'order' => 'DESC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'rentacar_cat',
                        'field' => 'slug',
                        'terms' => $term->slug,
                    ),
                ),
                'meta_query' =>
                array(
                    array(
                        'key'=>'rentacars_status',
                        'value'=> 'on',
                        'compare' => 'IN',
                    ),
                    array(
                        'key'=>'rentacars_store',
                        'value'=> $store_id,
                        'compare' => 'IN'
                    ))
            );
            $rentacar = get_posts( $args );
            ?>
            <?php if($rentacar) :?>
                <section class="rent_archive__cat" id="<?php echo $term->slug; ?>">
                    <div class="rent_archive__ttlwrap">
                        <div class="l_1 car_list__wrap">
                            <h2 class="fz_18 rent_archive__catttl"><span><?php echo $term->name; ?></span></h2>
                        </div>
                    </div>
                    <div class="flex carlist l_1 car_list__wrap">
                        <?php foreach($rentacar as $post) :
                            setup_postdata( $post );
                            ?>
                            <?php get_template_part( '_md_remtacars__post' ); ?>
                        <?php endforeach;
                        wp_reset_postdata(); ?>
                    </div>
                </section>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?><!-- if($terms) -->
<?php else : ?>
    <div class="flex carlist l_1">
        <div class="l_1 l_side">
            <div class="page__error blk">
                <h1 class="fz_24 ttl">お探しの条件では見つかりませんでした。</h1>
                <div class="fz_16 description">
                    <p>大変申し訳ございません。お客さまのお探しの条件では見つけることができませんでした。</p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
</div>
<?php get_footer() ; ?>
