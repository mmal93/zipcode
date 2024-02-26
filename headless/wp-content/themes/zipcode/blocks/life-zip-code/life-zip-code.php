<?php
$title = get_field('title');
$gallery = get_field('gallery');
?>
<?php if (isset($block['data']['preview_image_help'])) : ?>
    <img src="<?= $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;" alt="">
    <?php else :
    if (isset($title)) : ?>
        <div class="careers-life careers-section">
            <div class="container">
                <div class="section-title">
                    <?php if ($title) : ?>
                        <h2 class="h4"><?= $title ?></h2>
                    <?php endif; ?>
                </div>
                <div class="section-content">
                    <div class="gallery-icon gallery-icon-row">
                        <span class="image-background"></span>
                    </div>
                    <div class="gallery-icon gallery-icon-col">
                        <span class="image-background"></span>
                    </div>
                    <div class="life-gallery">
                        <?php if ($gallery) {
                            foreach ($gallery as $item) { ?>
                                <div class="item">
                                    <div class="item-image">
                                        <img src="<?= $item['image'] ?>" alt="Life ZipCode">
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
<?php endif;
endif; ?>