<?php

/**
 * Register meta boxes
 *
 * @since 1.0
 *
 * @param array $meta_boxes
 *
 * @return array
 */

function gocargo_register_meta_boxes( $meta_boxes ) {

	$prefix = '_cmb_';
	$meta_boxes[] = array(
		'id'       => 'format_detail',
		'title'    => esc_html__( 'Format Details', 'gocargo' ),
		'pages'    => array( 'post' ),
		'context'  => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields'   => array(
			array(
				'name'             => esc_html__( 'Image', 'gocargo' ),
				'id'               => $prefix . 'image',
				'type'             => 'image_advanced',
				'class'            => 'image',
				'max_file_uploads' => 1,
			),
			array(
				'name'  => esc_html__( 'Gallery', 'gocargo' ),
				'id'    => $prefix . 'images',
				'type'  => 'image_advanced',
				'class' => 'gallery',
			),
			array(
				'name'  => esc_html__( 'Quote', 'gocargo' ),
				'id'    => $prefix . 'quote',
				'type'  => 'textarea',
				'cols'  => 20,
				'rows'  => 2,
				'class' => 'quote',
			),
			array(
				'name'  => esc_html__( 'Author', 'gocargo' ),
				'id'    => $prefix . 'quote_author',
				'type'  => 'text',
				'class' => 'quote',
			),
			array(
				'name'  => esc_html__( 'Audio', 'gocargo' ),
				'id'    => $prefix . 'link_audio',
				'type'  => 'oembed',
				'cols'  => 20,
				'rows'  => 2,
				'class' => 'audio',
				'desc' => 'Ex: https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/139083759',
			),
			array(
				'name'  => esc_html__( 'Video', 'gocargo' ),
				'id'    => $prefix . 'link_video',
				'type'  => 'oembed',
				'cols'  => 20,
				'rows'  => 2,
				'class' => 'video',
				'desc' => 'Example: <b>http://www.youtube.com/embed/0ecv0bT9DEo</b> or <b>http://player.vimeo.com/video/47355798</b>',
			),			
		),
	);

	$meta_boxes[] = array(
		'id'       => 'page_settings',
		'title'    => esc_html__( 'Page Settings', 'gocargo' ),
		'pages'    => array( 'page', 'post', 'service' ),
		'context'  => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields'   => array(	
			array(
				'name'             => esc_html__( 'Upload background image for top detail page.', 'gocargo' ),
				'desc' => 'if not upload image, it is use image default for all page setup in theme option.',
				'id'               => $prefix . 'subheader_image',
				'type'             => 'image_advanced',			
				'max_file_uploads' => 1,
			),	
			array(
                'name' => 'Add SubTitle',
                'desc' => 'Enter subtitle for detail page, leave a blank do not show.',
                'id'   => $prefix . 'page_subtitle',
                'type' => 'textarea',
            ),		
		),

	);
	$meta_boxes[] = array(
		'id'         => 'job_testimonial',
		'title'      => 'Testimonials Details',
		'pages'      => array( 'testimonial' ), // Post type
		'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
		//'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
		'fields' => array(
			array(
                'name' => 'Job',
                'desc' => 'Job of Person',
                'id'   => $prefix . 'job_testi',
                'type' => 'text',
            ),
            array(
                'name' => 'Company',
                'desc' => 'Company of Person',
                'id'   => $prefix . 'company_testi',
                'type' => 'text',
            ),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'careers_setting',
		'title'      => 'Careers Details',
		'pages'      => array( 'career' ), // Post type
		'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
		//'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
		'fields' => array(
			array(
				'name'             => esc_html__( 'Upload background image for top detail page.', 'gocargo' ),
				'desc' => 'if not upload image, it is use image default for all page setup in theme option.',
				'id'               => $prefix . 'subheader_image',
				'type'             => 'image_advanced',			
				'max_file_uploads' => 1,
			),	
			array(
                'name' => 'Add SubTitle',
                'desc' => 'Enter subtitle for detail page, leave a blank do not show.',
                'id'   => $prefix . 'page_subtitle',
                'type' => 'textarea',
            ),
			array(
                'name' => 'Business Sector:',
                'desc' => 'Add Business Sector',
                'id'   => $prefix . 'business_sector',
                'type' => 'text',
            ),
            array(
                'name' => 'End Date:',
                'desc' => 'Add End Date',
                'id'   => $prefix . 'end_date',
                'type' => 'date',
                'format' => 'M dd yy'
            ),
            array(
                'name' => 'Description:',
                'desc' => 'Add Description',
                'id'   => $prefix . 'desc_career',
                'type' => 'textarea',
            ),
            array(
                'name' => 'Link button Apply Now.',
                'desc' => 'Add Link to contact page.',
                'id'   => $prefix . 'link_apply',
                'type' => 'text',
            ),            
		)
	);

	$meta_boxes[] = array(
		'id'         => 'founder_setting',
		'title'      => 'Founder Details',
		'pages'      => array( 'founder' ), // Post type
		'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
		//'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
		'fields' => array(
			array(
                'name' => 'Job',
                'desc' => 'Job of Person',
                'id'   => $prefix . 'job_founder',
                'type' => 'text',
            ),            
		)
	);

	$meta_boxes[] = array(
		'id'         => 'service_setting',
		'title'      => 'Service Details',
		'pages'      => array( 'service' ), // Post type
		'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
		//'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
		'fields' => array(
			array(
                'name' => 'Add icon for service',
                'desc' => 'Find icon class name here : https://fontawesome.com/v4.7.0/ , Icon show in : Element OT Service Grid 2, Element OT Service Grid 3',
                'id'   => $prefix . 'icon_service',
                'type' => 'text',
            ),
			array(
                'name' => 'Select service background color',
                'desc' => 'Use service background color in Element OT Service Grid 4',
                'id'   => $prefix . 'color_service',
                'type' => 'color',
            ),
		)
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'gocargo_register_meta_boxes' );

