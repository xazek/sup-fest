<?php
/**
 * Template name: Home
 *
 * @package sverna
 */

get_header();

$s1_video_file = get_field( 'home_s1_video' );
$s1_video_url  = is_array( $s1_video_file ) ? ( $s1_video_file['url'] ?? '' ) : '';
$s1_video_mime = is_array( $s1_video_file ) ? ( $s1_video_file['mime_type'] ?? 'video/mp4' ) : 'video/mp4';
$s1_text       = get_field( 'home_s1_text' );
$s1_links      = get_field( 'home_s1_links' );
$s1_links      = is_array( $s1_links ) ? $s1_links : array();

$s2_text = get_field( 'home_s2_text' );

$s3_text_left  = get_field( 'home_s3_text_left' );
$s3_image      = get_field( 'home_s3_image' );
$s3_text_right = get_field( 'home_s3_text_right' );

$s4_box_text = get_field( 'home_s4_box_text' );

$s5_image = get_field( 'home_s5_image' );
$s5_text  = get_field( 'home_s5_text' );

$s6_text_top    = get_field( 'home_s6_text_top' );
$s6_box_text    = get_field( 'home_s6_box_text' );
$s6_text_bottom = get_field( 'home_s6_text_bottom' );

$s7_video_file = get_field( 'home_s7_video' );
$s7_video_url  = is_array( $s7_video_file ) ? ( $s7_video_file['url'] ?? '' ) : '';
$s7_video_mime = is_array( $s7_video_file ) ? ( $s7_video_file['mime_type'] ?? 'video/mp4' ) : 'video/mp4';
$s7_text_left  = get_field( 'home_s7_text_left' );
$s7_text_right = get_field( 'home_s7_text_right' );

$s8_text    = get_field( 'home_s8_text' );
$s8_gallery = get_field( 'home_s8_gallery' );
?>

<section id="home-template" class="home-template">
	<div class="section section-first home-section home-section-1" id="home-1">
		<?php if ( $s1_video_url ) : ?>
			<video class="home-hero-video" autoplay muted loop playsinline preload="metadata">
				<source src="<?php echo esc_url( $s1_video_url ); ?>" type="<?php echo esc_attr( $s1_video_mime ); ?>">
			</video>
		<?php endif; ?>

		<div class="home-hero-overlay" aria-hidden="true"></div>
		<img class="home-hero-graphic" src="<?php echo esc_url( get_template_directory_uri() . '/assets/Homepage/hero_overlay.svg' ); ?>" alt="">

		<a class="home-scroll-down" href="#home-2">
			<span class="home-scroll-line" aria-hidden="true"></span>
			<span class="home-scroll-label">scroll down</span>
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/Homepage/homepage_CaretDoubleDown.svg' ); ?>" alt="">
		</a>

		<div class="container-fluid home-hero-content">
			<div class="row row-space">
				<div class="col-md-5 home-hero-copy">
					<?php if ( $s1_text ) : ?>
						<div class="text">
							<?php echo $s1_text; ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="col-md-7 home-hero-links">
					<?php if ( $s1_links ) : ?>
						<div class="home-hero-panel" data-home-hero-panel>
							<div class="home-hero-panel-images">
								<?php foreach ( $s1_links as $s1_link_index => $s1_link ) : ?>
								<?php
								$image = $s1_link['image'] ?? '';
								?>

								<?php if ( $image ) : ?>
									<div class="home-hero-panel-image <?php echo 0 === $s1_link_index ? 'active' : ''; ?>" data-home-hero-image="<?php echo esc_attr( $s1_link_index ); ?>" style="background-image: url('<?php echo esc_url( $image ); ?>');"></div>
								<?php endif; ?>
								<?php endforeach; ?>
							</div>

							<div class="home-hero-panel-buttons">
								<?php foreach ( $s1_links as $s1_link_index => $s1_link ) : ?>
									<?php
									$icon = $s1_link['icon'] ?? '';
									$text = $s1_link['text'] ?? '';
									$url  = $s1_link['url'] ?? '';
									?>

									<a class="home-hero-link home-hero-link-<?php echo esc_attr( ( $s1_link_index % 3 ) + 1 ); ?> <?php echo 0 === $s1_link_index ? 'active' : ''; ?>" href="<?php echo esc_url( $url ? $url : '#' ); ?>" data-home-hero-trigger="<?php echo esc_attr( $s1_link_index ); ?>">
										<?php if ( $icon ) : ?>
											<img class="home-hero-link-icon" src="<?php echo esc_url( $icon ); ?>" alt="">
										<?php endif; ?>

										<?php if ( $text ) : ?>
											<span class="home-hero-link-text">
												<?php echo $text; ?>
											</span>
										<?php endif; ?>
									</a>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<div class="container-fluid home-hero-bottom">
			<div class="row row-space">
				<div class="col-md-5">
					<a class="home-subscription-link" href="<?php echo esc_url( home_url( '/nl-subscription-tool/' ) ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/Homepage/homepage_Graph.svg' ); ?>" alt="">
						<span>NL-Subscription Tool</span>
					</a>
				</div>

				<div class="col-md-7">
					<div class="home-social">
						<span class="home-social-label">Our social media:</span>
						<a href="/" aria-label="LinkedIn"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/Homepage/home_LinkedinLogo.svg' ); ?>" alt=""></a>
						<a href="/" aria-label="TikTok"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/Homepage/home_TiktokLogo.svg' ); ?>" alt=""></a>
						<a href="/" aria-label="Instagram"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/Homepage/home_InstagramLogo.svg' ); ?>" alt=""></a>
						<a href="/" aria-label="Meta"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/Homepage/home_MetaLogo.svg' ); ?>" alt=""></a>
						<a href="/" aria-label="Facebook"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/Homepage/homepage_FacebookLogo.svg' ); ?>" alt=""></a>
						<a href="/" aria-label="Dribbble"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/Homepage/homepage_DribbbleLogo.svg' ); ?>" alt=""></a>
						<a href="/" aria-label="Discord"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/Homepage/homepage_DiscordLogo.svg' ); ?>" alt=""></a>
						<a href="/" aria-label="YouTube"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/Homepage/home_YoutubeLogo.svg' ); ?>" alt=""></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="section home-section home-section-2" id="home-2">
		<div class="container-fluid">
			<div class="row row-space">
				<div class="col-md-3">
					<?php if ( $s2_text ) : ?>
						<div class="text home-news-intro">
							<?php echo $s2_text; ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="col-md-9">
					<?php
					$latest_news = new WP_Query(
						array(
							'post_type'           => 'post',
							'posts_per_page'      => 3,
							'ignore_sticky_posts' => true,
						)
					);
					?>

					<?php if ( $latest_news->have_posts() ) : ?>
						<div class="xaz-news-box-list home-news-list">
							<div class="row row-space">
								<?php while ( $latest_news->have_posts() ) : ?>
									<?php
									$latest_news->the_post();
									$sneak_peak_image = get_field( 'sneak_peak_image', get_the_ID() );
									$sneak_peak_text  = get_field( 'sneak_peak_text', get_the_ID() );
									$news_image       = $sneak_peak_image ? $sneak_peak_image : get_the_post_thumbnail_url( get_the_ID(), 'large' );
									?>

									<div class="col-md-4 col-sm-6">
										<a href="<?php the_permalink(); ?>" class="box">
											<?php if ( $news_image ) : ?>
												<div class="xaz-image" style="background-image: url('<?php echo esc_url( $news_image ); ?>');"></div>
											<?php endif; ?>

											<div class="date"><?php echo esc_html( get_the_date( 'd.m.Y' ) ); ?></div>
											<div class="title"><h4><?php the_title(); ?></h4></div>

											<?php if ( $sneak_peak_text ) : ?>
												<div class="text"><?php echo $sneak_peak_text; ?></div>
											<?php endif; ?>
										</a>
									</div>
								<?php endwhile; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="section home-section home-section-3" id="home-3">
		<div class="container-fluid">
			<div class="row row-space">
				<div class="col-md-4">
					<?php if ( $s3_text_left ) : ?>
						<div class="text">
							<?php echo $s3_text_left; ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="col-md-5">
					<?php if ( $s3_image ) : ?>
						<img class="home-image" src="<?php echo esc_url( $s3_image ); ?>" alt="">
					<?php endif; ?>
				</div>

				<div class="col-md-3">
					<?php if ( $s3_text_right ) : ?>
						<div class="text list-check list-check-dark">
							<?php echo $s3_text_right; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="section home-section home-section-4" id="home-4">
		<div class="container-fluid">
			<div class="home-gradient-box">
				<div class="row row-space">
					<div class="col-md-8">
						<?php if ( $s4_box_text ) : ?>
							<div class="text">
								<?php echo $s4_box_text; ?>
							</div>
						<?php endif; ?>
					</div>

					<div class="col-md-3 col-md-offset-1 home-gradient-cta">
						<a class="btn btn-transparent" href="#">BECOME A MEMBER</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="section home-section home-section-5" id="home-5">
		<div class="container-fluid">
			<div class="row row-space home-section-5-row">
				<div class="col-md-7 home-section-5-image-col">
					<?php if ( $s5_image ) : ?>
						<img class="home-image" src="<?php echo esc_url( $s5_image ); ?>" alt="">
					<?php endif; ?>
				</div>

				<div class="col-md-4 col-md-offset-1 home-section-5-copy-col">
					<?php if ( $s5_text ) : ?>
						<div class="text">
							<?php echo $s5_text; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="section home-section home-section-6" id="home-6">
		<div class="container-fluid">
			<div class="row row-space">
				<div class="col-md-5 home-event-placeholder"></div>

				<div class="col-md-7">
					<?php if ( $s6_text_top ) : ?>
						<div class="text">
							<?php echo $s6_text_top; ?>
						</div>
					<?php endif; ?>

					<?php if ( $s6_box_text ) : ?>
						<div class="xaz-infobox variant-tertiary list-check home-section-6-box">
							<?php echo $s6_box_text; ?>
						</div>
					<?php endif; ?>

					<?php if ( $s6_text_bottom ) : ?>
						<div class="text">
							<?php echo $s6_text_bottom; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<?php if ( $s7_video_url || $s7_text_left || $s7_text_right ) : ?>
		<div class="section xaz-video-banner home-section-7" id="home-7">
			<?php if ( $s7_video_url ) : ?>
				<video class="xaz-video-banner-bg" autoplay muted loop playsinline preload="metadata">
					<source src="<?php echo esc_url( $s7_video_url ); ?>" type="<?php echo esc_attr( $s7_video_mime ); ?>">
				</video>
			<?php endif; ?>

			<div class="xaz-video-banner-overlay" aria-hidden="true"></div>

			<div class="container-fluid xaz-video-banner-content">
				<div class="row row-space">
					<div class="col-md-6">
						<?php if ( $s7_text_left ) : ?>
							<div class="xaz-video-banner-text text list-check">
								<?php echo $s7_text_left; ?>
							</div>
						<?php endif; ?>
					</div>

					<div class="col-md-5 col-md-offset-1">
						<?php if ( $s7_text_right ) : ?>
							<div class="xaz-video-banner-text xaz-video-banner-text-2 text list-check">
								<?php echo $s7_text_right; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="section home-section home-section-8" id="home-8">
		<div class="container-fluid">
			<?php if ( $s8_text ) : ?>
				<div class="row row-space">
					<div class="col-md-8">
						<div class="text">
							<?php echo $s8_text; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( $s8_gallery ) : ?>
				<div class="row row-space">
					<div class="col-md-12">
						<div class="home-gallery">
							<?php foreach ( $s8_gallery as $gallery_image ) : ?>
								<?php
								$image_url = is_array( $gallery_image ) ? ( $gallery_image['url'] ?? '' ) : $gallery_image;
								?>

								<?php if ( $image_url ) : ?>
									<div class="home-gallery-item">
										<img class="home-gallery-image" src="<?php echo esc_url( $image_url ); ?>" alt="">
									</div>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
	var panel = document.querySelector('[data-home-hero-panel]');

	if (!panel) {
		return;
	}

	var triggers = panel.querySelectorAll('[data-home-hero-trigger]');
	var images = panel.querySelectorAll('[data-home-hero-image]');

	function activateHeroImage(index) {
		triggers.forEach(function (trigger) {
			trigger.classList.toggle('active', trigger.getAttribute('data-home-hero-trigger') === index);
		});

		images.forEach(function (image) {
			image.classList.toggle('active', image.getAttribute('data-home-hero-image') === index);
		});
	}

	triggers.forEach(function (trigger) {
		trigger.addEventListener('mouseenter', function () {
			activateHeroImage(trigger.getAttribute('data-home-hero-trigger'));
		});

		trigger.addEventListener('focus', function () {
			activateHeroImage(trigger.getAttribute('data-home-hero-trigger'));
		});
	});
});
</script>

<?php get_footer(); ?>
