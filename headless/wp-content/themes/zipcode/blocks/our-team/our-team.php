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
$title = get_field('title');
$description = get_field('description');
$section_color = get_field('section_color');
$people = get_field('people');

if($section_color == 'dark') {
    $background_color = '#1e1e1e';
    $text_color = '#fff';
    $hover_effect_color = '#0068ff';
} else {
    $background_color = '#fff';
    $text_color = '#000';
    $hover_effect_color = '#1e1e1e';
}

?>
<?php if (isset($block['data']['preview_image_help'])) : ?>
    <img src="<?= $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else : ?>
    <?php if( isset($title) || isset($people) ): ?>
        <section <?= get_wrapper_attributes($block) ?>  style="background-color:<?php echo $background_color; ?>">
            <div class="container">
                <div class="our-teams-wrapper">
                    <?php if($title != ''): ?>
                    <div class="section-heading">
                        <h5 class="h5" style="color:<?php echo $text_color; ?>"><?php echo $title; ?></h5>
                    </div>
                    <?php endif; ?>
                    <?php if($description != ''): ?>
                        <div class="description" style="color:<?php echo $text_color; ?>"><?php echo $description; ?></div>
                    <?php endif; ?>
                    <?php if(have_rows('people')): ?>
                        <div class="section-content swiper-container">
                            <div class="swiper-wrapper" style="gap: 20px;display:flex;">
                                <?php while( have_rows('people') ): the_row(); 
                                    $name = get_sub_field('name');
                                    $position = get_sub_field('position');
                                    $short_description = get_sub_field('short_description');
                                    $avatar = get_sub_field('avatar');
                                ?>
                                    <div class="swiper-slide" style="width: calc((100% - 40px) / 3);">
                                        <div class="item-inner">
                                            <div class="item-image">
                                                <div class="bg"  style="background-color:<?php echo $hover_effect_color; ?>"></div>
                                                <div class="image-inner">
                                                    <img src="<?php echo $avatar ?>" 
                                                        alt="<?php echo $name ?>" 
                                                    />
                                                </div>
                                                <div class="item-info">
                                                    <p><?php echo $short_description ?></p>
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                <?php if($name != ''): ?>
                                                    <h6 class="item-name" style="color:<?php echo $text_color; ?>"><?php echo $name ?></h6>
                                                <?php endif; ?>
                                                <?php if($position != ''): ?>
                                                    <div class="item-position" style="color:<?php echo $text_color; ?>"><?php echo $position ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>