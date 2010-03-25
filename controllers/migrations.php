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
			$current_version = $this->migrations->get_schema_version();
			$last_version = $this->migrations->last_schema_version();
			echo <<<EOF
             Action: Status

  Current Migration: $current_version
   Latest Migration: $last_version

===================================================================

EOF;
		}
		
		public function up ( $version = null) {
			if( is_null( $version ) )
				$version = $this->migrations->last_schema_version();

			$current_version = $this->migrations->get_schema_version();
			$last_version = $this->migrations->last_schema_version();
			echo <<<EOF
               Action: Migrate

    Current Migration: $current_version
     Latest Migration: $last_version

  Requested Migration: $version
            Migrating: UP

===================================================================


EOF;
			if( $version <= $current_version )
				echo "  Nothing To Do!\n";
			else {
				echo implode( "\n", $this->migrations->migrate( $current_version, $version ) );
			}
			
			echo "\n";
		}
		
		public function down ( $version = null) {
			if( is_null( $version ) )
				$version = $this->migrations->last_schema_version();

			$current_version = $this->migrations->get_schema_version();
			$last_version = $this->migrations->last_schema_version();
			echo <<<EOF
               Action: Migrate

    Current Migration: $current_version
     Latest Migration: $last_version

  Requested Migration: $version
            Migrating: DOWN

===================================================================


EOF;
			if( $version >= $current_version )
				echo "  Nothing To Do!\n";
			else {
				echo implode( "\n", $this->migrations->migrate( $current_version, $version ) );
			}
			echo "\n";
		}
		
	}
