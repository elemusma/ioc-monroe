<?php

/**
 * Template Name: Services
 */

 get_header();

  // start of services
if(have_rows('services_content')): while(have_rows('services_content')): the_row();
$bgImg = get_sub_field('background_image');
$content = get_sub_field('content');
$relationship = get_sub_field('relationship');

echo '<section class="position-relative bg-attachment" style="padding-top:75px;padding-bottom:175px;">';

if($bgImg):
echo wp_get_attachment_image($bgImg['id'],'full','',['class'=>'position-absolute w-100 h-100','style'=>'top:0;left:0;']);
endif;

echo '<div class="position-relative pt-5 pb-5">';
echo '<div class="container">';
echo '<div class="row justify-content-center">';
echo '<div class="col-lg-10 text-center text-white pb-5">';

echo $content;

echo '</div>';
echo '</div>';


if( $relationship ):
    echo '<div class="row justify-content-center">';
    $counter = 0;
foreach( $relationship as $post ): 
// Setup this post for WP functions (variable must be named $post).
setup_postdata($post);
$counter++;
echo '<div class="col-lg-4 col-md-6 text-white mb-5">';
echo '<div class="position-relative pt-2 pr-4 pl-4 h-100 d-flex align-items-end col-services" style="border:1px solid var(--accent-quinary);">';

echo '<div class="position-absolute w-100 h-100 bg-accent" style="top:0;left:0;mix-blend-mode:overlay;opacity:.65;"></div>';

echo '<a href="' . get_the_permalink() . '" class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center text-center z-2 col-services-link" style="top:0;left:0;border:4px solid var(--accent-quaternary);opacity:0;pointer-events:none;text-decoration:none;background:var(--accent-tertiary);">';
echo '<h3 class="mb-0 bold h4" style="">' . get_the_title() . '</h3>';
echo '</a>';

echo '<div class="w-100 position-relative" style="height:250px;">';
echo '<span class="h1 pb-5 d-inline-block blair-light">' . str_pad($counter, 2, '0', STR_PAD_LEFT) . '</span>';

echo '<div class="container position-absolute" style="bottom:0;">';

echo '<div class="row align-items-baseline">';
echo '<div class="col-md-2 pb-lg-0 pl-0 pb-3 text-white">';

echo '<div class="" style="border:1px solid var(--accent-tertiary);border-radius:50%;width: 35px;height: 35px;display: flex;align-items: center;justify-content: center;">';
echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width:15px;" fill="white"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/></svg>';
echo '</div>';

echo '</div>';

echo '<div class="col-lg-5 text-white pl-0">';
echo '<h4 class="mb-0 h5 pb-4" style="border-bottom:10px solid var(--accent-secondary);"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
echo '</div>';
echo '</div>';
echo '</div>';


echo '</div>';
echo '</div>';
echo '</div>';
endforeach;
// Reset the global post object so that the rest of the page works correctly.
wp_reset_postdata(); 
echo '</div>';
endif;


echo '</div>';
echo '</div>';
echo '</section>';
endwhile; endif;
// end of services

 get_footer();

?>