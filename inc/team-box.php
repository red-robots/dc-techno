<div class="team-box">
     <?php 
        // Get field Name
        $image = get_field('picture'); 
        $url = $image['url'];
		 $size = 'team-thumb';
        $thumb = $image['sizes'][ $size ];
		// Get the title
			$title = get_the_title() ;
			// Put the title in dashed form
			$sanitized =  sanitize_title_with_dashes($title);


            ?>
            <div class="teamthumb">
            <?php
        echo wp_get_attachment_image( $image, $size );
        ?>
        </div>
        <div class="team-box-right">
            <h3><?php the_title(); ?></h3>
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
            <span class="listareas"><?php echo $listareas; ?></span>
            
            <?php endif; ?>
            
            <div class="team-contact">
                <a href="#<?php echo $sanitized; ?>">contact</a>
            </div><!-- team contact -->
        </div><!-- team-box-right -->
        <?php //the_field('bio'); ?>
</div><!-- team box -->