<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <?php get_template_part('_md_meta'); ?>
    <?php wp_head(); ?>
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico">
    <link rel="stylesheet" media="all" href="<?php echo get_template_directory_uri(); ?>/assets/css/default.css">
    <link rel="stylesheet" media="all" href="<?php echo get_template_directory_uri(); ?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.0/jquery.fancybox.min.css" />
    <link rel="stylesheet" media="all" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css?<?php echo date("Ymd"); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick-theme.css" media="screen" />
    <style type=text/css>
        .header-line-title {
            font-weight: bold;
            font-size: 2em;
        }

        .header-line-subtitle {
            font-weight: bold;
            font-size: 1.25em;
            margin-top: 1em;
        }

        .header-line {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 10px;
            max-width: 800px;
            margin: 0 auto;
        }

        .header-line-inner {
            text-align: center;
            border: 1px solid #fff;
            padding: 10px 5px;

        }

        .header-line-inner>p {
            color: #fff;
            font-weight: bold;
            font-size: 1.25em;
        }

        .header-line-btn {}

        .header-line-btn>img {
            width: unset;
        }

        @media not all and (min-width: 768px) {
            .header-line-subtitle {
                font-weight: bold;
                font-size: 1em;
            }

            .header-line {
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                gap: 2px;
                width: 100vw;
                margin: 0 auto;
            }

            .header-line-inner {
                border: none;
            }
        }
    </style>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114861494-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-114861494-1');
    </script>
    <?php get_template_part('inc/google_ads_tag'); ?>

</head>

<body>
    <div class="bodywrap">

        <header class="header">

            <div class="l_1 header_wrap">

                <h1>カーライフグループ</h1>
                <p class="logoimg"><a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/img/logo_head.png" alt="カーライフグループ"></a></p>
            </div>

            <div class="navpc">
                <nav class="l_1 mx_1440 flex fz_14">
                    <ul class="ddmenu">
                        <li class="priority_1st bgg"><span class="no_link">各店舗で探す</span>
                            <ul>
                                <li>
                                    <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                                        <input type="hidden" name="post_type" value="cars">
                                        <input type="hidden" name="form_type" value="store">
                                        <input type="hidden" name="store_id" value="3">
                                        <label for="submit_btn3" class="ddmenu_submit__label">TOKYO店在庫車両</label>
                                        <button type="submit" id="submit_btn3" value="" name="s" class="ddmenu_submit"></button>
                                    </form>
                                </li>
                                <li>
                                    <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                                        <input type="hidden" name="post_type" value="cars">
                                        <input type="hidden" name="form_type" value="store">
                                        <input type="hidden" name="store_id" value="2">
                                        <label for="submit_btn2" class="ddmenu_submit__label">大阪店在庫車両</label>
                                        <button type="submit" id="submit_btn2" value="" name="s" class="ddmenu_submit"></button>
                                    </form>
                                </li>
                                <li>
                                    <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                                        <input type="hidden" name="post_type" value="cars">
                                        <input type="hidden" name="form_type" value="store">
                                        <input type="hidden" name="store_id" value="1">
                                        <label for="submit_btn1" class="ddmenu_submit__label">福岡店在庫車両</label>
                                        <button type="submit" id="submit_btn1" value="" name="s" class="ddmenu_submit"></button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li class="priority_1st bgg"><span class="no_link">車を探す</span>
                            <ul>
                                <li><a href="<?php echo home_url('/'); ?>uc_main_type.html">車種で探す</a></li>
                                <li><a href="<?php echo home_url('/'); ?>manufacturer.html">メーカーで探す</a></li>
                            </ul>
                        </li>
                        <li class="priority_1st bgg"><span class="no_link">月々支払い額で探す</span>
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
                        </li>
                        <li class="priority_3rd bgg nav_search">
                            <div class="searchbtn" id="nav_searchbtn">物件番号で探す</div>
                            <div class="searchform_wrap" id="nav_searchform">
                                <form role="search" method="get" id="searchform_btm" action="<?php echo home_url('/'); ?>">
                                    <input type="text" value="" name="item_num" placeholder="物件番号" />
                                    <input type="hidden" name="post_type" value="cars">
                                    <input type="hidden" name="form_type" value="item_number">
                                    <label for="submit_btn_btm" class="submit_btn__label"><i class="fa fa-search"></i></label>
                                    <button type="submit" id="submit_btn_btm" value="" name="s" class="ddmenu_submit"></button>
                                </form>
                            </div>
                        </li>
                        <li class="priority_2nd"><a href="<?php echo home_url('/'); ?>myloan.html">自社ローンとは</a></li>
                        <li class="priority_4th"><span class="no_link">お客様の声</span>
                            <ul>
                                <li>
                                    <a href="http://www.carsensor.net/shop/chiba/307941003/review/" target="_blank" rel="nofollow">カーセンサーTOKYO店の口コミ</a>
                                </li>
                                <li>
                                    <a href="http://www.carsensor.net/shop/osaka/312366001/review/" target="_blank" rel="nofollow">カーセンサー大阪店の口コミ</a>
                                </li>
                                <li>
                                    <a href="http://www.carsensor.net/shop/fukuoka/307941001/review/" target="_blank" rel="nofollow">カーセンサー福岡店の口コミ</a>
                                </li>
                                <li>
                                    <a href="https://www.goo-net.com/user_review/0520259/detail.html" target="_blank" rel="nofollow">グーネットTOKYO店の口コミ</a>
                                </li>
                                <li>
                                    <a href="https://www.goo-net.com/user_review/0802583/detail.html" target="_blank" rel="nofollow">グーネット福岡店の口コミ</a>
                                </li>
                            </ul>
                        </li>
                        <li class="priority_4th"><a href="<?php echo home_url('/'); ?>privacypolicy.html">個人情報保護方針</a></li>
                        <li class="priority_4th"><a href="<?php echo home_url('/'); ?>purchaseform.html">買い取りフォーム</a></li>
                        <li class="priority_3rd"><a href="<?php echo home_url('/'); ?>soldout.html">販売実績</a></li>
                        <li class="priority_2nd"><a href="<?php echo home_url('/'); ?>shop000.html">店舗情報</a></li>
                        <li class="menu_trigger">MENU</li>
                    </ul>
                </nav>
            </div>

        </header>