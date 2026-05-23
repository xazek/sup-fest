<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sverna
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
    <link rel="stylesheet" href="https://use.typekit.net/qjw4jzj.css">
    <link href="https://fonts.googleapis.com/css?family=Muli:100,200,300,400,500,600,700,800,900&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap&subset=latin-ext" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <?php $header_navigation = get_field( 'header_navigation', 2 ); ?>

	<header id="masthead" class="site-header animation scrollView-animation-faster-fade">
        <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/logo_square.svg' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
        </a>

        <?php if ( ! empty( $header_navigation ) && is_array( $header_navigation ) ) : ?>
            <nav class="navigation" aria-label="<?php esc_attr_e( 'Main navigation', 'sverna' ); ?>">
                <ul class="primary-navigation">
                    <?php $used_nav_ids = array(); ?>
                    <?php foreach ( $header_navigation as $nav_item ) : ?>
                        <?php
                        $label      = isset( $nav_item['label'] ) ? trim( $nav_item['label'] ) : '';
                        $url        = isset( $nav_item['url'] ) ? trim( $nav_item['url'] ) : '';
                        $image      = isset( $nav_item['image'] ) ? $nav_item['image'] : '';
                        $list_items = isset( $nav_item['list'] ) && is_array( $nav_item['list'] ) ? $nav_item['list'] : array();
                        $has_panel  = ! empty( $list_items );
                        $image_path = $image ? wp_parse_url( $image, PHP_URL_PATH ) : '';
                        $is_svg     = $image_path && 'svg' === strtolower( pathinfo( $image_path, PATHINFO_EXTENSION ) );

                        if ( '' === $label ) {
                            continue;
                        }

                        $nav_slug = sanitize_title( $label );

                        if ( '' === $nav_slug ) {
                            $nav_slug = 'item';
                        }

                        $base_nav_slug = $nav_slug;
                        $nav_suffix    = 2;

                        while ( in_array( $nav_slug, $used_nav_ids, true ) ) {
                            $nav_slug = $base_nav_slug . '-' . $nav_suffix;
                            $nav_suffix++;
                        }

                        $used_nav_ids[] = $nav_slug;
                        ?>
                        <li id="nav-item-<?php echo esc_attr( $nav_slug ); ?>" class="primary-navigation__item<?php echo $has_panel ? ' has-dropdown' : ''; ?><?php echo $image ? ' has-dropdown-image' : ''; ?><?php echo $is_svg ? ' has-dropdown-svg' : ''; ?>">
                            <a id="nav-link-<?php echo esc_attr( $nav_slug ); ?>" class="primary-navigation__link" href="<?php echo esc_url( $url ? $url : '#' ); ?>">
                                <span><?php echo esc_html( $label ); ?></span>
                                <?php if ( 'mybelnuc-area' === $nav_slug ) : ?>
                                    <span class="primary-navigation__lock" aria-hidden="true"></span>
                                <?php endif; ?>
                                <?php if ( $has_panel ) : ?>
                                    <span class="primary-navigation__chevron" aria-hidden="true"></span>
                                <?php endif; ?>
                            </a>

                            <?php if ( $has_panel ) : ?>
                                <div class="navigation-dropdown">
                                    <div class="navigation-dropdown__inner">
                                        <div class="navigation-dropdown__lists" style="--nav-column-count: <?php echo esc_attr( max( 1, count( $list_items ) ) ); ?>;">
                                            <?php foreach ( $list_items as $list_item ) : ?>
                                                <?php
                                                $list_title = isset( $list_item['r_title'] ) ? trim( $list_item['r_title'] ) : '';
                                                $links      = isset( $list_item['r_list'] ) && is_array( $list_item['r_list'] ) ? $list_item['r_list'] : array();
                                                ?>
                                                <div class="navigation-dropdown__list">
                                                    <?php if ( '' !== $list_title ) : ?>
                                                        <p class="navigation-dropdown__title"><?php echo esc_html( $list_title ); ?></p>
                                                    <?php endif; ?>

                                                    <?php if ( ! empty( $links ) ) : ?>
                                                        <ul>
                                                            <?php foreach ( $links as $link ) : ?>
                                                                <?php
                                                                $link_label = isset( $link['rr_label'] ) ? trim( $link['rr_label'] ) : '';
                                                                $link_url   = isset( $link['rr_url'] ) ? trim( $link['rr_url'] ) : '';

                                                                if ( '' === $link_label ) {
                                                                    continue;
                                                                }
                                                                ?>
                                                                <li>
                                                                    <a href="<?php echo esc_url( $link_url ? $link_url : '#' ); ?>"><?php echo esc_html( $link_label ); ?></a>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>

                                        <?php if ( $image ) : ?>
                                            <div class="navigation-dropdown__image<?php echo $is_svg ? ' img-svg' : ''; ?>">
                                                <img src="<?php echo esc_url( $image ); ?>" alt="">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        <?php endif; ?>

        <span class="nav-button">
            <span></span>
            <span></span>
            <span></span>
        </span>
	</header>

	<div id="content" class="site-content">

<script>
    jQuery( ".nav-button" ).click( function() {
        jQuery( "header .navigation" ).toggleClass( "active" );
    } );

    jQuery( ".navigation" ).click( function( event ) {
        event.stopPropagation();
    } );

    jQuery( ".navigation a" ).click( function() {
        jQuery( ".navigation" ).removeClass( "active" );
    } );
</script>
