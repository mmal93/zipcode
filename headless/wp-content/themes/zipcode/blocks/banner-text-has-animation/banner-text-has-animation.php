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
$label = get_field('label');
$texts = get_field('texts');
?>
<?php if (isset($block['data']['preview_image_help'])) : ?>
    <img src="<?= $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else : ?>
    <?php if( isset($texts) ): ?>
        <section <?= get_wrapper_attributes($block) ?>>
            <div class="about-banner-top">
                <div class="container">
                    <div class="section-content">
                        <?php if(isset($label)): ?>
                            <h1><?php echo $label ?></h1>
                        <?php endif; ?>
                        <?php if(have_rows('texts')): ?>
                            <div class="content">
                                <div id="content-tooltip">
                                    <?php while( have_rows('texts') ): the_row(); 
                                        $text = get_sub_field('text');
                                        $image = get_sub_field('image');
                                    ?>
                                        <?php if($image != ''): ?>
                                            <span className="tt-image">
                                                <?php echo $text; ?>
                                                <img loading="lazy" src="<?php echo $image ?>" alt="" />
                                            </span>
                                        <?php else : echo $text;?>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </div>
                                <div id="tooltip"></div>                        
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </section>
    <?php endif; ?>
<?php endif; ?>