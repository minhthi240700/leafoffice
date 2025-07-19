<?php
/**
 * Posts layout right sidebar.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

do_action('flatsome_before_blog');
?>

<?php
$term = get_queried_object();
$term_id = $term->term_id;
$layout_sidebar = get_field('layout_sidebar', 'option');


?>

<?php if(!is_single() && flatsome_option('blog_featured') == 'top'){ get_template_part('template-parts/posts/featured-posts'); } ?>

<div class="row <?php if(flatsome_option('blog_layout_divider')) echo 'row-divided ';?>">

<div class="col large-12 pb-0">
		<?php echo do_shortcode('[breadcrumb]') ?>
</div>

<?php 
if (!(is_array($layout_sidebar) && in_array($term_id, $layout_sidebar))) :
?>
    <div class="large-8 col pb-0">
        <?php get_template_part( 'template-parts/posts/partials/archive-title'); ?>
        
        <?php if(!is_single() && flatsome_option('blog_featured') == 'content'){ 
            get_template_part('template-parts/posts/featured-posts'); 
        } ?>

        <?php
            if(is_single()){
                get_template_part( 'template-parts/posts/single');
            } elseif(flatsome_option('blog_style_archive') && (is_archive() || is_search())){
                get_template_part( 'template-parts/posts/archive', flatsome_option('blog_style_archive') );
            } else {
                get_template_part( 'template-parts/posts/archive', flatsome_option('blog_style') );
            }
        ?>
    </div>

    <div class="post-sidebar large-4 col">
        <?php 
            flatsome_sticky_column_open( 'blog_sticky_sidebar' );
            get_sidebar(); 
            flatsome_sticky_column_close( 'blog_sticky_sidebar' ); 
        ?>
    </div>
<?php else: ?>
    <div class="large-12 col">
        <?php
		    get_template_part( 'template-parts/posts/partials/archive-title');
			get_template_part( 'template-parts/posts/archive', '3-col' );
        ?>
    </div>
<?php endif; ?>



</div>

<?php
	do_action('flatsome_after_blog');
?>
