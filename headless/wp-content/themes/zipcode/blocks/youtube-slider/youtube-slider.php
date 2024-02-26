<?php

/**
 * Corp Site Youttube Slider Block template.
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
$section_title      = get_field('section_title');
$items              = get_field('items');
$view_channel_url   = get_field('view_channel_url');
$icon_play          = get_svg_inline_from_asset('/assets/images/icon-play.svg');
if ($section_title) {
    $section_title = '<h2 class="' . $bem_block_name . '__title fade-left" data-delay="0.5"><img src="' . get_template_directory_uri() . '/assets/images/icon-heading.svg" />' . $section_title . '</h2>';
} else {
    $section_title = '';
}
if ($view_channel_url) {
    $view_channel_url = '<a href="' . $view_channel_url['target']  . '" class="button roll ' . $bem_block_name . '__view-channel" href="' . $view_channel_url['url'] . '">' . $view_channel_url['title'] . '<span></a>';
} else {
    $view_channel_url = '';
}
?>
<section <?= get_wrapper_attributes($block) ?>>
    <div class="<?= $bem_block_name ?>-container container">
        <?= $section_title ?>
        <?php if ($items && is_array($items) && count($items) > 0) : ?>
            <div class="<?= $bem_block_name ?>-slider swiper">
                <div class="<?= $bem_block_name ?>__nav fade-right" data-delay="0.5">
                    <a class="youtube-slider__nav-prev button roll roll-v2 roll-prev"><span></span></a>
                    <a class="youtube-slider__nav-next button roll roll-v2 roll-next"><span></span></a>
                </div>
                <div class="swiper-wrapper">
                    <?php
                    $counter = 0;
                    foreach ($items as $item) :
                        $counter++;
                        $background_image   = $item['background_image'];
                        $video_url          = $item['video_url'];
                        $youtube_id         = '';
                        $video_title        = $item['video_title'];
                        $video_id           = $block['anchor'] . '-video-' . $counter;
                        if ($background_image) {
                            $background_image = $icon_play . '<div class="' . $bem_block_name . '__background-image" style="background-image: url(' . $background_image . ');"></div>';
                        } else {
                            $background_image = '';
                        }
                        if ($video_url) {
                            $youtube_id = get_you_tube_video_id($video_url);
                            $video_url = str_replace(
                                '<iframe ',
                                '<iframe id="' . $video_id . '" class="embed-iframe youtube-slider__video" ',
                                get_oembed_autoplay_html($video_url)
                            );
                        } else {
                            $video_url = '';
                        }
                        if ($video_title) {
                            $video_title = '<h3 class="' . $bem_block_name . '__video-title">' . $video_title . '</h3>';
                        } else {
                            $video_title = '';
                        }
                        ?>
                        <div class="<?= $bem_block_name ?>__item swiper-slide fade-up" data-delay="<?= 0.5 + $counter / 10 ?>">
                            <div class="<?= $bem_block_name ?>__wrapper" youtubeid="<?= $youtube_id ?>">
                                <?= $background_image ?>
                                <?= $video_url ?>
                            </div>
                            <?= $video_title ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="<?= $bem_block_name ?>__pagination swiper-pagination fade-up" data-delay="0.5"></div>
            </div>
        <?php endif; ?>
        <p class="<?= $bem_block_name ?>__actions fade-up" data-delay="0.5"><?= $view_channel_url ?></p>
    </div>
</section>