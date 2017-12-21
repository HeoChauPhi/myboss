<?php
/*Template name: Page Category ID 121
*/
?>
<?php get_header(); ?>
<div class="warp page-cat"> 
	<div class="filters-content">
	<?php
	$args = array(
			'number'     => $number,
			'orderby'    => 'title',
			'order'      => 'ASC',
			'hide_empty' => $hide_empty,
			'parent'		 => 121,
			'include'    => $ids
	);
	$product_categories = get_terms( 'product_cat', $args );
	$count = count($product_categories);
	if ( $count > 0 ){
		foreach ( $product_categories as $product_category ) {
			?>
			<div class="filters-items">
				<div class="filters-items-content">
					<div class="title">
						<a href="<?php get_term_link( $product_category ); ?>"><?php wp_trim_words($product_category->name, 60); ?></a>
					</div>
				</div>
			</div>
			<?php
		}
	}
	?>
  </div>
</div>
<?php get_footer(); ?>