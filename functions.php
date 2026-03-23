<?php

//jquery
function my_scripts()
{
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'my_scripts');

//   ---------------------------------------
//    基本設定
//  ----------------------------------------

// jquery デフォルトの読み込みcdnに変更
// function include_jquery_cdn_loader() {
// 	if( !is_admin() ){
// 		//WP Default jQuery Load Deregister.
// 		wp_deregister_script('jquery');
// 		//jQuery CDN
// 		$jsCore = '//code.jquery.com/jquery-3.3.1.min.js';
// 		$jsMigrate = '//code.jquery.com/jquery-migrate-1.4.1.min.js';
// 		//jQuery CDN Check
// 		$core_url = @fopen('http:'.$jsCore, 'r');
// 		//jQuery CDN Server Down
// 		if( $core_url === false ){
// 			$jsCore = home_url( '/' ).'wp-includes/js/jquery/jquery.js';
// 		}
// 		wp_register_script( 'jquery', $jsCore, array(), null, false );
// 		wp_enqueue_script( 'jquery' );
// 		$migrate_url = @fopen('http:'.$jsMigrate, 'r');
// 		//jQuery Migrate CDN Server Down
// 		if( $migrate_url === false ){
// 			$jsMigrate = home_url( '/' ).'wp-includes/js/jquery/jquery-migrate.min.js';
// 		}
// 		wp_register_script( 'jquery_migrate', $jsMigrate, array(), null, false );
// 		wp_enqueue_script( 'jquery_migrate' );
// 	}
// }
// add_action('wp_enqueue_scripts', 'include_jquery_cdn_loader');

//管理画面 [設定 - メディア] で指定する 「大サイズ」 の幅の上限
if (!isset($content_width))
    $content_width = 720;

//サムネイルサイズ
add_theme_support('post-thumbnails');
//		add_image_size( 'original_thumb', 300, 300, false );
//		add_image_size( 'original_thumbsq', 300, 300, true );
//		add_image_size( 'original_thumb_lrg', 500, 500, false );
//		add_image_size( 'original_thumbsq_lrg', 500, 500, true );
add_image_size('original_thumb_34', 400, 300, true);
add_image_size('original_thumb_landscape', 400, 225, true);
//		add_image_size( 'original_thumb_portrait', 225, 400, true );
//		add_image_size( 'original_portrait', 450, 800, true );
//		add_image_size( 'original_landscape', 800, 450, true );
//		add_image_size( 'original_landscape_lrg', 1200, 600, true );


//追加したサイズを選択できるように
function me_display_image_size_names_muploader($sizes)
{
    $new_sizes = array();
    $added_sizes = get_intermediate_image_sizes();
    foreach ($added_sizes as $key => $value) {
        $new_sizes[$value] = $value;
    }
    $new_sizes = array_merge($new_sizes, $sizes);
    return $new_sizes;
}
add_filter('image_size_names_choose', 'me_display_image_size_names_muploader', 11, 1);



/**
 * head出力制御
 ** ------------------------------
 */

// wp_head()のいらないタグを削除
remove_action('wp_head', 'wp_generator'); //バージョン情報
remove_action('wp_head', 'wlwmanifest_link'); // wlwmanifestWindows Live Writerを使った記事投稿URL
remove_action('wp_head', 'rsd_link'); // 外部ツールを使ったブログ更新用のURL
remove_action('wp_head', 'wp_shortlink_wp_head'); //デフォルトパーマリンクのURL
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head'); //前の記事と後の記事のURL
remove_action('wp_head', 'feed_links', 2); //RSSフィードのURL
remove_action('wp_head', 'feed_links_extra', 3); //RSSフィードのURL
//remove_action('wp_head','rest_output_link_wp_head');//oEmbed
//remove_action('wp_head','wp_oembed_add_discovery_links');//oEmbed
//remove_action('wp_head','wp_oembed_add_host_js');//oEmbed
remove_action('wp_head', 'print_emoji_detection_script', 7); // wp4.2emoji script 除去
remove_action('wp_print_styles', 'print_emoji_styles'); // wp4.2emoji script 除去
add_filter('emoji_svg_url', '__return_false'); // DNS prefitch emoji remove




/**　
 * エディター周り
 * ------------------------------
 */

//固定ページではビジュアルエディタを利用できないようにする
function disable_visual_editor_in_page()
{
    global $typenow;
    if ($typenow == 'page') {
        add_filter('user_can_richedit', 'disable_visual_editor_filter');
    }
}
function disable_visual_editor_filter()
{
    return false;
}
add_action('load-post.php', 'disable_visual_editor_in_page');
add_action('load-post-new.php', 'disable_visual_editor_in_page');

//【管理画面】wpsbc非表示
function disable_wpsbc_link()
{
    echo '<style type="text/css">#add_wpsbc {display: none !important;}</style>';
}
add_action('admin_head', 'disable_wpsbc_link');


//   タイトルプレースホルダーを変更
function change_default_title($title)
{
    $screen = get_current_screen();
    if ($screen->post_type == 'cars') {
        $title = '車種を入力';
    }
    return $title;
}
add_filter('enter_title_here', 'change_default_title');


// 投稿一覧で他のユーザーが投稿した投稿を非表示
function exclude_other_posts($wp_query)
{
    if (is_admin() && $wp_query->is_main_query() && !$wp_query->get('author') && !current_user_can('level_10')) {
        $user = wp_get_current_user();
        $wp_query->set('author', $user->ID);
    }
}
add_action('pre_get_posts', 'exclude_other_posts');


// output valid HTML5.
add_theme_support(
    'html5',
    array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    )
);

// Guteberg カスタムcss 有効化
add_theme_support('editor-styles');

// Guteberg カスタムcss データ
add_editor_style('assets/css/editor-style-block.css');

// Guteberg フォントサイズの数値入力を無効化
add_theme_support('disable-custom-font-sizes');

// Guteberg カスタムカラーピッカーを無効にする
// add_theme_support( 'disable-custom-colors' );

// Guteberg 必要なBlockのみを表示（ホワイトリスト）
add_filter('allowed_block_types_all', function ($allowed_block_types, $block_editor_context) {
    $allowed_block_types = [
        // テキスト
        'core/paragraph',              // 段落
        'core/heading',                // 見出し
        'core/list',                   // リスト
        'core/quote',                  // 引用
        'core/code',                   // コード
        // 'core/freeform',               // クラシック
        // 'core/preformatted',           // 整形済みテキスト
        // 'core/pullquote',              // プルクオート
        // 'core/table',                  // テーブル
        // 'core/verse',                  // 詩

        // メディア
        'core/image',                  // 画像
        'core/gallery',                // ギャラリー
        //'core/audio',                  // 音声
        // 'core/cover',                  // カバー
        'core/file',                   // ファイル
        // 'core/media-text',             // メディアとテキスト
        'core/video',                  // 動画

        // デザイン
        'core/buttons',                // ボタン
        // 'core/columns',                // カラム
        // 'core/group',                  // グループ
        // 'core/more',                   // 続きを読む
        // 'core/nextpage',               // ページ区切り
        'core/separator',              // 区切り
        'core/spacer',                 // スペーサー
        // 'core/site-logo',              // サイトロゴ
        // 'core/site-tagline',           // サイトのキャッチフレーズ
        // 'core/site-title',             // サイトのタイトル
        // 'core/query-title',            // アーカイブタイトル
        // 'core/post-terms',             // 投稿カテゴリー & 投稿タグ

        // ウィジェット
        'core/shortcode',              // ショートコード
        // 'core/archives',               // アーカイブ
        // 'core/calendar',               // カレンダー
        // 'core/categories',             // カテゴリー
        'core/html',                   // カスタムHTML
        // 'core/latest-comments',        // 最新のコメント
        // 'core/latest-posts',           // 最新の投稿
        // 'core/page-list',              // 固定ページリスト
        // 'core/rss',                    // RSS
        // 'core/social-links',           // ソーシャルアイコン
        // 'core/tag-cloud',              // タグクラウド
        // 'core/search',                 // 検索

        // テーマ
        // 'core/query',                  // クエリーループ & 投稿一覧
        // 'core/post-title',             // 投稿タイトル
        // 'core/post-content',           // 投稿コンテンツ
        // 'core/post-date',              // 投稿日
        // 'core/post-excerpt',           // 投稿の抜粋
        // 'core/post-featured-image',    // 投稿のアイキャッチ
        // 'core/loginout',               // ログイン / ログアウト

        // 埋め込み
        'core/embed',                  // Embed

        // 再利用ブロック
        // 'core/block',                  // 再利用ブロック

    ];
    return $allowed_block_types;
}, 10, 2);

// Guteberg embed部分をjsで制御
add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_script('remove-block', get_template_directory_uri() . '/assets/js/remove-block.js', array(), false, true);
});


/**　
 * 管理画面
 * ------------------------------
 */

//【ログインロゴ】
//  ----------------------------------------
function custom_login_logo()
{
    echo '<style type="text/css">h1 a { background: url(' . get_template_directory_uri() . '/images/login-logo.png) no-repeat center center !important; }</style>';
}
add_action('login_head', 'custom_login_logo');


//   管理画面サイドメニュー
//  ----------------------------------------
//【管理画面】左メニューadmin以外表示しない
function remove_menu()
{
    remove_menu_page('edit.php'); // 投稿
    remove_menu_page('edit-comments.php'); // コメント
    if (!current_user_can('administrator')) {
        //remove_menu_page('index.php'); // ダッシュボード
        //remove_menu_page('edit.php?post_type=news'); // ポストタイプ
        remove_menu_page('upload.php'); // メディア
        //remove_menu_page('link-manager.php'); // リンク
        //remove_menu_page('edit.php?post_type=page'); // 固定ページ
        //remove_menu_page('themes.php'); // 概観
        //remove_menu_page('plugins.php'); // プラグイン
        //remove_menu_page('users.php'); // ユーザー
        remove_menu_page('tools.php'); // ツール
        //remove_menu_page('options-general.php'); // 設定
        remove_menu_page('wpcf7');   //Contact Form 7
    }
}
add_action('admin_menu', 'remove_menu');


//   メニューの「ダッシュボード」項目を非表示にする
//  ----------------------------------------

function example_remove_dashboard_widgets()
{
    if (!current_user_can('administrator')) {
        global $wp_meta_boxes;
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // 現在の状況
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // 最近のコメント
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // 被リンク
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // プラグイン
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']); // アクティビティ
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // クイック投稿
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // 最近の下書き
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPressブログ
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // WordPressフォーラム
    }
}
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');


//【管理画面】admin_bar項目別に表示しない
function mytheme_admin_bar_render()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('updates');
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('new-content');
    $wp_admin_bar->remove_node('wp-logo');
}
add_action('wp_before_admin_bar_render', 'mytheme_admin_bar_render');


//【管理画面】右サイドのヘルプ非表示
function disable_help_link()
{
    echo '<style type="text/css">#contextual-help-link-wrap {display: none !important;}</style>';
}
add_action('admin_head', 'disable_help_link');



//   管理画面カラム幅
//  ----------------------------------------
add_action('admin_head', 'column_width');
function column_width()
{
    echo '<style type="text/css">
        .column-cars_number { width:100px !important; overflow:hidden }
        .column-cars_loan__price { width:80px !important; overflow:hidden }
        .column-cars_img { width:60px !important; overflow:hidden }
        .column-cars_status { width:120px !important; overflow:hidden }
        .column-cars_store { width:60px !important; overflow:hidden }
        .column-cars_update { width:140px !important; overflow:hidden }
        .column-modified_date { width:140px !important; overflow:hidden }
        </style>';
}






/**
 * 出力テンプレ
 ** ------------------------------
 */

//    ページネーション
//  ----------------------------------------
function show_page_number()
{
    global $wp_query;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    echo $paged;
}


//    テキスト出力
//  ----------------------------------------

//続きを読む
function hacca_continue_reading_link()
{
    return ' <a href="' . get_permalink() . '" class="readmore">続きを読む</a>';
}
function hacca_auto_excerpt_more($more)
{
    return ' &hellip;' . hacca_continue_reading_link();
}
add_filter('excerpt_more', 'hacca_auto_excerpt_more');

//excerpt文字数
function char_length()
{
    return 50;
}
add_filter('excerpt_mblength', 'char_length');


//本文文字数出力 $lengthには任意の出力したい文字数を入れる
//php echo title_character_limit(40);
function character_limit($length)
{
    global $post;
    $content_f = get_the_content();
    $content_f = strip_tags($content_f);
    if (mb_strlen($content_f, 'utf-8') > $length) {
        $content_f = mb_substr(strip_tags($content_f), 0, $length, 'utf-8') . '…' . '<a href="' . get_permalink() . '" class="btn  btn-md"> 続きを読む</a>';
    }
    return $content_f;
}

//タイトル文字数出力 $lengthには任意の出力したい文字数を入れる
function title_character_limit($ttl_length)
{
    global $post;
    $title_f = get_the_title();
    if (mb_strlen($title_f, 'utf-8') > $ttl_length) {
        $title_f = mb_substr(strip_tags($title_f), 0, $ttl_length, 'utf-8') . '…';
    }
    return $title_f;
}


//    term出力
//  ----------------------------------------

//termのリンクなし出力
function get_the_term_list_nolink($id = 0, $taxonomy, $before = '', $sep = '', $after = '')
{
    $terms = get_the_terms($id, $taxonomy);
    if (is_wp_error($terms))
        return $terms;
    if (empty($terms))
        return false;
    foreach ($terms as $term) {
        $term_names[] =  $term->name;
    }
    return $before . join($sep, $term_names) . $after;
}



//    画像出力
//  ----------------------------------------

//attachment リンクのページ404
add_action('template_redirect', 'attachment404');
function attachment404()
{
    if (is_attachment()) {
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
    }
}


//wp_get_archivesにクラスを指定（lightbox的なことに必要）
function my_archives_link($link_html)
{
    $link_html = preg_replace('@<li>@i', '<li class="archives_link">', $link_html);
    return $link_html;
}
add_filter('get_archives_link', 'my_archives_link');


//記事内の画像リンクaタグにdata属性
function linkclass_filter($content)
{
    global $post;
    preg_match_all('/<a.*?<\/a>/i', $content, $matches, PREG_SET_ORDER);
    foreach ($matches as $def_link) {
        $link = $def_link[0];
        if (preg_match('/<a.*?href=[\'"]([^\'"]+)\.(bmp|gif|jpeg|jpg|png)[\'"].*?>/i', $link)) { //リンク先が画像のとき
            $linkrel = ' data-fancybox="gallery-' . $post->ID . '"'; //data属性
            $link = preg_replace('/<a(.*?)>/i', '<a $1' . $linkrel . '>', $link); //aタグにcdata属性
        } else {
            $linkrel = '';
        }
        $link = str_replace(array('#p#', '#a#'), array('.', 'a'), $link); //エスケープ解除
        $content = str_replace($def_link[0], $link, $content);
    }
    return $content;
}
add_filter('the_content', 'linkclass_filter');





// require_once locate_template('modules/fun_java-css.php');				//	CSS & Javascriptの読み込み
//　require_once locate_template('modules/fun_output-ext.php');				//	テキストなどの出力回り
require_once locate_template('modules/fun_posttype.php');                //	ポストタイプ
require_once locate_template('modules/fun_getpost.php');                //	pre_get_post
//　require_once locate_template('modules/fun_admin.php');				//	管理画面関係
//　require_once locate_template('modules/fun_plugins.php');				//	プラグイン関係
//　require_once locate_template('modules/fun_other.php');				//	その他の設定




/**
 * ContactFOrm7
 ** ------------------------------
 */

//Contactform head 出力
function wpcf7_file_control()
{
    add_filter("wpcf7_load_js", "__return_false");
    add_filter("wpcf7_load_css", "__return_false");
    if (is_page(array('mail', 'purchaseform', 'rentacarform', 'rentacar_delivery__form', 'formtest'))) {
        if (function_exists("wpcf7_enqueue_scripts")) wpcf7_enqueue_scripts();
        if (function_exists("wpcf7_enqueue_styles")) wpcf7_enqueue_styles();
    }
}
add_action("template_redirect", "wpcf7_file_control");


//コンタクトフォームemailチェック[email* your-email_confirm]
add_filter('wpcf7_validate_email', 'wpcf7_text_validation_filter_extend', 11, 2);
add_filter('wpcf7_validate_email*', 'wpcf7_text_validation_filter_extend', 11, 2);
function wpcf7_text_validation_filter_extend($result, $tag)
{
    $type = $tag['type'];
    $name = $tag['name'];
    $_POST[$name] = trim(strtr((string) $_POST[$name], "\n", " "));
    if ('email' == $type || 'email*' == $type) {
        if (preg_match('/(.*)_confirm$/', $name, $matches)) {
            $target_name = $matches[1];
            if ($_POST[$name] != $_POST[$target_name]) {
                if (method_exists($result, 'invalidate')) {
                    $result->invalidate($tag, "確認用のメールアドレスが一致していません");
                } else {
                    $result['valid'] = false;
                    $result['reason'][$name] = '確認用のメールアドレスが一致していません';
                }
            }
        }
    }
    return $result;
}





/**
 * 独自関数
 ** ------------------------------
 */

//固定ページのパーマリンクを.htmlに
add_action('init', 'permalink_html');
if (!function_exists('permalink_html')) {
    function permalink_html()
    {
        global $wp_rewrite;
        $wp_rewrite->use_trailing_slashes = false;
        $wp_rewrite->page_structure = $wp_rewrite->root . '%pagename%.html';
    }
}


//偶数番目の記事に○○○する
function is_even_post()
{
    global $wp_query;
    return ((($wp_query->current_post + 1) % 2) === 0);
}


//スマートフォンを判別
function is_mobile()
{
    $useragents = array(
        'iPhone', // iPhone
        'iPod', // iPod touch
        'Android.*Mobile', // 1.5+ Android *** Only mobile
        'Windows.*Phone', // *** Windows Phone
        'dream', // Pre 1.5 Android
        'CUPCAKE', // 1.5+ Android
        'blackberry9500', // Storm
        'blackberry9530', // Storm
        'blackberry9520', // Storm v2
        'blackberry9550', // Storm v2
        'blackberry9800', // Torch
        'webOS', // Palm Pre Experimental
        'incognito', // Other iPhone browser
        'webmate' // Other iPhone browser
    );
    $pattern = '/' . implode('|', $useragents) . '/i';
    return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

//price DB取得
function my_get_price($price) {
	global $wpdb;
    $table_name = $wpdb->prefix . 'split_price';  // カスタムテーブル名
	$prices = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE price = %d", $price));
	if (is_null($prices)) {
		return null;
	}
		return $prices;
}
/**
 * Retrieve car price details including total price, installment terms, and payment breakdown.
 *
 * This function fetches car-related pricing data from post meta fields and calculates the total price.
 * Additionally, it formats the price details and provides a flag to indicate whether installment payments
 * are available based on the installment term provided.
 *
 * @param int $post_id The ID of the post containing car price data.
 *
 * @return array An associative array containing the following keys:
 *               - 'totalprice' (int): The total price calculated from body price and additional expenses.
 *               - 'installment' (string): The installment term as saved in post meta (e.g., '12times', '0times').
 *               - 'prices' (object): Formatted price details returned by the `my_get_price` function.
 *               - 'installment_valid' (bool): A boolean flag indicating if installment payments are available.
 *                 Returns `false` if 'installment' is '0times', otherwise `true`.
 */
function get_car_price_details($post_id) {
    // 車の価格に関するメタフィールドを取得
    $cars_bodyprice = get_post_meta($post_id, 'car_price__group_cars_bodyprice', true);
    $cars_price__expenses = get_post_meta($post_id, 'car_price__group_cars_price__expenses', true);
    $cars_price__installment = get_post_meta($post_id, 'car_price__group_cars_price__installment', true);

    // 総額を計算
    $cars_totalprice = (int)$cars_bodyprice * 10000 + (int)$cars_price__expenses;

    // フォーマットされた価格を取得
    $prices = my_get_price($cars_totalprice);

    // $cars_price__installment が '0times' かどうかをチェック
    $installment_valid = $cars_price__installment !== '0times';

    // 配列で価格情報とinstallmentの状態を返す
    return [
        'bodyprice' => $cars_bodyprice,
        'totalprice' => $cars_totalprice,
        'installment' => $cars_price__installment,
        'prices' => $prices,
        'installment_valid' => $installment_valid // 追加フラグ
    ];
}


//カスタムフィールドの値を自動更新
add_action('save_post', 'action_save_post', 99, 2);
function action_save_post($post_id, $post)
{
    remove_action('save_post', 'action_save_post', 99);
    if (!empty($_POST)) {
        $car_price__group = get_field('car_price__group');
        $cars_bodyprice = $car_price__group['cars_bodyprice'];
        $cars_price__expenses = $car_price__group['cars_price__expenses'];
        $cars_totalprice = (int)$cars_bodyprice*10000 + (int)$cars_price__expenses;
        // $cars_price__60times = $car_price__group['cars_price__60times'];
        $cars_price_installment = $car_price__group['cars_price__installment'];
        $cars_loan__price = "";

        $prices = my_get_price($cars_totalprice);

        if ($prices) {
        if($cars_price_installment === '48times'){
            $cars_loan__price = $prices->{'48times'}?? '0000';
        }elseif($cars_price_installment == '60times'){
            $cars_loan__price = $prices->{'60times'}?? '0000';
        }elseif($cars_price_installment == '72times'){
            $cars_loan__price = $prices->{'72times'}?? '0000';
        }elseif($cars_price_installment == '84times'){
            $cars_loan__price = $prices->{'84times'}?? '0000';
        }
        //global $post;
        update_post_meta($post_id, 'cars_loan__price',  $cars_loan__price);
        //wp_update_post($post);
    }
    }
     // アクションを再度追加
     add_action('save_post', 'action_save_post', 99, 2);
}
// 管理画面にカスタムアクションを追加
add_action('admin_menu', 'custom_admin_menu');

function custom_admin_menu() {
    add_menu_page('一括更新', '一括更新', 'manage_options', 'custom_bulk_update', 'custom_bulk_update_page');
}

function custom_bulk_update_page() {
    if (isset($_POST['bulk_update'])) {
        custom_update_cars_loan_price();
    }
    echo '<h1>一括更新ページ</h1>';
    echo '<form method="post">';
    echo '<input type="submit" name="bulk_update" value="cars_loan__priceを一括更新">';
    echo '</form>';
}

function custom_update_cars_loan_price() {
    // 投稿をループで取得して更新
    $offset = 0;
    $batch_size = 100; // 1回に処理する投稿数
    $args = array(
        'post_type' => 'cars',
        'posts_per_page' => $batch_size,
        'offset' => $offset
    );

    while ($posts = get_posts($args)) {

        foreach ($posts as $post) {
            // カスタムフィールドの値を取得して新しい値を計算
            $car_bodyprice = get_post_meta($post->ID, 'car_price__group_cars_bodyprice', true);
            $car_expenses = get_post_meta($post->ID, 'car_price__group_cars_price__expenses', true);
            $car_installment = get_post_meta($post->ID, 'car_price__group_cars_price__installment', true);

            if (!empty($car_bodyprice) && !empty($car_expenses)) {
                // 新しい値を計算（例：car_bodyprice * 1000 + car_expenses）
                $new_loan_price = (int)$car_bodyprice * 10000 + (int)$car_expenses;
                $prices = my_get_price($new_loan_price);

                if($car_installment === 'non'){
                    $cars_loan__price = $prices->{'48times'}?? '0000';
                }elseif($car_installment == '60times'){
                    $cars_loan__price = $prices->{'60times'}?? '0000';
                }elseif($car_installment == '72times'){
                    $cars_loan__price = $prices->{'72times'}?? '0000';
                }elseif($car_installment == '84times'){
                    $cars_loan__price = $prices->{'84times'}?? '0000';
                }

                // cars_loan__price を更新
                update_post_meta($post->ID, 'cars_loan__price', $cars_loan__price);
        }
    }
     // 次のバッチを取得
     $offset += $batch_size;
     $args['offset'] = $offset;
 }
    echo '<p>cars_loan__priceを一括更新しました！</p>';
}

// add_action('save_post', 'action_save_post', 99, 2);
// function action_save_post($post_id, $post)
// {
//     if (!empty($_POST)) {
//         $car_price__group = get_field('car_price__group');
//         $cars_bodyprice = $car_price__group['cars_bodyprice'];
//         $cars_bodyprice = $car_price__group['cars_bodyprice'] . '0000';
//         $cars_price__expenses = $car_price__group['cars_price__expenses'];
//         $cars_totalprice = $cars_bodyprice + $cars_price__expenses;
//         $cars_price__60times = $car_price__group['cars_price__60times'];
//         $cars_loan__price = "";
//         if ($cars_totalprice === 100000) {
//             $cars_loan__price = '3600';
//         } elseif ($cars_totalprice === 150000) {
//             $cars_loan__price = '5400';
//         } elseif ($cars_totalprice === 200000) {
//             $cars_loan__price = '7200';
//         } elseif ($cars_totalprice === 250000) {
//             $cars_loan__price = '9000';
//         } elseif ($cars_totalprice === 300000) {
//             $cars_loan__price = '9900';
//         } elseif ($cars_totalprice === 350000) {
//             $cars_loan__price = '10200';
//         } elseif ($cars_totalprice === 400000) {
//             $cars_loan__price = '11700';
//         } elseif ($cars_totalprice === 450000) {
//             $cars_loan__price = '13200';
//         } elseif ($cars_totalprice === 500000) {
//             $cars_loan__price = '14600';
//         } elseif ($cars_totalprice === 550000) {
//             $cars_loan__price = '16100';
//         } elseif ($cars_totalprice === 600000) {
//             $cars_loan__price = '17600';
//         } elseif ($cars_totalprice === 650000) {
//             $cars_loan__price = '19000';
//         } elseif ($cars_totalprice === 700000) {
//             $cars_loan__price = '20500';
//         } elseif ($cars_totalprice === 750000) {
//             $cars_loan__price = '22000';
//         } elseif ($cars_totalprice === 800000) {
//             $cars_loan__price = '23500';
//         } elseif ($cars_totalprice === 850000) {
//             $cars_loan__price = '24900';
//         } elseif ($cars_totalprice === 900000) {
//             $cars_loan__price = '26400';
//         } elseif ($cars_totalprice === 950000) {
//             $cars_loan__price = '27900';
//         } elseif ($cars_totalprice === 1000000) {
//             $cars_loan__price = '29300';
//         } elseif ($cars_totalprice === 1050000) {
//             $cars_loan__price = '30800';
//         } elseif ($cars_totalprice === 1100000) {
//             $cars_loan__price = '32300';
//         } elseif ($cars_totalprice === 1150000) {
//             $cars_loan__price = '33700';
//         } elseif ($cars_totalprice === 1200000) {
//             $cars_loan__price = '35200';
//         } elseif ($cars_totalprice === 1250000) {
//             $cars_loan__price = '36700';
//         } elseif ($cars_totalprice === 1300000) {
//             $cars_loan__price = '38100';
//         } elseif ($cars_totalprice === 1350000) {
//             $cars_loan__price = '39600';
//         } elseif ($cars_totalprice === 1400000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '41100';
//             } else {
//                 $cars_loan__price = '35500';
//             }
//         } elseif ($cars_totalprice === 1450000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '42500';
//             } else {
//                 $cars_loan__price = '36800';
//             }
//         } elseif ($cars_totalprice === 1500000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '44000';
//             } else {
//                 $cars_loan__price = '38000';
//             }
//         } elseif ($cars_totalprice === 1550000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '45500';
//             } else {
//                 $cars_loan__price = '39300';
//             }
//         } elseif ($cars_totalprice === 1600000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '47000';
//             } else {
//                 $cars_loan__price = '40600';
//             }
//         } elseif ($cars_totalprice === 1650000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '48400';
//             } else {
//                 $cars_loan__price = '41800';
//             }
//         } elseif ($cars_totalprice === 1700000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '49900';
//             } else {
//                 $cars_loan__price = '43100';
//             }
//         } elseif ($cars_totalprice === 1750000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '51400';
//             } else {
//                 $cars_loan__price = '44400';
//             }
//         } elseif ($cars_totalprice === 1800000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '52800';
//             } else {
//                 $cars_loan__price = '45700';
//             }
//         } elseif ($cars_totalprice === 1850000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '54300';
//             } else {
//                 $cars_loan__price = '46900';
//             }
//         } elseif ($cars_totalprice === 1900000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '55800';
//             } else {
//                 $cars_loan__price = '48200';
//             }
//         } elseif ($cars_totalprice === 1950000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '57200';
//             } else {
//                 $cars_loan__price = '49500';
//             }
//         } elseif ($cars_totalprice === 2000000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '58700';
//             } else {
//                 $cars_loan__price = '50700';
//             }
//         } elseif ($cars_totalprice === 2050000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '60200';
//             } else {
//                 $cars_loan__price = '52000';
//             }
//         } elseif ($cars_totalprice === 2100000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '61600';
//             } else {
//                 $cars_loan__price = '53300';
//             }
//         } elseif ($cars_totalprice === 2150000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '63100';
//             } else {
//                 $cars_loan__price = '54500';
//             }
//         } elseif ($cars_totalprice === 2200000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '64600';
//             } else {
//                 $cars_loan__price = '55800';
//             }
//         } elseif ($cars_totalprice === 2250000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '66000';
//             } else {
//                 $cars_loan__price = '57100';
//             }
//         } elseif ($cars_totalprice === 2300000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '67500';
//             } else {
//                 $cars_loan__price = '58400';
//             }
//         } elseif ($cars_totalprice === 2350000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '69000';
//             } else {
//                 $cars_loan__price = '59600';
//             }
//         } elseif ($cars_totalprice === 2400000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '70500';
//             } else {
//                 $cars_loan__price = '60900';
//             }
//         } elseif ($cars_totalprice === 2450000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '71900';
//             } else {
//                 $cars_loan__price = '62200';
//             }
//         } elseif ($cars_totalprice === 2500000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '73400';
//             } else {
//                 $cars_loan__price = '63400';
//             }
//         } elseif ($cars_totalprice === 2550000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '74900';
//             } else {
//                 $cars_loan__price = '64700';
//             }
//         } elseif ($cars_totalprice === 2600000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '76300';
//             } else {
//                 $cars_loan__price = '66000';
//             }
//         } elseif ($cars_totalprice === 2650000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '77800';
//             } else {
//                 $cars_loan__price = '67200';
//             }
//         } elseif ($cars_totalprice === 2700000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '79300';
//             } else {
//                 $cars_loan__price = '68500';
//             }
//         } elseif ($cars_totalprice === 2750000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '80700';
//             } else {
//                 $cars_loan__price = '69800';
//             }
//         } elseif ($cars_totalprice === 2800000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '82200';
//             } else {
//                 $cars_loan__price = '71100';
//             }
//         } elseif ($cars_totalprice === 2850000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '83700';
//             } else {
//                 $cars_loan__price = '72300';
//             }
//         } elseif ($cars_totalprice === 2900000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '85100';
//             } else {
//                 $cars_loan__price = '73600';
//             }
//         } elseif ($cars_totalprice === 2950000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '86600';
//             } else {
//                 $cars_loan__price = '74900';
//             }
//         } elseif ($cars_totalprice >= 3000000) {
//             if ($cars_price__60times) {
//                 $cars_loan__price = '88100';
//             } else {
//                 $cars_loan__price = '76100';
//             }
//         }
//         update_post_meta($post_id, 'cars_loan__price',  $cars_loan__price);
//     }
// }

add_filter('next_posts_link_attributes', 'add_next_posts_link_class');
function add_next_posts_link_class()
{
    return 'class="next view-more-button"';
}


//  整形
//  ----------------------------------------
function clfn_desc($string)
{
    $string = stripslashes($string);
    $string = strip_tags($string);
    $string = str_replace(array("&nbsp;", "\r\n", "\r", "\n", "　"), '', $string);
    return trim($string);
}



//家電ページ関係
function init_session_start()
{

    // セッションが開始されていなければここで開始
    if (session_status() !== PHP_SESSION_ACTIVE) {

        session_start();
    }
}

add_action('init', 'init_session_start');
function set_org_query_vars($query_vars)
{
    $query_vars[] = 'category';        // 独自のパラメータ p1を配列最後尾に追加する。
    return $query_vars;
}
add_filter('query_vars', 'set_org_query_vars');

function add_files()
{
    $day = date("His");
    if (is_page(array('page-scrapped', 'product_list'))) {
        wp_enqueue_style('challenge', get_template_directory_uri() . '/assets/css/style-scrap.css?' . $day);
    } elseif (is_page(array('manufacturer' , '15')) || is_front_page()) {
        wp_enqueue_style('manufacturer', get_template_directory_uri() . '/dist/dist.css?' . $day);
    }
}
add_action('wp_enqueue_scripts', 'add_files');


//店舗電話番号グローバル:$GLOBALS['shop_gloval_var']['tokyo']['tel']
function shop_setup()
{
    global $shop_gloval_var;
    $shop_gloval_var = array(
        'fukuoka' => array('tel' => '0120038871', 'tel-' => '0120-038-871', 'fax' => '0924105912', 'fax-' => '092-410-5912', 'rentcar' => '0924107620', 'rentcar-' => '092-410-7620', 'guidance' => '(ガイダンス後2番)', 'address' => '福岡県糟屋郡粕屋町戸原西4丁目8-11'),
        'osaka' => array('tel' => '0722907729', 'tel-' => '072-290-7729', 'fax' => '0722907699', 'fax-' => '072-290-7699', 'address' => '大阪府堺市美原区小寺459番1'),
        'tokyo' => array('tel' => '0120038871', 'tel-' => '0120-038-871', 'fax' => '0474099819', 'fax-' => '047-409-9819', 'rentcar' => '0474099818', 'rentcar-' => '047-409-9818', 'guidance' => '(ガイダンス後1番)', 'address' => '千葉県八千代市勝田台南3丁目21-7'),
        'kaden' => array('tel' => '0929388871', 'tel-' => '092-938-8871')
    );
}
add_action('after_setup_theme', 'shop_setup');

//////////////////////////////////////////////////////////////////////////
add_action('pre_get_posts', function ($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_post_type_archive('cars')) {
        $query->set('post_status', 'publish');
    }
});


//////////////////////////////////////////////////////////////////////////
add_action('admin_init', 'bulk_set_cars_loan_price_for_multiple_post_types');
/**
 * 複数の投稿タイプで cars_loan__price を一括更新
 */
function bulk_set_cars_loan_price_for_multiple_post_types() {
    // 管理者権限を確認
    if (!current_user_can('manage_options')) {
        return;
    }

    // 実行を一度だけに制限（クエリパラメータで制御）
    if (!isset($_GET['bulk_update_cars_price'])) {
        return;
    }

    // 対象の投稿タイプ
    $allowed_post_types = ['jimnys', 'specials']; // 必要に応じて投稿タイプを追加

    global $wpdb;
    $post_types_sql = "'" . implode("','", array_map('esc_sql', $allowed_post_types)) . "'";
    $posts = $wpdb->get_results("SELECT ID FROM $wpdb->posts WHERE post_type IN ($post_types_sql) AND post_status = 'publish'");

    foreach ($posts as $post) {
        $post_id = $post->ID;
        $loan_price = get_post_meta($post_id, 'cars_loan__price', true);
            $body_price = get_post_meta($post_id, 'car_price__group_cars_bodyprice', true);
            $new_price = $body_price.'0000';
            if (!empty($new_price)) {
                $clean_price = (float) str_replace([',', '¥'], '', $new_price);
                update_post_meta($post_id, 'cars_loan__price', $clean_price);
            }
    }

    // 更新完了メッセージ
    wp_die('一括更新が完了しました。');
}