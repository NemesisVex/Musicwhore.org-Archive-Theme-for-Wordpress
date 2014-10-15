<?php
/**
 * Created by PhpStorm.
 * User: gregbueno
 * Date: 10/14/14
 * Time: 11:35 PM
 */

class MusicwhoreArchive_Artist_List_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct( 'widget_musicwhorearchive_artist_list', __( 'Artist List', 'musicwhorearchive' ), array(
			'classname'   => 'widget_musicwhorearchive_artist_list',
			'description' => __( 'A list of Musicwhore.org Artists', 'musicwhorearchive' ),
		) );
	}

	public function widget( $args, $instance ) {
		$title = !empty( $instance['title'] ) ? $instance['title'] : translate( 'Artists', 'musicwhorearchive' );
		$artists_nav = null;
		if (function_exists('get_artists_nav')):
			$artists_nav = get_artists_nav();
		endif;

		if (!empty($artists_nav)):
			echo $args['before_widget'];
			?>
			<h3><?php echo $title; ?></h3>

			<ul class="list-inline">
				<?php foreach ($artists_nav as $artist_nav): ?>
					<li><a href="/artist/browse/<?php echo strtolower($artist_nav->nav); ?>/"><?php echo $artist_nav->nav; ?></a></li>
				<?php endforeach; ?>
			</ul>
		<?php
			echo $args['after_widget'];
		endif;
	}

	public function update( $new_instance, $instance ) {
		$instance['title']  = strip_tags( $new_instance['title'] );

		return $instance;
	}

	public 	function form( $instance ) {
		$title  = empty( $instance['title'] ) ? '' : esc_attr( $instance['title'] );
		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'musicwhore2014' ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"></p>

	<?php
	}
} 