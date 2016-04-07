<?php

/**
 * Manage plugins of all sites.
 */
class Virutual_Hosts_Plugin_Command extends Virutual_Hosts_Command {

	/**
	 * See the status of one or all plugins.
	 *
	 * ## OPTIONS
	 *
	 * [<plugin>]
	 * : A particular plugin to show the status for.
	 *
	 * @when before_wp_load
	 */
	function status( $args, $assoc_args = array() ) {
		self::run( 'plugin status', $args, $assoc_args );
	}

	/**
	 * Activate a plugin.
	 *
	 * ## OPTIONS
	 *
	 * [<plugin>...]
	 * : One or more plugins to activate.
	 *
	 * [--all]
	 * : If set, all plugins will be activated.
	 *
	 * [--network]
	 * : If set, the plugin will be activated for the entire multisite network.
	 *
	 * @when before_wp_load
	 */
	function activate( $args, $assoc_args = array() ) {
		self::run( 'plugin activate', $args, $assoc_args );
	}

	/**
	 * Deactivate a plugin.
	 *
	 * ## OPTIONS
	 *
	 * [<plugin>...]
	 * : One or more plugins to deactivate.
	 *
	 * [--uninstall]
	 * : Uninstall the plugin after deactivation.
	 *
	 * [--all]
	 * : If set, all plugins will be deactivated.
	 *
	 * [--network]
	 * : If set, the plugin will be deactivated for the entire multisite network.
	 *
	 * @when before_wp_load
	 */
	function deactivate( $args, $assoc_args = array() ) {
		self::run( 'plugin deactivate', $args, $assoc_args );
	}

	/**
	 * Update one or more plugins.
	 *
	 * ## OPTIONS
	 *
	 * [<plugin>...]
	 * : One or more plugins to update.
	 *
	 * [--all]
	 * : If set, all plugins that have updates will be updated.
	 *
	 * [--format=<format>]
	 * : Output summary as table or summary. Defaults to table.
	 *
	 * [--version=<version>]
	 * : If set, the plugin will be updated to the specified version.
	 *
	 * [--dry-run]
	 * : Preview which plugins would be updated.
	 *
	 * ## EXAMPLES
	 *
	 *     wp vhosts plugin update bbpress --version=dev
	 *
	 *     wp vhosts plugin update --all
	 *
	 * @alias upgrade
	 * @when before_wp_load
	 */
	function update( $args, $assoc_args ) {
		self::run( 'plugin update', $args, $assoc_args );
	}

	/**
	 * Install a plugin.
	 *
	 * ## OPTIONS
	 *
	 * <plugin|zip|url>...
	 * : A plugin slug, the path to a local zip file, or URL to a remote zip file.
	 *
	 * [--version=<version>]
	 * : If set, get that particular version from wordpress.org, instead of the
	 * stable version.
	 *
	 * [--force]
	 * : If set, the command will overwrite any installed version of the plugin, without prompting
	 * for confirmation.
	 *
	 * [--activate]
	 * : If set, the plugin will be activated immediately after install.
	 *
	 * [--activate-network]
	 * : If set, the plugin will be network activated immediately after install
	 *
	 * ## EXAMPLES
	 *
	 *     # Install the latest version from wordpress.org and activate
	 *     wp vhosts plugin install bbpress --activate
	 *
	 *     # Install the development version from wordpress.org
	 *     wp vhosts plugin install bbpress --version=dev
	 *
	 *     # Install from a local zip file
	 *     wp vhosts plugin install ../my-plugin.zip
	 *
	 *     # Install from a remote zip file
	 *     wp vhosts plugin install http://s3.amazonaws.com/bucketname/my-plugin.zip?AWSAccessKeyId=123&Expires=456&Signature=abcdef
	 *
	 * @when before_wp_load
	 */
	function install( $args, $assoc_args ) {
		self::run( 'plugin install', $args, $assoc_args );
	}

	/**
	 * Uninstall a plugin.
	 *
	 * ## OPTIONS
	 *
	 * <plugin>...
	 * : One or more plugins to uninstall.
	 *
	 * [--deactivate]
	 * : Deactivate the plugin before uninstalling. Default behavior is to warn and skip if the plugin is active.
	 *
	 * [--skip-delete]
	 * : If set, the plugin files will not be deleted. Only the uninstall procedure
	 * will be run.
	 *
	 * ## EXAMPLES
	 *
	 *     wp vhosts plugin uninstall hello
	 *
	 * @when before_wp_load
	 */
	function uninstall( $args, $assoc_args = array() ) {
		self::run( 'plugin uninstall', $args, $assoc_args );
	}
}

WP_CLI::add_command( 'vhosts plugin', 'Virutual_Hosts_Plugin_Command' );
