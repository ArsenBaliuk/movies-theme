<?php
/**
 * Movie list sorting and filtering function
 *
 */
function ajax_sort_movies() {

    check_ajax_referer('load_more_nonce', 'nonce'); //Checking security of AJAX requests

    $page = isset( $_POST['page'] ) ? $_POST['page'] : 1; // Paged
    $offset = isset( $_POST['offset'] ) ? $_POST['offset'] : 3; //Start showing from...
    $sort_by = isset ($_POST['sort_by'] ) ? $_POST['sort_by'] : 'date'; // Sorting type: date / rating

    $genre = isset( $_POST['genre'] )  ? $_POST['genre'] : ''; //Option to filter by genre

    $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : ''; //The starting date for filtering
    $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : ''; //End date for filtering

    $args = array(
        'post_type' => 'movies',
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'order' => 'DESC',
        'offset' => $offset,
        'paged' => $page,
//        'meta_query' => array()
    );

    if ( $sort_by === 'rating' ) {
        $args['meta_key'] = 'rating';
        $args['orderby'] = 'meta_value_num';
    } else {
        $args['meta_key'] = 'release_date';
        $args['orderby'] = 'meta_value';
    }

    if( $genre && $genre !== 'all' ) {
        $args['tax_query'][] = [
            'taxonomy' => 'movies_category',
            'field' => 'slug',
            'terms' => $genre
        ];
    }

    if ( $start_date || $end_date ) {
        $date_meta_query = array(
            'key' => 'release_date',
            'compare' => 'BETWEEN',
            'type' => 'DATE'
        );

        if ( $start_date ) {
            $date_meta_query['value'][] = $start_date . '-01-01';
        } else {
            $date_meta_query['value'][] = '2000-01-01'; // Дефолтна рання дата
        }

        if ($end_date) {
            $date_meta_query['value'][] = $end_date . '-12-31';
        } else {
            $date_meta_query['value'][] = date('Y-m-d'); // Дефолтна пізня дата
        }

        $args['meta_query'][] = $date_meta_query;
    }

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post();

            get_template_part( '/parts/movies-blog/movie' );

        endwhile; wp_reset_postdata();
    else :
        wp_send_json_error( 'No more movies' );
    endif;

    wp_die();
}

add_action( 'wp_ajax_ajax_sort_movies', 'ajax_sort_movies' ); // for authorized users
add_action( 'wp_ajax_nopriv_ajax_sort_movies', 'ajax_sort_movies' ); // for unauthorized users
