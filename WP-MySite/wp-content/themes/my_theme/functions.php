<?php
add_action( 'wp_enqueue_scripts', 'style_theme' );
add_action( 'wp_footer', 'scripts_theme' );
add_action( 'after_setup_theme', 'myMenu' );
add_action( 'init', 'register_post_types' );
add_action( 'init', 'create_taxonomy' );

//регистрация нового меню
function myMenu(){
	register_nav_menu( 'top', 'Верхнее меню( в шапке )' );
	register_nav_menu( 'footer_nav', 'Нижнее меню( в подвале )' );
}

//
function style_theme( ){
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'default', get_template_directory_uri() . '/assets/css/default.css' );
	wp_enqueue_style( 'layout', get_template_directory_uri() . '/assets/css/layout.css' );
	wp_enqueue_style( 'media-quaries', get_template_directory_uri() . '/assets/css/media-queries.css' );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js' );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js' );
}

//
function scripts_theme(){
	wp_deregister_script('jquery');
	wp_register_script('jquery-web', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, null);
	wp_enqueue_script('jquery-web');
	wp_register_script('jquery-migrate', get_template_directory_uri() . '/assets/js/jquery-migrate-1.2.1.min.js', false, null);
	wp_enqueue_script('jquery-migrate');
	wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery-1.10.2.min.js', false, null);
	wp_enqueue_script('jquery');
}

//функция получения пути к картинкам
function get_img_path(){
	echo get_template_directory_uri() . '/assets/images/';
}

add_filter( 'single_template', function ( $single_template ) {
 
    $parent     = '1'; //Здесь вставляем id категории(рубрики) для которой хотите изменить шаблон у детальной страницы записи
    $categories = get_categories( 'child_of=' . $parent );
    $cat_names  = wp_list_pluck( $categories, 'name' );
 
    if ( has_category( 'movies' ) || has_category( $cat_names ) ) {
        $single_template = get_template_directory_uri() . '/posts-template.php'; // название файла шаблона
    }
    return $single_template;
}, PHP_INT_MAX, 2 );

//регистрируем новый тип постов
function register_post_types(){
	register_post_type( 'methodical', [
		'label'  => null,
		'labels' => [
			'name'               => 'Методичка', // основное название для типа записи
			'singular_name'      => 'Методичка', // название для одной записи этого типа
			'add_new'            => 'Додати методичку', // для добавления новой записи
			'add_new_item'       => 'Додавання методички', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редагування методички', // для редактирования типа записи
			'new_item'           => 'Нова методичка', // текст новой записи
			'view_item'          => 'Дивитись методичку', // для просмотра записи этого типа.
			'search_items'       => 'Шукати методичку', // для поиска по этим типам записи
			'not_found'          => 'Не знайдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не знайдено в кошику', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Методична скринька', // название меню
		],
		'description'         => 'Методична скринька в меню на головній сторінці',
		'public'              => true,
		// 'publicly_queryable'  => true, // зависит от public
		// 'exclude_from_search' => true, // зависит от public
		// 'show_ui'             => true, // зависит от public
		// 'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => dashicons-admin-post,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','author','excerpt','custom-fields','revisions','page-attributes','post-formats' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['metTax','category'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
	register_post_type( 'parents', [
		'label'  => null,
		'labels' => [
			'name'               => 'Батькам', // основное название для типа записи
			'singular_name'      => 'Батькам', // название для одной записи этого типа
			'add_new'            => 'Додати пост', // для добавления новой записи
			'add_new_item'       => 'Додавання поста', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редагування поста', // для редактирования типа записи
			'new_item'           => 'Новий пост', // текст новой записи
			'view_item'          => 'Дивитись пост', // для просмотра записи этого типа.
			'search_items'       => 'Шукати пост', // для поиска по этим типам записи
			'not_found'          => 'Не знайдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не знайдено в кошику', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Батькам', // название меню
		],
		'description'         => 'Для батьків в меню на головній сторінці',
		'public'              => true,
		// 'publicly_queryable'  => true, // зависит от public
		// 'exclude_from_search' => true, // зависит от public
		// 'show_ui'             => true, // зависит от public
		// 'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => dashicons-admin-post,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','author','excerpt','custom-fields','revisions','page-attributes','post-formats' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['metTax','category'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
	register_post_type( 'achive', [
		'label'  => null,
		'labels' => [
			'name'               => 'Досягнення', // основное название для типа записи
			'singular_name'      => 'Методичка', // название для одной записи этого типа
			'add_new'            => 'Додати досягнення', // для добавления новой записи
			'add_new_item'       => 'Додавання досягнення', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редагування досягнення', // для редактирования типа записи
			'new_item'           => 'Нове досягнення', // текст новой записи
			'view_item'          => 'Дивитись досягнення', // для просмотра записи этого типа.
			'search_items'       => 'Шукати досягнення', // для поиска по этим типам записи
			'not_found'          => 'Не знайдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не знайдено в кошику', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Досягнення', // название меню
		],
		'description'         => 'Досягнення в меню на головній сторінці',
		'public'              => true,
		// 'publicly_queryable'  => true, // зависит от public
		// 'exclude_from_search' => true, // зависит от public
		// 'show_ui'             => true, // зависит от public
		// 'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => dashicons-admin-post,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','author','excerpt','custom-fields','revisions','page-attributes','post-formats' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['metTax','category'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
	register_post_type( 'workshop', [
		'label'  => null,
		'labels' => [
			'name'               => 'Майстерня', // основное название для типа записи
			'singular_name'      => 'Виріб', // название для одной записи этого типа
			'add_new'            => 'Додати виріб', // для добавления новой записи
			'add_new_item'       => 'Додавання виробу', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редагування виробу', // для редактирования типа записи
			'new_item'           => 'Новий виріб', // текст новой записи
			'view_item'          => 'Дивитись виріб', // для просмотра записи этого типа.
			'search_items'       => 'Шукати виріб', // для поиска по этим типам записи
			'not_found'          => 'Не знайдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не знайдено в кошику', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Майстерня', // название меню
		],
		'description'         => 'Майстерня в меню на головній сторінці',
		'public'              => true,
		// 'publicly_queryable'  => true, // зависит от public
		// 'exclude_from_search' => true, // зависит от public
		// 'show_ui'             => true, // зависит от public
		// 'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => dashicons-admin-post,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','author','excerpt','custom-fields','revisions','page-attributes','post-formats' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['metTax','category'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
	register_post_type( 'teatr', [
		'label'  => null,
		'labels' => [
			'name'               => 'Ляльковий театр', // основное название для типа записи
			'singular_name'      => 'Пост', // название для одной записи этого типа
			'add_new'            => 'Додати пост', // для добавления новой записи
			'add_new_item'       => 'Додавання посту', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редагування посту', // для редактирования типа записи
			'new_item'           => 'Новий пост', // текст новой записи
			'view_item'          => 'Дивитись пост', // для просмотра записи этого типа.
			'search_items'       => 'Шукати пости в Ляльковому', // для поиска по этим типам записи
			'not_found'          => 'Не знайдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не знайдено в кошику', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Ляльковий театр', // название меню
		],
		'description'         => 'Ляльковий театр в головному меню на головній сторінці',
		'public'              => true,
		// 'publicly_queryable'  => true, // зависит от public
		// 'exclude_from_search' => true, // зависит от public
		// 'show_ui'             => true, // зависит от public
		// 'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => dashicons-admin-post,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','author','excerpt','custom-fields','revisions','page-attributes','post-formats' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['metTax','category'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}


// хук для регистрации
function create_taxonomy(){

	// список параметров: wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy( 'metTax', [ 'methodical' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Спойлеры',
			'singular_name'     => 'Спойлер',
			'search_items'      => 'Поиск спойлеров',
			'all_items'         => 'Все спойлеры',
			'view_item '        => 'Просмотреть спойлер',
			'parent_item'       => 'Родительский спойлер',
			'parent_item_colon' => 'Родительский спойлер:',
			'edit_item'         => 'Редактировать спойлер',
			'update_item'       => 'Обновить спойлер',
			'add_new_item'      => 'Добавить новый спойлер',
			'new_item_name'     => 'Новое имя спойлера',
			'menu_name'         => 'Спойлер',
		],
		'description'           => 'Спойлеры на страницах классов', // описание таксономии
		'public'                => true,
		// 'publicly_queryable'    => null, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => true, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => false,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => true, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => true, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
}


