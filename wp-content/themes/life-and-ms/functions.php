<?php
/**
 * Life And MS functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Life_And_MS
 */

if ( ! function_exists( 'life_and_ms_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function life_and_ms_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Life And MS, use a find and replace
	 * to change 'life-and-ms' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'life-and-ms', get_template_directory() . '/languages' );

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
	
	add_image_size( 'single',980, 250, true ); // 220 pixels wide by 180 pixels tall, soft proportional crop mode
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'life-and-ms' ),
	) );

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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'life_and_ms_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'life_and_ms_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function life_and_ms_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'life_and_ms_content_width', 640 );
}
add_action( 'after_setup_theme', 'life_and_ms_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function life_and_ms_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'life-and-ms' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'life-and-ms' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
		register_sidebar( array(
		'name'          => esc_html__( 'Exercises', 'exercises' ),
		'id'            => 'exercises',
		'description'   => esc_html__( 'Add widgets here.', 'life-and-ms' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'Search', 'search' ),
		'id'            => 'search',
		'description'   => esc_html__( 'Add widgets here.', 'life-and-ms' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	
	
}
add_action( 'widgets_init', 'life_and_ms_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function life_and_ms_scripts() {
	wp_enqueue_style( 'life-and-ms-style', get_stylesheet_uri() );

	wp_enqueue_script( 'life-and-ms-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'life-and-ms-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'life_and_ms_scripts' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );

function my_mce_before_init( $settings ) {

    $style_formats = array(

        
        array(
        	'title' => 'Grey Button',
        	'inline' => 'span','boton-gris',
        	    'classes' => 'boton-gris'                                
            
        ),
        
        
        array(
        	'title' => 'Primary Button',
        	'inline' => 'span','primary-button',
        	    'classes' => 'primary-button'                                
            
        ), 

        array(
        	'title' => 'Secondary Button',
        	'inline' => 'span','secondary-button',
        	    'classes' => 'secondary-button'                                
            
        ),                   

        array(
        	'title' => 'Varela Round',
        	'inline' => 'span','varela',
        	    'classes' => 'varela'                                
            
        ),
        
        array(
        	'title' => 'Light',
        	'inline' => 'span','light',
        	    'classes' => 'light'                                
            
        ),
        
        array(
        	'title' => 'Blue',
        	'inline' => 'span','blue',
        	    'classes' => 'blue'                                
            
        ),                              
        
        array(
        	'title' => 'Read More Link',
        	'inline' => 'span','read-link',
        	    'classes' => 'read-link'                                
            
        ),     
       
        array(
        	'title' => 'Source Code',
        	'inline' => 'span','source-code',
        	    'classes' => 'source-code'                                
            
        ),       
        
         array(
        	'title' => 'Uppercase',
        	'inline' => 'span','uppercase',
        	    'classes' => 'uppercase'                                
            
        ),             
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}


// Enable font size & font family selects in the editor
if ( ! function_exists( 'wpex_mce_buttons' ) ) {
	function wpex_mce_buttons( $buttons ) {
		/*array_unshift( $buttons, 'fontselect' ); // Add Font Select*/
		array_unshift( $buttons, 'fontsizeselect' ); // Add Font Size Select
		return $buttons;
	}
}
add_filter( 'mce_buttons_2', 'wpex_mce_buttons' );

// Customize mce editor font sizes
if ( ! function_exists( 'wpex_mce_text_sizes' ) ) {
	function wpex_mce_text_sizes( $initArray ){
		$initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 24px 28px 30px 32px 36px 44px 80px";
		return $initArray;
	}
}
add_filter( 'tiny_mce_before_init', 'wpex_mce_text_sizes' );



if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('<i class="fa fa-arrow-left" aria-hidden="true"></i>'),
    'next_text'       => __('<i class="fa fa-arrow-right" aria-hidden="true"></i>'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      //echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }

}

function my_acf_admin_head() {
	?>
	<style type="text/css">

		.acf-fields.-left > .acf-field > .acf-label {
		    width: 14%;
		}
		.acf-fields.-left > .acf-field::before {
			width: 14%;
		}
		
		.acf-fields.-left > .acf-field > .acf-input {
	   		width: 86%;
		}

	</style>

	<?php
}

add_action('acf/input/admin_head', 'my_acf_admin_head');

?>