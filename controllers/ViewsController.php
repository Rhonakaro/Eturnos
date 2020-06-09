<?php

class ViewsController
{
	private static $viewad_path = 'views/admin/';
	private static $viewas_path = 'views/asist/';
	private static $viewpr_path = 'views/prof/';
	private static $view_path = 'views/';

	public function load_view($view) {

		if ( !isset($_SESSION['roll']) ) {

			require_once( self::$view_path . 'headerLo.php' );
			require_once( self::$view_path . $view . '.php' );
			require_once( self::$view_path . 'footerLo.php' );

		} else {

			switch ( $_SESSION['roll'] ) {

				case 'dba':
						require_once( self::$viewad_path . 'headerAd.php' );
						require_once( self::$viewad_path . 'sidebarLAd.php' );
						require_once( self::$viewad_path . 'sidebarRAd.php' );
						require_once( self::$viewad_path . $view . '.php' );
						require_once( self::$viewad_path . 'footerAd.php' );
						break;

				case 'doc':
						require_once( self::$viewpr_path . 'headerPr.php' );
						require_once( self::$viewpr_path . 'sidebarLPr.php' );
						require_once( self::$viewpr_path . 'sidebarRPr.php' );
						require_once( self::$viewpr_path . $view . '.php' );
						require_once( self::$viewpr_path . 'footerPr.php' );
						break;
							
				case 'aux':
						require_once( self::$viewas_path . 'headerAs.php' );
						require_once( self::$viewas_path . 'sidebarLAs.php' );
						require_once( self::$viewas_path . 'sidebarRAs.php' );
						require_once( self::$viewas_path . $view . '.php' );
						require_once( self::$viewas_path . 'footerAs.php' );
						break;
			}
		}
	}
				
	public function __destruct() {

	}
}