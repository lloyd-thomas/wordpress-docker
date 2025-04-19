<div class="mt-12 mb-16 sm:mt-32">
    <h1 class="mx-4 text-left text-xl uppercase mb-4 sm:text-center sm:mb-12 sm:text-4xl dark:text-cloudygrey">Store</h1>
    <div class="carousel-store">
    <?php
    /* Store section */
    /* Store section */
    /* Store section  */


// Check rows existexists.
if( have_rows('featured_store_items') ):

// Loop through rows.
while( have_rows('featured_store_items') ) : the_row();

    // Load sub field value.
    
    // Do something...
    ?>
    <?php
$store_item = get_sub_field('store_item');
if( $store_item ): ?>

<?php foreach( $store_item as $post ): 

    // Setup this post for WP functions (variable must be named $post).
    setup_postdata($post); ?>
    <div>
        <?php the_post_thumbnail(); ?>
        <a class="dark:text-cloudygrey" href="<?php echo get_field('link_to_store'); ?>"><?php the_title(); ?></a>
     </div>
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
   </div><!-- carousel-store -->
   <div class="px-4">
   <a href="" class="mt-4 button w-full sm:w-52 bg-darkbg text-white   py-4 uppercase font-demi-bold tracking-widest text-xs sm:mt-16">Shop All</a>
</div></div>