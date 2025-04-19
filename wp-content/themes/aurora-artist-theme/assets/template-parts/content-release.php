<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aurora-theme
 */



?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="text-2xl entry-title">', '</h1>' ); ?>





	</header><!-- .entry-header -->
	<div class="mb-8"><h1 class="underline">Link to Order</h1>
	<?php 
            $release_date = get_field( 'release_date' ); ?>
             Release Date: <?php echo $release_date ?> <br />
            <?php
            // Link to Pre-order - or shop
            $currentDateTime = date('Ymd');
            $date = DateTime::createFromFormat('Ymd', $release_date);
            $link = get_field('link_to_order');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                
                //
                if($date <= $currentDateTime) { ?>
                <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">Pre-Order</a>
           <?php }else{ ?>
            <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">Shop</a>
            <?php }?>
                
            <?php endif; ?>
	
	<div class="mb-8"><h1 class="underline">Link to Streaming Platforms</h1>
	<?php
    // Check rows existexists.
if( have_rows('link_to_stream_repeater') ):

    // Loop through rows.
    while( have_rows('link_to_stream_repeater') ) : the_row();

        // Load sub field value. ?>
         <a href="<?php echo get_sub_field('streaming_platform_link');?>">
		 <?php echo get_sub_field('streaming_platform');?>
		</a>
		<?php
        // Do something...
	endwhile;

	// No value.
	else :
		// Do something...
	endif;
	?>

</div>

	<?php aurora_wordpress_post_thumbnail(); ?>

	<div class="entry-content">
		 <div class="mb-8">
		<?php the_content();?>
</div>
		 <div class="mb-8"><h1 class="underline">Tracklist</h1>
		<?php
		echo get_field('tracklist');
		
		?>
		</div>
		<h1 class="text-4xl box box1">Store</h1>
        <div class="carousel-store">
		<?php
$store_items = get_field('store_items');
if( $store_items ): ?>

    <?php foreach( $store_items as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>
        <div>
           
            <?php the_post_thumbnail(); ?>
            <a href="<?php echo get_field('link_to_store'); ?>"><?php the_title(); ?></a>
         </div>
    <?php endforeach; ?>
    
    <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php endif; ?>
	</div> <!--- .carousel-store -->

		 <div class="mb-8"><h1 class="underline">Video</h1>
    <div class="grid grid-cols-4 gap-8">
        <?php
$video = get_field('video');
if( $video  ): ?>

    <?php foreach( $video as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>
  
           <?php 
           $image = get_field('video_placeholder_image');
           $video_url = get_field('video_embed');
           if( get_field('video_placeholder_image_format') == 'landscape' ) { ?>
              <div class="col-span-2 relative">
                <div class="absolute top-0 left-0"><?php the_title(); ?></div>
                <a data-fancybox="video-gallery" href="<?php echo $video_url ?>">
                    <img class="aspect-landscape object-cover w-full h-full" src="<?php echo esc_url($image['url']); ?>" /></a>
            </div>
            <?php }else{ ?>
                <div class="col-span-2 row-span-2 relative">
                    <div class="absolute top-0 left-0"><?php the_title(); ?></div>
                    <a data-fancybox="video-gallery" href="<?php echo $video_url ?>">
                        <img class="aspect-portrait object-cover w-full h-full" src="<?php echo esc_url($image['url']); ?>">
                </a></div>
            <?php } ?>
         
    <?php endforeach; ?>
    
    <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
<?php endif; ?>


				</div><!-- .grid -->
			</div>
	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->
