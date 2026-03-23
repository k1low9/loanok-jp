<?php

  require_once ( get_template_directory() .'/modules/class_hero-unit.php');
  require_once ( get_template_directory() .'/modules/class_split-price.php');
  $split_price = new SplitPrice;
  // $heroimage = new HeroUnit(WP_PLUGIN_DIR.'/carlife-web-application/asset/imgs/'.get_field("jimny_type").'/hero');
  get_header() ;


?>

<?php if (have_posts()) :
while ( have_posts() ) : the_post(); ?>

<main class="c_single_wrap">
<div id="specials">
  <div class="l_1 l_side">

    <div class="flex c_single_01">
      <div class="c_l">
        <?php
            $car_img__group = get_field('car_img__group');
            if( $car_img__group ): ?>
        <ul class="carimg_slider">
          <?php
              for($i=1;$i<=21;$i++) {
                $img_value = 'car_img'.$i.'' ;
                if ( $car_img__group[$img_value] ) {
                  echo '<li class="carimg_thumb' . $i . '">';
                  $attachment_id = $car_img__group[$img_value];
                  echo wp_get_attachment_image( $attachment_id, "full", false, array( 'class'=>'cars_img__lrg carimg_thumb' . $i ));
                  echo '</li>';
                }else {
                  break;
                }
              }
            ?>
        </ul>
        <ul class="carimg_slider__thumb">
          <?php
              for($i=1;$i<=21;$i++) {
                $img_value = 'car_img'.$i.'' ;
                if ( $car_img__group[$img_value] ) {
                  echo '<li class="thumb' . $i . '">';
                  $attachment_id = $car_img__group[$img_value];
                  echo wp_get_attachment_image( $attachment_id, "thumbnail", false, array( 'class'=>'cars_img__thumbnail' ));
                  echo '</li>';
                }else {
                  break;
                }
              }
            ?>
        </ul>
        <?php endif; ?>
      </div>
      <div class="c_r">
        <div class="c_r__col">
          <?php
                  $cars_store = get_field_object('cars_store');
                  $cars_store__value = $cars_store['value'];
                  $cars_store__label = $cars_store['choices'][ $cars_store__value ];
                ?>
          <div class="cars_itemnumber">
            <?php
                  if(get_field('cars_itemnumber')){
                    if($cars_store__value === '1' ) {
                      echo '<p class="fz_14 num"><span>物件番号 FU' . get_field('cars_itemnumber') . '</span></p>';
                      echo '<p class="fz_14 line_btn"><a href="https://line.me/R/ti/p/@gdm5690w">LINEで問い合わせる</a></p>';
                      echo '<p class="fz_14 phone_btn"><a href="tel:'.$GLOBALS['shop_gloval_var']['fukoka']['tel'].'">電話で問い合わせる</a></p>';
                    } elseif($cars_store__value === '2') {
                      echo '<p class="fz_14 num"><span>物件番号 OS' . get_field('cars_itemnumber') . '</span></p>';
                      echo '<p class="fz_14 line_btn"><a href="https://line.me/R/ti/p/%40jnv7154c">LINEで問い合わせる</a></p>';
                      echo '<p class="fz_14 phone_btn"><a href="tel:'.$GLOBALS['shop_gloval_var']['osaka']['tel'].'">電話で問い合わせる</a></p>';
                    } elseif($cars_store__value === '3' ) {
                      echo '<p class="fz_14 num"><span>物件番号 TK' . get_field('cars_itemnumber') . '</span></p>';
                      echo '<p class="fz_14 line_btn"><a href="https://line.me/R/ti/p/bkv4GSCzAz">LINEで問い合わせる</a></p>';
                      echo '<p class="fz_14 phone_btn"><a href="tel:'.$GLOBALS['shop_gloval_var']['tokyo']['tel'].'">電話で問い合わせる</a></p>';
                    }
                  }
                ?>
          </div>
          <h2 class="fz_20"><?php the_title(); ?></h2>
          <?php
                    $cars_baseinfo__group = get_field('cars_baseinfo__group');
                    if( $cars_baseinfo__group ): ?>
          <?php echo '<h3 class="fz_14">' . $cars_baseinfo__group['cars_grade'] . '</h3>'; ?>
          <?php endif; ?>
          <?php if(get_field('cars_salespoint')): ?>
          <div class="point clearfix">
            <h4 class="fz_12 point_ttl">ここがポイント！</h4>
            <div class="fz_13 point_cont"><?php the_field('cars_salespoint', $post->ID); ?></div>
          </div>
          <?php endif; ?>
        </div>
          <div class="flex c_single_plice">
          <section class="c_ll">
          <ul class="loan__list" style="font-size:2rem;">
          <li>銀行ローン</li>
          <li>提携ローン</li>
          <li>各種完備!!</li>
          </ul>
          </section>
            <section class="c_ll">
              <?php
                      $car_price__group = get_field('car_price__group');
                      $cars_bodyprice = $car_price__group['cars_bodyprice'];
                      if( $car_price__group ): ?>
              <?php
                        echo '<p class="fz_14">車両本体価格</p><h5 class="total"><strong>' . $cars_bodyprice . '<span class="total_zero">.0</span></strong><span class="total_unit">万円</span></h5>';
                      ?>
              <?php
                        $cars_bodyprice = $car_price__group['cars_bodyprice'] . '0000';
                        $cars_price__expenses = $car_price__group['cars_price__expenses'];
                        $cars_totalprice = $cars_bodyprice + $cars_price__expenses;
                        $cars_totalprice__num = $cars_totalprice / 10000;
                        echo '<p class="fz_14">現金一括支払価格</p><p class="max"><strong>' . $cars_totalprice__num . '<span class="total_zero">.0</span></strong><span class="total_unit">万円</span></p>';
                      ?>
              <?php endif; ?>
            </section>
            <?php
                    if( $cars_bounus = get_field('cars_bounus') ) {
                      echo '<div class="fz_12 bounus_price"><em>☆ボーナス払いOK！☆</em><span>詳しくは販売店までお問い合わせください。</span></div>';
                    }?>
        </div>
        <div class="c_r__col">
          <dl class="fz_13 flex list_01">
            <?php
                    $cars_baseinfo__group = get_field('cars_baseinfo__group');
                        if( $cars_baseinfo__group ): ?>
            <?php echo '<div><dt>年式</dt><dd><span>' . $cars_baseinfo__group['cars_registration__date'] . '</span></dd></div>'; ?>
            <?php endif; ?>
            <?php
        $cars_detail__group = get_field('cars_detail__group');
        if( $cars_detail__group ){
           $cars_milage__unit = $cars_detail__group['cars_milage__unit'];
           if($cars_milage__unit === '1') {
              $milage = $cars_detail__group['cars_milage'] * 1000;
              echo '<div class="info_list__col min"><dt>走行距離</dt><dd><span>' . number_format( $milage ) . 'km</span></dd></div>';
           } elseif($cars_milage__unit === '2') {
              $milage = $cars_detail__group['cars_milage'] * 1000;
              echo '<div class="info_list__col min"><dt>走行距離</dt><dd><span>' . number_format( $milage ) . 'mile</span></dd></div>';
           } else {
              echo '<div class="info_list__col min"><dt>走行距離</dt><dd><span>' . $cars_detail__group['cars_milage'] . $cars_detail__group['cars_milage__unit'] . '</span></dd></div>';
           };
          };
       ?>

            <?php
                    $cars_inspection__group = get_field('cars_inspection__group');
                    if( $cars_inspection__group ): ?>
            <?php
                        $cars_inspection__value = $cars_inspection__group['cars_inspection'];
                        if($cars_inspection__value === '1') {
                           echo '<div><dt>車検</dt><dd>2年付</dd></div>';
                        } elseif($cars_inspection__value === '2') {
                            echo '<div><dt>車検</dt><dd>' . $cars_inspection__group['cars_inspection_date'] . '</dd></div>';
                        } elseif($cars_inspection__value === '3') {
                            echo '<div><dt>車検</dt><dd>1年付</dd></div>';;
                        }
                    ?>
            <?php endif; ?>
            <?php
                        $cars_info__other = get_field('cars_info__other');
                        if( $cars_info__other ): ?>
            <?php echo '<div><dt>修復歴</dt><dd>' . $cars_info__other['cars_repair__history'] . '</dd></div>'; ?>
            <?php endif; ?>
            <?php
                        $cars_store = get_field_object('cars_store');
                        $cars_store__value = $cars_store['value'];
                        $cars_store__label = $cars_store['choices'][ $cars_store__value ];
                        if( $cars_store__value ):
                    ?>
            <?php
                      if($cars_store__value === '1' ) {
                        echo '<div><dt>販売店</dt><dd><span class="store_color fukuoka">' . esc_attr( $cars_store__label ) . '</span></dd></div>';
                      } elseif($cars_store__value === '2') {
                        echo '<div><dt>販売店</dt><dd><span class="store_color osaka">' . esc_attr( $cars_store__label ) . '</span></dd></div>';
                      } elseif($cars_store__value === '3' ) {
                        echo '<div><dt>販売店</dt><dd><span class="store_color tokyo">' . esc_attr( $cars_store__label ) . '</span></dd></div>';
                      }
                    ?>
            <?php endif; ?>
          </dl>
        </div>
        <div class="c_r__col">
          <?php
                  $cars_store = get_field_object('cars_store');
                  $cars_store__value = $cars_store['value'];
                  $cars_store__label = $cars_store['choices'][ $cars_store__value ];
                ?>
          <?php
                  if(get_field('cars_store')){
                    if($cars_store__value === '1' ) {
                      echo '<a href="' . home_url('/') . 'mail.html?store=福岡店&cars_itemnumber=FU' . get_field('cars_itemnumber') . '&car_name=' . get_the_title() . '" class="btn fz_24">在庫確認・購入お申込み</a>';
                      echo '<p class="fz_14 tel">お電話でのお問い合わせ<a href="tel:'.$GLOBALS['shop_gloval_var']['fukuoka']['tel'].'" class="fz_24">'.$GLOBALS['shop_gloval_var']['fukuoka']['tel-'].'</a></p>';
                      echo '<p class="fz_14 tel">'.$GLOBALS['shop_gloval_var']['fukuoka']['guidance']."</p>";
                      echo '<div class="md_cvn__btn">';
                      echo '<p class="fz_14 line__btn"><a href="https://line.me/R/ti/p/@gdm5690w">LINEで問い合わせる</a></p>';
                      echo '<p class="fz_14 phone__btn"><a href="tel:'.$GLOBALS['shop_gloval_var']['fukuoka']['tel'].'">電話で問い合わせる</a></p>';
                      echo '</div>';
                    } elseif($cars_store__value === '2') {
                      echo '<a href="' . home_url('/') . 'mail.html?store=大阪店&cars_itemnumber=OS' . get_field('cars_itemnumber') . '&car_name=' . get_the_title() . '" class="btn fz_24">在庫確認・購入お申込み</a>';
                      echo '<p class="fz_14 tel">お電話でのお問い合わせ<a href="'.$GLOBALS['shop_gloval_var']['osaka']['tel'].'" class="fz_24">'.$GLOBALS['shop_gloval_var']['osaka']['tel-'].'</a></p>';
                      echo '<div class="md_cvn__btn">';
                      echo '<p class="fz_14 line__btn"><a href="https://line.me/R/ti/p/%40jnv7154c">LINEで問い合わせる</a></p>';
                      echo '<p class="fz_14 phone__btn"><a href="tel:'.$GLOBALS['shop_gloval_var']['osaka']['tel'].'">電話で問い合わせる</a></p>';
                      echo '</div>';
                    } elseif($cars_store__value === '3' ) {
                      echo '<a href="' . home_url('/') . 'mail.html?store=TOKYO店&cars_itemnumber=TK' . get_field('cars_itemnumber') . '&car_name=' . get_the_title() . '" class="btn fz_24">在庫確認・購入お申込み</a>';
                      echo '<p class="fz_14 tel">TOKYO店<a href="tel:'.$GLOBALS['shop_gloval_var']['tokyo']['tel'].'" class="fz_24">'.$GLOBALS['shop_gloval_var']['tokyo']['tel-'].'</a></p>';
                      echo '<p class="fz_14 tel">'.$GLOBALS['shop_gloval_var']['tokyo']['guidance']."</p>";
                      echo '<div class="md_cvn__btn">';
                      echo '<p class="fz_14 line__btn"><a href="https://line.me/R/ti/p/bkv4GSCzAz">LINEで問い合わせる</a></p>';
                      echo '<p class="fz_14 phone__btn"><a href="'.$GLOBALS['shop_gloval_var']['tokyo']['tel'].'">電話で問い合わせる</a></p>';
                      echo '</div>';
                    }
                  }
                ?>
        </div>
      </div>
    </div><!-- c_single_01 -->
    <div class="flex c_single_02">

      <div class="c_l">
        <h4 class="fz_14">基本情報</h4>
        <dl class="flex info_list">
          <?php
                    $cars_baseinfo__group = get_field('cars_baseinfo__group');
                        if( $cars_baseinfo__group ): ?>
          <?php echo '<div class="info_list__col min"><dt>年式(初度登録年)</dt><dd><span>' . $cars_baseinfo__group['cars_registration__date'] . '</span></dd></div>'; ?>
          <?php endif; ?>
          <?php
                    $cars_inspection__group = get_field('cars_inspection__group');
                    if( $cars_inspection__group ): ?>
          <?php
                        $cars_inspection__value = $cars_inspection__group['cars_inspection'];
                        if($cars_inspection__value === '1') {
                           echo '<div class="info_list__col min"><dt>車検</dt><dd>2年付</dd></div>';
                        } elseif($cars_inspection__value === '2') {
                            echo '<div class="info_list__col min"><dt>車検</dt><dd>' . $cars_inspection__group['cars_inspection_date'] . '</dd></div>';
                        } elseif($cars_inspection__value === '3') {
                            echo '<div class="info_list__col min"><dt>車検</dt><dd>1年付</dd></div>';;
                        }
                    ?>
          <?php endif; ?>
          <?php
                    $cars_info__other = get_field('cars_info__other');
                    if( $cars_info__other ): ?>
          <?php
                      if( $cars_info__other['cars_oneowner'] ) {
                        echo '<div class="info_list__col min"><dt>ワンオーナー</dt><dd>○</dd></div>';
                      } else {
                        echo '<div class="info_list__col min"><dt>ワンオーナー</dt><dd>-</dd></div>';
                      }
                    ?>
          <?php
                      if( $cars_info__other['cars_smoking'] ) {
                        echo '<div class="info_list__col min"><dt>禁煙車</dt><dd>○</dd></div>';
                      }
                    ?>
          <?php
                      if( $cars_info__other['cars_eco'] ) {
                        echo '<div class="info_list__col min"><dt>エコカー減税対象車</dt><dd>○</dd></div>';
                      }
                    ?>
          <?php
                        $cars_info__other = get_field('cars_info__other');
                        if( $cars_info__other ): ?>
          <?php echo '<div class="info_list__col min"><dt>修復歴</dt><dd>' . $cars_info__other['cars_repair__history'] . '</dd></div>'; ?>
          <?php endif; ?>
          <?php
                      if( $cars_info__other['cars_eq__45'] ) {
                        echo '<div class="info_list__col min"><dt>メンテナンスノート</dt><dd>○</dd></div>';
                      } else {
                        echo '<div class="info_list__col min"><dt>メンテナンスノート</dt><dd>-</dd></div>';
                      }
                    ?>
          <?php
                      if( $cars_info__other['cars_eq__46'] ) {
                        echo '<div class="info_list__col min"><dt>車両取扱説明書</dt><dd>○</dd></div>';
                      } else {
                        echo '<div class="info_list__col min"><dt>車両取扱説明書</dt><dd>-</dd></div>';
                      }
                    ?>
          <?php endif; ?>
        </dl>
      </div>

      <div class="c_r">
        <h4 class="fz_14">基本スペック</h4>
        <dl class="fz_12 flex info_list">
        <?php
        $cars_detail__group = get_field('cars_detail__group');
        if( $cars_detail__group ){
           $cars_milage__unit = $cars_detail__group['cars_milage__unit'];
           if($cars_milage__unit === '1') {
              $milage = $cars_detail__group['cars_milage'] * 1000;
              echo '<div class="info_list__col min"><dt>走行距離</dt><dd>' . number_format( $milage ) . 'km</dd></div>';
           } elseif($cars_milage__unit === '2') {
              $milage = $cars_detail__group['cars_milage'] * 1000;
              echo '<div class="info_list__col min"><dt>走行距離</dt><dd>' . number_format( $milage ) . 'mile</dd></div>';
           } else {
              echo '<div class="info_list__col min"><dt>走行距離</dt><dd>' . $cars_detail__group['cars_milage'] . $cars_detail__group['cars_milage__unit'] . '</dd></div>';
           };
       ?>
          <?php echo '<div class="info_list__col min"><dt>ボディ色</dt><dd> ' . $cars_detail__group['cars_body__color'] . '</dd></div>'; ?>
          <?php echo '<div class="info_list__col min"><dt>シフト</dt><dd> ' . $cars_detail__group['cars_mission'] . '</dd></div>'; ?>
          <?php echo '<div class="info_list__col min"><dt>排気量</dt><dd> ' . $cars_detail__group['cars_displacement'] . 'cc</dd></div>'; ?>
          <?php echo '<div class="info_list__col min"><dt>乗車定員</dt><dd> ' . $cars_detail__group['cars_capacity'] . '</dd></div>'; ?>
          <?php echo '<div class="info_list__col min"><dt>ハンドル</dt><dd> ' . $cars_detail__group['cars_handletype'] . '</dd></div>'; ?>
          <?php echo '<div class="info_list__col min"><dt>ドア数</dt><dd> ' . $cars_detail__group['cars_door'] . '</dd></div>'; ?>
          <?php echo '<div class="info_list__col min"><dt>車台番号</dt><dd> ****' . $cars_detail__group['cars_carnumber'] . '</dd></div>'; ?>
          <?php
          } ?>        </dl>
      </div>
    </div>

    <?php if(get_field('cars_equipment__main')): ?>
    <div class="c_single_03">
      <h4 class="fz_14">主な装備</h4>
      <p class="fz_14"><?php the_field('cars_equipment__main', $post->ID); ?></p>
    </div>
    <?php endif; ?>
    <div class="flex c_single_03">
      <ul class="clearfix fz_12">
        <?php
                $cars_equipment__group = get_field('cars_equipment__group');
                if( $cars_equipment__group ): ?>

        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__1'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo 'エアコン・ クーラー</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__3'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo 'パワステ</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__4'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo 'パワーウィンドウ</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__2'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo 'Wエアコン</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__5'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo 'キーレス</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__7'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo 'プッシュスタート</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__6'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo 'スマートキー</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__14'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo 'ETC</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__8'] ) {
                    $nav__values = $cars_equipment__group['cars_eq__8op'];
                    echo ' class="max out">カーナビ：';
                    if( $nav__values ) {
                      foreach( $nav__values as $nav__value ) {
                        echo '<span class="option">' . $nav__value . '</span>';
                      }
                    }
                  } else {
                    echo ' class="max">カーナビ：-';
                  }
                  echo '</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__9'] ) {
                    $tv__values = $cars_equipment__group['cars_eq__9op'];
                    echo ' class="max out">テレビ：';
                    if( $tv__values ) {
                      foreach( $tv__values as $tv__value ) {
                        echo '<span class="option">' . $tv__value . '</span>';
                      }
                    }
                  } else {
                    echo ' class="max">テレビ：-';
                  }
                  echo '</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__10'] ) {
                    $movie__values = $cars_equipment__group['cars_eq__10op'];
                    echo ' class="max out">映像：';
                    if( $movie__values ) {
                      foreach( $movie__values as $movie__value ) {
                        echo '<span class="option">' . $movie__value . '</span>';
                      }
                    }
                  } else {
                    echo ' class="max">映像：-';
                  }
                  echo '</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__11'] ) {
                    $audio__values = $cars_equipment__group['cars_eq__11op'];
                    echo ' class="maximum out">オーディオ：';
                    if( $audio__values ) {
                      foreach( $audio__values as $audio__value ) {
                        echo '<span class="option">' . $audio__value . '</span>';
                      }
                    }
                  } else {
                    echo ' class="maximum">オーディオ：-';
                  }
                  echo '</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__12'] ) {
                    echo ' class="max out">';
                  } else {
                    echo ' class="max">';
                  }
                  echo 'ミュージックプレイヤー接続可</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__13'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo '後席モニター</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__15'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo 'ベンチシート</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__16'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo '3列シート</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__17'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo 'ウォークスルー</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__18'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo '電動シート</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__19'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo 'シートエアコン</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__20'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo 'シートヒーター</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__21'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo 'フルフラットシート</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__22'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo 'オットマン</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__23'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo '本革シート</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__44'] ) {
                    $door__values = $cars_equipment__group['cars_eq__44op'];
                    echo ' class="maximum out">スライドドア：';
                    if( $door__values ) {

                        echo '<span class="option">' . $door__values . '</span>';
                    }
                  } else {
                    echo ' class="max">スライドドア：：-';
                  }
                  echo '</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__32'] ) {
                    $airbag__values = $cars_equipment__group['cars_eq__32op'];
                    echo ' class="maximum out">エアバッグ：';
                    if( $airbag__values ) {
                      foreach( $airbag__values as $airbag__value ) {
                        echo '<span class="option">' . $airbag__value . '</span>';
                      }
                    }
                  } else {
                    echo ' class="maximum">エアバッグ：-';
                  }
                  echo '</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__24'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo 'アイドリングストップ</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__34'] ) {
                    $camera__values = $cars_equipment__group['cars_eq__34op'];
                    echo ' class="max out">カメラ：';
                    if( $camera__values ) {
                      foreach( $camera__values as $camera__value ) {
                        echo '<span class="option">' . $camera__value . '</span>';
                      }
                    }
                  } else {
                    echo ' class="max">カメラ：-';
                  }
                  echo '</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__25'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo '障害物センサー</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__26'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo 'クルーズコントロール</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__27'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo 'ABS</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__29'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo '盗難防止装置</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__36'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo '電動リアゲート</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__37'] ) {
                    echo ' class="max out">';
                  } else {
                    echo ' class="max">';
                  }
                  echo 'サンルーフ・ガラスルーフ</li>';
                ?>

        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__33'] ) {
                    $light__values = $cars_equipment__group['cars_eq__33'];
                    echo ' class="max out">ヘッドライト：';
                    if( $light__values ) {
                      foreach( $light__values as $light__value ) {
                        echo '<span class="option">' . $light__value . '</span>';
                      }
                    }
                  } else {
                    echo ' class="max">ヘッドライト：-';
                  }
                  echo '</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__38'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo 'フルエアロ</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__40'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo 'ローダウン</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__39'] ) {
                    $wheel__values = $cars_equipment__group['cars_eq__39op'];
                    echo ' class="max out">アルミホイール：';
                    if( $wheel__values === '社外') {
                      echo '社外';
                      if( $cars_equipment__group['cars_eq__39opinch'] ) {
                        echo ' (' . $cars_equipment__group['cars_eq__39opinch'] . 'インチ)';
                      }
                    } else {
                      echo '純正';
                      if( $cars_equipment__group['cars_eq__39opinch'] ) {
                        echo ' (' . $cars_equipment__group['cars_eq__39opinch'] . 'インチ)';
                      }
                    }
                  } else {
                    echo ' class="max">アルミホイール';
                  }
                  echo '</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__41'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo 'リフトアップ</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__42'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo '寒冷地仕様</li>';
                ?>
        <?php
                  echo '<li';
                  if( $cars_equipment__group['cars_eq__43'] ) {
                    echo ' class="out">';
                  } else {
                    echo '>';
                  }
                  echo 'ターボ</li>';
                ?>
        <?php endif; ?>

      </ul>
    </div>
  </div>

</main>

<aside class="c_single_04">
  <div class="flex l_1 l_side contact">
    <div class="c_l">
      <?php
                $cars_store = get_field_object('cars_store');
                $cars_store__value = $cars_store['value'];
                $cars_store__label = $cars_store['choices'][ $cars_store__value ];
              ?>
      <?php
                if(get_field('cars_store')){
                  if($cars_store__value === '1' ) {
                    echo '<section class="clearfix store">';
                    echo '<h3 class="fz_20">カーライフ福岡店</h3>';
                    echo '<p><a href="tel:'.$GLOBALS['shop_gloval_var']['fukuoka']['tel'].'" class="tel fz_24">'.$GLOBALS['shop_gloval_var']['fukuoka']['tel-'].'</a></p>';
                    echo '<div class="md_cvn__btn obi">';
                    echo '<p class="fz_14 line__btn"><a href="https://line.me/R/ti/p/@gdm5690w">LINEで問い合わせる</a></p>';
                    echo '<p class="fz_14 phone__btn"><a href="tel:'.$GLOBALS['shop_gloval_var']['fukuoka']['tel'].'">電話で問い合わせる</a>'.$GLOBALS['shop_gloval_var']['fukuoka']['guidance'].'</p>';
                    echo '</div>';
                    echo '</section>';
                    echo '<p class="fz_14">'.$GLOBALS['shop_gloval_var']['fukuoka']['address'].'</p>';
                    echo '<p class="fz_14">平日：10:00～18:00　日祭日：10:00～18:00<br>定休日：年中無休 (但しお盆、年末年始を除く)</p>';
                  } elseif($cars_store__value === '2') {
                    echo '<section class="clearfix store">';
                    echo '<h3 class="fz_20">カーライフ大阪店</h3>';
                    echo '<p><a href="tel:'.$GLOBALS['shop_gloval_var']['osaka']['tel'].'" class="tel fz_24">'.$GLOBALS['shop_gloval_var']['osaka']['tel-'].'</a></p>';
                    echo '<div class="md_cvn__btn obi">';
                    echo '<p class="fz_14 line__btn"><a href="https://line.me/R/ti/p/%40jnv7154c">LINEで問い合わせる</a></p>';
                    echo '<p class="fz_14 phone__btn"><a href="tel:'.$GLOBALS['shop_gloval_var']['osaka']['tel'].'">電話で問い合わせる</a></p>';
                    echo '</div>';
                    echo '</section>';
                    echo '<p class="fz_14">'.$GLOBALS['shop_gloval_var']['osaka']['address'].'</p>';
                    echo '<p class="fz_14">平日：10:00～18:00　日祭日：10:00～18:00<br>定休日：年中無休 (但しお盆、年末年始を除く)</p>';
                  } elseif($cars_store__value === '3' ) {
                    echo '<section class="clearfix store">';
                    echo '<h3 class="fz_20">カーライフTOKYO店</h3>';
                    echo '<p><a href="tel:'.$GLOBALS['shop_gloval_var']['tokyo']['tel'].'" class="tel fz_24">'.$GLOBALS['shop_gloval_var']['tokyo']['tel-'].'</a>'.$GLOBALS['shop_gloval_var']['tokyo']['guidance'].'</p>';
                    echo '<div class="md_cvn__btn obi">';
                    echo '<p class="fz_14 line__btn"><a href="https://line.me/R/ti/p/bkv4GSCzAz">LINEで問い合わせる</a></p>';
                    echo '<p class="fz_14 phone__btn"><a href="tel:'.$GLOBALS['shop_gloval_var']['tokyo']['tel'].'">電話で問い合わせる</a></p>';
                    echo '</div>';
                    echo '</section>';
                    echo '<p class="fz_14">'.$GLOBALS['shop_gloval_var']['tokyo']['address'].'</p>';
                    echo '<p class="fz_14">平日：10:00～18:00　日祭日：10:00～18:00<br>定休日：年中無休 (但しお盆、年末年始を除く)</p>';
                  }

                }
              ?>
    </div>
    <div class="c_r clearfix">
      <?php
                if(get_field('cars_store')){
                  if($cars_store__value === '1' ) {
                    echo '<a href="' . home_url('/') . 'mail.html?store=福岡店&cars_itemnumber=FU' . get_field('cars_itemnumber') . '&car_name=' . get_the_title() . '" class="btn fz_24">在庫確認・購入お申込み</a>';
                  } elseif($cars_store__value === '2') {
                    echo '<a href="' . home_url('/') . 'mail.html?store=大阪店&cars_itemnumber=OS' . get_field('cars_itemnumber') . '&car_name=' . get_the_title() . '" class="btn fz_24">在庫確認・購入お申込み</a>';
                  } elseif($cars_store__value === '3' ) {
                    echo '<a href="' . home_url('/') . 'mail.html?store=TOKYO店&cars_itemnumber=TK' . get_field('cars_itemnumber') . '&car_name=' . get_the_title() . '" class="btn fz_24">在庫確認・購入お申込み</a>';
                  }
                }
              ?>
    </div>
  </div>
</aside>

<?php
  $store_num = get_field('cars_store');
  echo $store_num;
  $terms = get_the_terms( $post->ID, 'cars_categorys');
  if( $terms ) {
    foreach($terms as $term){
      echo $term->slug;
    }
  }


  $args = array(
    'post_type'=>'cars',
    'posts_per_page' => 4,
    'order' => 'DESC',
    'orderby' => 'modified',
    'meta_key' => 'cars_loan__price',
    'post__not_in' => array(get_the_ID()),
    'tax_query' => array(
        array(
          'taxonomy'=>'cars_categorys',
          'terms'=> $term->slug,
          'field'=>'slug',
          'operator'=>'IN'
        ),
      ),
    'meta_query' => array(
      array(
          'key'=>'cars_status',
          'value'=> 'on',
          'compare' => 'IN',
      ),
      array(
          'key'=>'cars_store',
          'value'=> $store_num,
          'compare' => 'IN',
      ),
      )
    );
  $cars_price__post = get_posts( $args );
?>
<?php if($cars_price__post) :?>
<div class="search_body">
  <div class="flex carlist l_1 car_list__wrap">
    <?php foreach($cars_price__post as $post) :
        setup_postdata( $post );
      ?>
    <?php get_template_part( '_md_cars__post' ); ?>
    <?php
        endforeach;
        wp_reset_postdata();
      ?>
  </div>
</div>
<?php endif; ?>


<?php endwhile; ?>
<?php endif; ?>


<?php get_footer() ; ?>