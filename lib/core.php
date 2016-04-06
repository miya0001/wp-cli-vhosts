<?php

class Virutual_Hosts_Core_Command extends Virutual_Hosts_Command {

	/**
	 * Check for update via Version Check API.
	 *
	 * Lists the most recent versions when there are updates available, or success message when up to date.
	 *
	 * ## OPTIONS
	 *
	 * [--minor]
	 * : Compare only the first two parts of the version number.
	 *
	 * [--major]
	 * : Compare only the first part of the version number.
	 *
	 * [--field=<field>]
	 * : Prints the value of a single field for each update.
	 *
	 * [--fields=<fields>]
	 * : Limit the output to specific object fields. Defaults to version,update_type,package_url.
	 *
	 * [--format=<format>]
	 * : Accepted values: table, csv, json, yaml. Default: table
	 *
	 * @subcommand check-update
	 * @when before_wp_load
	 */
	function check_update( $_, $assoc_args ) {
		self::run( 'core check-update', $_, $assoc_args );
	}

	/**
	 * Download core WordPress files.
	 *
	 * ## OPTIONS
	 *
	 * [--path=<path>]
	 * : Specify the path in which to install WordPress.
	 *
	 * [--locale=<locale>]
	 * : Select which language you want to download.
	 *
	 * [--version=<version>]
	 * : Select which version you want to download.
	 *
	 * [--force]
	 * : Overwrites existing files, if present.
	 *
	 * ## EXAMPLES
	 *
	 *     wp vhosts core download --locale=nl_NL
	 *
	 * @when before_wp_load
	 */
	public function download( $args, $assoc_args ) {
		self::run( 'core download', $args, $assoc_args );
	}

	/**
	 * Display the WordPress version.
	 *
	 * ## OPTIONS
	 *
	 * [--extra]
	 * : Show extended version information.
	 *
	 * @when before_wp_load
	 */
	public function version( $args = array(), $assoc_args = array() ) {
		self::run( 'core version', $args, $assoc_args );
	}

	/**
	 * Verify WordPress files against WordPress.org's checksums.
	 *
	 * Specify version to verify checksums without loading WordPress.
	 *
	 * [--version=<version>]
	 * : Verify checksums against a specific version of WordPress.
	 *
	 * [--locale=<locale>]
	 * : Verify checksums against a specific locale of WordPress.
	 *
	 * @when before_wp_load
	 *
	 * @subcommand verify-checksums
	 * @when before_wp_load
	 */
	public function verify_checksums( $args, $assoc_args ) {
		self::run( 'core verify-checksums', $args, $assoc_args );
	}

	/**
	 * Update WordPress.
	 *
	 * ## OPTIONS
	 *
	 * [<zip>]
	 * : Path to zip file to use, instead of downloading from wordpress.org.
	 *
	 * [--minor]
	 * : Only perform updates for minor releases (e.g. update from WP 4.3 to 4.3.3 instead of 4.4.2).
	 *
	 * [--version=<version>]
	 * : Update to a specific version, instead of to the latest version.
	 *
	 * [--force]
	 * : Update even when installed WP version is greater than the requested version.
     *
     * [--locale=<locale>]
     * : Select which language you want to download.
	 *
	 * ## EXAMPLES
	 *
	 *     wp vhosts core update
	 *
	 *     wp vhosts core update --version=3.8 ../latest.zip
	 *
	 *     wp vhosts core update --version=3.1 --force
	 *
	 * @alias upgrade
	 * @when before_wp_load
	 */
	function update( $args, $assoc_args ) {
		self::run( 'core update', $args, $assoc_args );
	}

	/**
	 * Update the WordPress database.
	 *
	 * [--network]
	 * : Update databases for all sites on a network
	 *
	 * [--dry-run]
	 * : Compare database versions without performing the update.
	 *
	 * @subcommand update-db
	 * @when before_wp_load
	 */
	function update_db( $_, $assoc_args ) {
		self::run( 'core update-db', $args, $assoc_args );
	}
}

WP_CLI::add_command( 'vhosts core', 'Virutual_Hosts_Core_Command' );
