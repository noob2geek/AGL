<?php
/**
 * Redux Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package GoCargo
 */

if ( ! class_exists( 'ReduxFramewrk' ) ) {
    require_once( get_template_directory() . '/framework/sample-config.php' );
	function removeDemoModeLink() { // Be sure to rename this function to something more unique
		if ( class_exists('ReduxFrameworkPlugin') ) {
			remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
		}
		if ( class_exists('ReduxFrameworkPlugin') ) {
			remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
		}
	}
	add_action('init', 'removeDemoModeLink');
}

if ( ! function_exists( 'gocargo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gocargo_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Redux Theme, use a find and replace
	 * to change 'gocargo' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'gocargo', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' ); 

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'gocargo' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'audio',
		'image',
		'video',
		'quote',
		'gallery',
	) );
	add_image_size( 'career-thumb', 70, 82, array( 'left', 'top' ) );
	
}
endif; // gocargo_setup
add_action( 'after_setup_theme', 'gocargo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gocargo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gocargo_content_width', 640 );
}
add_action( 'after_setup_theme', 'gocargo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gocargo_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gocargo' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'gocargo' ),  
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer One Widget Area', 'gocargo' ),
		'id'            => 'footer-area-1',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'gocargo' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3><div class="tiny-border"></div>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two Widget Area', 'gocargo' ),
		'id'            => 'footer-area-2',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'gocargo' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3><div class="tiny-border"></div>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three Widget Area', 'gocargo' ),
		'id'            => 'footer-area-3',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'gocargo' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3><div class="tiny-border"></div>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Fourth Widget Area', 'gocargo' ),
		'id'            => 'footer-area-4',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'gocargo' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3><div class="tiny-border"></div>',
	) ); 

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Five Widget Area', 'gocargo' ),
		'id'            => 'footer-area-5',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'gocargo' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3><div class="tiny-border"></div>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Six Widget Area', 'gocargo' ),
		'id'            => 'footer-area-6',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'gocargo' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3><div class="tiny-border"></div>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Seven Widget Area', 'gocargo' ),
		'id'            => 'footer-area-7',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'gocargo' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3><div class="tiny-border"></div>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Eight Widget Area', 'gocargo' ),
		'id'            => 'footer-area-8',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'gocargo' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3><div class="tiny-border"></div>',
	) ); 
}
add_action( 'widgets_init', 'gocargo_widgets_init' );

/**
 * Enqueue Google fonts.
 */
function gocargo_fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'gocargo' );
 
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $lato = _x( 'on', 'Lato font: on or off', 'gocargo' );
 
    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $montserrat = _x( 'on', 'Montserrat font: on or off', 'gocargo' );

    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $roboto_slab = _x( 'on', 'Roboto+Slab font: on or off', 'gocargo' );

    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $merriweather = _x( 'on', 'Merriweather font: on or off', 'gocargo' );    
 
    if ( 'off' !== $lato || 'off' !== $montserrat || 'off' !== $roboto_slab || 'off' !== $merriweather || 'off' !== $open_sans ) {
        $font_families = array();

        if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:400,300,300italic,400italic,700,700italic,900,900italic';
        }        
 
        if ( 'off' !== $lato ) {
            $font_families[] = 'Lato:400,300,300italic,400italic,700,700italic,900,900italic';
        }
 
        if ( 'off' !== $montserrat ) {
            $font_families[] = 'Montserrat:400,700';
        }

        if ( 'off' !== $roboto_slab ) {
            $font_families[] = 'Roboto+Slab:400,300,700';
        }   

        if ( 'off' !== $merriweather ) {
            $font_families[] = 'Merriweather:400,400italic,700,700italic';
        }        
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}


/**
 * Enqueue scripts and styles.
 */
function gocargo_scripts() {
	global $gocargo_option;
	$protocol = is_ssl() ? 'https' : 'http';
	$gmapaipkey = $gocargo_option['gmap_apikey'];

	// Add custom fonts, used in the main stylesheet.
    wp_enqueue_style( 'gocargo-fonts', gocargo_fonts_url(), array(), null );

    /** All frontend css files **/ 
    wp_enqueue_style( 'gocargo-bootstrap', get_template_directory_uri().'/css/bootstrap.css');
    wp_enqueue_style( 'gocargo-font-awesome', get_template_directory_uri().'/fonts/font-awesome/css/font-awesome.css');
    wp_enqueue_style( 'gocargo-et-line-font', get_template_directory_uri().'/fonts/et-line-font/style.css');
	wp_enqueue_style( 'gocargo-owl-carousel', get_template_directory_uri().'/css/owl.carousel.css');
    wp_enqueue_style( 'gocargo-owl-theme', get_template_directory_uri().'/css/owl.theme.css'); 
    wp_enqueue_style( 'gocargo-owl-transitions', get_template_directory_uri().'/css/owl.transitions.css'); 
	wp_enqueue_style( 'gocargo-animate', get_template_directory_uri().'/css/animate.css');
	wp_enqueue_style( 'gocargo-let-it-snow', get_template_directory_uri().'/css/let-it-snow.css');
	wp_enqueue_style( 'gocargo-magnific-css', get_template_directory_uri().'/css/magnific-popup.css');       	
	wp_enqueue_style( 'gocargo-style', get_stylesheet_uri() );
	wp_enqueue_style( 'gocargo-rev-settings', get_template_directory_uri().'/css/rev-settings.css');

	if(isset($gocargo_option['theme_style']) and $gocargo_option['theme_style'] == 'preview2') {
		wp_enqueue_style( 'gocargo-preview-2', get_template_directory_uri().'/css/preview2.css');
	}elseif (isset($gocargo_option['theme_style']) and $gocargo_option['theme_style'] == 'preview3') {
		wp_enqueue_style( 'gocargo-preview-3', get_template_directory_uri().'/css/preview3.css');
	}			

	if($gocargo_option['preload-switch']!=false and isset($gocargo_option['preloader_mode']) and $gocargo_option['preloader_mode']=="preloader_logo"){ 
        wp_enqueue_style( 'gocargo-jpreloader', get_template_directory_uri().'/css/royal-preloader.css');
    } 	

	/** All frontend javascript files **/ 
	if($gocargo_option['preload-switch']!=false and isset($gocargo_option['preloader_mode']) and $gocargo_option['preloader_mode']=="preloader_logo"){
		wp_enqueue_script("gocargo-preLoader", get_template_directory_uri()."/js/royal_preloader.min.js",array(), '20180829',false);
	}
	wp_enqueue_script( 'gocargo-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20151228', true );
	wp_enqueue_script( 'gocargo-isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array(), '20151228', true );
	wp_enqueue_script( 'gocargo-easing', get_template_directory_uri() . '/js/easing.js', array(), '20151228', true );	
	wp_enqueue_script( 'gocargo-ender', get_template_directory_uri() . '/js/ender.js', array(), '20151228', true );
	wp_enqueue_script( 'gocargo-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array(), '20151228', false );
	if ($gmapaipkey != '') {
		wp_enqueue_script( "gocargo-mapapi", "$protocol://maps.googleapis.com/maps/api/js?key=$gmapaipkey", array(), '20151228', false );
	}	
	wp_enqueue_script( 'gocargo-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array(), '20151228', true );
	if($gocargo_option['animate-switch']!=false){
		wp_enqueue_script( 'gocargo-wow', get_template_directory_uri() . '/js/wow.min.js', array(), '20151228', true );
	}
	wp_enqueue_script( 'gocargo-magnific', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), '20151228', true );
	wp_enqueue_script( 'gocargo-stellar', get_template_directory_uri() . '/js/jquery.stellar.js', array(), '20151228', true );
	wp_enqueue_script( 'gocargo-typed', get_template_directory_uri() . '/js/typed.js', array(), '20151228', true );
	wp_enqueue_script( 'gocargo-scrollto', get_template_directory_uri() . '/js/jquery.scrollto.js', array(), '20151228', true );
	wp_enqueue_script( 'gocargo-classie', get_template_directory_uri() . '/js/classie.js', array(), '20151228', true );
	wp_enqueue_script( 'gocargo-cbpAnimatedHeader', get_template_directory_uri() . '/js/cbpAnimatedHeader.min.js', array(), '20151228', true );
	wp_enqueue_script( 'gocargo-PageScroll2id', get_template_directory_uri() . '/js/jquery.malihu.PageScroll2id.js', array(), '20170424', true );
	wp_enqueue_script( 'gocargo-let-it-snow', get_template_directory_uri() . '/js/let-it-snow.min.js', array(), '20151228', true );
	wp_enqueue_script( 'gocargo-cutomize', get_template_directory_uri() . '/js/exotheme.js', array(), '20151228', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gocargo_scripts' );

if(!function_exists('gocargo_custom_frontend_scripts')){
    function gocargo_custom_frontend_scripts(){
        global $gocargo_option; 
    ?>
        <script type="text/javascript">
            window.jQuery = window.$ = jQuery;  
            (function($) { "use strict";                

                <?php if(isset($gocargo_option['preloader_mode']) and $gocargo_option['preloader_mode']=="preloader_logo" and $gocargo_option['preload-switch']==true ){ ?>
                    //Preloader Logo
                    Royal_Preloader.config({
                        mode           : 'logo',
                        logo           : '<?php echo esc_js($gocargo_option['logo_preload']['url']); ?>',
                        logo_size      : [<?php echo esc_js($gocargo_option['prelogo_width']); ?>, <?php echo esc_js($gocargo_option['prelogo_height']); ?>],
                        showProgress   : true,
                        showPercentage : true,
                        text_colour: '<?php echo esc_js($gocargo_option['preload-text-color']); ?>',
                        background:  '<?php echo esc_js($gocargo_option['preload-background-color']); ?>'
                    });
                <?php } ?>

            })(jQuery);
        </script>
    <?php        
    }
}
add_action('wp_footer', 'gocargo_custom_frontend_scripts');

//Code Visual Composer.
// Add new Param in Row
if(function_exists('vc_add_param')){
	vc_add_param(
		'vc_row',
		array(
			"type" => "dropdown",
			"heading" => esc_html__('Setup Full width For Row', 'gocargo'),
			"param_name" => "fullwidth",
			"value" => array(   
			                esc_html__('No', 'gocargo') => 'no',  
			                esc_html__('Yes', 'gocargo') => 'yes',                                                                                
			              ),
			"description" => esc_html__("Select Full width for row : yes or not, Default: No fullwidth", "gocargo"),      
        )
    );
    vc_add_param(
		'vc_row',
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Full height row?', 'gocargo' ),
			'param_name' => 'fullheight',
			'description' => esc_html__( 'If checked row will be set to full height.', 'gocargo' ),
			'value' => array( esc_html__( 'Yes', 'gocargo' ) => 'yes' ),
		)
    ); 
    vc_add_param(
		'vc_row',
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Parallax background for row?', 'gocargo' ),
			'param_name' => 'bg_parallax_section',
			'description' => esc_html__( 'Add parallax type background for row (Note: If no image is specified, parallax will use background image from Design Options).', 'gocargo' ),
			'value' => array( esc_html__( 'Yes', 'gocargo' ) => 'yes' ),
		)
    );
    vc_add_param(
		'vc_row',
    	array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Image', 'gocargo' ),
			'param_name' => 'parallax_image_section',
			'value' => '',
			'description' => esc_html__( 'Select image from media library.', 'gocargo' ),
			'dependency' => array(
				'element' => 'bg_parallax_section',
				'not_empty' => true,
			),
		)
    );
    vc_add_param(
    	'vc_row',
    	array(
		  "type" => "textfield",
		  "heading" => esc_html__('Parallax speed', 'gocargo'),
		  "param_name" => "parallax_speed_section",
		  "value" => ".3",
		  "description" => esc_html__("Enter parallax speed ratio (Note: Default value is .5, min value is .5)", "gocargo"), 
		  'dependency' => array(
				'element' => 'bg_parallax_section',
				'not_empty' => true,
			),
		) 
    );    
	vc_add_param(
		'vc_row',
		array(
			'type' => 'checkbox',
			'heading' => esc_html__( 'Put a pictures on the half Row?', 'gocargo' ),
			'param_name' => 'img_halfrow',
			'description' => esc_html__( 'If checked, then start setup image on half row.', 'gocargo' ),
			'value' => array( esc_html__( 'Yes', 'gocargo' ) => 'yes' ),
		)
    );
    vc_add_param(
		'vc_row',
    	array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Image', 'gocargo' ),
			'param_name' => 'halfrow_image',
			'value' => '',
			'description' => esc_html__( 'Select image from media library.', 'gocargo' ),
			'dependency' => array(
				'element' => 'img_halfrow',
				'not_empty' => true,
			),
		)
    );
    vc_add_param(
		'vc_row',
    	array(
			"type" => "colorpicker",
			"heading" => esc_html__("Background color", 'gocargo' ),
			"param_name" => "bgcolor",
			"value" => "",
			"description" => esc_html__("Add background color.", 'gocargo' ),
			'dependency' => array(
				'element' => 'img_halfrow',
				'not_empty' => true,
			),
      	)
    );
	vc_add_param(
		'vc_row',
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Columns image', 'gocargo' ),
			'param_name' => 'img_columns',
			'value' => array(
				esc_html__( 'Default', 'gocargo' ) => '',
				esc_html__( 'Image on 4 Columns', 'gocargo' ) => '4columns',
				esc_html__( 'Image on 5 Columns', 'gocargo' ) => '5columns',
				esc_html__( 'Image on 6 Columns', 'gocargo' ) => '6columns',
				esc_html__( 'Image on 7 Columns', 'gocargo' ) => '7columns',
			),
			'description' => esc_html__( 'Select columns position within row.', 'gocargo' ),
			'dependency' => array(
				'element' => 'img_halfrow',
				'not_empty' => true,
			),
		)
    );
    vc_add_param(
		'vc_row',
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Image position', 'gocargo' ),
			'param_name' => 'img_position',
			'value' => array(
				esc_html__( 'Default', 'gocargo' ) => '',
				esc_html__( 'Image on Left Row', 'gocargo' ) => 'imgleft',
				esc_html__( 'Image on Right Row', 'gocargo' ) => 'imgright',				
			),
			'description' => esc_html__( 'Select Image position within row.', 'gocargo' ),
			'dependency' => array(
				'element' => 'img_halfrow',
				'not_empty' => true,
			),
		)
    );      

	// Add new Param in Column	
	vc_add_param('vc_column',array(
		  "type" => "dropdown",
		  "heading" => esc_html__('Animate Column', 'gocargo'),
		  "param_name" => "animate",
		  "value" => array(   
							esc_html__('None', 'gocargo') => 'none', 
							esc_html__('Fade In Up', 'gocargo') => 'fadeinup',
							esc_html__('Fade In Down', 'gocargo') => 'fadeindown', 
							esc_html__('Fade In', 'gocargo') => 'fadein', 
							esc_html__('Fade In Left', 'gocargo') => 'fadeinleft',  
							esc_html__('Fade In Right', 'gocargo') => 'fadinright',
						  ),
		  "description" => esc_html__("Select Animate , Default: None", "gocargo"),      
		) 
    );
	vc_add_param('vc_column',array(
		  "type" => "textfield",
		  "heading" => esc_html__('Animate delay number.', 'gocargo'),
		  "param_name" => "delay",
		  "value" => "",
		  "description" => esc_html__("Example : 0.2, 0.6, 1, etc", "gocargo"), 
		  "dependency"  => array( 'element' => 'animate', 'value' => array( 'fadeinup', 'fadeindown', 'fadein', 'fadeinleft', 'fadinright' ) ),     
		) 
    );
    vc_add_param('vc_column',array(
		  "type" => "textfield",
		  "heading" => esc_html__('Animate duration number.', 'gocargo'),
		  "param_name" => "duration",
		  "value" => "",
		  "description" => esc_html__("Example : 0.2, 0.6, 1, etc", "gocargo"),   
		  "dependency"  => array( 'element' => 'animate', 'value' => array( 'fadeinup', 'fadeindown', 'fadein', 'fadeinleft', 'fadinright' ) ),   
		) 
    );
	vc_add_param('vc_column',array(
		  "type" => "textfield",
		  "heading" => esc_html__('Extra inner column class name', 'gocargo'),
		  "param_name" => "column_innerclass",
		  "value" => "",
		  "description" => esc_html__("Style particular content element differently - add a class name and refer to it in custom CSS.", "gocargo"),   		  
		) 
    );	  
}

if(function_exists('vc_remove_param')){
	vc_remove_param( "vc_row", "full_width" );
    vc_remove_param( "vc_row", "content_placement" ); 
    vc_remove_param( "vc_row", "equal_height" );
    vc_remove_param( "vc_row", "full_height" );
    vc_remove_param( "vc_row", "columns_placement" );
    vc_remove_param( "vc_row", "parallax" );
    vc_remove_param( "vc_row", "parallax_image" );
    vc_remove_param( "vc_row", "video_bg" );
    vc_remove_param( "vc_row", "video_bg_url" );
    vc_remove_param( "vc_row", "video_bg_parallax" );
    vc_remove_param( "vc_row", "parallax_speed_bg" );
    vc_remove_param( "vc_row", "parallax_speed_video" );
    vc_remove_param( "vc_row", "gap" );
    vc_remove_param( "vc_column", "css_animation" ); 
}	

/**
 * Require plugins install for this theme.
 *
 * @since GoCargo 1.0
 */
require_once get_template_directory() . '/framework/plugin-requires.php';
/**
 * Implement the Custom Meta Boxs.
 */
require get_template_directory() . '/framework/meta-boxes.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/framework/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/framework/widget/recent-post.php';
require get_template_directory() . '/framework/widget/contact-info.php';
require get_template_directory() . '/framework/widget/testimonials-widget.php';
/**
 * Customizer Menu.
 */
require get_template_directory() . '/framework/wp_bootstrap_navwalker.php';

/**
 * Customizer Theme Colors.
 */
require get_template_directory() . '/framework/color.php';




