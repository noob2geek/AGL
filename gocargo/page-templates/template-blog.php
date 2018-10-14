<?php
/**
 * Template Name: Template Blog
 */
$subtitle = get_post_meta(get_the_ID(),'_cmb_page_subtitle', true);
get_header(); ?>

    <!-- subheader begin -->
    <section id="subheader" class="page-about no-bottom" data-stellar-background-ratio="0.5" 
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
                            <h1><?php the_title(); ?> <?php if($subtitle != ''){ ?><span><?php echo esc_attr($subtitle); ?></span><?php } ?></h1>
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
                    <div id="newslist" class="news-list row">
                         <?php 
                            $args = array(    
                              'paged' => $paged,
                              'post_type' => 'post',
                              );
                            $wp_query = new WP_Query($args);
                            while ($wp_query -> have_posts()): $wp_query -> the_post();                         
                                get_template_part( 'content', get_post_format() ) ; ?> 
                        <?php endwhile;?> 
                    </div>
                    <div class="clearfix"></div>
                    <div class="text-center ">
                        <?php echo gocargo_pagination(); ?>
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