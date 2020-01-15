<section class="latestThree">
    <div class="container">
        <h2><span>Flex Content</span>Latest animals by selected Tax</h2>
        <?php
        // the query
        $the_query = new WP_Query(array(
            'post_type' => 'animals',
            'posts_per_page' => 3,
            'post_status' => 'publish',
            'orderby' => 'publish_date',
            'order' => 'ASC',
        ));
        ?>

        <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                <?php the_title(); ?>
                <?php echo get_the_date() ?>
                <?php the_excerpt(); ?>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p><?php __('No News'); ?></p>
        <?php endif; ?>

    </div>
</section>
