<footer class="footer">
    <div class="footer_inner inner">
        <h2 class="footer_logo">CONTROL LAB</h2>
        <div class="footer_group">
            <div class="footer_nav footer_header">
                <p class="footer_title">NAVIGATION</p>
                <ul class="footer_list">
                    <li class="footer_item">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="footer_link">
                            ホーム</a>
                    </li>
                    <li class="footer_item">
                        <a href="<?php echo esc_url(home_url('/products/')); ?>" class="footer_link">
                            商品一覧
                        </a>
                    </li>
                    <li class="footer_item">
                        <a href="<?php echo esc_url(home_url('#news')); ?>" class="footer_link">
                            ニュース
                        </a>
                    </li>
                    <li class="footer_item">
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="footer_link">
                            お問い合わせ
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer_support footer_header">
                <p class="footer_title">SUPPORT</p>
                <ul class="footer_list">
                    <li class="footer_item">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="footer_link">
                            よくある質問
                        </a>
                    </li>
                    <li class="footer_item">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="footer_link">
                            プライバシー
                        </a>
                    </li>
                    <li class="footer_item">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="footer_link">
                            利用規約
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer_sns">
                <p class="footer_title">SNS</p>
                <ul class="footer_list">
                    <li class="footer_item">
                        <a href="" class="footer_link">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/twitter.png" alt="twitter">
                        </a>
                    </li>
                    <li class="footer_item">
                        <a href="" class="footer_link">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/facebook.png" alt="facebook">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>