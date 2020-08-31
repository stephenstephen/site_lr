<?php

namespace OXI_IMAGE_HOVER_PLUGINS\Modules\Display\Render;

if (!defined('ABSPATH')) {
    exit;
}

use OXI_IMAGE_HOVER_PLUGINS\Page\Public_Render;
use OXI_IMAGE_HOVER_PLUGINS\Modules\Display\Files\Style_1_Post_Query as Post_Query;

class Effects1 extends Public_Render {

    public function public_jquery() {
        wp_enqueue_script('oxi_image_style-1-loader', OXI_IMAGE_HOVER_URL . '/Modules/Display/Files/style-1-loader.js', false, OXI_IMAGE_HOVER_PLUGIN_VERSION);
        $this->JSHANDLE = 'oxi_image_style-1-loader';
        wp_localize_script('oxi_image_style-1-loader', 'ImageHoverUltimate', array(
            'root' => esc_url_raw(rest_url()),
            'nonce' => wp_create_nonce('wp_rest')
        ));
    }

    public function public_css() {
        wp_enqueue_style('oxi-image-hover-display-style-1', OXI_IMAGE_HOVER_URL . '/Modules/Display/Files/style-1.css', false, OXI_IMAGE_HOVER_PLUGIN_VERSION);
    }

    public function render() {
        echo '<div class="oxi-addons-container ' . $this->WRAPPER . ' oxi-image-hover-wrapper-' . (array_key_exists('display_post_style', $this->style) ? $this->style['display_post_style'] : '') . '" id="' . $this->WRAPPER . '">
                 <div class="oxi-addons-row">';
        $this->default_render($this->style, $this->child, $this->admin);
        echo '   </div>
             </div>';
    }

    public function default_render($style, $child, $admin) {
        if (!array_key_exists('display_post_style', $style)):
            echo '<p>Kindly Select Image Effects Frist to Extend Post.</p>';
            return;
        endif;
        $args = [
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
            'post_type' => $style['display_post_post_type'],
            'orderby' => $style['display_post_orderby'],
            'order' => $style['display_post_ordertype'],
            'posts_per_page' => $style['display_post_per_page'],
            'offset' => $style['display_post_offset'],
            'tax_query' => [],
        ];
        if (!empty($style['display_post_author'])):
            $args['author__in'] = $style['display_post_author'];
        endif;

        $type = $style['display_post_post_type'];

        if (!empty($style[$type . '_exclude'])) {
            $args['post__not_in'] = $style[$type . '_exclude'];
        }
        if (!empty($style[$type . '_include'])) {
            $args['post__in'] = $style[$type . '_include'];
        }
        if ($type != 'page') :
            if (!empty($style[$type . '_category'])) :
                $args['tax_query'][] = [
                    'taxonomy' => $type == 'post' ? 'category' : $type . '_category',
                    'field' => 'term_id',
                    'terms' => $style[$type . '_category'],
                ];
            endif;
            if (!empty($style[$type . '_tag'])) :
                $args['tax_query'][] = [
                    'taxonomy' => $type . '_tag',
                    'field' => 'term_id',
                    'terms' => $style[$type . '_tag'],
                ];
            endif;
            if (!empty($args['tax_query'])) :
                $args['tax_query']['relation'] = 'OR';
            endif;
        endif;
        $settings = [
            'display_post_style' => $style['display_post_style'],
            'display_post_thumb_sizes' => $style['display_post_thumb_sizes'],
            'display_post_excerpt' => $style['display_post_excerpt'],
        ];
        ob_start();
        new Post_Query('post_query', 'nai', $args, $settings);
        $oh = ob_get_clean();
        echo str_replace('Image Hover Empty Data', '', $oh);
        if ('yes' == $style['display_post_load_more']) {
            if ($style['display_post_load_more_type'] == 'button'):
                echo '  <div class="oxi-image-hover-load-more-button-wrap oxi-bt-col-sm-12">
                            <button class="oxi-image-load-more-button" data-class="OXI_IMAGE_HOVER_PLUGINS\Modules\Display\Files\Style_1_Post_Query" data-function="__rest_api_post" data-args=\'' . json_encode($args) . '\' data-settings=\'' . json_encode($settings) . '\' data-page="1">
                                    <div class="oxi-image-hover-loader button__loader"></div>
                                    <span>' . $style['display_post_load_button_text'] . '</span>
                            </button>
                        </div>';
            else:
                echo '<div class="oxi-image-hover-load-more-infinite" data-class="OXI_IMAGE_HOVER_PLUGINS\Modules\Display\Files\Style_1_Post_Query" data-function="__rest_api_post" data-args=\'' . json_encode($args) . '\' data-settings=\'' . json_encode($settings) . '\' data-page="1">
                      </div>';
            endif;
        }
    }

}
