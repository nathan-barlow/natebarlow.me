<li class="splide__slide stagger-2 span-2">
    <a class="card-link card card-grid grid grid-2 featured-card" href="<?php the_permalink(); ?>" title="View <?php the_title_attribute(); ?>">
        <figure class="card-figure">
            <?php the_post_thumbnail('card-medium'); ?>
        </figure>
        <div>
            <div class="card-text">
                <span class="date flex flex-sm flex-center">
                    <?php the_date('F Y') ?>
                    <span class="tag ml-auto">FEATURED</span>
                </span>
                <h3 class="card-title">
                    <?php the_title(); ?>
                </h3>
                <p>
                    <?php the_excerpt(); ?>
                </p>
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
        </div>
    </a>
</li>