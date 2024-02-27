
<?php
/* Template Name: Portfolio
 * Template Post Type: post
 */

get_header();

$website = get_post_meta( get_the_ID(), 'website_link' )[0];
$github = get_post_meta( get_the_ID(), 'github_link' )[0];
$testimonial = get_post_meta( get_the_ID(), 'testimonial' )[0];
?>

    <div class="wrapper wrapper-narrow page-header">
        <h1><?php the_title(); ?></h1>
        <p><i class="bi bi-calendar mr-sm"></i><strong><?php echo get_the_date('F Y') ?></strong></p>
        <?php the_excerpt(); ?>
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
            <?php if($testimonial) : ?>
            <article class="testimonial">
                <p>
                    <? echo $testimonial ?>
                </p>
            </article>
            <?php endif; ?>
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
    </div>

    <div class="wrapper">
        <section>
            <div class="jumbotron">
                <h2>Why should you hire me?</h2>
                <p>I am a motivated, detail-oriented working who can deliver quality work in a fast-paced and deadline-driven environment. I’m also a quick learner and have a tendency to exceed expectations. If you put me in charge of your website, I won’t stop until you are satisfied with the final product.</p>
                <div class="buttons center">
                    <a href="/about-me" class="button">More about me</a>
                    <a href="/services" class="button button-secondary">See what I have to offer</a>
                </div>
            </div>
        </section>
    </div>

    <?php endwhile; else: endif; ?>
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
