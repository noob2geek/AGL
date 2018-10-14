<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GoCargo
 */
global $wp_query;
$subtitle = get_post_meta($wp_query->get_queried_object_id(), "_cmb_page_subtitle", true);
global $gocargo_option;
get_header(); ?>

	<!-- subheader begin -->
    <section id="subheader" class="page-news no-bottom" data-stellar-background-ratio="0.5"
        <?php if($gocargo_option['bg_blogpage']['url'] !=''){ ?>
            style="background-image: url('<?php echo esc_url($gocargo_option['bg_blogpage']['url']); ?>');"
        <?php } ?>
    >
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <?php if ($gocargo_option['subheader_layout'] != 'subheader2') { ?>
                    	<h1><?php echo get_the_title( get_option('page_for_posts', true) ); ?> <?php if($subtitle != ''){ ?><span><?php echo esc_attr($subtitle); ?></span><?php } ?></h1>
                        <div class="small-border wow flipInY" data-wow-delay=".8s" data-wow-duration=".8s"></div>
                    <?php }else{ ?>
                        <h1 class="page-title"><?php echo get_the_title( get_option('page_for_posts', true) ); ?></h1>                        
                    <?php } ?>    
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

    <div class="clearfix"></div>

    <!-- content begin -->
    <div id="content">
        <div class="container">
            <div class="row">
                <?php if(isset($gocargo_option['blog-layout']) and $gocargo_option['blog-layout'] == 2 ){ ?>
                    <div id="sidebar" class="col-md-4"> 
                      <?php get_sidebar();?>
                    </div>
                <?php } ?>
                <div class="<?php if(isset($gocargo_option['blog-layout']) and $gocargo_option['blog-layout'] != 1 ){ echo 'col-md-8'; }else{ echo 'col-md-12'; }?>">
                    <div id="newslist" class="news-list row">
                        <?php 
		                    while (have_posts()) : the_post();
		                      	get_template_part( 'content', get_post_format() ) ;   // End the loop.
		                    endwhile;
	                    ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="text-center ">
                        <?php echo gocargo_pagination(); ?>
                    </div>
                </div>
                <?php if(isset($gocargo_option['blog-layout']) and $gocargo_option['blog-layout'] == 3 ){ ?>
                    <div id="sidebar" class="col-md-4"> 
                      <?php get_sidebar(); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- content close -->

<?php get_footer(); ?>
