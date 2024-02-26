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
$block['class'] = ($block['class'] ?? false) ? "{$block['class']} {$block_unique}" : $block_unique;
$block['anchor']    = ($block['anchor'] ?? false) ?: $block_unique;
// block variables
$text = get_field('text');
$background = get_field('background');
$link = get_field('button');
?>
<?php if (isset($block['data']['preview_image_help'])) : ?>
    <img src="<?= $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else : ?>
<?php if( isset($text) ): ?>
    <section <?= get_wrapper_attributes($block) ?>>

        <div class="about-banner-cta about-section">
            <div class="section-bkg">
                <img src="<?php echo $background ?>" />
            </div>
            <div class="container">
                <div class="section-content text-center">
                    <div class="content-inner">
                        <h2 class="title"><?php echo $text ?></h2>
                        <a class="btn btn-primary btn-white" href="<?php echo $link['url'] ?>"><?php echo $link['title'] ?></a>
                    </div>
                </div>
            </div>
        </div>

    </section>
<?php endif; ?>
<?php endif; ?>