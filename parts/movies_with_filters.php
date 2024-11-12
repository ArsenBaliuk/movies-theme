<?php
$color_highlighted_text = get_sub_field( 'color_highlighted_text' ) ?: '#ff902b';
$title = get_sub_field( 'title' );
$title = str_replace("{", "<span style='color: {$color_highlighted_text};'>", $title);
$title = str_replace("}", "</span>", $title);



$terms = get_terms( [
    'taxonomy' => ['movies_category'],
    'hide_empty' => true,
] );

$query = new WP_Query( [
    'post_type' => 'movies',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'order' => 'DESC',
    'orderby' => 'rating'
] );

?>
<section class="movies-with-filters">
    <div class="container">
        <div class="row">
            <div class="movies-with-filters__title">
                <h2><?php echo $title;?></h2>
            </div>
        </div>


        <div class="movies-with-filters__row-with-filters">
            <aside>
                <div class="filters">
                    <div class="filters__title">Filter:</div>

                    <div class="filters__parameters">
                        <div class="filters__genre-filter">
                            <label for="genre" class="filters__param-title">Genre:</label>
                            <select name="" id="genre" class="genre-filter__list filters__param-items">
                                <option value="all">All</option>
                                <?php foreach ( $terms as $term ):
                                    $term_slug = $term->slug;
                                    $term_name = $term->name;
                                    ?>
                                    <option value="<?php echo $term_slug; ?>"><?php echo $term_name; ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="date-from">
                            <span class="filters__param-title">Date from:</span>
                            <div class="filters__date-from">
                                <select class="filters__param-items" id="start_date">
                                    <option value="2000">2000</option>
                                    <option value="2001">2001</option>
                                    <option value="2002">2002</option>
                                    <option value="2003">2003</option>
                                    <option value="2004">2004</option>
                                    <option value="2005">2005</option>
                                    <option value="2006">2006</option>
                                    <option value="2007">2007</option>
                                    <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                </select>

                                <span>to</span>

                                <select class="filters__param-items" id="end_date">
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                </select>

                            </div>
                        </div>

                    </div>

                    <div class="button-block filters__button-block">
                        <button class="brown-btn brown-btn--centered" id="apply_filters">Apply</button>
                    </div>
                </div>
            </aside>
            <div class="movies-with-filters__inner-films">
                <div class="movies-with-filters__sort-by">
                    <label for="sort_by" class="movies-with-filters__sort-title">Sort by:</label>
                    <select id="sort_by" class="movies-with-filters__param-items">
                        <option value="date">Date</option>
                        <option value="rating">Rating</option>
                    </select>
                </div>

                <div class="movies-with-filters__preview" id="load_more_container">
                    <?php if($query->have_posts()):
                         while($query->have_posts() ) : $query->the_post();

                             get_template_part('/parts/movies-blog/movie');

                         endwhile; wp_reset_postdata();
                    endif;?>
                </div>

                <button id="load_more" class="brown-btn movies-with-filters__brown-btn">Load More</button>
            </div>
        </div>
    </div>
</section>