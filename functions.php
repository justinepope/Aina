<?php

if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

function aina_setup() {
		
		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
	
		// Register Custom Navigation Walker 
		require_once('wp_bootstrap_navwalker.php');
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'aina' ),
		) );
	}
    $args = array(
		'width'         => 1600,
		'height'        => 700,
		'default-image' => get_template_directory_uri() . '/images/header.jpg',
		'uploads'       => true,
    );
    add_theme_support( 'custom-header', $args );
	
	add_action('after_setup_theme','aina_setup');

function aina_scripts() {

    /* Stylesheets */
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Passion+One:700,400|Cherry+Cream+Soda|Pacifico');
	
    /* Scripts */
    wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
    if ( is_singular() ) wp_enqueue_script('comment-reply');
}
    add_action('wp_enqueue_scripts','aina_scripts');

// Register Custom Post Type - Products
    add_action( 'init', 'create_post_type' );
    add_post_type_support( 'aina_product', 'thumbnail' );
    function create_post_type() {
      register_post_type( 'aina_product',
          array(
             'labels' => array(
             'name' => __( 'Products' ),
             'singular_name' => __( 'Product' )
            ),
          'public' => true,
          'has_archive' => true,
        )
      );
    }

// Dashboard Enqueue Scripts

function load_custom_wp_admin_style() {
    wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );
}

// Dashboard Footer Customization

function snazzy_footer_admin () {

echo 'Theme by <a href="http://www.justinepope.com" target="_blank">Justine Pope Web Design</a>';
}
add_filter('admin_footer_text', 'aina_footer_admin');

add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

// Modifies Comment Form Default Input Fields
    add_filter( 'comment_form_default_fields', 'bootstrap3_comment_form_fields' );
      function bootstrap3_comment_form_fields( $fields ) {
    $commenter = wp_get_current_commenter();

    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

    $fields   =  array(
        'author' => '<div class="form-group comment-form-author">' . '<label class="sr-only" for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
    '<input class="form-control" id="author" name="author" type="text" placeholder="Name *" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
        'email'  => '<div class="form-group comment-form-email"><label class="sr-only" for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
    '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' placeholder="Email *"' . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
        'url'    => '<div class="form-group comment-form-url"><label class="sr-only" for="url">' . __( 'Website' ) . '</label> ' .
    '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' placeholder="Website"' . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>' 
    );

    return $fields;
    }

    // Modifies Comment Form Textarea Field
    add_filter( 'comment_form_defaults', 'bootstrap3_comment_form' );
    function bootstrap3_comment_form( $args ) {
        $args['comment_field'] = '<div class="form-group comment-form-comment">
                    <label class="sr-only" for="comment">' . _x( 'Comment', 'noun' ) . '</label> 
                    <textarea class="form-control" id="comment" name="comment" cols="45" placeholder="Comment" rows="8" aria-required="true"></textarea>
                    </div>';
        $args['class_submit'] = 'btn btn-default'; // since WP 4.1

        return $args;
    } 

// Register Sidebars
function custom_sidebars() {

	$args = array(
		'id'            => 'rightbar',
		'name'          => __( 'aina_sidebars', 'text_domain' ),
		'description'   => __( 'Archive right sidebar', 'text_domain' ),
        'before_widget' => '<div id="%1$s" class="sidebar-module %2$s">' ,
        'after_widget'  => '</div>' ,
        'before_title'  => '<h4>' ,
        'after_title'   => '</h4>' ,
	);
	register_sidebar( $args );
    
    
	$args = array(
		'id'            => 'bottombar',
		'name'          => __( 'aina_bottombar', 'text_domain' ),
		'description'   => __( 'Page bottom sidebar', 'text_domain' ),
        'before_widget' => '<div id="%1$s" class="sidebar-module %2$s">' ,
        'after_widget'  => '</div>' ,
        'before_title'  => '<h4>' ,
        'after_title'   => '</h4>' ,
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'custom_sidebars' );

// Theme Customizer Example Code

function aina_customizer_register( $wp_customize ) {
// Panel -- Example Panel
     $wp_customize->add_panel( 'panel_id', array(
          'priority' => 100,
          'capability' => 'edit_theme_options',
          'theme_supports' => '',
          'title' => __( 'Example Panel', 'aina' ),
          'description' => __( 'Description of what this panel does.', 'aina' ),
      ) );
      
// Section -- Example Section
     $wp_customize->add_section( 'section_id', array(
          'priority' => 10,
          'capability' => 'edit_theme_options',
          'theme_supports' => '',
          'title' => __( 'Example Section', 'aina' ),
          'description' => '',
          'panel' => 'panel_id',
      ) );
      
// Control/Setting to Input a URL Address -- Settings use esc_url to sanitize data to prevent malicious code getting into the database
     $wp_customize->add_setting( 'url_field_id', array(
          'default' => '',
          'type' => 'theme_mod',
          'capability' => 'edit_theme_options',
          'transport' => '',
          'sanitize_callback' => 'esc_url',
      ) );

      $wp_customize->add_control( 'url_field_id', array(
          'type' => 'url',
          'priority' => 10,
          'section' => 'section_id',
          'label' => __( 'URL Field', 'aina' ),
          'description' => '',
      ) );
      
// Control/Setting to Input an Email Address -- this sanitize is specific to email address types
     $wp_customize->add_setting( 'email_field_id', array(
          'default' => '',
          'type' => 'theme_mod',
          'capability' => 'edit_theme_options',
          'transport' => '',
          'sanitize_callback' => 'sanitize_email',
      ) );
      
      $wp_customize->add_control( 'email_field_id', array(
          'type' => 'email',
          'priority' => 10,
          'section' => 'section_id',
          'label' => __( 'Email Field', 'aina' ),
          'description' => '',
      ) );
      
// Control/Settings to Use Textarea Field
     $wp_customize->add_setting( 'textarea_field_id', array(
          'default' => '',
          'type' => 'theme_mod',
          'capability' => 'edit_theme_options',
          'transport' => '',
          'sanitize_callback' => 'esc_textarea',
      ) );
      
      $wp_customize->add_control( 'textarea_field_id', array(
          'type' => 'textarea',
          'priority' => 10,
          'section' => 'section_id',
          'label' => __( 'Textarea Field', 'aina' ),
          'description' => '',
      ) );
      
// Control/Settings for a Range (slider) field
     $wp_customize->add_setting( 'range_field_id', array(
          'default' => '',
          'type' => 'theme_mod',
          'capability' => 'edit_theme_options',
          'transport' => '',
          'sanitize_callback' => 'intval',
      ) );
      
      $wp_customize->add_control( 'range_field_id', array(
          'type' => 'range',
          'priority' => 10,
          'section' => 'section_id',
          'label' => __( 'Range Field', 'aina' ),
          'description' => '',
          'input_attrs' => array(
          'min' => 0,
          'max' => 100,
          'step' => 1,
          'class' => 'example-class',
          'style' => 'color: #0a0',
          ),
      ) );
    
        $wp_customize->get_control( 'display_header_text' )->label = __('Display Site Title', 'aina');
    
        $wp_customize->remove_control( 'blogdescription' );
    
        $wp_customize->get_control( 'site_icon' )->label = __( 'Site Icon aka favicon', 'aina' );
    
        // Header Background Color Setting
        $wp_customize->add_setting( 'header_bg_color', array(
                'default' => '#e45d40'
        ) );

        // Header Background Color Control -- This is a color picker control
        $wp_customize->add_control( 
		new WP_Customize_Color_Control( $wp_customize, 'header_bg_color', 
			array(
		  		'label' => __('Header Background Color', 'aina'),
				'section' => 'colors',
				'settings' => 'header_bg_color',
			)
        ) );
    
        // Header Background Color Setting
        $wp_customize->get_setting( 'header_textcolor' )->default = '#1698b2';
    
        // Home Page Area Colors

        $wp_customize->add_setting('home_area_colors', array(
                'default'=> 'value1',
        ));

        $wp_customize->add_control( 'home_area_colors', 
          array(
            'label'		 => __('Home Section Colors', 'aina' ),
            'section'    => 'colors',
            'settings'   => 'home_area_colors',
            'type'       => 'radio',
            'choices'    => array(
                'value1' => __( 'Standard', 'aina' ),
                'value2' => __( 'Reverse', 'aina' ),
                ),
             )
        );
    
        // Theme Customizer -- Logo Uploader
        $wp_customize->add_section( 'aina_logo_section' , array(
          'title'       => __( 'Logo Upload', 'aina' ),
          'priority'    => 10,
          'description' => 'Upload a logo to replace the default site title in the header. The maximum image height is 100px.',
          ) );
        $wp_customize->add_setting( 'aina_logo' );
        $wp_customize->add_control( 
          new WP_Customize_Image_Control( $wp_customize, 'aina_logo', array(
            'label'    => __( 'Logo Uploader', 'aina' ),
            'section'  => 'aina_logo_section',
            'settings' => 'aina_logo',
          ) ) );
    
        // Theme Customizer -- Custom CSS Field
        $wp_customize->add_section( 'aina_css_style', array(
                    'title'       => __( 'Custom CSS Style', 'aina' ),
                    'description' => __( 'You can paste or type your own CSS in here. Use only CSS code in this field.', 'aina' ),
                    'priority'    => 10
            )
          );
         $wp_customize->add_setting( 'custom_css', array(
                    'default'              => '',
                    'capability'           => 'edit_theme_options',
                    'sanitize_callback'    => 'wp_filter_nohtml_kses',
                    'sanitize_js_callback' => 'wp_filter_nohtml_kses'
            )
          );
         $wp_customize->add_control( 'aina_example_css_control', array(
                    'label'    => __( 'Enter your CSS here:', 'aina' ),
                    'section'  => 'aina_css_style',
                        'settings' => 'custom_css',
                    'type'     => 'textarea'
            )
          );
    
        // Theme Customizer - Home Page Text
        $wp_customize->add_section( 'custom_home_section', array(
                'title'           => __( 'Home Page Updates', 'aina' ),
                'description'     => __( 'Add titles to each section of the Home Page.', 'aina' ),
                'priority'        => 10,
                'active_callback' => 'is_front_page',
        ) );

        // Control/Setting for First Section Title
        $wp_customize->add_setting( 'welcome_title', array(
                'default'           => __( 'Welcome to Our Business', 'aina' ),
                'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'welcome_title', array(
                'priority'    => 10,
                'section'     => 'custom_home_section',
                'label'       => __( 'Input a title for the First Section', 'aina' ),
                'description' => __( 'Change content', 'aina' )
        ) );

        // Control/Setting for Second Section Title
        $wp_customize->add_setting( 'about_title', array(
                'default'           => __( 'About', 'aina' ),
                'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'about_title', array(
                'priority'    => 10,
                'section'     => 'custom_home_section',
                'label'       => __( 'Input a title for the Second Section', 'aina' ),
                'description' => __( 'Change content', 'aina' ),
        ) );

        // Control/Setting for Third Section Title
        $wp_customize->add_setting( 'lodging_title', array(
                'default'           => __( 'Lodging', 'aina' ),
                'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'lodging_title', array(
                'priority'    => 10,
                'section'     => 'custom_home_section',
                'label'       => __( 'Input a title for the Third Section', 'aina' ),
                'description' => __( 'Change content', 'aina' ),
        ) );

        // Control/Setting for Third Section Call to Action Button
        $wp_customize->add_setting( 'about_content', array(
                'default'           => __('No alien land in all the world has any deep, strong charm for me but that one; no other land could so longingly and beseechingly haunt me sleeping and waking, through half a lifetime, as that one has done. Other things leave me, but it abides; other things change but it remains the same. For me its balmy airs are always blowing, its summer seas flashing in the sun...', 'aina'),
                'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'about_content', array(
                'priority'    => 10,
                'section'     => 'custom_home_section',
                'label'       => __( 'Input content', 'aina' ),
                'description' => __( 'Change second section content', 'aina' ),
        ) );
   
    // Control/Setting for Third Section Call to Action Button
        $wp_customize->add_setting( 'lodging_content', array(
                'default'           => __('<div class="col-xs-offset-2 col-xs-2"><p>Hale Huts</p></div>
			</div><!-- /.row -->
			<div class="row">
				<div class="col-xs-offset-2 col-xs-2"><p>Hammocks</p></div>
				<div class="col-xs-offset-4 col-xs-3 lodging-text"><p>Starting at $65/night</p></div>', 'aina'),
                'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'lodging_content', array(
                'priority'    => 10,
                'section'     => 'custom_home_section',
                'label'       => __( 'Input content', 'aina' ),
                'description' => __( 'Change third section content', 'aina' ),
        ) );
    
      // Control/Setting for Third Section Call to Action Button
        $wp_customize->add_setting( 'footer_content', array(
                'default'           => __('<p itemprop="name">Aina Theme</p>
				  <address itemprop="address">1234 Paradise Drive<br>Kona, HI 96745</address>
				  <p itemprop="telephone"><a href="tel:+11234567890">(808) 555-5555</a></p>
				</div> <!-- /itemscope -->
					<a class="btn btn-default" href="#" target="_blank"><i class="fa fa-facebook fa-lg"></i></a>
					<a class="btn btn-default" href="#" target="_blank"><i class="fa fa-twitter fa-lg"></i></a>
					<a class="btn btn-default" href="#" target="_blank"><i class="fa fa-google-plus fa-lg"></i></a>
					<a class="btn btn-default" href="#" target="_blank"><i class="fa fa-youtube fa-lg"></i></a>', 'aina'),
                'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'footer_content', array(
                'priority'    => 10,
                'section'     => 'custom_home_section',
                'label'       => __( 'Input content', 'aina' ),
                'description' => __( 'Change footer content', 'aina' ),
        ) );

    
        
        // Theme Customizer -- Background Image CSS

        $wp_customize->add_section(
            'aina_lodging_area',
            array(
                    'title'       => __( 'Lodging Area', 'aina' ),
                    'priority'    => 10,
                    'capability'  => 'edit_theme_options',
                    'description' => __( 'Change the background image in the lodging Area of the Home Page', 'aina' ),
            )
        );

        $wp_customize->add_setting(
            'aina_background_image',
            array(
                    'default'      => get_template_directory_uri() . '/img/pond.png',
                    'transport'    => 'refresh'
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'aina_background_image',
                array(
                        'label'       => __( 'Background Image', 'aina' ),
                        'settings'    => 'aina_background_image',
                        'section'     => 'aina_lodging_area',
                        'description' => __( 'Recommended image size is approximately 1200x800 pixels', 'aina' ),
                )
            )
        );
    
        // Theme Customizer -- Background Image CSS Opacity Slider

        $wp_customize->add_setting('aina_image_opacity');

        $wp_customize->add_control( 'aina_image_opacity',
                array(
                    'type' => 'range',
                    'priority' => 20,
                    'section' => 'aina_lodging_area',
                    'label' => __( 'Set Background Image Opacity', 'aina' ),
                    'description' => '<span style="float: left; margin-top: 10px;">' . __( '&larr; Less', 'aina' ) . '</span><span style="float: right; margin-top: 10px;">' . __( 'More &rarr;', 'aina' ) . '</span>',
                    'input_attrs' => array(
                        'min' => .1,
                        'max' => 1,
                        'step' => .1,
                        'class' => 'image-opacity',
                        'style' => 'width: 60%; padding-top: 0; margin: 8px 0 0 10px;',
                    ),
                )
        );
    
}
add_action( 'customize_register', 'aina_customizer_register' );

// Add CSS from Theme Customizer to wp_head

    function aina_customizer_css() {
    ?>
    <style>

/*=== Style from The Customizer Colors Section - Header Background Color ===*/
    .navbar {
            background-color: <?php echo get_theme_mod( 'header_bg_color' ); ?>;
    }
    
    .navbar-default .navbar-brand { color: #<?php header_textcolor(); ?>; 
    }
        
    /*=== Style from The Customizer Custom CSS Style section ===*/
    <?php echo get_theme_mod( 'custom_css', 'aina_image_opacity' ); ?>
     
    /* Style from The Customizer Shopping section */
    <?php if ( 0 < count( strlen( ( $background_image_url = get_theme_mod( 'aina_background_image' ) ) ) ) ) { ?>
    #lodging { background-image: url( <?php echo $background_image_url; ?> ); }
    <?php } // end if ?>

    </style>
    <?php
}
add_action( 'wp_head', 'aina_customizer_css' );


