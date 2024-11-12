<?php
/**
 * Template Name: Archive
 */
?>
<?php get_header(); ?>

<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'order' => 'DESC',
//     'orderby' => 'menu_order',
);

$query = new WP_Query( $args );
?>



<?php if( $query->have_posts()): ?>
    <section class="all-posts">
        <div class="all-posts__title title">
            <h1><?php echo 'Всі публікації';?></h1>
        </div>
        <div class="news-list">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>



                <?php $news_img_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>

                <div class="news-list__single-news">
					<a href="<?php the_permalink(); ?>" class="news-list__single-news-link"></a>
                    <div class="news-list__single-img">
                        <?php the_post_thumbnail( 'large', $news_img_alt );?>
                    </div>
                    <div class="news-list__single-info">
                        <div class="news-list__single-title">
                            <?php the_title();?>
                        </div>
                        <div class="news-list__single-description">
                            <?php the_content();?>
                        </div>
                        <div class="news-list__read-more-btn"><?php echo 'Читати більше'?></div>
                    </div>
                </div>



        <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>
