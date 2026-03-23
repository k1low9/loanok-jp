<?php get_header();
$form_type = $_GET['form_type'];
$post_type = $_GET['post_type'];
?>
<?php if(have_posts()) : ?>

    <?php if($form_type === 'store' ):
        $store_id = $_GET['store_id'];
        $store_name = '';
        if($store_id === '3') {
            $store_name = 'TOKYO店';
        } elseif($store_id === '2') {
            $store_name = '大阪店';
        } elseif($store_id === '1') {
            $store_name = '福岡店';
        }
        $price_sort = $_GET['price_sort'];
    ?>
        <div class="l_1">
            <div class="search_head">
                <h2 class="fz_20 search_head__ttl"><?php echo $store_name; ?></h2>
                <?php echo '<p class="fz_16 fw700 search_num__post"><span>掲載台数 ' . $wp_query->found_posts . ' 件</span></p>';?>
                <div class="search_sort__wrap">
                    <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>" >
                        <input type="hidden" name="post_type" value="cars">
                        <input type="hidden" name="form_type" value="store">
                        <input type="hidden" name="store_id" value="<?php echo $store_id; ?>">
                        <input type="hidden" name="price_sort" value="asc">
                        <label for="submit_btn_s1" class="fz_15 price_sort__label <?php if($price_sort === 'asc') {echo 'current';} ?>">価格が安い順</label>
                        <button type="submit" id="submit_btn_s1" value="" name="s" class="price_sort__submit"></button>
                    </form>
                    <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>" >
                        <input type="hidden" name="post_type" value="cars">
                        <input type="hidden" name="form_type" value="store">
                        <input type="hidden" name="store_id" value="<?php echo $store_id; ?>">
                        <input type="hidden" name="price_sort" value="desc">
                        <label for="submit_btn_s2" class="fz_15 price_sort__label <?php if($price_sort === 'desc') {echo 'current';}  ?>">価格が高い順</label>
                        <button type="submit" id="submit_btn_s2" value="" name="s" class="price_sort__submit"></button>
                    </form>
                </div>
            </div><!-- search_head -->
        </div><!-- l_1 -->

    <?php elseif($form_type === 'price' ) : ?>
        <div class="l_1">
            <div class="search_head">
                <?php
                    $car_search__priceB = $_GET['price_bottom'];
                    $car_search__priceU = $_GET['price_up'];
                    if ($car_search__priceB == 0) {
                        $car_search__price = '〜' . $car_search__priceU . '円';
                    } elseif($car_search__priceU > 50000) {
                        $car_search__price = $car_search__priceB . '円〜';
                    } else {
                        $car_search__price = $car_search__priceB . '円〜' . $car_search__priceU . '円';
                    }
                ?>
                <h2 class="fz_20 search_head__ttl"><?php echo esc_attr($car_search__price);?></h2>
                <?php echo '<p class="fz_16 fw700 search_num__post"><span>掲載台数 ' . $wp_query->found_posts . ' 件</span></p>';?>
            </div>
        </div>
    <?php elseif($form_type === 'car_cat' ) : ?>
        <div class="l_1">
            <div class="search_head">
                <?php
                    $term = $_GET['term'];
                    $term_object = get_term_by('slug', $term, 'cars_categorys');
                    $term_name = $term_object->name;
                    $price_sort = $_GET['price_sort'];
                ?>
                <h2 class="fz_20 search_head__ttl"><?php echo esc_attr($term_name);?></h2>
                <?php echo '<p class="fz_16 fw700 search_num__post"><span>掲載台数 ' . $wp_query->found_posts . ' 件</span></p>';?>
                <div class="search_sort__wrap">
                    <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>" >
                        <input type="hidden" name="post_type" value="cars">
                        <input type="hidden" name="form_type" value="car_cat">
                        <input type="hidden" name="term" value="<?php echo $term; ?>">
                        <input type="hidden" name="price_sort" value="asc">
                        <label for="submit_btn_s1" class="fz_15 price_sort__label <?php if($price_sort === 'asc') {echo 'current';}  ?>">価格が安い順</label>
                        <button type="submit" id="submit_btn_s1" value="" name="s" class="price_sort__submit"></button>
                    </form>
                    <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>" >
                        <input type="hidden" name="post_type" value="cars">
                        <input type="hidden" name="form_type" value="car_cat">
                        <input type="hidden" name="term" value="<?php echo $term; ?>">
                        <input type="hidden" name="price_sort" value="desc">
                        <label for="submit_btn_s2" class="fz_15 price_sort__label <?php if($price_sort === 'desc') {echo 'current';}  ?>">価格が高い順</label>
                        <button type="submit" id="submit_btn_s2" value="" name="s" class="price_sort__submit"></button>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?><!-- $form_type -->

    <div class="search_body">
        <div class="flex carlist l_1 car_list__wrap">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( '_md_cars__post' ); ?>
            <?php endwhile; ?>
        </div>
        <div class="fz_18 fw700 pTop_more__btn">
            <span id="page-nav" class="fz_18 fw700"><?php next_posts_link('もっと見る'); ?></span>
        </div>
    </div>
<?php else : ?>
    <div class="flex carlist l_1">
        <div class="l_1 l_side">
            <div class="page__error">
                <h1 class="fz_24 ttl">お探しの条件では見つかりませんでした。</h1>
                <div class="fz_16 description">
                    <p>大変申し訳ございません。お客さまのお探しの条件では見つけることができませんでした。</p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php get_footer(); ?>
