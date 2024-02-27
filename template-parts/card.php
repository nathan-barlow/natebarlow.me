<li class="splide__slide stagger-2">
    <a class="card-link card" href="<?php the_permalink(); ?>" title="View <?php the_title_attribute(); ?>">
        <figure class="card-figure">
            <?php the_post_thumbnail('card-medium'); ?>
        </figure>
        <div class="card-text">
            <span class="date">
                <?php the_date('F Y') ?>
            </span>
            <h3 class="card-title">
                <?php the_title(); ?>
            </h3>
        </div>
        <div class="card-meta">
        <?php $posttags = get_the_tags();
            if ($posttags) {
                echo '<ul class="tags">';
                foreach($posttags as $tag) {
                    echo '<li class="' . $tag->slug . '">' .$tag->name. '</li>'; 
                }
                echo '</ul>';
            } ?>
        </div>
    </a>
</li>