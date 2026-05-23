<?php
/**
 * Template name: Components
 */
get_header();

$text = get_field( 'text' );
$text_2 = get_field( 'text_2' );
$text_3 = get_field( 'text_3' );
$image = get_field( 'image' );
$image_2 = get_field( 'image_2' );
$image_3 = get_field( 'image_3' );
$repeater = get_field( 'repeater' );
$repeater_2 = get_field( 'repeater_2' );
$gallery = get_field( 'gallery' );
?>

<section id="components">
    <div id="components-1" class="section">
        <?php /* =================================================================================================================================== */ ?>
        <div class="xaz-subpage-nav">
            <span class="circle-nav"></span>
            <span class="circle-nav-line"></span>
        </div>

        <style>
            .xaz-subpage-nav {
                position: fixed;
                left: 60px;
                top: 250px;
                z-index: 100;
                height: 400px;
            }

            .xaz-subpage-nav .circle-nav {
                height: 9px;
                width: 9px;
                background: #E30613;
                display: block;
                border-radius: 100%;
                top: 0%;
                position: relative;
                left: -1px;
                opacity: 1;
            }

            .xaz-subpage-nav .circle-nav-line {
                height: 100%;
                width: 1px;
                background: #E30613;
                display: block;
                position: absolute;
                top: 0px;
                left: 3px;
                opacity: 0.22;
            }
        </style>

        <script>
            jQuery( window ).scroll( function( $ ) {
                var windowPosition = jQuery( window ).scrollTop();
                var pageHeight = jQuery( "body" ).height();
                var windowHeight = jQuery( window ).height();
                var pagePosition = ( windowPosition / ( pageHeight - windowHeight ) ) * 100;

                jQuery( ".xaz-subpage-nav .circle-nav").css( "top", pagePosition + "%" );
            } );
        </script>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">TYPOGRAPHY</h4>

            <div class="row row-space">
                <div class="col-md-12">
                    <div id="text-1" class="text">
                        <h1>H1 Title</h1>
                        <h2>H2 Title</h2>
                        <h3>H3 Title</h3>
                        <h4>H4 Title</h4>
                        <h5>H5 Title</h5>
                        <p><a href="#" class="btn btn-primary">Button primary</a></p>
                        <p><a href="#" class="btn btn-secondary">Button secondary</a></p>
                        <p><a href="#" class="btn btn-transparent">Button transparent</a></p>
                        <p><a href="#" class="btn btn-primary btn-block">Button primary block</a></p>
                        <p><ul>
                            <li>Normal list</li>
                            <li>Normal list</li>
                            <li>Normal list</li>
                        </ul></p>
                        <p><ol>
                            <li>Numeric list</li>
                            <li>Numeric list</li>
                            <li>Numeric list</li>
                        </ol></p>
                    </div>
                </div>
            </div>
        </div>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">TEXT</h4>

            <div class="row row-space">
                <div class="col-md-12">
                    <div id="text-1" class="text"><?php echo $text ?></div>
                </div>
            </div>
        </div>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">IMAGE 100%</h4>

            <div class="row row-space">
                <div class="col-md-12">
                    <img src="<?php echo $image ?>" class="width-100">
                </div>
            </div>
        </div>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">BACKGROUND IMAGE</h4>

            <div class="row row-space">
                <div class="col-md-12">
                    <div id="xaz-image-1" class="xaz-image" style="background: url( '<?php echo $image ?>' )"></div>
                </div>
            </div>
        </div>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">TEXT / BACKGROUND IMAGE</h4>

            <div class="row row-space">
                <div class="col-md-6">
                    <div id="text-1" class="text"><?php echo $text ?></div>
                </div>

                <div class="col-md-6">
                    <div id="xaz-image-1" class="xaz-image" style="background: url( '<?php echo $image ?>' )"></div>
                </div>
            </div>
        </div>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">IMAGE TEXT SECTION ( REPEATER )</h4>

            <div class="image-text-section">
                <?php $counter = 0; while( have_rows('repeater') ): the_row();
                    $r_image = get_sub_field('r_image');
                    $r_text = get_sub_field('r_text');
                    $counter = $counter + 1;
                ?>
                    <div class="row row-space">
                        <div class="col-md-6 <?php if( $counter % 2 == 0 ): ?> col-md-push-6 <?php endif; ?>">
                            <div id="xaz-image-1" class="xaz-image" style="background: url( '<?php echo $r_image ?>' )"></div>
                        </div>

                        <div class="col-md-6 <?php if( $counter % 2 == 0 ): ?> col-md-pull-6 <?php endif; ?>">
                            <div id="text-1" class="text"><?php echo $r_text ?></div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <style>
            .image-text-section {

            }

            .image-text-section .row {
                margin-top: 50px;
            }

            .image-text-section .text {
                margin-top: 30px;
            }

            @media (max-width: 767px) {
                .image-text-section .text {
                    margin-bottom: 60px;
                }
            }
        </style>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">IMAGE TEXT SECTION ( REPEATER ) - TEXT CENTRED</h4>

            <div class="image-text-centred-section">
                <?php $counter = 0; while( have_rows('repeater') ): the_row();
                    $r_image = get_sub_field('r_image');
                    $r_text = get_sub_field('r_text');
                    $counter = $counter + 1;
                ?>
                    <div class="row">
                        <div class="col-md-6 <?php if( $counter % 2 == 0 ): ?> col-md-push-6 <?php endif; ?>">
                            <div id="xaz-image-1" class="xaz-image" style="background: url( '<?php echo $r_image ?>' )"></div>
                        </div>

                        <div class="col-md-6 <?php if( $counter % 2 == 0 ): ?> col-md-pull-6 <?php endif; ?>">
                            <div id="text-1" class="text">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <?php echo $r_text ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <style>
            .image-text-centred-section {

            }

            .image-text-centred-section .row {

            }

            .image-text-centred-section .text {
                height: 400px;
                padding: 0px 30px;
            }

            @media (max-width: 767px) {
                .image-text-section .text {
                    margin-top: 30px;
                    margin-bottom: 60px;
                    height: auto;
                }
            }
        </style>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">VIDEO AUTOPLAY</h4>

            <div id="xaz-video-image-1" class="xaz-video">
                <video width="100%" height="600" autoplay="true" muted="" loop="true" poster="<?php echo $image ?>">
                    <source src="<?php echo get_site_url() ?>/wp-content/themes/sverna/assets/movie.mp4" type="video/mp4">
                </video>
            </div>
        </div>

        <style>
            .xaz-video {
                height: auto;
                position: relative;
            }

            .xaz-video video {
                height: auto;
            }
        </style>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">VIDEO CONTROLS</h4>

            <div id="xaz-video-image-1" class="xaz-video">
                <video width="100%" height="600" controls poster="<?php echo $image ?>">
                    <source src="<?php echo get_site_url() ?>/wp-content/themes/sverna/assets/movie.mp4" type="video/mp4">
                </video>
            </div>
        </div>

        <style>
            .xaz-video {
                height: auto;
                position: relative;
            }

            .xaz-video video {
                height: auto;
            }
        </style>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">VIDEO IMAGE</h4>

            <div id="xaz-video-image-1" class="xaz-video-image">
                <div class="xaz-image poster" style="background: url( '<?php echo $image ?>' )">
                    <img src="<?php echo get_site_url() ?>/wp-content/themes/sverna/assets/logo_square.svg">
                </div>

                <video width="100%" height="600" controls poster="<?php echo $image ?>">
                    <source src="<?php echo get_site_url() ?>/wp-content/themes/sverna/assets/movie.mp4" type="video/mp4">
                </video>
            </div>
        </div>

        <style>
            .xaz-video-image {
                height: 600px;
                position: relative;
            }

            .xaz-video-image .poster {
                height: 100%;
                position: absolute;
                z-index: 1;
                width: 100%;
            }

            .xaz-video-image .poster img {
                position: absolute;
                top: 50%;
                left: 50%;
                margin-top: -32px;
                margin-left: -32px;
                cursor: pointer;
            }

            .xaz-video-image video {
                height: 100%;
            }
        </style>

        <script>
            // Removal of poster + video start
            jQuery( document ).ready( function( ) {
                jQuery( ".xaz-video-image .poster img" ).on( "click", function( ) {
                    jQuery( this ).closest( ".xaz-video-image" ).find( ".poster" ).hide();
                    jQuery( this ).closest( ".xaz-video-image" ).find( "video" ).get(0).play();
                } );
            } );
        </script>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">VIDEO FULL SCREEN</h4>
        </div>

        <div class="xaz-video-full">
            <video autoplay="true" muted="" loop="true" id="myVideo" preload="metadata">
                <source src="<?php echo get_site_url() ?>/wp-content/themes/sverna/assets/movie.mp4" type="video/mp4">
            </video>

            <div class="gradient-overlay">
                <div class="video-content">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="container-fluid">
                                <div class="text"><?php echo $text ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .xaz-video-full {
                height: 100vh;
                width: 100%;
                overflow: hidden;
                position: relative;
            }

            .xaz-video-full video {
                object-fit: cover;
                width: 100vw;
                height: 100vh;
                position: absolute;
                top: 0;
                left: 0;
            }

            .xaz-video-full .gradient-overlay {
                width: 100%;
                position: absolute;
                top: 0px;
                left: 0px;
                text-align: left;
                background: rgba( 0, 0, 0, 0.5 );
                height: 100vh;
                display: flex;
                align-items: center;
            }

            .xaz-video-full .gradient-overlay .video-content {
                margin-top: 0px;
                width: 100%;
            }

            .xaz-video-full .gradient-overlay .video-content .text {
                width: 60%;
                margin-left: 20%;
                text-align: center;
            }

            .xaz-video-full .gradient-overlay .video-content h3 {
                color: #fff;
            }

            .xaz-video-full .gradient-overlay .video-content p {
                color: #fff;
                text-align: center;
                font-size: 18px;
            }
        </style>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">ICON TEXT BOX</h4>

            <div class="xaz-icon-text-list">
                <div class="row row-space">
                    <?php $counter = 0; while( have_rows('repeater_2') ): the_row();
                        $r_icon = get_sub_field('r_icon');
                        $r_text = get_sub_field('r_text');
                        $counter = $counter + 1;
                    ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="box">
                                <img src="<?php echo $r_icon ?>">

                                <div class="text"><?php echo $r_text ?></div>
                            </div>
                        </div>

                        <?php if( $counter % 4 == 0 ): ?>
                            <div class="clearfix hidden-sm hidden-xs"></div>
                        <?php endif; ?>

                        <?php if( $counter % 2 == 0 ): ?>
                            <div class="clearfix hidden-md hidden-lg visible-sm hidden-xs"></div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

        <style>
            .xaz-icon-text-list {

            }

            .xaz-icon-text-list .box {
                text-align: center;
                margin-bottom: 30px;
            }

            .xaz-icon-text-list .box img {
                margin-bottom: 10px;
            }

            .xaz-icon-text-list .box p {
                text-align: center;
            }
        </style>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">TEXT BOX</h4>

            <div class="xaz-text-list">
                <div class="row row-space">
                    <?php $counter = 0; while( have_rows('repeater_2') ): the_row();
                        $r_text = get_sub_field('r_text');
                        $counter = $counter + 1;
                    ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="box">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="text"><?php echo $r_text ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if( $counter % 4 == 0 ): ?>
                            <div class="clearfix hidden-sm hidden-xs"></div>
                        <?php endif; ?>

                        <?php if( $counter % 2 == 0 ): ?>
                            <div class="clearfix hidden-md hidden-lg visible-sm hidden-xs"></div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

        <style>
            .xaz-text-list {

            }

            .xaz-text-list .box {
                text-align: center;
                margin-bottom: 30px;
                height: 250px;
                border: solid 1px #ccc;
                padding: 30px;
            }

            .xaz-text-list .box p {
                text-align: center;
                margin-bottom: 0px;
            }
        </style>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">ICON BOX</h4>

            <div class="xaz-icon-list">
                <div class="row row-space">
                    <?php $counter = 0; while( have_rows('repeater_2') ): the_row();
                        $r_icon = get_sub_field('r_icon');
                        $counter = $counter + 1;
                    ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="box">
                                 <div class="display-table">
                                     <div class="display-table-cell">
                                         <img src="<?php echo $r_icon ?>">
                                     </div>
                                 </div>
                             </div>
                        </div>

                        <?php if( $counter % 4 == 0 ): ?>
                            <div class="clearfix hidden-sm hidden-xs"></div>
                        <?php endif; ?>

                        <?php if( $counter % 2 == 0 ): ?>
                            <div class="clearfix hidden-md hidden-lg visible-sm hidden-xs"></div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

        <style>
            .xaz-icon-list {

            }

            .xaz-icon-list .box {
                text-align: center;
                margin-bottom: 30px;
                height: 150px;
                border: solid 1px #ccc;
                padding: 10px;
            }

            .xaz-icon-list .box img {
               max-height: 120px;
            }
        </style>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">ICON TEXT BOX HORIZONTAL</h4>

            <?php $counter = 0; while( have_rows('repeater_2') ): the_row();
                $r_icon = get_sub_field('r_icon');
                $r_text = get_sub_field('r_text');
                $counter = $counter + 1;
            ?>
                <div class="xaz-icon-text-box-horizontal">
                    <img src="<?php echo $r_icon ?>">

                    <div class="text"><?php echo $r_text ?></div>
                </div>
            <?php endwhile; ?>
        </div>

        <style>
            .xaz-icon-text-box-horizontal {
                display: flex;
                align-items: center;
                margin-bottom: 30px;
            }

            .xaz-icon-text-box-horizontal img {
                margin-right: 30px;
            }

            .xaz-icon-text-box-horizontal .text {

            }

            .xaz-icon-text-box-horizontal .text p {
                margin-bottom: 0px;
            }
        </style>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">PARALLAX IMAGE</h4>
        </div>

        <div class="xaz-parallax-image" style="background: url( '<?php echo $image ?>' )">
            <div class="gradient">
                <div class="container-fluid">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="row row-space">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="text">
                                        <?php echo $text ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .xaz-parallax-image {
                background-attachment: fixed !important;
                background-position: center !important;
                background-repeat: no-repeat !important;
                background-size: cover !important;
                height: auto;
            }

            .xaz-parallax-image .gradient {
                background: rgba( 43, 47, 58, 0.7 );
            }

            .xaz-parallax-image .container-fluid {
                height: 400px;
                text-align: center;
            }

            .xaz-parallax-image .text {
                text-align: center;
                color: #fff;
            }

            .xaz-parallax-image .text h3 {
                color: #fff;
            }

            .xaz-parallax-image .text p {
                text-align: center;
                color: #fff;
            }
        </style>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">PARALLAX IMAGE HORIZONTAL</h4>

            <div class="row row-space">
                <div class="col-md-4 col-md-offset-4">
                    <div class="xaz-parallax-image-horizontal-container">
                        <div class="xaz-parallax-image-horizontal" style="background: url( '<?php echo $image ?>' )"></div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .xaz-parallax-image-horizontal-container {
                overflow: hidden;
                width: 100%;
            }

            .xaz-parallax-image-horizontal {
                width: 1000px;
                height: 600px;
                background-position: center !important;
                background-repeat: no-repeat !important;
                background-size: cover !important;
            }
        </style>

        <script>
            // Paralax Horizointal
            jQuery( window ).scroll( function( $ ) {
                if( jQuery( ".xaz-parallax-image-horizontal").length > 0 ) {
                    var windowHeight = jQuery( window ).height();
                    var windowPosition = jQuery( window ).scrollTop();
                    var currentElementContainer = jQuery( ".xaz-parallax-image-horizontal-container" );
                    var currentElement = jQuery( ".xaz-parallax-image-horizontal" );
                    var elementPosition = currentElement.offset().top;
                    var windowScrollValue = ( ( windowPosition + windowHeight - elementPosition ) / windowHeight ) * 20;
                    var paralaxValue = ( currentElement.width() - currentElementContainer.width() ) / 100;

                    if( windowScrollValue > 0 ) {
                        currentElement.css( "margin-left", "-" + ( paralaxValue * windowScrollValue * 2 ) + "px" );
                    } else {
                        currentElement.css( "margin-left", "0px" );
                    }
                }
            } );
        </script>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">GALLERY</h4>

            <div class="xaz-gallery">
                <div class="row row-space">
                    <?php foreach( $gallery as $g_image ): ?>
                        <div class="col-md-3">
                            <a class="xaz-image" href="<?php echo $g_image['url']; ?>" data-lightbox="xaz-gallery" style="background: url( '<?php echo $g_image['url']; ?>)"></a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <style>
            .xaz-gallery {

            }

            .xaz-gallery .xaz-image {
                display: block;
                margin-bottom: 30px;
                height: 250px;
            }

            .xaz-gallery .xaz-image:hover {
                transform: scale( 0.95 );
                opacity: 0.66;
            }
        </style>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">GALLERY MODULA</h4>

            <div class="xaz-gallery-modula"><?php echo do_shortcode('[modula id="53"]'); ?></div>
        </div>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">GALLERY CAROUSEL - PREV/NEXT</h4>

            <div class="xaz-gallery-carousel" data-flickity='{ "contain": true, "prevNextButtons": true, "pageDots": false, "wrapAround": true }'>
                <?php if( $gallery ): ?>
                    <?php foreach( $gallery as $g_image ): ?>
                        <div class="carousel-cell">
                            <div class="xaz-image" style="background: url( '<?php echo $g_image['url']; ?>' )"></div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <style>
            .xaz-gallery-carousel {

            }

            .xaz-gallery-carousel .carousel-cell {
                width: 33.33%;
                padding: 0px 5px;
            }

            .xaz-gallery-carousel .xaz-image {
                height: 400px;
                width: 100%;
            }
        </style>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">GALLERY CAROUSEL - DOTS</h4>

            <div class="xaz-gallery-carousel-dots" data-flickity='{ "contain": true, "prevNextButtons": false, "pageDots": true, "wrapAround": true }'>
                <?php if( $gallery ): ?>
                    <?php foreach( $gallery as $g_image ): ?>
                        <div class="carousel-cell">
                            <div class="xaz-image" style="background: url( '<?php echo $g_image['url']; ?>' )"></div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <style>
            .xaz-gallery-carousel-dots {

            }

            .xaz-gallery-carousel-dots .carousel-cell {
                width: 100%;
            }

            .xaz-gallery-carousel-dots .xaz-image {
                height: 600px;
                width: 100%;
            }

            .xaz-gallery-carousel-dots .flickity-page-dots {
                text-align: left;
                bottom: -10px;
            }

            .xaz-gallery-carousel-dots .flickity-page-dots .dot {
                width: 16px;
                height: 16px;
                margin: 0 5px !important;
                background: #fff;
                opacity: 1;
            }

            .xaz-gallery-carousel-dots .flickity-page-dots .dot.is-selected {
                background: #E30613;
            }
        </style>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">ACCORDION</h4>

            <div class="xaz-accordion">
                <div class="accordion-header">
                    <div class="text">Accordion title</div>

                    <span id="accordion-button-1" class="accordion-button">+</span>
                    <span id="accordion-button-2" class="accordion-button">-</span>
                </div>

                <div class="accordion-body">
                    <div class="accordion-content">
                        <?php echo $text_2 ?>
                    </div>
                </div>
            </div>

            <div class="xaz-accordion">
                <div class="accordion-header">
                    <div class="text">Accordion title - Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>

                    <span id="accordion-button-1" class="accordion-button">+</span>
                    <span id="accordion-button-2" class="accordion-button">-</span>
                </div>

                <div class="accordion-body">
                    <div class="accordion-content">
                        <?php echo $text_2 ?>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .xaz-accordion {
                border: solid 1px #ccc;
                padding: 0px;
                margin-bottom: 30px;
            }

            .xaz-accordion .accordion-header {
                font-size: 24px;
                font-weight: 400;
                color: #222;
                cursor: pointer;
                padding: 20px 30px;
                display: flex;
                align-items: center;
            }

            .xaz-accordion .accordion-header .text {
                width: 100%;
                display: inline-block;
                padding-right: 40px;
            }

            .xaz-accordion .accordion-body {
                height: 0px;
                overflow: hidden;
            }

            .xaz-accordion.active .accordion-body {
                height: auto;
            }

            .xaz-accordion .accordion-content {
                padding: 30px 30px 0px 30px;
            }

            .xaz-accordion .accordion-button {
                color: #fff;
                width: 27px;
                height: 27px;
                display: block;
                background: #E30613;
                border-radius: 100%;
                text-align: center;
                padding: 13px 9px;
                float: right;
                font-size: 18px;
                line-height: 0px;
                font-weight: 700;
            }

            .xaz-accordion #accordion-button-2 {
                display: none;
                padding: 13px 10px;
            }

            .xaz-accordion.active #accordion-button-2 {
                display: block;
            }

            .xaz-accordion.active #accordion-button-1 {
                display: none;
            }
        </style>

        <script>
            jQuery( ".accordion-header" ).click( function() {
                jQuery( this ).parent().toggleClass( "active" );
            } );
        </script>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">BACKGROUND BOX</h4>

            <div class="xaz-background-box">
                <div class="text"><?php echo $text ?></div>
            </div>
        </div>

        <style>
            .xaz-background-box {
                background: #E30613;
                padding: 60px 60px 30px 60px;
                color: #fff;
            }

            .xaz-background-box p {
                color: #fff;
            }

            .xaz-background-box h3 {
                color: #fff;
            }
        </style>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">BANNER SMALL</h4>
        </div>

        <div class="xaz-banner-small xaz-image" style="background: url( '<?php echo $image ?>' )">
            <div class="gradient">
                <div class="container-fluid">
                    <div class="text"><h1>BANNER TITLE</h1></div>
                </div>
            </div>
        </div>

        <style>
            .xaz-banner-small {
               height: auto;
            }

            .xaz-banner-small .gradient {
                background: rgba( 43, 47, 58, 0.7 );
            }

            .xaz-banner-small .container-fluid {
                height: 250px;
                display: flex;
                align-items: center;
            }

            .xaz-banner-small .text {
                color: #fff;
            }

            .xaz-banner-small .text h1 {
                color: #fff;
                margin-bottom: 0px;
            }

            .xaz-banner-small .text p {
                color: #fff;
            }
        </style>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">CONTACT FORM</h4>

            <div class="row row-space">
                <div class="col-md-8 col-md-offset-2">
                    <div class="xaz-contact"><?php echo do_shortcode( '[contact-form-7 id="8" title="Formularz 1"]' ) ?></div>
                </div>
            </div>
        </div>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">COUNT BOX</h4>

            <div class="row row-space">
                <div class="col-md-4">
                    <div class="xaz-count-box">
                        <div class="count-text">
                            <span class="count" data-counter="100">0</span>
                        </div>

                        <div class="text">Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit</div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="xaz-count-box">
                        <div class="count-text">
                            <span class="count" data-counter="20">0</span>
                        </div>

                        <div class="text">Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit</div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="xaz-count-box">
                        <div class="count-text">
                            <span class="count" data-counter="10000">0</span>+
                        </div>

                        <div class="text">Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit</div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .xaz-count-box {
                margin-bottom: 30px;
                text-align: center;
            }

            .xaz-count-box .count-text {
                font-size: 60px;
                font-weight: 700;
                margin-bottom: 30px;
            }

            .xaz-count-box .text {

            }
        </style>

        <script>
            // Count animation
            jQuery( window ).scroll( function( $ ) {
                var windowPosition = jQuery( window ).scrollTop();
                var windowHeight = jQuery( window ).height();

                jQuery( ".count" ).each( function ( ) {
                    var currentElement = jQuery( this );

                    if( ( currentElement.offset().top - ( windowHeight / 1.5 ) ) < windowPosition ) {
                        if( !currentElement.hasClass( "active" ) ) {
                            currentElement.addClass( "active" );
                            currentElement.prop('Counter',0).animate({
                                Counter: currentElement.data("counter")
                            }, {
                                duration: 3000,
                                easing: 'swing',
                                step: function (now) {
                                    currentElement.text(Math.ceil(now));
                                }
                            });
                        }
                    }
                } );
            } );
        </script>

        <?php /* =================================================================================================================================== */ ?>
        <div class="container-fluid">
            <h4 class="component-info">NEWS BOX LIST - QUERY SELECTION ALL POSTS</h4>

            <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                );

                $parent = new WP_Query( $args );
            ?>

            <?php if ($parent->have_posts()) : ?>
                <div class="xaz-news-box-list">
                    <div class="row row-space">
                        <?php $counter = 0; while ($parent->have_posts()) : $parent->the_post();
                            $sneak_peak_image = get_field( 'sneak_peak_image', $post->ID );
                            $sneak_peak_text = get_field( 'sneak_peak_text', $post->ID );
                            $counter = $counter + 1;
                        ?>
                            <div class="col-md-4 col-sm-6">
                                <a href="<?php the_permalink(); ?>" class="box">
                                    <div class="xaz-image" style="background: url( '<?php echo $sneak_peak_image ?>' )"></div>
                                    <div class="date"><?php the_time('d.m.Y'); ?></div>
                                    <div class="title"><h4><?php the_title(); ?></h4></div>
                                    <div class="text"><?php echo $sneak_peak_text; ?></div>
                                </a>
                            </div>

                            <?php if( $counter % 3 == 0 ): ?>
                                <div class="clearfix hidden-sm hidden-xs"></div>
                            <?php endif; ?>

                            <?php if( $counter % 2 == 0 ): ?>
                                <div class="clearfix hidden-md hidden-lg visible-sm hidden-xs"></div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; wp_reset_postdata(); ?>
        </div>

        <style>
            .xaz-news-box-list {

            }

            .xaz-news-box-list .box {
                display: block;
                margin-bottom: 50px;
            }

            .xaz-news-box-list .box:hover {
                opacity: 0.66;
            }

            .xaz-news-box-list .box .xaz-image {
                height: 250px;
                margin-bottom: 10px;
            }

            .xaz-news-box-list .box .date {
                font-size: 14px;
                color: #666;
                line-height: 14px;
                margin-bottom: 10px;
            }

            .xaz-news-box-list .box .title {
                margin-bottom: 10px;
            }

            .xaz-news-box-list .box .title h4 {
                margin-bottom: 0px;
                color: #222;
                font-weight: 600;
            }

            .xaz-news-box-list .box .text {
                color: #222;
            }

            .xaz-news-box-list .box .text p {
                color: #222;
            }
        </style>
    </div>
</section>

<?php get_footer(); ?>



