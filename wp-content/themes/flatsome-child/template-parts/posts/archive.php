<?php
/**
 * Posts archive.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

if ( have_posts() ) : ?>
<div id="post-list">
	<?php
	$ids = array();
	while ( have_posts() ) : the_post();
		array_push( $ids, get_the_ID() );
	endwhile; // end of the loop.
	$ids = implode( ',', $ids );
	?>

	<?php
	echo flatsome_apply_shortcode( 'blog_posts', array(
		'type'        => get_theme_mod( 'blog_style_type', 'row' ),
		'depth'       => get_theme_mod( 'blog_posts_depth', 0 ),
		'depth_hover' => get_theme_mod( 'blog_posts_depth_hover', 0 ),
		'text_align'  => get_theme_mod( 'blog_posts_title_align', 'left' ),
		'columns'     => '1',
		'show_date'   => 'text',
		'ids'         => $ids,
		'excerpt_length' => 100
	) );
	?>

	<?php flatsome_posts_pagination(); ?>
</div>

<?php else : ?>

<?php get_template_part( 'template-parts/posts/content','none'); ?>

<?php endif; ?>
