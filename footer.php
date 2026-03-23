<div class="navpc footernav">
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
            <li class="priority_4th"><a href="<?php echo home_url('/'); ?>purchaseform.html">買い取りフォーム</a></li>
            <li class="priority_3rd"><a href="<?php echo home_url('/'); ?>soldout.html">販売実績</a></li>
            <li class="priority_2nd"><a href="<?php echo home_url('/'); ?>shop000.html">店舗情報</a></li>
            <li class="menu_trigger">MENU</li>
        </ul>
    </nav>
</div>

<div class="ban_area l_1">
    <a href="/jimnys"><img src="<?php bloginfo('template_url'); ?>/assets/img/jimny_footer.jpg" alt="jimny" class="pc"></a>
    <a href="/jimnys"><img src="<?php bloginfo('template_url'); ?>/assets/img/jimny_footer.jpg" alt="jimny" class="sp"></a>
    <a href="<?php echo home_url('/'); ?>recruit.html">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/recruit_banner__pc.png" alt="採用情報" class="pc">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/recruit_banner.png" alt="採用情報" class="sp">
    </a>
    <a href="<?php echo home_url('/'); ?>purchaseform.html">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/kaitori_banner01_pc.jpg" alt="無料買取査定" class="pc">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/kaitori_banner01.png" alt="無料買取査定" class="sp">
    </a>
</div>

<div class="brif_company l_1">
    <div class="innr">
        <h2 class="fz_20">カーライフグループ株式会社</h2>
        <ul class="flex">
            <li class="flexbox">
                <h2>TOKYO店</h2>
                <p class="add">千葉県八千代市勝田台南3丁目21-7</p>
                <p class="tel"><a href="tel:<?= $GLOBALS['shop_gloval_var']['tokyo']['tel'] ?>">TEL：<?= $GLOBALS['shop_gloval_var']['tokyo']['tel-'] ?></a><?= $GLOBALS['shop_gloval_var']['tokyo']['guidance'] ?></p>
                <ul class="linkarea flex">
                    <li class="store"><a href="<?php echo home_url('/'); ?>shop000.html#tokyo">店舗情報</a></li>
                    <li id="line_atto"><a href="https://line.me/R/ti/p/@carlifetokyo">LINEで友達になる</a></li>
                    <li><a href="http://www.carsensor.net/shop/chiba/307941003/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/img/btn_carsencer.png" alt=""></a></li>
                    <li><a href="https://www.goo-net.com/usedcar_shop/0520259/detail.html" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/img/btn_goo.png" alt=""></a></li>
                </ul>
            </li>
            <li class="flexbox">
                <h2>大阪店</h2>
                <p class="add">大阪府堺市美原区小寺459番1</p>
                <p class="tel"><a href="tel::<?= $GLOBALS['shop_gloval_var']['osaka']['tel'] ?>">TEL：:<?= $GLOBALS['shop_gloval_var']['osaka']['tel-'] ?></a></p>
                <ul class="linkarea flex">
                    <li class="store"><a href="<?php echo home_url('/'); ?>shop000.html#osaka">店舗情報</a></li>
                    <li id="line_atto"><a href="https://line.me/R/ti/p/%40jnv7154c">LINEで友達になる</a></li>
                    <li><a href="http://www.carsensor.net/shopnavi/312366001" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/img/btn_carsencer.png" alt=""></a></li>
                    <!-- <li><a href="https://www.goo-net.com/usedcar_shop/0708802/stock.html" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/img/btn_goo.png" alt=""></a></li> -->
                </ul>
            </li>
            <li class="flexbox">
                <h2>福岡店</h2>
                <p class="add">福岡県糟屋郡粕屋町戸原西4丁目8-11</p>
                <p class="tel"><a href="tel::<?= $GLOBALS['shop_gloval_var']['fukuoka']['tel'] ?>">TEL：:<?= $GLOBALS['shop_gloval_var']['fukuoka']['tel-'] ?></a><?= $GLOBALS['shop_gloval_var']['fukuoka']['guidance'] ?></p>
                <ul class="linkarea flex">
                    <li class="store"><a href="<?php echo home_url('/'); ?>shop000.html#fukuoka">店舗情報</a></li>
                    <li id="line_atto"><a href="https://line.me/R/ti/p/@carlifefukuoka">LINEで友達になる</a></li>
                    <li><a href="http://www.carsensor.net/shopnavi/307941001" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/img/btn_carsencer.png" alt=""></a></li>
                    <li><a href="http://www.goo-net.com/usedcar_shop/0802583/detail.html" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/img/btn_goo.png" alt=""></a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>

<p class="copy fz_12">&copy; カーライフグループ株式会社 , all rights reserved.<a href="<?php echo home_url(); ?>/wp-login.php"><i class="fa fa-edit"></i></a></p>

</div>
<!-- /bodywrap -->

<!-- .sidr-->
<div class="md_drawer__cover" id="drawer_cover"></div>
<div id="drawer_menu" class="md_drawer__menu">
    <div class="md_drawer__Item">
        <ul class="md_drawer__ItemList">
            <li>
                <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                    <input type="hidden" name="post_type" value="cars">
                    <input type="hidden" name="form_type" value="car_cat">
                    <input type="hidden" name="term" value="special">
                    <label for="submit_sbtn__cat1">
                        <h3 class="md_drawer__ItemTtl">特選車</h3>
                    </label>
                    <button type="submit" id="submit_sbtn__cat1" value="" name="s" class="carcat_submit"></button>
                </form>
            </li>
            <li>
                <h3 class="md_drawer__ItemTtl">各店舗で探す</h3>
                <ul>
                    <li>
                        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                            <input type="hidden" name="post_type" value="cars">
                            <input type="hidden" name="form_type" value="store">
                            <input type="hidden" name="store_id" value="3">
                            <label for="submit_sbtn3" class="md_drawer__submitlabel"><i class="fa fa-chevron-right"></i>TOKYO店在庫車両</label>
                            <button type="submit" id="submit_sbtn3" value="" name="s" class="md_drawer__submit"></button>
                        </form>
                    </li>
                    <li>
                        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                            <input type="hidden" name="post_type" value="cars">
                            <input type="hidden" name="form_type" value="store">
                            <input type="hidden" name="store_id" value="2">
                            <label for="submit_sbtn2" class="md_drawer__submitlabel"><i class="fa fa-chevron-right"></i>大阪店在庫車両</label>
                            <button type="submit" id="submit_sbtn2" value="" name="s" class="md_drawer__submit"></button>
                        </form>
                    </li>
                    <li>
                        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                            <input type="hidden" name="post_type" value="cars">
                            <input type="hidden" name="form_type" value="store">
                            <input type="hidden" name="store_id" value="1">
                            <label for="submit_sbtn1" class="md_drawer__submitlabel"><i class="fa fa-chevron-right"></i>福岡店在庫車両</label>
                            <button type="submit" id="submit_sbtn1" value="" name="s" class="md_drawer__submit"></button>
                        </form>
                    </li>
                </ul>
            </li>
            <li>
                <h3 class="md_drawer__ItemTtl">車を探す</h3>
                <ul>
                    <li><a href="<?php echo home_url('/'); ?>uc_main_type.html">車種で探す</a></li>
                    <li><a href="<?php echo home_url('/'); ?>manufacturer.html">メーカーで探す</a></li>
                </ul>
            </li>

            <li>
                <h3 class="md_drawer__ItemTtl">月々支払い額で探す</h3>
                <ul>
                    <li>
                        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                            <input type="hidden" name="post_type" value="cars">
                            <input type="hidden" name="form_type" value="price">
                            <input type="hidden" name="price_bottom" value="0">
                            <input type="hidden" name="price_up" value="19999">
                            <label for="submit_btn__sprice1" class="md_drawer__submitlabel">〜19,999円</label>
                            <button type="submit" id="submit_btn__sprice1" value="" name="s" class="md_drawer__submit"></button>
                        </form>
                    </li>
                    <li>
                        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                            <input type="hidden" name="post_type" value="cars">
                            <input type="hidden" name="form_type" value="price">
                            <input type="hidden" name="price_bottom" value="20000">
                            <input type="hidden" name="price_up" value="29999">
                            <label for="submit_btn__sprice3" class="md_drawer__submitlabel">20,000円〜29,999円</label>
                            <button type="submit" id="submit_btn__sprice3" value="" name="s" class="md_drawer__submit"></button>
                        </form>
                    </li>
                    <li>
                        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                            <input type="hidden" name="post_type" value="cars">
                            <input type="hidden" name="form_type" value="price">
                            <input type="hidden" name="price_bottom" value="30000">
                            <input type="hidden" name="price_up" value="39999">
                            <label for="submit_btn__sprice4" class="md_drawer__submitlabel">30,000円〜39,999円</label>
                            <button type="submit" id="submit_btn__sprice4" value="" name="s" class="md_drawer__submit"></button>
                        </form>
                    </li>
                    <li>
                        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                            <input type="hidden" name="post_type" value="cars">
                            <input type="hidden" name="form_type" value="price">
                            <input type="hidden" name="price_bottom" value="40000">
                            <input type="hidden" name="price_up" value="49999">
                            <label for="submit_btn__sprice5" class="md_drawer__submitlabel">40,000円〜49,999円</label>
                            <button type="submit" id="submit_btn__sprice5" value="" name="s" class="md_drawer__submit"></button>
                        </form>
                    </li>
                    <li>
                        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                            <input type="hidden" name="post_type" value="cars">
                            <input type="hidden" name="form_type" value="price">
                            <input type="hidden" name="price_bottom" value="50000">
                            <input type="hidden" name="price_up" value="200000">
                            <label for="submit_btn__sprice6" class="md_drawer__submitlabel">50,000円〜</label>
                            <button type="submit" id="submit_btn__sprice6" value="" name="s" class="md_drawer__submit"></button>
                        </form>
                    </li>
                </ul>
            </li>
            <li>
                <h3 class="md_drawer__ItemTtl">物件番号で探す</h3>
                <div class="searchform_wrap searchform_wrap__sidr" id="nav_searchform">
                    <form role="search" method="get" id="searchform__side" action="<?php echo home_url('/'); ?>">
                        <input type="text" value="" name="item_num" class="searchform_wrap__itext" placeholder="物件番号" />
                        <input type="hidden" name="post_type" value="cars">
                        <input type="hidden" name="form_type" value="item_number">
                        <button type="submit" id="submit_btn__side" value="" name="s" class="searchsubmit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </li>
            <li>
                <h3 class="md_drawer__ItemTtl">お客様の声</h3>
                <ul>
                    <li class="small">
                        <a href="http://www.carsensor.net/shop/chiba/307941003/review/" target="_blank" rel="nofollow">カーセンサーTOKYO店の口コミ<i class="fa fa-external-link"></i></a>
                    </li>
                    <li class="small">
                        <a href="http://www.carsensor.net/shop/osaka/312366001/review/" target="_blank" rel="nofollow">カーセンサー大阪店の口コミ<i class="fa fa-external-link"></i></a>
                    </li>
                    <li class="small">
                        <a href="http://www.carsensor.net/shop/fukuoka/307941001/review/" target="_blank" rel="nofollow">カーセンサー福岡店の口コミ<i class="fa fa-external-link"></i></a>
                    </li>
                    <li class="small">
                        <a href="https://www.goo-net.com/user_review/0520259/detail.html" target="_blank" rel="nofollow">グーネットTOKYO店の口コミ<i class="fa fa-external-link"></i></a>
                    </li>
                    <li class="small">
                        <a href="https://www.goo-net.com/user_review/0802583/detail.html" target="_blank" rel="nofollow">グーネット福岡店の口コミ<i class="fa fa-external-link"></i></a>
                    </li>
                </ul>
            </li>
            <li class="std_link fst"><a href="<?php echo home_url('/'); ?>myloan.html"><i class="fa fa-chevron-right"></i>自社ローンとは</a></li>
            <li class="std_link"><a href="<?php echo home_url('/'); ?>guarantee.html"><i class="fa fa-chevron-right"></i>カーライフの無料保証</a></li>
            <li class="std_link"><a href="<?php echo home_url('/'); ?>purchaseform.html"><i class="fa fa-chevron-right"></i>買い取りフォーム</a></li>
            <li class="std_link"><a href="<?php echo home_url('/'); ?>shop000.html"><i class="fa fa-chevron-right"></i>店舗情報</a></li>
            <li class="std_link"><a href="<?php echo home_url('/'); ?>soldout.html"><i class="fa fa-chevron-right"></i>販売実績</a></li>
            <li class="std_link"><a href="<?php echo home_url('/'); ?>privacypolicy.html"><i class="fa fa-chevron-right"></i>個人情報保護方針</a></li>
        </ul>
    </div>
</div>
<div class="sidr_slide__close"><i class="fa fa-angle-right"></i></div>
<!-- .sidr-->



<script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick/slick.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.sidr.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.touchwipe.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/config.js?20190927"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.0/jquery.fancybox.min.js"></script>

<?php if (is_home()): ?>
    <script type="text/javascript">
        (function($) {
            $('.slider').slick({
                autoplay: true,
                autoplaySpeed: 4000,
                arrows: false,
                fade: true,
            });
        })(jQuery);
    </script>
<?php endif; ?>

<?php if (is_search() | is_post_type_archive('cars')): ?>
    <script src="<?php bloginfo('template_url'); ?>/assets/js/jquery.infinitescroll.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/assets/js/jquery.imagesloaded.min.js"></script>
    <script type="text/javascript">
        (function($) {
            $(function() {
                var $container = $('.carlist');
                var $navi = $('#page-nav');
                $container.infinitescroll({
                        navSelector: '#page-nav',
                        nextSelector: '#page-nav a',
                        itemSelector: '.car_post__article',
                        loading: {
                            finishedMsg: '',
                            msgText: '',
                            img: '<?php echo get_template_directory_uri(); ?>/assets/img/oval.svg'
                        }
                    },
                    function(newElements) {
                        var $newElems = $(newElements);
                        $newElems.imagesLoaded(function() {
                            $navi.css("display", "block");
                        });
                    });
                $(window).unbind('.infscr');
                $('#page-nav a').click(function() {
                    $container.infinitescroll('retrieve');
                    return false;
                });
            });
        })(jQuery);
    </script>
<?php endif; ?>


<?php if (function_exists('wpcf7_enqueue_scripts')) {
    wpcf7_enqueue_scripts();
    wpcf7_enqueue_styles();
} ?>
<?php if (is_page(array('mail', 'purchaseform', 'rentacarform', 'rentacar_delivery__form', 'formtest'))): ?>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script>
        (function($) {
            $(function() {
                $('#zip').keyup(function() {
                    AjaxZip3.zip2addr(this, '', 'pref', 'address');
                })
                //checkbox
                $("[id^=accept] input[type='checkbox']").change(function() {
                    if ($(this).is(":checked")) {
                        $(this).next('span').children('.chk_target').addClass("c_on");
                    } else {
                        $(this).next('span').children('.chk_target').removeClass("c_on");
                    }
                });

                //submit disabled
                var check_count__def = $("[id^=accept] input[type='checkbox']").length;
                $("#submit input[type='submit']").prop('disabled', true);
                $("[id^=accept] input[type='checkbox']").on('click', function() {
                    var check_count = $("[id^=accept] input[type='checkbox']:checked").length;
                    if (check_count === check_count__def) {
                        $("#submit input[type='submit']").prop('disabled', false);
                    } else {
                        $("#submit input[type='submit']").prop('disabled', true);
                    }
                });

                //radio if
                $('#contact_sch__content').hide();
                $("input:radio[name='contact_sch']").change(function() {
                    if ($("input:radio[name='contact_sch']:checked").val() == "あり") {
                        $('#contact_sch__content').slideDown();
                    } else if ($("input:radio[name='contact_sch']:checked").val() == "なし") {
                        $('#contact_sch__content').slideUp();
                    }
                });

                // 二重送信抑制
                let submitBtn = $("input[type='submit'].wpcf7-submit");
                submitBtn.click(function() {
                    $(this).css('pointer-events', 'none');
                    $(this).parent('.smp').addClass('active');
                })
                // 入力項目にエラーがあったらボタン復活
                document.addEventListener('wpcf7invalid', function() {
                    submitBtn.css('pointer-events', 'auto');
                    submitBtn.parent('.smp').removeClass('active');
                }, false);
                document.addEventListener('wpcf7mailsent', function(event) {
                    location.replace('<?php echo esc_url(home_url()) . '/thanks.html'; ?>');
                }, false);
            });
        })(jQuery);
    </script>
<?php endif; ?>

<?php wp_footer(); ?>


</body>

</html>