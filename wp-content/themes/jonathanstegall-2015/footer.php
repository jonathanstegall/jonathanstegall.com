<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package jonathanstegall_2015
 */
?>

	</main><!-- #content -->

	<footer class="cf" role="contentinfo">

		<?php

			$footer_section_args = array(
				'numberposts' => -1,
				'post_type' => 'page',
				'meta_key' => 'section_in_footer',
				'order' => 'ASC',
				'orderby' => 'menu_order',
				'meta_value' => true
			);

			$footer_sections = new WP_Query();  // Main blog query
			$footer_sections->query( $footer_section_args );

		?>

		<?php if ( $footer_sections->have_posts() ) : while ( $footer_sections->have_posts() ) : $footer_sections->the_post(); ?>
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
					$post_args['order'] = 'ASC';
					$post_args['orderby'] = 'menu_order';
					$post_args['meta_value'] = true;
				}

				$posts = new WP_Query();  // Main blog query
				$posts->query( $post_args );

				set_query_var( 'meta', $meta );
				get_template_part( 'content-section', get_post_format() );
			?>

		<?php endwhile; endif; ?>

	
		<div class="grid-wrapper cf copyright">
			<div class="grid">
		    <p>&copy; 2006 - <?php echo date('Y'); ?> Jonathan Stegall. Type set in <a href="http://www.type-together.com/Athelas">Athelas</a> and <a href="http://www.type-together.com/Tablet%20Gothic">Tablet Gothic</a> from <a href="http://www.type-together.com/">TypeTogether</a> through <a href="http://typekit.com">Typekit</a>. Made with <a href="http://wordpress.org">WordPress</a> and hosted with <a href="http://www.dreamhost.com/r.cgi?234834">Dreamhost</a>.</p>
		   </div>
		</div>
	</footer><!-- #colophon -->

<?php wp_footer(); ?>

    </body>
</html>
