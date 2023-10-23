
<?php
get_header();
?>

    <div class="wrapper page-header">
        <h1><?php the_title(); ?>heller</h1>
        <p><strong><?php echo get_the_date('F Y') ?></strong></p>
        <p>
            <?php the_excerpt(); ?>
            <a href="<? echo get_post_meta( get_the_ID(), 'website_link' )[0] ?>" target="_blank" class="button">view the project</a>
        </p>
    </div>
</header>
<main>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <div class="wrapper blog">
        <section>
            <figure>
                Christmas
                <?php the_post_thumbnail('card-large'); ?>
            </figure>
            
            <?php $posttags = get_the_tags();
            foreach($posttags as $tag) {
                echo '<li class="' . $tag->slug . '"><a href="/tag/' . $tag->slug . '">' .$tag->name. '</a></li>'; 
            } ?>
            <?php the_content(); ?>
        </section>
        <?php endwhile; else: endif; ?>
    </div>
</main>

<?php
get_footer();
?>
