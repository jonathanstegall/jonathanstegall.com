<?php
/**
 * Template Name: Category
 * The template for displaying category pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package jonathanstegall_2015
 */

get_header();
$slug = basename(get_permalink());
$meta = get_post_custom(get_the_ID());

$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
	
if (is_category()) {
	$title = single_cat_title('', false);
	$description = category_description();
} ?>

<header class="intro grid cf">
	<h1><?php echo $title; ?></h1>
	<?php
		if ($description !== '') {
			echo '<p>' . $description . '</p>';
		}
	?>
</header>

<div class="grid-wrapper cf">
    <section class="page grid cf">
		<h1><?php if ($paged !== 1) { echo 'Page ' . $paged; } else { echo 'Most Recent'; } ?></h1>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
			<?php
			$post_meta = get_post_custom(get_the_ID());
			set_query_var( 'post_meta', $post_meta );
			echo '<article>';
			get_template_part( 'content-title', get_post_format() );
			echo '</article>';
			?>
		<?php endwhile; endif; ?>

	</section>

	<nav class="grid-wrapper section-nav all-years cf">
	    <ol class="grid cf">
	        <li><?php previous_posts_link('&laquo; Newer', $posts ->max_num_pages);?></li>
	        <li><?php next_posts_link('Older &raquo;', $posts ->max_num_pages); ?></li>
	    </ol>
	  </nav>

</div>



<?php 
// clean up after the query and pagination
wp_reset_postdata(); 
?>

	

<?php get_sidebar(); ?>
<?php get_footer(); ?>