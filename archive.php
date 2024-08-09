<?php get_header(); ?>

<main class="main">
    <section class="services">
        <div class="services__inner container">
            <h2 class="section__title">Наши услуги</h2>
            <?php
            if (is_category()) {
                $category = get_queried_object();
                if ($category) {
                    echo esc_html($category->name);
                }
            }


            ?>
            <p class="section__text">Сотрудники Советника – профессиональные юристы, с большим практическим опытом в
                области полученияи
                оформления израильского гражданства, поиска еврейских корней и репатриации в Израиль.
            </p>

            <ul class="services__list">
                <?php
                // Получение всех пользовательских категорий
                $categories = get_terms(array(
                    'taxonomy' => 'services_category', // Укажите вашу таксономию
                    'orderby' => 'name',
                    'order' => 'ASC',
                    'hide_empty' => false, // Включить пустые категории
                ));

                if (!empty($categories) && !is_wp_error($categories)) :
                    foreach ($categories as $category) :
                        // Получение ID категории
                        $category_id = $category->term_id;

                        // Получение названия категории
                        $category_name = $category->name;

                        // Получение описания категории
                        $category_description = category_description($category_id);
                        $content = wp_kses_post($category_description);

                        // Получение изображения категории с использованием ACF
                        $category_image = get_field('category_image', 'term_' . $category_id);

                        if ($category_image) {
                            $category_image_url = $category_image['url'];
                        }
                        // Получение ссылки на категорию
                        $category_link = get_term_link($category);

                ?>
                        <li class="services__item">
                            <?php if (!empty($category_image_url)) : ?>
                                <img src="<?php echo esc_url($category_image_url); ?>" alt="<?php echo esc_attr($category_name); ?>">
                            <?php endif; ?>
                            <h3 class="services__title"><a class="services__link" href="<?php echo esc_url($category_link); ?>"><?php echo esc_html($category_name); ?></a></h3>
                            <p><?php echo $content; ?></p>
                        </li>

                    <?php endforeach;
                else : ?>
                    <p><?php _e('No categories found.'); ?></p>
                <?php endif; ?>
            </ul>
            <a class="services__button button button--transparent">Все услуги</a>
        </div>
    </section>
    <?php get_template_part('template-parts/content', 'news'); ?>

</main>

<?php get_footer(); ?>