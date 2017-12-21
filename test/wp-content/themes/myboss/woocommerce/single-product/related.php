<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>
	<div id="warp-filter">
		<div class="filter-title">
		<h2><?php _e( 'Related Products', 'woocommerce' ); ?></h2>
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
		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>
        </div>
		</div>
	</div>

<?php endif;

wp_reset_postdata();
