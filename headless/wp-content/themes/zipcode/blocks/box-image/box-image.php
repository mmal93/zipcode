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
$background_position = get_field('background_position');
$image = get_field('image');
$title = get_field('title');
$description = get_field('description');
$description_mobile = get_field('description_mobile');
$link = get_field('button');
?>

<?php if (isset($block['data']['preview_image_help'])) : ?>
    <img src="<?= $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else : ?>
    <?php if(isset($image) || isset($title) || isset($description) ): ?>
        <section <?= get_wrapper_attributes($block) ?>>
            <div className="container">
                    <div className="column-box">
                        <div className="column-image">
                            <?php if( isset($image)  ): ?>
                                <div className="image-inner">
                                    <img loading="lazy" src="<?php echo $image ?>" className="img" >
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if( isset($title) || isset($description) ): ?>
                            <div className="column-content">
                                <div className="content-inner">
                                    <h2 className="title"><?php echo $title ?></h2>
                                    <div className="content">
                                        <div className="description visible-desktop"><?php echo $description ?></div>
                                        <div className="description visible-mobile"><?php echo $description_mobile ?></div>
                                        <a className="btn btn-primary" href="<?php echo $link['url'] ?>"><?php echo $link['title'] ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
        </section>
    <?php endif; ?>
<?php endif; ?>

