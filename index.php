<?php get_header(); ?>

<section class="mv js-reveal">
    <div class="mv_title">
        <h2 class="mv_name">勝利を掴め</h2>
        <h3 class="mv_description">一瞬で差を付けろ<br>競技レベルの操作感を体感せよ</h3>
    </div>
</section>

<section class="news section" id="news">
    <div class="news_inner inner">
        <h2 class="news_title section_title js-reveal">新着情報</h2>

        <ul class="news_list">
            <?php
            $news_q = new WP_Query([
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'post_status'    => 'publish',
            ]);

            if ($news_q->have_posts()) :
                while ($news_q->have_posts()) : $news_q->the_post();
            ?>
                    <li class="news_item js-reveal">
                        <button class="news_toggle" type="button">
                            <span class="news_text">
                                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <?php echo esc_html(get_the_date('Y.m.d')); ?>
                                </time>
                                <h3><?php the_title(); ?></h3>
                            </span>
                            <span class="news_arrow"></span>
                        </button>

                        <div class="news_content">
                            <?php the_excerpt(); ?>
                        </div>
                    </li>
                <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <li>お知らせがありません。</li>
            <?php endif; ?>
        </ul>

        <?php
        $posts_page_id = (int) get_option('page_for_posts');
        $news_link = $posts_page_id ? get_permalink($posts_page_id) : home_url('/?post_type=post');
        ?>
        <a href="<?php echo esc_url($news_link); ?>" class="news_btn section_btn js-reveal">view more</a>

    </div>
</section>

<section class="product section">
    <div class="product_inner inner">
        <h2 class="product_title section_title js-reveal">商品一覧</h2>

        <ul class="product_list">
            <?php
            $product_q = new WP_Query([
                'post_type'      => 'products',
                'posts_per_page' => 8,
                'post_status'    => 'publish',
            ]);

            if ($product_q->have_posts()) :
                while ($product_q->have_posts()) : $product_q->the_post();

                    $terms = get_the_terms(get_the_ID(), 'product_category');
                    $cat_slugs = [];
                    if (!empty($terms) && !is_wp_error($terms)) {
                        foreach ($terms as $t) {
                            $cat_slugs[] = $t->slug;
                        }
                    }
                    $data_cat = implode(' ', $cat_slugs);
            ?>
                    <li class="product_item js-reveal" data-category="<?php echo esc_attr($data_cat); ?>">

                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium', ['class' => 'product_item_img', 'alt' => get_the_title()]); ?>
                        <?php else : ?>
                            <img class="product_item_img" src="<?php echo esc_url(get_theme_file_uri('/img/noimage.png')); ?>" alt="">
                        <?php endif; ?>

                        <h3 class="product_item_title"><?php the_title(); ?></h3>

                        <a href="<?php the_permalink(); ?>" class="product_item_btn">詳しく見る</a>
                    </li>
                <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <li>商品がありません。</li>
            <?php endif; ?>
        </ul>

        <a href="<?php echo esc_url(get_post_type_archive_link('products')); ?>" class="product_btn section_btn js-reveal">
            VIDE ALL PRODUCTS
        </a>

    </div>
</section>

<?php get_footer(); ?>