<?php get_header(); ?>

<main>

    <div class="main_gabanner">
        <a href="<?php echo home_url('/'); ?>guarantee.html">
            <sapn class="pc"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/top_gurantee.png" alt="1年間無料保証付"></sapn>
            <sapn class="sp"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/top_gurantee_sp.png" alt="1年間無料保証付"></sapn>
        </a>
    </div>

    <div class="mainslide">
        <ul class="slider">
            <li><a href="/jimnys"><img src="<?php bloginfo('template_url'); ?>/assets/img/heros/gadvance.png?20251010" alt="jimnny LITTLE G.ADVANCEコンプリートカー予約販売開始!!"></a></li>
            <li><a href="/jimnys"><img src="<?php bloginfo('template_url'); ?>/assets/img/heros/typeb.jpg?20250408" alt="jimnnyコンプリートカー予約販売開始!!"></a></li>
            <li><a href="/jimnys"><img src="<?php bloginfo('template_url'); ?>/assets/img/heros/typeg.jpg" alt="jimnnyコンプリートカー予約販売開始!!"></a></li>
            <li><img src="<?php bloginfo('template_url'); ?>/assets/img/mv_1.jpg" alt="お客様の「買いたい」を「買える」に他社でローンが通らない、総量規制、債務整理、自己破産諦めないで"></li>
            <li><img src="<?php bloginfo('template_url'); ?>/assets/img/mv_2.jpg" alt="全車保証付き販売だから安心！軽自動車から輸入車まで全国どこでも納車出来ます!"></li>
            <li><img src="<?php bloginfo('template_url'); ?>/assets/img/mv_3.jpg?20241023" alt="自己破産、債務整理、金融事故カーライフグループなら100％購入OK！"></li>
        </ul>
    </div>

    <?php
    $args = array(
        'post_type' => 'news',
        'post_status' => 'publish',
        'ignore_sticky_posts' => 1,
        'orderby' => 'date',
        'posts_per_page' => 7,
        'order' => 'DESC',
    );
    $newspost = get_posts($args);
    ?>


    <?php if ($newspost) : ?>
        <div class="main_news">
            <div class="l_1 mx_1440">
                <ul>
                    <?php foreach ($newspost as $post) :
                        setup_postdata($post);
                    ?>
                        <li>
                            <div class="fz_15 article_wrap">
                                <div class="article_date"><?php the_time('Y年m月d日'); ?></div>
                                <div class="article_ttl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                            </div>
                        </li>
                    <?php endforeach;
                    wp_reset_postdata(); ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>


    <?php if (have_posts()) : ?>
        <div class="search_num__wrap">
            <?php
            echo '<div class="search_num__count"><p class="fz_24 fw700 search_num__post"><span class="head">在庫台数</span><span class="num">' . $wp_query->found_posts . '</span><span class="unit">件</span></p><p class="fz_18 fw700 search_num__note">すべての車両、全国納車できます</p></div>'; ?>
            <div class="fz_20 fw700 search_num__btn">
                <a href="<?php echo home_url(''); ?>/cars/">全在庫車両を見る<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <?php endif; ?>

    <div class="l_1 mx_1440">
        <div class="pTop_search">
            <div class="pTop_search__store">
                <h3 class="fz_20 fw700 searchStore_ttl">各店舗で探す</h3>
                <ul>
                    <li>
                        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                            <input type="hidden" name="post_type" value="cars">
                            <input type="hidden" name="form_type" value="store">
                            <input type="hidden" name="store_id" value="3">
                            <label for="submit_btn3" class="ddmenu_submit__label">TOKYO店在庫車両<i class="fa fa-arrow-circle-right"></i></label>
                            <button type="submit" id="submit_btn3" value="" name="s" class="ddmenu_submit"></button>
                        </form>
                    </li>
                    <li>
                        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                            <input type="hidden" name="post_type" value="cars">
                            <input type="hidden" name="form_type" value="store">
                            <input type="hidden" name="store_id" value="2">
                            <label for="submit_btn2" class="ddmenu_submit__label">大阪店在庫車両<i class="fa fa-arrow-circle-right"></i></label>
                            <button type="submit" id="submit_btn2" value="" name="s" class="ddmenu_submit"></button>
                        </form>

                    </li>
                    <li>
                        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                            <input type="hidden" name="post_type" value="cars">
                            <input type="hidden" name="form_type" value="store">
                            <input type="hidden" name="store_id" value="1">
                            <label for="submit_btn1" class="ddmenu_submit__label">福岡店在庫車両<i class="fa fa-arrow-circle-right"></i></label>
                            <button type="submit" id="submit_btn1" value="" name="s" class="ddmenu_submit"></button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="pTop_search__category">
                <h3 class="fz_20 fw700 searchStore_ttl">車種で探す</h3>
                <?php
                $args = array(
                    'taxonomy' => 'cars_categorys',
                    'orderby' => 'menu_order',
                    'hide_empty' => false,
                );
                $terms = get_terms($args);
                ?>
                <?php if ($terms) : ?>
                    <ul class="car_category__wrap top">
                        <?php foreach ($terms as $term) :
                            if ($term->slug === 'offload') { ?>
                                <li style="width:100%;flex:inherit;">
                                    <div class="innr">
                                        <form role="search" method="get" id="searchform" style="width:100%;" action="<?php echo home_url('/'); ?>">
                                            <input type="hidden" name="form_type" value="car_cat">
                                            <input type="hidden" name="term" value="<?php echo $term->slug; ?>">
                                            <button style="display:flex;cursor:pointer;" type="submit" id="submit_btn__<?php echo $term->slug; ?>" value="" name="s" class="carcat_submit"><img src="<?php echo bloginfo('template_directory'); ?>/assets/img/cars_cat27.png" alt=""></button>
                                        </form>
                                    </div>
                                </li>
                            <?php continue;
                            } ?>

                            <li>
                                <div class="innr">
                                    <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                                        <input type="hidden" name="post_type" value="cars">
                                        <input type="hidden" name="form_type" value="car_cat">
                                        <input type="hidden" name="term" value="<?php echo $term->slug; ?>">
                                        <label for="submit_btn__<?php echo $term->slug; ?>" class="carcat_submit__label top <?php echo $term->slug; ?>"><span><?php echo $term->name; ?></span></label>
                                        <button type="submit" id="submit_btn__<?php echo $term->slug; ?>" value="" name="s" class="carcat_submit"></button>
                                    </form>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?><!-- if($terms) -->
            </div>
            <div class="pTop_search__price">
                <h3 class="fz_20 fw700 searchStore_ttl">月々支払額で探す</h3>
                <ul>
                    <li>
                        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                            <input type="hidden" name="post_type" value="cars">
                            <input type="hidden" name="form_type" value="price">
                            <input type="hidden" name="price_bottom" value="0">
                            <input type="hidden" name="price_up" value="19999">
                            <label for="submit_btn__price1" class="ddmenu_submit__label">〜19,999円</label>
                            <button type="submit" id="submit_btn__price1" value="" name="s" class="ddmenu_submit"></button>
                        </form>
                    </li>
                    <li>
                        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                            <input type="hidden" name="post_type" value="cars">
                            <input type="hidden" name="form_type" value="price">
                            <input type="hidden" name="price_bottom" value="20000">
                            <input type="hidden" name="price_up" value="29999">
                            <label for="submit_btn__price3" class="ddmenu_submit__label">20,000円〜29,999円</label>
                            <button type="submit" id="submit_btn__price3" value="" name="s" class="ddmenu_submit"></button>
                        </form>
                    </li>
                    <li>
                        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                            <input type="hidden" name="post_type" value="cars">
                            <input type="hidden" name="form_type" value="price">
                            <input type="hidden" name="price_bottom" value="30000">
                            <input type="hidden" name="price_up" value="39999">
                            <label for="submit_btn__price4" class="ddmenu_submit__label">30,000円〜39,999円</label>
                            <button type="submit" id="submit_btn__price4" value="" name="s" class="ddmenu_submit"></button>
                        </form>
                    </li>
                    <li>
                        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                            <input type="hidden" name="post_type" value="cars">
                            <input type="hidden" name="form_type" value="price">
                            <input type="hidden" name="price_bottom" value="40000">
                            <input type="hidden" name="price_up" value="49999">
                            <label for="submit_btn__price5" class="ddmenu_submit__label">40,000円〜49,999円</label>
                            <button type="submit" id="submit_btn__price5" value="" name="s" class="ddmenu_submit"></button>
                        </form>
                    </li>
                    <li>
                        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                            <input type="hidden" name="post_type" value="cars">
                            <input type="hidden" name="form_type" value="price">
                            <input type="hidden" name="price_bottom" value="50000">
                            <input type="hidden" name="price_up" value="200000">
                            <label for="submit_btn__price6" class="ddmenu_submit__label">50,000円〜</label>
                            <button type="submit" id="submit_btn__price6" value="" name="s" class="ddmenu_submit"></button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tw-container tw-text-center tw-mb-20">
                <button onclick="location.href='https://loanok.jp/manufacturer.html'" class="tw-text-2xl tw-font-bold tw-bg-lime-500 hover:tw-bg-lime-700 tw-text-white tw-py-4 tw-px-10 lg:tw-px-60 tw-rounded-full">メーカーで探す→</button>
            </div>

    </div>




</main>

<?php get_footer(); ?>