<?php

class Virutual_Hosts_Core_Language_Command extends Virutual_Hosts_Command {

	/**
	 * Install a given language.
	 *
	 * <language>
	 * : Language code to install.
	 *
	 * [--activate]
	 * : If set, the language will be activated immediately after install.
	 *
	 * @subcommand install
	 * @when before_wp_load
	 */
	public function install( $args, $assoc_args ) {
		self::run( 'core language install', $args, $assoc_args );
	}

	/**
	 * Updates the active translation of core, plugins, and themes.
	 *
	 * [--dry-run]
	 * : Preview which translations would be updated.
	 *
	 * @subcommand update
	 * @when before_wp_load
	 */
	public function update( $args, $assoc_args ) {
		self::run( 'core language update', $args, $assoc_args );
	}

	/**
	 * Activate a given language.
	 *
	 * <language>
	 * : Language code to activate.
	 *
	 * @subcommand activate
	 * @when before_wp_load
	 */
	public function activate( $args, $assoc_args ) {
		self::run( 'core language activate', $args, $assoc_args );
	}

	/**
	 * Uninstall a given language.
	 *
	 * <language>
	 * : Language code to uninstall.
	 *
	 * @subcommand uninstall
	 * @when before_wp_load
	 */
	public function uninstall( $args, $assoc_args ) {
		self::run( 'core language uninstall', $args, $assoc_args );
	}
}

WP_CLI::add_command( 'vhosts core language', 'Virutual_Hosts_Core_Language_Command' );
