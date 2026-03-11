<?php
if (!is_user_logged_in()) {

    $login_url = add_query_arg(
        'redirect_to',
        rawurlencode(home_url('/checkout/')),
        home_url('/login/')
    );

    wp_safe_redirect($login_url);
    exit;
}

get_header();
?>

<main>
    <section class="checkout">
        <div class="checkout_inner inner">
            <div class="checkout_head js-reveal">
                <h1 class="checkout_title section_title">ご購入手続き</h1>
                <p class="checkout_lead">
                    お届け先情報とお支払い方法を入力してください。
                </p>
            </div>

            <div class="checkout_group js-reveal">
                <form class="checkout_form">
                    <div class="checkout_form_item">
                        <label>お名前<span class="checkout_required">必須</span></label>
                        <input type="text" placeholder="山田 太郎" required>
                    </div>

                    <div class="checkout_form_item">
                        <label>メールアドレス<span class="checkout_required">必須</span></label>
                        <input type="email" placeholder="example@example.com" required>
                    </div>

                    <div class="checkout_form_item">
                        <label>住所<span class="checkout_required">必須</span></label>
                        <input type="text" placeholder="東京都..." required>
                    </div>

                    <div class="checkout_form_item">
                        <label>電話番号<span class="checkout_required">必須</span></label>
                        <input type="tel" placeholder="090-1234-5678" required>
                    </div>

                    <div class="checkout_form_item">
                        <label>備考</label>
                        <textarea placeholder="ご要望があればご記入ください"></textarea>
                    </div>

                    <div class="checkout_form_submit">
                        <button type="submit">注文を確定する</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>