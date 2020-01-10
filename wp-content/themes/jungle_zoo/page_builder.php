<?php
/*
 * Template Name: Page Builder
 *
 */
get_header();
?>
<main id="main">
    <?php /* FLEXIBLE CONTENT LOOP */
    if( have_rows('modules') ):
        $sectionCounter = 0;
        while ( have_rows('modules') ) : the_row();
            $sectionCounter++;
            include('template-parts/page-builder/_'.get_row_layout().'.php');
        endwhile;
    endif;
    ?>
</main>
<?php get_footer();
