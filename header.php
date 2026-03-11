<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <title><?php the_title(); ?></title>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php
    get_template_part('template-parts/header/site-header');

    get_template_part('template-parts/header/cart-modal');
    ?>