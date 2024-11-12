<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" type="image/png">

<!--    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>-->

<!-- Swiper slider CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Swiper slider CDN – End -->

    <?php wp_head(); ?>

</head>

<?php
$site_logo = get_field( 'site_logo', 'options' );
$text_near_site_logo = get_field( 'text_near_site_logo', 'options' );
if ( $site_logo ) {
    $site_logo_url = $site_logo['url'];
    $site_logo_alt = get_post_meta( $site_logo['ID'], '_wp_attachment_image_alt', true );
}
$full_name_organization = get_field( 'full_name_organization', 'options' );
?>

<body <?php body_class(); ?>>
<?php

?>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <a href="<?php echo get_home_url(); ?>" class="header__logo">

                    <?php if( $site_logo ) { ?>
                        <img
                            src="<?php echo esc_url( $site_logo_url ); ?>"
                            alt="<?php echo esc_attr( $site_logo_alt ?: 'Site logo' );?>"
                            width="39" height="32">
                    <?php }?>

                    <?php if( $text_near_site_logo ) { ?>
                        <span class="header__logo-title"><?php echo esc_html( $text_near_site_logo );?></span>
                    <?php }?>

                </a>

                <button class="mobile-menu-btn" id="mobile_menu_btn">
                    <span class="mobile-menu-btn-line"></span>
                    <span class="mobile-menu-btn-line"></span>
                    <span class="mobile-menu-btn-line"></span>
                </button>

                <nav class="header__menu-wrapper menu-wrapper" id="menu_wrapper">
                    <?php wp_nav_menu( [
                        'theme_location'  => 'headerMenu',
                        'container'       => '',
                        'echo'            => true,
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',

                    ] ); ?>
                </nav>
            </div>
        </div>
    </header>

    <main>