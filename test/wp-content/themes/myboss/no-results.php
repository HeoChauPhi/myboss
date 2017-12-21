<?php get_header(); ?>
        <div class="warp-960">
        <?php the_post(); ?>
        <div class="title-960">
        	<h2><?php the_title(); ?></h2>
        </div>
            <?php the_content(); ?>
        </div>
    </div>
    <br style="clear: both" />
</div>
<?php get_footer(); ?>