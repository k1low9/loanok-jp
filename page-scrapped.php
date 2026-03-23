<?php
/*
Template Name: Scrapped
Version: 1.1.5
*/
$url = 'https://api.loanok.jp/api/posts';
$requests_response = wp_remote_get( $url );

$dd =json_decode(json_decode(json_encode($requests_response['body']),true),true);

$categories = array();

foreach($dd[0] as $key => $val){
  $categories[$val['id']]= $val['category'];
};


$kaden_data = array() ;
foreach($dd[1] as $keys => $vals){
  if(empty ($vals['checkbox'])){
    continue;
  }else{
        $kaden_data[$vals['checkbox']] []= $vals;
  }
};

ksort($kaden_data);

$_SESSION['$kaden_data'] = $kaden_data;
$_SESSION['$categories'] = $categories;
//  var_dump($kaden_data);exit;


function foo(array $arg){
  for($i=0;$i<5;$i++){
    if(empty($arg[$i]['image_name'])){
      continue;
    }else{
    $foo .= "<li><img class=\"item\" src='//loanok.jp/app/wp-content/themes/carlife/assets/img/uploads/".$arg[$i]['image_name']."' /></li>";
    }
  }
  return $foo;
}

?>

<?php get_header() ; ?>

<main class="kaden">
<img src="<?php bloginfo('template_url'); ?>/assets/img/appliances/kaden_top.png" alt="廃車・不動車を家電に変えよう">

<div class="sub_wrapper">
  <figure class="sub_wrapper-flex_item"><img src="<?php bloginfo('template_url'); ?>/assets/img/appliances/parts/j__03.png" alt="廃車・不動車を家電に変えよう"></figure>
  <figure class="sub_wrapper-flex_item"><img src="<?php bloginfo('template_url'); ?>/assets/img/appliances/parts/j__05.png" alt="廃車・不動車を家電に変えよう"></figure>
  <figure class="sub_wrapper-flex_item"><img src="<?php bloginfo('template_url'); ?>/assets/img/appliances/parts/j__07.png" alt="廃車・不動車を家電に変えよう"></figure>
</div>
<div class="subtitle"><img src="<?php bloginfo('template_url'); ?>/assets/img/appliances/parts/banner_13.png" alt="廃車・不動車を家電に変えよう"></div>

<div class="thrd_box">
  <figure class="thrd_box-flex_item"><img class="third_box__img" src="<?php bloginfo('template_url'); ?>/assets/img/appliances/parts/banner_16.png" alt="引き取り"></figure>
  <figure class="thrd_box-flex_item"><img class="third_box__img" src="<?php bloginfo('template_url'); ?>/assets/img/appliances/parts/banner_18.png" alt="処分"></figure>
  <figure class="thrd_box-flex_item"><img class="third_box__img" src="<?php bloginfo('template_url'); ?>/assets/img/appliances/parts/banner_20.png" alt="手続き"></figure>
  <figure class="thrd_box-flex_item"><img class="third_box__img" src="<?php bloginfo('template_url'); ?>/assets/img/appliances/parts/banner_22.png" alt="処理"></figure>
  <figure class="thrd_box-flex_item"><img class="third_box__img" src="<?php bloginfo('template_url'); ?>/assets/img/appliances/parts/banner_24.png" alt="抹消"></figure>
</div>

<div class="waiting">
<img src="<?php bloginfo('template_url'); ?>/assets/img/appliances/parts/banner_31.png" alt="選んで待つだけ">
</div>

<div class="fourth_box">
  <p>※本サービスは、当社が引き取り・手続きを行い、商品の発送、設置はコジマが行います。</p>
  <p>※商品は定期的に入れ替わります。</p>
  <p>※商品の在庫状況によってはお取り寄せ等が発生する場合があります。</p>
  <p>※現在、サービス対象エリアを下記にて行っております。</p>

</div>

<?php
krsort($kaden_data);
foreach($kaden_data as $key => $val){
  ?>
  <div class="kaden_wrapper">
        <h3 class="kaden__h3"><?=$categories[$key];?></h3><!--<?=$key;?>-->
          <ul class="kaden_inner">
            <a href="https://loanok.jp/product_list.html?category=<?=$key?>">
            <?php
            echo foo($val);
            ?>
            <li class="kaden_li-btn">もっと見る</li>
            </a>
          </ul></div>
          <? } ?>
          <div class="kaden__service_area">
          <span class="kaden__service_h2">福岡県全域</span>
          <span class="kaden__service_h2">佐賀県</span>
          <span class="h2__service_area">佐賀市・小城市・鳥栖市・神崎市・みやき町・基山町・吉野ヶ里町・上峰町・唐津町・玄海町</span>
          <span class="kaden__service_h2">熊本県</span>
          <span class="h2__service_area">長州町・荒尾市・南関町・和泉町・山鹿市・菊池市・小国町・南小国町・玉名市・玉東市・合志市
          </span>
          <span class="kaden__service_h2">大分県</span>
          <span class="h2__service_area">中津市・宇佐市・豊後高田市・杵築市
          </span>
          <span class="kaden__service_h2">山口県</span>
          <span class="h2__service_area">下関市・宇部市・山陽小野田市・長門市・美祢市
          </span>
          <span class="kaden__service_h2">千葉県</span>
          <span class="h2__service_area">千葉市・船橋市・柏市・茂原市・東金市
          </span>
          <span class="kaden__service_h2">茨城県</span>
          <span class="h2__service_area">つくば市・土浦市
          </span>
          <span class="kaden__service_h2">東京都</span>
          <span class="h2__service_area">江戸川区・葛飾区・足立区・墨田区・江東区
          </span>
          <span class="kaden__service_h2_sonota">※上記エリア近郊でも対応可能な場合がございますので気軽にお問い合わせ下さい。
          </span>
          <span class="kaden__service_h2_sonota">※持ち込みもOK!
          </span>

          </div>

          <div class="kaden_wrapper_line"><a href="https://lin.ee/nVf85id"><img src="//loanok.jp/app/wp-content/themes/carlife/assets/img/appliances/kaitori_line_btn.png" alt="友だち追加" border="0"></a></div>
          <p class="kaden_wrapper-info">-お電話でのお問合せ先-</p>

          <a href="tel:<?=$GLOBALS['shop_gloval_var']['kaden']['tel']?>" class="kaden_wrapper-tel">
          <span class="kaden-wrapper-tel__block">直通ダイヤル:</span><?=$GLOBALS['shop_gloval_var']['kaden']['tel-']?>
          </a>
          <p class="kaden_wrapper-tel_warning">※音声ガイダンスが流れましたら「2」を押して下さい。
          </p>
          <a href="0924105912" class="kaden_wrapper-fax">
          FAX:092-410-5912
          </a>
</main>

<?php get_footer() ; ?>
