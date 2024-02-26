<?php
$title = get_field('title');
$listing = get_field('listing');
?>
<?php if (isset($block['data']['preview_image_help'])) : ?>
    <img src="<?= $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;" alt="">
    <?php else :
    if (isset($title)) : ?>
        <div class="available-positions careers-section">
            <div class="container">
                <div class="section-title text-center">
                    <?php if ($title) : ?>
                        <h2><?= $title ?></h2>
                    <?php endif; ?>
                </div>
                <div class="section-content">
                    <div class="available-items">
                        <?php if ($listing) {
                            foreach ($listing as $item) { ?>
                                <div class="item">
                                    <div class="content"><?= $item['content'] ?></div>
                                </div>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
<?php endif;
endif; ?>