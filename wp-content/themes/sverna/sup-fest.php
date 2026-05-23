<?php
/**
 * Template name: SUP FEST
 *
 * @package sverna
 */

get_header();

if ( ! function_exists( 'sverna_supfest_get_field' ) ) {
	function sverna_supfest_get_field( $name, $default = null ) {
		if ( function_exists( 'get_field' ) ) {
			$value = get_field( $name );

			if ( null !== $value && false !== $value && '' !== $value && array() !== $value ) {
				return $value;
			}
		}

		return $default;
	}
}

if ( ! function_exists( 'sverna_supfest_image_url' ) ) {
	function sverna_supfest_image_url( $image, $size = 'large' ) {
		if ( is_array( $image ) ) {
			if ( ! empty( $image['sizes'][ $size ] ) ) {
				return $image['sizes'][ $size ];
			}

			return $image['url'] ?? '';
		}

		if ( is_numeric( $image ) ) {
			return wp_get_attachment_image_url( (int) $image, $size );
		}

		return is_string( $image ) ? $image : '';
	}
}

if ( ! function_exists( 'sverna_supfest_link_url' ) ) {
	function sverna_supfest_link_url( $link, $fallback = '#' ) {
		if ( is_array( $link ) ) {
			return $link['url'] ?? $fallback;
		}

		return is_string( $link ) && '' !== $link ? $link : $fallback;
	}
}

if ( ! function_exists( 'sverna_supfest_link_title' ) ) {
	function sverna_supfest_link_title( $link, $fallback = '' ) {
		if ( is_array( $link ) ) {
			return $link['title'] ?? $fallback;
		}

		return $fallback;
	}
}

$hero_video_file = sverna_supfest_get_field( 'supfest_hero_video' );
$hero_video_url  = is_array( $hero_video_file ) ? ( $hero_video_file['url'] ?? '' ) : '';
$hero_video_mime = is_array( $hero_video_file ) ? ( $hero_video_file['mime_type'] ?? 'video/mp4' ) : 'video/mp4';
$hero_poster     = sverna_supfest_image_url( sverna_supfest_get_field( 'supfest_hero_poster' ), 'full' );
$logo            = sverna_supfest_image_url( sverna_supfest_get_field( 'supfest_logo' ), 'medium' );
$title           = sverna_supfest_get_field( 'supfest_title', 'SUP FEST POZNAŃ' );
$lead            = sverna_supfest_get_field( 'supfest_lead', 'Weekend na wodzie nad Jeziorem Strzeszyńskim: wyścigi SUP, warsztaty, testy sprzętu i energia festiwalu dla osób, które dopiero zaczynają oraz dla zawodników walczących o wynik.' );
$primary_cta     = sverna_supfest_get_field( 'supfest_primary_cta', array( 'url' => '#zapisy', 'title' => 'Zapisz się' ) );
$secondary_cta   = sverna_supfest_get_field( 'supfest_secondary_cta', array( 'url' => '#harmonogram', 'title' => 'Harmonogram' ) );
$event_facts     = sverna_supfest_get_field(
	'supfest_facts',
	array(
		array( 'label' => 'Termin', 'value' => '12-13 lipca 2025' ),
		array( 'label' => 'Miejsce', 'value' => 'Rafamarina, Przystań Strzeszynek' ),
		array( 'label' => 'Adres', 'value' => 'ul. Koszalińska 15, Poznań' ),
	)
);

$info_text = sverna_supfest_get_field(
	'supfest_info_text',
	'<h2>Sportowy weekend dla całej społeczności SUP</h2><p>SUP FEST Poznań łączy rywalizację, aktywne warsztaty i swobodną atmosferę nad jeziorem. Na miejscu spotkają się zawodnicy, rodziny, osoby testujące pierwszą deskę i partnerzy związani ze sportami wodnymi.</p><p>W planie są wyścigi, zajęcia na deskach, strefa sprzętowa oraz czas na rozmowy przy wodzie. Jeżeli nie masz swojej deski, sprzęt ma być dostępny na miejscu.</p>'
);
$info_images = sverna_supfest_get_field( 'supfest_info_images', array() );

$news_title = sverna_supfest_get_field( 'supfest_news_title', 'Aktualnosci' );
$news_link  = sverna_supfest_get_field( 'supfest_news_link', get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/' ) );

$gallery_items = sverna_supfest_get_field( 'supfest_gallery', array() );
$competitions  = sverna_supfest_get_field(
	'supfest_competitions',
	array(
		array( 'name' => 'Short Race / sprint', 'distance' => 'ok. 150 m', 'description' => 'Szybki, widowiskowy wyścig z nawrotem blisko brzegu. Idealny dla kibiców i zawodników lubiących mocny start.' ),
		array( 'name' => 'Technical Race', 'distance' => 'ok. 500-1000 m', 'description' => 'Trasa z nawrotami, która sprawdza technikę, balans i decyzje podejmowane pod presją.' ),
		array( 'name' => 'Long Distance', 'distance' => 'trasa długa', 'description' => 'Dystans dla wytrwałych, prowadzony w rytmie jeziora, tempa i dobrej taktyki.' ),
		array( 'name' => 'SUP Debiut', 'distance' => 'dla amatorów', 'description' => 'Format dla osób, które chcą wejść w świat zawodów SUP bez ciśnienia profesjonalnej rywalizacji.' ),
	)
);

$schedule_text = sverna_supfest_get_field( 'supfest_schedule_text' );
$schedule      = sverna_supfest_get_field(
	'supfest_schedule',
	array(
		array( 'time' => 'Sobota 12:00', 'title' => 'Odbiór pakietów', 'description' => 'Biuro zawodów i przygotowanie uczestników.' ),
		array( 'time' => 'Sobota 14:00', 'title' => 'Start wyścigów', 'description' => 'Pierwsze konkurencje i emocje na wodzie.' ),
		array( 'time' => 'Niedziela 12:00', 'title' => 'Zajęcia SUP', 'description' => 'Warsztaty, aktywności i luźniejsza część festiwalu.' ),
	)
);

$sponsors = sverna_supfest_get_field(
	'supfest_sponsors',
	array(
		array( 'name' => 'Miasto Poznań' ),
		array( 'name' => 'Rafamarina Strzeszynek' ),
		array( 'name' => 'Uone' ),
		array( 'name' => 'Nickel Development' ),
		array( 'name' => 'Laboprint' ),
		array( 'name' => 'Dashki' ),
		array( 'name' => 'Chaitea' ),
	)
);

$socials = array(
	array( 'label' => 'Facebook', 'url' => sverna_supfest_get_field( 'supfest_facebook', 'https://www.facebook.com/p/SUP-FEST-Pozna%C5%84-61564086214319/' ) ),
	array( 'label' => 'Instagram', 'url' => sverna_supfest_get_field( 'supfest_instagram', '#' ) ),
	array( 'label' => 'YouTube', 'url' => sverna_supfest_get_field( 'supfest_youtube', '#' ) ),
);

$pricing = sverna_supfest_get_field(
	'supfest_pricing',
	array(
		array( 'name' => 'Pakiet startowy', 'price' => 'od 99 zl', 'description' => 'Udzial w zawodach, numer startowy i dostep do strefy uczestnika.' ),
		array( 'name' => 'Warsztaty SUP', 'price' => 'w programie', 'description' => 'Zajecia dla osob, ktore chca poprawic technike albo sprobowac SUP po raz pierwszy.' ),
		array( 'name' => 'Strefa kibica', 'price' => 'wstep wolny', 'description' => 'Kibicowanie, partnerzy, atmosfera festiwalu i jezioro w tle.' ),
	)
);

$rules_text = sverna_supfest_get_field( 'supfest_rules_text', 'Regulamin wydarzenia, zasady bezpieczeństwa i szczegóły kategorii startowych będą dostępne w osobnym dokumencie.' );
$rules_link = sverna_supfest_get_field( 'supfest_rules_link' );
$map_image  = sverna_supfest_image_url( sverna_supfest_get_field( 'supfest_map_image' ), 'full' );
$map_link   = sverna_supfest_get_field( 'supfest_map_link', 'https://maps.google.com/?q=Rafamarina+Strzeszynek+Koszalinska+15+Poznan' );
$signup     = sverna_supfest_get_field( 'supfest_signup_embed' );
?>

<main id="supfest" class="supfest-page">
	<section class="supfest-hero" id="start" <?php echo $hero_poster ? 'style="--hero-poster: url(' . esc_url( $hero_poster ) . ');"' : ''; ?>>
		<?php if ( $hero_video_url ) : ?>
			<video class="supfest-hero__video" autoplay muted loop playsinline preload="metadata" <?php echo $hero_poster ? 'poster="' . esc_url( $hero_poster ) . '"' : ''; ?>>
				<source src="<?php echo esc_url( $hero_video_url ); ?>" type="<?php echo esc_attr( $hero_video_mime ); ?>">
			</video>
		<?php endif; ?>

		<div class="supfest-hero__water" aria-hidden="true"></div>
		<div class="supfest-container supfest-hero__inner">
			<div class="supfest-hero__copy">
				<div class="supfest-logo-mark">
					<?php if ( $logo ) : ?>
						<img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( $title ); ?>">
					<?php else : ?>
						<span>SUP</span><strong>FEST</strong><em>Poznań</em>
					<?php endif; ?>
				</div>
				<p class="supfest-eyebrow">Stand Up Paddle Festival</p>
				<h1><?php echo esc_html( $title ); ?></h1>
				<p class="supfest-lead"><?php echo esc_html( $lead ); ?></p>
				<div class="supfest-hero__actions">
					<a class="supfest-btn supfest-btn--primary" href="<?php echo esc_url( sverna_supfest_link_url( $primary_cta, '#zapisy' ) ); ?>"><?php echo esc_html( sverna_supfest_link_title( $primary_cta, 'Zapisz się' ) ); ?></a>
					<a class="supfest-btn supfest-btn--ghost" href="<?php echo esc_url( sverna_supfest_link_url( $secondary_cta, '#harmonogram' ) ); ?>"><?php echo esc_html( sverna_supfest_link_title( $secondary_cta, 'Harmonogram' ) ); ?></a>
				</div>
			</div>

			<div class="supfest-facts" aria-label="Najwazniejsze informacje">
				<?php foreach ( $event_facts as $fact ) : ?>
					<div class="supfest-fact">
						<span><?php echo esc_html( $fact['label'] ?? '' ); ?></span>
						<strong><?php echo esc_html( $fact['value'] ?? '' ); ?></strong>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="supfest-section supfest-info" id="informacje">
		<div class="supfest-container supfest-info__grid">
			<div class="supfest-section-copy">
				<p class="supfest-kicker">Informacje o evencie</p>
				<?php echo wp_kses_post( $info_text ); ?>
			</div>
			<div class="supfest-photo-stack">
				<?php if ( ! empty( $info_images ) ) : ?>
					<?php foreach ( array_slice( $info_images, 0, 3 ) as $index => $image ) : ?>
						<?php $image_url = sverna_supfest_image_url( $image, 'large' ); ?>
						<?php if ( $image_url ) : ?>
							<img class="supfest-photo-stack__image supfest-photo-stack__image--<?php echo esc_attr( $index + 1 ); ?>" src="<?php echo esc_url( $image_url ); ?>" alt="">
						<?php endif; ?>
					<?php endforeach; ?>
				<?php else : ?>
					<div class="supfest-photo-fallback supfest-photo-fallback--one"></div>
					<div class="supfest-photo-fallback supfest-photo-fallback--two"></div>
					<div class="supfest-photo-fallback supfest-photo-fallback--three"></div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="supfest-section supfest-news" id="aktualnosci">
		<div class="supfest-container">
			<div class="supfest-section-head">
				<p class="supfest-kicker">Newsroom</p>
				<h2><?php echo esc_html( $news_title ); ?></h2>
				<a href="<?php echo esc_url( $news_link ); ?>">Wszystkie aktualnosci</a>
			</div>
			<?php
			$latest_news = new WP_Query(
				array(
					'post_type'           => 'post',
					'posts_per_page'      => 4,
					'ignore_sticky_posts' => true,
				)
			);
			?>
			<div class="supfest-news-grid">
				<?php if ( $latest_news->have_posts() ) : ?>
					<?php while ( $latest_news->have_posts() ) : ?>
						<?php
						$latest_news->the_post();
						$news_image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
						?>
						<a class="supfest-news-card" href="<?php the_permalink(); ?>">
							<?php if ( $news_image ) : ?>
								<span class="supfest-news-card__image" style="background-image: url('<?php echo esc_url( $news_image ); ?>');"></span>
							<?php endif; ?>
							<span class="supfest-news-card__date"><?php echo esc_html( get_the_date( 'd.m.Y' ) ); ?></span>
							<strong><?php the_title(); ?></strong>
							<span><?php echo esc_html( wp_trim_words( get_the_excerpt(), 16 ) ); ?></span>
						</a>
					<?php endwhile; ?>
				<?php else : ?>
					<?php for ( $index = 1; $index <= 4; $index++ ) : ?>
						<article class="supfest-news-card supfest-news-card--empty">
							<span class="supfest-news-card__date">SUP FEST</span>
							<strong>Aktualnosc <?php echo esc_html( $index ); ?></strong>
							<span>Dodaj wpisy w panelu WordPress, a najnowsze automatycznie pojawią się w tej sekcji.</span>
						</article>
					<?php endfor; ?>
				<?php endif; ?>
			</div>
			<?php wp_reset_postdata(); ?>
		</div>
	</section>

	<section class="supfest-section supfest-gallery" id="galeria">
		<div class="supfest-container">
			<div class="supfest-section-head">
				<p class="supfest-kicker">Galeria</p>
				<h2>Zdjęcia i filmy z wody</h2>
				<div class="supfest-slider-controls">
					<button type="button" data-supfest-slider-prev aria-label="Poprzedni slajd">‹</button>
					<button type="button" data-supfest-slider-next aria-label="Następny slajd">›</button>
				</div>
			</div>
			<div class="supfest-media-slider" data-supfest-slider>
				<?php if ( ! empty( $gallery_items ) ) : ?>
					<?php foreach ( $gallery_items as $item ) : ?>
						<?php
						$type      = $item['type'] ?? 'image';
						$image_url = sverna_supfest_image_url( $item['image'] ?? '', 'large' );
						$youtube   = $item['youtube_url'] ?? '';
						?>
						<div class="supfest-media-slide">
							<?php if ( 'youtube' === $type && $youtube ) : ?>
								<?php echo wp_oembed_get( esc_url( $youtube ) ); ?>
							<?php elseif ( $image_url ) : ?>
								<img src="<?php echo esc_url( $image_url ); ?>" alt="">
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				<?php else : ?>
					<div class="supfest-media-slide supfest-media-slide--fallback"><span>Dodaj zdjęcia lub YouTube w ACF</span></div>
					<div class="supfest-media-slide supfest-media-slide--fallback supfest-media-slide--fallback-alt"><span>Slider jest gotowy na materiały z eventu</span></div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="supfest-section supfest-competitions" id="konkurencje">
		<div class="supfest-container">
			<div class="supfest-section-head">
				<p class="supfest-kicker">Konkurencje</p>
				<h2>Rywalizacja dla roznych poziomow</h2>
			</div>
			<div class="supfest-competition-grid">
				<?php foreach ( $competitions as $competition ) : ?>
					<article class="supfest-competition-card">
						<span><?php echo esc_html( $competition['distance'] ?? '' ); ?></span>
						<h3><?php echo esc_html( $competition['name'] ?? '' ); ?></h3>
						<p><?php echo esc_html( $competition['description'] ?? '' ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="supfest-section supfest-schedule" id="harmonogram">
		<div class="supfest-container supfest-schedule__grid">
			<div>
				<p class="supfest-kicker">Harmonogram</p>
				<h2>Dwa dni nad Jeziorem Strzeszyńskim</h2>
				<?php if ( $schedule_text ) : ?>
					<div class="supfest-rte"><?php echo wp_kses_post( $schedule_text ); ?></div>
				<?php endif; ?>
			</div>
			<div class="supfest-timeline">
				<?php foreach ( $schedule as $item ) : ?>
					<div class="supfest-timeline__item">
						<span><?php echo esc_html( $item['time'] ?? '' ); ?></span>
						<strong><?php echo esc_html( $item['title'] ?? '' ); ?></strong>
						<p><?php echo esc_html( $item['description'] ?? '' ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="supfest-section supfest-sponsors" id="sponsorzy">
		<div class="supfest-container">
			<div class="supfest-section-head">
				<p class="supfest-kicker">Sponsorzy i partnerzy</p>
				<h2>Marki, ktore plyna z nami</h2>
			</div>
			<div class="supfest-sponsor-track">
				<?php foreach ( $sponsors as $sponsor ) : ?>
					<?php
					$sponsor_logo = sverna_supfest_image_url( $sponsor['logo'] ?? '', 'medium' );
					$sponsor_url  = $sponsor['url'] ?? '';
					?>
					<?php if ( $sponsor_url ) : ?>
					<a class="supfest-sponsor" href="<?php echo esc_url( $sponsor_url ); ?>" target="_blank" rel="noopener">
						<?php if ( $sponsor_logo ) : ?>
							<img src="<?php echo esc_url( $sponsor_logo ); ?>" alt="<?php echo esc_attr( $sponsor['name'] ?? '' ); ?>">
						<?php else : ?>
							<span><?php echo esc_html( $sponsor['name'] ?? 'Partner' ); ?></span>
						<?php endif; ?>
					</a>
					<?php else : ?>
					<div class="supfest-sponsor">
						<?php if ( $sponsor_logo ) : ?>
							<img src="<?php echo esc_url( $sponsor_logo ); ?>" alt="<?php echo esc_attr( $sponsor['name'] ?? '' ); ?>">
						<?php else : ?>
							<span><?php echo esc_html( $sponsor['name'] ?? 'Partner' ); ?></span>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="supfest-section supfest-socials" id="social-media">
		<div class="supfest-container supfest-socials__inner">
			<div>
				<p class="supfest-kicker">Social media</p>
				<h2>Bądź blisko aktualizacji</h2>
			</div>
			<div class="supfest-social-buttons">
				<?php foreach ( $socials as $social ) : ?>
					<a class="supfest-social-button" href="<?php echo esc_url( $social['url'] ); ?>" target="_blank" rel="noopener">
						<span><?php echo esc_html( substr( $social['label'], 0, 2 ) ); ?></span>
						<strong><?php echo esc_html( $social['label'] ); ?></strong>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="supfest-section supfest-pricing" id="cennik">
		<div class="supfest-container">
			<div class="supfest-section-head">
				<p class="supfest-kicker">Cennik</p>
				<h2>Pakiety uczestnictwa</h2>
			</div>
			<div class="supfest-price-grid">
				<?php foreach ( $pricing as $price ) : ?>
					<article class="supfest-price-card">
						<h3><?php echo esc_html( $price['name'] ?? '' ); ?></h3>
						<strong><?php echo esc_html( $price['price'] ?? '' ); ?></strong>
						<p><?php echo esc_html( $price['description'] ?? '' ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="supfest-section supfest-rules-map" id="regulamin">
		<div class="supfest-container supfest-rules-map__grid">
			<div class="supfest-rules">
				<p class="supfest-kicker">Regulamin</p>
				<h2>Zasady i bezpieczenstwo</h2>
				<p><?php echo esc_html( $rules_text ); ?></p>
				<?php if ( $rules_link ) : ?>
					<a class="supfest-btn supfest-btn--primary" href="<?php echo esc_url( sverna_supfest_link_url( $rules_link ) ); ?>"><?php echo esc_html( sverna_supfest_link_title( $rules_link, 'Pobierz regulamin' ) ); ?></a>
				<?php endif; ?>
			</div>
			<div class="supfest-map" id="dojazd">
				<?php if ( $map_image ) : ?>
					<a href="<?php echo esc_url( $map_link ); ?>" target="_blank" rel="noopener">
						<img src="<?php echo esc_url( $map_image ); ?>" alt="Mapa dojazdu na SUP FEST Poznań">
					</a>
				<?php else : ?>
					<a class="supfest-map__fallback" href="<?php echo esc_url( $map_link ); ?>" target="_blank" rel="noopener">
						<span>Rafamarina Strzeszynek</span>
						<strong>ul. Koszalińska 15, Poznań</strong>
						<em>Otwórz dojazd w mapach</em>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="supfest-section supfest-signup" id="zapisy">
		<div class="supfest-container supfest-signup__inner">
			<p class="supfest-kicker">Zapisy</p>
			<h2>Formularz zapisów</h2>
			<?php if ( $signup ) : ?>
				<div class="supfest-signup__embed"><?php echo do_shortcode( $signup ); ?></div>
			<?php else : ?>
				<div class="supfest-signup__placeholder">
					<strong>Sekcja gotowa na formularz</strong>
					<p>Wklej shortcode formularza lub embed w polu ACF, kiedy zapisy będą aktywne.</p>
				</div>
			<?php endif; ?>
		</div>
	</section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
	var slider = document.querySelector('[data-supfest-slider]');
	var prev = document.querySelector('[data-supfest-slider-prev]');
	var next = document.querySelector('[data-supfest-slider-next]');

	if (!slider || !prev || !next) {
		return;
	}

	function move(direction) {
		var slide = slider.querySelector('.supfest-media-slide');
		var amount = slide ? slide.getBoundingClientRect().width + 24 : 420;
		slider.scrollBy({ left: amount * direction, behavior: 'smooth' });
	}

	prev.addEventListener('click', function () {
		move(-1);
	});

	next.addEventListener('click', function () {
		move(1);
	});
});
</script>

<?php get_footer(); ?>
