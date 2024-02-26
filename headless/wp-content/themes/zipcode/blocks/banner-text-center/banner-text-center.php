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
$heading = get_field('heading');
$background = get_field('background');

?>
<?php if (isset($block['data']['preview_image_help'])) : ?>
    <img src="<?= $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else : ?>
    <?php if(isset($heading)): ?>
        <section <?= get_wrapper_attributes($block) ?>>
            <div class="section section-banner" style="background-image: url('<?php echo $background; ?>'); background-position: center; background-size: cover">
                <div class="inner-section">
                    <h1 class="heading"><?php echo $heading ?></h1>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>