<?php
	defined('SYSPATH') or die('No direct script access.');

	class Migrations_Controller extends Controller {

		public function __construct () {
			parent::__construct();
			// Command line access ONLY
			if( 'cli' != PHP_SAPI ) { url::redirect( '/' ); }
			echo "\n=======================[ Kohana Migrations ]=======================\n\n";
			$this->migrations = new Migrations();
		}
		
		public function index () {
			$this->_print_status();
			echo "\n";
			echo "===================================================================\n\n";
		}
		
		public function up ( $version = null ) { $this->_migrate( $version ); }
		
		public function down ( $version = null ) { $this->_migrate( $version, true ); }
		
		protected function _migrate ( $version, $down = false ) {
			if( is_null( $version ) )
				$version = $this->migrations->last_schema_version();

			$current_version = $this->migrations->get_schema_version();
			$last_version = $this->migrations->last_schema_version();
			
			$direction = ( $down ) ? 'DOWN' : 'UP';
			
			$this->_print_status( 'Migrate' );
			
			echo <<<EOF

===================================================================

  Requested Migration: $version
            Migrating: $direction

===================================================================


EOF;
			
			if( $down ) {
				if( $version >= $current_version ) { echo "  Nothing To Do!"; }
				else { echo implode( "\n", $this->migrations->migrate( $current_version, $version ) ); }
			}
			else {
				if( $version <= $current_version ) { echo "  Nothing To Do!"; }
				else { echo implode( "\n", $this->migrations->migrate( $current_version, $version ) ); }
			}
			echo "\n\n";
			echo "===================================================================\n\n";
			$this->_print_status();
			echo "\n===================================================================\n\n";
		}
		
	protected function _print_status () {
		$current_version = $this->migrations->get_schema_version();
		$last_version = $this->migrations->last_schema_version();
		echo <<<EOF
    Current Migration: $current_version
     Latest Migration: $last_version

EOF;
	}
		
	}
