<?php get_header(); ?>

<section class="product section">
    <div class="product_inner inner">
        <h2 class="product_title section_title js-reveal">商品一覧</h2>

        <button class="product_modal_btn" type="button">
            <div class="product_modal_img">
                <img src="<?php echo esc_url(get_theme_file_uri('/img/narrow down.png')); ?>" alt="絞り込みモーダルを表示する">
            </div>
            <p>絞り込む</p>
        </button>

        <ul class="product_list">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'product_category');
                    $cat_slug = (!empty($terms) && !is_wp_error($terms)) ? $terms[0]->slug : '';
                    ?>
                    <li class="product_item js-reveal" data-category="<?php echo esc_attr($cat_slug); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium', ['class' => 'product_item_img', 'alt' => get_the_title()]); ?>
                        <?php else : ?>
                            <img class="product_item_img" src="<?php echo esc_url(get_theme_file_uri('/img/noimage.png')); ?>" alt="">
                        <?php endif; ?>

                        <h3 class="product_item_title"><?php the_title(); ?></h3>
                        <a href="<?php the_permalink(); ?>" class="product_item_btn">詳しく見る</a>
                    </li>
            <?php endwhile;
            endif; ?>
        </ul>

        <?php
        the_posts_pagination([
            'mid_size' => 1,
            'prev_text' => '＜',
            'next_text' => '＞',
        ]);
        ?>
    </div>

    <?php get_template_part('template-parts/archive/archive-modal'); ?>

</section>

<?php get_footer(); ?>