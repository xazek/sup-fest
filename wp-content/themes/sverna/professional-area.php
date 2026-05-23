<?php
/**
 * Template name: Professional area
 *
 * @package sverna
 */

get_header();

$s1_text       = get_field( 'professional_s1_text' );
$s1_video_file = get_field( 'professional_s1_video' );
$s1_video_url  = is_array( $s1_video_file ) ? ( $s1_video_file['url'] ?? '' ) : '';
$s1_video_mime = is_array( $s1_video_file ) ? ( $s1_video_file['mime_type'] ?? 'video/mp4' ) : 'video/mp4';

$s2_video_file = get_field( 'professional_s2_video' );
$s2_video_url  = is_array( $s2_video_file ) ? ( $s2_video_file['url'] ?? '' ) : '';
$s2_video_mime = is_array( $s2_video_file ) ? ( $s2_video_file['mime_type'] ?? 'video/mp4' ) : 'video/mp4';
$s2_text_left  = get_field( 'professional_s2_text_left' );
$s2_text_right = get_field( 'professional_s2_text_right' );

$s3_text      = get_field( 'professional_s3_text' );
$s3_image     = get_field( 'professional_s3_image' );
$s3_side_text = get_field( 'professional_s3_side_text' );

$s4_left_text  = get_field( 'professional_s4_left_text' );
$s4_image      = get_field( 'professional_s4_image' );
$s4_image_text = get_field( 'professional_s4_image_text' );
$s4_box_text   = get_field( 'professional_s4_box_text' );
?>

<section id="professional-area-template" class="professional-area-template">
	<div class="section section-first professional-area-section professional-area-section-1" id="professional-area-1">
		<div class="container-fluid">
			<?php xaz_render_breadcrumbs( xaz_get_breadcrumb_items() ); ?>

			<div class="row row-space professional-area-intro-row">
				<div class="col-md-4 professional-area-intro-copy">
					<?php if ( $s1_text ) : ?>
						<div class="text">
							<?php echo $s1_text; ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="col-md-7 col-md-offset-1 professional-area-intro-media">
					<?php if ( $s1_video_url ) : ?>
						<div class="xaz-video-bg professional-area-video">
							<video autoplay muted loop playsinline preload="metadata">
								<source src="<?php echo esc_url( $s1_video_url ); ?>" type="<?php echo esc_attr( $s1_video_mime ); ?>">
							</video>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<?php if ( $s2_video_url || $s2_text_left || $s2_text_right ) : ?>
		<div class="section xaz-video-banner professional-area-section-2" id="professional-area-2">
			<?php if ( $s2_video_url ) : ?>
				<video class="xaz-video-banner-bg" autoplay muted loop playsinline preload="metadata">
					<source src="<?php echo esc_url( $s2_video_url ); ?>" type="<?php echo esc_attr( $s2_video_mime ); ?>">
				</video>
			<?php endif; ?>

			<div class="xaz-video-banner-overlay" aria-hidden="true"></div>

			<div class="container-fluid xaz-video-banner-content">
				<div class="row row-space">
					<div class="col-md-6">
						<?php if ( $s2_text_left ) : ?>
							<div class="xaz-video-banner-text text list-check">
								<?php echo $s2_text_left; ?>
							</div>
						<?php endif; ?>
					</div>

					<div class="col-md-5 col-md-offset-1">
						<?php if ( $s2_text_right ) : ?>
							<div class="xaz-video-banner-text xaz-video-banner-text-2 text list-check">
								<?php echo $s2_text_right; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="section professional-area-section professional-area-section-3" id="professional-area-3">
		<div class="container-fluid">
			<?php if ( $s3_text ) : ?>
				<div class="row row-space professional-area-wide-copy">
					<div class="col-md-12">
						<div class="text">
							<?php echo $s3_text; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<div class="row row-space">
				<div class="col-md-5 professional-area-feature-image-col">
					<?php if ( $s3_image ) : ?>
						<img class="professional-area-image" src="<?php echo esc_url( $s3_image ); ?>" alt="">
					<?php endif; ?>
				</div>

				<div class="col-md-6 col-md-offset-1 professional-area-feature-copy-col">
					<?php if ( $s3_side_text ) : ?>
						<div class="text professional-area-feature-copy">
							<?php echo $s3_side_text; ?>
						</div>
					<?php endif; ?>

					<?php if ( have_rows( 'professional_s3_boxes' ) ) : ?>
						<div class="professional-area-subsection-list">
							<div class="row row-space">
								<?php $subsection_index = 0; ?>
								<?php while ( have_rows( 'professional_s3_boxes' ) ) : the_row(); ?>
									<?php
									$variant = get_sub_field( 'variant' ) ?: 'standard';
									$image   = get_sub_field( 'image' );
									$text    = get_sub_field( 'text' );
									$link    = get_sub_field( 'link' );
									++$subsection_index;
									?>

									<div class="col-md-6 col-sm-6">
										<a class="subsection-link-box variant-<?php echo esc_attr( strtolower( $variant ) ); ?>" href="<?php echo esc_url( $link ); ?>">
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

									<?php if ( 0 === $subsection_index % 2 ) : ?>
										<div class="clearfix visible-sm-block visible-md-block visible-lg-block"></div>
									<?php endif; ?>
								<?php endwhile; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="section professional-area-section professional-area-section-4" id="professional-area-4">
		<div class="container-fluid">
			<div class="row row-space">
				<div class="col-md-5 professional-area-cluster">
					<?php if ( $s4_left_text ) : ?>
						<div class="text professional-area-cluster-intro">
							<?php echo $s4_left_text; ?>
						</div>
					<?php endif; ?>

					<div class="row professional-area-cluster-row">
						<div class="col-xs-5 professional-area-cluster-image-col">
							<?php if ( $s4_image ) : ?>
								<img class="professional-area-image" src="<?php echo esc_url( $s4_image ); ?>" alt="">
							<?php endif; ?>
						</div>

						<div class="col-xs-7 professional-area-cluster-copy-col">
							<?php if ( $s4_image_text ) : ?>
								<div class="text professional-area-cluster-copy">
									<?php echo $s4_image_text; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-md-offset-1 professional-area-grey-box-col">
					<?php if ( $s4_box_text ) : ?>
						<div class="professional-area-grey-box text">
							<?php echo $s4_box_text; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
