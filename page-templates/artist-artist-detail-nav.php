<?php if (!empty($artist->settings)): ?>
<ul class="list-inline">
	<li><a href="/artist/<?php echo $artist->artist_id; ?>/">Profile</a></li>
	<?php if ($artist->settings->nav_profile == true):?><li><a href="/artist/bio/<?php echo $artist->artist_id; ?>/">Biography</a></li><?php endif; ?>
	<?php if ($artist->settings->nav_discography == true):?><li><a href="/artist/albums/<?php echo $artist->artist_id; ?>/">Albums</a></li><?php endif; ?>
	<?php if ($artist->settings->nav_posts == true):?><li><a href="/artist/posts/<?php echo $artist->artist_id; ?>/">Posts</a></li><?php endif; ?>
	<?php /* if ($artist->settings->nav_lyrics == true):?><li><a href="/artist/posts/<?php echo $artist->artist_id; ?>/">Lyrics</a></li><?php endif; */ ?>
	<?php /* if ($artist->settings->nav_shop == true):?><li><a href="/artist/shop/<?php echo $artist->artist_id; ?>/">Shop</a></li><?php endif; */ ?>
</ul>
<?php endif; ?>
