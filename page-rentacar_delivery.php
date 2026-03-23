<?php get_header() ; ?>

<main class="l_1 c_single_wrap">

    <div class="p_rentacar__wrap">
        <h2 class="fz_28 fw700 p_rentacar__ttl">宅配レンタカー<em>Rentacar Delivary Service</em></h2>
        <?php if (have_posts()) : ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <div class="p_rentacar__section">
                    <!-- <div class="fz_18 p_rentacar__read">
                        <p>有料宅配レンタカーとは、お客様のご自宅やご希望の場所までレンタカーを納車・引取りするサービスです。（※対応エリア内限定 約15km以内）カーライフ福岡レンタカーの店舗までお越しになれない場合や、空港・新幹線の駅などお客様のご指定の場所に格安レンタカーを宅配いたします。</p>
                        <p>※宅配料金が別途かかります。</p>
                    </div> -->
                    <section class="p_rentacar__freearea">
                        <h3 class="fz_20 fw700 ttl">宅配無料対応エリア（福岡店）</h3>
                        <div class="fz_16 fw700 announce">
                            <p>※無料宅配サービス対象車のみ</p>
                            <p>※24時間以上の貸し出しのお客様に限ります。</p>
                        </div>
                        <ul class="fz_16 fw700 list">
                            <li>福岡空港</li>
                            <li>博多駅</li>
                            <li>地下鉄貝塚駅</li>
                        </ul>
                    </section>
                    <section class="p_rentacar__freearea">
                        <h3 class="fz_20 fw700 ttl">宅配有料対応エリア（福岡店）</h3>
                        <div class="fz_16 fw700 announce">
                            <p class="fz_16 fw700 announce">※全車種対応</p>
                        </div>
                        <ul class="fz_16 fw700 list">
                            <li><strong>博多区</strong>　<span style="font-weight: normal;">千代　月隈　半道橋</span></li>
                            <li><strong>東区</strong>　<span style="font-weight: normal;">貝塚　箱崎　九産大前　香椎</span></li>
                            <li><strong>糟屋郡</strong>　<span style="font-weight: normal;">篠栗　須恵　久山　志免</span></li>
                        </ul>
                        <p class="fz_18 fw700 contactnote"><span>詳しくは店舗までお問い合わせ下さい</span></p>
                        <div class="fz_15 example">
                            <figure class="infogra" style="margin-top: 20px"><img src="<?php bloginfo('template_url'); ?>/assets/img/haiou_area.jpg" alt="有料対応エリア（福岡店）"></figure>
                        </div>
                    </section>
                    <section class="p_rentacar__freearea">
                        <h3 class="fz_20 fw700 ttl">宅配有料エリア外の場合（福岡店）</h3>
                        <div class="fz_15 example">
                            <figure class="infogra" style="margin-top: 20px"><img src="<?php bloginfo('template_url'); ?>/assets/img/haisou_area_out.jpg" alt="有料エリア外の場合（福岡店）"></figure>
                        </div>
                    </section>

                    <section class="p_rentacar__flow">
                        <h3 class="fz_24 fw700 ttl">宅配サービスの流れ</h3>
                        <ul class="fz_16 flowlist">
                            <li>
                                <h4 class="fz_18 fttl">当社ホームページからご予約（ご記入の携帯電話に確認のお電話を差し上げます）</h4>
                                <ul class="fz_14 flist">
                                    <li>※お申込みフォームを送信いただいただけではご予約は完了しません。取扱店舗より確認の電話を差し上げますのでご予約を確定してください。</li>
                                    <li>※ご予約頂いた日から配達希望日までが7日以上ある場合は宅配料金＋レンタル料を指定口座にご入金頂きます。</li>
                                </ul>
                            </li>
                            <li>
                                <h4 class="fz_18 fttl">ご指定の日時に配達いたします</h4>
                                <ul class="fz_14 flist">
                                    <li>※契約書記入、お支払い、車両内外装チェック、操作方法の説明</li>
                                </ul>
                            </li>
                            <li>
                                <h4 class="fz_18 fttl">お客様の用途に合わせてご利用ください。</h4>
                            </li>
                            <li>
                                <h4 class="fz_18 fttl">返却日時に合わせて引き取りに伺います。</h4>
                                <ul class="fz_14 flist">
                                    <li>※車両内外装チェック、追加清算がなければご返却。</li>
                                </ul>
                            </li>
                        </ul>
                    </section>
                </div>

                <?php the_content(); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

</main>








<?php get_footer() ; ?>