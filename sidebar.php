<aside class="sidebar">
	<section class="branding">
		<?php if ( $logo = get_custom_logo() ): ?>
			<div class="site-logo">
				<?php echo $logo; ?>
			</div>
		<?php endif; ?>

		<div class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
			</a>
		</div>
	</section>

	<div class="sidebar-content">
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>

		<?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
			<div class="widget-container">
				<ul class="widgets">
					<?php dynamic_sidebar( 'primary-widget-area' ); ?>
				</ul>
			</div>
		<?php endif; ?>
	</div>
</aside>