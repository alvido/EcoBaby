<?php

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="dorobalo">
    <meta name="robots" content="index, follow">
    <meta name="description" content="My test site">
    <meta name="keywords" content="Web Development, Cloud Solutions, Cyber Security, Data Analytic, Software Development, Digital Marketing">

    <title>
        <?php bloginfo('name'); ?> |
        <?php bloginfo('description'); ?>
    </title>

    <?php wp_head(); ?>

</head>


<body>

    <header class="header">
        <div class="header__inner container">

            <?php if (get_theme_mod('header_logo')) : ?>
                <a class="header__logo logo" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    <img class="logo__image" src="<?php echo esc_url(get_theme_mod('header_logo')); ?>" alt="<?php bloginfo('name'); ?>">
                </a>
                <?php else :
                if (function_exists('the_custom_logo')) :
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

                    if ($logo) : ?>
                        <a class="header__logo logo" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            <img src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        </a>
            <?php endif;
                endif;
            endif; ?>

            <nav class="header__nav navigation">
                <?php
                $menu = wp_nav_menu([
                    'theme_location' => 'header-menu',
                    'container' => 'ul',
                    'menu_class' => 'navigation__list',
                ]);
                if ($menu) {
                    echo $menu;
                }
                ?>
                <ul class="navigation__list navigation__list--contact">
                    <?php dynamic_sidebar('header_center'); ?>
                </ul>
            </nav>
        </div>

    </header>