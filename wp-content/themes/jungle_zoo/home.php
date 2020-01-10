<?php
/*
Template Name: Home Page
*/
get_header(); ?>
    <div class="main" id="main">
        <h1><?php the_title() ?></h1>
        <section class="hero">
            <div class="hero-fade-slider">
                <?php
                if (have_rows('slides')):
                    while (have_rows('slides')) :
                        the_row(); ?>
                        <?php $slide = get_sub_field('slide_image'); ?>
                        <img class="fade-slide" src="<?php echo $slide['url']; ?>"/>
                    <?php endwhile;
                endif; ?>
            </div>
    </div>
    </section>
    </div>

<?php get_footer();