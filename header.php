<?php
    if (!empty($_COOKIE['theme'])){
        if ($_COOKIE['theme'] == 'light') {
            $theme = "light";
        } else if ($_COOKIE['theme'] == 'dark') {
            $theme = "dark";
        }
    }
?>

<!DOCTYPE html>
<html <?php language_attributes();
            if($theme) {echo 'color-scheme = "' . $theme . '"';} ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="application-name" content="Nate Barlow">
    <meta name="description" content="I'm a front-end web developer and designer with experience developing custom WordPress themes.">

    <!--Google font (outfit)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <nav>
            <div class="header-content">
                <a class="header-link" href="<?php echo esc_url(home_url()) ?>">
                    <img
                        id="custom-header"
                        src="<?php echo get_custom_header()->url; ?>"
                        height="<?php echo get_custom_header()->height; ?>"
                        width="<?php echo get_custom_header()->width; ?>"
                        alt="<?php bloginfo( 'description' ); ?>"
                    >
                </a>
            </div>

            <input aria-label="mobile nav toggle" type="checkbox" class="nav-main-menu-toggle" id="nav-main-menu-toggle">
            <label class="nav-main-menu-toggle-icon" for="nav-main-menu-toggle">
                <span></span>
            </label>

            <div class="nav-main-drawer">
                <!-- Main Menu -->
                <?php
                    $nav_main_header_top = array(
                        'theme_location' => 'nav-main-header-top',
                        'container_class' => 'nav-main',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 2
                    );
                    wp_nav_menu( $nav_main_header_top );
                    get_template_part( 'template-parts/social-links' );
                ?>
                <button class="theme">
                    <i></i>
                </button>
            </div>

            <script>
                var toggle = document.getElementById("nav-main-menu-toggle");

                document.addEventListener('keydown', evt => {
                    if (evt.key === 'Escape') {
                        if(toggle.checked = true) {
                            toggle.checked = false;
                        }
                    }
                });
            </script>
        </nav>