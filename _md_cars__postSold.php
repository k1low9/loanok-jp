<article class="car_post__article soldout_wrap fz_12">
    <?php
    $car_img__group = get_field('car_img__group');
    if( $car_img__group ): ?>

        <?php
        $img_value = 'car_img1' ;
        $car_title = get_the_title();
        if ( $car_img__group[$img_value] ) {
            $attachment_id = $car_img__group[$img_value];
            echo '<figure class="car_img">';
            echo wp_get_attachment_image( $attachment_id, "original_thumb_landscape", false, array( 'class'=>'cars_img__lrg desktop', 'alt'=>$car_title ));
            echo '</figure>';
        }
        ?>

    <?php endif; ?>
    <div class="car_detail02">
        <div class="c_l">
            <?php
            $cars_store = get_field_object('cars_store');
            $cars_store__value = $cars_store['value'];
            $cars_store__label = $cars_store['choices'][ $cars_store__value ];
            if( $cars_store__value ):
                ?>
                <?php
                if(get_field('cars_itemnumber')){
                    if($cars_store__value === '1' ) {
                        echo '<p class="store_color fukuoka">販売店：' . esc_attr( $cars_store__label ) . '</p>';
                    } elseif($cars_store__value === '2') {
                        echo '<p class="store_color osaka">販売店：' . esc_attr( $cars_store__label ) . '</p>';
                    } elseif($cars_store__value === '3' ) {
                        echo '<p class="store_color tokyo">販売店：' . esc_attr( $cars_store__label ) . '</p>';
                    }
                }
                ?>
            <?php endif; ?>
        </div>
    </div>
</article>




