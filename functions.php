<?php
// Добавление скриптов и стилей
add_action('wp_enqueue_scripts', function () {

	wp_enqueue_style('googleapis', 'https://fonts.googleapis.com');
	wp_enqueue_style('gstatic', 'https://fonts.gstatic.com');
	wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');

	wp_enqueue_style('select2.css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css');
	wp_enqueue_style('swiper.css', 'https://cdn.jsdelivr.net/npm/swiper@11.1.4/swiper-bundle.min.css');
	wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/assets/css/style.css');

	wp_deregister_script('jquery');
	wp_register_script('jquery', get_stylesheet_directory_uri() . '/assets/js/jquery.min.js', array(), null, true);
	wp_enqueue_script('jquery');


	wp_enqueue_script('select2.js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js');
	wp_enqueue_script('swiper.js', 'https://cdn.jsdelivr.net/npm/swiper@11.1.4/swiper-bundle.min.js');

	wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array('jquery'), null, true);
});


add_action('wp_enqueue_scripts', 'misha_my_load_more_scripts');

function misha_my_load_more_scripts()
{
	global $wp_query;

	wp_register_script('my_loadmore', get_stylesheet_directory_uri() . '/assets/js/myloadmore.js', array('jquery'), null, true);
	wp_localize_script('my_loadmore', 'misha_loadmore_params', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'posts' => json_encode($wp_query->query_vars),
		'cur_page' => get_query_var('paged') ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	));
	wp_enqueue_script('my_loadmore');
}
// Добавление скриптов и стилей


//
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-logo');

register_nav_menus([
	'header-menu' => 'Верхняя область',
	'language-menu' => 'Выбор языка',
	'footer-menu' => 'Нижняя область',
]);
//

// custom logo//
function mytheme_customize_register($wp_customize)
{
	// Настройка для логотипа хедера
	$wp_customize->add_setting('header_logo');

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_logo', array(
		'label' => __('Header Logo', 'mytheme'),
		'section' => 'title_tagline',
		'settings' => 'header_logo',
	)));

	// Настройка для логотипа футера
	$wp_customize->add_setting('footer_logo');

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
		'label' => __('Footer Logo', 'mytheme'),
		'section' => 'title_tagline',
		'settings' => 'footer_logo',
	)));
}
add_action('customize_register', 'mytheme_customize_register');
// custom logo//


// Отображение SVG
add_filter('upload_mimes', 'svg_upload_allow');
# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);
# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
{
	// WP 5.1 +
	if (version_compare($GLOBALS['wp_version'], '5.1.0', '>=')) {
		$dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
	} else {
		$dosvg = ('.svg' === strtolower(substr($filename, -4)));
	}
	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if ($dosvg) {
		// разрешим
		if (current_user_can('manage_options')) {
			$data['ext'] = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext'] = false;
			$data['type'] = false;
		}
	}
	return $data;
}
// Отображение SVG





// Custom post
function create_custom_post_type()
{
	register_post_type(
		'services',
		array(
			'labels' => array(
				'name' => __('Сервисы'),
				// Назва типу постів у адмінці
				'singular_name' => __('Сервис'),
				// Назва одного поста
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'services_post'),
			// Власний slug для URL
			'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
		)
	);
}

add_action('init', 'create_custom_post_type');
// Custom post


// Додати таксономію "Category" для типу постів "services"
function create_custom_taxonomy()
{
	$labels = array(
		'name' => __('Категории Сервисов'), // Назва таксономії в адмінці
		'singular_name' => __('Категория Сервисов'), // Назва одного терміну
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'hierarchical' => true, // Це робить таксономію ієрархічною, схожою на категорії
		'rewrite' => array('slug' => 'services_category'), // Власний slug для URL
		'show_admin_column' => true, // Показувати колонку "Категорія" в адмінці
	);

	register_taxonomy('services_category', 'services', $args);
}

add_action('init', 'create_custom_taxonomy');
// Додати таксономію "Category" для типу постів "services"



// LOADMORE
add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler');

function misha_loadmore_ajax_handler()
{
	$args = json_decode(stripslashes($_POST['query']), true);
	$args['paged'] = $_POST['page'] + 1;
	$args['post_status'] = 'publish';

	$query = new WP_Query($args);

	if ($query->have_posts()) :
		while ($query->have_posts()) : $query->the_post();
			get_template_part('content-ajax'); // Убедитесь, что этот файл существует и корректен
		endwhile;
	endif;

	die;
}
// LOADMORE


// register sidebar
function custom_footer_widget()
{
	register_sidebar(array(
		'name' => __('Header center', 'your-theme-textdomain'),
		'id' => 'header_center',
		'description' => __('Widgets for the header', 'your-theme-textdomain'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => ' </h4></div>',
	));
	register_sidebar(array(
		'name' => __('Footer First  column', 'your-theme-textdomain'),
		'id' => 'footer_1',
		'description' => __('Widgets for the footer', 'your-theme-textdomain'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => ' </h4></div>',
	));
	register_sidebar(array(
		'name' => __('Footer third column', 'your-theme-textdomain'),
		'id' => 'footer_3',
		'description' => __('Widgets for the footer', 'your-theme-textdomain'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => ' </h4></div>',
	));
}
add_action('widgets_init', 'custom_footer_widget');
//

// отключение обертки <p> в Contact Gorm 7
add_filter('wpcf7_autop_or_not', '__return_false');
// отключение обертки <p> в Contact Gorm 7
