<?php
get_header(); ?>

	<div class="error-404 not-found default-max-width">
		<div class="page-content">
            <h1 class="page-title">404</h1>
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>

<?php
get_footer();
