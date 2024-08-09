<?php

/* Template Name: Services Categories List */
get_header(); ?>

<main class="main">
    <section class="hero">
        <div class="hero__inner container">
            <div class="hero__content">
                <span class="hero__tagline">Ваше гражданство – наша миссия!</span>
                <h1 class="title">
                    <?php the_title(); ?>
                </h1>
                <?php
                // Виведення зображення посту
                the_post_thumbnail(
                    'full',
                    array(
                        'class' => '',
                    )
                );
                ?>
                <p class="hero__text">
                    <?php echo get_the_excerpt(); ?>
                </p>
                <button class="hero__button button">Заказать консультацию</button>
            </div>
        </div>
    </section>
    <article class="article">
        <div class="container">
            <h1 class="section__title">
                <?php the_title(); ?>
            </h1>
            <div class="article__content">
                <?php
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>
    </article>
    <?php get_template_part('template-parts/content', 'news'); ?>
</main>

<?php get_footer(); ?>