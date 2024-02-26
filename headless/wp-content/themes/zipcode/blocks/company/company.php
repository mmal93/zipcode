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
$background_section = get_field('background_section');
$title = get_field('title');
$text_top = get_field('text_top');
$text_middle = get_field('text_middle');
$text_bottom = get_field('text_bottom');
$background_text = get_field('background_text');
$owner_image = get_field('owner_image');
$description = get_field('description');
$button = get_field('button');

?>
<?php if (isset($block['data']['preview_image_help'])) : ?>
    <img src="<?= $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else : ?>
    <div class="section section-company" style="background-image: url('<?php echo $background_section ?>')">
        <div class="container">
            <div class="title"><h2><?php echo $title ?></h2></div>
            <div class="company-box">
                <div class="image-box">
                    <img src="<?php echo $background_text ?>" alt="image" />
                </div>
                <div class="text text--top"><?php echo $text_top ?></div>
                <div class="text text--middle"><?php echo $text_middle ?></div>
                <div class="text text--bottom"><?php echo $text_bottom ?></div>
            </div>
            <div class="company--image--text">
                <div class="c-image">
                    <div class="image-box">
                        <img src="<?php echo $owner_image ?>" alt="image" />
                    </div>
                </div>
                <div class="c-text">
                    <p><?php echo $description ?></p>
                    <a href="btn btn-primary <?php echo $button['url'] ?>"><?php echo $button['title'] ?>
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="10" viewBox="0 0 12 10" fill="none">
                                <path d="M6.70505 9.5L5.93942 8.74432L9.09141 5.59233H0.928058V4.49858H9.09141L5.93942 1.35653L6.70505 0.590909L11.1596 5.04545L6.70505 9.5Z" fill="white" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>


<?php endif; ?>