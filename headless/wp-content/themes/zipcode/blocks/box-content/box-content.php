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

$title = get_field('title');
$description = get_field('description');
$link = get_field('button');
?>

<?php if (isset($block['data']['preview_image_help'])) : ?>
    <img src="<?= $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else : ?>
    <?php if(isset($title) || isset($description) ): ?>
        <section <?= get_wrapper_attributes($block) ?>>
            <div class="projects-box-content projects-section">
                <div class="container">
                    <div class="column-box">
                        <h2 class="title"><?php echo $title ?></h2>
                        <div class="content">
                            <div class="description"><?php echo $description ?></div>
                            <a class="btn btn-primary" href="<?php echo $link['url'] ?>"><?php echo $link['title'] ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>

