<?php
$title_default = '自社ローン カーライフグループ' ;
$keyword_default = '自社ローン,カーライフ,福岡,審査なし,中古車,ブラック,オートローン' ;
$desc_bloginfo = '「他社でローンが通らない...総量規制、債務整理、金融事故、ブラックあきらめないで！カーライフ福岡、大阪、東京は自社ローンだから100%購入できます！頭金なし、審査なし、しかも来店不要。軽自動車から輸入車まで全国どこでも納車可能。お客様の「買いたい」を「買える」を叶えるカーライフグループです。中古車をオートローンでお考えの方はご相談下さい。';
$page_title = get_the_title();
if($page_title) {
    $page_title = clfn_desc($page_title);
    $page_title = mb_substr($page_title, 0, 50);
}
$title = $page_title . ' | ' . $title_default;
$og_image = get_theme_file_uri() . '/assets/img/ogp1200x630.jpg';
$og_type = 'article';
$current_url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if(!empty($post->post_content)){
    if(has_excerpt()){
        $desc = $post->post_excerpt;
        $desc = clfn_desc($desc);
    } else{
        $desc = $post->post_content;
        $desc = clfn_desc($desc);
    }
}else{
    $desc = get_bloginfo('description');
}

if (is_home() || is_front_page()) {
    $desc = $desc_bloginfo;
    $title = $title_default ;
    $og_type = 'website';
}
elseif(is_search() ) {
    $form_type = $_GET['form_type'];
    $store_id = $_GET['store_id'];
    $price_sort = $_GET['price_sort'];
    if($form_type === 'store') {
        $store_name = '';
        if($store_id === '3') {
            $store_name = 'TOKYO店';
        } elseif($store_id === '2') {
            $store_name = '大阪店';
        } elseif($store_id === '1') {
            $store_name = '福岡店';
        }
        $title = $store_name . '在庫情報' . ' | ' .$title_default ;
        $desc = 'カーライフ' . $store_name . 'の在庫情報。' . $desc_bloginfo;
        $keyword_default = $keyword_default . ',在庫情報,' . $store_name;
    } elseif($form_type === 'car_cat' ) {
        $term = $_GET['term'];
        $term_object = get_term_by('slug', $term, 'cars_categorys');
        $term_name = $term_object->name;
        $title = $term_name . '在庫一覧' . ' | ' .$title_default ;
        $desc = $term_name . '在庫一覧ページ。' . $desc_bloginfo;
        $keyword_default = $keyword_default . ',' . $term_name;
    } elseif($form_type === 'price' ) {
        $car_search__priceB = $_GET['price_bottom'];
        $car_search__priceU = $_GET['price_up'];
        if ($car_search__priceB == 0) {
            $car_search__price = '〜' . $car_search__priceU . '円';
        } elseif($car_search__priceU > 50000) {
            $car_search__price = $car_search__priceB . '円〜';
        } else {
            $car_search__price = $car_search__priceB . '円〜' . $car_search__priceU . '円';
        }
        $title = $car_search__price . '在庫一覧' . ' | ' .$title_default ;
        $desc = $car_search__price . '在庫一覧ページ。' . $desc_bloginfo;
    } else {
        $title = '検索結果一覧' . ' | ' .$title_default ;
    }
}
elseif (is_page()) {
    if(is_page('page-scrapped')){
        $keyword_default = '不動車,不要車,廃車,車買取,最新家電,廃車簡単';
    }
    $cf_meta__description = get_field('cf_meta__description');
    if($cf_meta__description){
        $desc = $cf_meta__description;
        $desc = clfn_desc($desc);
    } else {
        $desc = $title_default . 'の' . $page_title . 'ページ。';
    }
    $title = $page_title . ' | ' . $title_default ;
}
elseif (is_singular('cars')) {
    $cars_store = get_field_object('cars_store');
    $cars_store__value = $cars_store['value'];
    if(get_field('cars_itemnumber')){
        if($cars_store__value === '1' ) {
            $cars_store__name = '福岡店';
        } elseif($cars_store__value === '2') {
            $cars_store__name = '大阪店';
        } elseif($cars_store__value === '3' ) {
            $cars_store__name = '東京店';
        }
    }
    if(get_field('cars_salespoint')){
        $salespoint = get_field('cars_salespoint', $post->ID);
        $salespoint = stripslashes($salespoint);
        $salespoint = strip_tags($salespoint);
        $salespoint = str_replace(array("\r\n","\r","\n"," ","　","    "), '', $salespoint );
        $salespoint = trim($salespoint);
    }
    if (has_post_thumbnail()){
        $post_thumbnail_id = get_post_thumbnail_id();
        $image = wp_get_attachment_image_src( $post_thumbnail_id, 'original_landscape_lrg' );
        $og_image = $image[0];
    } elseif(get_field('car_img__group')) {
        $car_img__group = get_field('car_img__group');
        if($car_img__group['car_img1']) {
            $attachment_id = $car_img__group['car_img1'];
            $attachment_id_src = wp_get_attachment_image_src($attachment_id, 'original_landscape_lrg');
            $og_image = $attachment_id_src[0];
        } else {
            $og_image = $og_image;
        }
    } else {
        $og_image = $og_image;
    }
    $desc = 'カーライフ' . $cars_store__name . 'の' . $page_title . 'ページです。' . $salespoint;
    $desc = mb_substr($desc, 0, 180);
    $keyword_default = $keyword_default . ',' . $cars_store__name;
    $title = $page_title . ' | ' . $title_default . $cars_store__name ;
}
elseif(is_post_type_archive('rentacar')) {
    $desc = 'カーライフ福岡店、大阪店、東京店のレンタカー。中古車販売のパイオニア「カーライフグループ」が手がけるレンタカー!ちょっとした利用に使える小型車から引越しなどに使えるトラック・貨物、その上短時間の利用ではなかなか無い重機まで揃えました！中古車販売ならではの1時間200円からの低価格格安レンタカーを実現。';
    $keyword_default = 'レンタカー,カーライフ,福岡,格安,中古車,重機,引っ越しトラック';
    $title = 'カーライフのレンタカー 1時間200円からの格安レンタカー 福岡店、大阪店、東京店';
}
elseif( is_singular( 'rentacar' )) {
    $cars_store = get_field_object('rentacars_store');
    $cars_store__value = $cars_store['value'];
    if(get_field('rentacars_store')){
        if($cars_store__value === '1' ) {
            $cars_store__name = '福岡店';
        } elseif($cars_store__value === '2') {
            $cars_store__name = '大阪店';
        } elseif($cars_store__value === '3' ) {
            $cars_store__name = '東京店';
        }
    }
    if (has_post_thumbnail()){
        $post_thumbnail_id = get_post_thumbnail_id();
        $image = wp_get_attachment_image_src( $post_thumbnail_id, 'original_landscape_lrg' );
        $og_image = $image[0];
    } elseif(get_field('rentacar_img__group')) {
        $car_img__group = get_field('rentacar_img__group');
        if($car_img__group['rentacar_img1']) {
            $attachment_id = $car_img__group['rentacar_img1'];
            $attachment_id_src = wp_get_attachment_image_src($attachment_id, 'original_landscape_lrg');
            $og_image = $attachment_id_src[0];
        } else {
            $og_image = $og_image;
        }
    } else {
        $og_image = $og_image;
    }
    $desc = 'カーライフ' . $cars_store__name . 'のレンタカー　' . $page_title . 'ページです。ちょっとした利用に使える小型車から引越しなどに使えるトラック・貨物、その上短時間の利用ではなかなか無い重機まで揃えました。古車販売ならではの1時間200円からの低価格格安レンタカーを実現。';
    $keyword_default = 'レンタカー,カーライフ,格安,' . $page_title . ',' . $cars_store__name;
    $title = $page_title . ' | カーライフ' . $cars_store__name . 'のレンタカー　1時間200円からの格安レンタカー' ;
} else {
    $desc = $desc_bloginfo;
    $title = $page_title . ' | ' . $title_default ;
}
?>
<title><?php echo $title ; ?></title>
<meta name="description" content="<?php echo $desc ; ?>" />
<meta name="keywords" content="<?php echo $keyword_default ; ?>" />
<meta property="og:title" content="<?php echo esc_attr($title) ; ?>" />
<meta property="og:description" content="<?php echo esc_attr($desc) ; ?>"/>
<meta property="og:type" content="<?php echo esc_attr($og_type) ; ?>" />
<meta property="og:url" content="<?php echo esc_url($current_url) ?>" />
<?php if (is_array($og_image)) :?>
<?php foreach( $og_image as $og_image_s ): ?>
<?php echo '<meta property="og:image" content="' . $og_image_s . '" />'?>
<?php endforeach; ?>
<?php else :?>
<meta property="og:image" content="<?php echo esc_url($og_image) ?>" />
<?php endif ;?>
<meta property="og:site_name" content="<?php echo $title_default ; ?>" />
