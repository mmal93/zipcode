<?php
$title = get_field('title');
$form_shortcode = get_field('form_shortcode');
?>
<?php if (isset($block['data']['preview_image_help'])) : ?>
    <img src="<?= $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;" alt="">
    <?php else :
    if (isset($title)) : ?>
        <section class="career-contact careers-section">
            <div class="container">
                <div class="career-contact-wrapper">
                    <div class="section-heading">
                        <?php if ($title) : ?>
                            <h2><?= $title ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="section-form">
                        <?php if ($form_shortcode) :
                            echo do_shortcode($form_shortcode);
                        endif; ?>
                    </div>
                </div>
            </div>
        </section>
<?php endif;
endif; ?>