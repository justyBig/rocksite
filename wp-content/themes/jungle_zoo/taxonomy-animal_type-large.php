<?php
get_header();
?>
    <section class="animals">
        <div class="container">
            <?php if (have_posts()): ; ?>
                <div class="cardDeck">
                    <?php while (have_posts()): the_post(); ?>
                        <?php setup_postdata($post); ?>
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
                            endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata();
            endif; ?>
        </div>
    </section>
<?php get_footer();