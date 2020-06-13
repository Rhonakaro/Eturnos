<?php

class ViewsController
{
	private static $viewad_path = 'views/admin/';
	private static $viewas_path = 'views/asist/';
	private static $viewpr_path = 'views/prof/';
	private static $view_path = 'views/';

	public function load_view($view) {

		if ( !isset($_SESSION['roll']) ) {

			//require_once( self::$view_path . 'headerLo.php' );
			require_once( self::$view_path . $view . '.php' );
			//require_once( self::$view_path . 'footerLo.php' );

		} else {

			switch ( $_SESSION['roll'] ) {

				case 'dba':
						require_once( self::$viewad_path . 'header_admin.php' );
						require_once( self::$viewad_path . 'sidebarL_admin.php' );
						require_once( self::$viewad_path . 'sidebarR_admin.php' );
						require_once( self::$viewad_path . $view . '.php' );
						require_once( self::$viewad_path . 'footer_admin.php' );
						break;

				case 'prof':
						require_once( self::$viewpr_path . 'header_professional.php' );
						require_once( self::$viewpr_path . 'sidebarL_professional.php' );
						require_once( self::$viewpr_path . 'sidebarR_professional.php' );
						require_once( self::$viewpr_path . $view . '.php' );
						require_once( self::$viewpr_path . 'footer_professional.php' );
						break;
							
				case 'aux':
						require_once( self::$viewas_path . 'header_assistant.php' );
						require_once( self::$viewas_path . 'sidebarL_assistant.php' );
						require_once( self::$viewas_path . 'sidebarR_assistant.php' );
						require_once( self::$viewas_path . $view . '.php' );
						require_once( self::$viewas_path . 'footer_assistant.php' );
						break;
			}
		}
	}
				
	public function __destruct() {

	}
}