<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dan
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-inner">

			<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) ) : ?>

			<aside class="footer-widget" role="complementary">
				<div class="footer-widget-inner">
					<div class="widget-column footer-widget-1">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
					<div class="widget-column footer-widget-2">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
				</div><!-- .footer-widget-inner -->
			</aside><!-- .footer-widget -->

			<?php endif; ?>

			<div class="site-info">
				<div class="site-info-inner">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'dan' ) ); ?>"><?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'dan' ), 'WordPress' );
					?></a>
					<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'dan' ), 'dan', '<a href="' . esc_url( __( 'https://profiles.wordpress.org/yochix2', 'dan' ) ) . '">' . esc_html__( 'Yochi', 'dan' ) . '</a>' );
					?>
				</div><!-- .site-info-inner -->
			</div><!-- .site-info -->
		</div><!-- .footer-inner -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
