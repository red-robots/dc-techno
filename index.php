<?php
/**
 * Front page
 *
 */

get_header(); ?>

	<div id="primary" class="">
		<div id="content" role="main">
        
 <?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'page',
	'page_id' => 21, // homepage
));
	if ($wp_query->have_posts()) : ?>
    <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 
	
	$size = 'homepic';
	$image1 = get_field('box1_photo');
	$thumb1 = $image1['sizes'][ $size ];
	$image2 = get_field('box2_photo');
	$thumb2 = $image2['sizes'][ $size ];
	$image3 = get_field('box3_photo');
	$thumb3 = $image3['sizes'][ $size ];
	$title1 = get_field('box1_title');
	$title2 = get_field('box2_title');
	$title3 = get_field('box3_title');
	$desc1 = get_field('box1_description');
	$desc2 = get_field('box2_description');
	$desc3 = get_field('box3_description');
	$link1 = get_field('box1_link');
	$link2 = get_field('box2_link');
	$link3 = get_field('box3_link');
	// How we can help;
	$hTitle = get_field('h_title');
	$hText = get_field('h_subtext');
	$hPhone = get_field('h_phone');
	?>
    
    <div class="homebox hb-first">
    	<div class="homebox-header"><?php echo $title1; ?></div>
        <img src="<?php echo $thumb1; ?>"  />
        <div class="homebox-content">
        <div class="hb-pad"><?php echo $desc1; ?></div>
        	<div class="homebox-link"><a href="<?php echo $link1; ?>">+</a></div>
        </div>
        
    </div><!-- homebox -->
    
    <div class="homebox hb-first">
    	<div class="homebox-header"><?php echo $title2; ?></div>
        <img src="<?php echo $thumb2; ?>"  />
        <div class="homebox-content">
        <div class="hb-pad"><?php echo $desc2; ?></div>
        	<div class="homebox-link"><a href="<?php echo $link2; ?>">+</a></div>
        </div>
        
    </div><!-- homebox -->
    
    <div class="homebox hb-last">
    	<div class="homebox-header"><?php echo $title3; ?></div>
        <img src="<?php echo $thumb3; ?>"  />
        <div class="homebox-content">
        <div class="hb-pad"><?php echo $desc3; ?></div>
        	<div class="homebox-link"><a href="<?php echo $link3; ?>">+</a></div>
        </div>
        
    </div><!-- homebox -->
    
    
    <div class="home-help">
    	<div class="homebox-header htitle"><span class="ititle"><?php echo $hTitle; ?></span></div>
        <div class="homebox-content">
            <div class="hb-pad">
            	
                <div class="help-left">
                	<p><?php echo $hText; ?></p>
                	<div class="hh-phone"><?php echo $hPhone; ?></div>
                    <?php //get_search_form(); ?>
                </div><!-- help left -->
                
                <div class="help-right">
                	<p>Submit a Request</p>
                    <?php if(have_rows('form_links')) : while(have_rows('form_links')) : the_row(); 
							
							$helpTitle = get_sub_field('form_title');
							$helpLink = get_sub_field('form_link');
					
						?>
                    		<div class="helplink">
                            <a href="<?php echo $helpLink; ?>">
									<?php echo $helpTitle; ?>
                                    <div class="helpplus">+</div>
                            </a>
                          </div><!-- help link -->
                          
                    <?php endwhile; endif; ?>
                </div><!-- help left -->
                
            </div><!-- hb-pad -->
        </div><!-- homebox-content -->
    </div><!-- home-help -->
     <?php endwhile; endif; wp_reset_query(); ?>
    
 <?php
 // pull latest post
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'post',
	'posts_per_page' => 1,
));
	if ($wp_query->have_posts()) : ?>
    <div class="home-news">
    	<h2>News & Upcoming Events</h2>
    <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); ?>	
        <div class="posttitle"><h2><?php the_title(); ?></h2></div>
        <p><?php the_excerpt(); ?></p>
        <div class="homebox-link"><a href="<?php the_permalink(); ?>">+</a></div>
        <?php endwhile; ?>
        </div><!-- home news -->
        <?php endif; wp_reset_query(); ?>
    
    
    <div class="pageclear"></div>
    
     <?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'page',
	'page_id' => 21, // homepage
));
	if ($wp_query->have_posts()) : ?>
    <?php while ($wp_query->have_posts()) :  $wp_query->the_post(); ?>
    
    <?php 
	$num = array();
	// to get number
	if ( have_rows('services','option') ) : while ( have_rows('services','option') ) : the_row();
		$logo = get_sub_field('logo');
		$num[] = $logo;
	endwhile; endif; 
	// how many?
	$i = count($num);
	$times = 0;
	if(have_rows('logos')) : 
			
	?>
        <div class="homelogos">
			<?php while(have_rows('logos')) : the_row(); 
					$times++;
            		$logo = get_sub_field('logo');
					$logolink = get_sub_field('logo_link');
					$logosize = 'homelogo';
					$thumblogo = $logo['sizes'][ $logosize ];
					
            
            ?>
            
            <div class="homelogo <?php if( $times !== $i ) {echo 'hlfirst';}else{echo 'hllast';} ?>">
				<?php if( $logolink != '' ) {echo'<a href="'.$logolink.'" target="_blank">';}; ?>
                	<img src="<?php echo $thumblogo; ?>"  />
                <?php if( $logolink != '' ) {echo'</a>';}; ?>
            </div><!-- home logo -->
            
            <?php endwhile; ?>
        </div><!-- homelogos -->
    <?php endif; // end repeater ?>
    
    
    <?php endwhile; endif; // end page query ?>
   
		
		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>