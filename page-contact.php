<?php get_header(); ?>

<section class="contact">
    <div class="contact_inner inner">
        <div class="contact_head js-reveal">
            <h1 class="contact_title section_title">お問い合わせ</h1>
            <p class="contact_lead">
                商品に関するご質問やご相談など、お気軽にお問い合わせください。<br>
                内容を確認のうえ、担当者よりご連絡いたします。
            </p>
        </div>

        <div class="contact_group js-reveal">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="contact_content">
                        <?php the_content(); ?>
                    </div>
            <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>