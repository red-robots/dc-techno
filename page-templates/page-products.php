<?php
/**
 * Template Name: Products
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
         <div class="product-content"><?php echo get_product_excerpt(20); ?></div> 
         <div class="product-more">+</div>  
         </a>
        </div><!-- product -->
        
        
	<?php endwhile; // end of the loop. ?>
    <?php endif; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>