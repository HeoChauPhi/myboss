<?php
/*Template name: Get Product
*/
?>
<?php get_header(); ?>
<div class="banner-top">
<img class="banner-cat-121" src="<?php echo z_taxonomy_image_url('121','large'); ?>" />
</div>
<div id="breadcrumb">
	<ul>
		<li><a href="<?php echo get_option('home'); ?>">Trang chủ</a></li>
		<li><a href="<?php echo get_option('home'); ?>/tuy-chon-cau-hinh">Tùy chọn cấu hình</a></li>
	</ul>
</div>
<div class="warp page-cat-121 page-get-product warp-960-black-news-ct">
<div class="warp-240-black">
	<?php get_sidebar(); ?>
</div>
<div class="filters-content warp-720-news">
<h2 class="warp-720-news-title"><?php the_title(); ?></h2>
<div class="get-product">
<form class="get-product-items">
<?php
$taxonomy = 'product_cat';
$orderby = 'name';
$show_count = 0; // 1 for yes, 0 for no
$pad_counts = 0; // 1 for yes, 0 for no
$hierarchical = 1; // 1 for yes, 0 for no
$title = '';
$empty = 0;
$per_post = -1;
$price = get_post_meta( get_the_ID(), '_regular_price', true);
?>

<?php
if($cat->category_parent == 0)
{
	$args2 = array(
	'taxonomy' => $taxonomy,
	'child_of' => 0,
	'parent' => 153,
	'orderby' => $orderby,
	'show_count' => $show_count,
	'pad_counts' => $pad_counts,
	'hierarchical' => $hierarchical,
	'title_li' => $title,
	'hide_empty' => $empty,
	'posts_per_page' => $per_post

	);
	$sub_cats = get_categories( $args2 );
	if($sub_cats)
	{
		foreach($sub_cats as $sub_category)
		{
			echo "<div class='get-product-item relationship-group " . $sub_category->slug ."'>";
			if($sub_cats->$sub_category == 0)
			{
				echo "<span>".$sub_category->cat_name ."</span>";
				?>
				<?php
				$args = array(
					'post_type' => 'product',
					'product_cat' => $sub_category->slug,
					'posts_per_page' => -1
				);
				$loop = new WP_Query( $args );
				echo "<select class='getproducts'>"; ?>
				<option value="0" selected="selected">[----- Chọn một sản phẩm -------]</option>
				<?php
				while ( $loop->have_posts() ) : $loop->the_post(); global $product;
				$price = get_post_meta( get_the_ID(), '_regular_price', true);?>
				<option value="<?php echo $price; ?>"><?php the_title(); ?> (Giá: <?php echo $price; ?> đ)</option>
				<?php endwhile; ?>
				</select>
				<?php wp_reset_query(); ?>
				<?php
			}
			echo "</div>";
		}
	}
} ?>
<div class="get-product-total">
	<label>Tổng giá:</label>
	<label class="total"></label>
	<label>đ</label>
</div>
<div class="get-product-action">
	<input type="Button" value="Chọn máy tính" class="generate-product">
	<input type="reset" value="Chọn lại" class="reset-generate-product">
</div>
</form>
</div>
<div class="generate-product-action">
<a href="javascript:void(0)" class="download-image" onClick="downimg()" ><i class="fa fa-file-image-o"></i>Download image (Ctrl + S)</a>
<a href="#" id="pdfGenerate" class="download-pdf"><i class="fa fa-file-pdf-o"></i>Download PDF</a>
</div>
<div class="generate-product-wrapper"></div>
<form id="history-form" class="form-horizontal">
  <div id="accordion" class="panel-group">

  </div>
</form>
<div class="generate-product-action">
<button id="my-button" class="single_add_to_cart_button">POP IT UP</button>
<div class="product-add-cart" style="display: none;">
<span class="b-close"><span>X</span></span>
<?php
	//echo $post->ID;
	echo do_shortcode('[contact-form-7 id="4950" title="add to cart get product"]');
	?>
</div>
</div>
<script language="javascript">
	function downimg(){
		html2canvas($('.generate-product-wrapper'), {
			onrendered: function (canvas) {
				var img = canvas.toDataURL('image/png').replace("image.png", "image/octet-stream");
				window.location.href = img;
			}
		});
	}
</script>

</div></div>
    <br style="clear: both" />
</div>
<br style="clear: both" />
</div>
<?php get_footer(); ?>
