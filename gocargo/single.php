<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
        <?php $img =  $image['full_url']; ?>
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
            	<?php if(isset($gocargo_option['blog-layout']) and $gocargo_option['blog-layout'] == 2 ){ ?>
                    <div id="sidebar" class="col-md-4"> 
                      <?php get_sidebar();?>
                    </div>
                <?php } ?>
                <div class="<?php if(isset($gocargo_option['blog-layout']) and $gocargo_option['blog-layout'] != 1 ){ echo 'col-md-8'; }else{ echo 'col-md-12'; }?>">
                    <div class="single_post news-item">
                        <?php while ( have_posts() ) : the_post(); ?>
                    	<div class="post-image">
	                        <?php $format = get_post_format(); ?>
	                        	<?php if($format=='audio'){ $link_audio = get_post_meta(get_the_ID(),'_cmb_link_audio', true); ?>
	                          		<iframe style="width:100%" src="<?php echo esc_url( $link_audio ); ?>"></iframe>	            
	                          	<?php } elseif($format=='video'){ $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true); ?>
	                            	<?php echo wp_oembed_get( $link_video ); ?>	          
	                          	<?php } elseif($format=='gallery'){ ?>
		                            <div id="owl-demo-<?php the_ID(); ?>" class="owl-carousel">
		                              <?php if( function_exists( 'rwmb_meta' ) ) { ?>  
		                                  <?php $images = rwmb_meta( '_cmb_images', "type=image" ); ?>
		                                  <?php if($images){ ?>		                                    
		                                      <?php foreach ( $images as $image ) {  ?>
		                                      <?php $img = $image['full_url']; ?>
		                                        <div class="item"><img src="<?php echo esc_url($img); ?>" alt=""></div> 
		                                      <?php } ?>                   
		                                    
		                                  <?php } ?>
		                                <?php } ?>
		                            </div>
		                            <script type="text/javascript">
		                              (function($){
		                                "use strict";                              
		                                $(document).ready(function() {
		                                    $("#owl-demo-<?php the_ID(); ?>").owlCarousel({
		                                      autoPlay: 3000,
		                                      items : 1,
		                                      singleItem:true,                                    
		                                    });
		                                  });                              
		                              })(this.jQuery);
		                            </script>	             
	                          	<?php } elseif ($format=='image'){ ?>
		                          	<?php if( function_exists( 'rwmb_meta' ) ) { ?>  
			                            <?php $images = rwmb_meta( '_cmb_image', "type=image" ); ?>
			                            <?php if($images){ ?>
				                            <?php foreach ( $images as $image ) { ?>
					                            <?php $img = $image['full_url']; ?>
					                            <img src="<?php echo esc_url($img); ?>" alt="">
				                            <?php } ?>
			                            <?php } ?>
		                          	<?php } ?>
	                          <?php }else{ ?>
	                              <?php if(get_the_post_thumbnail()){ ?>              
	                                  <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="">
	                              <?php } ?>
	                          <?php } ?>
	                      	</div>
	                      	<h2 class="single-title"><?php the_title(); ?></h2>
	                      	<div class="post-details"><?php gocargo_entry_meta(); ?></div>
	                        <div class="post-content post-text">
	                        	<?php the_content(); ?>
	                        </div>					
	                        <div class="single_tags clearfix">
					            <div class="tags_text">
									<h5><?php esc_html_e('Tags:', 'gocargo'); ?></h5>
									<?php echo get_the_tag_list( '', ' ' ); ?>
								</div>
							</div>		
							<?php //the_post_navigation(); ?>
							<?php
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							?>
						<?php endwhile; // End of the loop. ?>
                    </div>                    
                </div>

                <?php if(isset($gocargo_option['blog-layout']) and $gocargo_option['blog-layout'] == 3 ){ ?>
                    <div id="sidebar" class="col-md-4"> 
                      <?php get_sidebar();?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- content close -->
	
<?php get_footer(); ?>
