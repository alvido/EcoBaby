<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<main class="main">
    
    <section class="news">
        <div class="news__inner container">
            <h2 class="section__title">Полезные статьи</h2>

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