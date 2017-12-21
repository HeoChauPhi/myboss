<?php
/**
* The Sidebar containing the main widget areas.
*
* @package Shape
* @since Shape 1.0
*/
?>
     <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('myboss-sidebar') ) : else : ?>
     <?php endif; ?>