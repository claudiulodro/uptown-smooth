<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		
		<h1 class="title">
			<?php if ( ! is_singular() ): ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php endif; ?>
				<?php the_title(); ?>
			<?php if ( ! is_singular() ): ?>
				</a>
			<?php endif; ?>
		</h1>
	</header>

	<?php if ( has_post_thumbnail() && ! is_singular() ): ?>
		<div class="thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>

	<div class="content">
		<?php 
		if ( is_singular() ): 
			the_content();
			?><div class="content-links"><?php wp_link_pages(); ?></div><?php
		else:
			the_excerpt();
		endif;
		?>
	</div>

	<?php get_template_part( 'card-byline' ); ?>
	<?php get_template_part( 'card-footer' ); ?>
</article>