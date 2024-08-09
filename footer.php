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
                <ul class="navigation__list footer__list--contact">
                    <li class="navigation__item"><a href="mailto:info@ecobaby.co.il" class="navigation__link"> <img src="assets/images/icon/mail.svg" alt="">info@ecobaby.co.il</a></li>
                    <li class="navigation__item"><a href="tel:+97258-720-1166" class="navigation__link"><img src="assets/images/icon/phone.svg" alt="">+97258-720-1166</a></li>
                    <li class="navigation__item"><a href="https://t.me/ecobabyfertility" class="navigation__link"><img src="assets/images/icon/TelegramLogo.svg" alt="">@ecobabyfertility</a></li>
                </ul>
            </nav>
            <button class="lang">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 28C22.6274 28 28 22.6274 28 16C28 9.37258 22.6274 4 16 4C9.37258 4 4 9.37258 4 16C4 22.6274 9.37258 28 16 28Z" stroke="#3A5F6F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M16 28C18.9455 28 21.3333 22.6274 21.3333 16C21.3333 9.37258 18.9455 4 16 4C13.0544 4 10.6666 9.37258 10.6666 16C10.6666 22.6274 13.0544 28 16 28Z" stroke="#3A5F6F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M4 15.9998C4 18.9454 9.37258 21.3332 16 21.3332C22.6274 21.3332 28 18.9454 28 15.9998C28 13.0543 22.6274 10.6665 16 10.6665C9.37258 10.6665 4 13.0543 4 15.9998Z" stroke="#3A5F6F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                ru
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.33337 13.3333L16 20" stroke="#3A5F6F" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M16 20L22.6667 13.3333" stroke="#3A5F6F" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

            </button>
        </div>
        <div class="wrapper">
            <p class="copy">ECOBABY © 2024</p>
            <div class="privacy">
                <a href="" class="">Terms & Conditions</a>
                <a href="" class="">Privacy Policy</a>
            </div>
        </div>
    </div>
</footer>


<?php wp_footer(); ?>



</body>

</html>