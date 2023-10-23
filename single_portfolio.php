
<?php
/* Template Name: Portfolio
 * Template Post Type: post
 */

get_header();
?>

    <div class="wrapper wrapper-narrow page-header">
        <h1><?php the_title(); ?></h1>
        <p><strong><?php echo get_the_date('F Y') ?></strong></p>
        <?php the_excerpt(); 
            $website = get_post_meta( get_the_ID(), 'website_link' )[0];
            $github = get_post_meta( get_the_ID(), 'github_link' )[0];
        ?>
        <div class="buttons">
            <a href="<? echo get_post_meta( get_the_ID(), 'website_link' )[0] ?>" target="_blank" class="button">View Website</a>
            <?php if($github) : ?>
            <a href="<? echo $github; ?>" target="_blank" class="button">
                <i class="bi bi-github"></i>&nbsp;
                View on GitHub
            </a>
            <?php endif; ?>
        </div>
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
