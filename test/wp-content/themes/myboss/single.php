<?php get_header(); ?>
        <div class="banner-top">
	   		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/banner-shop.jpg" width="960" height="200" />
        </div>
        <div id="breadcrumb">
        	<ul>
            	<li><a href="<?php echo get_option('home'); ?>">Trang chủ</a></li>
                <li><a href="<?php echo get_option('home'); ?>/tin-tuc">Tin tức</a></li>
            </ul>
        </div>
        <div class="warp-960-black-news-ct">
        <div class="warp-240-black">
	    	<?php get_sidebar(); ?>
    	</div>
        <div class="warp-720-news">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h2 class="warp-720-news-title"><?php the_title(); ?></h2>
            <div class="news-date">
            	<i class="fa fa-globe"></i> <?php echo get_the_date(); ?> đăng bởi <a href="<?php echo get_option('home'); ?>"><?php the_author(); ?></a>
            </div>
            <div class="news-main"><?php the_content(); ?></div>
        <?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
            <div class="news-related">
            	<h2><i class="fa fa-rss-square"></i> Tin liên quan:</h2>
                <div style="float:left; width:100%;">
                <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.carouFredSel-6.2.1-packed.js"></script>
				<script type="text/javascript">
			$(document).ready(function() {
				// Using custom configuration
				$('#relatedposts ul').carouFredSel({
					items               : 3,
					direction           : "left",
					scroll : {
						items           : 1,
						duration        : 1000,                         
						pauseOnHover    : true
					}                   
				});
			});
            </script>
						<?php $orig_post = $post;
                        global $post;
                        $tags = wp_get_post_tags($post->ID);
                        if ($tags) {
                        $tag_ids = array();
                        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
                        $args=array(
                        'tag__in' => $tag_ids,
                        'post__not_in' => array($post->ID),
                        'posts_per_page'=>5, // Number of related posts that will be shown.
                        'caller_get_posts'=>1
                        );
                        $my_query = new wp_query( $args );
                        if( $my_query->have_posts() ) {
                        echo '<div id="relatedposts"><ul>';
                        while( $my_query->have_posts() ) {
                        $my_query->the_post(); ?>
                        <li onclick="window.location = '<?php the_permalink(); ?>'"><div class="relatedthumb"><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('full'); ?></a></div>
                        <div class="relatedcontent">
                        <h3><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                        <?php the_time('M j, Y') ?>
                        </div>
                        </li>
                        <? }
                        echo '</ul></div>';
                        }
                        }
                        $post = $orig_post;
                        wp_reset_query(); ?>
            </div>
            </div>
    	</div>
    </div>
</div>
<br style="clear: both" />
</div>
<?php get_footer(); ?>