
<?php
get_header( 'home' );
?>
    <div class="wrapper grid">
        <div class="intro-text">
            <h1 class="h3 hide-float-up">
                Hello! I'm Nate Barlow.
            </h1>
            <h2 class="h1 hide-float-up">
                I design and develop responsive, accessible websites.
            </h2>

            <a class="button" href="portfolio">See My Work</a>
        </div>
        <figure class="center">
            <img src="/wp-content/uploads/2023/03/nate-bw.png" alt="emoji of me">
        </figure>
    </div>
</header>
<div id="popup-contact">
    <div class="popup-contact-contents">
        <button onclick="closePopup()"><i class="bi bi-x"></i></button>
        <h2>Welcome to my website!</h2>
        <ul>
            <li>
                <a href="https://www.linkedin.com/in/nbarlow6/" target="_blank" aria-label="LinkedIn">
                    <i class="bi bi-linkedin"></i>
                    <p>
                        <strong>Connect with me on LinkedIn</strong>
                        nbarlow6
                    </p>
                </a>
            </li>
            <li>
                <a href="mailto:nbarlow66@gmail.com" target="_blank" aria-label="Spotify">
                    <i class="bi bi-envelope"></i>
                    <p>
                        <strong>Send me an email</strong>
                        nbarlow66@gmail.com
                    </p>
                </a>
            </li>
            <li>
                <a href="https://www.facebook.com/nathanbarl0w" target="_blank" aria-label="Facebook">
                    <i class="bi bi-facebook"></i>
                    <p>
                        <strong>Follow me on Facebook</strong>
                        nathanbarl0w
                    </p>
                </a>
            </li>
            <li>
                <a href="/">Check out my website</a>
            </li>
        </ul>
    </div>
</div>
<main class="wrapper">
    <article class="grid grid-2 grid-about-me">
        <div>
            <h2 class="trail">About Me</h2>
            <p>
                Hello! My name is Nate and I recently graduated from Northeast Wisconsin Technical College with my Associate's Degree in Web Development. I found my passion for coding and designing websites in high school when I took an HTML and CSS class. I played around with it in my free time and loved seeing what I could create, so I decided to pursue it as a career. I have always been fascinated by technology, and I am eager to pursue a role where I can be challenged and continue to learn about it every day.
            </p>
            <a class="button" href="about-me">More About Me</a>
        </div>
        <figure>
            <img src="/wp-content/uploads/2023/03/chicago.jpg" alt="me in front of Chicago skyline">
        </figure>
    </article>

    <article id="portfolio" class="splide" aria-label="Portfolio Slideshow Container">
        <h2 class="trail">My Work</h2>
        <section>
            <div class="splide__arrows">
                <button
                    class="portfolio-button splide__arrow splide__arrow--prev"
                    type="button"
                    aria-label="Previous slide"
                    tabindex="0">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button
                    class="portfolio-button splide__arrow splide__arrow--next"
                    type="button"
                    aria-label="Next slide"
                    tabindex="0">
                    <i class="bi bi-chevron-right"></i>
                </button>
                <button aria-label="View all" class="portfolio-button splide__arrow" type="button" onclick="location.href='portfolio';">
                    <i class="bi bi-grid-3x3-gap-fill"></i>
                </button>
            </div>
            <div class="splide__track">
                <?php $portfolio = new WP_Query(array(
                    'post_status' => 'publish',
                    'cat' => 2,
                )); ?>
                <ol class="cards splide__list">
                    <?php if ( $portfolio->have_posts() ) :
                        while ( $portfolio->have_posts() ) : $portfolio->the_post();?>
                            <? get_template_part('template-parts/card'); ?>
                        <? endwhile; endif; ?>
                </ol>
            </div>
        </section>
    </article>

    <article hidden>
        <h2 class="trail">Services</h2>
        <div class="grid grid-4 cards">
            <div class="card center hide-float-up stagger-inline">
                <i class="bi bi-circle-square"></i>
                <h3>Web Design</h3>
                <p>
                    I’ll create a website design file for each of your web pages.
                </p>
            </div>
            <div class="card center hide-float-up stagger-inline">
                <i class="bi bi-code-slash"></i>
                <h3>Web Development</h3>
                <p>
                    I’ll create a custom website using your existing design files.
                </p>
            </div>
            <div class="card center hide-float-up stagger-inline">
                <i class="bi bi-wordpress"></i>
                <h3>Full Website</h3>
                <p>
                    I’ll create a custom WordPress theme that represents your brand.
                </p>
            </div>
            <div class="card center hide-float-up stagger-inline">
                <i class="bi bi-window"></i>
                <h3>Website Management</h3>
                <p>
                    I’ll host your website and provide updates and maintenance.
                </p>
            </div>
        </div>
        <div class="center">
            <a class="button" href="services">View All Services</a>
        </div>
    </article>
</main>

<script src="/wp-content/themes/natebarlow-portfolio/js/splide.min.js"></script>

<script>
    // LOADING SCREEN
    /*if (!sessionStorage.getItem('shown')) {
        document.onreadystatechange = function() {
            if (document.readyState == "complete") {
                document.querySelector("#loading").classList.toggle("clear");
                sessionStorage.setItem('shown', true);
            }
        };
    } else {
        document.querySelector("#loading").style.visibility = "hidden";
    }*/

    var toggle = document.getElementById("nav-main-menu-toggle");

    document.addEventListener('keydown', evt => {
        if (evt.key === 'Escape') {
            if(toggle.checked = true) {
                toggle.checked = false;
            }
        }
    });


    // SPLIDE
    var splide = new Splide( '#portfolio', {
        type   : 'loop',
        perPage: 2,
        perMove: 1,
        gap: '20px',
        speed: 800,
        easing: 'cubic-bezier(.8,0,.2,1)',
    } );

    splide.mount();


    // CONTACT POPUP
    var popup = document.getElementById('popup-contact');
    var popupContent = document.querySelector('.popup-contact-contents');
    var url = new URL(
        window.location.href
    );

    function closePopup() {
        popup.style.display = 'none';
        popupContent.classList.remove('zoom-in');
        popupContent.classList.add('zoom-out');
    }

    function openPopup() {
        popup.style.display = 'flex';
        popupContent.classList.remove('zoom-out');
        popupContent.classList.add('zoom-in');
    }

    window.addEventListener('DOMContentLoaded', () => {
        if(url.search == "?business-card") {
            openPopup();
        }
    });

    popup.addEventListener("click", function () {
        closePopup();
    });
    popupContent.addEventListener("click", function (ev) {
        ev.stopPropagation();
    });

    document.addEventListener('keydown', evt => {
        if(evt.key === 'Escape') {
            closePopup();
        }
    });

</script>

<?php
get_footer();
?>
