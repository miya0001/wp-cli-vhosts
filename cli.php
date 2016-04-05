<?php

/**
 * WP-CLI wp vhosts command
 *
 * @subpackage commands/community
 * @maintainer Takayuki Miyauchi
 */

if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
	return;
}

/**
 * Manage multiple WordPresss through the command-line.
 */
class WP_CLI_VHOSTS extends WP_CLI_Command {

	function __construct() {
		parent::__construct();
	}

}

WP_CLI::add_command( 'vhosts', 'WP_CLI_VHOSTS' );
