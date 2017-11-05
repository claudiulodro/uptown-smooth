<?php if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) return; ?>

<section id="comments">
	<?php 
	if ( have_comments() ) : 
		global $comments_by_type;
		$comments_by_type = &separate_comments( $comments );
		if ( ! empty( $comments_by_type['comment'] ) ) : 
			?>
			<section id="comments-list" class="comments">
				<h3 class="comments-title"><?php comments_number(); ?></h3>

				<ul>
					<?php wp_list_comments( 'type=comment' ); ?>
				</ul>
			</section>
			<?php 
		endif; 
	endif;
	
	if ( comments_open() ) comment_form();
?>
</section>