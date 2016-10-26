<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package livewell
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php dynamic_sidebar( 'footer-1' ); ?>
			<p class="copyright"><?php echo date('Y'); ?> &copy; Copyright, Live Well Upstate. All Rights Reserved</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
