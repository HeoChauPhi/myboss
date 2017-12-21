<?php
/*Template name: Page Category ID 153
*/
?>
<?php get_header(); ?>
<div id="breadcrumb">
	<ul>
				<li><a href="<?php echo get_option('home'); ?>">Trang chủ</a></li>
				<li><?php the_title(); ?></li>
		</ul>
</div>
<div class="warp page-cat-121">
<img class="banner-cat-121" src="<?php echo z_taxonomy_image_url('121','large'); ?>" /> 
<div class="filters-content">
<?php

$args = array(
    'number'     => $number,
    'orderby'    => 'title',
    'order'      => 'ASC',
    'hide_empty' => $hide_empty,
		'parent'		 => 153,
    'include'    => $ids
);
$product_categories = get_terms( 'product_cat', $args );
$count = count($product_categories);
if ( $count > 0 ){
    foreach ( $product_categories as $product_category ) {
				echo '<div class="filters-items"><div class="filters-items-content"><div class="image-category"><img src="' . z_taxonomy_image_url($product_category->term_id) . '" /></div>';
        echo '<div class="title-960" style="width:100%;"><h4 class="title-product-cat" style="text-transform: uppercase;padding:5px 0;"><a href="' . get_term_link( $product_category ) . '">' . wp_trim_words($product_category->name, 60) . '</a></h4></div></div></div>';
    }
}
?>
    </div></div>
    <br style="clear: both" />
    </div>
    <br style="clear: both" />
</div>
<?php get_footer(); ?>