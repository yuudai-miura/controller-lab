<div class="product_modal">
    <div class="product_modal_inner">
        <h3 class="product_modal_title">絞り込む</h3>
        <button class="product_modal_back_btn" type="button"><span></span><span></span></button>

        <div class="product_modal_group">
            <div class="product_modal_category">
                <p class="product_modal_label">カテゴリー</p>

                <ul class="product_modal_list">
                    <?php
                    $cats = get_terms([
                        'taxonomy' => 'product_category',
                        'hide_empty' => true,
                    ]);
                    if (!is_wp_error($cats) && !empty($cats)) :
                        foreach ($cats as $cat) :
                    ?>
                            <li class="product_modal_item" data-category="<?php echo esc_attr($cat->slug); ?>">
                                <?php echo esc_html($cat->name); ?>
                            </li>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>
        </div>

        <div class="product_modal_apply_group">
            <a href="" class="product_modal_reset">リセットする</a>
            <button class="product_modal_apply" type="button">絞り込み</button>
        </div>
    </div>
</div>