<?php
if (is_user_logged_in()) {
    $redirect_to = isset($_GET['redirect_to'])
        ? esc_url_raw(wp_unslash($_GET['redirect_to']))
        : home_url('/checkout/');

    wp_safe_redirect($redirect_to);
    exit;
}

get_header();

$redirect_to = isset($_GET['redirect_to'])
    ? esc_url_raw(wp_unslash($_GET['redirect_to']))
    : home_url('/checkout/');
?>

<main>
    <section class="login">
        <div class="login_inner inner">
            <div class="login_head js-reveal">
                <h1 class="login_title section_title">ログイン</h1>
                <p class="login_lead">
                    会員情報を入力してログインしてください。
                </p>
            </div>

            <div class="login_group js-reveal">
                <?php
                wp_login_form([
                    'echo'           => true,
                    'remember'       => true,
                    'redirect'       => $redirect_to,
                    'form_id'        => 'custom_loginform',
                    'label_username' => 'ユーザー名またはメールアドレス',
                    'label_password' => 'パスワード',
                    'label_remember' => 'ログイン状態を保存する',
                    'label_log_in'   => 'ログインする',
                ]);
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>