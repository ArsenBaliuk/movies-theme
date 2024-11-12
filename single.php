<?php get_header(); ?>
<?php
$poster = get_field( 'poster' );
$rating = get_field( 'rating' );
$release_date = get_field( 'release_date' );

$terms = get_the_terms( get_the_ID(), 'movies_category' );

?>

    <article class="single-movie">
        <div class="container">
            <div class="single-movie__inner">
                <div class="single-movie__general-image">
                    <?php if( $poster ) {
                        $poster_url = $poster['url'];
                        $poster_id = $poster['ID'];
                        $poster_srcset = wp_get_attachment_image_srcset( $poster_id );
                        $poster_sizes = wp_get_attachment_image_sizes( $poster_id );
                        $poster_alt = get_post_meta( $poster_id, '_wp_attachment_image_alt', true );?>
                        <img class=""
                             src="<?php echo esc_url( $poster_url ); ?>"
                             data-src="<?php echo esc_url( $poster_url ); ?>"
                             data-srcset="<?php echo esc_attr( $poster_srcset ); ?>"
                             data-sizes="<?php echo esc_attr( $poster_sizes ); ?>"
                             alt="<?php echo esc_attr( $poster_alt ?: 'Movie poster' );?>"
                             width="260" height="427" >
                    <?php } else { ?>
                        <img src="" alt="Movie poster">
                    <?php }?>
                </div>

                <div class="single-movie__info">
                    <div class="single-movie__title">
                        <h1><?php the_title();?></h1>
                        <span class="single-movie__rating"><?php echo $rating;?></span>
                    </div>
                    <div class="single-movie__release-date"><?php echo '<strong>Release date: </strong>' . $release_date;?></div>
                    <div class="single-movie__genre">
                        <div class="single-movie__genre-title">
                            <strong>Genre:</strong>
                        </div>
                        <div class="single-movie__genre-list">
                            <?php foreach ( $terms as $term ):
                                $term_name = $term->name;
                                ?>
                                <span><?php echo $term_name . '; '; ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </article>

<?php get_footer(); ?>