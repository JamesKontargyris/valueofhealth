<?php
/**
 * Value of Health functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Value_of_Health
 */

if ( ! function_exists( 'value_of_health_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function value_of_health_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Value of Health, use a find and replace
	 * to change 'value-of-health' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'value-of-health', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'value-of-health' ),
		'secondary' => esc_html__( 'Secondary', 'value-of-health' ),
	) );

	// Image sizes
	add_image_size('news-extract', 500, 300, true);
	add_image_size('news-banner', 1000, 500, true);
	add_image_size('download-cover', 420, 600, true);

	// Apply CSS stylesheet to WYSIWYG back-end editor
	add_editor_style( 'style.css' );

	// unregister widgets we won't use
	function remove_default_widgets() {
		unregister_widget('WP_Widget_Pages');
		unregister_widget('WP_Widget_Calendar');
		unregister_widget('WP_Widget_Archives');
		unregister_widget('WP_Widget_Links');
		unregister_widget('WP_Widget_Meta');
		unregister_widget('WP_Widget_Search');
//    unregister_widget('WP_Widget_Text');
		unregister_widget('WP_Widget_Categories');
		unregister_widget('WP_Widget_Recent_Posts');
		unregister_widget('WP_Widget_Recent_Comments');
		unregister_widget('WP_Widget_RSS');
		unregister_widget('WP_Widget_Tag_Cloud');
//    unregister_widget('WP_Nav_Menu_Widget');
	}
	add_action('widgets_init', 'remove_default_widgets', 11);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

}
endif;
add_action( 'after_setup_theme', 'value_of_health_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function value_of_health_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'value_of_health_content_width', 1000 );
}
add_action( 'after_setup_theme', 'value_of_health_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function value_of_health_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'value-of-health' ),
		'id'            => 'main-sidebar',
		'description'   => esc_html__( 'Add widgets to the main sidebar here.', 'value-of-health' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s sidebar-block">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title sidebar-block__title">',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'value_of_health_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function value_of_health_scripts() {
	wp_enqueue_style( 'value-of-health-style', get_stylesheet_uri() );

	wp_enqueue_script( 'value-of-health-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '20170723', true );
	wp_enqueue_script( 'value-of-health-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'value-of-health-site-js', get_template_directory_uri() . '/js/site.js', array(), '20170723', true );

	wp_enqueue_script( 'value-of-health-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'value-of-health-font-awesome', 'https://use.fontawesome.com/e1da113c32.js', array(), '20170723', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'value_of_health_scripts' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



// FUNCTIONALITY

/**
 * Add custom post types to category and tag archives.
 *
 * @param $query
 *
 * @return mixed
 */
function namespace_add_custom_types( $query ) {
	if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
		$query->set( 'post_type', array(
			'post', 'nav_menu_item', 'news'
		));
		return $query;
	}
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );


// HELPER FUNCTIONS

/**
 * Truncate text
 *
 * @param $text
 * @param $limit
 *
 * @param string $type
 *
 * @return string
 */
function limit_text($text, $limit, $type = 'word') {
	$text = trim($text);

	if($type == 'char') {
		if (strlen($text) > $limit) {
			$text = wordwrap($text, $limit);
			$text = explode("\n", $text, 2);
			$text = $text[0] . '...';
		}
	} else {
		if (str_word_count($text, 0) > $limit) {
			$words = str_word_count($text, 2);
			$pos = array_keys($words);
			$text = substr($text, 0, $pos[$limit]) . '...';
		}
	}

	return $text;
}

/**
 * Process categories and lay them out in a nice, linked row with commas
 *
 * @param array $categories
 * @param string $category_item_class
 * @param string $category_link_class
 *
 * @return string
 */
function inline_categories($categories = [], $category_item_class = 'news__category', $category_link_class = 'news__category-link')
{
	$categories_output = "";

	if(is_array($categories)) {
		foreach($categories as $category) {
			$categories_output .= "<span class=\"$category_item_class\"><a class=\"$category_link_class\" href=\"" . get_category_link($category->term_id) . "\">" . $category->name . "</a></span>"; // CSS :after pseudo-class takes care of commas
		}
	}

	return $categories_output;
}


// QUERY FUNCTIONS

function get_latest_news( $count = 3, $offset = 0, $ignore_ids = [] ) {
	$args = [
		'post_status'    => 'publish',
		'post_type'      => 'news',
		'orderby'        => 'date',
		'order'          => 'DESC',
		'posts_per_page' => $count,
		'post__not_in'   => $ignore_ids,
		'offset'         => $offset,
	];

	return new WP_Query( $args );
}
