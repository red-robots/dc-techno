<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content-full">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); 

			// Get field Name
		$image = get_field('featured_image'); 
		$url = $image['url'];
		$title = $image['title'];
		$alt = $image['alt'];
		$caption = $image['caption'];
	 
		// thumbnail or custom size that will go
		// into the "thumb" variable.
		$size = 'homepic';
		$thumb = $image['sizes'][ $size ];
		$width = $image['sizes'][ $size . '-width' ];
		$height = $image['sizes'][ $size . '-height' ];

			?>

				<div class="entry-content">
                <h1><?php the_title(); ?></h1>
                <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
                <?php the_content(); ?>
                </div><!-- entry content -->

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->



<div class="clear"></div>
<div class="entry-content">
<h3 class="other-products">Other Products</h3>
</div>
<?php
$i = 0;
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'product',
	'posts_per_page' => -1,
	'paged' => $paged,
));
	if ($wp_query->have_posts()) : ?>
    <?php while ($wp_query->have_posts()) : ?>
        
    <?php $wp_query->the_post(); 
	
 		$i++;
		// Get field Name
		$image = get_field('featured_image'); 
		$url = $image['url'];
		$title = $image['title'];
		$alt = $image['alt'];
		$caption = $image['caption'];
	 
		// thumbnail or custom size that will go
		// into the "thumb" variable.
		$size = 'homepic';
		$thumb = $image['sizes'][ $size ];
		$width = $image['sizes'][ $size . '-width' ];
		$height = $image['sizes'][ $size . '-height' ];
		
		if( $i == 3 ) {
			$prodClass = 'prod-last';
			$i = 0;
		} else {
			$prodClass = 'prod-first';
		}
			
		?>
                
        <div class="product <?php echo $prodClass; ?> ">
        <a href="<?php the_permalink(); ?>">
        	<div class="product-header blocks"><?php the_title(); ?></div>
         <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
         <div class="product-content js-blocks"><?php echo get_product_excerpt(20); ?></div> 
         <div class="product-more">+</div>  
         </a>
        </div><!-- product -->
        
        
	<?php endwhile; // end of the loop. ?>
    <?php endif; // end of the loop. ?>


<?php get_footer(); ?>