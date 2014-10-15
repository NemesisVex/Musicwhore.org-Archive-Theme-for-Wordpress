<?php
/**
 * Template Name: Artist Page
 *
 * @package WordPress
 * @subpackage MusicwhoreArchive
 * @since MusicwhoreArchive 1.0
 */
?>
<?php get_header(); ?>

<div class="col-md-8">
	<?php $module = get_query_var('module'); ?>
	<?php if (!empty($module)): ?>
		<?php include(plugin_dir_path(__FILE__) . '/artist-' . $module . '.php'); ?>
	<?php else: ?>
		<?php include(plugin_dir_path(__FILE__) . '/artist-artist.php'); ?>
	<?php endif; ?>
</div><!-- #main-content -->

<?php get_sidebar(); ?>
<?php get_footer();
