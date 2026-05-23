<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sverna
 */

?>

<?php $footer_navigation = get_field( 'footer_navigation', 2 ); ?>
<?php $footer_navigation_2 = get_field( 'footer_navigation_2', 2 ); ?>
<?php $footer_text = get_field( 'footer_text', 2 ); ?>
<?php $footer_text_2 = get_field( 'footer_text_2', 2 ); ?>

	</div>

	<footer id="colophon" class="site-footer animation scrollView-animation-faster-fade">
		<div class="container-fluid">
		    <div class="row">
		        <div class="col-md-3 col-sm-3">
		            <a class="logo" href="<?php echo get_site_url() ?>"><img src="<?php echo get_site_url() ?>/wp-content/themes/sverna/assets/logo-belnuc.svg"></a>

                    <div id="footer-text-1" class="text"><?php echo $footer_text ?></div>

                    <div class="copyrights">Copyrights | Belnuc 2026</div>
		        </div>

                <div class="col-md-2 col-md-offset-1 col-sm-3">
		            <div id="footer-text-2" class="text">
                        <?php echo $footer_navigation ?>
		            </div>
                </div>

		        <div class="col-md-2 col-sm-2">
		            <div id="footer-text-3" class="text">
                        <?php echo $footer_navigation_2 ?>
		            </div>
		        </div>

                <div class="col-md-4 col-sm-4">
                    <div id="footer-text-4" class="text"><?php echo $footer_text_2 ?></div>
					<div class="social-links">
						<a href="/"><img src="<?php echo get_site_url() ?>/wp-content/themes/sverna/assets/LinkedinLogo.svg"></a>
						<a href="/"><img src="<?php echo get_site_url() ?>/wp-content/themes/sverna/assets/LinkedinLogo.svg"></a>
					</div>
                </div>
		    </div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>

