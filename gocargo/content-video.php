<?php global $gocargo_option; ?>
<?php if(isset($gocargo_option['blog_style']) and $gocargo_option['blog_style'] == 'blog2') { ?>
    <div class="news-item style-2 item">                               
        <figure class="pic-hover">
            <span class="center-xy">
                <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                    <?php $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true); ?>
                    <?php if($link_video){ ?>  
                        <a class="popup-youtube" href="<?php echo esc_url( $link_video ); ?>"><i class="fa fa-play btn-action btn-play"></i></a>                      
                    <?php } ?>
                <?php } ?> 
            </span>        
            <span class="bg-overlay"></span>
            <?php 
                if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                    the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); 
                }
            ?>
        </figure>

        <div class="inner">
            <div class="date">
                <span class="day"><?php the_time('d') ?></span>
                <span class="month"><?php the_time('M') ?></span>
            </div>
            <div class="desc">
                <a href="<?php esc_url(the_permalink()); ?>">
                    <h4><?php the_title(); ?></h4>
                </a>
                <?php echo gocargo_excerpt_length(); ?>
                <br>
            </div>
        </div>
    </div>
<?php }elseif ($gocargo_option['blog_style'] == 'blog3') { ?>
    <div class="col-md-6 news-item style-2 item">
        <figure class="pic-hover">
            <span class="center-xy">
                <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                    <?php $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true); ?>
                    <?php if($link_video){ ?>  
                        <a class="popup-youtube" href="<?php echo esc_url( $link_video ); ?>"><i class="fa fa-play btn-action btn-play"></i></a>                      
                    <?php } ?>
                <?php } ?> 
            </span>        
            <span class="bg-overlay"></span>
            <?php 
                if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                    the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); 
                }
            ?>
        </figure>

        <div class="inner">
            <div class="date">
                <span class="day"><?php the_time('d') ?></span>
                <span class="month"><?php the_time('M') ?></span>
            </div>
            <div class="desc">
                <a href="<?php esc_url(the_permalink()); ?>">
                    <h4><?php the_title(); ?></h4>
                </a>
                <?php echo gocargo_excerpt_length(); ?>
                <br>
            </div>
        </div>
    </div>
<?php }else{ ?>
    <div class="col-md-6 news-item item">
        <?php if( function_exists( 'rwmb_meta' ) ) { ?>
            <?php $link_video = get_post_meta(get_the_ID(),'_cmb_link_video', true); ?>
            <?php if($link_video){ ?>  
                <?php echo wp_oembed_get( $link_video ); ?>                       
            <?php } ?>
        <?php } ?>    
        <div class="desc">
            <a href="<?php esc_url(the_permalink()); ?>">
                <h3><?php the_title(); ?></h3>
            </a>
            <div class="post-details"><?php gocargo_entry_meta(); ?></div>
            <?php echo gocargo_excerpt_length(); ?>
        </div>
    </div>
<?php } ?>