<?php
$title = get_field('title');
$description = get_field('description');
$culture_image = get_field('culture_image');
?>
<?php if (isset($block['data']['preview_image_help'])) : ?>
    <img src="<?= $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;" alt="">
    <?php else :
    if (isset($title)) : ?>
        <section class="our-culture-box careers-section">
            <div class="container">
                <div class="column-box">
                    <div class="column-title">
                        <?php if ($title) : ?>
                            <h2 class="h4"><?= $title ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="column-image">
                        <?php if ($culture_image) : ?>
                            <div class="image-inner">
                                <img loading="lazy" src="<?= $culture_image ?>" class="img" alt="Our Culture">
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="column-content">
                        <?php if ($description) : ?>
                            <div class="description"><?= $description ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
<?php endif;
endif; ?>