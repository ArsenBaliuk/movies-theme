<?php
$poster = get_field( 'poster' );
$rating = get_field( 'rating' );
?>
<article class="movie-poster">
    <div class="movie-poster__image">
        <?php if( $rating ) { ?>
            <div class="movie-poster__rating">
                <?php echo esc_html( $rating );?>
            </div>
        <?php }?>
        <?php
        if( $poster ) {
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
    <div class="movie-poster__title">
        <?php the_title();?>
    </div>
    <a href="<?php the_permalink();?>" class="red-border-btn">Read more</a>
</article>