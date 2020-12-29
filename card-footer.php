<?php if ( is_single() && 'post' === get_post_type() ) : ?>
	<footer class="card-footer">
		<span class="cat-links"><?php _e( 'Categories: ', 'uptownsmooth' ); ?><?php the_category( ', ' ); ?></span>
		<span class="tag-links"><?php the_tags(); ?></span>
	</footer> 
<?php endif; ?>