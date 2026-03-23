<?php

function custom_query( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) return;

    // ホームページ
    if ( $query->is_home() ) {
        $query->set( 'post_type', 'cars' );
        $query->set( 'posts_per_page', 24 );
        $query->set( 'ignore_sticky_posts', 1 );
        $query->set( 'orderby', 'modified' );
        $query->set( 'order', 'desc' );
        $query->set( 'meta_query', array(
            array(
                'key' => 'cars_status',
                'value' => 'on',
                'compare' => '='
            )
        ));
        return;
    }

    // carsアーカイブ
    if ( $query->is_post_type_archive( 'cars' ) && ! is_search() ) {
        $query->set( 'post_type', array( 'cars', 'jimnys', 'specials' ) );
        $query->set( 'posts_per_page', 80 );
        $query->set( 'ignore_sticky_posts', 0 );
        $query->set( 'orderby', 'modified' );
        $query->set( 'meta_key', 'cars_update' );
        $query->set( 'order', 'desc' );
        $query->set( 'meta_query', array(
            array(
                'key' => 'cars_status',
                'value' => 'on',
                'compare' => '='
            )
        ));
        return;
    }

    // rentacarアーカイブ
    if ( $query->is_post_type_archive( 'rentacar' ) ) {
        $query->set( 'posts_per_page', 80 );
        $query->set( 'ignore_sticky_posts', 1 );
        $query->set( 'orderby', 'modified' );
        $query->set( 'order', 'desc' );
        $query->set( 'meta_query', array(
            array(
                'key' => 'rentacars_status',
                'value' => 'on',
                'compare' => '='
            )
        ));
        return;
    }

    // newsアーカイブ
    if ( $query->is_post_type_archive( 'news' ) ) {
        $query->set( 'posts_per_page', 3 );
        $query->set( 'ignore_sticky_posts', 0 );
        $query->set( 'orderby', 'date' );
        $query->set( 'order', 'desc' );
        return;
    }

    // 検索
    if ( $query->is_search() ) {
        $post_type   = isset($_GET['post_type'])   ? sanitize_text_field($_GET['post_type']) : '';
        $form_type   = isset($_GET['form_type'])   ? sanitize_text_field($_GET['form_type']) : '';
        $store_id    = isset($_GET['store_id'])    ? sanitize_text_field($_GET['store_id']) : '';
        $price_sort  = isset($_GET['price_sort'])  ? sanitize_text_field($_GET['price_sort']) : '';
        $term        = isset($_GET['term'])        ? sanitize_text_field($_GET['term']) : '';
        $item_number = isset($_GET['item_num'])    ? sanitize_text_field($_GET['item_num']) : '';
        $price_bottom = isset($_GET['price_bottom']) ? floatval($_GET['price_bottom']) : '';
        $price_up     = isset($_GET['price_up'])     ? floatval($_GET['price_up']) : '';

        // 投稿タイプ
        if ( $post_type ) {
            $query->set( 'post_type', array( $post_type, 'jimnys', 'specials' ) );
        }

        // 基本meta_query（ステータスが on のみ）
        $meta_query = $query->get('meta_query') ?: [];
        $meta_query[] = array(
            'key' => 'cars_status',
            'value' => 'on',
            'compare' => '='
        );

        // 条件別に追加フィルター
        if ( $form_type === 'store' && $store_id ) {
            $meta_query[] = array(
                'key' => 'cars_store',
                'value' => $store_id,
                'compare' => '='
            );
        } elseif ( $form_type === 'item_number' && $item_number ) {
            $item_number = mb_convert_kana($item_number, "a", "utf-8");
            $item_number = preg_replace('/[a-zA-Z]/', '', $item_number);
            $meta_query[] = array(
                'key' => 'cars_itemnumber',
                'value' => $item_number,
                'compare' => '='
            );
        } elseif ( $form_type === 'price' && $price_bottom !== '' && $price_up !== '' ) {
            $meta_query[] = array(
                'key' => 'cars_loan__price',
                'value' => array( $price_bottom, $price_up ),
                'type' => 'numeric',
                'compare' => 'BETWEEN'
            );
            $meta_query[] = array(
                'key' => 'cars_loan__price',
                'compare' => 'EXISTS'
            );
        } elseif ( $form_type === 'car_cat' && $term ) {
            $query->set( 'tax_query', array(
                array(
                    'taxonomy' => 'cars_categorys',
                    'field' => 'slug',
                    'terms' => $term,
                )
            ));
        }

        // 並び順（価格順 or 日付順）
        if ( $price_sort ) {
            $query->set( 'order', $price_sort );
            $query->set( 'orderby', 'meta_value_num' );
            $query->set( 'meta_key', 'cars_loan__price' );

            // cars_loan__price が存在する投稿に限定
            // $meta_query[] = array(
            //     'key' => 'cars_loan__price',
            //     'compare' => 'EXISTS'
            // );
        } elseif ( $form_type === 'price' ) {
            $query->set( 'order', 'asc' );
            $query->set( 'orderby', 'meta_value_num' );
            $query->set( 'meta_key', 'cars_loan__price' );
        } else {
            $query->set( 'orderby', 'modified' );
            $query->set( 'order', 'desc' );
        }

        $query->set( 'meta_query', $meta_query );
        $query->set( 'posts_per_page', 80 );
        return;
    }
}

add_action( 'pre_get_posts', 'custom_query' );
