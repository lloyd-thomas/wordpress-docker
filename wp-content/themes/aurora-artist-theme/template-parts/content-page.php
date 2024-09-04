<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aurora-theme
 */

?>
<main id="primary" class="site-main text-center">
	
	<div class="px-4 mt-8 sm:px-7 sm:mt-32">
	<?php the_title( '<h1 class="entry-title text-left text-xl uppercase lg:text-center mb-4 sm:mb-12 sm:text-4xl dark:text-cloudygrey">', '</h1>' ); ?>


	
	
	<div class="entry-content">
			<div class="py-4  text-mirageblue/75 dark:text-white/75">
     		   <div class="releaseCopy m-auto sm:text-xl text-left">
				<div class="pb-8 sm:pb-20">
				<?php aurora_wordpress_post_thumbnail(); ?>
				</div>
      	      <?php the_content(); ?>
				
       			 </div>
     		 </div>
		</div>
	</div><!-- .entry-content -->
</div>
</main>

