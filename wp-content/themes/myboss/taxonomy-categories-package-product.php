<?php
/**
 * Locations taxonomy archive
 */
get_header();
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
?>
		<!-- section -->
		<div class="page-taoxonomy">
    <div class="title-960"><h2><?php echo apply_filters( 'the_title', $term->name ); ?></h2></div>

    <?php if ( have_posts() ): ?>
		<div class="list-product-category">
		<?php while ( have_posts() ): the_post(); 
			$post_thumbnail = get_the_post_thumbnail( $post->ID );
			if(function_exists('types_render_field')) {
				$description = types_render_field('description', array());
			}
		?>

    <div id="post-<?php the_ID(); ?>" class="items">
		<div class="items-content">
			<!--<div class="link-edit">
				<?php //edit_post_link(); ?>
			</div>-->
			<div class="group-img">
				<?php echo $post_thumbnail; ?>
			</div>
			<div class="group-content">
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<?php if (!empty ($description)){?>
					<div class="content-package-product"><?php echo wp_trim_words($description, 30); ?></div>
				<?php } ?>
			</div>
    </div><!--// end #post-XX -->
    </div><!--// end #post-XX -->

    <?php endwhile; ?>
		</div>
    <?php endif; ?>
		</div>
		<!-- /section -->
    </div>
    <br style="clear: both" />
</div>
<?php get_footer(); ?>