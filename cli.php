<?php
/**
 * WP-CLI wp vhosts command
 *
 * @subpackage commands/community
 * @maintainer Takayuki Miyauchi
 */

use \WP_CLI\Utils;
use \WP_CLI\Dispatcher;

class Vhosts_Command extends WP_CLI_Command {

	/**
	 * Manage multiple WordPress through the command-line.
	 *
	 * [<command>...]
	 * : You can use all of the WP-CLI commands. See `wp help`.
	 *
	 * ## EXAMPLES
	 *
	 *     # Install plugin into multiple WordPress
	 *     `wp vhosts plugin install ... --activate`
	 *     # Update multiple WordPress
	 *     `wp vhosts core update`
	 *
	 * @when before_wp_load
	 */
	function __invoke( $args, $assoc_args ) {
		var_dump( func_get_args() );
		exit;
	}

}

WP_CLI::add_command( 'vhosts', 'Vhosts_Command' );
