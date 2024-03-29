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
    <meta name="description" content="I'm an experienced front-end web developer and designer based in Appleton, WI with experience developing custom WordPress websites for small businesses.">

    <!--Google font (outfit)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,100..900;1,100..900&family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons + Splide -->
    <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" as="style" href="/wp-content/themes/natebarlow-portfolio/css/splide-core.min.css" onload="this.onload=null;this.rel='stylesheet'">

    <noscript>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="/wp-content/themes/natebarlow-portfolio/css/splide-core.min.css">
    </noscript>

    <script defer type="application/ld+json">
        {
            "@context" : "https://natebarlow.me",
            "@type" : "WebSite",
            "name" : "Nate Barlow",
            "url" : "https://natebarlow.me/"
        }
    </script>

    <?php wp_head(); ?>

    <!-- <style>
        /* LOADING SCREEN */
        #loading {
            position: fixed;
            height: 100vh;
            width: 100vw;
            background: rgba(0,0,0,1);
            z-index: 1000;
            transition: .5s;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #loading > * {
            opacity: .5;
        }

        #loading img {
            position: fixed;
        }

        circle {
            fill: transparent;
            stroke-dasharray: 400;
            stroke-dashoffset: 20;
            transform-origin: center;
            animation: clock-animation 1s linear infinite;
        }

        @keyframes clock-animation {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        #loading.clear {
            transform: translateY(-100%);
            opacity: 0;
            text-align: center;
        }
    </style> -->
</head>

<body <?php body_class(); ?>>
    <!--<div id="loading">
        <img src="/wp-content/themes/natebarlow-portfolio/images/logo.png" height="40px" alt="nb logo">
        <svg height="200" width="200">
            <circle cx="100" cy="100" r="80" stroke="#d1fff6" stroke-width="5" fill="none" stroke-linecap="round"/>
        </svg>
    </div>-->
    <header class="home-header">
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
                <button class="theme"></button>
            </div>
        </nav>