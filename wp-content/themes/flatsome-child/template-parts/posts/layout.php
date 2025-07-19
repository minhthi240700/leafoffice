<?php
/**
 * Posts layout.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

do_action('flatsome_before_blog');
?>


<?php if(!is_single() && get_theme_mod('blog_featured', '') == 'top'){ get_template_part('template-parts/posts/featured-posts'); } ?>
<div class="row align-center">
	<div class="large-10 col">
	<?php if(!is_single() && get_theme_mod('blog_featured', '') == 'content'){ get_template_part('template-parts/posts/featured-posts'); } ?>

	<?php
		if(is_single()){
			echo do_shortcode('[breadcrumb]');
			get_template_part( 'template-parts/posts/single');
		} elseif(get_theme_mod('blog_style_archive', '') && (is_archive() || is_search())){
			get_template_part( 'template-parts/posts/archive', get_theme_mod('blog_style_archive', '') );
		} else{
			get_template_part( 'template-parts/posts/archive', get_theme_mod('blog_style', 'normal') );
		}
	?>
	</div>
</div>

<div class="row list-post">
				<?php if (is_single()) : ?>
		<?php
			$categories = get_the_category(get_the_ID());
			if ($categories) {
				$category_ids = wp_list_pluck($categories, 'term_id');

				$args = array(
					'category__in'   => $category_ids,
					'post__not_in'   => array(get_the_ID()),
					'posts_per_page' => 6,
					'fields'         => 'ids' // chỉ lấy ID
				);
				$related_ids = get_posts($args);
				if (!empty($related_ids)) {
					$category_name = !empty($categories) ? $categories[0]->name : 'bài viết';
					$label = 'Các ' . $categories[0]->name . ' khác';
					echo '<div class="col large-12">';
					echo '<div class="block-related">';
					echo '<h2 class="section-title">'.$label.'</h2>';

					echo flatsome_apply_shortcode('blog_posts', array(
						'type'                => 'slider',
						'depth'               => get_theme_mod('blog_posts_depth', 0),
						'depth_hover'         => get_theme_mod('blog_posts_depth_hover', 0),
						'text_align'          => get_theme_mod('blog_posts_title_align', 'left'),
						'columns'             => '3',
						'show_date'           => 'text',
						'ids'                 => implode(',', $related_ids),
						'excerpt_length'      => 100,
						'slider_nav_style'    => 'circle',
						'slider_nav_position' => 'outside',
					));

					echo '</div>'; // .block-related
					echo '</div>'; // .col.large-12
				}
			}
		endif;
		?>
</div>

<?php do_action('flatsome_after_blog');
