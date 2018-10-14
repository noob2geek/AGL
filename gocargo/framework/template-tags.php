<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package GoCargo
 */

if ( ! function_exists( 'gocargo_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function gocargo_entry_meta() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><!--<time class="updated" datetime="%3$s">%4$s</time>-->';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'gocargo' ),
		//'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
        $time_string . '<span class="separator">|</span>'
	);

    echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

    $format = get_post_format();
    switch ($format) {
        case $format == 'video':
            echo "<i class='fa fa-film'></i>";
            break;
        case $format == 'audio':
            echo "<i class='fa fa-music'></i>";
            break;
        case $format == 'gallery':
            echo "<i class='fa fa-picture-o'></i>";
            break;      
        case $format == 'quote':
            echo "<i class='fa fa-quote-right'></i>";
            break;
        case $format == 'image':
            echo "<i class='fa fa-picture-o'></i>";
            break;                                   
        default:
           echo "<i class='fa fa-pencil'></i>";
    }

	$byline = sprintf(
		esc_html_x( 'By: %s', 'post author', 'gocargo' ),
		'<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
	);

    echo '<span class="separator">|</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'gocargo_excerpt_length' ) ) :
/**** Change length of the excerpt ****/
function gocargo_excerpt_length() {
      global $gocargo_option;
      if(isset($gocargo_option['blog_excerpt'])){
        $limit = $gocargo_option['blog_excerpt'];
      }else{
        $limit = 15;
      }  
      $excerpt = explode(' ', get_the_excerpt(), $limit);

      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
      return $excerpt;
}
endif;

if ( ! function_exists( 'gocargo_excerpt' ) ) :
/** Excerpt Section Blog Post **/
function gocargo_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
endif;

if ( ! function_exists( 'image_size_theme_setup' ) ) :
add_action( 'after_setup_theme', 'image_size_theme_setup' );
function image_size_theme_setup() {
    add_image_size( 'category-thumb', 300 ); // 300 pixels wide (and unlimited height)
    add_image_size( 'homepage-thumb', 700, 500, array( 'left', 'top' ) ); // (cropped)
}
endif;

if ( ! function_exists( 'gocargo_tag_cloud_widget' ) ) :
/**custom function tag widgets**/
function gocargo_tag_cloud_widget($args) {
    $args['number'] = 0; //adding a 0 will display all tags
    $args['largest'] = 18; //largest tag
    $args['smallest'] = 14; //smallest tag
    $args['unit'] = 'px'; //tag font unit
    $args['format'] = 'list'; //ul with a class of wp-tag-cloud
    $args['exclude'] = array(20, 80, 92); //exclude tags by ID
    return $args;
}
add_filter( 'widget_tag_cloud_args', 'gocargo_tag_cloud_widget' );
endif;

if ( ! function_exists( 'gocargo_breadcrumbs' ) ) :
function gocargo_breadcrumbs() {
    $text['home']     = esc_html__('Home', 'gocargo'); // text for the 'Home' link
    $text['category'] = '%s'; // text for a category page
    $text['tax']      = '%s'; // text for a taxonomy page
    $text['search']   = '%s'; // text for a search results page
    $text['tag']      = '%s'; // text for a tag page
    $text['author']   = '%s'; // text for an author page
    $text['404']      = '404'; // text for the 404 page
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter   = ''; // delimiter between crumbs
    $before      = '<li class="active">'; // tag before the current crumb
    $after       = '</li>'; // tag after the current crumb
    
    global $post;
    $homeLink = esc_url(home_url('/')) . '';
    $linkBefore = '<li>';
    $linkAfter = '</li>';
    $linkAttr = ' rel="v:url" property="v:title"';
    $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;
 
    if (is_home() || is_front_page()) {
 
        if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $text['home'] . '</a></div>';
 
    } else {
 
        echo '<ul class="crumb">' . sprintf($link, $homeLink, $text['home']) . $delimiter;
 
        
        if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo htmlspecialchars_decode( $cats );
            }
            echo htmlspecialchars_decode( $before ) . sprintf($text['category'], single_cat_title('', false)) . htmlspecialchars_decode( $after );
 
        } elseif( is_tax() ){
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo htmlspecialchars_decode( $cats );
            }
            echo htmlspecialchars_decode( $before ) . sprintf($text['tax'], single_cat_title('', false)) . htmlspecialchars_decode( $after );
        
        }elseif ( is_search() ) {
            echo htmlspecialchars_decode( $before ) . sprintf($text['search'], get_search_query()) . htmlspecialchars_decode( $after );
 
        } elseif ( is_day() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
            echo htmlspecialchars_decode( $before ) . get_the_time('d') . htmlspecialchars_decode( $after );
 
        } elseif ( is_month() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo htmlspecialchars_decode( $before ) . get_the_time('F') . htmlspecialchars_decode( $after );
 
        } elseif ( is_year() ) {
            echo htmlspecialchars_decode( $before ) . get_the_time('Y') . htmlspecialchars_decode( $after );
 
        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;                
                if ( get_post_type() == 'portfolio' ) {
                    printf($link, $homeLink . '' . $slug['slug'] . '/', 'Portfolio'); //Translate breadcrumb.
                }else{
                    printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                }
                if ($showCurrent == 1) echo htmlspecialchars_decode( $delimiter ) . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo htmlspecialchars_decode( $cats );
                if ($showCurrent == 1) echo htmlspecialchars_decode( $before ) . get_the_title() . $after;
            }
 
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo htmlspecialchars_decode( $before ) . $post_type->labels->singular_name . htmlspecialchars_decode( $after );
 
        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $delimiter);
            $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
            $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
            echo htmlspecialchars_decode( $cats );
            printf($link, get_permalink($parent), $parent->post_title);
            if ($showCurrent == 1) echo htmlspecialchars_decode( $delimiter ) . $before . get_the_title() . $after;
 
        } elseif ( is_page() && !$post->post_parent ) {
            if ($showCurrent == 1) echo htmlspecialchars_decode( $before ) . get_the_title() . $after;
 
        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo htmlspecialchars_decode( $breadcrumbs[$i] );
                if ($i != count($breadcrumbs)-1) echo htmlspecialchars_decode( $delimiter );
            }
            if ($showCurrent == 1) echo htmlspecialchars_decode( $delimiter ) . $before . get_the_title() . $after;
 
        } elseif ( is_tag() ) {
            echo htmlspecialchars_decode( $before ) . sprintf($text['tag'], single_tag_title('', false)) . $after;
 
        } elseif ( is_author() ) {
             global $author;
            $userdata = get_userdata($author);
            echo htmlspecialchars_decode( $before ) . sprintf($text['author'], $userdata->display_name) . $after;
 
        } elseif ( is_404() ) {
            echo htmlspecialchars_decode( $before ) . $text['404'] . $after;
        }
 
        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() );
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
 
        echo '</ul>';
 
    }
}
endif;

if ( ! function_exists( 'gocargo_pagination' ) ) :
//pagination
function gocargo_pagination($prev = '', $next = '', $pages='') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }
    $pagination = array(
        'base'          => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
        'format'        => '',
        'current'       => max( 1, get_query_var('paged') ),
        'total'         => $pages,
        'prev_text' => esc_html__('Prev', 'gocargo'),
        'next_text' => esc_html__('Next', 'gocargo'),       
        'type'          => 'list',
        'end_size'      => 3,
        'mid_size'      => 3
);
    $return =  paginate_links( $pagination );
    echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $return );
}
endif;

if ( ! function_exists( 'gocargo_custom_wp_admin_style' ) ) :
function gocargo_custom_wp_admin_style() {

        wp_register_style( 'gocargo_custom_wp_admin_css', get_template_directory_uri() . '/framework/admin/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'gocargo_custom_wp_admin_css' );

        wp_enqueue_script( 'gocargo-backend-js', get_template_directory_uri()."/framework/admin/admin-script.js", array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'gocargo-backend-js' );
}
add_action( 'admin_enqueue_scripts', 'gocargo_custom_wp_admin_style' );
endif;

if ( ! function_exists( 'gocargo_search_form' ) ) :
/* Custom form search */
function gocargo_search_form( $form ) {
    $form = '<form role="search" method="get" action="' . esc_url(home_url( '/' )) . '" >  
        <input type="search" id="search" class="search-field form-control" value="' . get_search_query() . '" name="s" placeholder="'.__('type to search&hellip;', 'gocargo').'" />
        <button id="btn-search" type="submit"></button>
        <div class="clearfix"></div>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'gocargo_search_form' );
endif;

/* Custom comment List: */
function gocargo_theme_comment($comment, $args, $depth) {    
   $GLOBALS['comment'] = $comment; ?>
   <li class="post-content-comment grey-section">
        <div class="img">
        <?php echo get_avatar($comment,$size='100',$default='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=100' ); ?>
        </div>
        <div class="comment-content">
            <h6><?php printf(__('%s','gocargo'), get_comment_author()) ?></h6>
        </div>      
        <div class="date">
            <span class="c_date"><?php the_time( get_option( 'date_format' ) ); ?></span>
            <span class="c_reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
        </div>
        <div class="comment-content">
        <?php if ($comment->comment_approved == '0'){ ?>
             <p><em><?php esc_html_e('Your comment is awaiting moderation.','gocargo') ?></em></p>
        <?php }else{ ?>
            <?php comment_text() ?>
         <?php } ?>
        </div>      
       <div class="clearfix"></div> 
    </li> 
<?php
}

// Add specific CSS class by filter
add_filter( 'body_class', 'gocargo_body_class_names' );
function gocargo_body_class_names( $classes ) {
    global $gocargo_option;

    // add 'class-name' to the $classes array
    if(isset($gocargo_option['theme_style']) and $gocargo_option['theme_style'] == 'preview3') { 
        $classes[] = 'preview3';
    }elseif (isset($gocargo_option['theme_style']) and $gocargo_option['theme_style'] == 'preview2') {
        $classes[] = 'preview2';
    }else{
        $classes[] = 'preview1';
    }    

    if($gocargo_option['topbar-switch'] != false and $gocargo_option['header_layout_wrap']=="header2"){
        $classes[] = 'header-topbar-on';
    }    

    if(isset($gocargo_option['preloader_mode']) and $gocargo_option['preloader_mode']=="preloader_logo"){
        $classes[] = 'royal_preloader';
    }
    
    // return the $classes array
    return $classes;
}

// Add specific CSS class by filter
function gocargo_header_class() {
    global $gocargo_option;

    $header_classes = array();


    if($gocargo_option['topbar-switch'] != false and $gocargo_option['header_layout_wrap']=="header2"){
        $header_classes[] = 'de_header_2';
    }

    if(isset($gocargo_option['header_layout']) and $gocargo_option['header_layout'] == 'none') {
        $header_classes[] = 'header-media-off';
    }

    if (!is_front_page()){ 
        $header_classes[] = 'overlay';
    }

    if ( is_front_page() ) {
        $header_classes[] = 'header-home';
    }

    $header_classes[] = 'menu-back cbp-af-header';

    // return the $classes array
    echo implode( ' ', $header_classes );
}