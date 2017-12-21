<?php
/*Template name: Category
*/
?>
<?php get_header(); ?>
        <div class="banner-top">
	   		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/banner-shop.jpg" width="960" height="200" />
        </div>
        <div id="breadcrumb">
        	<ul>
            	<li><a href="<?php echo get_option('home'); ?>">Trang chủ</a></li>
                <li>Tin tức</li>
            </ul>
        </div>
        <div class="warp-960-black-news-ct">
        <div class="warp-240-black">
	    	<?php get_sidebar(); ?>
    	</div>
        <div class="warp-720-news">
<?php
	 $args = array(
				   'category_name' => 'news',
				   'post_type' => 'post',
				   'posts_per_page' =>5,
				   'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
				   );

	query_posts($args);

while (have_posts()) : the_post();
?>
<div class="news-ct" onclick="window.location = '<?php the_permalink(); ?>'">
                    <div class="news-thumb">
                    	<?php the_post_thumbnail('full');?>
                    </div>
                    <div class="news-ct-right">
                        <div class="news-ct-title"><h2><?php echo get_the_title(); ?></h2></div>
                        <div class="news-ct-ex"><?php echo excerpt('30'); ?></div>
                        <div class="news-ct-readmore">
                        	<span style="text-align:left;"><?php echo get_the_date(); ?></span>
                        	<span style="float:right;"><a href="<?php the_permalink(); ?>"><i class="fa fa-file-text"></i> Chi tiết</a></span>
                        </div>
                    </div>
                </div>
      <?php
endwhile;
?><?php if(function_exists('tw_pagination')) 
    tw_pagination();
?>
<?php
wp_reset_query();  // Restore global post data
?>  
    	</div>
    </div>
</div>
<br style="clear: both" />
</div>
<?php get_footer(); ?>