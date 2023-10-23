
<?php
get_header();
?>

    <div class="wrapper page-header">
        <h1><?php the_title(); ?></h1>
    </div>
</header>
<main class="wrapper">
    <section>
        <p>
            Do you need a website for yourself or your business? Do you need a developer to update your existing website? Are you looking to hire a web developer to manage your current website? You’re in luck! Check out the following services I offer and contact me&mdash;I’d love to work with you!
        </p>

        <article class="grid grid-services" id="web-design">
            <div class="services-icon">
                <i class="bi bi-circle-square"></i>
            </div>
            <div class="services-text">
                <h3>Web Design</h3>
                <p>
                    I’ll work with you to create a website design for each of the pages you’ll need for your website. You’ll play an active role in choosing the design and can easily let me know what you like and don’t like. You can send these files to your developer for them to create your website.
                </p>
                <p>
                    *This does not include a working website&mdash;only static files for you to send to your developer.
                </p>
                <a class="button" href="contact">Get a Web Design Quote</a>
            </div>
        </article>
        <article class="grid grid-services" id="web-development">
            <div class="services-icon">
                <i class="bi bi-code-slash"></i>
            </div>
            <div class="services-text">
                <h3>Web Development</h3>
                <p>
                    Do you already have website design files? I’ll create a custom HTML or WordPress website based on that design that looks good and functions well on every device. We will meet to discuss any extra functionality you need: including social media integration, blog, and other custom functions. I’ll make sure the site follows best accessibility and SEO standards.
                </p>
                <a class="button" href="contact">Get a Web Development Quote</a>
            </div>
        </article>
        <article class="grid grid-services" id="full-website">
            <div class="services-icon">
                <i class="bi bi-wordpress"></i>
            </div>
            <div class="services-text">
                <h3>Full Website</h3>
                <p>
                    Starting from scratch or fully overhauling your current website? I’ll meet with you to discuss your business needs and do market research to determine the design and functionality you’ll need for your site. Once we’ve determined a design, I’ll develop a custom WordPress template for your site that looks good and functions well on every device. I’ll make sure the site follows best accessibility and SEO standards.
                </p>
                <a class="button" href="contact">Get a Full Website Quote</a>
            </div>
        </article>
        <article class="grid grid-services" id="web-design">
            <div class="services-icon">
                <i class="bi bi-window"></i>
            </div>
            <div class="services-text">
                <h3>Website Hosting and Maintenance</h3>
                <p>
                    Have an existing website or website files created by a developer? I’ll handle hosting, maintenance, and any updates you request.
                </p>
                <a class="button" href="contact">Get a Web Hosting Quote</a>
            </div>
        </article>
    </section>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div>
        <section>
            <?php the_content(); ?>
        </section>
        <?php endwhile; else: endif; ?>
    </div>
</main>

<?php
get_footer();
?>
