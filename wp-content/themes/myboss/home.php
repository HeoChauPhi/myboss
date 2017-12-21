<?php
/*Template name: Home
*/
?>
<?php get_header(); ?>
        <div id="slider-main">
        	<?php
    			echo do_shortcode("[metaslider id=63]");
			?>
        </div>
        <div class="title-960">
        	<h2>Khuyến mãi</h2>
        </div>
        <div class="warp-960">
        	<div style="width:960px; float:left">
        	<?php
    			echo do_shortcode("[metaslider id=61]");
			?>
            </div>
        </div>
        <!--<div id="warp-search-home">
        	<div id="search-home"><?php //get_sidebar('search'); ?></div>
        </div>-->
        <div class="title-960">
        	<h2>Sản phẩm nổi bật</h2>
        </div>
        <div class="myboss">
        	<?php
    			echo do_shortcode("[featured_products per_page=12 columns=4 orderby=date order=desc]");
			?>
        </div>

				<div class="block-recent-post">
				<div class="title-960">
					<h2>Tin tức nổi bật</h2>
				</div>
				<div class="youtube-recent-post">
					<div class="title-960 block-title">
						<h2>Youtube</h2>
					</div>
					<div class="block-content">
					</div>
        </div>

				<div class="facebook-recent-post">
					<div class="title-960 block-title">
						<h2>facebook</h2>
					</div>
					<div class="block-content">
						<div class="fb-page fb-like-box" data-href="https://www.facebook.com/MyBossGearGaming" data-width="500" data-height="480" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/MyBossGearGaming"><a href="https://www.facebook.com/MyBossGearGaming">MyBoss Gear Gaming</a></blockquote></div></div>
					</div>
        </div>
        </div>
        <!--<div class="title-960">
        	<h2>Sản phẩm mới</h2>
        </div>
        <div class="myboss">
        	<?php
    			//echo do_shortcode("[recent_products per_page=8 columns=4 orderby=date order=desc]");
			?>
        </div>-->

        <div class="title-960">
        	<h2>Thương hiệu nổi bật</h2>
        </div>
        <div id="logos-btm">
        	<?php
    			echo do_shortcode("[metaslider id=64]");
			?>
        </div>
    </div>
    <br style="clear: both" />
</div>
<?php get_footer(); ?>
