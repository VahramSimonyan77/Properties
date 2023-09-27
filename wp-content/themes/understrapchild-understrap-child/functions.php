<?php 
/* Child theme generated with WPS Child Theme Generator */
            
if ( ! function_exists( 'b7ectg_theme_enqueue_styles' ) ) {            
    add_action( 'wp_enqueue_scripts', 'b7ectg_theme_enqueue_styles' );
    
    function b7ectg_theme_enqueue_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'parent-style' ) );
    }
}

function create_property_object_post_type() {
    $labels = array(
        'name' => 'Property Objects',
        'singular_name' => 'Property Object',
        'menu_name' => 'Property Objects',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Property Object',
        'edit_item' => 'Edit Property Object',
        'new_item' => 'New Property Object',
        'view_item' => 'View Property Object',
        'search_items' => 'Search Property Objects',
        'not_found' => 'No Property Objects found',
        'not_found_in_trash' => 'No Property Objects found in Trash',
        'parent_item_colon' => '',
        'all_items' => 'All Property Objects',
        'archives' => 'Property Object Archives',
        'insert_into_item' => 'Insert into Property Object',
        'uploaded_to_this_item' => 'Uploaded to this Property Object',
        'featured_image' => 'Featured Image',
        'set_featured_image' => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image' => 'Use as featured image',
        'filter_items_list' => 'Filter Property Objects list',
        'items_list_navigation' => 'Property Objects list navigation',
        'items_list' => 'Property Objects list',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'property-object'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-building', // You can change the icon
    );

    register_post_type('property-object', $args);
}

add_action('init', 'create_property_object_post_type');

function enqueue_ajax_script() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/custom.js', array('jquery'), '1.0', true);
	wp_localize_script('custom-script', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'enqueue_ajax_script');


function filter_houses() {
    $number_of_floors = $_POST['number_of_floors'];
    $building_type = $_POST['building_type'];

    $house_list_html = generate_house_list($number_of_floors, $building_type);

    echo $house_list_html;

    wp_die();
}

add_action('wp_ajax_filter_houses', 'filter_houses');
add_action('wp_ajax_nopriv_filter_houses', 'filter_houses');

function generate_house_list($number_of_floors, $building_type) {
    // Create an empty array to store the HTML for each house
    $house_html = array();

    $args = array(
        'post_type' => 'property-object', 
        'posts_per_page' => -1, // Retrieve all posts
    );

    if (!empty($number_of_floors)) {
        $args['meta_query'][] = array(
            'key' => 'number_of_floors',
            'value' => $number_of_floors,
            'compare' => '=', // Exact match
            'type' => 'NUMERIC',
        );
    }

    if (!empty($building_type)) {
        $args['meta_query'][] = array(
            'key' => 'type_of_building',
            'value' => $building_type,
            'compare' => '=', // Exact match
        );
    }

    $house_query = new WP_Query($args);

    // Check if there are any posts
    if ($house_query->have_posts()) {
        while ($house_query->have_posts()) {
            $house_query->the_post();

            $house_name = get_field('house_name');
			$property_image = get_field('property_image');
			$location_coordinates = get_field('location_coordinates');
            
            $house_html[] = '<div class="house-item">';
            $house_html[] = '<h3>' . esc_html($house_name) . '</h3>';
			$house_html[] = '<p><a href="https://35.229.218.90/">' . esc_html($location_coordinates) . '</a></p>';
			$house_html[] = '<img src="' . explode('http:', esc_url($property_image['url']))[1] . '" alt="' . esc_attr($house_name) . '">';
            $house_html[] = '</div>';
        }

        wp_reset_postdata();
    } else {
        $house_html[] = '<p>No houses match the selected criteria.</p>';
    }

    return implode('', $house_html);
}