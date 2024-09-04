<?php
/**
 * Template part for displaying page content in home
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aurora-theme
 */

$theme_image = get_field('theme_image');
$theme_colour = get_field('theme_colour');
$video_popup = get_field('video_popup');

$video_oEmbed = $video_popup['video_oEmbed'] ?? '';
$video_title = $video_popup['title'] ?? '';
$popup_display = $video_popup['popup_display'] ?? false;

?>
<?php if ($popup_display && $video_oEmbed): ?>
    <div id="videoPopup" class="fixed inset-0 bg-black bg-opacity-75 z-50 flex items-center justify-center py-20 px-12">
    <button id="closePopup" class="absolute top-0 right-0 m-4 bg-black text-white p-4 rounded-full z-50"><?php get_template_part('template-parts/content', 'closesvg'); ?></button>
          
        <div class="relative h-full w-full max-w-4xl bg-black rounded-lg sm:h-auto">
            
         
                <?php echo $video_oEmbed; ?>
       
        </div>
    </div>
    <script>
     
        document.getElementById('closePopup').addEventListener('click', function() {
            var videoPopup = document.getElementById('videoPopup');
            videoPopup.style.display = 'none';
            var iframe = videoPopup.querySelector('iframe');
            var videoSrc = iframe.src;
            iframe.src = '';
            iframe.src = videoSrc;
        });
    </script>

<?php endif; ?>
  <div class="h-[80vh] xl:h-screen relative p-8 flex items-center justify-center">
<model-viewer id="heartModelViewer" class="w-full h-full" src="https://cdn1.umg3.net/1412-cdn/glb/Aurora_heart_GLB.glb"  ios-src="https://cdn1.umg3.net/1412-cdn/glb/Aurora_usdzSingle.usdz" ar ar-modes="webxr scene-viewer quick-look" camera-controls disable-zoom disable-pan tone-mapping="neutral"  shadow-intensity="0" exposure="1.25" environment-image="https://cdn1.umg3.net/1412-cdn/glb/HDR_Light.jpg" shadow-softness="0.53" autoplay>
<div slot="ar-button" class="absolute bottom-0 w-full flex items-center justify-center dark:text-darktext">
  <div class="mr-3">See the heart in AR</div> 
  <div>
  <svg id="Group_291" data-name="Group 291" xmlns="http://www.w3.org/2000/svg" width="30.427" height="35.14" viewBox="0 0 30.427 35.14" class="fill-current">
  <path id="Path_156" data-name="Path 156" d="M29.327,20.226a1.1,1.1,0,0,0-1.1,1.1V25.5l-3.24,1.778-.014.008a1.1,1.1,0,0,0,.558,2.048,1.113,1.113,0,0,0,.5-.12l4.4-2.412V21.326a1.1,1.1,0,0,0-1.1-1.1"/>
  <path id="Path_157" data-name="Path 157" d="M5.449,27.284,2.2,25.5v-4.18a1.1,1.1,0,0,0-2.2,0v5.49l4.391,2.4a1.1,1.1,0,0,0,.53.136h0a1.1,1.1,0,0,0,.528-2.065"/>
  <path id="Path_158" data-name="Path 158" d="M18.522,30.826l-2.191,1.2V29.27a1.1,1.1,0,0,0-1.1-1.1h-.018a1.1,1.1,0,0,0-1.1,1.1v2.756l-2.182-1.2a1.1,1.1,0,0,0-1.626.965V31.8a1.1,1.1,0,0,0,.571.965l4.34,2.378,4.34-2.374.022-.013a1.1,1.1,0,0,0-1.056-1.927"/>
  <path id="Path_159" data-name="Path 159" d="M19.606,14.483c-.01-.021-.02-.042-.031-.062a1.1,1.1,0,0,0-1.493-.438l-2.866,1.568-2.86-1.568-.022-.012A1.1,1.1,0,0,0,11.278,15.9l2.841,1.557v3.938a1.109,1.109,0,0,0,2.217,0V17.45l2.806-1.538a1.1,1.1,0,0,0,.467-1.43"/>
  <path id="Path_160" data-name="Path 160" d="M12.125,4.243l3.084-1.725,3.1,1.729a1.1,1.1,0,0,0,1.072-1.919L16.039.463,15.214,0,11.052,2.323l-.042.023a1.1,1.1,0,0,0,1.115,1.9"/>
  <path id="Path_161" data-name="Path 161" d="M6.037,7a1.1,1.1,0,0,0-1.1-1.1,1.112,1.112,0,0,0-.535.143L0,8.5V9.19l0,0v.631l.006,0v4.109a1.1,1.1,0,0,0,2.2,0V10.927l1.928,1.057L4.154,12a1.1,1.1,0,0,0,1.053-1.927L3.436,9.1,5.478,7.957A1.1,1.1,0,0,0,6.037,7"/>
  <path id="Path_162" data-name="Path 162" d="M30.427,9.184l-.008,0V8.5l-4.4-2.456a1.094,1.094,0,0,0-.536-.14h0a1.1,1.1,0,0,0-.536,2.059L26.985,9.1l-1.737.952c-.026.013-.052.027-.077.042A1.1,1.1,0,0,0,26.3,11.979l1.915-1.05v3.015a1.1,1.1,0,0,0,2.2,0V9.828l.008-.005Z"/>
</svg>


</div>
</div>
</model-viewer>
</div>
<section class="pb-8 px-4 md:px-7 md:pb-20">
    <iframe class="w-full aspect-video rounded-3xl" src="https://www.youtube.com/embed/Y1YTg6SEed8?si=oIM0pQMVMRxAX4zD" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </section>
  <section class="px-4 pb-4 md:px-7 md:pb-20" id="listen">
 
    <div class="bg-cover w-full h-full rounded-2xl md:rounded-3xl"
      <?php if( !empty( $theme_image ) ): ?>
        style="background-image: url('<?php echo esc_url($theme_image['url']); ?>');"
      <?php elseif( !empty( $theme_colour ) ): ?>
        style="background-color: <?php echo esc_attr($theme_colour); ?>;"
      <?php endif; ?>>

      <div class="relative">
      
        <?php
        $featured_release = get_field('featured_release');
        $featured_release_text = get_field('featured_release_text');

        if( $featured_release ): ?>
        <ul>
          <?php foreach( $featured_release as $post ): 
            setup_postdata($post);
            $title_image = get_field('title_image'); 
            $release_date = get_field('release_date');
            $currentDateTime = date('Ymd');
            $date = DateTime::createFromFormat('Ymd', $release_date);
            $link = get_field('link_to_order');
          ?>
          <li>
            <div class="pt-8">
              <h1 class="uppercase text-sm md:text-2xl lg:text-4xl xl:text-5xl">
                <?php if ($title_image && isset($title_image['url'])): ?>
                  <img class="w-full max-w-xl mx-auto" src="<?php echo esc_url($title_image['url']); ?>" alt="<?php echo esc_attr($title_image['alt']); ?>">
                <?php else: ?>
                  <?php the_title(); ?>
                <?php endif; ?>
              </h1>
              <div class="text-white"><?php echo $featured_release_text; ?></div>
              <div>
                <?php if( $link ): 
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                  <a class="button w-52 text-black py-4 uppercase text-xs mb-8 md:w-auto md:text-xl" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <?php echo ($date <= $currentDateTime) ? 'Listen' : 'Listen'; ?>
                  </a>
                <?php endif; ?>
              </div>
             
             
              <div id="mainPackshotWrapper" class="mx-auto px-12 inline-block mb-20">
                <?php the_post_thumbnail(); ?>
              </div>
            
           
             
            </div>
          </li>
          <?php endforeach; ?>
        </ul>
        <?php 
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata();
        
        endif; ?>
        
      </div>
    </div>

  </section>



<section class="pb-4 md:px-7 md:pb-20">
<?php get_template_part('template-parts/content', 'featured'); ?>
</section>
<section class="pl-4 pb-8 md:pl-7 md:pb-20">
<?php get_template_part('template-parts/content', 'about'); ?>
</section>

<section class="px-4 pb-4 md:px-7 md:pb-20" id="watch">
<?php get_template_part('template-parts/content', 'videogrid'); ?>
</section>
<section id="live" class="px-4 pb-4 md:px-7 md:pb-20">
<?php get_template_part('template-parts/content', 'gigs'); ?>
 </section>

 

