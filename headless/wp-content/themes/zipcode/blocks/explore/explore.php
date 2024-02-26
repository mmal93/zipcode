<?php

/**
 * Corp Site custom Block template.
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
$heading = get_field('heading');
$left_image = get_field('left_image');
$right_image = get_field('right_image');
$background_right_image = get_field('background_right_image');
$description = get_field('description');
$button = get_field('button');

?>
<?php if (isset($block['data']['preview_image_help'])) : ?>
    <img src="<?= $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else : ?>
    <div class="section section-explore">
        <div class="container">
            <div class="d-flex">
                <div class="col-left">
                    <div class="image-box" style="padding-bottom: 180%;">
                        <img src="<?php echo $left_image; ?>" alt="image" />
                    </div>
                </div>
                <div class="col-right">
                    <div class="heading-text"><h4><?php echo $heading; ?></h4></div>
                    <div class="image-with-text-component text-left">
                        <div class="d-flex">
                            <div class="col-text">
                                <p><?php echo $description; ?></p>
                                <a href="btn btn-primary <?php echo $button['url'] ?>"><?php echo $button['title'] ?></a>
                            </div>
                            <div class="col-image">
                                <div class="image-box">
                                    <div class="bg" style="background-image: url('<?php echo $background_right_image; ?>')"></div>
                                    <img src="<?php echo $right_image; ?>" alt="image" />
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php endif; ?>