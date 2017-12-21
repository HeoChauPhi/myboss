<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.floatobject-1.0.js"></script>
<script type="text/javascript">
   $(document).ready(main);
    function main()
    {
        $(".support-float").makeFloat({x:10,y:187,speed:"fast"});
        
    }
</script>
<div class="support-float">
	<h2>Hỗ trợ trực tuyến</h2>
	<ul>
    	<a href="ymsgr:sendim?boy_boy2690&m=Xin chào"><li>
        	<p>Cửa hàng</p>
            <p>0462.747.888</p>
        </li></a>
    	        <a href="ymsgr:sendim?boy_boy2690&m=Xin chào"><li>
        	<p>Mr. Tuấn Anh</p>
            <p>0979.153.556</p>
        </li></a>
        <a href="ymsgr:sendim?mybossvn&m=Xin chào"><li>
        	<p>Mr. Đạt</p>
            <p>01687.289.979</p>
        </li></a>
    </ul>
</div>
<div id="warp-btm">
	<div id="btm">
    	<div id="btm960">
        	<div class="warp-320">
            	<ul>
                	<h3>Sơ đồ website:</h3>
                	<li><a href="<?php echo get_option('home'); ?>">Trang chủ</a></li>
                    <li><a href="<?php echo get_option('home'); ?>/gioi-thieu">Giới thiệu</a></li>
                    <li><a href="<?php echo get_option('home'); ?>/tin-tuc">Tin tức</a></li>
                    <li><a href="<?php echo get_option('home'); ?>/ho-tro">Hỗ trợ</a></li>
                    <li><a href="<?php echo get_option('home'); ?>/cart">Giỏ hàng</a></li>
                </ul>
            </div>
          <div class="warp-320">
            	<h3>Thông tin liên hệ:</h3>
            <p class="green">Công ty TNHH My Boss</p>
            <p>Địa chỉ: Số 131 Thái Thịnh - Đống Đa</p>
            <p>Hà Nội (đối diện cây xăng thái thịnh)</p>
            <p>Email: <a href="mailto:anh.myboss@gmail.com" target="_top"> anh.myboss@gmail.com</a></p>
            <p><a href="http://www.youtube.com/channel/UC58yiXVjwljNTcued_c5vIQ" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/utube-ico.png" width="41" height="45" alt="" style="padding-top:10px;"/></a></p>
            </div>
            <div class="warp-320">
            	<iframe src="https://www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FMyBossGearGaming&amp;width=320&amp;height=210&amp;colorscheme=dark&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="1" style="border:#363636 solid 1px; overflow:hidden; width:318px; height:208px; margin-bottom:20px;" allowTransparency="true"></iframe>
            </div>
        </div>
        <br style="clear: both" />
    </div>
</div>
<div id="copyright">
	<p>© 2014 by <?php bloginfo('name'); ?>.</p>
    <p>Theme by <a href="http://www.hatechuu.com" target="_blank">Chuu.</p>
</div>
<?php wp_footer(); ?>
</body>
</html>