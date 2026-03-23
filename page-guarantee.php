<?php get_header() ; ?>
<?php if (have_posts()) : ?>
<?php while ( have_posts() ) : the_post(); ?>

<main class="l_1 c_single_wrap guarantee">

    <div class="pGua_wrap">
        <picture class="pGua_head__copy">
            <source media="(max-width:600px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/img/gua_copy1__sp.png">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gua_copy1.png" alt="カーライフグループだけの無料保証付き自社ローン">
        </picture>
        <section class="pGua_guarantee">
            <div class="l_row mx_900">
                <div class="pGua_intro">
                    <h3 class="fz_18 fw700 pGua_head__read"><span>快適カーライフを実現する、弊社独自の保証です！</span></h3>
                    <h2 class="pGua_head__heading"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/gua_copy2.png?20191204" alt="「カーライフグループxEGS保証」"></h2>
                </div>
                <ul class="fz_20 fw700 pGua_txtList">
                    <li><p><span>全店舗全車一年間、走行距離無制限保証付き！</span><small>※1</small></p></li>
                    <li><p><span>全国のEGS認証工場にて修理可能！お店から遠方にお住まいでも安心！</span></p></li>
                    <li><p><span>女性も安心！トラブル時は２４時間対応！</span></p></li>
                    <li><p><span>保証の延長や保証内容のグレードアップも可能！<small>※２</small></span></p></li>
                </ul>
            </div>
            <ul class="pGua_value">
                <li>
                    <div class="innr">
                        <figure class="pGua_value__icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon01.svg" width="50" alt="故障時の修理代をお支払い"></figure>
                        <h4 class="fz_20 fw700 pGua_value__ttl"><span>故障時の修理代をお支払い</span></h4>
                        <p class="fz_15 fw700 pGua_value__summary">保証対象商品の故障であれば、無償で交換・修理ができます</p>
                    </div>
                </li>
                <li>
                    <div class="innr">
                        <figure class="pGua_value__icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon02.svg" width="50" alt="修理回数は無制限"></figure>
                        <h4 class="fz_20 fw700 pGua_value__ttl"><span>修理回数は無制限</span></h4>
                        <p class="fz_15 fw700 pGua_value__summary">保証期間中は何度でもご利用可能です。保証対象の範囲内なら、修理回数の上限はありません。</p>
                    </div>
                </li>
                <li>
                    <div class="innr">
                        <figure class="pGua_value__icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon03.svg" width="50" alt="全国にEGS提携工場あり"></figure>
                        <h4 class="fz_20 fw700 pGua_value__ttl"><span>全国にEGS提携工場あり</span></h4>
                        <p class="fz_15 fw700 pGua_value__summary">全国の整備工場で修理が可能です。遠方の故障でも、ご自宅近くの故障でも、利便性が高く安心です。</p>
                    </div>
                </li>
                <li>
                    <div class="innr">
                        <figure class="pGua_value__icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon04.svg" width="50" alt="保証の延長が可能"></figure>
                        <h4 class="fz_20 fw700 pGua_value__ttl"><span>保証の延長が可能</span></h4>
                        <p class="fz_15 fw700 pGua_value__summary">簡単な事務手続きで保証契約の延長が可能です。（お客様の加入状況により延長のご案内を送付いたします。）</p>
                    </div>
                </li>
                <li>
                    <div class="innr">
                        <figure class="pGua_value__icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon05.svg" width="50" alt="専用コールセンターを完備"></figure>
                        <h4 class="fz_20 fw700 pGua_value__ttl"><span>専用コールセンターを完備</span></h4>
                        <p class="fz_15 fw700 pGua_value__summary">加入者様の保証修理にとどまらず、お車のトラブル全般のご相談を承ります。</p>
                    </div>
                </li>
            </ul>
        </section>
        <section class="pGua_service">
            <div class="l_row mx_900">
                <h2 class="pGua_service__ttl"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/gua_copy3.png" alt="全プラン24時間365日のロードサービスが標準で付いています！"></h2>
                <ul class="fz_20 fw700 pGua_txtList">
                    <li><p><span>２４時間３６５日対応のロードサービスもついてきます！</span><small>※1</small></p></li>
                    <li><p><span>カーライフグループなら全車無料でスタンダード保証をお付け致します！</span><small>※1</small></p></li>
                </ul>

                <ul class="pGua_service__list">
                    <li>
                        <div class="innr">
                            <figure class="pGua_service__icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon05.svg" width="50" alt="専門スタッフ対応"></figure>
                            <h4 class="fz_16 fw700 pGua_service__ttl"><span>専門スタッフ対応</span></h4>
                        </div>
                    </li>
                    <li>
                        <div class="innr">
                            <figure class="pGua_service__icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon03.svg" width="50" alt="全国どこでも対応"></figure>
                            <h4 class="fz_16 fw700 pGua_service__ttl"><span>全国どこでも対応</span></h4>
                        </div>
                    </li>
                    <li>
                        <div class="innr">
                            <figure class="pGua_service__icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon06.svg" width="50" alt="レッカー牽引"></figure>
                            <h4 class="fz_16 fw700 pGua_service__ttl"><span>レッカー牽引</span></h4>
                        </div>
                    </li>
                    <li>
                        <div class="innr">
                            <figure class="pGua_service__icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon07.svg" width="50" alt="遠方等サービス"></figure>
                            <h4 class="fz_16 fw700 pGua_service__ttl"><span>遠方等サービス</span></h4>
                        </div>
                    </li>
                    <li>
                        <div class="innr">
                            <figure class="pGua_service__icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon08.svg" width="50" alt="キー閉じ込み"></figure>
                            <h4 class="fz_16 fw700 pGua_service__ttl"><span>キー閉じ込み</span></h4>
                        </div>
                    </li>
                    <li>
                        <div class="innr">
                            <figure class="pGua_service__icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon09.svg" width="50" alt="バッテリージャンピング"></figure>
                            <h4 class="fz_16 fw700 pGua_service__ttl"><span>バッテリー<br>ジャンピング</span></h4>
                        </div>
                    </li>
                    <li>
                        <div class="innr">
                            <figure class="pGua_service__icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon10.svg" width="50" alt="ガス欠"></figure>
                            <h4 class="fz_16 fw700 pGua_service__ttl">ガス欠</h4>
                        </div>
                    </li>
                    <li>
                        <div class="innr">
                            <figure class="pGua_service__icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon11.svg" width="50" alt="タイヤ交換"></figure>
                            <h4 class="fz_16 fw700 pGua_service__ttl">タイヤ交換</h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <section class="pGua_part">
            <div class="l_row mx_900">
                <h2 class="fz_36 fw700 pGua_part__ttl">充実の保証部位</h2>
                <div class="pGua_part__wrap">
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/img/pGua_part01.jpg" data-fancybox>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pGua_part01.jpg" alt="国産車の保証部位">
                        <span class="fz_13 click">クリックで拡大</span>
                    </a>
                    <a href="<?php echo get_template_directory_uri(); ?>/assets/img/pGua_part02.jpg" data-fancybox>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pGua_part02.jpg" alt="輸入車の保証部位">
                        <span class="fz_13 click">クリックで拡大</span>
                    </a>
                </div>
            </div>
        </section>
        <section class="pGua_difference">
            <div class="l_row mx_900">
                <h2 class="fz_36 fw700 pGua_dif__ttl"><span>遂に保証もここまできた！<br>他社との違いをご実感ください！</span></h2>
            </div>
            <div class="pGua_dif__wrap">
                <div class="pGua_dif__trouble">
                    <ul>
                        <li>
                            <h3 class="fz_30 fw700 pGua_dif__troubleTtl">エンジンがかからない…</h3>
                            <div class="fz_16 fw700 pGua_dif__troubleCont">
                                <span class="ttl">エンジン本体交換</span>
                                <span class="price">&yen;445,000</span>
                            </div>
                        </li>
                        <li>
                            <h3 class="fz_30 fw700 pGua_dif__troubleTtl">変速しない…</h3>
                            <div class="fz_16 fw700 pGua_dif__troubleCont">
                                <span class="ttl">AT本体交換</span>
                                <span class="price">&yen;365,000</span>
                            </div>
                        </li>
                        <li>
                            <h3 class="fz_30 fw700 pGua_dif__troubleTtl">エアコンが冷えない…</h3>
                            <div class="fz_16 fw700 pGua_dif__troubleCont">
                                <span class="ttl">コンプレッサー交換</span>
                                <span class="price">&yen;100,280</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="pGua_dif__price">
                    <span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/gua_0.svg" alt="修理費0円"></span>
                </div>
            </div>
        </section>
        <div class="fz_14 pGua_note">
            <div class="l_row mx_900">
            <p>※１（事業用は対象外、普通車は初年度登録より15年未満かつ走行距離15万Km以下の車両に限る。軽自動車は初年度登録20年未満かつ走行距離15万Km以下の車両に限る）HV機構のみ修理対応時に13年13万kmに限る。※２（スタンダードプランが無料保証として付帯されます。ご希望の方はプラチナプランに変更可能　要有償・延長保証の際のプラン変更は出来かねます）※3 修理費はかかりませんが別途免責代3,850円がかかる場合がございます。</p>
            </div>
        </div>
    </div>

</main>


<?php endwhile; ?>
<?php endif; ?>
<?php get_footer() ; ?>
