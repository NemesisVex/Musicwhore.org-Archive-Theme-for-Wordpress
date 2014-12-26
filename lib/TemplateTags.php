<?php
/**
 * Created by PhpStorm.
 * User: gregbueno
 * Date: 10/14/14
 * Time: 10:50 PM
 */

namespace VigilantMedia\WordPress\Themes\MusicwhoreArchive;

class TemplateTags {

	public static function display_artist_name ( $artist ) {
		return !empty($artist->artist_display_name) ? $artist->artist_display_name . ' (' . $artist->artist_name . ')' : $artist->artist_name;
	}

	public static function parse_artist_image($artist) {
		$wp_upload_dir = wp_upload_dir();
		$wp_basedir = $wp_upload_dir['basedir'];
		$wp_baseurl = $wp_upload_dir['baseurl'];
		$artist_image_dir = $wp_basedir . '/archive/images/artists/' . $artist->artist_file_system . '.jpg';
		if (file_exists($artist_image_dir)) {
			$artist_image_url = $wp_baseurl . '/archive/images/artists/' . $artist->artist_file_system . '.jpg';
		}
		return array( 'dir' => $artist_image_dir, 'url' => $artist_image_url );
	}

	public static function parse_album_image( $album, $artist = null ) {
		if (empty($artist)) {
			$artist = $album->artist;
		}

		return TemplateTags::parse_discog_image($album->album_image, $artist->artist_file_system);
	}


	public static function parse_discog_image( $image, $file_system ) {
		if (empty($image)) {
			return false;
		}

		$wp_upload_dir = wp_upload_dir();
		$wp_basedir = $wp_upload_dir['basedir'];
		$wp_baseurl = $wp_upload_dir['baseurl'];
		$discog_image_dir = $wp_basedir . '/archive/images/discog/' . substr($file_system, 0, 1) . '/' . $file_system . '/' . $image;
		if (file_exists($discog_image_dir)) {
			$discog_image_url = $wp_baseurl . '/archive/images/discog/' . substr($file_system, 0, 1) . '/' . $file_system . '/' . $image;
		}
		return array( 'dir' => $discog_image_dir, 'url' => $discog_image_url );
	}

	public static function parse_release_image($release, $artist = null) {
		if (empty($artist)) {
			$artist = $release->album->artist;
		}

		return TemplateTags::parse_discog_image($release->release_image, $artist->artist_file_system);
	}

}