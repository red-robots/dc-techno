<?php
/**
 * Template Name: Contact
 */

get_header(); ?>

	<div id="primary" class="site-content-full">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<div class="entry-content">
                <h1><?php the_title(); ?></h1>

                <div class="col-left"><?php the_content(); ?></div>
                
                	 <div class="col-right"><?php echo get_field('right_column') ?></div> 
                            
                </div><!-- entry content -->
                
                
			<?php endwhile; // end of the loop. ?>

			<?php get_template_part('inc/map'); ?>

			<?php get_template_part('inc/team-member-full'); ?> 

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>