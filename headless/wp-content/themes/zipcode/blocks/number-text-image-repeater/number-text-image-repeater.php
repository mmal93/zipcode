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
$index = 1;

?>
<?php if (isset($block['data']['preview_image_help'])) : ?>
    <img src="<?= $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else : ?>

<?php if(have_rows('sections')): ?>
    <?php while( have_rows('sections') ): the_row(); 
        $title = get_sub_field('title');
        $des = get_sub_field('description');
        $imgUrl = get_sub_field('image');
        $backgroundUrl = get_sub_field('background');
        $isDarkBackground = get_sub_field('is_dark_section');
    ?>
        <?php if(isset($title) || isset($des) || isset($imgUrl) ): ?>
            <section <?= get_wrapper_attributes($block) ?>>
                <div class="phi-content-container <?php echo ($isDarkBackground) ? 'bg-black' : ''; ?>"  style="background-image: url(<?php echo $backgroundUrl ?>)">
                    <div class="container <?php echo ($index % 2 === 0) ? 'img-right' : 'img-left'; ?>">
                        <?php if(isset($imgUrl)): ?>
                            <div class="image-container img-dk">
                                <div class="image" style="background-image: url(<?php echo $imgUrl ?>)"></div>
                            </div>
                        <?php endif; ?>
                        <?php if(isset($title) || isset($des) ): ?>
                            <div class="content">
                                <div class="label"><?php echo ($index < 10) ? '0' . $index : $index; ?></div>
                                <div class="text-container">
                                    <?php if(isset($title)): ?>
                                        <div class="title"><?php echo $title ?></div> 
                                    <?php endif; ?>
                                    <?php if(isset($imgUrl)): ?>
                                        <div class="image-container img-mb">
                                            <div class="image" style="background-image: url(<?php echo $imgUrl ?>)"></div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(isset($des)): ?>
                                        <div class="des"><?php echo $des ?></div> 
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php $index++; endwhile; ?>
<?php endif; ?>

<?php endif; ?>