<?php 
/*
	Template Name: Product Package
*/
get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="package-product">

			<div class="title-960"><h2><?php the_title(); ?></h2></div>
			<div id="slider-main">
			<?php 
				echo do_shortcode("[metaslider id=3415]"); 
			?>
			</div>
			<?php      
				$post_object = get_post( $post_id );        
				echo do_shortcode( $post_object->post_content );
			?>
			<!-- <div id="sorts" class="button-group">
				<button data-sort-by="original-order">Sản phẩm mới nhất</button>
				<button data-sort-by="number">Giá từ: thấp > cao</button>
			</div> -->
			<div id="filters">
				<div class="filters-items filters-items-all active" style="display: none;">
					<div class="image-category"></div>
					<button data-filter="*">Tất cả sản phẩm</button >
				</div>
				<?php 
					$terms = get_terms("categories-package-product"); // get all categories, but you can use any taxonomy
					$count = count($terms); //How many are they?
					if ( $count > 0 ){  //If there are more than 0 terms
						foreach ( $terms as $term ) {  //for each term:
							echo '<div class="filters-items"><div class="image-category"><img src="' . z_taxonomy_image_url($term->term_id) . '" /></div>';
							echo "<button data-filter='.".$term->slug."'>" . $term->name . "</button>\n"; //create a list item with the current term slug for sorting, and name for label
							echo "</div>";
							echo '<div class="description" style="display: none;">'.the_field($term->description_cat).'</div>';
						}
					} 
				?>
			</div>
			<?php
				$the_query = new WP_Query(array(
					'post_type' => 'package-products',
					'posts_per_page' => -1
				));
			?>
			<?php if ( $the_query->have_posts() ) : ?>
				<div class="isotope">
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
						$termsArray = get_the_terms( $post->ID, "categories-package-product", "format-name");  //Get the terms for this particular item
						$termsString = ""; //initialize the string that will contain the terms
						foreach ( $termsArray as $term ) { // for each term 
							$termsString .= $term->slug.' '; //create a string that has all the slugs 
						}
						$post_thumbnail = get_the_post_thumbnail( $post->ID );
						if(function_exists('types_render_field')) {
							$description = types_render_field('descriptions', array());
							//$total_package = types_render_field('total-package', array());
							$sale_product = types_render_field('sale-package', array());
						}
					?> 
					<article class="<?php echo $termsString; ?>item" data-category="<?php echo $termsString; ?>"> 
						<!--<div class="link-edit">
							<?php //edit_post_link(); ?>
						</div>-->
						<div class="group-img">
							<a href="<?php the_permalink(); ?>"><?php echo $post_thumbnail; ?></a>
						</div>
						<div class="group-content">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php if (!empty ($description)){?>
								<div class="content-package-product"><?php echo $description; ?></div>
							<?php } ?>
							<div class="pros-thumb-btm">
								<div class="pros-thumb-btm-cost"><span id="sum" class="number">0</span><span class="unit">đ</span></div>
								<div class="pros-thumb-btm-detail">
									<i class="fa fa-info-circle"></i><a href="<?php the_permalink(); ?>"> Chi tiết</a>
								</div>
							</div>
						</div>
						
						<div class="relationship">
						<?php if (!empty ($sale_product)) :?>
						<div class="sale-product-package"><span class="sale-package-price" value="<?php echo $sale_product; ?>"><?php echo $sale_product; ?></span></div>
						<?php else : ?>
							<div class="sale-product-package"><span class="sale-package-price" value=0><?php echo $sale_product; ?></span></div>
						<?php endif; ?>
						
						<h2 class="relationship-title">Sản phẩm theo bộ</h2>
							<?php 

							$posts = get_field('san_pham_mac_dinh');

							if( $posts ): ?>
								<ul class="relationship-list">
								<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) 
									$price = get_post_meta( $p->ID, '_regular_price', true);
								?>
										<li class="relationship-item">
											<a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a>
											<input class="price-total-item" type="text" disabled value="<?php echo $price; ?>" name="<?php echo get_the_title( $p->ID ); ?>">
										</li>
								<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>
						
					</article> <!-- end item -->
					<?php endwhile;  ?>
				</div> <!-- end isotope-list -->
			<?php endif; ?>

		</section>
		<!-- /section -->
	</main>
    </div>
    <br style="clear: both" />
</div>

<?php get_footer(); ?>
