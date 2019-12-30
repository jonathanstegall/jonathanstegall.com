<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package jonathanstegall_2015
 */

get_header(); ?>

<?php //$my_query = new WP_Query( 'post_format=aside&posts_per_page=1' );

	$section_args = array(
		'numberposts' => -1,
		'post_type' => 'page',
		'meta_key' => 'section_on_home_page',
		'order' => ASC,
		'orderby' => menu_order,
		'meta_value' => TRUE
	);

	$sections = new WP_Query();  // Main blog query
	$sections->query( $section_args );

?>

<?php if ( $sections->have_posts() ) : while ( $sections->have_posts() ) : $sections->the_post(); ?>
	<?php
		/* Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */

		$meta = get_post_custom(get_the_ID());
		
		$post_args = array(
			'posts_per_page' => $meta['number_of_posts'][0],
			'post_type' => $meta['post_type'][0]
		);

		if ($meta['post_type'][0] == 'post') {
			if ($meta['post_format'][0] != FALSE) {
				$post_args['tax_query'] = array(
					array( 'taxonomy' => 'post_format',
					  'field' => 'slug',
					  'terms' => array('post-format-' . $meta['post_format'][0]),
					  'operator' => 'IN'
					)
				);
			} else {
				$post_args['tax_query'] = array(
					array( 'taxonomy' => 'post_format',
					  'field' => 'slug',
					  'terms' => array('post-format-aside', 'post-format-gallery', 'post-format-link', 'post-format-image', 'post-format-quote', 'post-format-status', 'post-format-audio', 'post-format-chat', 'post-format-video'),
					  'operator' => 'NOT IN'
					)
				);

			}
		} else if ($meta['post_type'][0] == 'page') {
			$post_args['post_parent'] = get_the_ID();
		}

		$posts = new WP_Query();  // Main blog query
		$posts->query( $post_args );

		set_query_var( 'meta', $meta );
		get_template_part( 'content-section', get_post_format() );
	?>



<?php endwhile; endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
