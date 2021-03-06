<?php get_header(); ?>

<section id="content" role="main">
	<?php us_the_section_heading(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'card' ); ?>
		<?php comments_template(); ?>
	<?php endwhile; endif; ?>
	
	<?php get_template_part( 'nav', 'below' ); ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>