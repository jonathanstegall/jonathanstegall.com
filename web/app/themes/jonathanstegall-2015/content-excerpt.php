<?php
/**
 * @package jonathanstegall_2015
 */
?>
<?php
$slug = basename(get_permalink());
?>

<article<?php if ($meta['show_item_class'][0] == true && $meta['item_class'][0] != '') { ?> class="<?php if ($meta['item_class_include_slug'][0] == TRUE) { echo $slug . ' '; } echo $meta['item_class'][0]; ?> " <?php } ?>>

	<?php if ($post_meta['omit_title_on_home_page'][0] != TRUE) { ?>
		<?php get_template_part( 'content-title', get_post_format() ); ?>
	<?php } ?>

	<?php if (get_post_format() == 'aside' || get_post_type() == 'page') { ?>
		<?php if ($post_meta['description'][0] != '') { ?>
			<p><?php echo $post_meta['description'][0]; ?></p>
		<?php } else { ?>
			<?php the_content(); ?>
		<?php } ?>
	<?php } else { ?>
		<?php the_excerpt(); ?>
	<?php } ?>

	<!--<div class="entry-content">
		<?php the_excerpt(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'jonathanstegall_2015' ),
				'after'  => '</div>',
			) );
		?>
	</div>-->

</article><!-- #post-## -->
