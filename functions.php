<?php




function tofra_wp_boot_scripts() {

	wp_enqueue_style( 'wp_boot-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'wp_boot-style', get_stylesheet_uri() );
	wp_enqueue_style( 'wp_boot-font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.css' );

	wp_enqueue_script( 'wp_boot-jquery', get_template_directory_uri() . '/js/jquery-slim.min.js','','', TRUE  );
	wp_enqueue_script( 'wp_boot-popper', get_template_directory_uri() . '/js/popper.min.js','','', TRUE  );
	wp_enqueue_script( 'wp_boot-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'),'', TRUE  );
	wp_enqueue_script( 'wp_boot-theme', get_template_directory_uri() . '/js/theme.js',array('jquery','wp_boot-bootstrap'),'', TRUE  );

	//wp_enqueue_script( 'tofraboot-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	//wp_enqueue_script( 'tofraboot-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tofra_wp_boot_scripts' );


/**
 * Disabling the Admin bar.
 */
//add_filter('show_admin_bar', '__return_false');


add_theme_support('menus');
add_theme_support('post-thumbnails');

function register_tofra_wp_boot_menus() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' )
		)
	);
}

add_action('init', 'register_tofra_wp_boot_menus');

// Register Custom Navigation Walker
require_once get_template_directory() . '/wp-bootstrap-navwalker.php';

function create_tofra_wp_boot_widget($name, $id, $description) {

	register_sidebar( array(
		'name' => __( $name ),
		'id' => $id,
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3><hr>'
	)); 
}

create_tofra_wp_boot_widget( 'Front Page Left', 'front-left', 'Displays on the left of the homepage' );
create_tofra_wp_boot_widget( 'Front Page Right', 'front-right', 'Displays on the right of the homepage' );
create_tofra_wp_boot_widget( 'Front Page Middle', 'front-middle', 'Displays on the middle of the homepage' );

create_tofra_wp_boot_widget( 'Page Sidebar', 'page', 'Displays on the page' );
create_tofra_wp_boot_widget( 'Blog Sidebar', 'blog', 'Displays on the blog' );