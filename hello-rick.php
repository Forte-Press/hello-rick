<?php
/**
 * Plugin Name:       Hello, Rick
 * Description:       Adds a random Rick to your blocks
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Phil Webster
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package           create-block
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! defined( 'HELLO_RICK_PATH' ) ) {
    define( 'HELLO_RICK_PATH', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'HELLO_RICK_URL' ) ) {
    define( 'HELLO_RICK_URL', plugin_dir_url( __FILE__ ) );
}

function hello_rick_editor_scripts() {
    wp_register_script(
        'hello-rick',
        HELLO_RICK_URL . 'build/index.js',
        [ 'wp-blocks', 'wp-dom', 'wp-dom-ready', 'wp-edit-post' ],
        filemtime( HELLO_RICK_PATH . 'build/index.js' )
    );
    wp_enqueue_script( 'hello-rick' );
}
add_action( 'enqueue_block_editor_assets', 'hello_rick_editor_scripts' );