<?php
// Проверка, если у поста есть миниатюра
if (has_post_thumbnail()) {
    // Виведення зображення посту
    the_post_thumbnail(
        'full',
        array(
            'class' => 'news__img',
            'style' => 'width: 100%; height: auto;',
        )
    );
} else {
    // Виведення заглушки с серым фоном, если зображення посту не вибрано
    echo '<div class="news__img-placeholder"></div>';
}
