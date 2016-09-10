<?php
/**
 * Admin current screen Info
 *
 * @package     AdminCurrentScreenInfo
 * @author      Codice Ovvio
 * @copyright   2016 Codice Ovvio
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Admin current screen Info
 * Plugin URI:  http://github.com/codiceovvio/admin-current-screen-info
 * Description: A little helper plugin to display some informations about the current screen in view. It shows them in a dismissable notice box at the top of each admin screen.
 * Version:     0.2.0
 * Author:      Codice Ovvio
 * Author URI:  http://github.com/codiceovvio
 * Text Domain: none
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

/*
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
Online: http://www.gnu.org/licenses/gpl.txt
*/


/*
 * Function to display current admin screen info.
 *
 * @todo Add other object properties to show
 * @uses get_current_screen()
 * @link https://codex.wordpress.org/Function_Reference/get_current_screen	Codex page.
 * @return mixed	Echoes infos about current screen
 *
 */
function display_current_admin_screen_info() {

	$screen = get_current_screen();
	$error_class = 'notice notice-error';
	$warning_class = 'notice notice-warning';
	$success_class = 'notice notice-success';
	$info_class = 'notice notice-info';
	$dismiss = ' is-dismissible';
	$inline = ' inline';

	if ( null != $screen->post_type ) {
		$message_postype = 'We are inside <strong>' . $screen->post_type . '</strong> post type screen';
	} else {
		$message_postype = 'This screen <strong>has not </strong> a specific post type assigned to';
	}
	$message_screenid = 'This specific screen has an id labeled <strong>' . $screen->id . '</strong>';

	echo '<div class="' . $info_class . $dismiss . '">
		<p>' . $message_postype . '</p>
		<p>' . $message_screenid . '</p>
		</div>';

}
add_action( 'admin_notices', 'display_current_admin_screen_info' );
