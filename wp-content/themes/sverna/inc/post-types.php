<?php
/**
 * Custom post types for the theme.
 *
 * @package sverna
 */

if ( ! defined( 'SVERNA_CPT_VERSION' ) ) {
	define( 'SVERNA_CPT_VERSION', '20260428' );
}

/**
 * Prevent Custom Post Type UI from registering legacy post types saved in the DB.
 */
add_filter( 'cptui_disable_cpt', '__return_true' );

/**
 * Add the parent admin menu for professional content.
 */
function sverna_register_professional_area_menu() {
	add_menu_page(
		esc_html__( 'Professional area', 'sverna' ),
		esc_html__( 'Professional area', 'sverna' ),
		'edit_posts',
		'professional-area',
		'sverna_render_professional_area_menu_page',
		'dashicons-welcome-learn-more',
		20
	);
}
add_action( 'admin_menu', 'sverna_register_professional_area_menu', 5 );

/**
 * Render the parent menu landing page.
 */
function sverna_render_professional_area_menu_page() {
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Professional area', 'sverna' ); ?></h1>
		<p><?php esc_html_e( 'Use the submenu links to manage professional area content.', 'sverna' ); ?></p>
	</div>
	<?php
}

/**
 * Register all custom post types used by the theme.
 */
function sverna_register_post_types() {
	$professional_children = array(
		'papers_month'      => array(
			'plural'   => 'Papers of the month',
			'singular' => 'Paper of the month',
			'slug'     => 'professional-area/papers-of-the-month',
			'icon'     => 'dashicons-media-document',
		),
		'cases_month'       => array(
			'plural'   => 'Cases of the month',
			'singular' => 'Case of the month',
			'slug'     => 'professional-area/cases-of-the-month',
			'icon'     => 'dashicons-portfolio',
		),
		'symposia'          => array(
			'plural'   => 'Symposia',
			'singular' => 'Symposium',
			'slug'     => 'professional-area/symposia',
			'icon'     => 'dashicons-groups',
		),
		'technologists_day' => array(
			'plural'   => 'Technologists day',
			'singular' => 'Technologists day',
			'slug'     => 'professional-area/technologists-day',
			'icon'     => 'dashicons-nametag',
		),
		'seminars'          => array(
			'plural'   => 'Seminars',
			'singular' => 'Seminar',
			'slug'     => 'professional-area/seminars',
			'icon'     => 'dashicons-welcome-learn-more',
		),
		'library'           => array(
			'plural'   => 'Library',
			'singular' => 'Library item',
			'slug'     => 'professional-area/library',
			'icon'     => 'dashicons-book',
		),
	);

	foreach ( $professional_children as $post_type => $config ) {
		sverna_register_single_post_type(
			$post_type,
			$config['plural'],
			$config['singular'],
			array(
				'rewrite_slug' => $config['slug'],
				'show_in_menu' => 'professional-area',
				'menu_icon'    => $config['icon'],
			)
		);
	}

	sverna_register_single_post_type(
		'events',
		'Events',
		'Event',
		array(
			'rewrite_slug'  => 'events',
			'show_in_menu'  => true,
			'menu_icon'     => 'dashicons-calendar-alt',
			'menu_position' => 21,
		)
	);
}
add_action( 'init', 'sverna_register_post_types' );

/**
 * Flush rewrite rules once after CPT structure changes.
 */
function sverna_maybe_flush_cpt_rewrite_rules() {
	if ( get_option( 'sverna_cpt_version' ) === SVERNA_CPT_VERSION ) {
		return;
	}

	flush_rewrite_rules();
	update_option( 'sverna_cpt_version', SVERNA_CPT_VERSION, false );
}
add_action( 'admin_init', 'sverna_maybe_flush_cpt_rewrite_rules' );

/**
 * Flush rewrite rules after theme activation.
 */
function sverna_flush_rewrite_rules_on_theme_switch() {
	sverna_register_post_types();
	flush_rewrite_rules();
	update_option( 'sverna_cpt_version', SVERNA_CPT_VERSION, false );
}
add_action( 'after_switch_theme', 'sverna_flush_rewrite_rules_on_theme_switch' );

/**
 * Register a single public post type with shared defaults.
 *
 * @param string $post_type Post type key.
 * @param string $plural Plural label.
 * @param string $singular Singular label.
 * @param array  $overrides Argument overrides.
 */
function sverna_register_single_post_type( $post_type, $plural, $singular, $overrides = array() ) {
	if ( post_type_exists( $post_type ) ) {
		return;
	}

	$plural_label   = esc_html( $plural );
	$singular_label = esc_html( $singular );

	$labels = array(
		'name'                  => $plural_label,
		'singular_name'         => $singular_label,
		'menu_name'             => $plural_label,
		'name_admin_bar'        => $singular_label,
		'add_new'               => esc_html__( 'Add New', 'sverna' ),
		'add_new_item'          => sprintf( esc_html__( 'Add New %s', 'sverna' ), $singular_label ),
		'new_item'              => sprintf( esc_html__( 'New %s', 'sverna' ), $singular_label ),
		'edit_item'             => sprintf( esc_html__( 'Edit %s', 'sverna' ), $singular_label ),
		'view_item'             => sprintf( esc_html__( 'View %s', 'sverna' ), $singular_label ),
		'all_items'             => sprintf( esc_html__( 'All %s', 'sverna' ), $plural_label ),
		'search_items'          => sprintf( esc_html__( 'Search %s', 'sverna' ), $plural_label ),
		'not_found'             => sprintf( esc_html__( 'No %s found.', 'sverna' ), strtolower( $plural_label ) ),
		'not_found_in_trash'    => sprintf( esc_html__( 'No %s found in Trash.', 'sverna' ), strtolower( $plural_label ) ),
		'featured_image'        => esc_html__( 'Featured image', 'sverna' ),
		'set_featured_image'    => esc_html__( 'Set featured image', 'sverna' ),
		'remove_featured_image' => esc_html__( 'Remove featured image', 'sverna' ),
		'use_featured_image'    => esc_html__( 'Use as featured image', 'sverna' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'show_in_rest'       => true,
		'has_archive'        => true,
		'exclude_from_search' => false,
		'hierarchical'       => false,
		'capability_type'    => 'post',
		'map_meta_cap'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug'       => $overrides['rewrite_slug'],
			'with_front' => false,
		),
		'menu_icon'          => isset( $overrides['menu_icon'] ) ? $overrides['menu_icon'] : 'dashicons-admin-post',
		'menu_position'      => isset( $overrides['menu_position'] ) ? $overrides['menu_position'] : null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'page-attributes' ),
	);

	if ( array_key_exists( 'show_in_menu', $overrides ) ) {
		$args['show_in_menu'] = $overrides['show_in_menu'];
	}

	register_post_type( $post_type, $args );
}
