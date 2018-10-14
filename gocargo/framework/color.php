<?php 
if(!function_exists('gocargo_custom_frontend_style')){
    function gocargo_custom_frontend_style(){
        global $gocargo_option;
?>        
    <style type="text/css">     
      /* 01 MAIN STYLES
      ****************************************************************************************************/
      ::selection {
        color: #fff;
        background: <?php echo esc_attr( $gocargo_option['main-color'] ); ?>;
      }
      ::-moz-selection {
        color: #fff;
        background: <?php echo esc_attr( $gocargo_option['main-color'] ); ?>;
      }      

      /* Preload Setting */
      
      #preloader {
        background-image: url(<?php echo esc_url($gocargo_option['iconloading_preload']['url']); ?>);
      }
      

      header{
        <?php if($gocargo_option['header-background-color'] != ''){ ?>
          background-color:<?php echo esc_attr( $gocargo_option['header-background-color'] ); ?>;
        <?php } ?>
      }
      header.smaller, header.cbp-af-header-shrink{
        <?php if($gocargo_option['header-small-background-color'] != ''){ ?>
          background-color:<?php echo esc_attr( $gocargo_option['header-small-background-color'] ); ?>;
        <?php } ?> 
      }
      #mainmenu a{color: <?php echo esc_attr( $gocargo_option['header-text-color'] ); ?>;}
      header.cbp-af-header-shrink #mainmenu a{color: <?php echo esc_attr( $gocargo_option['header-scroll-text-color'] ); ?>;}
      #mainmenu > li.current-menu-item > a, nav ul#mainmenu > li.current-menu-ancestor > a {color: <?php echo esc_attr( $gocargo_option['main-color'] ); ?>;}
      #mainmenu li li.current-menu-item > a, #mainmenu li li.current-menu-ancestor > a {background-color:<?php echo esc_attr( $gocargo_option['main-color'] ); ?>;}

      <?php if($gocargo_option['headerhome-switch']!=false){ ?>
        @media only screen and (min-width: 992px) {
          header.header-home{
            <?php if($gocargo_option['header-background-color'] != ''){ ?>
              background-color:<?php echo esc_attr( $gocargo_option['header-home-bgcolor'] ); ?>;
            <?php } ?>
          }
          header.header-home.smaller, header.header-home.cbp-af-header-shrink{
            <?php if($gocargo_option['header-small-background-color'] != ''){ ?>
              background-color:<?php echo esc_attr( $gocargo_option['headerscroll-home-bgcolor'] ); ?>;
            <?php } ?> 
          }
          header.header-home #mainmenu > li > a{color: <?php echo esc_attr( $gocargo_option['header-home-menu-color'] ); ?>;}
          header.header-home.cbp-af-header-shrink #mainmenu > li > a{color: <?php echo esc_attr( $gocargo_option['headerscroll-home-menu-color'] ); ?>;}          
          header.header-home #mainmenu > li.current-menu-item > a, 
          header.header-home nav ul#mainmenu > li.current-menu-ancestor > a, 
          header.header-home #mainmenu > li > a:hover {color: <?php echo esc_attr( $gocargo_option['main-color'] ); ?>;}
          header.header-home #mainmenu li.current-menu-ancestor li.current-menu-item a {background-color:<?php echo esc_attr( $gocargo_option['main-color'] ); ?>;}
        }
      <?php } ?>

      @media (max-width: 992px) {
        header.cbp-af-header, #mainmenu li li, header.cbp-af-header-shrink {
          background-color:<?php echo esc_attr( $gocargo_option['header-mobile-bgcolor'] ); ?>;
        }
        <?php if ($gocargo_option['header-mobile-border-menu-color'] != '') { ?>
          #mainmenu li {border-bottom-color:<?php echo esc_attr( $gocargo_option['header-mobile-border-menu-color'] ); ?>;}
          #mainmenu > li li:first-child {border-top-color:<?php echo esc_attr( $gocargo_option['header-mobile-border-menu-color'] ); ?>;}
          #mainmenu li ul {border-top-color:<?php echo esc_attr( $gocargo_option['header-mobile-border-menu-color'] ); ?>;} 
        <?php } ?>

        #mainmenu li:hover{background-color:<?php echo esc_attr( $gocargo_option['main-color'] ); ?>;}
        #mainmenu li a, #mainmenu li li > a:after, #mainmenu li li a, 
        header.cbp-af-header-shrink #mainmenu li a, 
        header.cbp-af-header-shrink #mainmenu li li > a:after, header.cbp-af-header-shrink #mainmenu li li a{
          color: <?php echo esc_attr( $gocargo_option['header-mobile-menu-color'] ); ?>;
        }  
        #mainmenu li li.current-menu-item > a, #mainmenu li li.current-menu-ancestor > a,
        nav ul#mainmenu > li.current-menu-ancestor > a:hover {color: #fff;}
      }

      /* Customize Sub Header on Top Page */
      <?php if($gocargo_option['subheader-switch']!=false){ ?>
        #subheader{background-image:none !important;background-color: <?php echo esc_attr( $gocargo_option['subheader-background-color'] ); ?>;}
        #subheader .overlay {background-color: transparent;}
        #subheader h1 {color: <?php echo esc_attr( $gocargo_option['subheader-text-color'] ); ?>;}
        #subheader h1 span {color: <?php echo esc_attr( $gocargo_option['subheader-text-color'] ); ?>;}
        .crumb {color: <?php echo esc_attr( $gocargo_option['subheader-text-color'] ); ?>;}
        .crumb .deco:before, .crumb .deco:after{border-top-color: <?php echo esc_attr( $gocargo_option['subheader-text-color'] ); ?>;}
        .crumb li:before {color: <?php echo esc_attr( $gocargo_option['subheader-text-color'] ); ?>;}
      <?php } ?>

      a,
      .id-color,
      .list-2-col li:hover a,
      .list-2-col li:hover:before,
      .twitter-widget li a,
      #subheader h1.page-title,
      .counter .num,
      h1.id-color,h2.id-color,
      .team-list .name,
      .timeline-year .date,
      footer .social i:hover,
      #mainmenu li:hover a,
      .news-item .fa,
      .pagination li a, header .social a, .feature-box i,
      .team-social-icons i, .date-box, .news-item.style-3 .date, header .search-form:before, .info-box i,
      .news-item.style-2 a:hover h4, .btn-open-map span.url, header .info ul.info-list li i, .news-item.style-3 a:hover h4,
      .id-color h2, .title-with-icon-box > i, #mainmenu a.mPS2id-highlight, header.cbp-af-header-shrink #mainmenu a.mPS2id-highlight,
      .exo_tab .exo_nav .nav-item > div h5
      {color:<?php echo esc_attr( $gocargo_option['main-color'] ); ?>;}

      .divider-deco span,
      .box-icon-small i ,
      .tiny-border,
      .bg-color,
      .btn-custom,
      .news-list-date .date,
      .feature-box.icon-square > i,
      .owl-custom-nav .btn-next:before,
      .owl-custom-nav .btn-prev:before,
      #testi-carousel-2 blockquote, .testi-carousel-2 blockquote,
      .owl-theme .owl-controls .owl-page.active span,
      .awards-carousel .overlay,
      .side-nav li.active,
      .testi-box-1 blockquote,
      .simple-form input[type=submit],
      .btn-expand:before,
      .faq .icon-search,
      #mainmenu li li a:hover,
      .pagination li.active a,
      .news-item .quote,
      .ex-gallery .small-border,
      #menu-btn , .news-item.style-2 .date,
      .timeline.custom-tl > li > .timeline-badge,
      ul.progress li.active,
      ul.progress li.beforeactive:before,
      .small-border, .social-icons i, .icon-big,
      .call-to-action, a.btn-slider, .h-line, .preview2 .bloglist-small .date-box, 
      .preview2 .testi-carousel-2 blockquote,
      .widget_nav_menu ul li.current-menu-item, .widget_search #btn-search,
      .pagination li.active a, .pagination li span.current, 
      .footer-widget .newsletter-widget form .newsletter-submit,
      #back-to-top, .bloglist-small .date-box, .cta-form input[type=submit], .cta-form button,
      .owl-theme .owl-controls .owl-page.active span, .form-border.s1 .wpcf7-submit,
      .footer-col .newsletter .tnp-button
      {background-color:<?php echo esc_attr( $gocargo_option['main-color'] ); ?>;}

      .line-deco span:before,
      .line-deco span:after,
      .box-icon-small .btn-arrow span.line,
      .sub-intro-text span:before,
      .sub-intro-text span:after,
      .crumb span:before,
      .crumb span:after,
      .pagination li.active a, .social-icons i, .social-icons i:hover, .feature-box i.icon-s1, 
      .form-border.s1 .wpcf7-form-control:focus, .widget_search #search:focus, input[type="text"]:focus, 
      input[type="email"]:focus, textarea:focus, .form-border.s1 .wpcf7-submit
      {border-color:<?php echo esc_attr( $gocargo_option['main-color'] ); ?>;}

      .bg_transparent.vc_tta.vc_general .vc_tta-panel, .box-with-icon-left .text {border-left-color:<?php echo esc_attr( $gocargo_option['main-color'] ); ?>;}
      ul.progress li.active:after {
        border-color: transparent transparent transparent <?php echo esc_attr( $gocargo_option['main-color'] ); ?>;
      }
      .preview2 .arrow-down{
        border-top: 5px solid <?php echo esc_attr( $gocargo_option['main-color'] ); ?>;
      }
      .team-profile .text, .btn-open-map span.line {border-top-color: <?php echo esc_attr( $gocargo_option['main-color'] ); ?>;}
      .widget_search #search:focus, .pagination li.active a, .pagination li span.current {border-color: <?php echo esc_attr( $gocargo_option['main-color'] ); ?>;}

      .preview1 .bloglist-small .date-box {background-color: #eee;}

      .exo_tab.tab_map .exo_nav .nav-item > div.active, .exo_tab.tab_map .exo_nav .nav-item > div:hover {
        border-bottom-color: <?php echo esc_attr( $gocargo_option['main-color'] ); ?>;
      }

      /**** Custom CSS Footer ****/      
      <?php echo htmlspecialchars_decode($gocargo_option['custom-css']); ?>
    </style>
<?php        
    }
}
add_action('wp_head', 'gocargo_custom_frontend_style');
