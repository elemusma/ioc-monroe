<?php 
/**
 * Template Name: About Story
 */
get_header(); 


// if($showVegan != 'Yes'){
//     echo get_template_part('partials/navbar-yogurt');
// } elseif($showVegan == 'Yes'){
//     echo get_template_part('partials/navbar-vegan');
// }
echo get_template_part('partials/navbar-about-story');
wp_enqueue_style('about-story', get_theme_file_uri('/css/sections/about-story.css'));
?>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.js"></script> -->
<?php 
if(have_rows('sections')): while(have_rows('sections')): the_row();
$image = get_sub_field('image');
$label = get_sub_field('label');
$dataAos = get_sub_field('data_aos');
$background = get_sub_field('background');
$section = sanitize_title_with_dashes($label);
$content = get_sub_field('content');
?>

<section id="section-<?php echo $section; ?>" class="full-height pt-5 pb-5 position-relative overflow-h section-full d-flex align-items-center" style="min-height:100vh;">
<div class="container">
    <div class="row align-items-center">
    <div class="col-md-6" data-aos="<?php echo $dataAos; ?>" data-aos-delay="200" style="background:<?php echo $background; ?>">
<div class="text-white" style="margin-bottom:-1rem;">
<?php echo $content; ?>
</div>
</div>

        <div class="col-md-6">
            <div class="position-relative">
            <div style="background: #9bbec7;top: -25px;right: 20px;position: absolute;height: 65%;width: 65%;opacity:.25;"></div>
            <div style="background: #e2c391;width: 25%;height: 90%;position: absolute;bottom: -20px;right: -35px;opacity: 85%;z-index: 0 !important;"></div>
            <div class="position-relative z-1">
                <?php echo wp_get_attachment_image($image['id'],'full', '',['class'=>'w-100 h-auto img-bg','style'=>'object-fit:contain;top:0;left:0;']); ?>
            </div>
            </div>
        </div>



    </div>
</div>


<!-- <div class="position-absolute bg-black w-100 h-100" style="opacity:.35;top:0;left:0;pointer-events:none;"></div> -->
<!-- <div class="container">
<div class="row justify-content-center">
<div class="col col-md-10 p-5" data-aos="<?php echo $dataAos; ?>" data-aos-delay="200" style="background:<?php echo $background; ?>">
<div class="h4 text-white" style="margin-bottom:-1rem;">
<?php echo $content; ?>
</div>
</div>
</div>
</div> -->
</section>

<?php 
endwhile; 
endif;


if(have_rows('sections')): ?>
<div class="position-fixed side-navbar" style="top:25%;right:25px;transform:translate(0, 50%);z-index:2;">
<ul class="list-unstyled text-right mr-md-4 mr-0">
<?php while(have_rows('sections')): the_row();
$label = get_sub_field('label');
$section = sanitize_title_with_dashes($label);
$rowIndex=get_row_index();
// if($rowIndex == '1'){}
?>
<li id="anchor-section-<?php echo $section; ?>" class="mt-2 mb-2 position-relative">
<a href="#section-<?php echo $section; ?>" class="pl-md-5 pl-2 pr-2 text-white position-relative h5">
<?php echo $label; ?>
</a>
</li>

<?php endwhile; ?>
</ul>
</div>
<?php endif;

wp_enqueue_script('about-js', get_theme_file_uri('/js/about.js'));

get_footer(); ?>