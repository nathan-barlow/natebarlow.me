
<?php
/* Template Name: Share the Dream
 * Template Post Type: post, page
 */

get_header();
?>

    <div class="wrapper wrapper-narrow page-header">
        <h1><?php the_title(); ?></h1>
        <p><strong><?php echo get_the_date('F Y') ?></strong></p>
        <p>
            <?php the_excerpt(); ?>
            <a href="<? echo get_post_meta( get_the_ID(), 'website_link' )[0] ?>" target="_blank" class="button">view the project</a>
        </p>
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

<script>
    const openable_images = document.querySelectorAll(".full-screen-image");

    openable_images.forEach(function(img) {
        img.addEventListener("click", toggleImg);
    });

    function toggleImg() {
        this.classList.toggle("open");
    }
    
    function closeImg() {
        this.classList.remove("open");
    }
</script>

<?php
get_footer();
?>
