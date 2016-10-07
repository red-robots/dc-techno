<?php
/**
 * Template Name: Services
 */

get_header(); ?>

	<div id="primary" class="">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<div class="entry-content">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
                </div><!-- entry content -->
           <?php endwhile; // end of the loop. ?>
                
<?php
$i = 0;
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'service',
	'posts_per_page' => -1,
	'paged' => $paged,
));
	if ($wp_query->have_posts()) : ?>
    <?php while ($wp_query->have_posts()) : ?>
        
    <?php $wp_query->the_post(); 
	
 		
			
		?>
                
       <div class="service-wrapper">
       <div class="service-toggle">+</div>
           <div class="service"><?php the_title(); ?></div>
           <div class="answer">
           	<div class="entry-content">
		   			<?php the_content(); ?>
           	</div><!-- entry-content -->
           </div><!-- answer -->
       </div><!-- faqrow -->
        
        
	<?php endwhile; // end of the loop. ?>
    <?php endif; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>