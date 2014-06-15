<?php

usort($artist->albums, function ($a, $b) {
	return ($a->album_release_date == $b->album_release_date) ? 0 : ( $a->album_release_date > $b->album_release_date ? -1 : 1);
});

if (!empty($artist->classical)):
	usort($artist->classical->soloist, function ($a, $b) {
		return ($a->album_release_date == $b->album_release_date) ? 0 : ( $a->album_release_date > $b->album_release_date ? -1 : 1);
	});

	usort($artist->classical->ensemble, function ($a, $b) {
		return ($a->album_release_date == $b->album_release_date) ? 0 : ( $a->album_release_date > $b->album_release_date ? -1 : 1);
	});

	usort($artist->classical->conductor, function ($a, $b) {
		return ($a->album_release_date == $b->album_release_date) ? 0 : ( $a->album_release_date > $b->album_release_date ? -1 : 1);
	});
endif;
?>

<h3><?php echo musicwhorearchive_display_artist_name($artist); ?></h3>

<?php include(plugin_dir_path(__FILE__) . 'artist-artist-detail-nav.php'); ?>

<h4>Albums</h4>

<ul>
<?php foreach ($artist->albums as $album): ?>
	<li>
		<div class="album-list-title">
			<a href="/album/<?php echo $album->album_id; ?>/"><?php echo $album->album_title; ?></a>
		</div>
		<div class="album-list-meta">
			&#8212; Format: <?php echo ucfirst($album->album_format->format_alias); ?>
			<?php if (!empty($album->album_release_date)): ?>| <?php echo date("Y-m-d", strtotime($album->album_release_date)); ?><?php endif; ?>
		</div>
	</li>
<?php endforeach; ?>
</ul>

<?php if (!empty($artist->classical)): ?>
	<?php if (!empty($artist->classical->soloist)): ?>
<h5>As soloist</h5>

<ul>
	<?php foreach ($artist->classical->soloist as $album): ?>
		<li>
			<div class="album-list-title">
				<a href="/album/<?php echo $album->album_id; ?>/"><?php echo $album->album_title; ?></a>
			</div>
			<div class="album-list-meta">
				&#8212; Format: <?php echo ucfirst($album->album_format->format_alias); ?>
				<?php if (!empty($album->album_release_date)): ?>| <?php echo date("Y-m-d", strtotime($album->album_release_date)); ?><?php endif; ?>
			</div>
		</li>
	<?php endforeach; ?>
</ul>
	<?php endif; ?>

	<?php if (!empty($artist->classical->ensemble)): ?>
<h5>As featured ensemble</h5>

<ul>
	<?php foreach ($artist->classical->ensemble as $album): ?>
		<li>
			<div class="album-list-title">
				<a href="/album/<?php echo $album->album_id; ?>/"><?php echo $album->album_title; ?></a>
			</div>
			<div class="album-list-meta">
				&#8212; Format: <?php echo ucfirst($album->album_format->format_alias); ?>
				<?php if (!empty($album->album_release_date)): ?>| <?php echo date("Y-m-d", strtotime($album->album_release_date)); ?><?php endif; ?>
			</div>
		</li>
	<?php endforeach; ?>
</ul>
	<?php endif; ?>

	<?php if (!empty($artist->classical->conductor)): ?>
<h5>As conductor</h5>

<ul>
	<?php foreach ($artist->classical->conductor as $album): ?>
		<li>
			<div class="album-list-title">
				<a href="/album/<?php echo $album->album_id; ?>/"><?php echo $album->album_title; ?></a>
			</div>
			<div class="album-list-meta">
				&#8212; Format: <?php echo ucfirst($album->album_format->format_alias); ?>
				<?php if (!empty($album->album_release_date)): ?>| <?php echo date("Y-m-d", strtotime($album->album_release_date)); ?><?php endif; ?>
			</div>
		</li>
	<?php endforeach; ?>
</ul>
	<?php endif; ?>
<?php endif; ?>