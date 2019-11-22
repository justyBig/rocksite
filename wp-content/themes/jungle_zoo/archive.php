<?php
/*
Template Name: Archives
*/
?>
<section>
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
                </div>
                <div class="sidebar-layout__main">
                    <div class="post-list">
                       <?php while (have_posts()): the_post();?>
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <?php endwhile;?>
                    </div>
                </div>
            </div>
            <?php the_post(); ?>
        </div
    </div>
</section>