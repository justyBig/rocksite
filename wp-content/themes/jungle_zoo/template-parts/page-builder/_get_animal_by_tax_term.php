<section class="getanimals">
    <div class="container">
        <h2><span>Taxonomy</span>Get animals by selected Tax</h2>
        <?php $terms = get_sub_field('animal_type');
        if ($terms): ?>
            <div class="cardDeck">
            <?php foreach ($terms as $term):
                $termAnimals = get_posts(array(
                    'post_type' => 'animals',
                    'numberposts' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => $term->taxonomy,
                            'terms' => $term->term_id
                        )
                    )
                ));
                foreach ($termAnimals as $post):
                    setup_postdata($post); ?>
                    <div class="card">
                        <a href="<?php echo get_permalink(); ?>">
                            <div class="image-wrapper">
                                <?php echo get_the_post_thumbnail($post_id, 'full', array('class' => 'featImg')); ?>
                            </div>
                            <h2 class="entry-title"><?php the_title(); ?></h2>
                            <p><?php echo get_my_excerpt(20); ?></p>
                        </a>
                        <?php $categories = get_the_category();
                        $separator = ' ';
                        $output = '';
                        if (!empty($categories)) :?>
                            <div class="blogCategories">
                                <?php
                                foreach ($categories as $category) {
                                    $output .= '<a class="blogCatLinkBtn" href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $category->name)) . '">' . $category->name . '</a>' . $separator;
                                    $postCategories[] = $category->term_id;
                                }
                                echo trim($output, $separator);
                                ?>
                            </div>
                        <?php
                        endif;
                        if (get_the_taxonomies($post->ID, $term->taxonomy)) ; ?>
                        <div class="taxonomies">
                            <div class="container">
                                <h6>Taxonomies</h6>
                                <?php foreach ($terms as $term): ?>
                                    <div class="nameContainer">
                                        <a href="<?php echo get_term_link($term); ?>"><?php echo $term->name ?></a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php
            endforeach;
        endif; ?>
    </div>
</section>