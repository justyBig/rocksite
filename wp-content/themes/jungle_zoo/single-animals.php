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
        <?php if (get_field('in_action')): ?>
            <section class="video-section">
                <div class="container">
                    <div class="embed-container">
                        <?php echo get_field('in_action'); ?>
                    </div>
                </div>
            </section>
        <?php endif ?>
        <section class="taxTerms">
            <div class="container">
                <?php
                $terms = get_the_terms($post->ID, 'animal_type');
                foreach ($terms as $term): ?>
                    <div class="nameContainer">
                        <a href="<?php echo get_term_link($term); ?>"><?php echo $term->name ?></a>
                    </div>

                <?php endforeach; ?>
            </div>
        </section>
        <?php $habitats = get_posts(array(
            'post_type' => 'habitat',
            'meta_query' => array(
                array(
                    'key' => 'animal_habitat', // name of custom field
                    'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
                    'compare' => 'LIKE'
                )
            )
        ));

        if ($habitats):?>
            <section class="animalHabitat">
                <h2><span>Habitat</span><?php the_title() ; ?>'s like to live in the following habitats</h2>
                <div class="container">
                    <?php foreach ($habitats as $habitat): ?>
                        <a href="<?php echo get_permalink($habitat->ID)?>">
                            <?php echo get_the_title($habitat->ID); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>
    <?php
    endwhile;
endif;
get_footer();