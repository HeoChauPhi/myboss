<?php get_header(); ?>
        <div id="slider-main">
        	<?php 
    			echo do_shortcode("[metaslider id=63]"); 
			?>
        </div>
        <div class="warp-720">
    	<div class="mini-title-720">
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<h2><?php woocommerce_page_title(); ?></h2>
		<?php endif; ?>
        <div class="pro_cat_short">
		<?php if ( have_posts() ) : ?>
			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>
        </div>
        </div>
        <div class="myboss">
			<?php woocommerce_product_loop_start(); ?>
				<?php woocommerce_product_subcategories(); ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php wc_get_template_part( 'content', 'product' ); ?>
				<?php endwhile; // end of the loop. ?>
			<?php woocommerce_product_loop_end(); ?>
        </div>
			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>
		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
    </div> 
    <div class="warp-240">
    <?php get_sidebar(); ?>
    </div>     
    </div>
    <br style="clear: both" />
</div>
<?php get_footer(); ?>