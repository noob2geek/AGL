<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GoCargo
 */
$subtitle = get_post_meta(get_the_ID(),'_cmb_page_subtitle', true);
get_header(); ?>

	<!-- subheader begin -->
	<section id="subheader" class="page-news no-bottom" data-stellar-background-ratio="0.5" 
		<?php if( function_exists( 'rwmb_meta' ) ) { ?>        
	        <?php $images = rwmb_meta( '_cmb_subheader_image', "type=image" ); ?>
	        <?php if($images){ foreach ( $images as $image ) { ?>
	        <?php 
	        $img =  $image['full_url']; ?>
	          style="background-image: url('<?php echo esc_url($img); ?>');"
	        <?php } } ?>
	    <?php } ?> >
	    <div class="overlay">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-12">
	                	<?php if ($gocargo_option['subheader_layout'] != 'subheader2') { ?>
	                    	<h1><?php the_title(); ?> <?php if($subtitle != ''){ ?> <span><?php echo esc_attr($subtitle); ?></span><?php } ?> </h1>
	                        <div class="small-border wow flipInY" data-wow-delay=".8s" data-wow-duration=".8s"></div>
	                    <?php }else{ ?>
	                        <h1 class="page-title"><?php the_title(); ?></h1>
	                        <div class="crumb">
	                            <div class="deco">
	                                <?php echo gocargo_breadcrumbs(); ?>
	                            </div>
	                        </div>                        
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
                <div class="col-md-8">
                    <div class="single_post">
                        <?php while ( have_posts() ) : the_post(); ?>
                        	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<?php the_content(); ?>

								<?php
									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
								?>
								<?php wp_link_pages(); ?>
							</div>
						<?php endwhile; // End of the loop. ?>
                    </div>                    
                </div>

                <div id="sidebar" class="col-md-4">                    
                	<?php get_sidebar();?>
                </div>
            </div>
        </div>
    </div>
    <!-- content close -->

<?php get_footer(); ?>
