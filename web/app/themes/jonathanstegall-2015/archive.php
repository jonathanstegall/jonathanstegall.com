<?php
/**
 * Template Name: Asides Archives
 * The template for displaying aside archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package jonathanstegall_2015
 */

get_header(); 
$slug = basename(get_permalink());
$meta = get_post_custom(get_the_ID());

$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

if (get_the_title() !== '') { ?>
	<header class="intro grid cf">
		<h1><?php the_title(); ?></h1>
		<?php
			$description = $meta['description'][0];
			if ($description !== '') {
				echo '<p>' . $description . '</p>';
			}
		?>
	</header>
<?php } else if ($meta['headline'][0] !== '') { ?>
	<header class="intro grid cf">
		<h1><?php echo $meta['headline'][0]; ?></h1>
		<?php
			$description = $meta['description'][0];
			if ($description !== '') {
				echo '<p>' . $description . '</p>';
			}
		?>
	</header>
<?php } ?>

<div class="grid-wrapper cf">
    <section class="page grid cf">
		<h1><?php if ($paged !== 1) { echo 'Page ' . $paged; } else { echo 'Most Recent Items'; } ?></h1>

		<?php
		    $post_args = array(
				'orderby'          => 'post_date',
				'order'            => 'DESC',
				'post_type'        => 'post',
				'year' => $year->year,
				'paged' => $paged
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
			}


			$posts = new WP_Query();  // Main blog query
			$posts->query( $post_args );

		?>

		<?php if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
			<?php
			$post_meta = get_post_custom(get_the_ID());
			set_query_var( 'post_meta', $post_meta );
			echo '<article>';
			get_template_part( 'content-title', get_post_format() );
			echo '</article>';
			?>
		<?php endwhile; endif; ?>

	</section>

	<nav class="grid-wrapper section-nav previous-next cf">
	    <ol class="grid cf">
	        <li class="older"><?php next_posts_link('&laquo; Older ', $posts->max_num_pages); ?></li>
	        <li class="newer"><?php previous_posts_link('Newer &raquo;', $posts->max_num_pages);?></li>
	    </ol>
	  </nav>

</div>



<?php 
// clean up after the query and pagination
wp_reset_postdata(); 
?>

	

<?php get_sidebar(); ?>
<?php get_footer(); ?>
