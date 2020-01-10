<?php
get_header();
if (have_posts()):
    while (have_posts()): the_post();
        $hero = get_field('has_hero_image');
        if ($hero) {
            $heroImg = get_field('hero_image');
        } ?>
        <div class="main" id="main">
        <section id="blogHero"
                 style="<?php echo $hero ? "background-image: url('" . $heroImg['url'] . "')"
                     : "background-color:" . get_field('background_color'); ?>">
            <div class="container">
                <h2><span><?php the_title() ?></span><?php echo get_field('page_title'); ?></h2>
            </div>
        </section>
        <section>
            <div class="container">
                <?php the_content(); ?>
            </div>
        </section>
        <section class="video-section">
            <div class="container">
                <div class="embed-container">
                    <?php echo  get_field('in_action'); ?>
                </div>
            </div>
        </section>
    <?php
    endwhile;
endif;
get_footer();