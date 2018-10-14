<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GoCargo
 */
global $gocargo_option; ?>

    <?php if($gocargo_option['footer-switch']!=false){ ?>
     	<!-- footer begin -->
        <footer <?php if($gocargo_option['footer-sticky']!=false){ echo 'class="sticky"'; }?>>
            
            <?php 
                if ( is_active_sidebar( 'footer-area-1' ) 
                    || is_active_sidebar( 'footer-area-2' ) 
                    || is_active_sidebar( 'footer-area-3' ) 
                    || is_active_sidebar( 'footer-area-4' ) 
                    || is_active_sidebar( 'footer-area-5' ) 
                    || is_active_sidebar( 'footer-area-6' ) 
                    || is_active_sidebar( 'footer-area-7' ) 
                    || is_active_sidebar( 'footer-area-8' ) 
                ){ 
            ?>
                <div class="main-footer">
                    <div class="container">
                        <div class="row">
                            <?php get_sidebar('footer');?>
                        </div>    
                    </div>
                </div>
            <?php } ?>
            
            <div class="subfooter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <?php echo wp_kses( $gocargo_option['footer_text'], wp_kses_allowed_html('post') ); ?>  
                        </div>
                    </div>
                </div>
            </div>            
        </footer>    
        <!-- footer close -->
    <?php } ?>

</div><!-- #wrapper -->
<a id="back-to-top" href="#" class="show"></a>

<?php wp_footer(); ?>
</body>
</html>
