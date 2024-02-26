<?php

/**
 * Corp Site Custom Block template.
 *
 * @param array $block The block settings and attributes.
 */
defined('ABSPATH') || exit; // Exit if accessed directly.
$block              = ($block ?? false) ?: [];
$bem_block_name     = basename(__FILE__, '.php'); // Uses the filename (without .php) as the BEM block name
$block_unique       = generate_unique_block_id();
$block['className'] = ($block['className'] ?? false) ? "{$block['className']} {$block_unique}" : $block_unique;
$block['anchor']    = ($block['anchor'] ?? false) ?: $block_unique;
// block variables
$label = get_field('label');
$bannerTitle = get_field('title');
$bannerDescription = get_field('description');
$bannerImageUrl = get_field('image');
$bannerBackground = get_field('background');

?>
<?php if (isset($block['data']['preview_image_help'])) : ?>
    <img src="<?= $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else : ?>
<?php if(isset($label) || isset($bannerTitle) || isset($bannerDescription) || isset($bannerImageUrl)): ?>
    <section <?= get_wrapper_attributes($block) ?>>
        <div class="phi-banner-container" style="background-image: url(<?php echo $bannerBackground ?>)">
            <div class="container">
                <div class="content">
                    <?php if(isset($label) || isset($bannerTitle) || isset($bannerDescription)): ?>
                        <div class="text-container">
                            <?php if(isset($label)): ?>
                                <div class="label"><?php echo $label ?></div>
                            <?php endif; ?>
                            <?php if(isset($bannerTitle)): ?>
                                <h1 class="banner-title"><?php echo $bannerTitle ?></h1>
                            <?php endif; ?>
                            <?php if(isset($bannerDescription)): ?>
                                <div class="banner-des"><?php echo $bannerDescription ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($bannerImageUrl)): ?>
                        <div class="image-container">
                            <div class="image" style="background-image: url(<?php echo $bannerImageUrl ?>)"></div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php endif; ?>