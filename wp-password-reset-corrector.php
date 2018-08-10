<?php
/**
 * @package WP-Password-Reset-Corrector
 */
/*
Plugin Name: WP-Password-Reset-Corrector
Plugin URI: https://github.com/comptoirdesappli/wp-password-reset-corrector
Description: 
Version: 1.0
Requires PHP: 5.6
Author: ShareVB
Author URI: https://github.com/comptoirdesappli/
License: GPLv2 or later
Text Domain: wp-password-reset-corrector
GitHub Plugin URI: comptoirdesappli/wp-password-reset-corrector
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
Copyright 2015-2018 ShareVB
*/

// Make sure we don't expose any info if called directly
if ( ! function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

function wp_password_reset_corrector_clean_invalid_login() {
	if ( ! empty( $_GET['login'] ) ) {
		$_GET['login'] = rtrim( wp_unslash( $_GET['login'] ), ">" );
	}
	if ( ! empty( $_REQUEST['login'] ) ) {
		$_REQUEST['login'] = rtrim( wp_unslash( $_REQUEST['login'] ), ">" );
	}
	if ( ! empty( $_POST['login'] ) ) {
		$_POST['login'] = rtrim( wp_unslash( $_POST['login'] ), ">" );
	}
}

add_action( 'login_form_rp', 'wp_password_reset_corrector_clean_invalid_login' );
add_action( 'login_form_resetpass', 'wp_password_reset_corrector_clean_invalid_login' );
