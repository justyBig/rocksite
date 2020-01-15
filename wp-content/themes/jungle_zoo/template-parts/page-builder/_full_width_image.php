<?php
$inlineImage = get_sub_field('image');
if ($inlineImage):
    ?>
    <section class="image-section">
        <h2><span>Flex Content</span>Image Module</h2>
        <div class="container">
            <img src="<?php echo $inlineImage['url']; ?>">
        </div>
    </section>
<?php endif;