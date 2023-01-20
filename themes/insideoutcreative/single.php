<?php get_header(); ?>
<section class="pt-5 pb-5 body" style="background: rgb(252, 176, 64);
    background: linear-gradient(180deg, rgba(252, 176, 64, 1) 0%, rgba(0, 53, 146, 1) 50%);">
<div class="container">
    <div class="row justify-content-center">
    <?php get_template_part('partials/sidebar'); ?>
        <div class="col-lg-9 col-md-12 order-lg-2 order-1 text-white">
        <p class="d-flex flex-wrap align-items-center mb-5">
        <?php the_time('F jS, Y'); ?>
        </p>
        <?php 
        echo '<h1>' . get_the_title() . '</h1>';
        if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
<hr>
<?php comments_template(); ?>
        </div>
        <!-- <div class="col-lg-3"> -->
            
        <!-- </div> -->
    </div>
    <div class="row justify-content-center pt-5 text-white">
        <div class="col-md-6" id="previous">
        <small>Previous</small>
        <h3 class="h5 text-white"><?php previous_post_link(); ?></h3>
        </div>
        <div class="col-md-6 text-right" id="next">
            <small>Next</small>
        <h3 class="h5 text-white"><?php next_post_link(); ?></h3>
        </div>
    </div>
</div>
</section>
<?php get_footer(); ?>