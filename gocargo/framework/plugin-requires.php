<?php
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'gocargo_register_required_plugins' );
function gocargo_register_required_plugins() {
	$plugins = array(
		// This is an example of how to include a plugin from the WordPress Plugin Repository.		
		array(
            'name'               => 'Meta Box',
            'slug'               => 'meta-box',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
		array(
            'name'      => 'Redux Framework',
            'slug'      => 'redux-framework',
            'required'           => true,
			'force_activation'   => false,
            'force_deactivation' => false,
        ),	
        array(
            'name'      => 'Custom Sidebars',
            'slug'      => 'custom-sidebars',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
		array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),
		array(            
			'name'               => 'WPBakery Visual Composer', // The plugin name.
            'slug'               => 'js_composer', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/js_composer.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '5.5.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),         
        array(            
            'name'               => 'Slider Revolution', // The plugin name.
            'slug'               => 'revslider', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/revslider.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '5.4.8', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),  
        array(            
            'name'               => 'OT Twitter Feeds', // The plugin name.
            'slug'               => 'oceanthemes-twitter-feed', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/oceanthemes-twitter-feed.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),     
        array(
            'name'               => 'OT Visual Composer', // The plugin name.
            'slug'               => 'ot_composer', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/gocargo/ot_composer.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '1.4.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),    
        array(            
            'name'               => 'OT Career', // The plugin name.
            'slug'               => 'ot_career', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/gocargo/ot_career.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ), 
        array(            
            'name'               => 'OT Founder & Directory', // The plugin name.
            'slug'               => 'ot_founder', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/gocargo/ot_founder.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ), 
        array(            
            'name'               => 'OT History', // The plugin name.
            'slug'               => 'ot_history', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/gocargo/ot_history.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ), 
		array(            
			'name'               => 'OT Services', // The plugin name.
            'slug'               => 'ot_service', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/gocargo/ot_service.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ), 
		array(            
			'name'               => 'OT Testimonials', // The plugin name.
            'slug'               => 'ot_testimonial', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/gocargo/ot_testimonial.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ), 
		array(            
			'name'               => 'OT gocargo-shipment', // The plugin name.
            'slug'               => 'gocargo-shipment', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/gocargo/gocargo-shipment.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),
		array(            
			'name'               => 'Meta Box Group', // The plugin name.
            'slug'               => 'meta-box-group', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/gocargo/meta-box-group.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),
		array(            
			'name'               => 'Meta Box Tabs', // The plugin name.
            'slug'               => 'meta-box-tabs', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/gocargo/meta-box-tabs.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        ),
		array(            
			'name'               => 'OT One Click Import Demo', // The plugin name.
            'slug'               => 'ot-themes-one-click-import', // The plugin slug (typically the folder name).
            'source'             => 'http://oceanthemes.net/plugins-required/gocargo/ot-themes-one-click-import.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '1.4.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),         
	);
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
