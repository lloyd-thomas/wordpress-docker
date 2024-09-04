<?php

/**
 * Template Name: Store
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 *  @package aurora-theme
 */

get_header();
?>

	<main id="primary" class="site-main text-center overflow-x-hidden">

	<div class="min-h-screen">
    <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			/* If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;*/

		endwhile; // End of the loop.
		?>

<div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
<?php

$cat_name = 'store';
$the_query = new WP_Query(array(
	'category_name' => $cat_name,
	'posts_per_page' => -1,
	//'meta_key' => 'date_of_release',
	//'orderby' => 'meta_value_num',
	'order' => 'DESC'
));

$my_ID = get_the_ID();
$string = "";
// The Loop
if ($the_query->have_posts()) {
		
	while ($the_query->have_posts()) {
		$the_query->the_post();  ?>
    <div>
    
    <a href="<?php echo get_field('link_to_store') ?>">
    <?php  the_post_thumbnail();
    ?>
    </a>
    
    <h1 class=""><?php the_title(); ?></h1>
  
        </div>
         <?php
	
	}

} else {
	// no posts found
}

?>
	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
