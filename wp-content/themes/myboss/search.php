<?php
/*
 * Template Name: Search Results Page
 * Description: Whatever you want to write here.
 */
?>
<?php get_header(); ?>
        <div id="breadcrumb">
        	<ul><?php MyBreadcrumb(); ?>
            <li>Tìm kiếm</li>
            </ul>
        </div>
        <div class="warp-960-black">
			<div class="mini-title">
            <h2>Tìm thấy <?php global $wp_query; echo $wp_query->found_posts ?> kết quả cho "<?php the_search_query() ?>" :</h2>
            </div>
            <div>
<?php if ( is_search() ) : // Only display Excerpts for Search ?>
<div class="entry-summary">
     <?php the_excerpt(); ?>
</div><!-- .entry-summary -->
<?php else : ?>
<div class="entry-content">
     <?php the_content( __( 'Continue reading <span class="meta-nav">→</span>', 'shape' ) ); ?>
     <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'shape' ), 'after' => '</div>' ) ); ?>
</div><!-- .entry-content -->
<?php endif; ?>              
            </div>
        </div>
    </div>
    <br style="clear: both" />
</div>
<?php get_footer(); ?>