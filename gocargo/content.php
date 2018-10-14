<?php global $gocargo_option; ?>
<?php if(isset($gocargo_option['blog_style']) and $gocargo_option['blog_style'] == 'blog2') { ?>
    <div class="news-item style-2 item">                               
        <?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
            <figure class="pic-hover">
                <span class="center-xy"></span>            
                <span class="bg-overlay"></span>
                <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?> 
            </figure>
        <?php }  ?>

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
        <?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
            <figure class="pic-hover">
                <span class="center-xy"></span>            
                <span class="bg-overlay"></span>
                <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?> 
            </figure>
        <?php }  ?>

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
        <?php
            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) );
            } 
        ?>   
        <div class="desc">
            <a href="<?php esc_url(the_permalink()); ?>">
                <h3><?php the_title(); ?></h3>
            </a>
            <div class="post-details"><?php gocargo_entry_meta(); ?></div>
            <?php echo gocargo_excerpt_length(); ?>
        </div>
    </div>
<?php } ?>
