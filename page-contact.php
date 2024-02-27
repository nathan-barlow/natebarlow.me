<?php
get_header();
?>
</header>
<main class="center wrapper">
    <section class="contact">
        <h1>Get in Touch</h1>
        <p>
            My inbox is always open. Feel free to reach out with your project requirements, and I'll be happy to discuss how I can contribute to your success. 
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
