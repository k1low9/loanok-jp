<article class="car_post__article fz_12 flex-w50">
    <?php
      $day = 10;
      $today = date_i18n('U');
      if(get_field('cars_update')){
        $update = strtotime(get_field('cars_update'));
        $unixtimestamp = date_i18n("U", $update);
        $kiji = date('U',($today - $update)) / 86400 ;
        if( $day > $kiji ){
          echo '<span class="newicon">New!</span>';
        }
      }
    ?>
        <?php
        $car_img__group = get_field('car_img__group');
        if( $car_img__group ): ?>
        <a href="<?php the_permalink(); ?>" class="car_post__link">
        <?php
        $img_value = 'car_img1' ;
        $car_title = get_the_title();
        if ( $car_img__group[$img_value] ) {
          $attachment_id = $car_img__group[$img_value];
          $attachment_id_src = wp_get_attachment_image_src($attachment_id, 'original_thumb_34');
          echo '<figure class="car_img">';
          echo '<img src="' . esc_html( $attachment_id_src[0] ) . '" class="cars_img__lrg desktop" alt="' . esc_attr($car_title) . '">';
          echo '</figure>';
        }
        ?>
        <?php
            $cars_afteroption = get_field('cars_afteroption');
            $cars_afteroption_original = get_field('cars_afteroption_original');
            if( $cars_afteroption) {
                echo '<span class="gurantee_bn"><img src="' . get_template_directory_uri().  '/assets/img/gurantee_bn.png" alt="自社ローンなのに1年間無料保証付!"></span>';
            } elseif($cars_afteroption_original) {
                echo '<span class="gurantee_bn"><img src="' . get_template_directory_uri().  '/assets/img/gurantee_bn2.png" alt="自社無料保証付!"></span>';
            }
        ?>
        </a>
        <?php endif; ?>
        <div class="car_detail01">
            <h3 class="fz_18 car_detail__ttl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php
                $cars_baseinfo__group = get_field('cars_baseinfo__group');
                if( $cars_baseinfo__group ): ?>
                <?php echo '<p>' . $cars_baseinfo__group['cars_grade'] . '</p>'; ?>
            <?php endif; ?>
        </div>
        <div class="car_detail02">
      <?php
          $cars_store = get_field_object('cars_store');
          $cars_store__value = $cars_store['value'];
          $cars_store__label = $cars_store['choices'][ $cars_store__value ];
          if( $cars_store__value ):
      ?>
      <?php
        if(get_field('cars_itemnumber')){
          if($cars_store__value === '1' ) {
            echo '<div class="c_l store_fukuoka"><p class="store_color fukuoka">販売店：' . esc_attr( $cars_store__label ) . '</p>';
          } elseif($cars_store__value === '2') {
            echo '<div class="c_l store_osaka"><p class="store_color osaka">販売店：' . esc_attr( $cars_store__label ) . '</p>';
          } elseif($cars_store__value === '3' ) {
            echo '<div class="c_l store_tokyo"><p class="store_color tokyo">販売店：' . esc_attr( $cars_store__label ) . '</p>';
          }
        }
      ?>
      <?php endif; ?>
      <?php
        if(get_field('cars_itemnumber')){
          if($cars_store__value === '1' ) {
            echo '<p class="itennum">[物件番号 FU' . get_field('cars_itemnumber') . ']</p>';
          } elseif($cars_store__value === '2') {
            echo '<p class="itennum">[物件番号 OS' . get_field('cars_itemnumber') . ']</p>';
          } elseif($cars_store__value === '3' ) {
            echo '<p class="itennum">[物件番号 TK' . get_field('cars_itemnumber') . ']</p>';
          }
        }
      ?>
            </div>
                <div class="c_r">
       <?php
         $car_price__group = get_field('car_price__group');
         $cars_bodyprice = $car_price__group['cars_bodyprice'];
         $cars_bodyprice = $car_price__group['cars_bodyprice'] . '0000';
         $cars_price__expenses = $car_price__group['cars_price__expenses'];
         $cars_totalprice = $cars_bodyprice + $cars_price__expenses;
       $car_price__group = get_field('car_price__group');
       $cars_bodyprice = $car_price__group['cars_bodyprice'];
       if( $car_price__group ): ?>
       <?php
         echo '<p class="bodyprice">車両本体価格<span class="fz_18">' . $cars_bodyprice . '</span><span class="fz_14">.0</span>万円</p>';
       ?>
       <?php
         $cars_bodyprice = $car_price__group['cars_bodyprice'] . '0000';
         $cars_price__expenses = $car_price__group['cars_price__expenses'];
         $cars_totalprice = $cars_bodyprice + $cars_price__expenses;
         $cars_totalprice__num = $cars_totalprice / 10000;
         echo '<p class="bodyprice">現金一括支払価格<span class="fz_18">' . $cars_totalprice__num . '</span><span class="fz_14">.0</span>万円</p>';
       ?>
       <?php endif; ?>

       <?php if( $cars_bounus = get_field('cars_bounus')) {
        echo '<p class="bounus_price">☆ボーナス払いOK！☆</p>';
        }?>

        <?php
            if( $cars_afteroption) {
                echo '<p class="bounus_price after_option">1年間無料保証付</p>';
            } elseif($cars_afteroption_original) {
                echo '<p class="bounus_price after_option">自社無料保証付</p>';
            }
        ?>


            </div>
        </div>
        <ul class="flex car_detail03">
       <?php
       $cars_baseinfo__group = get_field('cars_baseinfo__group');
           if( $cars_baseinfo__group ): ?>
           <?php echo '<li>年式<span>' . $cars_baseinfo__group['cars_registration__date'] . '</span></li>'; ?>
       <?php endif; ?>
       <?php
       $cars_detail__group = get_field('cars_detail__group');
       if( $cars_detail__group ): ?>
       <?php
           $cars_milage__unit = $cars_detail__group['cars_milage__unit'];
           if($cars_milage__unit === '1') {
              $milage = $cars_detail__group['cars_milage'] * 1000;
              echo '<li>走行距離<span class="bold">' . number_format( $milage ) . 'km</span></li>';
           } elseif($cars_milage__unit === '2') {
              $milage = $cars_detail__group['cars_milage'] * 1000;
              echo '<li>走行距離<span class="bold">' . number_format( $milage ) . 'mile</span></li>';
           } else {
              echo '<li>走行距離<span class="bold">' . $cars_detail__group['cars_milage'] . $cars_detail__group['cars_milage__unit'] . '</span></li>';
           }
       ?>
       <?php endif; ?>
       <?php
       $cars_detail__group = get_field('cars_detail__group');
       if( $cars_detail__group ): ?>
       <?php echo '<li>シフト<span>' . $cars_detail__group['cars_mission'] . '</span></li>'; ?>
       <?php echo '<li>排気量<span>' . $cars_detail__group['cars_displacement'] . 'cc</span></li>'; ?>
       <?php endif; ?>

       <?php
       $cars_inspection__group = get_field('cars_inspection__group');
       if( $cars_inspection__group ): ?>
       <?php
           $cars_inspection__value = $cars_inspection__group['cars_inspection'];
           if($cars_inspection__value === '1') {
              echo '<li>車検<span>2年付</span></li>';
           } elseif($cars_inspection__value === '2') {
               echo '<li>車検期日<span>' . $cars_inspection__group['cars_inspection_date'] . '</span></li>';
           } elseif($cars_inspection__value === '3') {
                echo '<li>車検<span>1年付</span></li>';
            }
       ?>
       <?php endif; ?>
        </ul>
        <div class="car_detail04">
      <?php if(get_field('cars_salespoint')): ?>
          <p class="car_text"><?php echo strip_tags(get_field('cars_salespoint')); ?></p>
      <?php endif; ?>
            <a href="<?php the_permalink(); ?>" class="btn_more">詳しく見る</a>
        </div>
    <a href="<?php the_permalink(); ?>" class="moblie_link"><i class="fa fa-chevron-right"></i></a>
</article>