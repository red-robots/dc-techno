<?php
/**
 * Template Name: Contact
 */

get_header(); 

$phone_numbers = get_field('phone_numbers', 'option');
$mailing_address = get_field('mailing_address', 'option');
$street_address = get_field('street_address', 'option');

?>

	<div id="primary" class="site-content-full">
		<div id="content" role="main">

		

			<?php while ( have_posts() ) : the_post(); ?>
				
				<div class="entry-content">
                <h1><?php the_title(); ?></h1>

                <div class="contact-container">
					<div class="contact-flex">
						<h2>Phone</h2>
						<?php echo $phone_numbers; ?>
					</div>
					<div class="contact-flex">
						<h2>Mailing Address</h2>
						<?php echo $mailing_address; ?>
					</div>
					<div class="contact-flex">
						<h2>Street Address</h2>
						<?php echo $street_address; ?>
					</div>
				</div><!-- contact container -->

                <div class="col-left form">
                <h2>Contact Form</h2>
                	<?php echo get_field('right_column') ?>
                </div>
                
                	 <div class="col-right areas">
                	 <h2>Team Member Areas</h2>
                	 	<?php get_template_part('inc/map'); ?>

						
                	 </div> 
                            
                </div><!-- entry content -->
                
                
			<?php endwhile; // end of the loop. ?>

			<?php get_template_part('inc/team-member-full'); ?> 

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>