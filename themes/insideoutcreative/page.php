<?php get_header();
global $post; 
if ( ! post_password_required( $post ) ) {


echo '<section class="about-section pt-5 pb-5 position-relative bg-accent texture-bg">';
echo '<div class="background-image"></div>';
echo '<div class="container pt-5 mb-5">';
echo '<div class="row pb-5 mb-5 justify-content-around">';
echo '<div class="col-md-5 img--main">';
echo '<div class="h-100">';

// $image = get_field('main_image');
// $imageMobile = get_field('mobile_image');
// if(!$imageMobile && $image) {
//     echo wp_get_attachment_image($image['id'],'full',"",['class'=>'w-100 h-100 position-absolute d-lg-block d-none','style'=>'top:0;left:0;object-fit:cover;']);
// echo wp_get_attachment_image($image['id'],'full',"",['class'=>'w-100 h-100 position-relative d-lg-none d-block','style'=>'']);

// } elseif($imageMobile){
//     echo wp_get_attachment_image($image['id'],'full',"",['class'=>'w-100 h-100 position-absolute d-lg-block d-none','style'=>'top:0;left:0;object-fit:cover;']);
// echo wp_get_attachment_image($imageMobile['id'],'full',"",['class'=>'w-100 h-100 position-relative d-lg-none d-block','style'=>'']);
// } elseif(has_post_thumbnail()) {

the_post_thumbnail('full',array('class'=>'w-100 h-100 position-absolute d-lg-block d-none','style'=>'top:0;left:0;object-position:top;object-fit:cover;'));
the_post_thumbnail('full',array('class'=>'w-100 h-100 position-relative d-lg-none d-block','style'=>''));

// } else {
// $globalPlaceholderImg = get_field('global_image','options');
// echo wp_get_attachment_image($globalPlaceholderImg['id'],'full',"",['class'=>'w-100 h-100 position-absolute d-lg-block d-none','style'=>'top:0;left:0;object-fit:cover;']);
// echo wp_get_attachment_image($globalPlaceholderImg['id'],'full',"",['class'=>'w-100 h-100 position-relative d-lg-none d-block','style'=>'']);
// } 

echo '</div>';
echo '</div>';
echo '<div class="col-lg-6 col-md-6 sm-text-center about"> ';
echo '<div class="about-first-half">';
echo '<div class="about-before"></div>';
echo '<div class="about-middle"></div>';
echo '</div>';
echo '<div class="about-after"></div>';
echo '<div class="about-details pt-5 pl-4 pr-4">';
echo '<div class="page details">';


echo '<h1>' . get_the_title() . '</h1>';

if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile;
endif;



echo '</div>';

echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';



if(get_the_content()){

echo '<section class="pt-5 pb-5">';
echo '<div class="container">';
echo '<div class="row">';
echo '<div class="col-md-12">';
if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile; else:
echo '<p>Sorry, no posts matched your criteria.</p>';
endif;
echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';

}

} else {
// we will show password form here

echo '<section class="pt-5 pb-5">';
echo '<div class="container">';
echo '<div class="row">';
echo '<div class="col-md-12">';
echo get_the_password_form();
echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';
   
}
get_footer(); 
?>