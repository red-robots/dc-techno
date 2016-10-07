<div id="home-slider">
<?php 
// OPtions
$slide = get_field('image','option');

// set empty first
$titles = array();

// run to get array
if ( have_rows('services','option') ) : while ( have_rows('services','option') ) : the_row();
 	$serviceTitle = get_sub_field('service_title','option');
	$titles[] = $serviceTitle;
	
endwhile; endif; 

// Get number in array of titles
$num = count($titles);
$i = 0;
$active = 0;

// run again for slider
if ( have_rows('services','option') ) : ?>
<div class="flexslider">
        <ul class="slides">

        
        <?php while ( have_rows('services','option') ) : ?>
			<?php the_row(); 
				$link = get_sub_field('link','option');
				$serviceDesc = get_sub_field('service_description','option');
				$intro = get_sub_field('main_title','option');
				$mainTitle = get_sub_field('red_title_text','option');
			?>
            
            <li> 
            	
                <img src="<?php echo $slide; ?>" />
                
                <div class="slide-info">
                    <div class="slide-intro"><?php echo $intro; ?></div>
                    <div class="slide-title"><?php echo $mainTitle; ?></div>
                    
                    <div class="clear"></div>
                    
                  <div class="slide-stitles">  
					<?php 
						$active++;
						
						foreach( $titles as $atitle ) { 
						// count foreach
						$i++;
						
						?>
                    		<div class="slide-title-t 
                           <?php if( $active == $i ) {echo 't-acvite'; } ?>"><?php echo $atitle; ?></div>
                    <?php 
							// don't put a plus on the last one.
							if( $num !== $i ) {
								echo '<div class="slide-plus">+</div>';
							}
					 	} 
						// got to reset after the foreach
						$i = 0;
						?>
                   </div><!-- slide-stitles -->
                    
                    <div class="slide-desc"><?php echo $serviceDesc; ?></div>
                    
                    <div class="slide-click"><a href="<?php echo $link; ?>">+</a></div>
                       
                </div><!-- slides info -->
            </li>
            
           <?php endwhile; ?>
      	 </ul><!-- slides -->
</div><!-- .flexslider -->
<?php endif; // end loop ?>
</div><!-- home slider -->

<div id="home-slider-mobile">
<?php 
// OPtions
$slide = get_field('image','option');
$intro = 'Turn-key solutions for all things';
$mainTitle = 'Battery';
// set empty first
$titles = array();

// run to get array
if ( have_rows('services','option') ) : while ( have_rows('services','option') ) : the_row();
 	$serviceTitle = get_sub_field('service_title','option');
	$titles[] = $serviceTitle;
	
endwhile; endif; 

// Get number in array of titles
$num = count($titles);
$i = 0;
$active = 0;

// run again for slider
if ( have_rows('services','option') ) : ?>

        <?php while ( have_rows('services','option') ) : ?>
			<?php the_row(); 
			
			$i++;
			if($i == 1) :
				$link = get_sub_field('link','option');
				$serviceDesc = get_sub_field('service_description','option');
			?>
            
       
            	
                
                
                <div class="slide-info">
                    <div class="slide-intro"><?php echo $intro; ?></div>
                    <div class="slide-title"><?php echo $mainTitle; ?></div>
                    
                    <div class="clear"></div>
                    
                  <div class="slide-stitles">  
					<?php 
						$active++;
						$plus =0;
						foreach( $titles as $atitle ) { 
						// count foreach
						$plus++;
						
						?>
                    		<div class="slide-title-t "><?php echo $atitle; ?></div>
                    <?php 
							// don't put a plus on the last one.
							if( $num !== $plus ) {
								echo '<div class="slide-plus">+</div>';
							}
					 	} 
						// got to reset after the foreach
						//$i = 0;
						?>
                   </div><!-- slide-stitles -->
                    
                    <div class="slide-desc"><?php echo $serviceDesc; ?></div>
                    
                    <div class="slide-click"><a href="<?php echo $link; ?>">+</a></div>
                       
                </div><!-- slides info -->
           
            
           <?php 
		   endif; // end just going through 1 time
		   endwhile; // endwhile loop?>
 
<?php endif; // end loop ?>
</div><!-- home slider mobile -->

<div class="clear"></div>