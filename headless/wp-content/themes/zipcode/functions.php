<?php

// add_editor_style('editor-style.css');
// custom logo
if (!function_exists('pcvue_setup')) {
    function pcvue_setup()
    {
        $logo_width = 300;
        $logo_height = 100;

        add_theme_support(
            'custom-logo',
            [
                'height' => $logo_height,
                'width' => $logo_width,
                'flex-width' => true,
                'flex-height' => true,
            ]
        );

        add_theme_support('post-thumbnails');
        add_editor_style();
        add_theme_support('wp-block-styles');
    }
}
add_action('after_setup_theme', 'pcvue_setup');
add_action('init', 'pcvue_setup');

/**
 * Enqueue styles for the block-based editor.
 */
function add_theme_block_editor_styles()
{
    // Block styles.
    wp_enqueue_style('theme-block-editor-style', get_template_directory_uri().'/editor-style.css');
}
add_action('enqueue_block_editor_assets', 'add_theme_block_editor_styles');

/**
 * Get Block BEM class name.
 *
 * @param string $bem_block_name
 *
 * @return string
 */
function generate_unique_block_id($bem_block_name = '')
{
    // Generate the BEM block class name if not provided:
    if ($bem_block_name === '') {
        try {
            $key = array_search(__FUNCTION__, array_column(debug_backtrace(), 'function'));
            $bem_block_name = basename(debug_backtrace()[$key]['file'], '.php');
        } catch (Exception $e) {
            $bem_block_name = 'bem-block-name-not-generated';
        }
    }

    return "{$bem_block_name}-".dechex(random_int(2 ** 18, (2 ** 19) - 1));
}
/**
 * Returns the HTML attributes for a block's wrapping (outermost) tag.
 *
 * @param array  $block          - The ACF block array
 * @param string $bem_block_name - a BEM-compliant CSS class name that will be used to construct the CSS classes
 *                               returned. Will be generated from the filename of the calling file if not provided.
 *
 * @return string - A compiled string of HTML attributes
 */
function get_wrapper_attributes($block, $bem_block_name = '')
{
    $attribute_string = '';
    if ($block !== false
        && $block !== null
        && is_array($block)
        && !empty($block)
    ) {
        // Generate the BEM block class name from the calling file if not provided:
        if ($bem_block_name === '') {
            try {
                $key = array_search(__FUNCTION__, array_column(debug_backtrace(), 'function'));
                $bem_block_name = basename(debug_backtrace()[$key]['file'], '.php');
            } catch (Exception $e) {
                $bem_block_name = 'bem-block-name-not-generated';
            }
        }
        // Initialize an array to hold the HTML tag attributes for the section wrapper, ready to process to a string:
        $section_attrs = [];
        // Support custom class name and align values from the WP Block:
        $wp_block_anchor = ($block ?? false) ? ($block['anchor'] ?? false ? $block['anchor'] : '') : '';
        $wp_block_align = ($block ?? false) ? ($block['align'] ?? false ? $block['align'] : '') : '';
        $wp_block_class_name = ($block ?? false) ? ($block['className'] ?? false ? $block['className'] : '') : '';

        // Section wrapper - Add values to the class attribute:
        $section_attrs['class'] = [
            $bem_block_name,
        ];
        if ($wp_block_class_name) {
            $section_attrs['class'][] = $wp_block_class_name;
        }
        // Block alignment, if set:
        if ($wp_block_align) {
            $section_attrs['class'][] = "{$bem_block_name}--align{$wp_block_align}";
            $section_attrs['class'][] = "align{$wp_block_align}";
        }
        // Section wrapper - Add the ID attribute, to support custom anchor / ID values passed from the WP Block:
        if (isset($block['anchor']) && !empty($block['anchor'])) {
            $attribute_string .= ' id="'.$wp_block_anchor.'"';
            $attribute_string .= ' key="'.$wp_block_anchor.'"';
        }
        $attribute_string .= ' class="'.implode(' ', $section_attrs['class']).'"';

        return $attribute_string;
    } else {
        return 'data-output="block not defined"';
    }
}

if (!function_exists('get_oembed_autoplay_html')) {
    /**
     * Return a oEmbed string with auto play attribute.
     *
     * @param string $oEmbed Is the oEmbed from Wordpress or ACF field
     *
     * @return string
     */
    function get_oembed_autoplay_html($oEmbed = '')
    {
        if ('' === $oEmbed) {
            return '';
        }
        $oEmbed = str_replace('/]', 'loop=1 autoplay=1 muted=1 /]', $oEmbed);
        $oEmbedHTML = do_shortcode($oEmbed);
        // Use preg_match to find $oEmbed src.
        preg_match('/src="(.+?)"/', $oEmbedHTML, $matches);
        $src = (string) $matches[1];
        // Add extra parameters to src and replace HTML.
        $params = [
            'background' => 0,
            'controls' => 1,
            'hd' => 1,
            'autohide' => 1,
            'autoplay' => 0,
            'loop' => 0,
            'autopause' => 1,
            'playsinline' => 1,
            'showinfo' => 0,
            'rel' => 0,
            'mute' => 0,
            'enablejsapi' => 1,
        ];
        $new_src = (string) add_query_arg($params, $src);
        $oEmbedHTML = str_replace($src, $new_src, $oEmbedHTML);
        // Add extra attributes to $oEmbed HTML.
        $attributes = 'frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen';
        $oEmbedHTML = str_replace('></iframe>', ' '.$attributes.'></iframe>', $oEmbedHTML);
        $oEmbedHTML = str_replace('<iframe ', '<iframe ', $oEmbedHTML);

        // return customized HTML.
        return $oEmbedHTML;
    }
}

if (!function_exists('get_you_tube_video_id')) {
    /**
     * Return youtube video ID from embed string.
     *
     * @param string $url Is youtube url
     *
     * @return string string | null
     */
    function get_you_tube_video_id($url)
    {
        $pattern = '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';

        preg_match($pattern, $url, $matches);

        if (isset($matches[1])) {
            return $matches[1];
        } else {
            // URL doesn't match expected pattern
            return null;
        }
    }
}

if (!function_exists('get_svg_inline_from_asset')) {
    /**
     * Return SVG inline from assets folder.
     *
     * @param int $image_path Is name of the SVG
     *
     * @return string '' or SVG inline string
     */
    function get_svg_inline_from_asset($image_path)
    {
        $svg_content = '';
        // Get attachment metadata
        // Get the file path of the attachment
        $file_path = get_stylesheet_directory().$image_path;
        // Check if the file path is valid
        if ($file_path) {
            // Read the content of the SVG file
            $svg_content = file_get_contents($file_path);
            // Output the SVG code
        }

        return $svg_content;
    }
}



/**
 * Adding a new (custom) block category.
 *
 * @param array $block_categories array of categories for block types
 */
function theme_add_new_block_category($categories)
{
    $custom_category = [
        'slug' => 'zipcode',
        'title' => esc_html__('ZipCode'),
        'icon' => 'superhero-alt',
    ];
    array_unshift($categories, $custom_category);
    return $categories;
}

add_filter('block_categories_all', 'theme_add_new_block_category', 9999);

function theme_register_acf_blocks()
{
    /*
     * We register our block's with WordPress's handy
     * register_block_type();
     *
     * @link https://developer.wordpress.org/reference/functions/register_block_type/
     */
    /* Help Center */
    register_block_type(get_template_directory().'/blocks/youtube-slider');
    register_block_type(get_template_directory().'/blocks/banner-text-center',
        array(
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' => get_template_directory_uri() . '/blocks/banner-text-center/banner-text-center.jpg',
                    )
                )
            )
        )
    );
    register_block_type(get_template_directory().'/blocks/introduce',
        array(
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' => get_template_directory_uri() . '/blocks/introduce/introduce.jpg',
                    )
                )
            )
        )
    );
    register_block_type(get_template_directory().'/blocks/company',
        array(
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' => get_template_directory_uri() . '/blocks/company/company.jpg',
                    )
                )
            )
        )
    );
    register_block_type(get_template_directory().'/blocks/explore',
        array(
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' => get_template_directory_uri() . '/blocks/explore/explore.jpg',
                    )
                )
            )
        )
    );
    register_block_type(get_template_directory().'/blocks/banner-with-image-right',
        array(
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' => get_template_directory_uri() . '/blocks/banner-with-image-right/banner-with-image-right.jpg',
                    )
                )
            )
        )
    );
    register_block_type(get_template_directory().'/blocks/number-text-image-repeater',
        array(
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' => get_template_directory_uri() . '/blocks/number-text-image-repeater/number-text-image-repeater.jpg',
                    )
                )
            )
        )
    );
    register_block_type(get_template_directory().'/blocks/box-image',
        array(
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' => get_template_directory_uri() . '/blocks/box-image/box-image.jpg',
                    )
                )
            )
        )
    );
    register_block_type(get_template_directory().'/blocks/box-content',
        array(
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' => get_template_directory_uri() . '/blocks/box-content/box-content.jpg',
                    )
                )
            )
        )
    );
    register_block_type(get_template_directory().'/blocks/projects-banner',
        array(
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' => get_template_directory_uri() . '/blocks/projects-banner/projects-banner.jpg',
                    )
                )
            )
        )
    );
    register_block_type(get_template_directory().'/blocks/our-team',
        array(
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' => get_template_directory_uri() . '/blocks/our-team/our-team.jpg',
                    )
                )
            )
        )
    );
    register_block_type(get_template_directory().'/blocks/text-center-with-link',
        array(
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' => get_template_directory_uri() . '/blocks/text-center-with-link/text-center-with-link.jpg',
                    )
                )
            )
        )
    );
    register_block_type(get_template_directory().'/blocks/marquee',
        array(
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' => get_template_directory_uri() . '/blocks/marquee/marquee.jpg',
                    )
                )
            )
        )
    );
    register_block_type(get_template_directory().'/blocks/banner-text-has-animation',
        array(
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' => get_template_directory_uri() . '/blocks/banner-text-has-animation/banner-text-has-animation.jpg',
                    )
                )
            )
        )
    );
    register_block_type(
        get_template_directory() . '/blocks/life-zip-code',
        array(
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' => get_template_directory_uri() . '/blocks/life-zip-code/life-zip-code.jpg',
                    )
                )
            )
        )
    );
    register_block_type(
        get_template_directory() . '/blocks/banner-three-columns',
        array(
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' => get_template_directory_uri() . '/blocks/banner-three-columns/banner-three-columns.jpg',
                    )
                )
            )
        )
    );
    register_block_type(
        get_template_directory() . '/blocks/gallery-two-columns',
        array(
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' => get_template_directory_uri() . '/blocks/gallery-two-columns/gallery-two-columns.jpg',
                    )
                )
            )
        )
    );
    register_block_type(
        get_template_directory() . '/blocks/listing-three-columns',
        array(
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' => get_template_directory_uri() . '/blocks/listing-three-columns/listing-three-columns.jpg',
                    )
                )
            )
        )
    );
    register_block_type(
        get_template_directory() . '/blocks/contact-information',
        array(
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' => get_template_directory_uri() . '/blocks/contact-information/contact-information.jpg',
                    )
                )
            )
        )
    );
}
add_action('init', 'theme_register_acf_blocks');


add_action('graphql_register_types', function () {
    register_graphql_field('RootQuery', 'getForminatorForm', [
        'type' => 'String', // You may want to create a custom GraphQL type that matches the structure of your Forminator forms
        'description' => __('Get Forminator form fields and settings', 'your-textdomain'),
        'args' => [
            'id' => [
                'type' => 'Int',
                'description' => __('The ID of the Forminator form', 'your-textdomain'),
            ],
        ],
        'resolve' => function ($root, $args, $context, $info) {
            $form_id = $args['id'] ?? null;

            if (!$form_id) {
                return 'Form ID not provided';
            }

            $form = Forminator_API::get_form($form_id);

            // Check if the form is an instance of Forminator_Base_Form_Model
            if ($form instanceof Forminator_Base_Form_Model) {
                // Convert the form object to an array or your desired format
                // This might require custom handling based on the structure of Forminator_Base_Form_Model
                return json_encode($form->to_array()); // Replace 'to_array()' with the appropriate method or handling
            } else {
                // Handle the case where the form is not a valid instance
                return 'Invalid form object or form not found';
            }
        },
    ]);
});

/**
 * Gets an HTML img element representing an image attachment.
 *
 * While `$size` will accept an array, it is better to register a size with
 * add_image_size() so that a cropped version is generated. It's much more
 * efficient than having to find the closest-sized image and then having the
 * browser scale down the image.
 *
 * @since 2.5.0
 * @since 4.4.0 The `$srcset` and `$sizes` attributes were added.
 * @since 5.5.0 The `$loading` attribute was added.
 * @since 6.1.0 The `$decoding` attribute was added.
 *
 * @param int          $attachment_id Image attachment ID.
 * @param string|int[] $size          Optional. Image size. Accepts any registered image size name, or an array
 *                                    of width and height values in pixels (in that order). Default 'thumbnail'.
 * @param bool         $icon          Optional. Whether the image should be treated as an icon. Default false.
 * @param string|array $attr {
 *     Optional. Attributes for the image markup.
 *
 *     @type string       $src      Image attachment URL.
 *     @type string       $class    CSS class name or space-separated list of classes.
 *                                  Default `attachment-$size_class size-$size_class`,
 *                                  where `$size_class` is the image size being requested.
 *     @type string       $alt      Image description for the alt attribute.
 *     @type string       $srcset   The 'srcset' attribute value.
 *     @type string       $sizes    The 'sizes' attribute value.
 *     @type string|false $loading  The 'loading' attribute value. Passing a value of false
 *                                  will result in the attribute being omitted for the image.
 *                                  Defaults to 'lazy', depending on wp_lazy_loading_enabled().
 *     @type string       $decoding The 'decoding' attribute value. Possible values are
 *                                  'async' (default), 'sync', or 'auto'. Passing false or an empty
 *                                  string will result in the attribute being omitted.
 * }
 * @return array img element attributes or empty string on failure.
 */
function get_attachment_image_for_acf($attachment_id, $size = 'thumbnail', $icon = false, $attr = '')
{
    $image = wp_get_attachment_image_src($attachment_id, $size, $icon);
    if ($image) {
        list($src, $width, $height) = $image;
        $attachment = get_post($attachment_id);
        $size_class = $size;
        if (is_array($size_class)) {
            $size_class = implode('x', $size_class);
        }
        $default_attr = [
            'src' => $src,
            'class' => "attachment-$size_class size-$size_class",
            'alt' => trim(strip_tags(get_post_meta($attachment_id, '_wp_attachment_image_alt', true))),
        ];
        $context = apply_filters('wp_get_attachment_image_context', 'wp_get_attachment_image');
        $attr = wp_parse_args($attr, $default_attr);
        $loading_attr = $attr;
        $loading_attr['width'] = $width;
        $loading_attr['height'] = $height;
        $loading_optimization_attr = wp_get_loading_optimization_attributes(
            'img',
            $loading_attr,
            $context
        );
        // Add loading optimization attributes if not available.
        $attr = array_merge($attr, $loading_optimization_attr);
        // Omit the `decoding` attribute if the value is invalid according to the spec.
        if (empty($attr['decoding']) || !in_array($attr['decoding'], ['async', 'sync', 'auto'], true)) {
            unset($attr['decoding']);
        }
        /*
        * If the default value of `lazy` for the `loading` attribute is overridden
        * to omit the attribute for this image, ensure it is not included.
        */
        if (isset($attr['loading']) && !$attr['loading']) {
            unset($attr['loading']);
        }
        // If the `fetchpriority` attribute is overridden and set to false or an empty string.
        if (isset($attr['fetchpriority']) && !$attr['fetchpriority']) {
            unset($attr['fetchpriority']);
        }
        // Generate 'srcset' and 'sizes' if not already present.
        if (empty($attr['srcset'])) {
            $image_meta = wp_get_attachment_metadata($attachment_id);
            if (is_array($image_meta)) {
                $size_array = [absint($width), absint($height)];
                $srcset = wp_calculate_image_srcset($size_array, $src, $image_meta, $attachment_id);
                $sizes = wp_calculate_image_sizes($size_array, $src, $image_meta, $attachment_id);

                if ($srcset && ($sizes || !empty($attr['sizes']))) {
                    $attr['srcset'] = $srcset;

                    if (empty($attr['sizes'])) {
                        $attr['sizes'] = $sizes;
                    }
                }
            }
        }
        $attr = apply_filters('wp_get_attachment_image_attributes', $attr, $attachment, $size);
        $attr = array_map('esc_attr', $attr);
        return $attr;
    } else {
        return false;
    }
}

/**
 * Re-attach image to ACF block GraphQL response
 * @param array $data
 * @param string $key
 * @return void
 */
function re_attach_image(&$data, $key)
{
    if (isset($data['data'][$key]) && is_numeric($data['data'][$key])) {
        $data['data'][$key] = get_attachment_image_for_acf($data['data'][$key], 'full');
    }
}

/**
 * Process ACF block attributes - re-attach images attributes
 */
add_filter('wp_graphql_blocks_process_attributes', function ($attributes) {
    switch ($attributes['name']) {
        case 'acf/banner-with-image-right':
            re_attach_image($attributes, 'background');
            re_attach_image($attributes, 'image');
            break;
        case 'acf/number-text-image-repeater':
            // convert data section to section array
            $sections = [];
            for ($i = 0; true; $i++) {
                $section = [];
                if (!isset($attributes['data']["sections_{$i}_title"])) {
                    break;
                }
                re_attach_image($attributes, "sections_{$i}_image");
                re_attach_image($attributes, "sections_{$i}_background");
                $section['title']       = $attributes['data']["sections_{$i}_title"];
                $section['description'] = $attributes['data']["sections_{$i}_description"];
                $section['image']       = $attributes['data']["sections_{$i}_image"];
                $section['background']  = $attributes['data']["sections_{$i}_background"];
                $sections[]             = $section;
            }
            $attributes['data']['sections'] = $sections;
            break;
        case 'acf/banner-text-has-animation':
            // convert data section to section array
            $sections = [];
            for ($i = 0; true; $i++) {
                $section = [];
                if (!isset($attributes['data']["texts_{$i}_text"]) && !isset($attributes['data']["texts_{$i}_image"])) {
                    break;
                }
                re_attach_image($attributes, "texts_{$i}_text");
                re_attach_image($attributes, "texts_{$i}_image");
                $section['text']        = $attributes['data']["texts_{$i}_text"];
                $section['image']       = $attributes['data']["texts_{$i}_image"];
                $sections[]             = $section;
            }
            $attributes['data']['texts'] = $sections;
            break;
        case 'acf/marquee':
            // convert data section to section array
            re_attach_image($attributes, 'background');
            $lists = [];
            for ($i = 0; true; $i++) {
                $list = [];
                if (!isset($attributes['data']["list_{$i}_name"])) {
                    break;
                }
                $list['name']        = $attributes['data']["list_{$i}_name"];
                $lists[]             = $list;
            }
            $attributes['data']['lists'] = $lists;
            break;
        case 'acf/box-image':
            // convert data section to section array
            re_attach_image($attributes, 'image');
            break;
        case 'acf/our-team':
            // convert data section to section array
            $peoples = [];
            for ($i = 0; true; $i++) {
                $people = [];
                if (!isset($attributes['data']["people_{$i}_name"])) {
                    break;
                }
                re_attach_image($attributes, "people_{$i}_avatar");
                $people['name']                 = $attributes['data']["people_{$i}_name"];
                $people['position']             = $attributes['data']["people_{$i}_position"];
                $people['short_description']    = $attributes['data']["people_{$i}_short_description"];
                $people['avatar']               = $attributes['data']["people_{$i}_avatar"];
                $peoples[]                      = $people;
            }
            $attributes['data']['peoples'] = $peoples;
            break;
        case 'acf/text-center-with-link':
            // convert data section to section array
            re_attach_image($attributes, 'background');
            break;
        case 'acf/life-zip-code':
            re_attach_image($attributes, 'background');
            // convert data section to section array
            $gallery_items = [];
            for ($i = 0; true; $i++) {
                $gallery_item = [];
                if (!isset($attributes['data']["gallery_{$i}_image"])) {
                    break;
                }
                re_attach_image($attributes, "gallery_{$i}_image");
                $gallery_item       = $attributes['data']["gallery_{$i}_image"];
                $gallery_items[]    = $gallery_item;
            }
            $attributes['data']['gallery'] = $gallery_items;
            break;
        case 'acf/banner-three-columns':
            re_attach_image($attributes, "culture_image");
            break;
        case 'acf/gallery-two-columns':
            // convert data section to section array
            $gallery = [];
            for ($i = 0; true; $i++) {
                $gallery_item = [];
                if (!isset($attributes['data']["gallery_{$i}_item_title"])) {
                    break;
                }
                re_attach_image($attributes, "gallery_{$i}_image_1");
                re_attach_image($attributes, "gallery_{$i}_image_2");
                $gallery_item['item_title']     = $attributes['data']["gallery_{$i}_item_title"];
                $gallery_item['content']        = $attributes['data']["gallery_{$i}_content"];
                $gallery_item['image_1']        = $attributes['data']["gallery_{$i}_image_1"];
                $gallery_item['image_2']        = $attributes['data']["gallery_{$i}_image_2"];
                $gallery[]                      = $gallery_item;
            }
            $attributes['data']['gallery'] = $gallery;
            break;
        // case 'acf/listing-three-columns':
        //     // convert data section to section array
        //     $sliders = [];
        //     for ($i = 0; true; $i++) {
        //         $slider = [];
        //         if (!isset($attributes['data']["slider_{$i}_image"])) {
        //             break;
        //         }
        //         re_attach_image($attributes, "slider_{$i}_image");
        //         $slider['title']        = $attributes['data']["slider_{$i}_title"];
        //         $slider['excerpt']      = $attributes['data']["slider_{$i}_excerpt"];
        //         $slider['image']        = $attributes['data']["slider_{$i}_image"];
        //         $sliders[]              = $slider;
        //     }
        //     $attributes['data']['sliders'] = $sliders;
        //     break;
        case 'acf/listing-three-columns':
            // convert data section to section array
            $list = [];
            for ($i = 0; true; $i++) {
                $item = [];
                if (!isset($attributes['data']["listing_{$i}_content"])) {
                    break;
                }
                $item['content'] = $attributes['data']["listing_{$i}_content"];
                $list[] = $item;
            }
            $attributes['data']['list'] = $list;
            break;
        case 'acf/contact-information':
            $attributes['data']['form_shortcode'] = do_shortcode($attributes['data']['form_shortcode']);
            break;
        case 'acf/projects-banner':
            re_attach_image($attributes, 'background_image');
            // convert data section to section array
            $content = [];
            for ($i = 0; true; $i++) {
                $item = [];
                if (!isset($attributes['data']["content_{$i}_line_0_text"])) {
                    break;
                }
                $line = [];
                for ($j = 0; true; $j++) {
                    $line_item = [];
                    if (!isset($attributes['data']["content_{$i}_line_{$j}_text"])) {
                        break;
                    }
                    re_attach_image($attributes, "content_{$i}_line_{$j}_image");
                    $line_item['image'] = $attributes['data']["content_{$i}_line_{$j}_image"];
                    $line_item['text'] = $attributes['data']["content_{$i}_line_{$j}_text"];
                    $line[] = $line_item;
                }
                $item['line'] = $line;
                $popup_slider = [];
                for ($j = 0; true; $j++) {
                    $popup_slider_item = [];
                    if (!isset($attributes['data']["content_{$i}_popup_slider_{$j}_image"])) {
                        break;
                    }
                    re_attach_image($attributes, "content_{$i}_popup_slider_{$j}_image");
                    $popup_slider_item['text'] = $attributes['data']["content_{$i}_popup_slider_{$j}_text"];
                    $popup_slider_item['image'] = $attributes['data']["content_{$i}_popup_slider_{$j}_image"];
                    $popup_slider[] = $popup_slider_item;
                }
                $item['popup_slider'] = $popup_slider;
                $item['small_text'] = $attributes['data']["content_{$i}_small_text"];
                $item['popup_description'] = $attributes['data']["content_{$i}_popup_description"];
                $content[] = $item;
            }
            $attributes['data']['content'] = $content;
            break;
        case 'acf/banner-text-center':
            re_attach_image($attributes, 'background');
            break;
        case 'acf/introduce':
            // convert data section to section array
            $introduces = [];
            for ($i = 0; true; $i++) {
                $introduce = [];
                if (!isset($attributes['data']["introduces_{$i}_title"])) {
                    break;
                }
                re_attach_image($attributes, "introduces_{$i}_image");
                re_attach_image($attributes, "introduces_{$i}_background");
                $introduce['title']                 = $attributes['data']["introduces_{$i}_title"];
                $introduce['image']                 = $attributes['data']["introduces_{$i}_image"];
                $introduce['background']            = $attributes['data']["introduces_{$i}_background"];
                $introduce['background_position']   = $attributes['data']["introduces_{$i}_background_position"];
                $introduces[]                       = $introduce;
            }
            $attributes['data']['introduces'] = $introduces;
            break;
        case 'acf/company':
            re_attach_image($attributes, 'background_section');
            re_attach_image($attributes, 'background_text');
            re_attach_image($attributes, 'owner_image');
            break;
        case 'acf/explore':
            re_attach_image($attributes, 'left_image');
            re_attach_image($attributes, 'right_image');
            re_attach_image($attributes, 'background_right_image');
            break;
        default:
            break;
    }
    return $attributes;
}, 0, 3);

add_theme_support('menus');

register_nav_menus(
    array(
    'primary-menu' => __( 'Primary Menu' ),
    'secondary-menu' => __( 'Secondary Menu' )
    )
);