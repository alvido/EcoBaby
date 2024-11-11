<?php
/*
Template Name: Front Page
*/
?>

<?php get_header(); ?>

<main class="main">
    <section class="hero">
        <div class="wrapper">
            <div class="content">
                <div>
					<?php the_field('hero_title'); ?>
				</div>
                <img src="<?php the_field('hero_image'); ?>" alt="hero">
                <div class="hero__text">
                    <?php the_field('hero_text'); ?>
                </div>
                <a href="<?php the_field('hero_button_link'); ?>" class="button"><?php the_field('hero_button'); ?></a>
            </div>
        </div>
    </section>
    <section class="features">
        <div class="container">
            <ul class="features__list">
                <li class="features__item">
                    <span><img src="<?php the_field('features_image1'); ?>" alt=""></span>
                    <h3><?php the_field('features_title1'); ?></h3>
                    <p><?php the_field('features_text1'); ?></p>
                </li>
                <li class="features__item">
                    <span><img src="<?php the_field('features_image2'); ?>" alt=""></span>
                    <h3><?php the_field('features_title2'); ?></h3>
                    <p><?php the_field('features_text2'); ?></p>
                </li>
                <li class="features__item">
                    <span><img src="<?php the_field('features_image3'); ?>" alt=""></span>
                    <h3><?php the_field('features_title3'); ?></h3>
                    <p><?php the_field('features_text3'); ?></p>
                </li>
                <li class="features__item">
                    <span><img src="<?php the_field('features_image4'); ?>" alt=""></span>
                    <h3><?php the_field('features_title4'); ?></h3>
                    <p><?php the_field('features_text4'); ?></p>
                </li>
            </ul>
        </div>
    </section>
    <section class="faq">
        <div class="container">
            <div><?php the_field('faq_title'); ?></div>
            <span class="subtitle"><?php the_field('faq_text'); ?></span>
			
			<ul class="faq__list">
			<?php
				// Получаем текущий термин
				$term = get_queried_object();

				// Параметры для WP_Query
				$args = array(
					'post_type' => 'questions',
					'posts_per_page' => -1, // Вывести все посты
				);

				$query = new WP_Query($args);

				// Инициализируем счётчик перед циклом
				$counter = 1;

				// Проверяем, есть ли посты в термине
				if ($query->have_posts()) {

					// Цикл по постам
					while ($query->have_posts()) {
						$query->the_post();
				?>

						<li class="faq__item">
							<span class="count"><?php echo $counter; ?></span>
							<div class="faq__info">
								<h4 class="faq__title"><?php the_title(); ?></h4>
								<div class="content">
									<div class="">
											<?php the_content(); ?>
									</div>
									<?php
									// Проверка, если у поста есть миниатюра
									if (has_post_thumbnail()) {
										// Виведення зображення посту
										the_post_thumbnail(
											'full',
											array(
												// 'class' => 'news__img',
												// 'style' => 'width: 100%; height: 200px;',
											)
										);
									} else {
										echo '<img src="https://ecobaby.co.il/wp-content/uploads/2024/07/extendify-demo-logo.png" alt="">';
									}
									?>
								</div>
							</div>
							<svg class="faq__btn" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
								<path d="M9.33337 13.3333L16 20" stroke="#3A5F6F" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M16 20L22.6667 13.3333" stroke="#3A5F6F" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</li>
				<?php
						// Увеличиваем счётчик после каждого элемента
						$counter++;
					}
				}

				// Восстанавливаем оригинальные данные поста
				wp_reset_postdata();
				?>

			 </ul>
			
        </div>
    </section>
    <section class="banner">
        <div class="container">
            <div class="wrapper">
                <p>
                    <?php the_field('banner1_text'); ?>
                </p>
                <img class="absolute" src="<?php the_field('banner1_images'); ?>" alt="">
            </div>
        </div>
    </section>
    <section class="about" id="about">
        <div class="container">
            <div><?php the_field('about_title'); ?></div>
            <span class="subtitle">
                <?php the_field('about_subtitle'); ?>
            </span>
            <ul class="about__cards">
                <li class="about__cards-item">
                    <img src="<?php the_field('about_list_image1'); ?>" alt="">
                    <h4><?php the_field('about_list_title1'); ?></h4>
                    <p><?php the_field('about_list_text1'); ?></p>
                </li>
                <li class="about__cards-item">
                    <img src="<?php the_field('about_list_image2'); ?>" alt="">
                    <h4><?php the_field('about_list_title2'); ?></h4>
                    <p><?php the_field('about_list_text2'); ?></p>
                </li>
                <li class="about__cards-item">
                    <img src="<?php the_field('about_list_image3'); ?>" alt="">
                    <h4><?php the_field('about_list_title3'); ?></h4>
                    <p><?php the_field('about_list_text3'); ?></p>
                </li>
                <li class="about__cards-item">
                    <img src="<?php the_field('about_list_image4'); ?>" alt="">
                    <h4><?php the_field('about_list_title4'); ?></h4>
                    <p><?php the_field('about_list_text4'); ?></p>
                </li>
            </ul>
            <div class="wrapper">
                <img src="<?php the_field('about_image'); ?>" alt="">
                <p>
                    <?php the_field('about_text'); ?>
                </p>
            </div>
        </div>
    </section>


    <section class="testimonials">
        <div class="testimonials__inner">
            <div><?php the_field('testimonials_title'); ?></div>
            <div class="container">

                <!-- Slider main container -->
                <div class="swiper">
                    

			<?php
            // Получаем текущий термин
            $term = get_queried_object();
            ?>
            <?php
            // Параметры для WP_Query
            $args = array(
                'post_type' => 'reviews',
                'posts_per_page' => -1, // Вывести все посты
            );

            $query = new WP_Query($args);

            // Проверяем, есть ли посты в термине
            if ($query->have_posts()) {
                echo '<ul class="swiper-wrapper testimonials__list">';
                // Цикл по постам
                while ($query->have_posts()) {
                    $query->the_post();

            ?>
                    <li class="swiper-slide testimonials__item">
                        <div class="author">
                             <?php
					// Проверка, если у поста есть миниатюра
					if (has_post_thumbnail()) {
						// Виведення зображення посту
						the_post_thumbnail(
							'full',
							array(
								// 'class' => 'news__img',
								// 'style' => 'width: 100%; height: 200px;',
							)
						);
					} else {
						echo '<img src="https://ecobaby.co.il/wp-content/uploads/2024/07/extendify-demo-logo.png" alt="">';
					}
					?>
                                    <div class="author__info">
                                        <h5><?php the_title(); ?></h5>
                                        <span><?php the_date(); ?></span>
                                    </div>
                                </div>
                                <p>
                                    <?php echo get_the_excerpt(); ?>
                                </p>
                                
                                <svg  style="display: none;" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path id="star"
                                            d="M7.10327 3.15013C7.47011 2.40696 8.52985 2.40696 8.89669 3.15013L9.82753 5.03592C9.97307 5.33077 10.2543 5.53523 10.5796 5.58278L12.6629 5.88728C13.4828 6.00712 13.8096 7.01496 13.216 7.59312L11.7101 9.05984C11.4742 9.28958 11.3666 9.62071 11.4222 9.94524L11.7774 12.0161C11.9175 12.8331 11.06 13.456 10.3263 13.0702L8.46543 12.0916C8.17405 11.9384 7.82591 11.9384 7.53453 12.0916L5.67361 13.0702C4.93998 13.4561 4.08243 12.8331 4.22255 12.0161L4.57773 9.94524C4.63339 9.62071 4.52573 9.28958 4.28986 9.05984L2.78399 7.59312C2.1904 7.01496 2.51718 6.00712 3.3371 5.88728L5.42035 5.58278C5.7457 5.53523 6.02689 5.33077 6.17243 5.03592L7.10327 3.15013Z"
                                            fill="#FFA033" stroke="#FFA033" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>

                                <div class="reviews">
                                    <?php
                                    $rating = get_field('rating');
                                    for ($i = 0; $i < 5; $i++) {
                                        if ($i < $rating) {
                                            echo '<svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" color="#FFA033">
                                                <path id="star"
                                            d="M7.10327 3.15013C7.47011 2.40696 8.52985 2.40696 8.89669 3.15013L9.82753 5.03592C9.97307 5.33077 10.2543 5.53523 10.5796 5.58278L12.6629 5.88728C13.4828 6.00712 13.8096 7.01496 13.216 7.59312L11.7101 9.05984C11.4742 9.28958 11.3666 9.62071 11.4222 9.94524L11.7774 12.0161C11.9175 12.8331 11.06 13.456 10.3263 13.0702L8.46543 12.0916C8.17405 11.9384 7.82591 11.9384 7.53453 12.0916L5.67361 13.0702C4.93998 13.4561 4.08243 12.8331 4.22255 12.0161L4.57773 9.94524C4.63339 9.62071 4.52573 9.28958 4.28986 9.05984L2.78399 7.59312C2.1904 7.01496 2.51718 6.00712 3.3371 5.88728L5.42035 5.58278C5.7457 5.53523 6.02689 5.33077 6.17243 5.03592L7.10327 3.15013Z"
                                            fill="#FFA033" stroke="#FFA033" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                            </svg>';
                                        } else {
                                            echo '<svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" color="#3A5F6F"><use xlink:href="#star"></use></svg>';
                                        }
                                    }
                                    ?>
                                </div>
                    </li>
            <?php


                }
                echo '</ul>';
            }

            // Восстанавливаем оригинальные данные поста
            wp_reset_postdata();
            ?>
                    
                    <div class="swiper__navigation">
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                        <div class="swiper__navigation-button">
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/content', 'news'); ?>

    <section class="banner">
        <div class="container">
            <div class="wrapper">
                <div class="content">
                    <img class="absolute" src="<?php the_field('banner2_image'); ?>" alt="">
                    <h2><?php the_field('banner2_title'); ?></h2>
                    <p>
                        <?php the_field('banner2_text'); ?>
                    </p>
                    <a href="<?php the_field('hero_button_link'); ?>" class="button"><?php the_field('hero_button'); ?></a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>