<?php
/**
 * ACF fields for the SUP FEST landing page.
 *
 * @package sverna
 */

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

acf_add_local_field_group(
	array(
		'key'                   => 'group_sverna_supfest',
		'title'                 => 'SUP FEST - landing page',
		'fields'                => array(
			array(
				'key'   => 'field_supfest_tab_hero',
				'label' => 'Hero',
				'name'  => '',
				'type'  => 'tab',
			),
			array(
				'key'           => 'field_supfest_logo',
				'label'         => 'Logo',
				'name'          => 'supfest_logo',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
			),
			array(
				'key'           => 'field_supfest_hero_video',
				'label'         => 'Film w tle',
				'name'          => 'supfest_hero_video',
				'type'          => 'file',
				'return_format' => 'array',
				'mime_types'    => 'mp4,webm,mov',
			),
			array(
				'key'           => 'field_supfest_hero_poster',
				'label'         => 'Obraz zastepczy hero',
				'name'          => 'supfest_hero_poster',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
			),
			array(
				'key'           => 'field_supfest_title',
				'label'         => 'Tytul',
				'name'          => 'supfest_title',
				'type'          => 'text',
				'default_value' => 'SUP FEST POZNAŃ',
			),
			array(
				'key'           => 'field_supfest_lead',
				'label'         => 'Krotki opis',
				'name'          => 'supfest_lead',
				'type'          => 'textarea',
				'rows'          => 4,
				'default_value' => 'Weekend na wodzie nad Jeziorem Strzeszyńskim: wyścigi SUP, warsztaty, testy sprzętu i energia festiwalu.',
			),
			array(
				'key'           => 'field_supfest_primary_cta',
				'label'         => 'Glowny przycisk',
				'name'          => 'supfest_primary_cta',
				'type'          => 'link',
				'return_format' => 'array',
			),
			array(
				'key'           => 'field_supfest_secondary_cta',
				'label'         => 'Drugi przycisk',
				'name'          => 'supfest_secondary_cta',
				'type'          => 'link',
				'return_format' => 'array',
			),
			array(
				'key'          => 'field_supfest_facts',
				'label'        => 'Najwazniejsze informacje',
				'name'         => 'supfest_facts',
				'type'         => 'repeater',
				'layout'       => 'table',
				'button_label' => 'Dodaj informacje',
				'sub_fields'   => array(
					array(
						'key'   => 'field_supfest_fact_label',
						'label' => 'Etykieta',
						'name'  => 'label',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_supfest_fact_value',
						'label' => 'Wartosc',
						'name'  => 'value',
						'type'  => 'text',
					),
				),
			),
			array(
				'key'   => 'field_supfest_tab_content',
				'label' => 'Tresc',
				'name'  => '',
				'type'  => 'tab',
			),
			array(
				'key'     => 'field_supfest_info_text',
				'label'   => 'Informacje o evencie',
				'name'    => 'supfest_info_text',
				'type'    => 'wysiwyg',
				'tabs'    => 'all',
				'toolbar' => 'full',
			),
			array(
				'key'           => 'field_supfest_info_images',
				'label'         => 'Zdjecia przy opisie',
				'name'          => 'supfest_info_images',
				'type'          => 'gallery',
				'return_format' => 'array',
				'preview_size'  => 'medium',
			),
			array(
				'key'   => 'field_supfest_news_title',
				'label' => 'Tytul aktualnosci',
				'name'  => 'supfest_news_title',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_supfest_news_link',
				'label' => 'Link do wszystkich aktualnosci',
				'name'  => 'supfest_news_link',
				'type'  => 'url',
			),
			array(
				'key'          => 'field_supfest_gallery',
				'label'        => 'Galeria',
				'name'         => 'supfest_gallery',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Dodaj slajd',
				'sub_fields'   => array(
					array(
						'key'     => 'field_supfest_gallery_type',
						'label'   => 'Typ',
						'name'    => 'type',
						'type'    => 'button_group',
						'choices' => array(
							'image'   => 'Zdjecie',
							'youtube' => 'YouTube',
						),
						'default_value' => 'image',
					),
					array(
						'key'               => 'field_supfest_gallery_image',
						'label'             => 'Zdjecie',
						'name'              => 'image',
						'type'              => 'image',
						'return_format'     => 'array',
						'conditional_logic' => array(
							array(
								array(
									'field'    => 'field_supfest_gallery_type',
									'operator' => '==',
									'value'    => 'image',
								),
							),
						),
					),
					array(
						'key'               => 'field_supfest_gallery_youtube',
						'label'             => 'Link YouTube',
						'name'              => 'youtube_url',
						'type'              => 'url',
						'conditional_logic' => array(
							array(
								array(
									'field'    => 'field_supfest_gallery_type',
									'operator' => '==',
									'value'    => 'youtube',
								),
							),
						),
					),
				),
			),
			array(
				'key'          => 'field_supfest_competitions',
				'label'        => 'Konkurencje',
				'name'         => 'supfest_competitions',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Dodaj konkurencje',
				'sub_fields'   => array(
					array(
						'key'   => 'field_supfest_competition_name',
						'label' => 'Nazwa',
						'name'  => 'name',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_supfest_competition_distance',
						'label' => 'Dystans / etykieta',
						'name'  => 'distance',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_supfest_competition_description',
						'label' => 'Opis',
						'name'  => 'description',
						'type'  => 'textarea',
						'rows'  => 3,
					),
				),
			),
			array(
				'key'   => 'field_supfest_tab_details',
				'label' => 'Szczegoly',
				'name'  => '',
				'type'  => 'tab',
			),
			array(
				'key'     => 'field_supfest_schedule_text',
				'label'   => 'Opis harmonogramu',
				'name'    => 'supfest_schedule_text',
				'type'    => 'wysiwyg',
				'toolbar' => 'basic',
			),
			array(
				'key'          => 'field_supfest_schedule',
				'label'        => 'Harmonogram',
				'name'         => 'supfest_schedule',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Dodaj punkt',
				'sub_fields'   => array(
					array(
						'key'   => 'field_supfest_schedule_time',
						'label' => 'Czas',
						'name'  => 'time',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_supfest_schedule_title',
						'label' => 'Tytul',
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_supfest_schedule_description',
						'label' => 'Opis',
						'name'  => 'description',
						'type'  => 'textarea',
						'rows'  => 2,
					),
				),
			),
			array(
				'key'          => 'field_supfest_sponsors',
				'label'        => 'Sponsorzy',
				'name'         => 'supfest_sponsors',
				'type'         => 'repeater',
				'layout'       => 'table',
				'button_label' => 'Dodaj sponsora',
				'sub_fields'   => array(
					array(
						'key'   => 'field_supfest_sponsor_name',
						'label' => 'Nazwa',
						'name'  => 'name',
						'type'  => 'text',
					),
					array(
						'key'           => 'field_supfest_sponsor_logo',
						'label'         => 'Logo',
						'name'          => 'logo',
						'type'          => 'image',
						'return_format' => 'array',
					),
					array(
						'key'   => 'field_supfest_sponsor_url',
						'label' => 'Link',
						'name'  => 'url',
						'type'  => 'url',
					),
				),
			),
			array(
				'key'          => 'field_supfest_pricing',
				'label'        => 'Cennik',
				'name'         => 'supfest_pricing',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Dodaj pakiet',
				'sub_fields'   => array(
					array(
						'key'   => 'field_supfest_price_name',
						'label' => 'Nazwa',
						'name'  => 'name',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_supfest_price_price',
						'label' => 'Cena',
						'name'  => 'price',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_supfest_price_description',
						'label' => 'Opis',
						'name'  => 'description',
						'type'  => 'textarea',
						'rows'  => 2,
					),
				),
			),
			array(
				'key'   => 'field_supfest_tab_links',
				'label' => 'Linki i zapisy',
				'name'  => '',
				'type'  => 'tab',
			),
			array(
				'key'   => 'field_supfest_facebook',
				'label' => 'Facebook',
				'name'  => 'supfest_facebook',
				'type'  => 'url',
			),
			array(
				'key'   => 'field_supfest_instagram',
				'label' => 'Instagram',
				'name'  => 'supfest_instagram',
				'type'  => 'url',
			),
			array(
				'key'   => 'field_supfest_youtube',
				'label' => 'YouTube',
				'name'  => 'supfest_youtube',
				'type'  => 'url',
			),
			array(
				'key'   => 'field_supfest_rules_text',
				'label' => 'Tekst regulaminu',
				'name'  => 'supfest_rules_text',
				'type'  => 'textarea',
				'rows'  => 3,
			),
			array(
				'key'           => 'field_supfest_rules_link',
				'label'         => 'Link do regulaminu',
				'name'          => 'supfest_rules_link',
				'type'          => 'link',
				'return_format' => 'array',
			),
			array(
				'key'           => 'field_supfest_map_image',
				'label'         => 'Grafika mapy',
				'name'          => 'supfest_map_image',
				'type'          => 'image',
				'return_format' => 'array',
			),
			array(
				'key'   => 'field_supfest_map_link',
				'label' => 'Link do mapy',
				'name'  => 'supfest_map_link',
				'type'  => 'url',
			),
			array(
				'key'   => 'field_supfest_signup_embed',
				'label' => 'Formularz zapisow - shortcode / embed',
				'name'  => 'supfest_signup_embed',
				'type'  => 'textarea',
				'rows'  => 6,
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => 'sup-fest.php',
				),
			),
			array(
				array(
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => 'home.php',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
	)
);
