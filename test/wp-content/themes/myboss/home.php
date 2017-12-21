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
        <div class="title-960">
        	<h2>Sản phẩm nổi bật</h2>
        </div>
        <div class="myboss">
        	<?php 
    			echo do_shortcode("[featured_products per_page=12 columns=4 orderby=date order=desc]"); 
			?>           
        </div>
        <div class="title-960">
        	<h2>Sản phẩm mới</h2>
        </div>
        <div class="myboss">
        	<?php 
    			echo do_shortcode("[recent_products per_page=8 columns=4 orderby=date order=desc]"); 
			?>           
        </div>
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