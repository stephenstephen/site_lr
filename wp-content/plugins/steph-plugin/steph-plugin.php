<?php


/*
Plugin Name: Test Mandravarava
Plugin URI: https://akismet.com/
Description: Used by millions, Akismet is quite possibly the best way in the world to <strong>protect your blog from spam</strong>. It keeps your site protected even while you sleep. To get started: activate the Akismet plugin and then go to your Akismet Settings page to set up your API key.
Version: 1.0
Author: Stéphen
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: akismet
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2019-2020 Automattic, Inc.
*/

defined('ABSPATH') or die('ato isika ry zareo');

class StephPlugin
{
    public function activete()
    {
    }

    public function desactivate()
    {
    }

    public function uninstall()
    {
    }
}

if (class_exists('StephPlugin')) {
    $stephPlugin = new StephPlugin();
}

//activation
register_activation_hook(__FILE__, array($stephPlugin, 'activate'));

//desactivation
register_deactivation_hook(__FILE__, array($stephPlugin, 'desactivate'));
