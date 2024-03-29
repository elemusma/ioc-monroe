<?php 

 get_header();

//  echo 'new new connection this should commit';
//  echo '<br>';
//  echo 'why is it not committing';
//  echo '<br>';
//  echo 'new test';

// echo '<div style="position:fixed; right: 3px;top:0;z-index:20; background: black;color:white">';
// echo 'Scroll Direction :';
// echo '<span id="direction"></span>';
// echo '</div>';

 //  start of header
 echo '<section class="bg-attachment position-relative d-flex align-items-end justify-content-center hero-content overflow-h" style="padding-bottom:15px;height:87vh;">';
//  echo '<section class="bg-attachment position-relative d-flex align-items-end justify-content-center hero-content" style="background:url(' . get_the_post_thumbnail_url() . ');background-size:cover;background-attachment:fixed;background-position:top;padding-bottom:15px;height:87vh;">';

 the_post_thumbnail('full',array('class'=>'position-absolute w-100 img-parallax-custom','style'=>'top:0;left:0;object-fit:cover;object-position:top;height:106%;'));
 
 echo '<div class="position-absolute w-100 h-100" style="top:0;left:0;background: rgb(255,255,255);
background: radial-gradient(circle, rgba(255,255,255,0) 0%, rgba(75,113,255,1) 70%);mix-blend-mode:multiply;"></div>';
 
 echo '<div class="col-12 ml-auto p-0">';
//  echo '<div class="bg-accent pt-3 pb-3">';

echo '<div class="d-flex align-items-center justify-content-center w-100">';
echo '<h1 class="text-white text-center mb-0 page-title text-uppercase text-shadow" style="letter-spacing:0.2em;font-size:5vw;">' . get_the_title() . '</h1>';

echo wp_get_attachment_image(227,'full','',['class'=>'','style'=>'width:105px;height:105px;object-fit:contain;']);

echo '</div>';
//  echo '</div>';
 
 if(have_rows('header_content')): while(have_rows('header_content')): the_row();
//  echo '<div class="pt-3 pb-3 pl-md-5 pl-3 pr-md-5 pr-3" style="background:rgba(255,255,255,.6);">';
 
 echo '<div class="text-center" style="">';
 echo '<h2 class="subtitle text-white" style="font-size:19px;">' . get_sub_field('subtitle') . '</h2>';
 echo '<div class="text-white" style="font-size:120%;">';
 echo get_sub_field('content');
 echo '</div>';
 
 echo '</div>';
//  echo '</div>';
 endwhile; endif;
 
 echo '</div>';
 
 
 echo '</section>';
 //  end of header
 
 // start of intro
 echo get_template_part('partials/section-intro-content');
 // end of intro
 
 // start of content
 if(have_rows('content_group')): 
     while(have_rows('content_group')): the_row();
 
     if(have_rows('content_sections')): 
     while(have_rows('content_sections')): the_row();
     $option = get_sub_field('option');
     $classes = get_sub_field('classes');
     $style = get_sub_field('style');
     $bgImg = get_sub_field('background_image');
     $imgDataAos = get_sub_field('image_data_aos');
     $img = get_sub_field('image');
     $contentDataAos = get_sub_field('content_data_aos');
     $content = get_sub_field('content');
     $bigImage = get_sub_field('big_image');
 
     if($option == 'Content + Image'){
     echo '<section class="position-relative bg-attachment mt-5 mb-5 ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg['id'],'full') . ');background-size:cover;background-attachment:fixed;padding:250px 0;' . $style . '">';
 
     echo '<div class="container">';
     echo '<div class="row row-content align-items-center justify-content-between">';
     echo '<div class="col-md-6" data-aos="' . $contentDataAos . '">';
         echo $content;
     echo '</div>';
 
     if($img):
     echo '<div class="col-md-6" data-aos="' . $imgDataAos . '">';
         echo wp_get_attachment_image($img['id'],'full','',['class'=>'w-100 h-100','style'=>'object-fit:cover;']);
         if($img['caption']){
            echo '<div class="text-center">';
            echo '<span class="">' . $img['caption'] . '</span>';
            echo '</div>';
         }
     echo '</div>';
     endif;
 
     echo '</div>';
     echo '</div>';
 
     echo '</section>';
    } else {
        echo '<section class="position-relative bg-attachment mt-5 mb-5 ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bigImage['id'],'full') . ');background-size:cover;background-attachment:fixed;padding:250px 0;' . $style . '"></section>';

        echo '<div class="container pb-5 pt-5">';
        echo '<div class="row pb-5">';
        echo '<div class="col-12 text-center">';

        echo '<h2>' . $bigImage['title'] . '</h2>';

        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
     endwhile; 
     endif;
 
 endwhile; 
 endif;
 // end of content
 
echo get_template_part('partials/section-services-relationship');

// start of content bottom
if(have_rows('content_group_bottom')): 
    echo '<div class="content-group-bottom">';
    
    while(have_rows('content_group_bottom')): the_row();

    if(have_rows('content_sections')): 
    while(have_rows('content_sections')): the_row();
    $classes = get_sub_field('classes');
    $style = get_sub_field('style');
    $bgImg = get_sub_field('background_image');
    $imgDataAos = get_sub_field('image_data_aos');
    $img = get_sub_field('image');
    $contentDataAos = get_sub_field('content_data_aos');
    $content = get_sub_field('content');

    if($bgImg){

        echo '<section class="position-relative bg-attachment mt-5 mb-5 ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg['id'],'full') . ');background-size:cover;background-attachment:fixed;padding:250px 0;background-repeat:no-repeat;' . $style . '">';
        // echo '</section>';
    } else {
        echo '<section class="position-relative mt-5 mb-5 ' . $classes . '" style="padding:250px 0;' . $style . '">';
    }

    echo '<div class="position-absolute w-100 h-100 overlay-bg" style="top:0;left:0;"></div>';

    echo '<div class="container">';
    echo '<div class="row row-content align-items-center justify-content-between">';
  

    echo '<div class="col-lg-6 pb-lg-0 pb-4" data-aos="' . $imgDataAos . '">';
    if($img):
        echo wp_get_attachment_image($img['id'],'full','',['class'=>'w-100 h-100','style'=>'object-fit:cover;']);
    endif;
    echo '</div>';

    echo '<div class="col-lg-5" data-aos="' . $contentDataAos . '">';
    echo $content;
echo '</div>';

    echo '</div>';
    echo '</div>';

    $galleryBottom = get_sub_field('gallery_bottom');
if( $galleryBottom ): 
    echo '<div class="container-fluid">';
    echo '<div class="row row-content align-items-center justify-content-center pt-5">';
foreach( $galleryBottom as $image ):
echo '<div class="col-lg col-md-3 col-6 col col-portfolio mt-3 mb-3 overflow-h">';
echo '<div class="position-relative">';
echo '<a href="' . wp_get_attachment_image_url($image['id'], 'full') . '" data-lightbox="image-set" data-title="' . $image['title'] . '">';
echo wp_get_attachment_image($image['id'], 'full','',['class'=>'w-100 img-portfolio','style'=>'height:100px;object-fit:contain;'] );
echo '</a>';
echo '</div>';
echo '</div>';
endforeach; 
echo '</div>';
endif;

    echo '</div>';

    echo '</section>';
    endwhile; 
    endif;

endwhile; 
echo '</div>';
endif;
// end of content bottom

// start of insights
if(have_rows('relationship_content')): while(have_rows('relationship_content')): the_row();
echo '<section class="pt-5 pb-5">';
echo '<div class="container">';

echo '<div class="row justify-content-center">';

echo '<div class="col-md-9 text-center pb-5">';

echo get_sub_field('content');

echo '</div>';

echo '</div>';

$featured_posts = get_sub_field('relationship');

if( $featured_posts ):
    echo '<div class="row justify-content-center">';
    
foreach( $featured_posts as $post ): 
// Setup this post for WP functions (variable must be named $post).
setup_postdata($post);
echo '<a href="' . get_the_permalink() . '" class="col-md-4">';

echo '<div class="img-hover overflow-h">';
the_post_thumbnail('full',array('class'=>'w-100','style'=>'height:230px;object-fit:contain;object-position:top;'));
echo '</div>';

echo '</a>';
// echo '<hr class="mt-2">';
endforeach;
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); 
    echo '</div>';
endif;

echo '</div>';
echo '</section>';
endwhile; endif;
// end of insights

// start of partners
// if(have_rows('partners_group')): while(have_rows('partners_group')): the_row();
// echo '<section class="pt-5 pb-5 position-relative bg-attachment" style="">';
// echo '<div class="container" style="">';
// echo '<div class="row justify-content-center" style="">';
// echo '<div class="col-12 text-center" style="">';
// echo get_sub_field('content');
// echo '</div>';

// $gallery = get_sub_field('gallery');
// if( $gallery ): 
// foreach( $gallery as $image ):
// echo '<div class="col-md-4 col-12 col col-partners overflow-h">';
// echo '<div class="position-relative">';
// // echo '<a href="' . wp_get_attachment_image_url($image['id'], 'full') . '" data-lightbox="image-set">';
// echo wp_get_attachment_image($image['id'], 'full','',['class'=>'w-100 h-auto','style'=>'object-fit:contain;'] );
// // echo '</a>';
// echo '</div>';
// echo '</div>';
// endforeach; 
// endif;

// echo '</div>';
// echo '</div>';
// echo '</section>';
// endwhile; endif;
// end of partners

// start of testimonials
echo '<section class="pt-5 pb-5 testimonials position-relative z-1" style="">';
echo '<div class="container">';
echo '<div class="row">';
echo '<div class="col-12 text-center pb-5">';

$testimonialsGroup = get_field('testimonials_content');
$tTitle = $testimonialsGroup['title'];
$tContent = $testimonialsGroup['content'];

echo '<h3 class="text-accent h1">' . $tTitle . '</h3>';

if($tContent) {
echo $tContent;
}
echo '</div>';
echo '</div>';
echo '</div>';




$counterTestimonial = 0;
if(have_rows('testimonials')): 
    echo '<div class="bg-accent text-white pt-5 pb-5" style="border-top:15px solid var(--accent-secondary);border-bottom:15px solid var(--accent-secondary);">';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="testimonials-carousel owl-carousel owl-theme">';

    while(have_rows('testimonials')): the_row(); 
$counterTestimonial++;

echo '<div class="col-testimonial mt-2 mb-2 pl-md-0 pr-md-0 pl-5 pr-4" data-aos="fade-up" data-aos-delay="' . $counterTestimonial . '00">';

echo wp_get_attachment_image(129,'full','',['class'=>'bg-img position-absolute img-quotes','style'=>'width:25px;height:auto;']);
echo '<div class="position-relative pl-md-5 pr-md-5">';

echo '<small class="gray-text-1">';
echo get_sub_field('content');
echo '</small>';

echo '<div class="row align-items-center">';
$testimonialsImage = get_sub_field('headshot'); 
if($testimonialsImage){
echo '<div class="col-lg-3 col-5">';
echo wp_get_attachment_image($testimonialsImage['id'],'full','',['class'=>'img-testimonial h-auto w-100']); 
echo '</div>';
}

echo '<div class="col-lg-9 col-7">';
echo '<small>';
echo '<span class="h6"><strong>' . get_sub_field('name') . '</strong></span><br><span class="d-block">' . get_sub_field('job_title') . '</span>';

echo '</small>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
endwhile; 

echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

endif;

echo '</section>';
// end of testimonials

 
  get_footer();

?>