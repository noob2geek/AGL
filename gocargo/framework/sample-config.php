<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "gocargo_option";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'gocargo_option',
        'use_cdn' => TRUE,
        'display_name'     => $theme->get('Name'),
        'display_version'  => $theme->get('Version'),
        'page_title' => 'GoCargo Options',
        'update_notice' => FALSE,
        'admin_bar' => TRUE,
        'menu_type' => 'menu',
        'menu_title' => 'Gocargo Options',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'customizer' => FALSE,
        'dev_mode'   => false,
        'default_mark' => '*',
        'hints' => array(
            'icon_position' => 'right',
            'icon_color' => 'lightgray',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
    );    

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'gocargo' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'gocargo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'gocargo' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'gocargo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( 'This is the sidebar content, HTML is allowed.', 'gocargo' );
    Redux::setHelpSidebar( $opt_name, $content );
    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */
    // ACTUAL DECLARATION OF SECTIONS          
    Redux::setSection( $opt_name, array(
        'icon' => ' el-icon-stackoverflow',
        'title' => esc_html__('Miscellaneous Settings', 'gocargo'),
        'fields' => array(            
            array(
                'id'       => 'animate-switch',
                'type'     => 'switch', 
                'title'    => esc_html__('Animation?', 'gocargo'),
                'subtitle' => esc_html__('If you do not want to use animated effects elements when scroll page down for both mobile and desktop, just turn it off.', 'gocargo'),
                'default'  => true,
            ),               
            array(
                'id' => 'gmap_apikey',
                'type' => 'text',
                'title' => __('Google Map API Key', 'gocargo'),
                'subtitle' => __('Add your google map api key.', 'gocargo'),
                'default' => 'AIzaSyAvpnlHRidMIU374bKM5-sx8ruc01OvDjI'
            ),                                                    
        )
    ) );

    Redux::setSection( $opt_name, array(
        'icon' => ' el-icon-repeat',
        'title' => esc_html__('Preload Settings', 'gocargo'),
        'fields' => array(            
            array(
                'id'       => 'preload-switch',
                'type'     => 'switch', 
                'title'    => esc_html__('Preload Off?', 'gocargo'),
                'subtitle' => esc_html__('If you do not want to use preload, you can turn it off.', 'gocargo'),
                'default'  => true,
            ),   
            array(
                'id' => 'preloader_mode',
                'type' => 'select',
                'title' => esc_html__('Preloader Style', 'gocargo'),
                'subtitle' => esc_html__('Preloader style: preload logo or preload loading', 'gocargo'),
                'desc' => esc_html__('You can choose one of two preload style, Default: Loading Style.', 'gocargo'),
                'options'  => array(
                    'preloader_loading' => 'Loading Style',                    
                    'preloader_logo' => 'Logo Style',                                                                 
                ),
                'default' => 'preloader_loading',
            ),             
            array(
                'id' => 'preload-text-color',
                'type' => 'color',
                'title' => esc_html__('Preload Text Color', 'gocargo'),
                'subtitle' => esc_html__('Pick the preload text color (default: #111111).', 'gocargo'),
                'default' => '#111111',                
            ), 
            array(
                'id' => 'preload-background-color',
                'type' => 'color',
                'title' => esc_html__('Preload Background Color', 'gocargo'),
                'subtitle' => esc_html__('Pick the preload background color (default: #ffffff).', 'gocargo'),
                'default' => '#ffffff',
                'output'    => array('background-color' => '#preloader')                
            ), 
            array(
                'id' => 'preload-typography',
                'type' => 'typography',
                'output' => array('#royal_preloader.royal_preloader_logo .royal_preloader_percentage, #jprePercentage'),
                'title' => esc_html__('Preloader percentage', 'gocargo'),
                'subtitle' => esc_html__('Number 100% running', 'gocargo'),
                'google' => true,
                'letter-spacing' => true, 
                'word-spacing' => true, 
                'text-transform' => true,            
                'units'       =>'px', 
                'default' => array(
                    'color'       => '', 
                    'font-style'  => '', 
                    'font-family' => '',
                    'font-size'   => '', 
                    'line-height' => ''
                ),
            ),  
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Loading Style', 'gocargo' ),
        'id'         => 'preload-loading-style',        
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'iconloading_preload',
                'type' => 'media',
                'url' => false,
                'title' => __('Icon Loading Preload', 'gocargo'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => __('Upload your icon Loading preload', 'gocargo'),
                'subtitle' => __('Recommended size: 32px & 32px', 'gocargo'),
                'default' => array('url' => get_template_directory_uri().'/images/loader.gif'),                
            ),         
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Logo Style', 'gocargo' ),
        'id'         => 'preload-logo-style',        
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'logo_preload',
                'type' => 'media',
                'url' => false,
                'title' => __('Logo Preload (Logo Style)', 'gocargo'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => __('Upload your logo preload', 'gocargo'),
                'subtitle' => __('Recommended size: 143px & 32px', 'gocargo'),
                'default' => array('url' => get_template_directory_uri().'/images/logo.png'),
            ),
            array(
                'id' => 'prelogo_width',
                'type' => 'text',
                'title' => __('Logo width (Logo Style)', 'gocargo'),
                'subtitle' => __('Input logo width, default: 143', 'gocargo'),
                'default' => '143'
            ),  
            array(
                'id' => 'prelogo_height',
                'type' => 'text',
                'title' => __('Logo height (Logo Style)', 'gocargo'),
                'subtitle' => __('Input logo height, default: 32', 'gocargo'),
                'default' => '32'
            ),          
        )
    ) );

    Redux::setSection( $opt_name, array(
        'icon' => ' el-icon-picture',
        'title' => esc_html__('Logo & Favicon Settings', 'gocargo'),
        'fields' => array(
            array(
                'id' => 'favicon',
                'type' => 'media',
                'url' => false,
                'title' => esc_html__('Favicon', 'gocargo'),
                'compiler' => 'true',
                'desc' => esc_html__('Upload favicon image', 'gocargo'),
                'subtitle' => esc_html__('Recommended Size: 32x32', 'gocargo'),
               'default' => array('url' => get_template_directory_uri().'/images/favicon.png'),                     
            ),
            array(
                'id' => 'logo',
                'type' => 'media',
                'url' => false,
                'title' => esc_html__('Logo Static', 'gocargo'),
                'compiler' => 'true',                
                'desc' => esc_html__('Upload logo image', 'gocargo'),
                'subtitle' => esc_html__('For first look on website and support image file with format png, jpg.', 'gocargo'),
               'default' => array('url' => get_template_directory_uri().'/images/logo.png'),                     
            ),  
            array(
                'id' => 'logo2',
                'type' => 'media',
                'url' => false,
                'title' => esc_html__('Logo Scroll', 'gocargo'),
                'compiler' => 'true',
                'desc' => esc_html__('Upload logo scroll image', 'gocargo'),
                'subtitle' => esc_html__('Logo when scroll down page and support image file with format png, jpg.', 'gocargo'),
               'default' => array('url' => get_template_directory_uri().'/images/logo-2.png'),                     
            ),                                             
        )
    ) );    
    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-qrcode',
        'title' => esc_html__('Header Settings', 'gocargo'),
        'fields' => array( 
            array(
                'id'       => 'header_layout_wrap',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Select images option for Header Layout', 'gocargo' ),
                'subtitle' => esc_html__( 'Use any header layout for all pages.', 'gocargo' ),
                'options'  => array(
                    'header1' => array(
                        'alt' => 'Header Layout 1',
                        'img' => get_template_directory_uri().'/images/theme-options/header-1.png'
                    ),
                    'header2' => array(
                        'alt' => 'Header Layout 2',
                        'img' => get_template_directory_uri().'/images/theme-options/header-2.png'
                    ),
                ),
                'default'  => 'header1'
            ),                           
            array(
                'id' => 'header-background-color',
                'type' => 'color',
                'title' => esc_html__('Header Static Background Color', 'gocargo'),
                'subtitle' => esc_html__('Pick the header static background color for the theme (default: rgba(0,0,0,0.5)).', 'gocargo'),
                'default' => 'rgba(0,0,0,0.5)',
                'validate' => 'color',
            ),                    
            array(
                'id' => 'header-small-background-color',
                'type' => 'color',
                'title' => esc_html__('Header Scroll Background Color', 'gocargo'),
                'subtitle' => esc_html__('Pick the header scroll background color for the theme (default: #ffffff).', 'gocargo'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),                             
            array(
                'id' => 'header-text-color',
                'type' => 'color',
                'title' => esc_html__('Header Static Text Color', 'gocargo'),
                'subtitle' => esc_html__('Pick the header text color for the theme (default: #fff).', 'gocargo'),
                'default' => '#fff',
                'validate' => 'color',
            ),  
            array(
                'id' => 'header-scroll-text-color',
                'type' => 'color',
                'title' => esc_html__('Header Scroll Text Color', 'gocargo'),
                'subtitle' => esc_html__('Pick the header text color for the theme (default: #fff).', 'gocargo'),
                'default' => '#fff',
                'validate' => 'color',
            ),                                            
        )
    ) );    
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header layout 1', 'gocargo' ),
        'id'         => 'setup-header1',
        'subsection' => true,
        'fields'     => array(   
            array(
                'id' => 'header_layout',
                'type' => 'select',
                'title' => esc_html__('Header option', 'gocargo'),
                'subtitle' => esc_html__('Default: show social box.', 'gocargo'),
                'desc' => esc_html__('You want show: social or search on header?', 'gocargo'),
                'options'  => array(                    
                    'normal' => 'Show social box',
                    'header2' => 'Show search box',  
                    'none' => 'Does not show anything?',                         
                ),
                'default' => 'normal',
            ), 
        ),        
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header layout 2', 'gocargo' ),
        'id'         => 'setup-header2',
        'subsection' => true,
        'fields'     => array(   
            array(
                'id'       => 'topbar-switch',
                'type'     => 'switch', 
                'title'    => esc_html__('Topbar on header Off?', 'gocargo'),
                'subtitle' => esc_html__('If you want to use the topbar on the header, just turn it on.', 'gocargo'),
                'default'  => true,
            ),    
            array(
                'id' => 'info_list_text',
                'type' => 'editor',
                'title' => __('Topbar info text.', 'gocargo'),
                'subtitle' => __('Add topbar info html text.', 'gocargo'),
                'default' => '',
            ),   
        ),        
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header Mobile', 'gocargo' ),
        'id'         => 'setup-header3',
        'subsection' => true,
        'fields'     => array( 
            array(
                'id' => 'header-mobile-menu-color',
                'type' => 'color',
                'title' => esc_html__('Header mobile menu color', 'gocargo'),
                'subtitle' => esc_html__('Pick the header mobile color for the theme (default: #555).', 'gocargo'),
                'default' => '#555',
                'validate' => 'color',
            ),  
            array(
                'id' => 'header-mobile-bgcolor',
                'type' => 'color',
                'title' => esc_html__('Header mobile background color', 'gocargo'),
                'subtitle' => esc_html__('Pick the header mobile background color for the theme (default: #fff).', 'gocargo'),
                'default' => '#fff',
                'validate' => 'color',
            ),  
            array(
                'id' => 'header-mobile-border-menu-color',
                'type' => 'color',
                'title' => esc_html__('Header mobile border menu item color', 'gocargo'),
                'subtitle' => esc_html__('Pick the header mobile border menu item color for the theme (default: #eee).', 'gocargo'),
                'default' => '#eee',
                'validate' => 'color',
            ),
        ),        
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header Homepage', 'gocargo' ),
        'id'         => 'header-homepage',
        'subsection' => true,
        'fields'     => array( 
            array(
                'id'       => 'headerhome-switch',
                'type'     => 'switch', 
                'title'    => esc_html__('Customize Header Homepage On?', 'gocargo'),
                'subtitle' => esc_html__('If you want to customize the header for just the home page, just turn it on', 'gocargo'),
                'default'  => false,
            ), 
            array(
                'id' => 'header-home-menu-color',
                'type' => 'color',
                'title' => esc_html__('Header static menu color', 'gocargo'),
                'subtitle' => esc_html__('Pick the header static color for the theme (default: #555).', 'gocargo'),
                'default' => '#555',
                'validate' => 'color',
            ),  
            array(
                'id' => 'header-home-bgcolor',
                'type' => 'color',
                'title' => esc_html__('Header static background color', 'gocargo'),
                'subtitle' => esc_html__('Pick the header static background color for the theme (default: #fff).', 'gocargo'),
                'default' => '#fff',
                'validate' => 'color',
            ), 
            array(
                'id' => 'headerscroll-home-menu-color',
                'type' => 'color',
                'title' => esc_html__('Header scroll menu color', 'gocargo'),
                'subtitle' => esc_html__('Pick the header scroll color for the theme (default: #555).', 'gocargo'),
                'default' => '#555',
                'validate' => 'color',
            ),  
            array(
                'id' => 'headerscroll-home-bgcolor',
                'type' => 'color',
                'title' => esc_html__('Header scroll background color', 'gocargo'),
                'subtitle' => esc_html__('Pick the header scroll background color for the theme (default: #fff).', 'gocargo'),
                'default' => '#fff',
                'validate' => 'color',
            ),   
        ),        
    ) );
    
    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-qrcode',
        'title' => esc_html__('Sub-Header Top Page', 'gocargo'),
        'fields' => array( 
            array(
                'id' => 'subheader_layout',
                'type' => 'select',
                'title' => esc_html__('Subheader Layout', 'gocargo'),
                'subtitle' => esc_html__('Subheader layout', 'gocargo'),
                'desc' => esc_html__('Subheader layout : select Subheader layout', 'gocargo'),
                'options'  => array(
                    'normal' => 'Subheader Normal',
                    'subheader2' => 'Subheader layout 2',                        
                ),
                'default' => 'normal',
            ),                
            array(
                'id'       => 'subheader-switch',
                'type'     => 'switch', 
                'title'    => esc_html__('Customize Subheader On?', 'gocargo'),
                'subtitle' => esc_html__('If you want to customize the subheader for all pages, just turn it on.', 'gocargo'),
                'default'  => false,
            ),                      
            array(
                'id' => 'subheader-background-color',
                'type' => 'color',
                'title' => esc_html__('SubHeader Background Color', 'gocargo'),
                'subtitle' => esc_html__('Pick the subheader background color for the theme, default: #f8f8f8 ', 'gocargo'),
                'default' => '#f8f8f8',
                'validate' => 'color',
            ),                                 
            array(
                'id' => 'subheader-text-color',
                'type' => 'color',
                'title' => esc_html__('SubHeader Text Color', 'gocargo'),
                'subtitle' => esc_html__('Pick the subheader text color for the theme (default: #222).', 'gocargo'),
                'default' => '#222',
                'validate' => 'color',
            ),                                             
        )
    ) );      

    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-font',
        'title' => esc_html__('Typography', 'gocargo'),
        'fields' => array(
            array(
                'id' => 'h1-typography',
                'type' => 'typography',
                'output' => array('h1'),
                'title' => esc_html__('Heading 1', 'gocargo'),
                'subtitle' => esc_html__('Specify the heading 1 font properties.', 'gocargo'),
                'google' => true,
                'font-backup' => true,
                'word-spacing' => true,
                'letter-spacing' => true,
                'text-transform' => true,
                'default' => array(
                    'color'       => '', 
                    'font-style'  => '', 
                    'font-family' => '',
                    'font-size'   => '', 
                    'line-height' => ''
                ),
            ),   
            array(
                'id' => 'h2-typography',
                'type' => 'typography',
                'output' => array('h2'),
                'title' => esc_html__('Heading 2', 'gocargo'),
                'subtitle' => esc_html__('Specify the heading 2 font properties.', 'gocargo'),
                'google' => true,
                'font-backup' => true,
                'word-spacing' => true,
                'letter-spacing' => true,
                'text-transform' => true,
                'default' => array(
                    'color'       => '', 
                    'font-style'  => '', 
                    'font-family' => '',
                    'font-size'   => '', 
                    'line-height' => ''
                ),
            ), 
            array(
                'id' => 'h3-typography',
                'type' => 'typography',
                'output' => array('h3'),
                'title' => esc_html__('Heading 3', 'gocargo'),
                'subtitle' => esc_html__('Specify the heading 3 font properties.', 'gocargo'),
                'google' => true,
                'font-backup' => true,
                'word-spacing' => true,
                'letter-spacing' => true,
                'text-transform' => true,
                'default' => array(
                    'color'       => '', 
                    'font-style'  => '', 
                    'font-family' => '',
                    'font-size'   => '', 
                    'line-height' => ''
                ),
            ), 
            array(
                'id' => 'h4-typography',
                'type' => 'typography',
                'output' => array('h4'),
                'title' => esc_html__('Heading 4', 'gocargo'),
                'subtitle' => esc_html__('Specify the heading 4 font properties.', 'gocargo'),
                'google' => true,
                'font-backup' => true,
                'word-spacing' => true,
                'letter-spacing' => true,
                'text-transform' => true,
                'default' => array(
                    'color'       => '', 
                    'font-style'  => '', 
                    'font-family' => '',
                    'font-size'   => '', 
                    'line-height' => ''
                ),
            ), 
            array(
                'id' => 'h5-typography',
                'type' => 'typography',
                'output' => array('h5'),
                'title' => esc_html__('Heading 5', 'gocargo'),
                'subtitle' => esc_html__('Specify the heading 5 font properties.', 'gocargo'),
                'google' => true,
                'font-backup' => true,
                'word-spacing' => true,
                'letter-spacing' => true,
                'text-transform' => true,
                'default' => array(
                    'color'       => '', 
                    'font-style'  => '', 
                    'font-family' => '',
                    'font-size'   => '', 
                    'line-height' => ''
                ),
            ), 
            array(
                'id' => 'h6-typography',
                'type' => 'typography',
                'output' => array('h6'),
                'title' => esc_html__('Heading 6', 'gocargo'),
                'subtitle' => esc_html__('Specify the heading 6 font properties.', 'gocargo'),
                'google' => true,
                'font-backup' => true,
                'word-spacing' => true,
                'letter-spacing' => true,
                'text-transform' => true,
                'default' => array(
                    'color'       => '', 
                    'font-style'  => '', 
                    'font-family' => '',
                    'font-size'   => '', 
                    'line-height' => ''
                ),
            ),    
            array(
                'id' => 'menu-typography',
                'type' => 'typography',
                'output' => array('#mainmenu a'),
                'title' => esc_html__('Menu item', 'gocargo'),
                'subtitle' => esc_html__('Specify the Menu item font properties.', 'gocargo'),
                'google' => true,
                'font-backup' => true,
                'word-spacing' => true,
                'letter-spacing' => true,
                'text-transform' => true,
                'default' => array(
                    'color'       => '', 
                    'font-style'  => '', 
                    'font-family' => '',
                    'font-size'   => '', 
                    'line-height' => '',
                ),
            ),                                   
        )
    ) );

    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-blogger',
        'title' => esc_html__('Blog Settings', 'gocargo'),
        'fields' => array(
            array(
                'id'       => 'blog-layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Blog Layout', 'gocargo' ),
                'subtitle' => esc_html__( 'Click on image layout to choose', 'gocargo' ),
                'desc'     => esc_html__( 'Select layout you want use for all your blog page.', 'gocargo' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => '1 Column',
                        'img' => get_template_directory_uri().'/images/theme-options/1c.png'
                    ),                    
                    '2' => array(
                        'alt' => '2 Column Left',
                        'img' => get_template_directory_uri().'/images/theme-options/2cl.png'
                    ),    
                    '3' => array(
                        'alt' => '2 Column Right',
                        'img' => get_template_directory_uri().'/images/theme-options/2cr.png'
                    ),                                 
                ),
                'default'  => '3'
            ),
            array(
                'id' => 'blog_style',
                'type' => 'select',
                'title' => esc_html__('Blog Style', 'gocargo'),
                'subtitle' => esc_html__('Select Blog Style', 'gocargo'),
                'options'  => array(
                    'blog1' => 'Blog Style 1',
                    'blog2'  => 'Blog Style 2',
                    'blog3'  => 'Blog Style 3',
                ),
                'default' => 'blog1',
            ), 
            array(
                'id' => 'blog_excerpt',
                'type' => 'text',
                'title' => esc_html__('Blog custom excerpt lenght', 'gocargo'),
                'subtitle' => esc_html__('Input Blog custom excerpt lenght', 'gocargo'),
                'desc' => esc_html__('Blog custom excerpt lenght', 'gocargo'),
                'default' => '30'
            ),                
            array(
                'id' => 'bg_blogpage',
                'type' => 'media',
                'url' => false,
                'title' => esc_html__('Background Subheader All Blog Pages', 'gocargo'),
                'compiler' => 'true',
                'subtitle' => esc_html__('Upload your background image.', 'gocargo'),
                'desc' => esc_html__('Using in index.php, archive.php, search.php', 'gocargo'),
                
               'default' => array('url' => get_template_directory_uri().'/images/bg-subheader.jpg'),                     
            ),               
         )
    ) );     

    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-cogs',
        'title' => esc_html__('Services Settings', 'gocargo'),
        'fields' => array(            
            array(
                'id' => 'archive_service_title',
                'type' => 'text',
                'title' => esc_html__('Archive Service Page Title', 'gocargo'),
                'subtitle' => esc_html__('Leave a blank will be use the_archive_title() to instead.', 'gocargo'),
                'desc' => esc_html__('Archive Service Page Title', 'gocargo'),
                'default' => 'SERVICES'
            ), 
            array(
                'id' => 'archive_service_read',
                'type' => 'text',
                'title' => esc_html__('Service Button Text', 'gocargo'),
                'subtitle' => esc_html__('Leave a blank will be use translate text from language file.', 'gocargo'),
                'desc' => esc_html__('Button Text use on Archive Service Page only', 'gocargo'),
                'default' => 'View Details'
            ), 
            array(
                'id' => 'service_per_page',
                'type' => 'text',
                'title' => esc_html__('Number items per page', 'gocargo'),
                'subtitle' => esc_html__('Leave a blank will be default: 8 items per page.', 'gocargo'),
                'desc' => esc_html__('', 'gocargo'),
                'default' => ''
            ),                     
         )
    ) );

    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-group',
        'title' => esc_html__('Social Settings', 'gocargo'),
        'fields' => array(
            array(
                'id' => 'facebook',
                'type' => 'text',
                'title' => esc_html__('Facebook Url', 'gocargo'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => 'https://www.facebook.com/',
            ),
            array(
                'id' => 'twitter',
                'type' => 'text',
                'title' => esc_html__('Twitter Url', 'gocargo'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => 'https://twitter.com/',
            ),
            array(
                'id' => 'google',
                'type' => 'text',
                'title' => esc_html__('Google+ Url', 'gocargo'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => 'https://plus.google.com',
            ),                      
            array(
                'id' => 'github',
                'type' => 'text',
                'title' => esc_html__('Github Url', 'gocargo'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => ''
            ),
            array(
                'id' => 'youtube',
                'type' => 'text',
                'title' => esc_html__('Youtube Url', 'gocargo'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => '',
            ),
            array(
                'id' => 'linkedin',
                'type' => 'text',
                'title' => esc_html__('Linkedin Url', 'gocargo'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => '',
            ),
            array(
                'id' => 'dribbble',
                'type' => 'text',
                'title' => esc_html__('Dribbble Url', 'gocargo'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => '',
            ),
            array(
                'id' => 'behance',
                'type' => 'text',
                'title' => esc_html__('Behance Url', 'gocargo'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => ''
            ),
            array(
                'id' => 'instagram',
                'type' => 'text',
                'title' => esc_html__('Instagram Url', 'gocargo'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => ''
            ),
            array(
                'id' => 'skype',
                'type' => 'text',
                'title' => esc_html__('Skype Url', 'gocargo'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => ''
            ),  
            array(
                'id' => 'pinterest',
                'type' => 'text',
                'title' => esc_html__('pinterest Url', 'gocargo'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => ''
            ), 
            array(
                'id' => 'vimeo',
                'type' => 'text',
                'title' => esc_html__('vimeo Url', 'gocargo'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => ''
            ), 
            array(
                'id' => 'tumblr',
                'type' => 'text',
                'title' => esc_html__('tumblr Url', 'gocargo'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => ''
            ), 
            array(
                'id' => 'soundcloud',
                'type' => 'text',
                'title' => esc_html__('soundcloud Url', 'gocargo'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => ''
            ), 
            array(
                'id' => 'lastfm',
                'type' => 'text',
                'title' => esc_html__('lastfm Url', 'gocargo'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => ''
            ), 
            array(
                'id' => 'rss',
                'type' => 'text',
                'title' => esc_html__('RSS Url', 'gocargo'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => '',
            ),  
            array(
                'id' => 'email',
                'type' => 'text',
                'title' => esc_html__('Email Address', 'gocargo'),
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'default' => '',
            ), 
            array(
                'id' => 'social_extend',
                'type' => 'editor',
                'title' => __('Add your social extend', 'gocargo'),
                'subtitle' => __('Add your social html code here, if your social network not have on list social above.', 'gocargo'),
                'description' => esc_html__('HTML code: <li><a target="_blank" href="#"><i class="fa fa-facebook"></i></a></li> , find more icons: http://fontawesome.io/icons/#brand', 'gocargo'),
                'default' => '',
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'icon' => ' el-icon-credit-card',
        'title' => esc_html__('Footer Settings', 'gocargo'),
        'fields' => array(  
            array(
                'id'       => 'footer-switch',
                'type'     => 'switch', 
                'title'    => esc_html__('Footer Widget Area Off?', 'gocargo'),
                'subtitle' => esc_html__('If you do not want to display the widget area on the main footer, just turn it off.', 'gocargo'),                
                'default'  => true,
            ), 
            array(
                'id'       => 'footer-sticky',
                'type'     => 'switch', 
                'title'    => esc_html__('Sticky Footer On?', 'gocargo'),
                'subtitle' => esc_html__('If you want your footer to get sticky every time you scroll page up or down, just turn it on.', 'gocargo'),
                'default'  => false,
            ),                                
            array(
                'id' => 'footer_text',
                'type' => 'editor',
                'title' => esc_html__('Copyright Text', 'gocargo'),
                'subtitle' => esc_html__('Add text to display on bottom footer.', 'gocargo'),
                'default' => 'Copyright 2017 - GoCargo made by OceanThemes',
            ),                    
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Styling', 'gocargo' ),        
        'id'         => 'footer-styling',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'footer_title_widget_color',
                'type' => 'color',
                'title' => esc_html__('Footer Title Widget Color', 'gocargo'),
                'subtitle' => esc_html__('Pick the title widget area color for the theme (default: #ffffff).', 'gocargo'),
                'output'      => array('color' => 'footer h3, footerh4, footerh5, footer h6'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'footer_textcolor',
                'type' => 'color',
                'title' => esc_html__('Footer Text Color', 'gocargo'),
                'subtitle' => esc_html__('Pick the Footer Text color for the theme (default: #cccccc).', 'gocargo'),
                'output'      => array('color' => 'footer'),
                'default' => '#cccccc',
                'validate' => 'color',
            ),            
            array(
                'id' => 'footer_bgcolor',
                'type' => 'color',
                'title' => esc_html__('Footer Background Color', 'gocargo'),
                'subtitle' => esc_html__('Pick the Footer Background color for the theme (default: #101314).', 'gocargo'),
                'output'      => array('background-color' => 'footer'),
                'default' => '#101314',
                'validate' => 'color',
            ),
            array(
                'id' => 'footer_bottom_textcolor',
                'type' => 'color',
                'title' => esc_html__('Footer Bottom Text Color', 'gocargo'),
                'subtitle' => esc_html__('Pick the Footer Bottom text color for the theme.', 'gocargo'),
                'output'      => array('color' => '.subfooter'),
                'default' => '',
                'validate' => 'color',
            ),
            array(
                'id' => 'footer_bottom_bgcolor',
                'type' => 'color',
                'title' => esc_html__('Footer Bottom Background Color', 'gocargo'),
                'subtitle' => esc_html__('Pick the Footer Bottom Background color for the theme.', 'gocargo'),
                'output'      => array('background-color' => '.subfooter'),
                'default' => '',
                'validate' => 'color',
            ),  
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Spacing', 'gocargo' ),
        'id'         => 'footer-design-spacing',        
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'foorer-spacing',
                'type'     => 'spacing',
                'output'   => array( 'footer .main-footer' ),
                // An array of CSS selectors to apply this font style to
                'mode'     => 'padding',
                // absolute, padding, margin, defaults to padding
                'all'      => false,
                // Have one field that applies to all
                //'top'           => false,     // Disable the top
                'right'         => false,     // Disable the right
                //'bottom'        => false,     // Disable the bottom
                'left'          => false,     // Disable the left
                'units'          => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
                'units_extended'=> 'true',    // Allow users to select any type of unit
                //'display_units' => 'false',   // Set to false to hide the units if the units are specified
                'title'    => esc_html__( 'Padding Main Footer', 'gocargo' ),
                'subtitle' => esc_html__( 'Allow your users to choose the spacing or margin they want.', 'gocargo' ),
                'desc'     => esc_html__( 'You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'gocargo' ),
                'default'  => array(
                    'padding-top'    => '',
                    'padding-bottom' => '',
                )
            ),
            array(
                'id'             => 'foorer-bottom-spacing',
                'type'           => 'spacing',
                'output'   => array( '.subfooter' ),
                // An array of CSS selectors to apply this font style to
                'mode'           => 'padding',
                // absolute, padding, margin, defaults to padding
                'all'            => false,
                // Have one field that applies to all
                //'top'           => false,     // Disable the top
                'right'         => false,     // Disable the right
                //'bottom'        => false,     // Disable the bottom
                'left'          => false,     // Disable the left
                'units'          => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',    // Allow users to select any type of unit
                //'display_units' => 'false',   // Set to false to hide the units if the units are specified
                'title'          => esc_html__( 'Padding Footer Bottom', 'gocargo' ),
                'subtitle'       => esc_html__( 'Allow your users to choose the spacing or margin they want.', 'gocargo' ),
                'desc'           => esc_html__( 'You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'gocargo' ),
                'default'        => array(
                    'padding-top'    => '',
                    'padding-bottom' => '',
                )
            ),
        )
    ) );
    
    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-website',
        'title' => esc_html__('Styling Options', 'gocargo'),
        'fields' => array( 
            array(
                'id' => 'theme_style',
                'type' => 'select',
                'title' => esc_html__('Theme Style', 'gocargo'),
                'subtitle' => esc_html__('Select Theme Style', 'gocargo'),
                'options'  => array(
                    'preview1' => 'Theme Style 1',
                    'preview2'  => 'Theme Style 2',
                    'preview3'  => 'Theme Style 3',
                ),
                'default' => 'preview1',
            ),                                  
            array(
                'id' => 'main-color',
                'type' => 'color',
                'title' => esc_html__('Theme Main Color', 'gocargo'),
                'subtitle' => esc_html__('Pick the main color for the theme (default: #d03232).', 'gocargo'),
                'default' => '#d03232',
                'validate' => 'color',
            ),              
            array(
                'id' => 'body-font2',
                'type' => 'typography',
                'output' => array('body'),
                'title' => esc_html__('Body Font', 'gocargo'),
                'subtitle' => esc_html__('Specify the body font properties.', 'gocargo'),
                'google' => true,
                'font-backup' => true,
                'word-spacing' => true,
                'letter-spacing' => true,
                'text-transform' => true,
                'default' => array(
                    'color' => '',
                    'font-size' => '',
                    'line-height' => '',
                    'font-family' => '',
                    'font-weight' => ''
                ),
            ),
            array(
                'id' => 'custom-css',
                'type' => 'ace_editor',
                'title' => esc_html__('CSS Code', 'gocargo'),
                'subtitle' => esc_html__('Paste your CSS code here.', 'gocargo'),
                'mode' => 'css',
                'theme' => 'monokai',
                'desc' => 'Possible modes can be found at http://ace.c9.io/.',
                'default' => ""
            ),
        )
    ) );

    /*
     * <--- END SECTIONS
     */
