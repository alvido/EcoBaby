<?php get_header(); ?>

<main class="main">
    <section>
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
    </section>
</main>

<?php get_footer(); ?>