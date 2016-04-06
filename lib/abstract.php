<?php

abstract class Virutual_Hosts_Command extends \WP_CLI_Command {
	protected static function sites() {
		return \WP_CLI::get_runner()->extra_config['sites'];
	}

	protected static function run( $command, $args, $assoc_args ) {
		foreach ( self::sites() as $site ) {
			self::label( $site );

			$res = \WP_CLI::launch_self(
				$command,
				$args,
				$assoc_args,
				true,           // exit_on_error
				true,			// return_detailed
				array( 'path' => $site )
			);

			self::echo( $res );
			WP_CLI::line( "" );
		}
	}

	protected static function echo( $res ) {
		if ( ! empty( $res->stdout ) ) {
			WP_CLI::success( "\n" . str_replace( "Success: ", "", $res->stdout ) );
		} else {
			WP_CLI::warning( self::parse_message( $res->stderr ) );
		}
	}

	protected static function label( $str ) {
		$label = 'Site: ' . $str;
		$len = strlen( $label ) + 3;
		WP_CLI::line( WP_CLI::colorize( "%G" . str_repeat( '=', $len ) . "%n" ) );
		WP_CLI::line( WP_CLI::colorize( "%G" . $label . "%n" ) );
		WP_CLI::line( WP_CLI::colorize( "%G" . str_repeat( '=', $len ) . "%n" ) );
	}

	protected static function parse_message( $message ) {
		$lines = preg_split( "/\n/", trim( $message ) );
		return preg_replace( "/.*\: (.*)/", "$1", array_pop( $lines ) );
	}
}
