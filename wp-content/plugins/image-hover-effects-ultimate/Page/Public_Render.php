<?php

namespace OXI_IMAGE_HOVER_PLUGINS\Page;

/**
 * Description of Public
 *
 * @author $biplob018
 */
class Public_Render {

    /**
     * Current Elements id
     *
     * @since 9.3.0
     */
    public $oxiid;

    /**
     * Current Elements Style Data
     *
     * @since 9.3.0
     */
    public $style = [];

    /**
     * Current Elements Style Full
     *
     * @since 9.3.0
     */
    public $dbdata = [];

    /**
     * Current Elements multiple list data
     *
     * @since 9.3.0
     */
    public $child = [];

    /**
     * Current Elements Global CSS Data
     *
     * @since 9.3.0
     */
    public $CSSDATA = [];

    /**
     * Current Elements Global CSS Data
     *
     * @since 9.3.0
     */
    public $inline_css;

    /**
     * Current Elements Global JS Handle
     *
     * @since 9.3.0
     */
    public $JSHANDLE = 'oxi-image-hover';

    /**
     * Current Elements Global DATA WRAPPER
     *
     * @since 9.3.0
     */
    public $WRAPPER;

    /**
     * Current Elements Admin Control
     *
     * @since 9.3.0
     */
    public $admin;

    /**
     * load constructor
     *
     * @since 9.3.0
     */

    /**
     * Define $wpdb
     *
     * @since 9.3.0
     */
    public $wpdb;

    /**
     * Database Parent Table
     *
     * @since 9.3.0
     */
    public $parent_table;

    /**
     * Database Import Table
     *
     * @since 9.3.0
     */
    public $import_table;

    /**
     * Database Import Table
     *
     * @since 9.3.0
     */
    public $child_table;

    public function __construct(array $dbdata = [], array $child = [], $admin = 'user') {
        if (count($dbdata) > 0):
            global $wpdb;
            $this->dbdata = $dbdata;
            $this->child = $child;
            $this->admin = $admin;
            $this->wpdb = $wpdb;
            $this->parent_table = $this->wpdb->prefix . 'image_hover_ultimate_style';
            $this->child_table = $this->wpdb->prefix . 'image_hover_ultimate_list';

            if (array_key_exists('id', $this->dbdata)):
                $this->oxiid = $this->dbdata['id'];
            else:
                $this->oxiid = rand(100000, 200000);
            endif;
            if (!empty($dbdata['rawdata'])):
                $this->loader();
            else:
                $this->old_loader();
            endif;

        endif;
    }

    /**
     * Current element loader
     *
     * @since 9.3.0
     */
    public function loader() {
        $this->style = json_decode(stripslashes($this->dbdata['rawdata']), true);
        $this->CSSDATA = $this->dbdata['stylesheet'];
        $this->WRAPPER = 'oxi-image-hover-wrapper-' . $this->dbdata['id'];
        $this->hooks();
    }

    /**
     * load old data since 1.7
     *
     * @since 9.3.0
     */
    public function old_loader() {
        $this->old_render();
    }

    /**
     * front end loader css and js
     *
     * @since 9.3.0
     */
    public function public_frontend_loader() {
        wp_enqueue_script("jquery");
        wp_enqueue_style('oxi-animation', OXI_IMAGE_HOVER_URL . '/assets/frontend/css/animation.css', false, OXI_IMAGE_HOVER_PLUGIN_VERSION);
        wp_enqueue_style('oxi-image-hover', OXI_IMAGE_HOVER_URL . '/assets/frontend/css/style.css', false, OXI_IMAGE_HOVER_PLUGIN_VERSION);
        if (get_option('oxi_addons_way_points') != 'no') {
            wp_enqueue_script('waypoints.min', OXI_IMAGE_HOVER_URL . '/assets/frontend/js/waypoints.min.js', false, OXI_IMAGE_HOVER_PLUGIN_VERSION);
        }
        $touch = get_option('image_hover_ultimate_mobile_device_key');
        if ($touch != 'normal') {
            wp_enqueue_script('oxi-image-hover-touch', OXI_IMAGE_HOVER_URL . '/assets/frontend/js/touch.js', false, OXI_IMAGE_HOVER_PLUGIN_VERSION);
        }
        wp_enqueue_script('oxi-image-hover', OXI_IMAGE_HOVER_URL . '/assets/frontend/js/jquery.js', false, OXI_IMAGE_HOVER_PLUGIN_VERSION);
    }

    /**
     * load css and js hooks
     *
     * @since 9.3.0
     */
    public function hooks() {
        $this->public_jquery();
        $this->public_css();
        $this->public_frontend_loader();
        $this->render();
        $inlinecss = $this->inline_public_css() . $this->inline_css . $this->style['image-hover-custom-css'];
        $inlinejs = $this->inline_public_jquery();
        if ($this->CSSDATA == '' && $this->admin == 'admin') {
            $name = explode('-', $this->dbdata['style_name']);
            $cls = '\OXI_IMAGE_HOVER_PLUGINS\Modules\\' . $name[0] . '\Admin\\Effects' . $name[1];
            $CLASS = new $cls('admin');
            $inlinecss .= $CLASS->inline_template_css_render($this->style);
        } else {
            echo $this->font_familly_validation(json_decode(($this->dbdata['font_family'] != '' ? $this->dbdata['font_family'] : "[]"), true));
            $inlinecss .= $this->CSSDATA;
        }
        if ($inlinejs != ''):
            if ($this->admin == 'admin'):
                //only load while Rest API called
                echo _('<script>
                        (function ($) {
                            setTimeout(function () {');
                echo $inlinejs;
                echo _('    }, 2000);
                        })(jQuery)</script>');
            else:
                $jquery = '(function ($) {' . $inlinejs . '})(jQuery);';
                wp_add_inline_script($this->JSHANDLE, $jquery);
            endif;

        endif;
        if ($inlinecss != ''):
            $inlinecss = html_entity_decode($inlinecss);
            if ($this->admin == 'admin'):
                //only load while ajax called
                echo _('<style>');
                echo $inlinecss;
                echo _('</style>');
            else:
                wp_add_inline_style('oxi-image-hover', $inlinecss);
            endif;
        endif;
    }

    /**
     * old empty old render
     *
     * @since 9.3.0
     */
    public function old_render() {
        echo '';
    }

    /**
     * load current element render since 9.3.0
     *
     * @since 9.3.0
     */
    public function render() {
        if ($this->admin == 'request'):
            $this->default_render($this->style, $this->child, $this->admin);
        else:
            echo '<div class="oxi-addons-container ' . $this->WRAPPER . ' ' . get_option('oxi_addons_custom_parent_class') . '" id="' . $this->WRAPPER . '">
                 <div class="oxi-addons-row">';
            $this->default_render($this->style, $this->child, $this->admin);
            echo '   </div>
              </div>';
        endif;
    }

    /**
     * load public jquery
     *
     * @since 9.3.0
     */
    public function public_jquery() {
        echo '';
    }

    /**
     * load public css
     *
     * @since 9.3.0
     */
    public function public_css() {
        echo '';
    }

    /**
     * load inline public jquery
     *
     * @since 9.3.0
     */
    public function inline_public_jquery() {
        echo '';
    }

    /**
     * load inline public css
     *
     * @since 9.3.0
     */
    public function inline_public_css() {
        echo '';
    }

    /**
     * load default render
     *
     * @since 9.3.0
     */
    public function default_render($style, $child, $admin) {
        echo '';
    }

    /**
     * load default render
     *
     * @since 9.3.0
     */
    public function Json_Decode($rawdata) {
        return $rawdata != '' ? json_decode(stripcslashes($rawdata), true) : [];
    }

    public function name_converter($data) {
        $data = str_replace('_', ' ', $data);
        $data = str_replace('-', ' ', $data);
        $data = str_replace('+', ' ', $data);
        return ucwords($data);
    }

    public function font_familly_validation($data = []) {
        $api = get_option('oxi_addons_google_font');
        if ($api == 'no'):
            return;
        endif;
        foreach ($data as $value) {
            wp_enqueue_style('' . $value . '', 'https://fonts.googleapis.com/css?family=' . $value . '');
        }
    }

    public function font_familly($data = '') {
        $api = get_option('oxi_addons_google_font');
        if ($api != 'no'):
            wp_enqueue_style('' . $data . '', 'https://fonts.googleapis.com/css?family=' . $data . '');
        endif;
        $data = str_replace('+', ' ', $data);
        $data = explode(':', $data);
        return '"' . $data[0] . '"';
    }

    public function admin_name_validation($data) {
        $data = str_replace('_', ' ', $data);
        $data = str_replace('-', ' ', $data);
        $data = str_replace('+', ' ', $data);
        return ucwords($data);
    }

    public function array_render($id, $style) {
        if (array_key_exists($id, $style)):
            return $style[$id];
        endif;
    }

    public function media_render($id, $style) {
        $url = '';
        if (array_key_exists($id . '-select', $style)):
            if ($style[$id . '-select'] == 'media-library'):
                $url = $style[$id . '-image'];
            else:
                $url = $style[$id . '-url'];
            endif;
            if (array_key_exists($id . '-image-alt', $style) && $style[$id . '-image-alt'] != ''):
                $r = 'src="' . $url . '" alt="' . $style[$id . '-image-alt'] . '" ';
            else:
                $r = 'src="' . $url . '" ';
            endif;
            return $r;
        endif;
    }

    public function media_background_render($id, $style) {
        $url = '';
        if (array_key_exists($id . '-select', $style)):
            if ($style[$id . '-select'] == 'media-library'):
                $url = $style[$id . '-image'];
            else:
                $url = $style[$id . '-url'];
            endif;
        endif;
        return $url;
    }

    public function text_render($data) {
        return do_shortcode(str_replace('spTac', '&nbsp;', str_replace('spBac', '<br>', html_entity_decode($data))), $ignore_html = false);
    }

    public function font_awesome_render($data) {
        $fadata = get_option('oxi_addons_font_awesome');
        if ($fadata == 'yes'):
            wp_enqueue_style('font-awsome.min', OXI_IMAGE_HOVER_URL . '/assets/frontend/css/font-awsome.min.css', false, OXI_IMAGE_HOVER_PLUGIN_VERSION);
        endif;
        $files = '<i class="' . $data . ' oxi-icons"></i>';
        return $files;
    }

    public function tab_column_render($id, $style) {
        if ($style[$id . '-lap'] == 'oxi-bt-col-lg-8'):
            return 'oxi-bt-col-md-3';
        elseif ($style[$id . '-lap'] == 'oxi-bt-col-lg-5'):
            return 'oxi-bt-col-md-6';
        elseif ($style[$id . '-lap'] == 'oxi-bt-col-lg-4'):
            return 'oxi-bt-col-md-6';
        elseif ($style[$id . '-lap'] == 'oxi-bt-col-lg-3'):
            return 'oxi-bt-col-md-6';
        else:
            return 'oxi-bt-col-md-12';
        endif;
    }

    public function mob_column_render($id, $style) {

        if ($style[$id . '-lap'] == 'oxi-bt-col-lg-2'):
            return 'oxi-bt-col-sm-6';
        elseif ($style[$id . '-lap'] == 'oxi-bt-col-lg-8'):
            return 'oxi-bt-col-sm-6';
        elseif ($style[$id . '-lap'] == 'oxi-bt-col-lg-1'):
            return 'oxi-bt-col-sm-6';
        else:
            return 'oxi-bt-col-sm-12';
        endif;
    }

    public function column_render($id, $style) {
        $file = $style[$id . '-lap'] . ' ';
        if (!array_key_exists($id . '-tab', $style) || $style[$id . '-tab'] == ''):
            $file .= $this->tab_column_render($id, $style) . ' ';
        else:
            $file .= $style[$id . '-tab'] . ' ';
        endif;
        if (!array_key_exists($id . '-mob', $style) || $style[$id . '-mob'] == ''):
            $file .= $this->mob_column_render($id, $style) . ' ';
        else:
            $file .= $style[$id . '-mob'] . ' ';
        endif;
        return $file;
    }

    public function url_render($id, $style) {
        $link = '';
        if (array_key_exists($id . '-url', $style) && $style[$id . '-url'] != ''):
            $link .= ' href="' . $style[$id . '-url'] . '"';
            if (array_key_exists($id . '-target', $style) && $style[$id . '-target'] != '0'):
                $link .= ' target="_blank"';
            endif;
            if (array_key_exists($id . '-follow', $style) && $style[$id . '-follow'] != '0'):
                $link .= ' rel="nofollow"';
            endif;
            if (array_key_exists($id . '-id', $style) && $style[$id . '-id']):
                $link .= ($style[$id . '-id'] != '' ? ' id="' . $style[$id . '-id'] . '"' : '');
            endif;
        endif;

        return $link;
    }

    public function animation_render($id, $style) {
        $return = (array_key_exists($id . '-type', $style) && $style[$id . '-type'] != '' ? ' sa-data-animation="' . $style[$id . '-type'] . ' ' . (array_key_exists($id . '-looping', $style) && $style[$id . '-looping'] != '0' ? 'infinite' : '') . '"' : '');
        if ($return != ''):
            $return .= (array_key_exists($id . '-offset-size', $style) ? ' sa-data-animation-offset="' . $style[$id . '-offset-size'] . '%"' : '');
            $return .= (array_key_exists($id . '-delay-size', $style) ? ' sa-data-animation-delay="' . $style[$id . '-delay-size'] . 'ms"' : '');
            $return .= (array_key_exists($id . '-duration-size', $style) ? ' sa-data-animation-duration="' . $style[$id . '-duration-size'] . 'ms"' : '');
            return $return;
        endif;
    }

    public function background_render($id, $style, $class) {
        $backround = '';
        if (array_key_exists($id . '-color', $style)):
            $color = $style[$id . '-color'];
            if (array_key_exists($id . '-img', $style) && $style[$id . '-img'] != '0'):
                if (strpos(strtolower($color), 'gradient') === FALSE):
                    $color = 'linear-gradient(0deg, ' . $color . ' 0%, ' . $color . ' 100%)';
                endif;
                if ($style[$id . '-select'] == 'media-library'):
                    $backround .= $class . '{background: ' . $color . ', url(\'' . $style[$id . '-image'] . '\') ' . $style[$id . '-repeat'] . ' ' . $style[$id . '-position'] . ';
                                           background-attachment: ' . $style[$id . '-attachment'] . ';
                                           background-size:  ' . $style[$id . '-size-lap'] . ';}';
                    $backround .= '@media only screen and (min-width : 669px) and (max-width : 993px){';
                    $backround .= $class . '{background-size:  ' . $style[$id . '-size-tab'] . ';}';
                    $backround .= '}';
                    $backround .= '@media only screen and (max-width : 668px){';
                    $backround .= $class . '{background-size:  ' . $style[$id . '-size-mob'] . ';}';
                    $backround .= '}';
                else:
                    $backround .= $class . '{background: ' . $color . ', url(\'' . $style[$id . '-url'] . '\') ' . $style[$id . '-repeat'] . ' ' . $style[$id . '-position'] . '; 
                                           background-attachment: ' . $style[$id . '-attachment'] . ';
                                           background-size:  ' . $style[$id . '-size-lap'] . ';}';
                    $backround .= '@media only screen and (min-width : 669px) and (max-width : 993px){';
                    $backround .= $class . '{background-size:  ' . $style[$id . '-size-tab'] . ';}';
                    $backround .= '}';
                    $backround .= '@media only screen and (max-width : 668px){';
                    $backround .= $class . '{background-size:  ' . $style[$id . '-size-mob'] . ';}';
                    $backround .= '}';
                endif;
            else:
                $backround .= $class . '{background: ' . $color . ';}';
            endif;
        endif;
        return $backround;
    }

    public function CatStringToClassReplacce($string, $number = '000') {
        $entities = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', "t");
        $replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]", " ");
        return 'sa_STCR_' . str_replace($replacements, $entities, urlencode($string)) . $number;
    }

    public function old_column_render($d, $type) {
        if ($d == 'image-ultimate-responsive-1'):
            if ($type == 'lap'):
                return 'oxi-bt-col-lg-12';
            elseif ($type == 'tab'):
                return 'oxi-bt-col-md-12';
            elseif ($type == 'mob'):
                return 'oxi-bt-col-sm-12';
            endif;
        elseif ($d == 'image-ultimate-responsive-2'):
            if ($type == 'lap'):
                return 'oxi-bt-col-lg-6';
            elseif ($type == 'tab'):
                return 'oxi-bt-col-md-6';
            elseif ($type == 'mob'):
                return 'oxi-bt-col-sm-12';
            endif;
        elseif ($d == 'image-ultimate-responsive-3'):
            if ($type == 'lap'):
                return 'oxi-bt-col-lg-4';
            elseif ($type == 'tab'):
                return 'oxi-bt-col-md-6';
            elseif ($type == 'mob'):
                return 'oxi-bt-col-sm-12';
            endif;
        elseif ($d == 'image-ultimate-responsive-4'):
            if ($type == 'lap'):
                return 'oxi-bt-col-lg-3';
            elseif ($type == 'tab'):
                return 'oxi-bt-col-md-6';
            elseif ($type == 'mob'):
                return 'oxi-bt-col-sm-12';
            endif;
        elseif ($d == 'image-ultimate-responsive-5'):
            if ($type == 'lap'):
                return 'oxi-bt-col-lg-3';
            elseif ($type == 'tab'):
                return 'oxi-bt-col-md-6';
            elseif ($type == 'mob'):
                return 'oxi-bt-col-sm-12';
            endif;
        elseif ($d == 'image-ultimate-responsive-6'):
            if ($type == 'lap'):
                return 'oxi-bt-col-lg-2';
            elseif ($type == 'tab'):
                return 'oxi-bt-col-md-3';
            elseif ($type == 'mob'):
                return 'oxi-bt-col-sm-6';
            endif;
        endif;
    }

    public function old_alignment_render($d) {
        if ($d == 'vertical-align: top;text-align: left;'):
            return 'image-hover-align-top-top';
        elseif ($d == 'vertical-align: top;text-align: center;'):
            return 'image-hover-align-top-center';
        elseif ($d == 'vertical-align: top;text-align: right;'):
            return 'image-hover-align-top-right';
        elseif ($d == 'vertical-align: middle;text-align: left;'):
            return 'image-hover-align-center-left';
        elseif ($d == 'vertical-align: middle;text-align: center;'):
            return 'image-hover-align-center-center';
        elseif ($d == 'vertical-align: middle;text-align: right;'):
            return 'image-hover-align-center-right';
        elseif ($d == 'vertical-align: bottom;text-align: left;'):
            return 'image-hover-align-bottom-left';
        elseif ($d == 'vertical-align: bottom;text-align: center;'):
            return 'image-hover-align-bottom-center';
        elseif ($d == 'vertical-align: bottom;text-align: right;'):
            return 'image-hover-align-bottom-right';
        endif;
    }

    public function old_button_alignment_render($d) {
        if ($d == 'float: left;'):
            return 'left';
        elseif ($d == 'margin: 0 auto;'):
            return 'center';
        elseif ($d == 'float: right;'):
            return 'right';
        endif;
    }

}
