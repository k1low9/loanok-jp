<?php
/*
Template Name: Shouhin
Version: 1.1
*/
$category = $_GET['category'];
$kaden_data = $_SESSION['$kaden_data'];
$kaden_category = $_SESSION['$categories'];
if($kaden_data === null){
wp_redirect( '/page-scrapped.html' ); exit;
}
?>

<?php get_header() ; ?>

<main class="kaden">
<img src="<?php bloginfo('template_url'); ?>/assets/img/appliances/kaden_top.png" alt="廃車・不動車を家電に変えよう">

<h3 class="kaden__h3"><?=$kaden_category[$category];?></h3>
<ul class=kaden_card-wrapper>
<?php
  foreach($kaden_data[$category] as $key => $val){
    ?>
    <li class="kaden_card">
    <p class="kaden_card-id">商品番号：<?=$val['id']?></p>
    <img class="kaden_card-img" src="//loanok.jp/app/wp-content/themes/carlife/assets/img/uploads/<?=$val['image_name']?>" />
    <h3 class="kaden_card-title"><?=$val['title']?></h3>
    <p class="kaden_card-subtitle"><?=$val['subtitle']?></p>
    </li>
    <?php
  }
?>
</ul>
<div><a href="https://lin.ee/nVf85id"><img src="//loanok.jp/app/wp-content/themes/carlife/assets/img/appliances/kaitori_line_btn.png" alt="友だち追加" border="0"></a></div>
<p class="kaden_wrapper-info">-お電話でのお問合せ先-</p>

          <a href="tel:0929388871" class="kaden_wrapper-tel">
          <span class="kaden-wrapper-tel__block">直通ダイヤル:</span>092-938-8871
          </a>
          <p class="kaden_wrapper-tel_warning">※音声ガイダンスが流れましたら「2」を押して下さい。
          </p>
          <a href="0924105912" class="kaden_wrapper-fax">
          FAX:092-410-5912
          </a>
</main>
</main>

<?php get_footer() ; ?>
