<?php get_header() ;
/**
 * Template Name: rentacars-tokyo
 **/
?>
<?php
$page = get_post( get_the_ID() );
$store_name = $page->post_name;
$store_name = mb_substr($store_name, 10);
if($store_name === 'tokyo') {
    $store_id = 3;
    $store_title = 'TOKYO店';
} elseif($store_name === 'osaka') {
    $store_id = 2;
    $store_title = '大阪店';
} elseif($store_name === 'fukuoka') {
    $store_id = 1;
    $store_title = '福岡店';
}
 ?>

<?php
    $args = array(
        'post_type'=>'rentacar',
        'posts_per_page' => -1,
        'orderby' => 'modified',
        'meta_query' => array(
            array(
                'key'=>'rentacars_status',
                'value'=> 'on',
                'compare' => 'IN',
            ),
            array(
                'key'=>'rentacars_store',
                'value'=> $store_id,
                'compare' => 'IN'
            ))
        );
    $cars_store__post = get_posts( $args );
    $cars_store__postCount = count( $cars_store__post );
?>
<div class="rentacar_Tokyo__wrap">
<img class="rentacar_Tokyo__img" src="<?php bloginfo('template_url'); ?>/assets/img/rentacar-tokyo.png" alt="1ヵ月から借りれるレンタカー">
<div class="rentacar_Tokyo__section">
    <h2 class="rentacar_Tokyo-ttl">軽自動車</h2>
    <div class="rentacar_Tokyo__price">¥13,750<span class="rentacar_Tokyo__em">(税込み)</span>/週</div>
    <div class="rentacar_Tokyo__price">¥33,000<span class="rentacar_Tokyo__em">(税込み)</span>/月</div>
    <div><a href="rentacar/153683" class="rentacar_Tokyo__btn">詳しく見る</a></div>
</div>
<div class="rentacar_Tokyo__section">
    <h2 class="rentacar_Tokyo-ttl">コンパクトカー</h2>
    <div class="rentacar_Tokyo__price">¥19,500<span class="rentacar_Tokyo__em">(税込み)</span>/週</div>
    <div class="rentacar_Tokyo__price">¥49,500<span class="rentacar_Tokyo__em">(税込み)</span>/月</div>
    <div><a href="rentacar/153685" class="rentacar_Tokyo__btn">詳しく見る</a></div>
</div>
<div class="rentacar_Tokyo__section">
    <h2 class="rentacar_Tokyo-ttl">軽バン</h2>
    <div class="rentacar_Tokyo__price">¥16,500<span class="rentacar_Tokyo__em">(税込み)</span>/週</div>
    <div class="rentacar_Tokyo__price">¥44,000<span class="rentacar_Tokyo__em">(税込み)</span>/月</div>
    <div><a href="rentacar/153694" class="rentacar_Tokyo__btn">詳しく見る</a></div>
</div>
<div class="rentacar_Tokyo__section">
    <h2 class="rentacar_Tokyo-ttl">ミニバン</h2>
    <div class="rentacar_Tokyo__price">¥27,720<span class="rentacar_Tokyo__em">(税込み)</span>/週</div>
    <div class="rentacar_Tokyo__price">¥66,000<span class="rentacar_Tokyo__em">(税込み)</span>/月</div>
    <div><a href="rentacar/223726" class="rentacar_Tokyo__btn">詳しく見る</a></div>
</div>

<div style="color:red;font-weight:900;text-align:center;">※ETC・カーナビはすでに込みの金額で格安のプランをご案内いたします。
</div>
</div>
<?php get_footer() ; ?>
