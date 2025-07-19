<?php
/**
 * Post-entry header.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

?>
<?php if ( has_post_thumbnail() ) : ?>
	<?php if ( ! is_single() || ( is_single() && get_theme_mod( 'blog_single_featured_image', 1 ) ) ) : ?>
		<div class="entry-image relative">
			<?php get_template_part( 'template-parts/posts/partials/entry-image', 'default' ); ?>
		</div>
	<?php endif; ?>
<?php endif; ?>
