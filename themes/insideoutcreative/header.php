<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 

if(get_field('header', 'options')) { the_field('header', 'options'); }

if(get_field('custom_css')) { 
?> 
<style>
<?php the_field('custom_css'); ?>
</style>
<?php } ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if(get_field('body','options')) { the_field('body','options'); } ?>
<div class="blank-space"></div>
<header class="position-relative pt-2 pb-2 z-3 box-shadow bg-white w-100" style="top:0;left:0;">

<div class="nav">
<div class="container">
<div class="row align-items-center justify-content-md-between justify-content-center">
<div class="col-lg-3 col-6">
<a href="<?php echo home_url(); ?>">
<?php 
$logo = get_field('logo','options'); 
if($logo){
echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'w-100 h-auto']); 
}

echo '</a>';
echo '</div>';
echo '<div class="col-lg-4 col-6 d-flex align-items-center justify-content-end">';

echo '<div class="position-relative pt-3 pb-3">';
echo wp_get_attachment_image(227,'full','',['class'=>'position-absolute h-100 w-auto','style'=>'top:0;left:50%;transform:translate(-50%,0%);']);
wp_nav_menu(array(
    'menu' => 'Contact',
    'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-center mb-0'
)); 
echo '</div>';

?>
<a id="navToggle" class="nav-toggle ml-4 d-flex">
<div style="margin:0px 4px;">
<div class="line-1 bg-accent"></div>
<div class="line-2 bg-accent-secondary"></div>
<div class="line-3 bg-accent"></div>
</div>
<div style="margin:0px 4px;">
<div class="line-1 bg-accent-secondary"></div>
<div class="line-2 bg-accent"></div>
<div class="line-3 bg-accent-secondary"></div>
</div>
<div style="margin:0px 4px;">
<div class="line-1 bg-accent"></div>
<div class="line-2 bg-accent-secondary"></div>
<div class="line-3 bg-accent"></div>
</div>
</a>
</div>
<div id="navMenuOverlay" class="position-fixed z-2"></div>
<div class="col-lg-4 col-md-5 col-11 nav-items bg-white" id="navItems">

<div class="pt-5 pb-5">
<div class="close-menu">
<div>
<span id="navMenuClose" class="close h1">X</span>
</div>
</div>
<a href="<?php echo home_url(); ?>">
<?php 
$logo = get_field('logo','options'); 
if($logo){
echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'w-100 h-auto','style'=>'max-width:250px;']);
}

echo '</a>';
echo '</div>';

wp_nav_menu(array(
'menu' => 'primary',
'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-center mb-0'
));

echo '<div class="small text-center pt-4">';
the_field('website_message','options');
echo '</div>';





echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

echo '</header>';

// if(!is_front_page()){
// echo '<section class="hero position-relative">';
// $globalPlaceholderImg = get_field('global_placeholder_image','options');
// if(is_page()){
// if(has_post_thumbnail()){
// the_post_thumbnail('full', array('class' => 'w-100 h-100 bg-img position-absolute'));
// } else {
// echo wp_get_attachment_image($globalPlaceholderImg['id'],'full','',['class'=>'w-100 h-100 bg-img position-absolute']);
// }
// } else {
// echo wp_get_attachment_image($globalPlaceholderImg['id'],'full','',['class'=>'w-100 h-100 bg-img position-absolute']);
// }



// if(is_front_page()) {
// echo '<div class="pt-5 pb-5 text-white text-center">';
// echo '<div class="position-relative">';
// echo '<div class="multiply overlay position-absolute w-100 h-100 bg-img"></div>';
// echo '<div class="position-relative">';
// echo '<div class="container">';
// echo '<div class="row">';
// echo '<div class="col-12">';
// echo '<h1 class="pt-3 pb-3 mb-0 text-shadow" style="letter-spacing:0.2em;">' . get_the_title() . '</h1>';
// echo '</div>';
// echo '</div>';
// echo '</div>';
// echo '</div>';
// echo '</div>';
// echo '</div>';
// }



// if(!is_front_page()) {
// echo '<div class="container pt-5 pb-5 text-white text-center">';
// echo '<div class="row">';
// echo '<div class="col-md-12">';
// if(is_page() || !is_front_page()){
// echo '<h1 class="">' . get_the_title() . '</h1>';
// } elseif(is_single()){
// echo '<h1 class="">' . get_single_post_title() . '</h1>';
// } elseif(is_author()){
// echo '<h1 class="">Author: ' . get_the_author() . '</h1>';
// } elseif(is_tag()){
// echo '<h1 class="">' . get_single_tag_title() . '</h1>';
// } elseif(is_category()){
// echo '<h1 class="">' . get_single_cat_title() . '</h1>';
// } elseif(is_archive()){
// echo '<h1 class="">' . get_archive_title() . '</h1>';
// }
// echo '</div>';
// echo '</div>';
// echo '</div>';
// }

// echo '</section>';

// }
?>