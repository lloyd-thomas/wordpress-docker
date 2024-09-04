<?php

/**
 * Template Name: Releases
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 *  @package aurora-theme
 */

get_header();
?>

	<main id="primary" class="siteWidth site-main text-center m-auto ">

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
 <div class="px-4 mt-8 sm:px-7 sm:mt-32">
 <h1 class="text-left text-xl uppercase lg:text-center sm:mb-12 sm:text-4xl dark:text-cloudygrey ">Releases</h1>

 <div class="lg:grid lg:grid-cols-12 lg:gap-2 mb-24">

<?php

$cat_name = 'release';
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
	$i = 0;
	while ($the_query->have_posts()) {
		
		$the_query->the_post(); 
		
    	$release_date = get_field( 'release_date' ); 
		$date = DateTime::createFromFormat("F j, Y", $release_date);
		$link = get_field('link_to_order');
		$tracklist = get_field( 'tracklist' );
		$info = get_field( 'info' );
		
		
	?>
   
		
    			<div class="text-left pb-4 lg:pr-8  lg:col-span-1 font-demi-bold text-sm dark:text-cloudygrey"> <?php  if($release_date){echo $date->format('Y'); } ?> </div>
				<?php if($i%2 == 0){ ?>
				<div class="lg:flex lg:col-span-11 mb-24">
					<div class="thumbWrapper pb-8"><?php the_post_thumbnail(); ?></div>
					<div class="w-full lg:pl-12 2xl:pl-28 dark:text-cloudygrey"><h1 class="text-left uppercase font-demi-bold mb-4 lg:text-3xl"><?php the_title(); ?></h1>
						<div class="textBlock text-left mb-4">
							<div class="myText text-left">
							<?php echo $info; ?>
							</div>
							<!--<button class="readMore my-4">Read More...</button>-->
						</div>
						<div class="text-left font-demi-bold mb-8"><?php echo $tracklist ?></div>
						<div class="text-left">
						<?php if( $link ): 
							$link_url = $link['url'];
							$link_title = $link['title']; ?>
							<a class="button w-full  bg-darkbg text-white text-center   py-4 uppercase font-demi-bold tracking-widest text-xs lg:w-52" href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>
						</div>
					</div>
				</div>
				<?php } else { ?>
					<div class="flex flex-col lg:flex-row lg:col-span-11 mb-24">
					
					<div class="order-2 w-full lg:pr-12 2xl:pr-28 lg:order-1 dark:text-cloudygrey"><h1 class="text-left uppercase font-demi-bold mb-4 lg:text-3xl"><?php the_title(); ?></h1>
						<div class="textBlock text-left mb-4">
							<div class="myText text-left">
							<?php the_content(); ?>
							</div>
							<!--<button class="readMore my-4">Read More...</button>-->
						</div>
						<div class="text-left font-demi-bold mb-8"><?php echo $tracklist ?></div>
						<div class="text-left">
						<?php if( $link ): 
							$link_url = $link['url'];
							$link_title = $link['title']; ?>
							<a class="button w-full  bg-darkbg text-white text-center   py-4 uppercase font-demi-bold tracking-widest text-xs lg:w-52" href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>
						</div>
					</div>
					<div class="thumbWrapper order-1 pb-8 lg:order-2 "><?php the_post_thumbnail(); ?></div>
				</div>
				<?php } 
				$i ++; ?>
			
		
	<?php
	
	}

} else {
	// no posts found
}

?></div></div>
	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
