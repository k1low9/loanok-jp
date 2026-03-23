<?php

//   ---------------------------------------
//    カスタムポストタイプ
//  ----------------------------------------


// ------ news posttype---------//
add_action( 'init', 'create_post_type_news' );
function create_post_type_news() {
    $args = array(
        'label' => 'お知らせ',
        'labels' => array(
            'singular_name' => 'お知らせ',
            'menu_name' => 'お知らせ',
            'add_new_item' => 'の新規作成',
            'add_new' => '新規作成',
            'new_item' => '新規作成',
            'view_item' => 'お知らせを表示',
            'not_found' => '見つかりません',
            'not_found_in_trash' => 'ゴミ箱にはありません',
            'search_items' => '検索',
        ),
        'public' => true,
        'show_ui' => true,
        'query_var' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'news', 'with_front' =>false ),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-rss',
        'supports' => array('title','editor','thumbnail','revisions'),
        'has_archive' => true,
        'show_in_rest' => true,
    );
    register_post_type('news', $args);
}


// ------ cars posttype---------//
add_action( 'init', 'create_post_type_cars' );
function create_post_type_cars() {
    $args = array(
        'label' => '車両',
        'labels' => array(
            'singular_name' => '車両',
            'menu_name' => '車両一覧',
            'add_new_item' => '車両の新規作成',
            'add_new' => '新規作成',
            'new_item' => '新規作成',
            'view_item' => '車両を表示',
            'not_found' => '見つかりません',
            'not_found_in_trash' => 'ゴミ箱にはありません',
            'search_items' => '検索',
        ),
        'public' => true,
        'show_ui' => true,
        'query_var' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'cars', 'with_front' =>false ),
        'menu_position' => 6,
        'menu_icon' => 'dashicons-car',
        'supports' => array('title','editor','revisions','author'),
        'has_archive' => true,
        'show_in_rest' => false,
    );
    register_post_type('cars', $args);
}

// ------ car category ---------//
$args = array(
    'label' => '種類',
    'labels' => array(
        'name' => '種類',
        'singular_name' => '種類',
        'search_items' => '種類を検索',
        'popular_items' => 'よく使われている種類',
        'all_items' => 'すべての種類',
        'parent_item' => '親種類',
        'edit_item' => '種類の編集',
        'update_item' => '更新',
        'add_new_item' => '新規種類を追加',
        'new_item_name' => '新しい種類',
    ),
    'public' => true,
    'show_ui' => true,
    'hierarchical' => true,
    'rewrite' => array(true, 'with_front' => false),
    'show_in_rest' => false,
    'capabilities' => array(
        'assign_terms' => 'edit_others_posts',
        'edit_terms' => 'edit_others_posts'
    )
);
register_taxonomy('cars_categorys', ['cars','jimnys','specials'], $args);


// ------ rentacar posttype---------//
add_action( 'init', 'create_post_type_rentacar' );
function create_post_type_rentacar() {
    $args = array(
        'label' => 'レンタカー',
        'labels' => array(
            'singular_name' => 'レンタカー',
            'menu_name' => 'レンタカー',
            'add_new_item' => 'レンタカーの新規作成',
            'add_new' => '新規作成',
            'new_item' => '新規作成',
            'view_item' => 'レンタカーを表示',
            'not_found' => '見つかりません',
            'not_found_in_trash' => 'ゴミ箱にはありません',
            'search_items' => '検索',
        ),
        'public' => true,
        'show_ui' => true,
        'query_var' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'rentacar', 'with_front' =>false ),
        'menu_position' => 6,
        'menu_icon' => 'dashicons-car',
        'supports' => array('title','editor','thumbnail'),
        'has_archive' => true,
        'show_in_rest' => false,
    );
    register_post_type('rentacar', $args);
}

// ------ rentacar category ---------//
$args = array(
    'label' => '種類',
    'labels' => array(
        'name' => '種類',
        'singular_name' => '種類',
        'search_items' => '種類を検索',
        'popular_items' => 'よく使われている種類',
        'all_items' => 'すべての種類',
        'parent_item' => '親種類',
        'edit_item' => '種類の編集',
        'update_item' => '更新',
        'add_new_item' => '新規種類を追加',
        'new_item_name' => '新しい種類',
    ),
    'public' => true,
    'show_ui' => true,
    'hierarchical' => true,
    'rewrite' => array(true, 'with_front' => false),
    'show_in_rest' => false,
    'capabilities' => array(
        'assign_terms' => 'edit_others_posts',
        'edit_terms' => 'edit_others_posts'
    )
);
register_taxonomy('rentacar_cat', 'rentacar', $args);


//   ---------------------------------------
//    カスタムポストタイプ設定
//  ----------------------------------------


//管理画面の一覧にタクソノミー表示
// 管理画面の一覧にカスタム列を追加
function manage_cars_posts_columns( $columns ) {
    // カラムを追加または置き換える
    $columns = array(
        'cb'                => '<input type="checkbox" />',
        'title'             => '車名',
        'cars_number'       => '物件番号',
        'cars_img'          => '画像',
        'cars_loan__price'  => '分割価格',
        'cars_status'       => '販売ステータス',
        'cars_update'       => '登録日',
        'cars_store'        => '販売店',
        'modified_date'     => '最終更新日',
    );
    return $columns;
}

// カスタム列に表示するデータ
function add_column_cars( $column_name, $post_id ) {
    switch ( $column_name ) {
        case 'cars_number':
            $cars_store = get_field_object( 'cars_store', $post_id );
            $cars_store_value = $cars_store['value'] ?? '';
            $cars_item_number = get_field( 'cars_itemnumber', $post_id );

            if ( $cars_store_value === '1' ) {
                echo 'FU' . esc_html( $cars_item_number );
            } elseif ( $cars_store_value === '2' ) {
                echo 'OS' . esc_html( $cars_item_number );
            } elseif ( $cars_store_value === '3' ) {
                echo 'TK' . esc_html( $cars_item_number );
            }
            break;

        case 'cars_img':
            $car_img_group = get_field( 'car_img__group', $post_id );
            $attachment_id = $car_img_group['car_img1'] ?? null;
            if ( $attachment_id ) {
                echo wp_get_attachment_image( $attachment_id, 'thumbnail', false, [ 'style' => 'width:60px;height:auto;' ] );
            } else {
                echo '画像なし';
            }
            break;

        case 'cars_status':
            $cars_status = get_field( 'cars_status', $post_id );
            echo esc_html( $cars_status === 'on' ? '販売中' : '売り切れ' );
            break;

        case 'cars_update':
            $cars_update = get_field( 'cars_update', $post_id );
            if ( $cars_update ) {
                $date = new DateTime( $cars_update );
                echo esc_html( $date->format( 'Y年m月d日' ) );
            }
            break;

        case 'cars_loan__price':
            $cars_loan_price = get_field( 'cars_loan__price', $post_id );
            echo esc_html( $cars_loan_price );
            break;

        case 'cars_store':
            $cars_store = get_field_object( 'cars_store', $post_id );
            $cars_store_value = $cars_store['value'] ?? '';
            $store_names = [
                '1' => '福岡店',
                '2' => '大阪店',
                '3' => 'TOKYO店',
            ];
            echo esc_html( $store_names[ $cars_store_value ] ?? '不明な店舗' );
            break;

        case 'modified_date':
            echo esc_html( get_the_modified_date( 'Y年m月d日 g:i', $post_id ) );
            break;
    }
}

// 投稿タイプごとにカラムを適用
function add_custom_columns_for_post_types() {
    $post_types = [ 'cars', 'jimnys', 'specials' ]; // 適用したい投稿タイプを追加

    foreach ( $post_types as $post_type ) {
        // カラム設定をカスタマイズ
        add_filter( "manage_{$post_type}_posts_columns", 'manage_cars_posts_columns' );

        // カラムに表示するデータをカスタマイズ
        add_action( "manage_{$post_type}_posts_custom_column", 'add_column_cars', 10, 2 );
    }
}
add_action( 'admin_init', 'add_custom_columns_for_post_types' ); // init を admin_init に変更



//   ---------------------------------------
//    カスタムポストタイプ 並び替え
//  ----------------------------------------

function cars_sort__carnumber($columns){
		$columns['cars_number'] = '物件番号';
		return $columns;
}
function cars_sortby__carnumber( $query ) {
		if ( $query->is_main_query() && ( $orderby = $query->get( 'orderby' ) ) ) {
				switch( $orderby ) {
						case '物件番号':
								$query->set( 'meta_key', 'cars_itemnumber' );
								$query->set( 'orderby', 'meta_value' );
								break;
				}
		}
}
add_filter( 'manage_edit-cars_sortable_columns', 'cars_sort__carnumber');
add_action( 'pre_get_posts', 'cars_sortby__carnumber', 1 );


function cars_sort__status($columns){
		$columns['cars_status'] = '販売ステータス';
		return $columns;
}
function cars_sortby__status( $query ) {
		if ( $query->is_main_query() && ( $orderby = $query->get( 'orderby' ) ) ) {
				switch( $orderby ) {
						case '販売ステータス':
								$query->set( 'meta_key', 'cars_status' );
								$query->set( 'orderby', 'meta_value' );
								break;
				}
		}
}
add_filter( 'manage_edit-cars_sortable_columns', 'cars_sort__status');
add_action( 'pre_get_posts', 'cars_sortby__status', 1 );


function cars_sort__update($columns){
		$columns['cars_update'] = '登録日';
		return $columns;
}
function cars_sortby__carsupdate( $query ) {
		if ( $query->is_main_query() && ( $orderby = $query->get( 'orderby' ) ) ) {
				switch( $orderby ) {
						case '登録日':
								$query->set( 'meta_key', 'cars_update' );
								$query->set( 'orderby', 'meta_value' );
								break;
				}
		}
}
add_filter( 'manage_edit-cars_sortable_columns', 'cars_sort__update');
add_action( 'pre_get_posts', 'cars_sortby__carsupdate', 1 );


function cars_sort__modifieddate($columns){
		$columns['modified_date'] = '最終更新日';
		return $columns;
}
function cars_sortby__modifieddate( $query ) {
		if ( $query->is_main_query() && ( $orderby = $query->get( 'orderby' ) ) ) {
				switch( $orderby ) {
						case '最終更新日':
								$query->set( 'orderby', 'modified' );
								break;
				}
		}
}
add_filter( 'manage_edit-cars_sortable_columns', 'cars_sort__modifieddate');
add_action( 'pre_get_posts', 'cars_sortby__modifieddate', 1 );




//   ---------------------------------------
//    カスタムポストタイプ共通設定
//  ----------------------------------------

	//   投稿一覧ページ
	//  ----------------------------------------
		//投稿一覧で「絞り込み系」を非表示
			// if (!current_user_can('administrator')) {
			// 	add_filter('months_dropdown_results', '__return_empty_array');
			// 	add_filter( 'bulk_actions-edit-cars', '__return_empty_array' );
			// }

		// 投稿一覧でクイック投稿を非表示
		// add_filter( 'post_row_actions', 'hide_quickedit' );
		// add_filter( 'page_row_actions', 'hide_quickedit' );
		// function hide_quickedit($actions){
		// 	unset($actions['inline hide-if-no-js']);
		// 	return $actions;
		// }



	//   検索結果
	//  ----------------------------------------

			// テンプレート読み込みフィルターをカスタマイズ
			// add_filter('template_include','custom_search_template');
			// function custom_search_template($template){
			// 	// 検索結果の時
			// 	if ( is_search() ) {
			// 		// 表示する投稿タイプを取得
			// 		$post_types = get_query_var('post_type');
			// 		// search-{$post_type}.php の読み込みルールを追加
			// 		foreach ( (array) $post_types as $post_type )
			// 			$templates[] = "search-{$post_type}.php";
			// 		$templates[] = 'search.php';
			// 		$template = get_query_template('search',$templates);
			// 	}
			// 	return $template;
			// }




//---------------------------------------------------------------------------
// 記事投稿(編集)画面に更新レベルのボックス追加
//---------------------------------------------------------------------------

/* ボックス追加 */
if( function_exists( 'thk_post_update_level' ) === false ):
function thk_post_update_level() {
	add_meta_box( 'update_level', '更新方法', 'post_update_level_box', ['cars','jimnys','specials'], 'side', 'default' );
}
add_action( 'admin_menu', 'thk_post_update_level' );
endif;

/* メインフォーム */
if( function_exists( 'post_update_level_box' ) === false ):
function post_update_level_box() {
	global $post;
?>
<div style="padding-top: 5px; overflow: hidden;">
<div style="padding:5px 0"><input name="update_level" type="radio" value="high" checked="checked" />通常更新</div>
<div style="padding: 5px 0"><input name="update_level" type="radio" value="low" />修正のみ(並び順を変更しない)</div>
<div style="padding: 5px 0"><input name="update_level" type="radio" value="del" />更新日時消去(公開日時と同じにする)</div>
<div style="padding: 5px 0; margin-bottom: 10px"><input id="update_level_edit" name="update_level" type="radio" value="edit" />更新日時を手動で変更</div>
<?php
	if( get_the_modified_date( 'c' ) ) {
		$stamp = '更新日時: <span style="font-weight:bold">' . get_the_modified_date( __( 'M j, Y @ H:i' ) ) . '</span>';
	}
	else {
		$stamp = '更新日時: <span style="font-weight:bold">未更新</span>';
	}
	$date = date_i18n( get_option('date_format') . ' @ ' . get_option('time_format'), strtotime( $post->post_modified ) );
?>
<style>
.modtime { padding: 2px 0 1px 0; display: inline !important; height: auto !important; }
.modtime:before { font: normal 20px/1 'dashicons'; content: '\f145'; color: #888; padding: 0 5px 0 0; top: -1px; left: -1px; position: relative; vertical-align: top; }
#timestamp_mod_div { padding-top: 5px; line-height: 23px; }
#timestamp_mod_div p { margin: 8px 0 6px; }
#timestamp_mod_div input { border-width: 1px; border-style: solid; }
#timestamp_mod_div select { height: 21px; line-height: 14px; padding: 0; vertical-align: top;font-size: 12px; }
#aa_mod, #jj_mod, #hh_mod, #mn_mod { padding: 1px; font-size: 12px; }
#jj_mod, #hh_mod, #mn_mod { width: 2em; }
#aa_mod { width: 3.4em; }
</style>
<span class="modtime"><?php printf( $stamp, $date ); ?></span>
<div id="timestamp_mod_div" onkeydown="document.getElementById('update_level_edit').checked=true" onclick="document.getElementById('update_level_edit').checked=true">
<?php thk_time_mod_form(); ?>
</div>
</div>
<?php
}
endif;

/* 更新日時変更の入力フォーム */
if( function_exists( 'thk_time_mod_form' ) === false ):
function thk_time_mod_form() {
	global $wp_locale, $post;

	$tab_index = 0;
	$tab_index_attribute = '';
	if ( (int) $tab_index > 0 ) {
		$tab_index_attribute = ' tabindex="' . $tab_index . '"';
	}

	$jj_mod = mysql2date( 'd', $post->post_modified, false );
	$mm_mod = mysql2date( 'm', $post->post_modified, false );
	$aa_mod = mysql2date( 'Y', $post->post_modified, false );
	$hh_mod = mysql2date( 'H', $post->post_modified, false );
	$mn_mod = mysql2date( 'i', $post->post_modified, false );
	$ss_mod = mysql2date( 's', $post->post_modified, false );

	$year = '<label for="aa_mod" class="screen-reader-text">年' .
		'</label><input type="text" id="aa_mod" name="aa_mod" value="' .
		$aa_mod . '" size="4" maxlength="4"' . $tab_index_attribute . ' autocomplete="off" />年';

	$month = '<label for="mm_mod" class="screen-reader-text">月' .
		'</label><select id="mm_mod" name="mm_mod"' . $tab_index_attribute . ">\n";
	for( $i = 1; $i < 13; $i = $i +1 ) {
		$monthnum = zeroise($i, 2);
		$month .= "\t\t\t" . '<option value="' . $monthnum . '" ' . selected( $monthnum, $mm_mod, false ) . '>';
		$month .= $wp_locale->get_month_abbrev( $wp_locale->get_month( $i ) );
		$month .= "</option>\n";
	}
	$month .= '</select>';

	$day = '<label for="jj_mod" class="screen-reader-text">日' .
		'</label><input type="text" id="jj_mod" name="jj_mod" value="' .
		$jj_mod . '" size="2" maxlength="2"' . $tab_index_attribute . ' autocomplete="off" />日';
	$hour = '<label for="hh_mod" class="screen-reader-text">時' .
		'</label><input type="text" id="hh_mod" name="hh_mod" value="' . $hh_mod .
		'" size="2" maxlength="2"' . $tab_index_attribute . ' autocomplete="off" />';
	$minute = '<label for="mn_mod" class="screen-reader-text">分' .
		'</label><input type="text" id="mn_mod" name="mn_mod" value="' . $mn_mod .
		'" size="2" maxlength="2"' . $tab_index_attribute . ' autocomplete="off" />';

	printf( '%1$s %2$s %3$s @ %4$s : %5$s', $year, $month, $day, $hour, $minute );
	echo '<input type="hidden" id="ss_mod" name="ss_mod" value="' . $ss_mod . '" />';
}
endif;

/* 「修正のみ」は更新しない。それ以外は、それぞれの更新日時に変更する */
if( function_exists( 'thk_insert_post_data' ) === false ):
function thk_insert_post_data( $data, $postarr ){
	$mydata = isset( $_POST['update_level'] ) ? $_POST['update_level'] : null;

	if( $mydata === 'low' ){
		unset( $data['post_modified'] );
		unset( $data['post_modified_gmt'] );
	}
	elseif( $mydata === 'edit' ) {
		$aa_mod = $_POST['aa_mod'] <= 0 ? date('Y') : $_POST['aa_mod'];
		$mm_mod = $_POST['mm_mod'] <= 0 ? date('n') : $_POST['mm_mod'];
		$jj_mod = $_POST['jj_mod'] > 31 ? 31 : $_POST['jj_mod'];
		$jj_mod = $jj_mod <= 0 ? date('j') : $jj_mod;
		$hh_mod = $_POST['hh_mod'] > 23 ? $_POST['hh_mod'] -24 : $_POST['hh_mod'];
		$mn_mod = $_POST['mn_mod'] > 59 ? $_POST['mn_mod'] -60 : $_POST['mn_mod'];
		$ss_mod = $_POST['ss_mod'] > 59 ? $_POST['ss_mod'] -60 : $_POST['ss_mod'];
		$modified_date = sprintf( '%04d-%02d-%02d %02d:%02d:%02d', $aa_mod, $mm_mod, $jj_mod, $hh_mod, $mn_mod, $ss_mod );
		if ( ! wp_checkdate( $mm_mod, $jj_mod, $aa_mod, $modified_date ) ) {
			unset( $data['post_modified'] );
			unset( $data['post_modified_gmt'] );
			return $data;
		}
		$data['post_modified'] = $modified_date;
		$data['post_modified_gmt'] = get_gmt_from_date( $modified_date );
	}
	elseif( $mydata === 'del' ) {
		$data['post_modified'] = $data['post_date'];
	}
	return $data;
}
add_filter( 'wp_insert_post_data', 'thk_insert_post_data', 10, 2 );
endif;


//   ---------------------------------------
//    カスタムポストタイプ絞り込み検索
//  ----------------------------------------

function my_add_filter() {
    global $typenow;;
    // 対象となる投稿タイプを配列で指定
    $target_post_types = [ 'cars', 'jimnys', 'specials' ]; // カスタム投稿タイプを追加

    if ( in_array( $typenow, $target_post_types ) ) {
        echo '<input type="text" name="cars_itemnumber" value="'. get_query_var('cars_itemnumber'). '" placeholder="物件番号（数字のみ）" />';
}
}
add_action( 'restrict_manage_posts', 'my_add_filter' );

function pre_get_posts_admin_custom_field( $query ) {
    global $pagenow;
    if ( is_admin() && $pagenow === 'edit.php' && $query->is_main_query() ) {
        if (isset($_GET['cars_itemnumber'])) {
            $value = $_GET['cars_itemnumber'];
            $meta_key = 'cars_itemnumber';
            $meta_value = $value;
            if ( strlen( $meta_value ) ) {
                $meta_query = $query->get( 'meta_query' );
                if ( ! is_array( $meta_query ) ) $meta_query = array();
                $meta_query[] = array(
                    'key' => $meta_key,
                    'value' => $meta_value,
                    'compare' => 'LIKE'
                );
                $query->set( 'meta_query', $meta_query );
            }
        }
    }
}
add_action( 'pre_get_posts', 'pre_get_posts_admin_custom_field' );
?>
