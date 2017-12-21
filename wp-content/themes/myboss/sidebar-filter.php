<?php
/**
* The Sidebar containing the main widget areas.
*
* @package Shape
* @since Shape 1.0
*/
?>
<div id="warp-filter">
    <div class="filter-title">
        <h2>Bộ lọc sản phẩm:</h2>
    </div>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Product Filter') ) : ?> <?php endif; ?>
</div>