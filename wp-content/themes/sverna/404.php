<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package sverna
 */

get_header();

$home_title = get_the_title( get_option( 'page_on_front' ) );
$home_title = $home_title ? $home_title : 'Home';
$background_image = get_template_directory_uri() . '/assets/contact/Rectangle 81.jpg';
?>

<section id="error-page" class="error-page">
	<div class="section section-first" id="error-page-1">
		<div class="xaz-error-page-hero" style="background-image: url('<?php echo esc_url( $background_image ); ?>');">
			<div class="container-fluid">
				<div class="row row-space">
					<div class="col-md-8">
						<nav class="xaz-breadcrumb" aria-label="Breadcrumb">
							<a class="breadcrumb-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<?php echo esc_html( $home_title ); ?>
							</a>
							<span class="breadcrumb-separator">/</span>
							<span class="breadcrumb-link">404</span>
						</nav>

						<div class="text xaz-error-page-copy">
							<h1>404</h1>
							<h5>Something went wrong. There is no such page.</h5>
							<a href="/" class="btn btn-primary">go to homepage</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
