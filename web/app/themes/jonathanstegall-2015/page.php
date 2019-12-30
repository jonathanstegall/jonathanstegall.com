<?php
/**
 * The template for displaying all single pages.
 *
 * @package jonathanstegall_2015
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php
		$post_meta = get_post_custom(get_the_ID());
		set_query_var( 'post_meta', $post_meta );
		?>
		<?php get_template_part( 'content', 'page' ); ?>

	<?php endwhile; // end of the loop. ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
