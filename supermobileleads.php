<?php
/**
 * Plugin Name: Super Mobile Leads
 * Plugin URI: http://jyothisjoy.com/
 * Description: This plugin is for CTA buttons in footer.
 * Version: 0.2.0.3
 * Author: Jyothis Joy
 * Author URI: https://www.jyothisjoy.com
 * License: GPL2
 * Text Domain:    supermobleads
 * Domain Path:    /languages
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}
/*Include Files */

include 'includes/navigation.php';
include 'includes/optionspage.php';
include 'includes/frontend.php';
include 'includes/enqueue.php';

/* Action & Hooks */

add_action('admin_menu','supermobleads_regsiter_navigation');
add_action('wp_footer','supermobleads_insertfooter');
add_action('admin_enqueue_scripts', 'supermobleads_wp_admin_style');
add_action('plugins_loaded', 'supermobleads_translateinitfunction');
add_action('init', 'supermobleads_outputbuff_func');
?>