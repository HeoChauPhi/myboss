<?php
add_theme_support( 'menus' );
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
show_admin_bar( false );
add_theme_support( 'woocommerce' );
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '',
            'wrap_before' => '<div id="breadcrumb"><ul>',
            'wrap_after'  => '</ul></div>',
            'before'      => '<li>',
            'after'       => '</li>',
            'home'        => _x( 'Trang chủ', 'breadcrumb', 'woocommerce' ),
        );
}
add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );
function woocommerce_category_image() {
    if ( is_product_category() ){
	    global $wp_query;
	    $cat = $wp_query->get_queried_object();
	    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
	    if ( $image ) {
		    echo '<img src="' . $image . '" alt="" />';
		}
	}
	elseif (is_search()) {
            echo '<img src="http://i.imgur.com/8QudH7T.jpg" />';
        }
}
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 18;' ));
function MyBreadcrumb() {
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Trang chủ';;
        echo "</a></li>";
        if (is_category() || is_single()) {
            the_category('title_li=');
            if (is_single()) {
                the_title();
            }
        } elseif (is_page()) {
			echo "<li>";
            echo the_title();
			echo "</li>";
        }
    }
}
if ( function_exists('register_sidebar') ) {
register_sidebar(array(
'name' => 'Myboss Sidebar',
'id' => 'myboss-sidebar',
'description' => 'Appears as the sidebar on the site',
));
}
if ( function_exists('register_sidebar') ) {
register_sidebar(array(
'name' => 'Search homepage',
'id' => 'search-home',
'description' => 'Appears as the sidebar on the site',
));
}
if ( function_exists('register_sidebar') ) {
register_sidebar(array(
'name' => 'Product Filter',
'id' => 'product-filter',
'description' => 'Appears as the sidebar on the site',
'before_widget' => '<div class="filter">',
'after_widget' => '</div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));
}
add_filter( 'get_product_search_form' , 'woo_custom_product_searchform' );
function woo_custom_product_searchform( $form ) {
	$form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
		<div id="search">
			<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Tìm kiếm sản phẩm" class="search-input" />
			<input type="hidden" name="post_type" value="product" />
		</div>
	</form>';
	return $form;

}
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
unset( $tabs['reviews'] ); // Remove the reviews tab
unset( $tabs['additional_information'] ); // Remove the additional information tab
return $tabs;
}
add_action('woocommerce_single_product_summary','autocircles_credits',15);
function autocircles_credits(){
global $woocommerce, $post, $product;
$heading = apply_filters( 'woocommerce_product_additional_information_heading', __( 'Additional Information', 'woocommerce' ) );       ?>
<div class="pros-show-right-add-info">
<?php echo $product->list_attributes(); ?>
</div>       <?php      }
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title',5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price',10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt',20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart',30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta',40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing',50);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title',5);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price',10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt',20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart',50);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta',30);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing',40);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
wp_register_script( 'wc-price-slider', plugins_url('/woocommerce/assets/js/frontend/price-slider' . $suffix . '.js', __FILE__));
wp_enqueue_script('wc-price-slider','',false);
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );
function enqueue_font_awesome() {

	wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' );

}

/**
 * Place a cart icon with number of items and total cost in the menu bar.
 *
 * Source: http://wordpress.org/plugins/woocommerce-menu-bar-cart/
 */
add_filter('wp_nav_menu_items','sk_wcmenucart', 10, 2);
function sk_wcmenucart($menu, $args) {

	// Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location
	if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 'header-menu' !== $args->theme_location )
		return $menu;
	ob_start();
		global $woocommerce;
		$viewing_cart = __('Xem giỏ hàng', 'your-theme-slug');
		$start_shopping = __('Bắt đầu mua sắm', 'your-theme-slug');
		$cart_url = $woocommerce->cart->get_cart_url();
		$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
		$cart_contents_count = $woocommerce->cart->cart_contents_count;
		$cart_contents = sprintf(_n('%d sản phẩm', '%d sản phẩm', $cart_contents_count, 'your-theme-slug'), $cart_contents_count);
		$cart_total = $woocommerce->cart->get_cart_total();
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart
		// if ( $cart_contents_count > 0 ) {
			if ($cart_contents_count == 0) {
				$menu_item = '<li><a class="wcmenucart-contents" href="'. $cart_url .'" title="'. $start_shopping .'">';
			} else {
				$menu_item = '<li><a class="wcmenucart-contents" href="'. $cart_url .'" title="'. $viewing_cart .'">';
			}

			$menu_item .= '<i class="fa fa-shopping-cart"></i> ';

			$menu_item .= $cart_contents.' - '. $cart_total;
			$menu_item .= '</a></li>';
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart
		// }
		echo $menu_item;
	$social = ob_get_clean();
	return $menu . $social;
}
class CSS_Menu_Maker_Walker extends Walker {

  var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul>\n";
  }

  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $class_names = $value = '';
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    /* Add active class */
    if(in_array('current-menu-item', $classes)) {
      $classes[] = 'active';
      unset($classes['current-menu-item']);
    }

    /* Check for children */
    $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
    if (!empty($children)) {
      $classes[] = 'has-sub';
    }

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

    $output .= $indent . '<li' . $id . $value . $class_names .'>';

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'><span>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</span></a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }

  function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= "</li>\n";
  }
}

// fix website
// Them css va javascript vao giua the head
add_action('wp_enqueue_scripts', 'customs_themes_scripts');
function customs_themes_scripts() {
	wp_register_script('equalheights', get_template_directory_uri() . '/js/jquery.equalheights.js', array('jquery')); // Custom scripts
	wp_enqueue_script('equalheights'); // Enqueue it!

	wp_register_script('bpopup', get_template_directory_uri() . '/js/jquery.bpopup.min.js', array('jquery')); // Custom scripts
	wp_enqueue_script('bpopup'); // Enqueue it!

	wp_register_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery')); // Custom scripts
	wp_enqueue_script('isotope'); // Enqueue it!

	wp_register_script('scrolltofixed', get_template_directory_uri() . '/js/jquery-scrolltofixed.js', array('jquery')); // Custom scripts
	wp_enqueue_script('scrolltofixed'); // Enqueue it!

	wp_register_script('number', get_template_directory_uri() . '/js/jquery.number.js', array('jquery')); // Custom scripts
	wp_enqueue_script('number'); // Enqueue it!

	wp_register_script('jsPDF', get_template_directory_uri() . '/js/jspdf.min.js', array('jquery')); // HTML5 Blank script with version number
	wp_enqueue_script('jsPDF'); // Enqueue it!

  wp_register_script('unuPDF', get_template_directory_uri() . '/js/jquery.UNUGeneratePDF.js', array('jquery')); // HTML5 Blank script with version number
  wp_enqueue_script('unuPDF'); // Enqueue it!

	wp_register_script('html2canvas', get_template_directory_uri() . '/js/html2canvas.js', array('jquery')); // HTML5 Blank script with version number
	wp_enqueue_script('html2canvas'); // Enqueue it!

	wp_register_script('frameword', get_template_directory_uri() . '/js/frameword.js', array('jquery')); // HTML5 Blank script with version number
	wp_enqueue_script('frameword'); // Enqueue it!
}

// bold, italic, underline, strikethrough, justifyleft, justifycenter, justifyright, justifyfull, bullist, numlist, outdent, indent, cut, copy, paste, undo, redo, link, unlink, image, cleanup, help, code, hr, removeformat, formatselect, fontselect, fontsizeselect, styleselect, sub, sup, forecolor, backcolor, charmap, visualaid, anchor, newdocument, separator
function enable_more_buttons($buttons) {
  $buttons[] = 'bold';
  $buttons[] = 'italic';
  $buttons[] = 'underline';
  $buttons[] = 'strikethrough';
  $buttons[] = 'justifyleft';
  $buttons[] = 'justifycenter';
  $buttons[] = 'justifyright';
  $buttons[] = 'justifyfull';
  $buttons[] = 'bullist';
  $buttons[] = 'numlist';
  $buttons[] = 'outdent';
  $buttons[] = 'indent';
  $buttons[] = 'cut';
  $buttons[] = 'copy';
  $buttons[] = 'paste';
  $buttons[] = 'undo';
  $buttons[] = 'redo';
  $buttons[] = 'link';
  $buttons[] = 'unlink';
  $buttons[] = 'cleanup';
  $buttons[] = 'help';
  $buttons[] = 'code';
  $buttons[] = 'hr';
  $buttons[] = 'removeformat';
  $buttons[] = 'formatselect';
  $buttons[] = 'fontselect';
  $buttons[] = 'fontsizeselect';
  $buttons[] = 'styleselect';
  $buttons[] = 'sub';
  $buttons[] = 'sup';
  $buttons[] = 'forecolor';
  $buttons[] = 'backcolor';
  $buttons[] = 'charmap';
  $buttons[] = 'visualaid';
  $buttons[] = 'anchor';
  $buttons[] = 'newdocument';
  $buttons[] = 'separator';

  return $buttons;
}
add_filter("mce_buttons", "enable_more_buttons");

function get_fb_initialize() {
		global $_social_settings;
		require 'facebook-sdk/facebook.php';

		$facebook = new Facebook(array('appId'  => $_social_settings['318290895044209'], 'secret' => $_social_settings['98272b29c18476c49d02c918b3a4aa18']));

		return $facebook;
}

function get_fb_feeds() {
	global $_social_settings;
	$facebook = get_fb_initialize();
	$pageInfo = $facebook->api('/'. $_social_settings['581902769'], 'GET');
	$pageFeed = $facebook->api('/'. $_social_settings['581902769'] .'/posts', 'GET', array('like_limit' => 250));
	$pageAccess = $facebook->getAccessToken();

	return array(
		'page_info' => $pageInfo,
		'access_token' => $pageAccess,
		'posts' => $pageFeed
	);
}

function woocommerce_subcats_from_parentcat_by_ID($parent_cat_ID) {
    $args = array(
			 'post_type' => 'product',
       'hierarchical' => 1,
       'show_option_none' => '',
       'hide_empty' => 0,
       'parent' => $parent_cat_ID,
       'taxonomy' => 'product_cat'
    );
		wp_list_categories( $args );
}
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
			'name' => __('Block Support'),
			'description' => __('Description for this widget-area...'),
			'id' => 'support-float',
			'before_widget' => '<div id="%1$s" class="%2$s block-support-float">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="block-title">',
			'after_title' => '</h2>'
    ));
		// Define Sidebar Widget Area 1
    register_sidebar(array(
			'name' => __('Block Youtube gallery'),
			'description' => __('Description for this widget-area...'),
			'id' => 'yt-gallery',
			'before_widget' => '<div id="%1$s" class="%2$s block-yt-gallery">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="block-title">',
			'after_title' => '</h2>'
    ));
		// Define footer panel 1
    register_sidebar(array(
			'name' => __('Footer panel 1'),
			'description' => __('Description for this widget-area...'),
			'id' => 'footer-panel-1',
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="block-title">',
			'after_title' => '</h2>'
    ));
		// Define Footer panel 2
    register_sidebar(array(
			'name' => __('Footer panel 2'),
			'description' => __('Description for this widget-area...'),
			'id' => 'footer-panel-2',
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="block-title">',
			'after_title' => '</h2>'
    ));
		// Define Footer panel 3
    register_sidebar(array(
			'name' => __('Footer panel 3'),
			'description' => __('Description for this widget-area...'),
			'id' => 'footer-panel-3',
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="block-title">',
			'after_title' => '</h2>'
    ));
		// Define Footer panel 4
    register_sidebar(array(
			'name' => __('Footer panel 4'),
			'description' => __('Description for this widget-area...'),
			'id' => 'footer-panel-4',
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="block-title">',
			'after_title' => '</h2>'
    ));
		// Define Footer
    register_sidebar(array(
			'name' => __('Footer'),
			'description' => __('Description for this widget-area...'),
			'id' => 'footer',
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="block-title">',
			'after_title' => '</h2>'
    ));
}
/**
* Add checkbox field to the checkout
**/
add_action('woocommerce_after_order_notes', 'my_custom_checkout_field');
function my_custom_checkout_field( $checkout ) {
	echo '<div id="my-new-field"><h3>'.__('Chính sách thỏa thuận: ').'</h3>';
	$checked = $checkout->get_value( 'my_checkbox' ) ? $checkout->get_value( 'my_checkbox' ) : 1;
	woocommerce_form_field( 'my_checkbox', array(
	'type' => 'checkbox',
	'class' => array('input-checkbox'),
	'label' => __('Tôi đống ý với <a href="#" target="_blank">chính sách thỏa thuận</a>.'),
	'required' => true,
	), $checked );
	echo '</div>';
}
/**
* Process the checkout
**/
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');
function my_custom_checkout_field_process() {
	global $woocommerce;
	// Check if set, if its not set add an error.
	if (!$_POST['my_checkbox'])
	$woocommerce->add_error( __('Please agree to my checkbox.') );
}
/**
* Update the order meta with field value
**/
add_action('woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta');
function my_custom_checkout_field_update_order_meta( $order_id ) {
	if ($_POST['my_checkbox']) update_post_meta( $order_id, 'My Checkbox', esc_attr($_POST['my_checkbox']));
}
function tap_truyen() {
	p2p_register_connection_type( array(
		'name' => 'create_tap_truyen',
		'from' => 'package-products',
		'to' => 'product'
	) );
}
add_action( 'p2p_init', 'tap_truyen' );
?>