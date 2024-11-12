<?php $background_color = get_sub_field( 'background_color' ) ?: 'transparent';?>
<section class="content-side-image" style="background-color: <?php echo $background_color;?>;">
    <div class="container">
        <div class="content-side-image__inner">

            <?php if( have_rows( 'content' ) ) :
                while( have_rows( 'content' ) ): the_row();
                    $color_highlighted_text = get_sub_field( 'color_highlighted_text' ) ?: '#ff902b';
                    $title = get_sub_field( 'title' );
                    $title = str_replace("{", "<span style='color: {$color_highlighted_text};'>", $title);
                    $title = str_replace("}", "</span>", $title);
                    $subtitle = get_sub_field( 'subtitle' );
                    $registration_button = get_sub_field( 'registration_button' );
                    $any_link_button = get_sub_field( 'any_link_button' ); ?>

                    <div class="content-side-image__content">
                        <div class="content-side-image__title">
                            <h2><?php echo $title;?></h2>
                        </div>
                        <div class="content-side-image__subtitle">
                            <?php echo $subtitle;?>
                        </div>
                        <div class="buttons-block">
                            <?php if( $registration_button ) { ?>
                                <a href="<?php echo $registration_button['url'];?>" target="<?php echo $registration_button['target'] ?: '_self' ;?>" class="brown-btn"><?php echo $registration_button['title'];?></a>
                            <?php }?>
                            <?php if( $any_link_button ) { ?>
                                <a href="<?php echo $any_link_button['url'];?>" target="<?php echo $any_link_button['target'] ?: '_self' ;?>" class="default-btn"><?php echo $any_link_button['title'];?></a>
                            <?php }?>
                        </div>
                    </div>

            <?php endwhile;
            endif;?>

            <div class="content-side-image__image-block">
                <?php
                $image = get_sub_field( 'image' );

                if( $image ) {
                    $image_url = $image['url'];
                    $image_id = $image['ID'];
                    $image_srcset = wp_get_attachment_image_srcset( $image_id );
                    $image_sizes = wp_get_attachment_image_sizes( $image_id );
                    $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );?>

                    <img
                         class="content-side-image__image"
                         src="<?php echo esc_url( $image_url ); ?>"
                         data-src="<?php echo esc_url( $image_url ); ?>"
                         data-srcset="<?php echo esc_attr( $image_srcset ); ?>"
                         data-sizes="<?php echo esc_attr( $image_sizes ); ?>"
                         alt="<?php echo esc_attr( $image_alt ?: 'General image' );?>"
                         width="526" height="416">
                <?php }?>
            </div>
        </div>
    </div>
</section>