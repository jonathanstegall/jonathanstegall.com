<?php
/**
 * @package jonathanstegall_2015
 */
?>
<?php
$slug = basename(get_permalink());
?>


	<?php if ($post_meta['omit_title_on_home_page'][0] != TRUE) { ?>
	<h1>
		<?php if ( ($post_meta['unlinked_on_home_page'][0] != TRUE && $post_meta['title_unlinked_on_parent'] != TRUE && is_single() !== true) || ( is_single() == true && get_post_format() == 'aside' )) { ?>
			<a href="<?php if (get_post_format() == 'aside') { echo $post_meta['link'][0]; } else { echo get_the_permalink(); } ?>"><?php echo get_the_title(); ?><?php if (get_post_format() == 'aside') { ?><span class="fa fa-arrow-circle-o-right"></span> <?php } ?></a>
		<?php } else { ?>
		<?php echo get_the_title(); ?>
		<?php } ?>
	</h1>
	<?php } ?>

	<?php if (get_post_type() !== 'page' && get_post_type() !== 'skill' && get_post_type() !== 'client') { ?>
	<p class="muted"><?php echo get_the_date(); ?> <?php if ( current_user_can('edit_post', get_the_ID()) ) { ?> <?php if (get_post_format() == 'aside') { ?> | <a href="<?php echo get_permalink(); ?>">Local Page</a><?php } ?> | <a href="<?php echo get_edit_post_link(); ?>">Edit post</a> <?php } ?></p>
	<?php } ?>

	<?php if (get_post_type() !== 'page' && get_post_type() !== 'skill' && get_post_type() !== 'client') { ?>
	<p class="muted">
	<?php
	if (get_post_format() == 'aside') {
		$tags = get_the_tags();
	} else {
		$categories = get_the_category();
	}

	if (get_post_type() !== 'page') {
		$all = array();
		if ($tags) {
			foreach ($tags as $tag) {
			    $all[] = '<a href="' . get_tag_link( $tag->term_id ) . '" ' . '>' . strtolower($tag->name) .'</a>';
			}
		} else if ($categories) {
			foreach ($categories as $category) {
			    $all[] = '<a href="' . get_category_link( $category->term_id ) . '" ' . '>' . strtolower($category->cat_name) .'</a>';
			}
		}
		echo implode(' / ', $all);
	}
	?>
	</p>
	<?php } else if (get_post_type() === 'page' && $post_meta['page_excerpt'][0] !== '') { ?>
		<p><?php echo $post_meta['page_excerpt'][0]; ?></p>
	<?php } ?>