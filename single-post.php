<?php get_header(); ?>

<main class="main">
    <article class="article">
        <div class="container">

           
            <h1 class="section__title">
                <?php the_title(); ?>
            </h1>
             <div class="article__img">
                <?php
                // Виведення зображення посту
                the_post_thumbnail(
                    'full',
                    array(
                        'class' => '',
                    )
                );
                ?>
            </div>
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