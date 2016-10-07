<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
    <div class="wrapper">
		<div class="site-info">
        
			<?php 
			$line1 = get_field('footer_line_1','option');
			$line2 = get_field('footer_line_2','option');
			
			
			
			 ?>
             
             <?php echo $line1; ?>
             <br>
             <?php echo $line2; ?>
             
             
             <div class="siteby">
        			<a href="<?php the_field('sitemap_link','option'); ?>">sitemap</a> | 
                    Site by <a href="http://bellaworksweb.com" target="_blank">Bellaworks</a>
        </div><!-- siteby -->
			
		</div><!-- .site-info -->
        </div><!-- .wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>