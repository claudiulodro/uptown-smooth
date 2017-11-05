<?php

function us_get_hex_colors() {
	return array(
		'#000000',
		'#FFFFFF',
		'#a6a6a6',
		'#678695',
		'#865f50',
		'#ffa300',
		'#ffc800',
		'#ffee2c',
		'#d2e02c',
		'#91c84a',
		'#4ab553',
		'#009e91',
		'#00c1d9',
		'#00aff8',
		'#009ef7',
		'#435abe',
		'#7243c1',
		'#a830ba',
		'#f2316e',
		'#fc523c',
		'#ff6622',
	);
}

if ( class_exists('WP_Customize_Control') ) {

    class US_Customize_Color_Control extends WP_Customize_Control {

        public function render_content() {
        	$colors = us_get_hex_colors();

        	ob_start();
        	?>
        	<select name="<?php echo $this->id ?>">
        		<?php foreach ( $colors as $color ): ?>
        			<option value="<?php echo $color ?>" style="background-color: <?php echo $color; ?>"><?php echo $color; ?></option>
        		<?php endforeach; ?>
        	</select>
        	<?php


            $dropdown = ob_get_clean();
 
            // Hackily add in the data link parameter.
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
 
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
}

function us_customize_register( $wp_customize ) {

	$colors = us_get_hex_colors();
	$color_select = array();
	foreach ( $colors as $color ) {
		$color_select[$color] = $color;
	}

	$wp_customize->add_section( 'uptownsmooth', array(
		'title' => __( 'Uptown Smooth', 'uptownsmooth' ),
		'description' => __( 'Set the theme colors', 'uptownsmooth' ),
		'priority' => 170,
		'capability' => 'edit_theme_options',
	) );

	$color_settings = array(
		'us_primarycolor' => 'Primary Color',
		'us_secondarycolor' => 'Secondary Color',
		'us_titlecolor' => 'Title Color',
		'us_secondaryaccentcolor' => 'Secondary Accent Color (Mobile only)',
	);

	foreach ( $color_settings as $setting => $label ) {
		$wp_customize->add_setting( $setting, array(
			'type' => 'theme_mod', // or 'option'
			'capability' => 'edit_theme_options',
			'default' => $colors[0],
			'transport' => 'refresh', // or postMessage
			'sanitize_callback' => 'sanitize_hex_color',
		) );

    	$wp_customize->add_control( new US_Customize_Color_Control(
        	$wp_customize,
        	$setting,
        	array(
            	'label'    => $label,
            	'settings' => $setting,
            	'section'  => 'uptownsmooth'
        	)
    	) );
	}
}
add_action( 'customize_register', 'us_customize_register' );

function us_output_custom_colors() {
	$colors = us_get_hex_colors();
	$primary = sanitize_hex_color( get_theme_mod( 'us_primarycolor', $colors[0] ) );
	$secondary = sanitize_hex_color( get_theme_mod( 'us_secondarycolor', $colors[0] ) );
	$title = sanitize_hex_color( get_theme_mod( 'us_titlecolor', $colors[1] ) );
	$secondary_accent = sanitize_hex_color( get_theme_mod( 'us_secondaryaccentcolor', $colors[1] ) );
	?>
	<style>
		a {
			color: <?php echo $secondary; ?>;
		}
		.header {
			background-color: <?php echo $primary; ?>;
		}
		.header .header-content a {
			color: <?php echo $title; ?>;
		}
		.open-menu, .close-menu {
			color: <?php echo $secondary_accent; ?>;
			background-color: <?php echo $primary; ?>;
		}

		.comments-title, 
		#comments h3,
		.search-container i:hover {
			color: <?php echo $secondary; ?>;
		}

		.nav-previous a, 
		.nav-next a {
			color: <?php echo $title; ?>;
			background-color: <?php echo $primary; ?>;
		}

		.archive-title {
			color: <?php echo $primary; ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'us_output_custom_colors' );