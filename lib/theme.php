<?php

class Virutual_Hosts_Theme_Command extends Virutual_Hosts_Command {

	/**
	 * See the status of one or all themes.
	 *
	 * ## OPTIONS
	 *
	 * [<theme>]
	 * : A particular theme to show the status for.
	 *
	 * @when before_wp_load
	 */
	function status( $args ) {
		self::run( 'theme status', $args );
	}

	/**
	 * Activate a theme.
	 *
	 * ## OPTIONS
	 *
	 * <theme>
	 * : The theme to activate.
	 *
	 * @when before_wp_load
	 */
	public function activate( $args = array() ) {
		self::run( 'theme activate', $args );
	}

	/**
	 * Install a theme.
	 *
	 * ## OPTIONS
	 *
	 * <theme|zip|url>...
	 * : A theme slug, the path to a local zip file, or URL to a remote zip file.
	 *
	 * [--version=<version>]
	 * : If set, get that particular version from wordpress.org, instead of the
	 * stable version.
	 *
	 * [--force]
	 * : If set, the command will overwrite any installed version of the theme, without prompting
	 * for confirmation.
	 *
	 * [--activate]
	 * : If set, the theme will be activated immediately after install.
	 *
	 * ## EXAMPLES
	 *
	 *     # Install the latest version from wordpress.org and activate
	 *     wp vhosts theme install twentytwelve --activate
	 *
	 *     # Install from a local zip file
	 *     wp vhosts theme install ../my-theme.zip
	 *
	 *     # Install from a remote zip file
	 *     wp vhosts theme install http://s3.amazonaws.com/bucketname/my-theme.zip?AWSAccessKeyId=123&Expires=456&Signature=abcdef
	 *
	 * @when before_wp_load
	 */
	function install( $args, $assoc_args ) {
		self::run( 'theme install', $args, $assoc_args );
	}

	/**
	 * Update one or more themes.
	 *
	 * ## OPTIONS
	 *
	 * [<theme>...]
	 * : One or more themes to update.
	 *
	 * [--all]
	 * : If set, all themes that have updates will be updated.
	 *
	 * [--format=<format>]
	 * : Output summary as table or summary. Defaults to table.
	 *
	 * [--version=<version>]
	 * : If set, the theme will be updated to the specified version.
	 *
	 * [--dry-run]
	 * : Preview which themes would be updated.
	 *
	 * ## EXAMPLES
	 *
	 *     wp vhosts theme update twentyeleven twentytwelve
	 *
	 *     wp vhosts theme update --all
	 *
	 * @alias upgrade
	 * @when before_wp_load
	 */
	function update( $args, $assoc_args ) {
		self::run( 'theme update', $args, $assoc_args );
	}
}

WP_CLI::add_command( 'vhosts theme', 'Virutual_Hosts_Theme_Command' );
