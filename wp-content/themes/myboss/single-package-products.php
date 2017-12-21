<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section>
		
	
	<?php if (have_posts()): while (have_posts()) : the_post(); 
		if(function_exists('types_render_field')) {
			$sale_product = types_render_field('sale-package', array());
		}
	?>
<div id="breadcrumb">
	<ul>
				<li><a href="<?php echo get_option('home'); ?>">Trang chủ</a></li>
				<li><?php the_title(); ?></li>
		</ul>
</div>
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="package-product-content warp-960">
				<div class="group-image">
				<h2 class="node-title"><?php the_title(); ?></h2>
				<?php 
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					the_post_thumbnail();
				}
				?>
				</div>
				<div class="group-content">
					<div class="product-price">
						<div class="price"><label>Giá gốc:</label>
							<span id="sum">0</span><span class="unit">đ</span>
						</div>
						<div class="product-price-sale price"><label>Giá bán:</label>
							<span id="sum-sale">0</span><span class="unit">đ</span>
						</div>
						<?php if (!empty ($sale_product)) :?>
						<div class="sale-product-package"><span class="sale-package-price" value="<?php echo $sale_product; ?>"><?php echo $sale_product; ?></span></div>
						<?php else : ?>
							<div class="sale-product-package"><span class="sale-package-price" value=0><?php echo $sale_product; ?></span></div>
						<?php endif; ?>
					</div>
					<div class="product-info"><?php the_content(); ?></div>
					<button id="my-button" class="single_add_to_cart_button">POP IT UP</button>
					<div class="product-add-cart" style="display: none;">
					<span class="b-close"><span>X</span></span>
					<?php 
						//echo $post->ID;
						echo do_shortcode('[contact-form-7 id="3209" title="add to cart"]');
						?> 
					</div>
				</div>
			</div>
			<div class="relationship warp-720">
			<h2 class="relationship-title">Lựa chọn nâng cấp</h2>
			
				<?php 

					$posts = get_field('san_pham_mac_dinh');

					if( $posts ) { ?>
						<form class="<?php foreach( $posts as $p ) {echo $p->post_name . ' ' ;}?>">
					<?php 
					} else {
						echo '<form class="no-class">'; 
					}
				?>
			
					<?php
						// Find connected pages
						$connected = new WP_Query( array(
							'connected_type' => 'create_tap_truyen',
							'connected_items' => get_queried_object(),
							'nopaging' => true,
						) );

						// Display connected pages
						if ( $connected->have_posts() ) :
						?>
						<?php while ( $connected->have_posts() ) : $connected->the_post(); 
							$child_id = $connected->ID;
							$taxonomy = 'product_cat';
							$terms = get_the_terms( $child_id, $taxonomy );
							$image_child = get_the_post_thumbnail( $connected->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
								'title' => $image_title,
								'class' => 'image-child-product'   
							));
							$price = get_post_meta( get_the_ID(), '_regular_price', true);
							$child_link = get_permalink($child_id);
							
						?>
							
							<div id="<?php echo $post->post_name; ?>" class="<?php foreach( $terms as $term ) echo $term->slug; ?>" data-filter="0">
								<h2 class="category"><?php the_terms($child_id, $taxonomy); ?></h2>
								<div class="group-image">
									<?php echo $image_child; ?>
								</div>
								<div class="group-content">
									<?php //echo $child_post->fields['ticker-product-item']; ?>
									<input class="chose-items left" type="radio" name="<?php foreach( $terms as $term ) echo $term->slug; ?>" id="<?php echo $child_link; ?>" value="<?php echo $price; ?>">
									<label class="product-title left" for="<?php echo $child_link; ?>"><?php echo the_title(); ?></label>
									<p class="price left">Giá: <span class="price-total"><?php echo $price; ?></span> đ</p>
									<a href="<?php echo $child_link; ?>" class="read-more" title="Chi tiết sản phẩm">Chi tiết</a>
									<!-- <p class="category">Category: <?php //the_terms($child_id, $taxonomy); ?></p> -->
									
								</div>
								<!-- <a href="<?php //echo get_edit_post_link($child_id); ?>" >Edit items</a> -->
							</div>
							
						<?php endwhile; ?>

						<?php
						// Prevent weirdness
						wp_reset_postdata();

						endif;
					?>
				</form>
			<?php //edit_post_link(); ?>
				<div class="facebook-comments">
					<?php echo do_shortcode('[fbcomments]'); ?>
				</div>
			</div>
			
			<div class="warp-240">				
				<?php
				//Get array of terms
				$terms = get_the_terms( $post->ID , 'categories-package-product', 'string');
				//Pluck out the IDs to get an array of IDS
				$term_ids = wp_list_pluck($terms,'term_id');

				//Query posts with tax_query. Choose in 'IN' if want to query posts with any of the terms
				//Chose 'AND' if you want to query for posts with all terms
				$second_query = new WP_Query( array(
					'post_type' => 'package-products',
					'tax_query' => array(
						array(
						'taxonomy' => 'categories-package-product',
						'field' => 'id',
						'terms' => $term_ids,
						'operator'=> 'IN' //Or 'AND' or 'NOT IN'
					)),
					'posts_per_page' => 5,
					'ignore_sticky_posts' => 1,
					'orderby' => 'rand',
					'post__not_in'=>array($post->ID)
				));
				?>
				<div id="warp-filter" class="related-product">
					<div class="filter-title">
						<h2>Sản phẩm liên quan</h2>
					</div>
					<div class="myboss">
						<ul  class="products">
							<?php
							//Loop through posts and display...
							if($second_query->have_posts()) {
								while ($second_query->have_posts() ) : $second_query->the_post(); 	
								?>
								<li class="single_related">
									<div class="pros-thumb-image">
									<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php 
									if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
										the_post_thumbnail();
									} 
									?></a>
									</div>
									<h3 class="pros-thumb-top-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
								</li>
								<?php endwhile; 
								wp_reset_query();
							}
							?>
						</ul>
					</div>
				</div>

			</div>
		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>
		<div class="package-product-content warp-960">
			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
    </div>
		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>

    </div>
    <br style="clear: both" />
</div>
<?php get_footer(); ?>
