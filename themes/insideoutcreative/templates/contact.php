<?php
/**
 * Template Name: Contact
 */
get_header(); ?>
<style>
    .hero-content,.hero-img{
    display: none;
}
section.hero {
    display: none;
}
</style>
<section class="pt-5 pb-5 position-relative" style="overflow:hidden;background: rgb(252, 176, 64);
    background: linear-gradient(180deg, rgba(252, 176, 64, 1) 0%, rgba(0, 53, 146, 1) 50%);">
<?php 
// if(has_post_thumbnail()){
//     the_post_thumbnail('full',array('class'=>'bg-img position-absolute w-100 h-100'));
// } else { 
// echo wp_get_attachment_image(26,'full','',['class'=>'bg-img position-absolute w-100 h-100']); 
// } 
?>
    <div class="container pb-4">
        <div class="row justify-content-center">
            <div class="col-lg-6 pt-5 pb-5 p-4 text-white">
            <div class="content">
            <!-- <div class="position-absolute bg-white" style="opacity:.75;width:100%;height:100%;top:0;left:0;"></div> -->
            <div class="position-relative">
<?php echo get_field('column_left'); ?>
</div>
            </div>
            </div>

            <div class="col-lg-6 pt-5 pb-5 p-4 text-white">
            <div class="content">
            <!-- <div class="position-absolute bg-white" style="opacity:.75;width:100%;height:100%;top:0;left:0;"></div> -->
            <div class="position-relative">
<?php echo get_field('column_right'); ?>
</div>
            </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>