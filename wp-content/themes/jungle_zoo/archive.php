<?php
/*
Template Name: Archives
*/
get_header();
?>
    <section id="archive">
        <div class="conatiner">
            <div class="content">
                <div class="sidebar-layout">
                    <div class="sidebar-layout__sidebar">
                        <?php get_search_form(); ?>

                        <h2>Archives by Month:</h2>
                        <ul>
                            <?php wp_get_archives('type=monthly'); ?>
                        </ul>

                        <h2>Archives by Subject:</h2>
                        <ul>
                            <?php wp_list_categories(); ?>
                        </ul>
                        <h2>Archives by Taxonomy:</h2>
                        <?php
                        $args = array(
                            'public' => true,
                            '_builtin' => false,
                        );
                        $output = 'object'; // or objects
                        $taxonomies = get_taxonomies($args, $output);
                        if ($taxonomies):?>
                            <ul>
                                <?php foreach ($taxonomies as $outer_taxonomy):?>
                                    <li>
                                       <h4><?php echo $outer_taxonomy->name ?></h4>
                                    </li>

                                    <?php $terms = get_terms(['taxonomy' => $outer_taxonomy->name,
                                        'hide_empty' => false]);?>
                                    <ul>
                                        <?php foreach ($terms as $term): ?>
                                            <li class="nameContainer">
                                                <a href="<?php echo get_term_link($term); ?>"><?php echo $term->name ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <div class="sidebar-layout__main">
                        <div class="product-gallery">
                            <?php while (have_posts()): the_post(); ?>

                                <div class="product-gallery__item">
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
                                    endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
                <?php the_post(); ?>
            </div
        </div>
    </section>
<?php
get_footer();