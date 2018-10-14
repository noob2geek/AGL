<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GoCargo
 */

global $gocargo_option;

get_header(); ?>

	<!-- subheader begin -->
    <section id="subheader" class="page-news no-bottom" data-stellar-background-ratio="0.5">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <?php if ($gocargo_option['subheader_layout'] != 'subheader2') { ?>
                    	<h1><?php
							the_archive_title( );
							the_archive_description( '<span class="taxonomy-description">', '</span>' );
						?></h1>
                        <div class="small-border wow flipInY" data-wow-delay=".8s" data-wow-duration=".8s"></div>
                    <?php }else{ ?>
                        <h1 class="page-title"><?php the_archive_title( ); ?></h1>
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
	  <div class="row wow fadeInUp" data-wow-delay=".3s">
			<?php while (have_posts()) : the_post(); ?>             
			<!-- gallery item -->
			<div class="box-service one-third">
				<div class="bg-color-fx padding-5 text-center">
					<h3><?php the_title(); ?></h3>
					<div class="tiny-border margintop10 marginbottom10"></div>
					<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" class="img-responsive margintop20 marginbottom20 wow fadeInRight" data-wow-delay="<?php echo $j = $i*0.3; ?>s" alt="<?php the_title(); ?>" />
					<p><?php echo get_the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" class="btn-arrow hover-light"><span class="line"></span><span class="url"><?php _e('View Details', 'gocargo'); ?></span></a>
				</div>
			</div>		
			<!-- close gallery item -->
		   <?php endwhile; ?>
		</div>
	</div>
    <div class="container">
      <div class="col-md-12">
          <div class="pagination text-center" style="width:100%;padding-top: 40px;">
              <?php
                  global $wp_query;
                  $big = 999999999;
                  echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $wp_query->max_num_pages,                      
                      'prev_text' => '<i class="fa fa-angle-double-left"></i>',
                      'next_text' => '<i class="fa fa-angle-double-right"></i>',       
                      'type'          => 'list',
                      'end_size'      => 3,
                      'mid_size'      => 3
                  ) );
              ?>
          </div>
      </div>
    </div>
</div>
<!-- content close -->

<?php get_footer(); ?>
