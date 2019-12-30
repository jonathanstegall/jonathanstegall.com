<?php
/**
 * @package jonathanstegall_2015
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'content-title', get_post_format() ); ?>

	<?php the_content(); ?>

</article><!-- #post-## -->
