<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/reset.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/flexslider.css" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/prettyPhoto.css" type="text/css">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/favicon.ico"  />
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
<script type="text/javascript" src='http://code.jquery.com/jquery-2.1.1.min.js'></script>
<script type="text/javascript" ssrc='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/woocommerce/woocommerce.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/woocommerce/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/woocommerce/jquery.prettyPhoto.init.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/woocommerce/jquery.prettyPhoto.init.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/woocommerce/jquery.prettyPhoto.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.floatobject-1.0.js"></script>
<script type="text/javascript" src="https://apis.google.com/js/platform.js"></script>
<script src="https://apis.google.com/js/platform.js"></script>

<script>
  function onYtEvent(payload) {
    if (payload.eventType == 'subscribe') {
      // Add code to handle subscribe event.
    } else if (payload.eventType == 'unsubscribe') {
      // Add code to handle unsubscribe event.
    }
    if (window.console) { // for debugging only
      window.console.log('YT event: ', payload);
    }
  }
</script>
<script type="text/javascript">
   $(document).ready(main);
    function main()
    {
        $(".block-support-float").makeFloat({x:10,y:187,speed:"fast"});

    }
</script>

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
		<div id="navigation">
			<?php
				wp_nav_menu(array(
					'menu' => 'Extra Menu',
					'container_id' => 'cssmenu',
					'walker' => new CSS_Menu_Maker_Walker()
				));
			?>
			<div id="search-home"><?php get_sidebar('search'); ?></div>
		</div>
