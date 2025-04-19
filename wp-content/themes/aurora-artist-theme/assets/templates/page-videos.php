<?php

/**
 * Template Name: Videos
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 *  @package aurora-theme
 */

get_header();
?>

	<main id="primary" class="site-main text-center">
	<div class="px-4 mt-8 sm:px-7 sm:mt-32">
 <h1 class="text-left text-xl uppercase lg:text-center mb-4 sm:mb-12 sm:text-4xl dark:text-cloudygrey ">Videos</h1>
    <?php
		while ( have_posts() ) :
			the_post();

			//get_template_part( 'template-parts/content', 'page' );

			/* If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;*/

		endwhile; // End of the loop.
		?>

<div class="sm:grid sm:grid-cols-4 sm:gap-8">
<?php

$cat_name = 'video';
$the_query = new WP_Query(array(
	'category_name' => $cat_name,
	'posts_per_page' => -1,
	'meta_key' => 'release_date',
	'orderby' => 'meta_value_num',
	'order' => 'DESC'
));

$my_ID = get_the_ID();
$string = "";
// The Loop
if ($the_query->have_posts()) {
		
	while ($the_query->have_posts()) {
		$the_query->the_post();  
        $image = get_field('video_placeholder_image');
        $video_url = get_field('video_embed');
        ?>
 
 <?php 
       $image = get_field('video_placeholder_image');
       $video_url = get_field('video_embed');
       $myDate = get_field('release_date')."hello";
       if( get_field('video_placeholder_image_format') == 'landscape' ) { ?>
          <div class="relative mb-4 sm:mb-0 sm:mx-0 sm:w-auto sm:col-span-2">
            <div class="absolute w-full h-full overflow-hidden noisewrapper pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 text-white uppercase text-sm font-demi-bold p-4 pointer-events-none"><?php the_title(); ?></div>
            <a data-fancybox="video-gallery" href="<?php echo $video_url ?>">
                <img class="aspect-landscape object-cover w-full h-full" src="<?php echo esc_url($image['url']); ?>" /></a>
        </div>
        <?php }else{ ?>
            <div class="relative mb-4 sm:mb-0 sm:w-auto sm:col-span-2 sm:row-span-2  sm:mx-0 ">
            <div class="absolute w-full h-full overflow-hidden noisewrapper pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 text-white uppercase text-sm font-demi-bold p-4 pointer-events-none"><?php the_title(); ?></div>
                <a data-fancybox="video-gallery" href="<?php echo $video_url ?>">
                    <img class="aspect-portrait object-cover w-full h-full" src="<?php echo esc_url($image['url']);?>">
            </a></div>
        <?php } ?>
    
   
    
 
  
       
         <?php
	
	}

} else {
	// no posts found
}

?>
</div><!-- .grid -->
</div>
	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
