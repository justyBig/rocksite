<?php
$backgroundOverlay = get_sub_field('overlay_color');
$bluePrintImg = get_sub_field('blue_print_image');
$heroImg = get_sub_field('background_image');
?>

<section class="hero-section"
    style="<?php echo $heroImg ? "background-image: url('" . $heroImg['url'] . "')" : ''; ?>">
    <div class="container">
        <h1><?php echo get_sub_field('title') ?></h1>
        <p><?php echo get_sub_field('copy') ?></p>
    </div>
</section>