<?php get_header(); ?>

<main class="error404">
    <div class="inner">
        <h1>404</h1>
        <p>ページが見つかりませんでした。</p>
        <a href="<?php echo esc_url(home_url('/')); ?>">トップへ戻る</a>
    </div>
</main>

<?php get_footer(); ?>