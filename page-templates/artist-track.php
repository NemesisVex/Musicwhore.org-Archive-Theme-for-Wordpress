<?php
namespace VigilantMedia\WordPress\Themes\MusicwhoreArchive;

if (!empty($filter)) {
	$track = get_track($filter);
}
?>

<pre>
<?php
echo $filter . "\n";
print_r($track);
?>
</pre>