<?php
/*Template name: Checkout
*/
?>
<?php get_header(); ?>
        <div class="banner-top">
	   		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/banner-shop.jpg" width="960" height="200" />
        </div>
        <div id="breadcrumb">
        	<ul>
            	<li><a href="<?php echo get_option('home'); ?>">Trang chủ</a></li>
                <li><a href="<?php echo get_option('home'); ?>/cart">Giỏ hàng</a></li>
                <li>Thanh toán</li>
            </ul>
        </div>
        <div class="warp-960">
    <div class="warp-720">
    	<div class="mini-title-720">
			<h2>Thanh toán</h2>
        </div>
        <div class="warp-720-black"><?php echo do_shortcode("[woocommerce_checkout]"); ?></div>
    </div>
    <div class="warp-240">
	    <?php get_sidebar(); ?>
        <div id="warp-filter">
		<div class="filter-title">
		<h2>Sản phẩm mới</h2>
		</div>
        <div class="myboss">
        	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.carouFredSel-6.2.1-packed.js"></script>
			<script type="text/javascript">
			$(document).ready(function() {
				// Using custom configuration
				$('#carousel ul').carouFredSel({
					items               : 3,
					direction           : "up",
					scroll : {
						items           : 1,
						duration        : 1000,                         
						pauseOnHover    : true
					}                   
				});
			});
            </script>
        <div id="carousel">
        	<?php echo do_shortcode("[recent_products per_page='5']"); ?>
        </div>
		</div>
	</div>
    </div>
    </div>
</div>
<br style="clear: both" />
</div>
<?php get_footer(); ?>