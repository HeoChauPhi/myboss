<?php get_header(); ?>
        <div class="banner-top">
	   		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/banner-shop.jpg" width="960" height="200" />
        </div>
        <div id="breadcrumb">
        	<ul><?php MyBreadcrumb(); ?>
            </ul>
        </div>
        <div class="warp-960-black-news-ct">
        <div class="warp-240-black">
	    	<?php get_sidebar(); ?>
    	</div>
        <div class="warp-720-news">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h2 class="warp-720-news-title"><?php the_title(); ?></h2>
            <div class="news-main"><?php the_content(); ?></div>
        <?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>           
    	</div>
    </div>
</div>
<br style="clear: both" />
</div>
<?php get_footer(); ?>