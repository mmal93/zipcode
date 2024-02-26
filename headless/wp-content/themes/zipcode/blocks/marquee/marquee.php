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
$background = get_field('background');
$list = get_field('list');
?>
<?php if (isset($block['data']['preview_image_help'])) : ?>
    <img src="<?= $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else : ?>
    <?php if( isset($list) ): ?>
        <section <?= get_wrapper_attributes($block) ?> style="background-image: url(<?php echo $background ?>)">

            <div class="marquee-section">
                <!-- <div class="section-bkg">
                    <img src="<?php echo $background; ?>" >
                </div> -->
                <?php if(have_rows('list')): ?>
                    <div class="marquee">
                        <div class="marquee-items">
                            <?php while( have_rows('list') ): the_row(); 
                                $name = get_sub_field('name');
                            ?>
                                <div class="item"><?php echo $name ?></div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </section>
    <?php endif; ?>
<?php endif; ?>