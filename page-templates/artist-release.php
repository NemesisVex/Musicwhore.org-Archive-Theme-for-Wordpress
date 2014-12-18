<?php

if (!empty($filter)):
	$release = get_release($filter);
	$artist = $release->album->artist;

	if (!empty($release->settings->asin_num)):
		$aws_item = get_release_from_amazon($release->settings->asin_num, $release->release_country_name);

		if (!empty($aws_item)):
			$release->aws_item = $aws_item;
			$release->tracks = Musicwhore_Track::parse_aws_tracks($aws_item->Tracks);
			$cover = array( 'url' => (string) $release->aws_item->MediumImage->URL);
		endif;
	endif;

	if (!empty($release->tracks)):
		$last_track_index = max(array_keys($release->tracks));
		$num_of_discs = $release->tracks[$last_track_index]->track_disc_num;
	endif;
	
	if (empty($cover)):
		$cover = MusicwhoreArchive_Template_Tags::parse_release_image($release);
	endif;
?>

<h2>Artists</h2>

<h3><?php echo MusicwhoreArchive_Template_Tags::display_artist_name($artist); ?></h3>

<?php include(plugin_dir_path(__FILE__) . 'artist-artist-detail-nav.php'); ?>

<?php if (!empty($cover['url'])): ?>
<p>
	<img src="<?php echo $cover['url']; ?>" alt="[<?php echo $release->album->album_title ?>]"  title="[<?php echo $release->album->album_title ?>]" />
</p>
<?php endif; ?>

<h4><?php echo $release->album->album_title; ?></h4>

<?php if (!empty($release->album->settings)): ?>
<ul class="list-unstyled">
	<?php
	if (!empty($release->album->settings->soloist_id)):
		$soloist = get_artist($release->album->settings->soloist_id);
		?>
		<li><?php echo $soloist->artist_name; ?></li>
	<?php endif; ?>
	<?php
	if (!empty($release->album->settings->ensemble_id)):
		$ensemble = get_artist($release->album->settings->ensemble_id);
	?>
	<li><?php echo $ensemble->artist_name; ?></li>
	<?php endif; ?>
	<?php
	if (!empty($release->album->settings->conductor_id)):
		$conductor = get_artist($release->album->settings->conductor_id);
		?>
		<li><?php echo $conductor->artist_name; ?></li>
	<?php endif; ?>
</ul>
<?php endif; ?>

<ul>
	<li>Catalog no.: <?php echo $release->release_catalog_num; ?></li>
	<li>Label: <?php echo $release->release_label; ?></li>
	<li>Format: <abbr title="<?php echo $release->release_format_name ?>"><?php echo $release->release_format_alias; ?></abbr></li>
	<li>Release date: <?php echo date('Y-m-d', strtotime($release->release_release_date)); ?></li>
</ul>

<?php if (!empty($release->tracks)): ?>
<h5>Tracks</h5>

<table class="table">
	<thead>
		<tr>
		<?php if ($num_of_discs > 1): ?>
			<th>Disc #</th>
		<?php endif; ?>
			<th>Track #</th>
			<th>Title</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($release->tracks as $track): ?>
		<tr>
		<?php if ($num_of_discs > 1): ?>
			<td><?php echo $track->track_disc_num; ?></td>
		<?php endif; ?>
			<td><?php echo $track->track_track_num; ?></td>
			<td><?php echo $track->track_song_title; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

<?php if (!empty($release->aws_item)): ?>
<p>
	<small>Track listing and cover provided by <a href="http://amazon.com/">Amazon</a>.</small>
</p>
<?php endif; ?>


<?php endif; ?>

<?php endif; ?>
