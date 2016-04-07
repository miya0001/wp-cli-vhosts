<?php

abstract class Virutual_Hosts_Command extends \WP_CLI_Command {
	protected static function sites() {
		return \WP_CLI::get_runner()->extra_config['sites'];
	}

	protected static function run( $command, $args, $assoc_args = array() ) {
		foreach ( self::sites() as $site ) {
			self::label( $site );

			$res = \WP_CLI::launch_self(
				$command,
				$args,
				$assoc_args,
				false,           // exit_on_error
				true,			// return_detailed
				array( 'path' => $site )
			);

			self::display( $res );
		}
	}

	protected static function display( $res ) {
		if ( ! empty( $res->stdout ) ) {
			WP_CLI::line( self::colorize( $res->stdout ) );
		}

		if ( ! empty( $res->stderr ) ) {
			WP_CLI::line( self::colorize( $res->stderr ) );
		}
	}

	protected static function label( $str ) {
		$label = 'Site: ' . $str;
		$len = strlen( $label ) + 1;
		WP_CLI::line( WP_CLI::colorize( "%W" . str_repeat( '=', $len ) . "%n" ) );
		WP_CLI::line( WP_CLI::colorize( "%W" . $label . "%n" ) );
		WP_CLI::line( WP_CLI::colorize( "%W" . str_repeat( '=', $len ) . "%n" ) );
	}

	protected static function colorize( $message ) {
		$message = str_replace( 'Success:', WP_CLI::colorize( '%GSuccess:%n' ), $message );
		$message = str_replace( 'Warning:', WP_CLI::colorize( '%cWarning:%n' ), $message );
		$message = str_replace( 'Error:', WP_CLI::colorize( '%rError:%n' ), $message );
		return $message;
	}
}
