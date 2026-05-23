<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package sverna
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sverna_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'sverna_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function sverna_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'sverna_pingback_header' );

/**
 * Build breadcrumb items for the current page or a passed post.
 *
 * @param int $post_id Post ID.
 * @return array<int, array<string, string>>
 */
function xaz_get_breadcrumb_items( $post_id = 0 ) {
	$post_id = $post_id ? (int) $post_id : get_the_ID();

	if ( ! $post_id ) {
		return array();
	}

	$breadcrumb_items = array(
		array(
			'title' => get_the_title( get_option( 'page_on_front' ) ),
			'url'   => home_url( '/' ),
		),
	);

	$ancestors = array_reverse( get_post_ancestors( $post_id ) );

	foreach ( $ancestors as $ancestor_id ) {
		$breadcrumb_items[] = array(
			'title' => get_the_title( $ancestor_id ),
			'url'   => get_permalink( $ancestor_id ),
		);
	}

	$breadcrumb_items[] = array(
		'title' => get_the_title( $post_id ),
		'url'   => get_permalink( $post_id ),
	);

	return $breadcrumb_items;
}

/**
 * Render breadcrumbs from a shared partial.
 *
 * @param array<int, array<string, string>> $breadcrumb_items Breadcrumb items.
 * @return void
 */
function xaz_render_breadcrumbs( $breadcrumb_items ) {
	if ( empty( $breadcrumb_items ) || ! is_array( $breadcrumb_items ) ) {
		return;
	}

	$template = locate_template( 'template-parts/breadcrumbs.php' );

	if ( ! $template ) {
		return;
	}

	include $template;
}

/**
 * Get the first published page that uses a given page template.
 *
 * @param string $template_file Template filename.
 * @return int
 */
function xaz_get_page_id_by_template( $template_file ) {
	static $cache = array();

	if ( isset( $cache[ $template_file ] ) ) {
		return $cache[ $template_file ];
	}

	$page_ids = get_posts(
		array(
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'posts_per_page' => 1,
			'fields'         => 'ids',
			'meta_key'       => '_wp_page_template',
			'meta_value'     => $template_file,
		)
	);

	$cache[ $template_file ] = ! empty( $page_ids ) ? (int) $page_ids[0] : 0;

	return $cache[ $template_file ];
}

/**
 * Get published sibling pages for the current page hierarchy.
 *
 * @param int $post_id Page ID.
 * @return array<int, WP_Post>
 */
function xaz_get_sibling_pages( $post_id ) {
	$post_id   = (int) $post_id;
	$parent_id = wp_get_post_parent_id( $post_id );

	if ( ! $post_id ) {
		return array();
	}

	if ( $parent_id ) {
		return get_pages(
			array(
				'parent'      => $parent_id,
				'exclude'     => $post_id,
				'post_status' => 'publish',
				'sort_column' => 'menu_order,post_title',
			)
		);
	}

	return get_pages(
		array(
			'parent'      => 0,
			'exclude'     => $post_id,
			'post_status' => 'publish',
			'sort_column' => 'menu_order,post_title',
		)
	);
}

/**
 * Render the shared top panel component.
 *
 * @param array<string, mixed> $args Component arguments.
 * @return void
 */
function xaz_render_top_panel( $args = array() ) {
	$args = wp_parse_args(
		$args,
		array(
			'breadcrumb_items' => xaz_get_breadcrumb_items(),
			'text'             => '',
			'image'            => '',
			'bottom_gap'       => false,
			'class_name'       => '',
		)
	);

	$panel_classes = array(
		'flexible-component',
		'flexible-top-panel',
		$args['bottom_gap'] ? 'bottom-gap' : 'no-bottom-gap',
	);

	if ( $args['class_name'] ) {
		$panel_classes[] = $args['class_name'];
	}
	?>
	<div class="<?php echo esc_attr( implode( ' ', array_filter( $panel_classes ) ) ); ?>">
		<?php if ( $args['image'] ) : ?>
			<div id="xaz-image-1" class="xaz-image" style="background: url( '<?php echo esc_url( $args['image'] ); ?>' )">
				<div class="gradient">
					<div class="container-fluid">
						<div class="row row-space">
							<div class="col-md-9">
								<?php xaz_render_breadcrumbs( $args['breadcrumb_items'] ); ?>

								<?php if ( $args['text'] ) : ?>
									<?php echo $args['text']; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php else : ?>
			<div class="container-fluid">
				<div class="row row-space">
					<div class="col-md-9">
						<?php xaz_render_breadcrumbs( $args['breadcrumb_items'] ); ?>

						<?php if ( $args['text'] ) : ?>
							<?php echo $args['text']; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
	<?php
}

/**
 * Render the About page subsection links section.
 *
 * @param int $post_id Source page ID.
 * @return void
 */
function xaz_render_about_subsection_links_section( $post_id ) {
	$post_id = (int) $post_id;

	if ( ! $post_id ) {
		return;
	}

	$s2_text = get_field( 's2_text', $post_id );

	if ( ! $s2_text && ! have_rows( 's2_boxes', $post_id ) ) {
		return;
	}
	?>
	<div class="section section-grey" id="about-2">
		<div class="container-fluid">
			<div class="row row-space">
				<div class="col-md-12">
					<?php if ( $s2_text ) : ?>
						<?php echo $s2_text; ?>
					<?php endif; ?>
				</div>
			</div>

			<?php if ( have_rows( 's2_boxes', $post_id ) ) : ?>
				<div class="row row-space">
					<?php $subsection_link_index = 0; ?>
					<?php while ( have_rows( 's2_boxes', $post_id ) ) : the_row(); ?>
						<?php
						$variant = get_sub_field( 'variant' ) ?: 'standard';
						$image   = get_sub_field( 'img' );
						$text    = get_sub_field( 'rte' );
						$path    = get_sub_field( 'path' );
						++$subsection_link_index;
						?>

						<div class="col-md-3 col-sm-6">
							<a class="subsection-link-box variant-<?php echo esc_attr( strtolower( $variant ) ); ?>" href="<?php echo esc_url( $path ); ?>">
								<?php if ( $image ) : ?>
									<img class="subsection-link-image" src="<?php echo esc_url( $image ); ?>" alt="">
								<?php endif; ?>

								<?php if ( $text ) : ?>
									<span class="subsection-link-text">
										<?php echo $text; ?>
									</span>
								<?php endif; ?>
							</a>
						</div>

						<?php if ( 0 === $subsection_link_index % 2 ) : ?>
							<div class="clearfix visible-sm-block"></div>
						<?php endif; ?>

						<?php if ( 0 === $subsection_link_index % 4 ) : ?>
							<div class="clearfix visible-md-block visible-lg-block"></div>
						<?php endif; ?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php
}
