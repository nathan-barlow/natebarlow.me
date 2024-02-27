
<?php
get_header();
?>

    <div class="wrapper wrapper-narrow page-header">
        <h1><?php the_title(); ?></h1>
        <p><strong><?php echo get_the_date('F Y') ?></strong></p>
    </div>
</header>
<main>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <div class="wrapper wrapper-narrow blog">
        <section>
            <figure>
                <?php the_post_thumbnail('card-large'); ?>
            </figure>
            
            <ul class="tags portfolio-tags">
                <?php $posttags = get_the_tags();
                foreach($posttags as $tag) {
                    echo '<li class="' . $tag->slug . '"><a href="/tag/' . $tag->slug . '">' .$tag->name. '</a></li>'; 
                } ?>
            </ul>
            <?php the_content(); ?>
        </section>
        <?php endwhile; else: endif; ?>
    </div>
</main>

<?php
get_footer();
?>
