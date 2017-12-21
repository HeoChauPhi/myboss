<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/reset.css" type="text/css">  
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/flexslider.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/prettyPhoto.css" type="text/css">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico"  />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
	<?php 
		bloginfo('name'); ?> <?php wp_title(); 
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	?>	
</title>
<?php wp_head(); ?>
</head>
<body>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/woocommerce/woocommerce.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/woocommerce/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/woocommerce/jquery.prettyPhoto.init.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/woocommerce/jquery.prettyPhoto.init.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/woocommerce/jquery.prettyPhoto.min.js"></script>
<div id="warp-header">
	<div id="header">
	<div id="logo-top">
    	<h1><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1>
    </div>
    <div id="navi-top">
    	<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
        <div id="navi-top-text">
        	<p>hotline: Quản Lý, Bán Sỉ (Tuấn Anh): <span class="green">0979 153 556</span> - Đạt KD: <span class="green">01687.289.979</span><p>
        </div>
    </div>
    </div>
</div>
<div id="warp-content">
	<div id="content">
    	<div id="navi-pros-top">
        <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.carouFredSel-6.2.1-packed.js"></script>
			<script type="text/javascript">
			$(document).ready(function() {
				// Using custom configuration
				$('#nav-carousel ul').carouFredSel({
					items               : 9,
					auto    : false,
					prev	: {	
						button	: "#foo2_prev",
						key		: "left"
								},
					next	: { 
						button	: "#foo2_next",
						key		: "right"
								},
					direction           : "left",
					scroll : {
						items           : 1,
						duration        : 1000,                         
						pauseOnHover    : true
					}                   
				});
			});
            </script>
            <a class="prev-nav" id="foo2_prev" href="#"><span>prev</span></a>
        <div id="nav-carousel">
        <?php wp_nav_menu( array( 'theme_location' => 'extra-menu' ) ); ?>
        </div>
            <a class="next-nav" id="foo2_next" href="#"><span>next</span></a>
        </div>