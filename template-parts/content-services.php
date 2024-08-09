<section class="news">
    <div class="news__inner container">
        <h2 class="section__title">Полезные статьи</h2>

        <ul class="news__list">
            <?php
            $current = absint(
                max(
                    1,
                    get_query_var('paged') ? get_query_var('paged') : get_query_var('page')
                )
            );
            $posts_per_page = 3;
            $query = new WP_Query(
                [
                    'post_type' => 'services',
                    'posts_per_page' => $posts_per_page,
                    'paged' => $current,
                ]
            );
            if ($query->have_posts()) {
            ?>
                <!-- <h1>Текущая страница <?php echo absint($current); ?></h1> -->

                <?php
                while ($query->have_posts()) {
                    $query->the_post();
                ?>
                    <!-- Вывод постов, функции цикла: the_title() и т.д. -->
                    <li class="news__item">

                        <?php get_template_part('template-parts/content', 'news-img'); ?>

                        <div class="news__content">
                            <h3 class="news__title">
                                <a href="<?php the_permalink(); ?>" class="news__link">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <p class="news__text"><?php echo get_the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="news__more">
                                Читать далее
                                <span>
                                    <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.795455 5.34091L11.2955 5.34091L8.98864 7.64773C8.67045 7.96591 8.67045 8.44318 8.98864 8.76136C9.30682 9.07955 9.78409 9.07955 10.1023 8.76136L13.7614 5.10227C14.0795 4.78409 14.0795 4.30682 13.7614 3.98864L10.1023 0.329546C9.78409 0.0113636 9.30682 0.0113636 8.98864 0.329546C8.67046 0.647727 8.67046 1.125 8.98864 1.44318L11.2955 3.75L0.795455 3.75C0.397728 3.75 4.31153e-07 4.06818 3.89429e-07 4.54545C3.47704e-07 5.02273 0.397728 5.34091 0.795455 5.34091Z" fill="#3D72E0" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </li>

            <?php
                }
                wp_reset_postdata();
                echo '</ul>';
            }
            ?>
            <a href="/blog" class="button button--transparent">Посмотреть все</a>
    </div>
</section>