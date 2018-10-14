<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GoCargo
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php global $gocargo_option; ?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <!-- Favicons
    ================================================== -->
    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>    	
    	<?php if($gocargo_option['favicon']['url'] !=''){ ?>
    		<link rel="icon" href="<?php echo esc_url($gocargo_option['favicon']['url']); ?>" type="image/x-icon">    
        <?php } ?>
    <?php } ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 
    if($gocargo_option['preload-switch']!=false and isset($gocargo_option['preloader_mode']) and $gocargo_option['preloader_mode']=="preloader_loading"){ 
        echo '<div id="preloader"></div>';
    } 
 ?>

<div id="wrapper">
<?php 
    if(isset($gocargo_option['header_layout_wrap']) and $gocargo_option['header_layout_wrap']=="header2" ){
        get_template_part('framework/headers/header-2'); 
    }else{ 
?>
	<!-- header begin -->
    <header class="<?php gocargo_header_class(); ?> site-header-1">
        <div class="container">
            <span id="menu-btn"></span>
            <div class="row">
                <div class="col-md-3">
                    <!-- logo begin -->
                    <div id="logo">
                        <div class="inner">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php if($gocargo_option['logo']['url'] != ''){ ?><img src="<?php echo esc_url($gocargo_option['logo']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" class="logo-1"><?php } ?>
                                <?php if($gocargo_option['logo2']['url'] != ''){ ?><img src="<?php echo esc_url($gocargo_option['logo2']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" class="logo-2"><?php } ?>    
                            </a>
                        </div>
                    </div>
                    <!-- logo close -->
                </div>

                <div class="col-md-9">
                    <!-- mainmenu begin -->
                    <nav id="mainmenu-container">
                    	<?php
                            $primary = array(
                                'theme_location'  => 'primary',
                                'menu'            => '',
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => '',
                                'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                'walker'          => new wp_bootstrap_navwalker(),
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '<ul id="mainmenu">%3$s</ul>',
                                'depth'           => 0,
                            );
                            if ( has_nav_menu( 'primary' ) ) {
                                wp_nav_menu( $primary );
                            }
                        ?>                           
                    </nav>
                    <!-- mainmenu close -->

                    <?php if(isset($gocargo_option['header_layout']) and $gocargo_option['header_layout'] == 'header2') { ?>
                        <!-- search -->
                        <div class="search text-right">
                            <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">                          
                                <input type="search" class="search-field" id="search"
                                        placeholder="<?php echo esc_attr_e( 'Search&hellip;', 'gocargo' ) ?>"
                                        value="<?php echo get_search_query() ?>" name="s"
                                        title="<?php echo esc_attr_e( 'Search for:', 'gocargo' ) ?>" />
                                <input type="submit" class="search-submit"
                                    value="<?php echo esc_attr_e( 'Search', 'gocargo' ) ?>" />
                            </form>
                        </div>
                        <!-- search close -->
                    <?php }elseif(isset($gocargo_option['header_layout']) and $gocargo_option['header_layout'] == 'normal'){ ?> 
                        <!-- social icons -->
                        <ul class="social">
                            <?php if($gocargo_option['facebook']!=''){ ?>                                    
                                <li><a target="_blank" href="<?php echo esc_url($gocargo_option['facebook']); ?>"><i class="fa fa-facebook"></i></a></li>                                   
                            <?php } ?>                                
                            <?php if($gocargo_option['twitter']!=''){ ?>                                    
                                <li><a target="_blank" href="<?php echo esc_url($gocargo_option['twitter']); ?>"><i class="fa fa-twitter"></i></a></li>                                   
                            <?php } ?>                                
                            <?php if($gocargo_option['google']!=''){ ?>                                    
                                <li><a target="_blank" href="<?php echo esc_url($gocargo_option['google']); ?>"><i class="fa fa-google-plus"></i></a></li>                                   
                            <?php } ?>
                            <?php if($gocargo_option['dribbble']!=''){ ?>
                                <li><a target="_blank" href="<?php echo esc_url($gocargo_option['dribbble']); ?>"><i class="fa fa-dribbble"></i></a></li>
                            <?php } ?>
                            <?php if($gocargo_option['pinterest']!=''){ ?>
                                <li><a target="_blank" href="<?php echo esc_url($gocargo_option['pinterest']); ?>"><i class="fa fa-pinterest"></i></a></li>
                            <?php } ?>
                            <?php if($gocargo_option['linkedin']!=''){ ?>
                                <li><a target="_blank" href="<?php echo esc_url($gocargo_option['linkedin']); ?>"><i class="fa fa-linkedin"></i></a></li>
                            <?php } ?>                                
                            <?php if($gocargo_option['youtube']!=''){ ?>                                    
                                <li><a target="_blank" href="<?php echo esc_url($gocargo_option['youtube']); ?>"><i class="fa fa-youtube"></i></a></li>                                  
                            <?php } ?>  
                            <?php if($gocargo_option['vimeo']!=''){ ?>
                                <li><a target="_blank" href="<?php echo esc_url($gocargo_option['vimeo']); ?>"><i class="fa fa-vimeo-square"></i></a></li>
                            <?php } ?>
                            <?php if($gocargo_option['rss']!=''){ ?>                                    
                                <li><a target="_blank" href="<?php echo esc_url($gocargo_option['rss']); ?>"><i class="fa fa-rss"></i></a></li>                                 
                            <?php } ?>                                                            
                            <?php if($gocargo_option['skype']!=''){ ?>
                                <li><a href="<?php echo esc_attr($gocargo_option['skype']); ?>"><i class="fa fa-skype"></i></a></li>
                            <?php } ?>                               
                            <?php if($gocargo_option['instagram']!=''){ ?>
                                <li><a target="_blank" href="<?php echo esc_url($gocargo_option['instagram']); ?>"><i class="fa fa-instagram"></i></a></li>
                            <?php } ?>  
                            <?php if($gocargo_option['github']!=''){ ?>
                                <li><a target="_blank" href="<?php echo esc_url($gocargo_option['github']); ?>"><i class="fa fa-github"></i></a></li>
                            <?php } ?>
                            <?php if($gocargo_option['tumblr']!=''){ ?>
                                <li><a target="_blank" href="<?php echo esc_url($gocargo_option['tumblr']); ?>"><i class="fa fa-tumblr-square"></i></a></li>
                            <?php } ?>
                            <?php if($gocargo_option['soundcloud']!=''){ ?>
                                <li><a target="_blank" href="<?php echo esc_url($gocargo_option['soundcloud']); ?>"><i class="fa fa-soundcloud"></i></a></li>
                            <?php } ?>
                            <?php if($gocargo_option['behance']!=''){ ?>
                                <li><a target="_blank" href="<?php echo esc_url($gocargo_option['behance']); ?>"><i class="fa  fa-behance"></i></a></li>
                            <?php } ?>
                            <?php if($gocargo_option['lastfm']!=''){ ?>
                                <li><a target="_blank" href="<?php echo esc_url($gocargo_option['lastfm']); ?>"><i class="fa fa-lastfm"></i></a></li>
                            <?php } ?>  
                            <?php if($gocargo_option['email']!=''){ ?>
                                <li><a href="<?php echo esc_attr($gocargo_option['email']); ?>"><i class="fa fa-envelope-o"></i></a></li>
                            <?php } ?> 
                            <?php if($gocargo_option['social_extend']!=''){ 
                                echo htmlspecialchars_decode(do_shortcode( $gocargo_option['social_extend'] ));
                            } ?>
                        </ul>
                        <!-- social icons close -->
                    <?php }else{} ?>
                </div>
            </div>
        </div>
    </header>
    <!-- header close -->
<?php } ?>