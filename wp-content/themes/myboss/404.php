<?php get_header(); ?>
        <div class="banner-top">
	   		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/banner-shop.jpg" width="960" height="200" />
        </div>
        <div id="breadcrumb">
        	<ul>
                <li><a href="<?php echo get_option('home'); ?>">Trang chủ</a></li>
                <li>Lỗi</li>
            </ul>
        </div>
        <div class="warp-960-black-news-ct">
        <div class="warp-240-black">
	    	<?php get_sidebar(); ?>
    	</div>
        <div class="warp-720-news">
			<h2 class="warp-720-news-title">Lỗi</h2>
            <div class="news-main">
            	<p>Không tìm thấy trang bạn yêu cầu!</p>
                <p>Do chúng tôi vừa thay đổi website, quý khách vui lòng tìm kiếm sản phẩm ở ô tìm kiếm hoặc tại trang chủ: <a href="http://www.myboss.vn">www.myboss.vn</a></p>
<p><strong>Xin cảm ơn.</strong></p>
            </div>           
    	</div>
    </div>
</div>
<br style="clear: both" />
</div>
<?php get_footer(); ?>