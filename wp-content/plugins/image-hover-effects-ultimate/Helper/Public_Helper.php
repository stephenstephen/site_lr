<?php

namespace OXI_IMAGE_HOVER_PLUGINS\Helper;

/**
 *
 * @author $biplob018
 */
trait Public_Helper {

    public function html_special_charecter($data) {
        $data = html_entity_decode($data);
        $data = str_replace("\'", "'", $data);
        $data = str_replace('\"', '"', $data);
        $data = do_shortcode($data, $ignore_html = false);
        return $data;
    }

    public function admin_special_charecter($data) {
        $data = html_entity_decode($data);
        $data = str_replace("\'", "'", $data);
        $data = str_replace('\"', '"', $data);
        return $data;
    }

    public function icon_font_selector($data) {
        $icon = explode(' ', $data);
        $fadata = get_option('oxi_addons_font_awesome');
        $faversion = get_option('oxi_addons_font_awesome_version');
        $faversion = explode('||', $faversion);
        if ($fadata == 'yes') {
            wp_enqueue_style('font-awesome-' . $faversion[0], $faversion[1]);
        }
        $files = '<i class="' . $data . ' oxi-icons"></i>';
        return $files;
    }

    public function font_familly_charecter($data) {
        wp_enqueue_style('' . $data . '', 'https://fonts.googleapis.com/css?family=' . $data . '');
        $data = str_replace('+', ' ', $data);
        $data = explode(':', $data);
        $data = $data[0];
        $data = '"' . $data . '"';
        return $data;
    }

    /**
     * Plugin Name Convert to View
     *
     * @since 9.3.0
     */
    public function name_converter($data) {
        $data = str_replace('_', ' ', $data);
        $data = str_replace('-', ' ', $data);
        $data = str_replace('+', ' ', $data);
        return ucwords($data);
    }

    public function effects_converter($data) {
        $data = explode('-', $data);
        return $data[0];
    }

    public function shortcode_render($styleid, $user) {
        if (!empty($styleid) && !empty($user)):
            $style = $this->wpdb->get_row($this->wpdb->prepare('SELECT * FROM ' . $this->parent_table . ' WHERE id = %d ', $styleid), ARRAY_A);
            $child = $this->wpdb->get_results($this->wpdb->prepare("SELECT * FROM $this->child_table WHERE styleid = %d ORDER by id ASC", $styleid), ARRAY_A);
            if (!is_array($style)):
                echo '<p> Shortcode Deleted, kindly add currect Shortcode</p>';
                return;
            endif;
            if (!array_key_exists('rawdata', $style)):
                $Installation = new \OXI_IMAGE_HOVER_PLUGINS\Classes\Installation();
                $Installation->plugin_upgrade_hook();
            endif;
            $name = explode('-', ucfirst($style['style_name']));
            $C = '\OXI_IMAGE_HOVER_PLUGINS\Modules\\' . ucfirst($name[0]) . '\Render\Effects' . $name[1];
            if (class_exists($C)):
                new $C($style, $child, $user);
            endif;
        endif;
    }

}
