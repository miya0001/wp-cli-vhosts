<?php

require_once( dirname( __FILE__ ) . '/lib/abstract.php' );

/**
 * Manage WordPresses for VirtualHosts.
 *
 * @subpackage commands/community
 * @maintainer Takayuki Miyauchi
 */
class WP_CLI_Virutual_Hosts extends Virutual_Hosts_Command
{
	/**
	 * Get a list of sites.
	 *
	 * @when before_wp_load
	 * @subcommand list
	 */
	function _list( $args ) {
		foreach ( self::sites() as $site ) {
			WP_CLI::line( self::colorize( $site ) );
		}
	}
}

WP_CLI::add_command( 'vhosts', 'WP_CLI_Virutual_Hosts'  );

require_once( dirname( __FILE__ ) . '/lib/plugin.php' );
require_once( dirname( __FILE__ ) . '/lib/theme.php' );
require_once( dirname( __FILE__ ) . '/lib/core.php' );
require_once( dirname( __FILE__ ) . '/lib/core-language.php' );
