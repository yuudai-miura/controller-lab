<?php get_header(); ?>

<section class="single">
    <div class="single_inner inner">
        <div class="single_main">
            <div class="single_media js-reveal">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', [
                        'class' => 'single_media_img',
                        'alt'   => esc_attr(get_the_title()),
                    ]); ?>
                <?php else : ?>
                    <img
                        src="<?php echo esc_url(get_theme_file_uri('/img/arcade_btn_red.png')); ?>"
                        alt="<?php echo esc_attr(get_the_title()); ?>"
                        class="single_media_img">
                <?php endif; ?>
            </div>

            <div class="single_info js-reveal">
                <h2 class="single_title"><?php the_title(); ?></h2>

                <div class="single_row">
                    <span class="single_label">価格</span>
                    <span class="single_price">
                        <?php
                        $price = get_post_meta(get_the_ID(), 'price', true);
                        if ($price !== '') {
                            echo '¥' . esc_html(number_format((int)$price));
                        } else {
                            echo '—';
                        }
                        ?>
                    </span>
                </div>

                <div class="single_row">
                    <span class="single_label">数量</span>

                    <div class="single_qty">
                        <button type="button" class="single_qty_btn" data-action="decrease">−</button>
                        <input class="single_qty_input" type="number" value="1" min="1">
                        <button type="button" class="single_qty_btn" data-action="increase">＋</button>
                    </div>
                </div>

                <?php
                $price_raw = get_post_meta(get_the_ID(), 'price', true);
                $thumb_url = has_post_thumbnail()
                    ? get_the_post_thumbnail_url(get_the_ID(), 'large')
                    : get_theme_file_uri('/img/arcade_btn_red.png');
                ?>

                <button
                    type="button"
                    class="single_cart_btn"
                    data-product-id="<?php echo esc_attr(get_the_ID()); ?>"
                    data-product-name="<?php echo esc_attr(get_the_title()); ?>"
                    data-product-price="<?php echo esc_attr((int)$price_raw); ?>"
                    data-product-image="<?php echo esc_url($thumb_url); ?>">
                    カートに追加する
                </button>
            </div>
        </div>

        <div class="single_explanation  js-reveal">
            <h2 class="single_explanation_title">商品説明</h2>
            <p class="single_explanation_text"><?php the_content(); ?></p>
        </div>
    </div>
</section>

<?php get_footer(); ?>