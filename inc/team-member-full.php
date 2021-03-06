<!-- ###############################

		Anchored Down Team Members 
        
    ###################################-->    
            
<div class="entry-content">
<h3>All Team Members</h3>
</div>

<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'team',
	'posts_per_page' => -1,
	'paged' => $paged,
));
	if ($wp_query->have_posts()) : ?>
	<div class="team-container">
		
	
    <?php while ($wp_query->have_posts()) : ?>
    <?php $wp_query->the_post(); ?>	
    
    
<?php 
			// Get the title
			$title = get_the_title() ;
			// Put the title in dashed form
			$sanitized =  sanitize_title_with_dashes($title);
			// get the vcard 
			$vcard = get_field('vcard'); 
?>
    
   <!--  <a class="anchor-person" id="<?php echo $sanitized; ?>"></a> -->
    <div class="team-member" id="<?php echo $sanitized; ?>">
    	<div class="team-photo">
		<?php 
        // Get field Name
        $image = get_field('picture'); 
        $url = $image['url'];
		 $size = 'large';
        $thumb = $image['sizes'][ $size ];

        echo wp_get_attachment_image( $image, $size );
        ?>
        
        
        </div><!-- team photo -->
        
       <div class="team-content">
       <div class="entry-content">
       
        <h2 class="team-title"><?php the_title(); ?></h2>
        <div class="vcard"><a href="<?php echo $vcard; ?>">vcard</a></div>
        <?php the_field('bio'); ?>
        
        <?php
					$terms = get_the_terms( $post->ID, 'market_segment' );
					if ( $terms && ! is_wp_error( $terms ) ) : 
					$areas = array();

						foreach ( $terms as $term ) {
							$areas[] = $term->name;
						}
										
					$listareas = join( ", ", $areas );
?>
            <?php //echo get_the_term_list( $post->ID, 'market_segment', '<li>', ',</li><li>', '</li>' ); ?>
            <h4>Market Segments</h4>
            <div class="listregionarea"><?php echo $listareas; ?></div>
             <?php endif; ?>
            
            
            <?php
					$mterms = get_the_terms( $post->ID, 'rep_area' );
					if ( $mterms && ! is_wp_error( $mterms ) ) : 
					$regions = array();

						foreach ( $mterms as $mterm ) {
							$regions[] = $mterm->name;
						}
										
					$listregions = join( ", ", $regions );
?>
            <h4>Market Regions</h4>
            <div class="listregionarea"><?php echo $listregions; ?></div>
            <?php endif; ?>
        
        
       </div><!-- entry content -->
       <div class="backtotop"><a href="#top">back to top</a></div>
       </div><!-- team content -->
        	
    </div><!-- team member -->
    
<?php endwhile; ?>
</div><!-- team container -->
<?php endif; wp_reset_query(); ?>