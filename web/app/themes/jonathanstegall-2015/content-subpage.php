<article class="grid__item one-whole lap-up-one-half desk-one-half">
	<div>
		<?php
		$post_meta = get_post_custom(get_the_ID());
		set_query_var( 'post_meta', $post_meta );

		$figure = get_field('image');
		if ($figure != '') {
			echo '<figure><img src="' . $figure['url'] . '" alt="' . $figure['alt'] . '"></figure>';	
		}

		get_template_part( 'content-title', get_post_format() );
		?>
		<?php
		$description = $post_meta['description'][0];
		$button = $post_meta['button'][0];
		if ($button != '') {
			$button = ' <a href="' . get_the_permalink() . '" class="btn btn--positive"> ' . $button . '</a>';
		}
		if ($description !== '') {
			echo '<p>' . $description . $button . '</p>';
		}
		?>
	</div>
</article>