<?php
$login_url = add_query_arg(
    'redirect_to',
    rawurlencode(home_url('/checkout/')),
    home_url('/login/')
);
?>
<div class="cart" id="cartModal" aria-hidden="true">
    <div class="cart_inner">

        <h3 class="cart_title">カート</h3>

        <button class="cart_back_btn" type="button" aria-label="カートを閉じる">
            <span></span>
            <span></span>
        </button>

        <div class="cart_list"></div>

        <div class="cart_footer">

            <div class="cart_total">
                <span>見積もり合計</span>
                <strong class="cart_total_price">¥0 JPY</strong>
            </div>

            <?php if (is_user_logged_in()) : ?>
                <a class="cart_checkout" href="<?php echo esc_url(home_url('/checkout/')); ?>">
                    ご購入手続きへ
                </a>
            <?php else : ?>
                <a class="cart_checkout" href="<?php echo esc_url($login_url); ?>">
                    ご購入手続きへ
                </a>
            <?php endif; ?>

        </div>
    </div>
</div>