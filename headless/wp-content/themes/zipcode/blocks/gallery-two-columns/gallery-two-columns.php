<?php
$title = get_field('title');
$gallery = get_field('gallery');
if (isset($gallery) && !empty($gallery)) {
    $numRow = count($gallery);
    $numCol = $numRow / 2;
}
?>
<?php if (isset($block['data']['preview_image_help'])) : ?>
    <img src="<?= $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;" alt="">
    <?php else :
    if (isset($title)) : ?>
        <section class="our-values-box careers-section">
            <div class="container">
                <div class="section-title">
                    <?php if ($title) : ?>
                        <h2 class="h4"><?= $title ?></h2>
                    <?php endif; ?>
                </div>
                <div class="section-content">
                    <div class="our-values-items">
                        <div class="items-col col-left">
                            <?php if ($gallery) {
                                foreach ($gallery as $key => $item) {
                                    if (($key + 1) <= $numCol) { ?>
                                        <div class="item" data-index="<?= $key ?>">
                                            <div class="column-image">
                                                <div class="image-first">
                                                    <div class="image-inner">
                                                        <img loading="lazy" src="<?= $item['image_1'] ?>" class="img img-default" alt="" />
                                                        <img loading="lazy" src="<?= $item['image_1'] ?>" class="img-placeholder" alt="" />
                                                    </div>
                                                </div>
                                                <div class="image-second">
                                                    <div class="image-inner">
                                                        <img loading="lazy" src="<?= $item['image_2'] ?>" class="img img-default" alt="" />
                                                        <img loading="lazy" src="<?= $item['image_2'] ?>" class="img-placeholder" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column-title">
                                                <h5><?= $item['item_title'] ?></h5>
                                            </div>
                                            <div class="column-content">
                                                <div class="content"><?= $item['content'] ?></div>
                                            </div>
                                        </div>
                            <?php }
                                }
                            } ?>
                        </div>
                        <div class="items-col col-right">
                            <?php if ($gallery) {
                                foreach ($gallery as $key => $item) {
                                    if (($key + 1) > $numCol) { ?>
                                        <div class="item" data-index="<?= $key ?>">
                                            <div class="column-image">
                                                <div class="image-first">
                                                    <div class="image-inner">
                                                        <img loading="lazy" src="<?= $item['image_1'] ?>" class="img img-default" alt="" />
                                                        <img loading="lazy" src="<?= $item['image_1'] ?>" class="img-placeholder" alt="" />
                                                    </div>
                                                </div>
                                                <div class="image-second">
                                                    <div class="image-inner">
                                                        <img loading="lazy" src="<?= $item['image_2'] ?>" class="img img-default" alt="" />
                                                        <img loading="lazy" src="<?= $item['image_2'] ?>" class="img-placeholder" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column-title">
                                                <h5><?= $item['item_title'] ?></h5>
                                            </div>
                                            <div class="column-content">
                                                <div class="content"><?= $item['content'] ?></div>
                                            </div>
                                        </div>
                            <?php }
                                }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php endif;
endif; ?>