<?php

?>

<footer class="footer">
    <div class="container">
        <div class="wrapper">
            <?php if (get_theme_mod('footer_logo')) : ?>
                <a class="footer__logo logo" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    <img class="logo__image" src="<?php echo esc_url(get_theme_mod('footer_logo')); ?>" alt="<?php bloginfo('name'); ?>">
                </a>
                <?php else :
                if (function_exists('the_custom_logo')) :
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

                    if ($logo) : ?>
                        <a class="footer__logo logo" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            <img src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        </a>
            <?php endif;
                endif;
            endif; ?>

            <nav class="footer__nav" id="contacts">
                <div class="navigation__list footer__list--contact">
                    <?php dynamic_sidebar('footer_contact'); ?>
                </div>
            </nav>
            
            <button class="lang">
                
                <?php
                    $menu = wp_nav_menu([
                        'theme_location' => 'language-menu',
                        'container' => 'ul',
                        'menu_class' => 'language__list',
                    ]);
                    if ($menu) {
                        echo $menu;
                    }
                    ?>
            </button>


        </div>
        <div class="wrapper">
            <p class="copy"><?php bloginfo('name'); ?> &copy; <?php echo date('Y'); ?></p>
            <div class="privacy__links">
                <?php
                $menu = wp_nav_menu([
                    'theme_location' => 'footer-menu',
                    'container' => 'ul',
                    'menu_class' => 'privacy',
                ]);
                if ($menu) {
                    echo $menu;
                }
                ?>
            </div>
        </div>
    </div>
</footer>


<?php wp_footer(); ?>



</body>

</html>