<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<main class="main">
    
    <section class="news">
        <div class="news__inner container">
            
            <?php
            // Получаем ID страницы записей (блога)
            $blog_page_id = get_option('page_for_posts');
            
            // Получаем ID переведённой страницы в зависимости от языка
            $lang = pll_current_language();
            $translated_blog_page_id = pll_get_post($blog_page_id, $lang);
            
            // Получаем заголовок страницы
            $translated_title = get_the_title($translated_blog_page_id);
            
            // Разбиваем заголовок на части
            $translated_title_parts = explode(' ', $translated_title);
        ?>
            <h2 class="section__title">
                <?php echo $translated_title_parts[0]; ?> <span><?php echo $translated_title_parts[1]; ?></span>
            </h2>

            <ul class="news__list">
                <?php
                $current = absint(max(1, get_query_var('paged') ? get_query_var('paged') : get_query_var('page')));
                $query = new WP_Query([
                    'post_type' => 'post',
                    'posts_per_page' => $posts_per_page,
                    'paged' => $current,
                ]);

                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        get_template_part('content-ajax'); // Используем шаблон для постов
                    }
                    wp_reset_postdata();
                }
                ?>
            </ul>

            <?php
            global $wp_query;
            if (1 < $wp_query->max_num_pages) {
                echo '<div id="misha_loadmore" class="button button--transparent">Показать еще</div>';
            }
            ?>





        </div>
    </section>


</main>

<?php get_footer(); ?>