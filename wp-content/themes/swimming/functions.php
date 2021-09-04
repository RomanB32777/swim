<?php

add_action('wp_enqueue_scripts', 'style_theme'); /*Для подключения внешних (твоих) css файлов*/

add_action('wp_enqueue_scripts', 'scripts_theme'); /* Для подключения внешних (твоих) скриптов */

add_action('after_setup_theme', 'theme_register_nav_menu'); /* Для подключения твоих меню, и не только.. */
add_theme_support('post-formats', array('aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status', 'link', 'video')); // Возможность добавлять к посту формат - стандартный пост, заметка, галерея, видео и т.д.

add_theme_support('post-thumbnails', array('post', 'federation', 'slider'));

function enqueue_versioned_style( $handle, $src = false, $deps = array(), $media = 'all' ) {
	wp_enqueue_style( $handle, get_stylesheet_directory_uri() . $src, $deps = array(), filemtime( get_stylesheet_directory() . $src ), $media );
}

function style_theme()
{
    enqueue_versioned_style('style', '/style.css');
	wp_enqueue_style('carousel', get_template_directory_uri() . '/css/owl.carousel.min.css');
	wp_enqueue_style('defaultCarousel', get_template_directory_uri() . '/css/owl.theme.default.min.css');
	//wp_enqueue_style('lightbox', get_template_directory_uri() . '/css/lightbox.css');
}

// function my_scripts_method()
// {
// 	wp_register_script('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js', false, null);
// 	wp_enqueue_script('jquery');
// 	$script_url = plugins_url('/js/owl.carousel.min.js', __FILE__);
// 	wp_enqueue_script('custom-script', $script_url, array('jquery'));
// }

function scripts_theme()
{
	wp_register_script('jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', false, null);
	wp_enqueue_script('jquery');
	wp_enqueue_script('owlCarousel', get_template_directory_uri() . '/js/owl.carousel.min.js');
	wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js');
};

function register_navwalker()
{
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

function theme_register_nav_menu()
{
	register_nav_menu('header', 'Меню в шапке');
	register_nav_menu('down', 'Меню в футере');
	add_theme_support('title-tag'); // title-tag - из всех header-ов можно удалить title, а Wordpress сам будет генерировать title за тебя

	add_theme_support('post-thumbnails', array('post', 'news')); // добавление превью к статье

	//add_image_size('auto_thumb', 189, 140, true); // Создание превью твоего размера (второй и третий параметр ширина и высота соотвественно, третий параметр отвечает за жесткое обрезание картинки, если она не подходит под твои размеры превью)

	//add_image_size('auto_slide', 940, 344, true); // Создание превью твоего размера (второй и третий параметр ширина и высота соотвественно, третий параметр отвечает за жесткое обрезание картинки, если она не подходит под твои размеры превью)

	add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);
	function my_navigation_template($template, $class)
	{
		/*
		Вид базового шаблона:
		<nav class="navigation %1$s" role="navigation">
			<h2 class="screen-reader-text">%2$s</h2>
			<div class="nav-links">%3$s</div>
		</nav>
		*/

		return '
		<nav class="navigation %1$s" role="navigation">
			<div class="nav-links">%3$s</div>
		</nav>    
		';
	}
}

add_action('widgets_init', 'register_my_menu_widgets');

function register_my_menu_widgets()
{
	register_sidebar(array(
		'name'          => 'Боковая колонка',
		'id'            => "true_side",
		'description'   => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.',
		'before_widget' => '<div id="%1$s" class="side widget %2$s">',
		'after_widget'  => '</div>',
		'before_title' => '<h4 class="mb-3"><span class="text-muted">',
		'after_title' => '</span></h4>'
	));

	register_sidebar(array(
		'name'          => 'Нижняя часть сайта',
		'id'            => "footer_bar",
		'description'   => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title' => '',
		'after_title' => ''
	));
}

add_filter('excerpt_length', function () {
	return 40;
});

function new_excerpt_more($more)
{
	global $post;
	return '... <div><a class="moretag btn btn-primary btn-sm" role="button" href="' . get_permalink($post->ID) . '"> Читать далее</a></div>';
}
add_filter('excerpt_more', 'new_excerpt_more');


// лого при входе

add_action( 'login_enqueue_scripts', 'wpspec_custom_login_logo' );

function wpspec_custom_login_logo() {
	?>
	<style>
		body.login h1 a {
			background-image: url(https://swim-bryansk.ru/wp-content/uploads/2020/04/logo-fpbo.png);
			width: 100px;
			height: 100px;
		}
	</style>
	<?php
}


add_action('init', 'register_post_types');

function register_post_types()
{
	register_post_type('competitions', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Соревнования', // основное название для типа записи
			'singular_name'      => 'Соревнования', // название для одной записи этого типа
			'add_new'            => 'Добавить соревнование', // для добавления новой записи
			'add_new_item'       => 'Добавление соревнования', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование соревнование', // для редактирования типа записи
			'new_item'           => 'Новое соревнование', // текст новой записи
			'view_item'          => 'Смотреть соревнование', // для просмотра записи этого типа.
			'search_items'       => 'Искать соревнование', // для поиска по этим типам записи
			'not_found'          => 'Соревнование не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Соревнование не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Соревнования', // название меню
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => false, // зависит от public, то есть исключить из поиска при true!!!
		'show_ui'             => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-awards', 
		'hierarchical'        => false,
		'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'      => array(),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	));

	register_post_type('documents', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Документы',
			'singular_name'      => 'Документы',
			'add_new'            => 'Добавить документ',
			'add_new_item'       => 'Добавление документа',
			'edit_item'          => 'Редактирование документа',
			'new_item'           => 'Новый документ',
			'view_item'          => 'Смотреть документ',
			'search_items'       => 'Искать документ',
			'not_found'          => 'Документ не найден',
			'not_found_in_trash' => 'Документ не найден в корзине',
			'parent_item_colon'  => '',
			'menu_name'          => 'Документы',
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'show_in_rest'        => true,
		'rest_base'           => null,
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-media-text',
		'hierarchical'        => false,
		'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'      => array('type_document'),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	));


	register_post_type('federation', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Федерация',
			'singular_name'      => 'Федерация',
			'add_new'            => 'Добавить человека',
			'add_new_item'       => 'Добавление человека',
			'edit_item'          => 'Редактирование человека',
			'new_item'           => 'Новый человек',
			'view_item'          => 'Смотреть человека',
			'search_items'       => 'Искать человека',
			'not_found'          => 'Человек не найден',
			'not_found_in_trash' => 'Человек не найден в корзине',
			'parent_item_colon'  => '',
			'menu_name'          => 'Федерация',
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'show_in_rest'        => true,
		'rest_base'           => null,
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-id',
		'hierarchical'        => false,
		'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
		'taxonomies'          => array('sport_organization', 'position'),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	));


	register_post_type('media_content', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Медиа',
			'singular_name'      => 'Медиа',
			'add_new'            => 'Добавить медиа',
			'add_new_item'       => 'Добавление медиа',
			'edit_item'          => 'Редактирование медиа',
			'new_item'           => 'Новое медиа',
			'view_item'          => 'Смотреть медиа',
			'search_items'       => 'Искать медиа',
			'not_found'          => 'Медиа не найдена',
			'not_found_in_trash' => 'Медиа не найдена в корзине',
			'parent_item_colon'  => '',
			'menu_name'          => 'Медиа',
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'show_in_rest'        => true,
		'rest_base'           => null,
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-images-alt2',
		'hierarchical'        => false,
		'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'      => array('type_media'),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	));
}

add_action('init', 'create_taxonomy');

function create_taxonomy()
{
	// список параметров: http://wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy('type_document', array('documents'), array(
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Тип документа',
			'singular_name'     => 'Тип',
			'search_items'      => 'Найти тип',
			'all_items'         => 'Все типы',
			'view_item '        => 'Смотреть тип',
			'parent_item'       => 'Родительский тип',
			'parent_item_colon' => 'Родительский тип:',
			'edit_item'         => 'Изменить тип',
			'update_item'       => 'Обновить тип',
			'add_new_item'      => 'Добавить новый тип',
			'new_item_name'     => 'Новое имя типа',
			'menu_name'         => 'Типы документов',
		),
		'description'           => 'Тип документа', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'hierarchical'          => true, // Есть ли у этой таксономии дочерник ветки (таксономии)
		//'update_count_callback' => '_update_post_term_count',
		'rewrite'               => true,
	));

	register_taxonomy('sport_organization', array('federation'), array(
		'label'                 => '',
		'labels'                => array(
			'name'              => 'Спортивная организация',
			'singular_name'     => 'Спортивная организация',
			'search_items'      => 'Найти спортивная организация',
			'all_items'         => 'Все спортивные организации',
			'view_item '        => 'Смотреть спортивную организацию',
			'parent_item'       => 'Родительский спортивная организация',
			'parent_item_colon' => 'Родительский спортивная организация',
			'edit_item'         => 'Изменить спортивную организацию',
			'update_item'       => 'Обновить спортивную организацию',
			'add_new_item'      => 'Добавить новую спортивную организацию',
			'new_item_name'     => 'Новое имя спортивной организации',
			'menu_name'         => 'Спортивные организации',
		),
		'description'           => 'Спортивная организация',
		'public'                => true,
		'publicly_queryable'    => null,
		'hierarchical'          => true,
		'rewrite'               => true,
	));


	register_taxonomy('position', array('federation'), array(
		'label'                 => '',
		'labels'                => array(
			'name'              => 'Должность',
			'singular_name'     => 'Должность',
			'search_items'      => 'Найти должность',
			'all_items'         => 'Все должности',
			'view_item '        => 'Смотреть должность',
			'parent_item'       => 'Родительская должность',
			'parent_item_colon' => 'Родительская должность:',
			'edit_item'         => 'Изменить должность',
			'update_item'       => 'Обновить должность',
			'add_new_item'      => 'Добавить новую должность',
			'new_item_name'     => 'Новое имя должности',
			'menu_name'         => 'Должности',
		),
		'description'           => 'Должность',
		'public'                => true,
		'publicly_queryable'    => null,
		'hierarchical'          => true,
		'rewrite'               => true,
	));


	register_taxonomy('type_media', array('media_content'), array(
		'label'                 => '',
		'labels'                => array(
			'name'              => 'Тип медиа',
			'singular_name'     => 'Тип медиа',
			'search_items'      => 'Найти тип',
			'all_items'         => 'Все типы',
			'view_item '        => 'Смотреть тип',
			'parent_item'       => 'Родительский тип',
			'parent_item_colon' => 'Родительский тип:',
			'edit_item'         => 'Изменить тип',
			'update_item'       => 'Обновить тип',
			'add_new_item'      => 'Добавить новый тип',
			'new_item_name'     => 'Новое имя типа',
			'menu_name'         => 'Тип медиа',
		),
		'description'           => 'Тип медиа',
		'public'                => true,
		'publicly_queryable'    => null,
		'hierarchical'          => true,
		'rewrite'               => true,
	));
}



function devise_number_displayed_posts($query)
{
	if (is_admin() || !$query->is_main_query()) {
		return;
	}
	if (is_tax( 'type_document' ) || is_tax( 'sport_organization' ) || is_tax( 'type_media' )) {
		$query->set('posts_per_page', -1);
		return;
	}
}
add_action('pre_get_posts', 'devise_number_displayed_posts', 1);



function the_truncated_post($symbol_amount)
{
	$filtered = strip_tags(preg_replace('@<style[^>]*?>.*?</style>@si', '', preg_replace('@<script[^>]*?>.*?</script>@si', '', apply_filters('the_content', get_the_content()))));
	echo substr($filtered, 0, strrpos(substr($filtered, 0, $symbol_amount), ' ')) . '...';
}

class trueTopPostsWidget extends WP_Widget
{

	/*
	 * создание виджета
	 */
	function __construct()
	{
		parent::__construct(
			'true_top_widget',
			'Последние новости', // заголовок виджета
			array('description' => 'Позволяет вывести посты.') // описание
		);
	}

	/*
	 * фронтэнд виджета
	 */

	public function widget($args, $instance)
	{
		$title =  $instance['title']; // к заголовку применяем фильтр (необязательно)
		$posts_per_page = $instance['posts_per_page'];

		//if (!is_front_page()) {
		echo $args['before_widget'];

		if (!empty($title))
			echo '<h4 class="mb-3"><span class="text-muted">' . $title . '</span></h4>';


		$q = new WP_Query("posts_per_page=$posts_per_page&orderby=date&order=DESC");

		if ($q->have_posts()) : ?>
			<div class="list-group">
				<?php while ($q->have_posts()) : $q->the_post(); ?>
					<div class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-100 justify-content-between">
							<a href="<?php the_permalink() ?>">
								<h5 class="mb-1"><?php the_title(); ?></h5>
							</a>
							<small><?php the_time('d.m.Y') ?></small>

						</div>
						<p class="mb-1"><?php the_truncated_post(300); ?></p>
						<div class="text-right">
							<a href="<?php echo $q->post->guid ?>">Подробнее</a>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif;
		wp_reset_postdata();

		echo $args['after_widget'];
		//}
	}





	/*
	 * бэкэнд виджета
	 */
	public function form($instance)
	{
		if (isset($instance['title'])) {
			$title = $instance['title'];
		}
		if (isset($instance['posts_per_page'])) {
			$posts_per_page = $instance['posts_per_page'];
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Заголовок</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('posts_per_page'); ?>">Количество постов:</label>
			<input id="<?php echo $this->get_field_id('posts_per_page'); ?>" name="<?php echo $this->get_field_name('posts_per_page'); ?>" type="text" value="<?php echo ($posts_per_page) ? esc_attr($posts_per_page) : '5'; ?>" size="3" />
		</p>
		<?php
	}

	/*
	 * сохранение настроек виджета
	 */
	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		$instance['posts_per_page'] = (is_numeric($new_instance['posts_per_page'])) ? $new_instance['posts_per_page'] : '5'; // по умолчанию выводятся 5 постов
		return $instance;
	}
}


class trueTopCompetitionsWidget extends WP_Widget
{

	function __construct()
	{
		parent::__construct(
			'true_сompetitions_widget',
			'Последние соревнования',
			array('description' => 'Позволяет вывести последние соревнования.')
		);
	}

	/*
	 * фронтэнд виджета
	 */

	public function widget($args, $instance)
	{
		$title =  $instance['title']; // к заголовку применяем фильтр (необязательно)
		$posts_per_page = $instance['posts_per_page'];

		echo $args['before_widget'];

		if (!empty($title))
			echo '<h4 class="mb-3"><span class="text-muted">' . $title . '</span></h4>';

		$q = new WP_Query("post_type=competitions&posts_per_page=$posts_per_page&orderby=date&order=DESC");

		if ($q->have_posts()) : ?>
			<div class="list-group">
				<?php while ($q->have_posts()) : $q->the_post(); ?>
					<div class="list-group-item list-group-item-action flex-column align-items-start">
						<div class=" w-100 ">
							<a href="<?php the_permalink() ?>">
								<h5 class="mb-1"><?php the_title(); ?></h5>
							</a>
							<small><span class="badge badge-primary badge-pill"> <?php echo get_field('begin_date') ?> - <?php echo get_field('end_date') ?></span></small>

						</div>
						<p class="mb-1"> Место проведения: <?php echo get_field('city') ?> </p>
						<div class="text-right">
							<a href="<?php echo $q->post->guid ?>">Подробнее</a>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif;
		wp_reset_postdata();

		echo $args['after_widget'];
	}


	public function form($instance)
	{
		if (isset($instance['title'])) {
			$title = $instance['title'];
		}
		if (isset($instance['posts_per_page'])) {
			$posts_per_page = $instance['posts_per_page'];
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Заголовок</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('posts_per_page'); ?>">Количество соревнований:</label>
			<input id="<?php echo $this->get_field_id('posts_per_page'); ?>" name="<?php echo $this->get_field_name('posts_per_page'); ?>" type="text" value="<?php echo ($posts_per_page) ? esc_attr($posts_per_page) : '5'; ?>" size="3" />
		</p>
	<?php
	}


	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		$instance['posts_per_page'] = (is_numeric($new_instance['posts_per_page'])) ? $new_instance['posts_per_page'] : '5';
		return $instance;
	}
}


class searchPostsWidget extends WP_Widget
{

	function __construct()
	{
		parent::__construct(
			'search_posts_widget',
			'Поиск',
			array('description' => 'Поиск по сайту.')
		);
	}


	public function widget($args, $instance)
	{
		$title =  $instance['title'];

		echo $args['before_widget'];
		if (!empty($title))
			echo  $args['before_title'] . '<h4 class="mb-3"><span class="text-muted">' . $title . '</span></h4>' . $args['after_title']; ?>

		<nav class="navbar p-0">
		    <form class="form-inline" role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
		        <div class="input-group">
		            <input type="text" class="form-control" placeholder="" name="s" aria-label="Search" value="<?php the_search_query(); ?>" aria-describedby="basic-addon2">
		            <div class="input-group-append">
		                <button class="btn btn-outline-primary" type="submit" value="Поиск">Поиск</button>
		            </div>
		        </div>
		    </form>
		</nav> 

	<?php echo $args['after_widget'];
	}

	public function form($instance)
	{
		if (isset($instance['title'])) {
			$title = $instance['title'];
		}
	?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Заголовок</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>

<?php
	}

	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		return $instance;
	}
}


/*
 * регистрация виджета
 */
function true_top_posts_widget_load()
{
	register_widget('trueTopPostsWidget');
	register_widget('trueTopCompetitionsWidget');
	register_widget('searchPostsWidget');
}
add_action('widgets_init', 'true_top_posts_widget_load');

function bs_disable_default_widgets()
{
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Recent_Posts');
}
add_action('widgets_init', 'bs_disable_default_widgets', 11);

/*
 * стилизация пагинации
 */

function wiaw_pagenavi_to_bootstrap($html)
{
	$out = '';
	$out = str_replace('<div', '', $html);
	$out = str_replace('class=\'wp-pagenavi\' role=\'navigation\'>', '', $out);
	$out = str_replace('<a', '<li class="page-item"><a class="page-link"', $out);
	$out = str_replace('</a>', '</a></li>', $out);
	$out = str_replace('<span aria-current=\'page\' class=\'current\'', '<li aria-current="page" class="page-item active"><span class="page-link current"', $out);
	$out = str_replace('<span class=\'pages\'', '<li class="page-item"><span class="page-link pages"', $out);
	$out = str_replace('<span class=\'extend\'', '<li class="page-item"><span class="page-link extend"', $out);
	$out = str_replace('</span>', '</span></li>', $out);
	$out = str_replace('</div>', '', $out);
	return '<ul class="pagination" role="navigation">' . $out . '</ul>';
}
add_filter('wp_pagenavi', 'wiaw_pagenavi_to_bootstrap', 10, 2);


// меняем порядок постов
// function ord_custom_query( $query ) {
        
//     if( $query->is_main_query() && ! is_admin() && $query->is_category(28) ) {// условие

//         $query->set( 'orderby', 'date' );
//         $query->set( 'order', 'DASC' );
//     }
// }
// add_action( 'pre_get_posts', 'ord_custom_query' );
