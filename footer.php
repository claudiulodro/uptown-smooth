	</div>
	<footer class="footer">
		<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>

		<div class="copyright">
			<?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'uptownsmooth' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); ?>
			<br/><br/>
			<?php _e( 'Theme by' ); ?> <a href="https://codingfacility.com">Coding Facility</a>
		</div>
	</footer>
</div>

<script>
	// Simple navigation control scripts.
	( function( $ ) {
		$( '.open-menu' ).on( 'touchend click', function( evt ) {
			evt.preventDefault();
			$( 'body' ).addClass( 'menu-open' );
		} );

		$( '.close-menu' ).on( 'touchend click', function( evt ) {
			evt.preventDefault();
			$( 'body' ).removeClass( 'menu-open' );
		} );

		$( '.submit-search' ).on( 'touchend click', function( evt ) {
			evt.preventDefault();
			$( this ).parent().find( 'input[type="submit"]' ).click();
		} );
	} )( jQuery );
</script>

<?php wp_footer(); ?>

</body>
</html>