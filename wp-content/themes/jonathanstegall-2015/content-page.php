<?php
/**
 * @package jonathanstegall_2015
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="intro cf">
		<?php get_template_part( 'content-title', get_post_format() ); ?>
		<?php
		$description = $post_meta['description'][0];
		$button = $post_meta['button'][0];
		if ($button != '') {
			$button = ' <a href="' . get_the_permalink() . '" class="btn btn--positive"> ' . $button . '</a>';
		}
		if ($description != '') {
			echo '<p>' . $description . $button . '</p>';
		}
		?>
	</header>

	<?php the_content(); ?>

</article><!-- #post-## -->