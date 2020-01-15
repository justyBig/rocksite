<?php
get_header();
if (have_posts()):?>
    <div class="container">
    <?php while (have_posts()): the_post();
        $animals = get_field('animal_habitat'); ?>
        <a href="<?php the_permalink(); ?>"
           title="<?php the_title_attribute(); ?>">
            <h1><?php echo the_title(); ?></h1>
        </a>
        <section>
            <div class="container">
                <?php if ($animals): ?>
                    <div class="animallist">
                        <ul>
                            <?php foreach ($animals as $post):
                                setup_postdata($post) ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>"
                                       title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                </li>
                            <?php endforeach;
                            wp_reset_postdata(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endwhile;?>
    </div>
<?php endif;
get_footer();