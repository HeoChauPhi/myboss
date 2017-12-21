<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
?>
<div class="pro_meta">
<ul>
	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<li><?php _e( 'Mã sản phẩm:', 'woocommerce' ); ?> <span class="green" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span></li>
	<?php endif; ?>

	<li><?php echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Danh mục:', 'Categories:', $cat_count, 'woocommerce' ) . ' ', '.</span>' ); ?></li>

	<li><?php echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'woocommerce' ) . ' ', '.</span>' ); ?></li>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>
</span>
</div>