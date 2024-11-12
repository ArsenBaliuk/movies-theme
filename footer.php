        </main>
	<footer class="footer">
        <div class="footer__container">

                <?php if ( has_nav_menu( 'FooterMenu' ) ) : ?>
                    <nav class="footer-navigation">
                        <ul class="footer-navigation-wrapper">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'FooterMenu',
                                    'items_wrap'     => '%3$s',
                                    'container'      => false,
                                    'depth'          => 1,
                                    'link_before'    => '<span>',
                                    'link_after'     => '</span>',
                                    'fallback_cb'    => false,
                                )
                            );
                            ?>
                        </ul>
                    </nav>
                <?php endif; ?>

        </div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
