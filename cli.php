<?php

/**
 * Manage WordPresses for VirtualHosts.
 *
 * @subpackage commands/community
 * @maintainer Takayuki Miyauchi
 */
class WP_CLI_Virutual_Hosts extends \WP_CLI_Command
{
	// nothing to do, this class is just for help message
}

WP_CLI::add_command( 'vhosts', 'WP_CLI_Virutual_Hosts'  );

require_once( dirname( __FILE__ ) . '/lib/abstract.php' );
require_once( dirname( __FILE__ ) . '/lib/plugin.php' );
require_once( dirname( __FILE__ ) . '/lib/theme.php' );
