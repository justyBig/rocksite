<?php
$inlineImage = get_sub_field('image');
if ($inlineImage):
    ?>
    <section class="image-section">
        <div class="container">
            <img src="<?php echo $inlineImage['url']; ?>">
        </div>
    </section>
<?php endif;