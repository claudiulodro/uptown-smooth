<aside class="sidebar">
	<section class="search-container">
		<div class="search">
			<form role="search" method="get" action="<?php echo site_url() ?>">
				<i class="material-icons submit-search">search</i>		
				<input type="text" name="s" placeholder="Search" />
				<input type="submit" value="Search" style="display:none" />
			</form>
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