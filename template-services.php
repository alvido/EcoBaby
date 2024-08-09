<?php
/*
Template Name: Services Categories and Posts
*/

?>
<?php get_header(); ?>

<main class="main">
    <section class="services">
        <div class="services__inner container">
            <h2 class="section__title"><?php the_title(); ?></h2>
            <div class="section__text">
                <?php
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
                ?>
            </div>

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
        </div>
    </section>
    <?php get_template_part('template-parts/content', 'news'); ?>

</main>

<?php get_footer(); ?>