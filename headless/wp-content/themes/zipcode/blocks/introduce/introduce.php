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

    <?php if(have_rows('introduces')): ?>
        <div class="section section-introduce" >
            <?php while( have_rows('introduces') ): the_row(); 
                $title = get_sub_field('title');
                $imgUrl = get_sub_field('image');
                $backgroundUrl = get_sub_field('background');
                $background_position = get_sub_field('background_position');
                if ($background_position == "right") {
                    $class = 'overlay-top-right';
                } else if ($background_position == "bottom") {
                    $class = 'overlay-bottom-center';
                } else {
                    $class = '';
                }
            ?>
                <?php if(isset($title) || isset($imgUrl)) : ?>
                    <section <?= get_wrapper_attributes($block) ?>>
                        <div class="image-with-text-component <?php echo ($index % 2 == 1) ? 'text-left' : 'text-right' ?> ">
                            <div class="d-flex">
                                <div class="col col-image col-right">
                                    <div class="image-box <?php echo $class; ?>" data-img="<?php echo $backgroundUrl; ?>">
                                        <div class="bg" style="background-image: url('<?php echo $backgroundUrl; ?>')"></div>
                                        <img src="<?php echo $imgUrl ?>" alt="image" />
                                    </div>
                                </div>
                                <div class="col col-text col-left">
                                    <p><?php echo $title ?></p>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
            <?php $index++; endwhile; ?>
        </div>
    <?php endif; ?>

<?php endif; ?>