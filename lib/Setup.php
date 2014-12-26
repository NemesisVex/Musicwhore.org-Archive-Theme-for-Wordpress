<?php
/**
 * Created by PhpStorm.
 * User: gregbueno
 * Date: 10/14/14
 * Time: 9:31 PM
 */

namespace VigilantMedia\WordPress\Themes\MusicwhoreArchive;

class Setup {

	public function __construct() {

	}

	public static function init() {
		add_action( 'widgets_init', array( __CLASS__, 'widgets_init' ) );
	}

	public static function widgets_init() {
		register_widget( __NAMESPACE__ . '\Widgets\YearlyArchive' );
		register_widget( __NAMESPACE__ . '\Widgets\ArtistList' );
	}
}