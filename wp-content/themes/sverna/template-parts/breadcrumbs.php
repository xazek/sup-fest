<?php
/**
 * Shared breadcrumbs partial.
 *
 * @package sverna
 */

if ( empty( $breadcrumb_items ) || ! is_array( $breadcrumb_items ) ) {
	return;
}
?>
<nav class="xaz-breadcrumb" aria-label="Breadcrumb">
	<?php foreach ( $breadcrumb_items as $index => $breadcrumb_item ) : ?>
		<?php if ( $index > 0 ) : ?>
			<span class="breadcrumb-separator">/</span>
		<?php endif; ?>
		<a class="breadcrumb-link" href="<?php echo esc_url( $breadcrumb_item['url'] ); ?>">
			<?php echo esc_html( $breadcrumb_item['title'] ); ?>
		</a>
	<?php endforeach; ?>
</nav>
