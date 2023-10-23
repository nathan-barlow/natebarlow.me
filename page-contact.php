<?php
get_header();
?>
</header>
<main class="center wrapper">
    <section class="contact">
        <h1>Get in Touch</h1>
        <p>
            My inbox is always open. I am currently looking for web design and development projects to build my portfolio.
        </p>
        <?php get_template_part('template-parts/social-links')?>
        <p>
            <a class="button" href="mailto:nate@natebarlow.me">nate@natebarlow.me</a>
        </p>
        <?php get_template_part('template-parts/contact-form'); ?>
        <?php the_content(); ?>
    </section>

</main>

<?php
get_footer();
?>
