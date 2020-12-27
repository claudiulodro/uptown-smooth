<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Press+Start+2P&family=Material+Icons&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/uptown-smooth.css?v=<?php echo us_get_version() ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="header">
		<?php if ( has_custom_logo() ): ?>
			<?php $custom_logo_id = get_theme_mod( 'custom_logo' ); ?>
			<?php $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>

			<div class="site-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo esc_url( $logo[0] ); ?>" />
				</a>
			</div>
		<?php endif ?>

		<div class="header-content <?php if ( $logo ): echo 'has-logo'; endif; ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
			</a>
		</div>
	</header>

	<span class="open-menu"><i class="material-icons">menu</i></span>
	<span class="close-menu"><i class="material-icons">close</i></span>
	
	<div class="site-container">
		<div id="container">