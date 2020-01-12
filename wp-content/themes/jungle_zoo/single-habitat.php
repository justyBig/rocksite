<?php
get_header();
?>
    <h1><?php the_title()?></h1>
<?php $animals = get_field('animal_habitat'); ?>
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
<?php get_footer();