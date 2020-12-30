<?php
/**
 * @package jonathanstegall_2015
 */
?>

<?php 
$slug = basename(get_permalink());
if ($slug == 'intro') { ?>
	<header class="intro grid cf">
        <?php the_content(); ?>
    </header>
<?php } else { ?>
	<div class="grid-wrapper cf">
		<section <?php if ($meta['anchor'][0] != '') { ?> id="<?php echo $meta['anchor'][0] ?>" <?php } ?>class="<?php echo $slug; ?> grid cf">
			<h1><?php the_title(); ?></h1>
			<?php
			$description = $meta['description'][0];
			$button = $meta['button'][0];
			if ($button != '') {
				$button = ' <a href="' . get_the_permalink() . '" class="btn btn--positive"> ' . $button . '</a>';
			}
			if ($description !== '') {
				echo '<p>' . $description . $button . '</p>';
			}
			?>
			<?php if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
				<?php
				$post_meta = get_post_custom(get_the_ID());
				set_query_var( 'post_meta', $post_meta );
				get_template_part( 'content-excerpt', get_post_format() );
				?>
			<?php endwhile; endif; ?>
		</section>
	</div>
<?php } ?>