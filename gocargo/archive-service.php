<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package GoCargo
 */

global $gocargo_option;
$service_per_page = (!empty($gocargo_option['service_per_page'])) ? $gocargo_option['service_per_page'] : 8;

get_header(); ?>

	<!-- subheader begin -->
  <section id="subheader" class="page-news no-bottom" data-stellar-background-ratio="0.5">
      <div class="overlay">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                  <?php if ($gocargo_option['subheader_layout'] != 'subheader2') { ?>
                  	<h1>
                      <?php
            						if ($gocargo_option['archive_service_title'] != ''){ echo esc_attr($gocargo_option['archive_service_title']); }else{ the_archive_title(); }
            						the_archive_description( '<span class="taxonomy-description">', '</span>' );
            					?>
                    </h1>
                    <div class="small-border wow flipInY" data-wow-delay=".8s" data-wow-duration=".8s"></div>
                  <?php }else{ ?>
                    <?php if ($gocargo_option['archive_service_title'] != ''){ echo '<h1 class="page-title">' . esc_attr($gocargo_option['archive_service_title']) . '</h1>'; }else{ the_archive_title( '<h1 class="page-title">', '</h1>' ); } ?>
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
	  <div id="newslist" class="row wow fadeInUp" data-wow-delay=".3s">
			<?php 
        if ( get_query_var('paged') ){
          $paged = get_query_var('paged');
        }elseif ( get_query_var('page') ){
          $paged = get_query_var('page');
        }else{
          $paged = 1;
        } 
        query_posts(array('post_type' => 'service', 'posts_per_page' => $service_per_page, 'paged' => $paged ));
        while (have_posts()) : the_post(); 
      ?>             
			<!-- gallery item -->
			<div class="box-service one-third item">
				<div class="bg-color-fx padding-5 text-center">
					<h3><?php the_title(); ?></h3>
					<div class="tiny-border margintop10 marginbottom10"></div>
					<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" class="img-responsive margintop20 marginbottom20 wow fadeInRight" data-wow-delay="<?php echo $j = $i*0.3; ?>s" alt="<?php the_title(); ?>" />
					<p><?php echo get_the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" class="btn-arrow hover-light"><span class="line"></span>
            <span class="url"> 
              <?php 
                if ($gocargo_option['archive_service_read'] != '') {
                  echo htmlspecialchars_decode( do_shortcode( $gocargo_option['archive_service_read'] ) );
                }else{
                  esc_attr_e('View Details', 'gocargo');
                } 
              ?>
            </span>
          </a>
				</div>
			</div>		
			<!-- close gallery item -->
		   <?php endwhile; ?>
		</div>
	</div>
  <div class="text-center ">
    <?php echo gocargo_pagination(); ?>
  </div>
</div>
<!-- content close -->

<?php get_footer(); ?>
