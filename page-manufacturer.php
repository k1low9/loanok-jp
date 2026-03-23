<?php get_header();
$manufacturer = isset($_GET['manufacturer']) ? sanitize_text_field($_GET['manufacturer']) : '';
$c_term = isset($_GET['c_term']) ? sanitize_text_field($_GET['c_term']) : '';


$makers = array(
  "LE" => ["name" => "レクサス", "url" => "JL|1"],
  "TOYOTA" => ["name" => "トヨタ", "url" => "TO|1"],
  "NISSAN" => ["name" => "日産", "url" => "NI|1"],
  "HONDA" => ["name" => "ホンダ", "url" => "HO|1"],
  "MATSUDA" => ["name" => "マツダ", "url" => "MA|1"],
  "SUBARU" => ["name" => "スバル", "url" => "SB|1"],
  "MITSUBISHI" => ["name" => "三菱", "url" => "MI|1"],
  "DAIHATSU" => ["name" => "ダイハツ", "url" => "DA|1"],
  "SUZUKI" => ["name" => "スズキ", "url" => "SZ|1"],
);

// スラッグごとの投稿数を格納する配列を初期化
if (!empty($manufacturer)) {
  //ターム出力
  // タームの数を格納する配列を初期化
  $term_counts = array();
  // カスタムループを使用して投稿を取得
    $query = new WP_Query( array(
      'post_type' => ['cars','jimnys'], // 投稿タイプを指定
      'posts_per_page'=> -1,
      'meta_query' => array(
        'realation' => 'AND',
            array(
              'key'     => 'cars_baseinfo__group_cars_maker',
              'value'   => $manufacturer,
            ),
            array(
              'key'     => 'cars_status',
              'value'   => 'on',
            ),
          ),
    ));
    // ループを使用して各投稿のタームを取得して数を集計
    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) {
          $query->the_post();
          $terms = get_the_terms( get_the_ID(), 'cars_categorys' ); // タクソノミー名を指定する

          if ( $terms && ! is_wp_error( $terms ) ) {
              foreach ( $terms as $term ) {
                  if ( isset( $term_counts[ $term->term_id ] ) ) {
                      $term_counts[ $term->term_id ]++;
                  } else {
                      $term_counts[ $term->term_id ] = 1;
                  }
              }
          }
      }
    }
  // タームの数を出力
  echo '<div class="tw-max-w-[1600px] md:tw-container md:tw-mx-auto"><div class="tw-grid md:tw-grid-cols-6 md:tw-gap-4 md:tw-m-5 tw-grid-cols-2 tw-m-5">';
  foreach ( $term_counts as $term_id => $count ) {
      $term = get_term( $term_id, 'cars_categorys' ); // タクソノミー名を指定する
      if($c_term){
        if($c_term == $term->term_id){
          continue;
        }
      }
      echo '<div class="tw-font-sans tw-font-bold tw-text-white  tw-text-base lg:tw-text-sm lg:tw-m-0"> '. $term->name . '(<a class="tw-inline" href="?manufacturer='.$manufacturer.'&c_term='.$term->term_id.'">'. $count . '</a>)</div>';
    }
    echo '<div class="tw-font-sans tw-font-bold tw-text-white  md:tw-text-base"> すべて(<a class="tw-inline" href="?manufacturer='.$manufacturer.'">'. $query->post_count . '</a>)</div>';
  echo '</div></div>';
  if($c_term){
    $tt = get_term( $c_term, 'cars_categorys' );
    echo '<h1 class="tw-max-w-[1600px] md:tw-container md:tw-mx-auto tw-text-center tw-font-sans tw-font-bold tw-text-white tw-text-2xl">'.$tt->name.'</h1>';
 }


  if(!empty($manufacturer) && !empty($c_term)){
      wp_reset_postdata();
      $query = new WP_Query( array(
        'post_type' => ['cars','jimnys'], // 投稿タイプを指定
        'posts_per_page'=> -1,
        'meta_query' => array(
          'realation' => 'AND',
              array(
                'key'     => 'cars_baseinfo__group_cars_maker',
                'value'   => $manufacturer,
              ),
              array(
                'key'     => 'cars_status',
                'value'   => 'on',
              ),
            ),
        'tax_query' => array(
          array(
              'taxonomy' => 'cars_categorys',
              'field' => 'term_id',
              'terms' => $c_term, // タームID
          ),
      ),
      ));?>

      <div class="flex carlist l_1 car_list__wrap">
      <?php while ($query->have_posts()) : $query->the_post();
      ?>
        <?php get_template_part('_md_cars__post'); ?>
      <?php endwhile; ?>
    </div>
    </div>

  <div class="tw-flex tw-justify-center tw-mb-10"><a href="manufacturer.html" class="tw-block tw-rounded-lg tw-bg-white tw-px-10 tw-py-2.5 tw-font-semibold tw-text-gray-900 tw-shadow-sm hover:tw-bg-gray-100 focus-visible:tw-outline focus-visible:tw-outline-2 focus-visible:tw-outline-offset-2 focus-visible:tw-outline-white">メーカー一覧に戻る</a></div>

  <?php
  wp_reset_postdata();
    }else{
      ?>
    <div class="flex carlist l_1 car_list__wrap">
      <?php while ($query->have_posts()) : $query->the_post();
      ?>
        <?php get_template_part('_md_cars__post'); ?>
      <?php endwhile; ?>
    </div>
    </div>

  <div class="tw-flex tw-justify-center tw-mb-10"><a href="manufacturer.html" class="tw-block tw-rounded-lg tw-bg-white tw-px-10 tw-py-2.5 tw-font-semibold tw-text-gray-900 tw-shadow-sm hover:tw-bg-gray-100 focus-visible:tw-outline focus-visible:tw-outline-2 focus-visible:tw-outline-offset-2 focus-visible:tw-outline-white">メーカー一覧に戻る</a></div>

  <?php
  wp_reset_postdata();
    };
} else { ?>
  <main>
    <div class="l_1 l_side+">
      <div class="tw-container tw-mx-auto">
        <h2 class="tw-text-white tw-text-5xl tw-font-bold tw-text-center tw-mt-10">メーカーで探す</h2>
        <div class="tw-grid tw-grid-cols-3 lg:tw-grid-cols-6 tw-mx-0 tw-my-2 md:tw-my-20 md:tw-mx-40 tw-gap-1 tw-mt-5 tw-mb-10">
          <?php foreach ($makers as $key => $val) { ?>
            <div class="tw-bg-white/80 tw-text-center">
              <a href="/manufacturer.html?manufacturer=<?= $val["url"]; ?>">
                <div class="tw-mx-auto tw-aspect-square tw-bg-center tw-bg-no-repeat tw-px-1" style="background-image: url(<?php echo bloginfo('template_directory'); ?>/assets/img/maker/<?= $key; ?>.png);"></div><?= $val["name"]; ?>
              </a>
            </div>
          <?php } ?>
          <div class="tw-bg-white/80 tw-text-center">
            <a href="/?post_type=cars&form_type=car_cat&term=import&s=">
              <div class="tw-mx-auto tw-aspect-square tw-bg-center tw-bg-no-repeat tw-px-1" style="background-image: url(<?php echo bloginfo('template_directory'); ?>/assets/img/maker/OTHER.png);"></div>外国車
            </a>
          </div>

        </div>
      </div>

  </main>
<?php }; ?>

<?php get_footer(); ?>