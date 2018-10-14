<?php global $gocargo_option; ?>
<?php if(isset($gocargo_option['blog_style']) and $gocargo_option['blog_style'] == 'blog2') { ?>
    <?php $quote = get_post_meta(get_the_ID(),'_cmb_quote', true); ?>
    <?php $quote_author = get_post_meta(get_the_ID(),'_cmb_quote_author', true); ?>
    <div class="news-item style-2 item">                               
        <div class="quote">
            <?php echo esc_html($quote); ?>
            <small><?php echo esc_html($quote_author); ?></small>
        </div>

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
    <?php $quote = get_post_meta(get_the_ID(),'_cmb_quote', true); ?>
    <?php $quote_author = get_post_meta(get_the_ID(),'_cmb_quote_author', true); ?>
    <div class="col-md-6 news-item style-2 item">
        <div class="quote">
            <?php echo esc_html($quote); ?>
            <small><?php echo esc_html($quote_author); ?></small>
        </div>

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
    <?php $quote = get_post_meta(get_the_ID(),'_cmb_quote', true); ?>
    <?php $quote_author = get_post_meta(get_the_ID(),'_cmb_quote_author', true); ?>
    <div class="col-md-6 news-item item">                
        <div class="quote">
            <?php echo esc_html($quote); ?>
            <small><?php echo esc_html($quote_author); ?></small>
        </div>  
        <div class="desc">
            <a href="<?php esc_url(the_permalink()); ?>">
                <h3><?php the_title(); ?></h3>
            </a>
            <div class="post-details"><?php gocargo_entry_meta(); ?></div>        
        </div>
    </div>
<?php } ?>