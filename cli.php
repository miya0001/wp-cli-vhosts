<?php

if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
	return;
}

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

	/**
	 * Print `wp vhosts` version.
	 *
	 * @when before_wp_load
	 */
	function version( $args ) {
		WP_CLI::line( trim( file_get_contents( dirname( __FILE__ ) . '/VERSION' ) ) );
	}

	/**
	 * Add current site to ~/.wp-cli/config.yml
	 *
	 * @subcommand add
	 */
	function add( $args, $assoc_args = array() ) {
		$path = ABSPATH;

		$sites = array();
		if ( ! empty( WP_CLI::get_runner()->extra_config['sites'] ) ) {
			$sites = WP_CLI::get_runner()->extra_config['sites'];
		}
		$sites[] = $path;
		$sites = array_unique( $sites );

		$global_config = spyc_load_file( self::get_global_config_path() );
		$global_config['sites'] = $sites;

		$yaml = Spyc::YAMLDump( $global_config, 2, 0 );
		$yaml = substr( $yaml, 4 ); // Spyc::YAMLDump() prepends "---\n" :(

		file_put_contents( self::get_global_config_path(), $yaml );

		WP_CLI::success( '`' . $path . '` was added to the `' . self::get_global_config_path() . '`.' );
	}

	/**
	 * Get the path to the global configuration YAML file.
	 *
	 * @return string|false
	 */
	private static function get_global_config_path() {
		if ( getenv( 'WP_CLI_CONFIG_PATH' ) ) {
			$config_path = getenv( 'WP_CLI_CONFIG_PATH' );
		} else {
			$config_path = getenv( 'HOME' ) . '/.wp-cli/config.yml';
		}
		if ( is_readable( $config_path ) ) {
			return $config_path;
		} else {
			return false;
		}
	}
}

WP_CLI::add_command( 'vhosts', 'WP_CLI_Virutual_Hosts'  );

require_once( dirname( __FILE__ ) . '/lib/plugin.php' );
require_once( dirname( __FILE__ ) . '/lib/theme.php' );
require_once( dirname( __FILE__ ) . '/lib/core.php' );
require_once( dirname( __FILE__ ) . '/lib/core-language.php' );
