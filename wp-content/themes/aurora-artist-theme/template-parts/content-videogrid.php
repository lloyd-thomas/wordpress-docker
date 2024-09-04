<div class="">
   <!-- <h1 class="mx-4 mb-4 text-left text-xl uppercase sm:text-center sm:mb-12 sm:text-4xl ">Videos</h1> -->


<div class="pb-8 w-full grid sm:grid-flow-col sm:grid-cols-4 sm:gap-8">
<?php
// Check rows existexists.
if( have_rows('featured_videos') ):

// Loop through rows.
while( have_rows('featured_videos') ) : the_row();

    // Load sub field value.
    
    // Do something...
    ?>
    <?php
$video = get_sub_field('video');
if( $video  ): ?>

<?php foreach( $video as $post ): 

    // Setup this post for WP functions (variable must be named $post).
    setup_postdata($post); ?>

       <?php 
       $image = get_field('video_placeholder_image');
       $video_url = get_field('video_embed');
       if( get_field('video_placeholder_image_format') == 'landscape' ) { ?>
        <div class="relative mb-4 sm:mb-0 sm:mx-0 sm:w-auto sm:col-span-2">
          <div class="absolute w-full h-full overflow-hidden pointer-events-none"></div>
         
          <a data-fancybox="video-gallery" href="<?php echo $video_url ?>">
              <img class="aspect-landscape object-cover w-full h-full rounded-2xl brightness-90 md:rounded-3xl" src="<?php echo esc_url($image['url']); ?>" /></a>
              <div class="absolute top-0 left-0 text-white uppercase text-sm font-demi-bold p-4 pointer-events-none"><?php the_title(); ?></div>
      </div>
      <?php }else{ ?>
          <div class="relative mb-4 sm:mb-0 sm:w-auto sm:col-span-2 sm:row-span-2  sm:mx-0 ">
          <div class="absolute w-full h-full overflow-hidden pointer-events-none"></div>
            
              <a data-fancybox="video-gallery" href="<?php echo $video_url ?>">
                  <img class="aspect-portrait object-cover w-full h-full rounded-2xl brightness-90 md:rounded-3xl" src="<?php echo esc_url($image['url']);?>"></a>
                  <div class="absolute top-0 left-0 text-white uppercase text-sm font-demi-bold p-4 pointer-events-none"><?php the_title(); ?></div>
        </div>
      <?php } ?>
     
<?php endforeach; ?>

<?php 
// Reset the global post object so that the rest of the page works correctly.
wp_reset_postdata(); ?>
<?php endif; ?>
<?php
// End loop.
endwhile;

// No value.
else :
// Do something...
endif;
?>
</div>

</div>