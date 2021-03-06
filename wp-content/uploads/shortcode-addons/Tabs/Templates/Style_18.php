<?php

namespace SHORTCODE_ADDONS_UPLOAD\Tabs\Templates;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Description of Style_18
 * Content of Shortcode Addons Plugins
 *
 * @author $biplob018
 */
use SHORTCODE_ADDONS\Core\Templates;

class Style_18 extends Templates {

    public function default_render($style, $child, $admin) {
        $jquery = $linkopening = '';



        echo '<div class="' . $this->WRAPPER . ' sa-addons-tabs-main-wrapper-style-18" ' . $this->animation_render('sa_tabs_tab_anim', $style) . '>
                <div class="sa-addons-main-tab-header">';
        $styledata = $this->style;
        $all_data = (array_key_exists('sa_tabs_data', $styledata) && is_array($styledata['sa_tabs_data'])) ? $styledata['sa_tabs_data'] : [];
        foreach ($all_data as $key => $value_header) {
            $icon = '';
            if (array_key_exists('sa_tabs_url_open', $value_header) && $value_header['sa_tabs_url_open'] != '0') :

                if ($value_header['sa_tabs_url-target'] != 'yes') :
                    $linkopening = ", '_self'";
                endif;
                if ($value_header['sa_tabs_url-url'] != '') {
                    $jquery .= 'jQuery(".sa-header-' . $key . '").click(function() {window.open("' . $value_header['sa_tabs_url-url'] . '" ' . $linkopening . ');});';
                }
            endif;
            if (array_key_exists('sa_tabs_tab_icon_on_off', $value_header) && $value_header['sa_tabs_tab_icon_on_off'] != '0') :
                $icon .= '<div class="sa_tabs_icon">
                            ' . $this->font_awesome_render($value_header['sa_tabs_tab_icon']) . '
                            </div>';
                if ($style['sa_tabs_headding_icon_style'] == 'inline-block') :
                    $icon_text = ($style['sa_tabs_headding_icon_posi'] == 'left' ? '' . $icon . ' ' . $this->text_render($value_header['sa_tabs_h_text']) . '' : '' . $this->text_render($value_header['sa_tabs_h_text']) . '' . $icon . '');
                else :
                    $icon_text = ($style['sa_tabs_headding_icon_posi_block'] == 'top' ? '' . $icon . ' ' . $this->text_render($value_header['sa_tabs_h_text']) . '' : '' . $this->text_render($value_header['sa_tabs_h_text']) . '' . $icon . '');
                endif;
            else :
                $icon_text = $this->text_render(array_key_exists('sa_tabs_h_text', $value_header) ? $value_header['sa_tabs_h_text'] : '');
            endif;
            echo '<div class="sa-addons-header ' . $style['sa_tabs_headding_icon_style'] . ' sa-header-' . $key . ' " ref="#sa-tab-' . $this->oxiid . '-id-' . $key . '">' . $icon_text . '</div>';
        }
        echo '</div>
                <div class="sa-addons-main-tab-body ">';
        foreach ($all_data as $key => $value_body) {
            $icon = '';
            if (array_key_exists('sa_tabs_url_open', $value_body) && $value_body['sa_tabs_url_open'] != '0') :
                if ($value_body['sa_tabs_url-target'] != 'yes') :
                    $linkopening = ", '_self'";
                endif;
                if ($value_body['sa_tabs_url-url'] != '') {
                    $jquery .= 'jQuery(".sa-header-' . $key . '").click(function() {window.open("' . $value_body['sa_tabs_url-url'] . '" ' . $linkopening . ');});';
                }
            endif;

            if (array_key_exists('sa_tabs_tab_icon_on_off', $value_body) && $value_body['sa_tabs_tab_icon_on_off'] != '0') :
                $icon .= '<div class="sa_tabs_icon">
                            ' . $this->font_awesome_render($value_body['sa_tabs_tab_icon']) . '
                            </div>';
                if ($style['sa_tabs_headding_icon_style'] == 'inline-block') :
                    $icon_text = ($style['sa_tabs_headding_icon_posi'] == 'left' ? '' . $icon . ' ' . $this->text_render($value_body['sa_tabs_h_text']) . '' : '' . $this->text_render($value_body['sa_tabs_h_text']) . '' . $icon . '');
                else :
                    $icon_text = ($style['sa_tabs_headding_icon_posi_block'] == 'top' ? '' . $icon . ' ' . $this->text_render($value_body['sa_tabs_h_text']) . '' : '' . $this->text_render($value_body['sa_tabs_h_text']) . '' . $icon . '');
                endif;
            else :
                $icon_text = $this->text_render(array_key_exists('sa_tabs_h_text', $value_body) ? $value_body['sa_tabs_h_text'] : '');
            endif;


            echo '<div class="sa-addons-header-two sa-header-' . $key . ' " ref="#sa-tab-' . $this->oxiid . '-id-' . $key . '">' . $icon_text . '</div>';
            echo '<div class="sa-addons-body sa-addons-body-' . $key . ' ' . ($admin == 'admin' ? 'oxi-addons-admin-edit-list ' : '') . '" id="sa-tab-' . $this->oxiid . '-id-' . $key . '" style="display: none;">' . $this->text_render(array_key_exists('sa_tabs_content', $value_body) ? $value_body['sa_tabs_content'] : '') . '';

            echo '</div>';
        }
        echo '</div>';
        echo '</div>';

        wp_add_inline_script('shortcode-addons-jquery', $jquery);
    }

    public function inline_public_css() {
        return '.' . $this->WRAPPER . ' .sa-addons-tabs-main-wrapper-style-18 .sa-active::after{
                    border-top: ' . $this->style['sa_tabs_headding_arrow-size'] . 'px solid  ' . $this->style['sa_tabs_headding_arrow-color'] . ';
                    border-left: ' . $this->style['sa_tabs_headding_arrow-size'] . 'px solid transparent;
                    border-right: ' . $this->style['sa_tabs_headding_arrow-size'] . 'px solid transparent;
                    }
                    .' . $this->WRAPPER . ' .sa-addons-tabs-main-wrapper-style-18 .sa-active::before {
                        border-bottom: ' . $this->style['sa_tabs_headding_border-size'] . 'px solid  ' . $this->style['sa_tabs_headding_arrow-color'] . ';
                    }
                    ';
    }

    public function inline_public_jquery() {
        $styledata = $this->style;
        $animationIn = $animationOut = $jquery = '';
        if ($styledata['sa_tabs_tab_anim'] == 'slide') {
            $animationIn = 'slideDown';
            $animationOut = 'slideUp';
        } else {
            $animationIn = 'fadeIn';
            $animationOut = 'fadeOut';
        }
        $initial = array_key_exists('sa_tabs_initial', $styledata) ? $styledata['sa_tabs_initial'] : '0';
        $jquery .= ' 
            jQuery(".' . $this->WRAPPER . '.sa-addons-tabs-main-wrapper-style-18 .sa-addons-header:eq(' . $initial . ')").addClass("sa-active");
            jQuery(".' . $this->WRAPPER . '.sa-addons-tabs-main-wrapper-style-18 .sa-addons-header-two:eq(' . $initial . ')").addClass("sa-active");
            jQuery(".' . $this->WRAPPER . '.sa-addons-tabs-main-wrapper-style-18 .sa-addons-body:eq(' . $initial . ')").' . $animationIn . '("slow");
            jQuery(".' . $this->WRAPPER . '.sa-addons-tabs-main-wrapper-style-18 .sa-addons-header").click(function() {
            if (jQuery(this).hasClass("sa-active")) {
                return false
            } else {
                jQuery(".' . $this->WRAPPER . '.sa-addons-tabs-main-wrapper-style-18 .sa-addons-header").removeClass("sa-active");
                jQuery(this).addClass("sa-active");
                jQuery(".' . $this->WRAPPER . '.sa-addons-tabs-main-wrapper-style-18 .sa-addons-body").' . $animationOut . '("slow");
                var activeTab = jQuery(this).attr("ref");
                jQuery(activeTab).' . $animationIn . '("slow"); 
            }
        });
        jQuery(".' . $this->WRAPPER . '.sa-addons-tabs-main-wrapper-style-18 .sa-addons-header-two").click(function() {
            if (jQuery(this).hasClass("sa-active")) {
                return false
            } else {
                jQuery(".' . $this->WRAPPER . '.sa-addons-tabs-main-wrapper-style-18 .sa-addons-header-two").removeClass("sa-active");
                jQuery(this).addClass("sa-active");
                jQuery(".' . $this->WRAPPER . '.sa-addons-tabs-main-wrapper-style-18 .sa-addons-body").' . $animationOut . '("slow");
                var activeTab = jQuery(this).attr("ref");
                jQuery(activeTab).' . $animationIn . '("slow");
                var fullwidth = jQuery("html, body").width();';

        if (array_key_exists('sa_tabs_tab_fix_header', $styledata) && $styledata['sa_tabs_tab_fix_header'] != '0') {
            $jquery .= 'if(fullwidth <= 668){
                            jQuery("html, body").animate({
                                scrollTop: jQuery(".' . $this->WRAPPER . '.sa-addons-tabs-main-wrapper-style-18").offset().top - ' . $styledata['sa_tabs_tab_fix_h_offset'] . '
                            }, 2000);
                        } ';
        }
        $jquery .= '}
        });
        ';
        return $jquery;
    }

    public function old_render() {

        $styledata = $this->dbdata;
        $listdata = $this->child;
        $oxiid = $styledata['id'];
        $stylefiles = explode('||#||', $styledata['css']);
        $styledata = explode('|', $stylefiles[0]);

        $css = '';
        $jquery = $linkopening = '';
        if ($styledata[9] != 'new-tab') {
            $linkopening = ", '_self'";
        }
        echo '<div class="oxi-addons-container">
              <div class="oxi-addons-row">
                <div class="oxi-addons-main-wrapper-' . $oxiid . ' ">
                    <div class="oxi-addons-main-tab-header">';
        foreach ($listdata as $header) {
            $value_header = explode('||#||', $header['files']);
            if (!empty($value_header[3])) {
                $jquery .= 'jQuery(".oxi-header-' . $header['id'] . '").click(function() {window.open("' . $value_header[3] . '" ' . $linkopening . ');});';
            }
            echo '<div class="oxi-addons-header oxi-header-' . $header['id'] . ' " ref="#oxi-tab-' . $oxiid . '-id-' . $header['id'] . '">
               <span class="oxi-addons-icon">' . oxi_addons_font_awesome('' . $value_header[7] . '') . '</span>
            ' . $value_header[1] . '</div>';
        }
        echo '</div>
                <div class="oxi-addons-main-tab-body ">';
        foreach ($listdata as $body) {
            $value_body = explode('||#||', $body['files']);
            if (!empty($value_body[3])) {
                $jquery .= 'jQuery(".oxi-header-' . $body['id'] . '").click(function() {window.open("' . $value_body[3] . '" ' . $linkopening . ');});';
            }
            echo '<div class="oxi-addons-header-two oxi-header-' . $body['id'] . ' " ref="#oxi-tab-' . $oxiid . '-id-' . $body['id'] . '">
             <span class="oxi-addons-icon">' . oxi_addons_font_awesome('' . $value_body[7] . '') . '</span>
            ' . $value_body[1] . '</div>';

            echo '<div class="oxi-addons-body" id="oxi-tab-' . $oxiid . '-id-' . $body['id'] . '" style="display: none;">' . $value_body[5] . '';

            echo '</div>';
        }
        echo '</div>
                </div>
            </div>
        </div>';
        $animationIn = $animationOut = '';
        if ($styledata[5] == 'slide') {
            $animationIn = 'slideDown';
            $animationOut = 'slideUp';
        } else {
            $animationIn = 'fadeIn';
            $animationOut = 'fadeOut';
        }
        $jquery .= ' 
            jQuery(".oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header:eq(' . $styledata[3] . ')").addClass("oxi-active");
            jQuery(".oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header-two:eq(' . $styledata[3] . ')").addClass("oxi-active");
            jQuery(".oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-body:eq(' . $styledata[3] . ')").' . $animationIn . '("slow");
            jQuery(".oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header").click(function() {
            if (jQuery(this).hasClass("oxi-active")) {
                return false
            } else {
                jQuery(".oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header").removeClass("oxi-active");
                jQuery(this).addClass("oxi-active");
                jQuery(".oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-body").' . $animationOut . '("slow");
                var activeTab = jQuery(this).attr("ref");
                jQuery(activeTab).' . $animationIn . '("slow"); 
            }
        });
            jQuery(".oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header-two").click(function() {
            if (jQuery(this).hasClass("oxi-active")) {
                return false
            } else {
                jQuery(".oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header-two").removeClass("oxi-active");
                jQuery(this).addClass("oxi-active");
                jQuery(".oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-body").' . $animationOut . '("slow");
                var activeTab = jQuery(this).attr("ref");
                jQuery(activeTab).' . $animationIn . '("slow");
                var fullwidth = jQuery("html, body").width();';
        if ($styledata[7] == 'true') {
            $jquery .= '    if(fullwidth <= 668){
                            jQuery("html, body").animate({
                                scrollTop: jQuery(".oxi-addons-main-wrapper-' . $oxiid . '").offset().top - ' . $stylefiles[2] . '
                            }, 2000);
                        } ';
        }
        $jquery .= '}
        });
    ';
        $textalign = '';
        if ($styledata[11] == 'left') {
            $textalign = '
                justify-content: flex-start;
                ';
        } elseif ($styledata[11] == 'center') {
            $textalign = '
                justify-content: center;
                ';
        } else {
            $textalign = '
                justify-content: flex-end;
            ';
        }

        $css .= '
        .oxi-addons-main-wrapper-' . $oxiid . '{
            width: 100%;
            margin: 0 auto;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 190) . ';
            }
        .oxi-addons-container *{
            transition: none; 
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-tab-header{
            overflow: hidden;
            display: flex;
            align-items: center;
            ' . $textalign . ' 
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header-two{
            display: none; 
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header{
            position: relative;
            font-size: ' . $styledata[74] . 'px;
            color: ' . $styledata[72] . ';
            ' . OxiAddonsFontSettings($styledata, 78) . '; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 103) . ';
            cursor: pointer; 
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 50) . '; 
        } 
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header span{
            margin-right: 3px;
        } 
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-active {
            color: ' . $styledata[206] . ' !important;  
            position: relative; 
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-active::after{
            content: "";
            position: absolute; 
            left: 50%;
            bottom: -10px;
            transform: translateX(-50%); 
            border-top: solid 10px ' . $styledata[208] . ';
            border-left: solid 10px transparent;
            border-right: solid 10px transparent;
            z-index: 999;
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-active::before{
          content: "";
            position: absolute;
            left: 0;
            bottom: 0; 
            width: 100%;
            height: 100%;
            border-bottom: ' . $styledata[210] . 'px solid ' . $styledata[206] . ';
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-tab-body{
            width: 100%;
            float:left;
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-body{
            font-size: ' . $styledata[180] . 'px;
            color: ' . $styledata[178] . ';
            ' . OxiAddonsFontSettings($styledata, 184) . ';
            background: ' . $styledata[119] . ';
            border-style: ' . $styledata[121] . ';
            border-color: ' . $styledata[122] . ';
            border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 124) . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 140) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 156) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 172) . '; 
        } 
    
    @media only screen and (min-width : 669px) and (max-width : 993px){
        .oxi-addons-main-wrapper-' . $oxiid . '{ 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 191) . ';
        }  
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header{
            font-size: ' . $styledata[75] . 'px; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 104) . '; 
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 51) . '; 
        }   
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-body{
            font-size: ' . $styledata[181] . 'px; 
            border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 125) . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 141) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 157) . '; 
        } 
    
    }
    @media only screen and (max-width : 668px){
        .oxi-addons-main-wrapper-' . $oxiid . '{ 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 192) . ';
        } 
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-main-tab-header{ 
            display: none;
        }
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header-two{
            display: block;
            font-size: ' . $styledata[76] . 'px;
            color: ' . $styledata[72] . ';
            ' . OxiAddonsFontSettings($styledata, 78) . '; 
            background: ' . $styledata[13] . '; 
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 105) . ';  
            margin: ' . OxiAddonsPaddingMarginSanitize($styledata, 52) . ';  
            cursor: pointer;
            text-align: center;
        }    
           .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-header-two span{
            margin-right: 3px;
        }  
        .oxi-addons-main-wrapper-' . $oxiid . ' .oxi-addons-body{
            font-size: ' . $styledata[182] . 'px; 
            border-width: ' . OxiAddonsPaddingMarginSanitize($styledata, 126) . ';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 142) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 158) . '; 
        } 
    }
    ';

        wp_add_inline_style('shortcode-addons-style', $css);
        wp_add_inline_script('shortcode-addons-jquery', $jquery);
    }

}
