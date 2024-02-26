<?php

/**
 * Plugin Name: Forminator Graphql
 * Version: 1.29.0
 * Plugin URI:  https://wpmudev.com/project/forminator/
 * Description: Capture user information (as detailed as you like), engage users with interactive polls that show real-time results and graphs, “no wrong answer” Facebook-style quizzes and knowledge tests.
 * Author: WPMU DEV
 * Author URI: https://wpmudev.com
 * Text Domain: forminator
 * Domain Path: /languages/
 * WDP ID: 2097296
 */
/*
Copyright 2009-2018 Incsub (http://incsub.com)
Author – Cvetan Cvetanov (cvetanov), Dixita Dusara (dency)
Contributors –

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License (Version 2 – GPLv2) as published by
the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

if (!defined('ABSPATH')) {
    die();
}
if (!class_exists('Forminator')) {

    add_action( 'rest_api_init', function () {
        register_rest_route( 'forminator/v1', '/save_form/', array(
            'methods' => 'POST',
            'callback' => 'save_form_data',
        ) );
    });

    function save_form_data( $request ) {
        echo '<pre>';
        var_dump($request);
        echo '</pre>';
        $data = $request->get_json_params();
        echo '<pre>';
        var_dump($data);
        echo '</pre>';die;
        // Xử lý dữ liệu form ở đây
        // Ví dụ: lưu dữ liệu vào bảng bài viết hoặc bảng tùy chỉnh

    }

    add_action('graphql_register_types', function () {
        
        register_graphql_field('RootQuery', 'getForminatorFormById', [
            'type' => 'String', // You may want to create a custom GraphQL type that matches the structure of your Forminator forms
            'description' => __('Get Forminator form fields and settings', 'your-textdomain'),
            'args' => [
                'id' => [
                    'type' => 'Int',
                    'description' => __('The ID of the Forminator form', 'your-textdomain'),
                ],
            ],
            'resolve' => function ($root, $args, $context, $info) {
                try {
                    $form_id = $args['id'] ?? null;

                    if (!$form_id) {
                        return 'Form ID not provided';
                    }

                    $form = get_post_meta($form_id, 'forminator_form_meta');

    
                    if ($form) {
                        return json_encode($form->to_array());
                    } else {
                        return [];
                    }
                } catch (\Throwable $th) {
                    //throw $th;
                    return $th->getMessage();
                }
            },
        ]);
    });
}
