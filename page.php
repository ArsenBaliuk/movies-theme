<?php get_header(); ?>

    <section>

        <div class="container">

            <div>

                <?php if (have_posts()): ?>

                    <?php while (have_posts()): ?>

                        <?php the_post(); ?>

                        <h1><?php the_title(); ?></h1>

                        <?php the_content(); ?>

                    <?php endwhile; ?>

                <?php endif; ?>

            </div>

        </div>

    </section>

<?php get_footer(); ?>