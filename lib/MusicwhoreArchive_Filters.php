<?php
/**
 * Created by PhpStorm.
 * User: gregbueno
 * Date: 10/14/14
 * Time: 9:31 PM
 */

class MusicwhoreArchive_Filters {

	public function __construct() {

	}

	public static function widgets_init() {
		require get_stylesheet_directory() . '/lib/MusicwhoreArchive_Yearly_Archive_Widget.php';
		require get_stylesheet_directory() . '/lib/MusicwhoreArchive_Artist_List_Widget.php';

		register_widget( 'MusicwhoreArchive_Yearly_Archive_Widget' );
		register_widget( 'MusicwhoreArchive_Artist_List_Widget' );
	}
}