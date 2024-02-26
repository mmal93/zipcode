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
$background_image = get_field('background_image');
?>

<?php if (isset($block['data']['preview_image_help'])) : ?>
    <img src="<?= $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else : ?>
    <?php if(isset($label) || isset($background_image) ): ?>
        <section>
            <div class="projects-banner projects-section" style="background-image: url('<?php echo  $background_image ?>')">

                <div class="container">
                    <div class="section-content">
                        <div class="content-inner">
                            <?php if($label != ''): ?>
                                <h1 class="title h5 small"><?php echo $label ?></h1>
                            <?php endif; ?>
                            <?php if(have_rows('content')): ?>
                                <div class="projects-items">
                                    <?php while( have_rows('content') ): the_row(); ?>
                                        <div class="item projects-popup-item projects-popup-item-2" id="projects-popup-item-2" data-image="https://maasi2404zip.merket.io/wp-content/uploads/2024/02/page-projects-image-3.jpg" data-popup="projects-popup-2">
                                            <div class="item-inner text-center">
                                                <h3>
                                                    <?php if(have_rows('line')): ?>

                                                        <?php while( have_rows('line') ): the_row(); 
                                                            $text = get_sub_field('text');
                                                            $image = get_sub_field('image');
                                                        ?>
                                                            <?php if($image != ''): ?>
                                                                <span class="image">
                                                                    <?php echo $text; ?>
                                                                    <img src="<?php echo $image ?>" alt="" />
                                                                </span>
                                                            <?php else : echo $text;?>
                                                            <?php endif; ?>
                                                        <?php endwhile; ?>

                                                    <?php endif; ?>
                                                    
                                                    <?php if(get_sub_field("small_text")): ?>
                                                        <div class="subheading"><?php echo get_sub_field("small_text") ?></div>
                                                    <?php endif; ?>
                                                    <button class="btn btn-secondary visible-tablet visible-mobile">{ProjectBannerButton}</button>
                                                    
                                                </h3>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>

