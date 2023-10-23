
<?php
get_header();
?>

    <div class="wrapper page-header">
        <h1><?php the_title(); ?></h1>
    </div>
</header>
<main class="wrapper">
    <?php $portfolio = new WP_Query(array(
        'post_status' => 'publish',
        'cat' => 2,
    )); ?>
    <ol class="cards grid grid-2">
        <?php if ( $portfolio->have_posts() ) :
            while ( $portfolio->have_posts() ) : $portfolio->the_post();?>
                <? get_template_part('template-parts/card'); ?>
            <? endwhile; endif; ?>
    </ol>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <section>
        <?php the_content(); ?>
    </section>
    <?php endwhile; else: endif; ?>
</main>

<?php
get_footer();
?>
