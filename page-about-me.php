
<?php
get_header();
?>

    <div class="wrapper page-header">
        <h1>A little bit about me.</h1>
    </div>
</header>
<main>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <div class="wrapper about-me">
        <section>
            <?php the_content(); ?>
        </section>
        <?php endwhile; else: endif; ?>
    </div>
</main>

<?php
get_footer();
?>
