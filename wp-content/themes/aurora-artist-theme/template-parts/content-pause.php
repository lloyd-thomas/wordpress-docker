<?php
/**
 * Template part for displaying page content in Pause
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package aurora-theme
 */

$theme_image = get_field('theme_image');
$theme_colour = get_field('theme_colour');
$video_popup = get_field('video_popup');

$video_oEmbed = $video_popup['video_oEmbed'] ?? '';
$video_title = $video_popup['title'] ?? '';
$popup_display = $video_popup['popup_display'] ?? false;
?>

<?php if (get_field('show_hero_section')): ?>
  <?php
    $video_url = get_field('hero_video_url');
    $image = get_field('hero_image');
    $heading = get_field('hero_heading');
    $subtext = get_field('hero_subtext');
    $secondary_heading = get_field('hero_secondary_heading');
    $countdown_date = get_field('hero_countdown');
    $cta_1 = get_field('hero_cta_1');
    $cta_2 = get_field('hero_cta_2');
    $overlay_color = get_field('hero_overlay_color') ?: '#405191';
  ?>

  <section class="relative md:px-4 md:px-7 mt-12 md:mt-20">
  <div class="w-full rounded-xl md:aspect-[16/9] rounded md:rounded-3xl md:overflow-hidden relative dark:text-white">
      <div class="hidden md:block">
        <div class="absolute inset-0 opacity-50 pointer-events-none z-10" style="background-color: <?php echo esc_attr($overlay_color); ?>;"></div>

        <?php if ($video_url): ?>
          <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay muted loop playsinline>
            <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
          </video>
        <?php elseif ($image): ?>
          <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="absolute top-0 left-0 w-full h-full object-cover" />
        <?php endif; ?>
      </div>

      <div class="relative z-10 md:text-white p-6 md:p-12 flex flex-col justify-center items-center text-center h-full">
        <?php if ($heading): ?>
          <h1 class="text-3xl md:text-5xl font-bold mb-4 aurora-font"><?php echo esc_html($heading); ?></h1>
        <?php endif; ?>
        <div class="block md:hidden w-full h-64 mt-6">
      <?php if ($video_url): ?>
        <video class="w-full h-full object-cover md:rounded-xl" autoplay muted loop playsinline>
          <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
        </video>
      <?php elseif ($image): ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="w-full h-full object-cover md:rounded-xl" />
      <?php endif; ?>
    </div>

        <?php if ($subtext): ?>
          <p class="text-base md:text-xl max-w-2xl mb-6"><?php echo wp_kses_post($subtext); ?></p>
        <?php endif; ?>

        <?php if ($secondary_heading): ?>
          <h2 class="text-lg md:text-2xl mb-4 aurora-font"><?php echo esc_html($secondary_heading); ?></h2>
        <?php endif; ?>

        <div id="countdown" class="flex gap-1 md:gap-6 justify-center items-end text-white text-center mt-8"></div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center ">
          <?php
          echo do_shortcode( '
          [ae-custom-form id=1 no_profile_link=true no_salutation=true]
          <div id="newsletter" class="m-auto">
  <button type="submit" class="button text-black py-4 uppercase text-xs my-4 md:w-auto md:text-xl inline-block">
    JOIN MAILING LIST FOR EARLY ACCESS
  </button>
          </div>
          [/ae-custom-form]   
          ' );
          ?>
          <?php if ($cta_2): ?>
            <a href="<?php echo esc_url($cta_2['url']); ?>" target="<?php echo esc_attr($cta_2['target'] ?: '_self'); ?>" class="bg-transparent border-2 border-white text-white font-bold py-3 px-6 rounded-full hover:bg-white hover:text-black transition">
              <?php echo esc_html($cta_2['title']); ?>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <?php if ($countdown_date): ?>
    <?php
    $site_timezone = new DateTimeZone('Europe/London');
    $countdown_datetime = DateTime::createFromFormat('d/m/Y g:i a', $countdown_date, $site_timezone);
    $countdown_iso = $countdown_datetime ? $countdown_datetime->format('c') : '';
    ?>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const countdownDate = new Date("<?php echo esc_js($countdown_iso); ?>").getTime();
        const countdownEl = document.getElementById("countdown");

        function updateCountdown() {
          const now = new Date().getTime();
          const distance = countdownDate - now;

          if (distance < 0) {
            countdownEl.innerHTML = `<div class="text-xl font-semibold"></div>`;
            return;
          }

          const days = Math.floor(distance / (1000 * 60 * 60 * 24));
          const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          const seconds = Math.floor((distance % (1000 * 60)) / 1000);

          const timeParts = [
            { label: 'Days', value: days },
            { label: 'Hours', value: hours },
            { label: 'Minutes', value: minutes },
            { label: 'Seconds', value: seconds },
          ];

          countdownEl.innerHTML = timeParts.map(part => {
            const digits = String(part.value).padStart(2, '0').split('');
            return `
              <div class="flex flex-col items-center">
                <div class="flex gap-1 mb-1">
                  ${digits.map(d => `
                    <div class="bg-black text-white text-2xl md:text-3xl font-bold w-8 h-8 md:w-12 md:h-12 flex items-center justify-center rounded-md shadow-inner ibm-plex">
                     ${d}
                    </div>
                  `).join('')}
                </div>
                <div class="text-[10px] md:text-xs uppercase tracking-widest">${part.label}</div>
              </div>
            `;
          }).join('');
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);
      });
    </script>
  <?php endif; ?>
<?php endif; ?>

<?php
// Additional second hero section
$hero_2_video = get_field('hero_2_video');
$hero_2_image = get_field('hero_2_fallback_image');
$hero_2_heading = get_field('hero_2_heading');
$hero_2_overlay = get_field('hero_2_overlay_color') ?: '#405191';
?>

<?php if ($hero_2_video || $hero_2_image): ?>
  <section class="relative px-4 md:px-7 mt-4 md:mt-8">
    <div class="w-full rounded-xl aspect-square md:aspect-[16/9] lg:rounded-3xl overflow-hidden relative">
      <div>
        <div class="absolute inset-0 opacity-10 pointer-events-none z-10" style="background-color: <?php echo esc_attr($hero_2_overlay); ?>;"></div>
        <?php if ($hero_2_video): ?>
          <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay muted loop playsinline>
            <source src="<?php echo esc_url($hero_2_video); ?>" type="video/mp4">
          </video>
        <?php elseif ($hero_2_image): ?>
          <img src="<?php echo esc_url($hero_2_image['url']); ?>" alt="<?php echo esc_attr($hero_2_image['alt']); ?>" class="absolute top-0 left-0 w-full h-full object-cover" />
        <?php endif; ?>
      </div>
      <div class="relative z-10 bg-black bg-opacity-40 text-white p-6 md:p-12 flex flex-col justify-center items-center text-center h-full">
        <div>
        <?php if ($hero_2_heading): ?>
          <h2 class="text-2xl md:text-5xl font-bold aurora-font mb-6"><?php echo esc_html($hero_2_heading); ?></h2>
        <?php endif; ?>
        <p class="text-base md:text-xl mb-6">Use the Pause player to find your favourite frame from a beautiful new 2025 version of Runaway.<br />
        From £60 - Fast global shipping  </p>

        <div class="flex justify-center">
            
        <?php
        echo do_shortcode( '
        [ae-custom-form id=1 no_profile_link=true no_salutation=true]
    <div class="flex justify-center w-full">
   <button type="submit" class="button text-black py-4 uppercase text-xs my-4 md:w-auto md:text-xl inline-block">
   REGISTER YOUR INTEREST
  </button>
</div>
        [/ae-custom-form]   
        ' );
        ?>
        </div>
      </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php
$block_1_bg        = get_field('block_1_bg_color') ?: '#E8E8E8';
$block_1_heading   = get_field('block_1_heading');
$block_1_sub       = get_field('block_1_subheading');
$block_1_content   = get_field('block_1_content');
$block_1_cta       = get_field('block_1_cta');
$block_2_video_url = get_field('block_2_video_url');
?>

<?php if ($block_1_heading || $block_1_content || $block_2_video_url): ?>
  <section class="px-4 md:px-7 mt-4 md:mt-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      
      <!-- Block 1: Background Color + Content -->
      <div class="rounded-xl lg:rounded-3xl overflow-hidden p-6 md:p-10 text-black" style="background-color: <?php echo esc_attr($block_1_bg); ?>;">
        <div class="flex flex-col justify-center h-full max-w-xl mx-auto aspect-square md:aspect-auto">
          <?php if ($block_1_heading): ?>
            <h2 class="text-2xl md:text-4xl font-bold aurora-font mb-3"><?php echo esc_html($block_1_heading); ?></h2>
          <?php endif; ?>

          <?php if ($block_1_sub): ?>
            <h3 class="text-lg md:text-xl font-medium mb-4"><?php echo esc_html($block_1_sub); ?></h3>
          <?php endif; ?>

          <?php if ($block_1_content): ?>
            <div class="prose max-w-none mb-6">
              <?php echo wp_kses_post($block_1_content); ?>
            </div>
          <?php endif; ?>
          <div class="flex justify-center">
          <?php
        echo do_shortcode( '
        [ae-custom-form id=1 no_profile_link=true no_salutation=true]
    <div class="flex justify-center w-full">
   <button type="submit" class="button text-black py-4 uppercase text-xs my-4 md:w-auto md:text-xl inline-block">
   REGISTER YOUR INTEREST
  </button>
</div>
        [/ae-custom-form]   
        ' );
        ?>
          <?php if ($block_1_cta): ?>
            <a href="<?php echo esc_url($block_1_cta['url']); ?>" target="<?php echo esc_attr($block_1_cta['target'] ?: '_self'); ?>" class="inline-block bg-black text-white py-3 px-6 rounded-full hover:bg-gray-800 transition font-bold text-sm uppercase tracking-wide">
              <?php echo esc_html($block_1_cta['title']); ?>
            </a>
          <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- Block 2: Video -->
      <div class="rounded-xl lg:rounded-3xl overflow-hidden relative aspect-square">
        <?php if ($block_2_video_url): ?>
          <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay muted loop playsinline>
            <source src="<?php echo esc_url($block_2_video_url); ?>" type="video/mp4">
          </video>
        <?php endif; ?>
      </div>

    </div>
  </section>
<?php endif; ?>

<?php
$gallery_heading = get_field('gallery_heading');
$gallery_items = get_field('gallery_items');
?>

<?php if ($gallery_heading || $gallery_items): ?>
  <section class="px-4 md:px-7 mt-4 md:mt-8">
    
    <?php if ($gallery_heading): ?>
      <div class="max-w-5xl mx-auto text-center mt-8 mb-4 md:mt-16">
      <h2 class="text-3xl md:text-5xl font-bold aurora-font text-black dark:text-white">
  <?php echo esc_html($gallery_heading); ?>
</h2>

      </div>
    <?php endif; ?>

    <?php if ($gallery_items): ?>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <?php foreach ($gallery_items as $index => $item): ?>
  <?php
    $img = $item['_image'];
    $title = $item['title'];
    $colSpan = ($index === 2) ? 'md:col-span-2' : '';
  ?>
  <div class="<?php echo esc_attr($colSpan); ?>">
    <div class="rounded-xl lg:rounded-3xl overflow-hidden mb-2">
      <?php if ($img): ?>
        <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" class="w-full h-full object-cover" />
      <?php endif; ?>
    </div>
    <?php if ($title): ?>
      <p class="text-center text-sm md:text-base font-medium dark:text-white "><?php echo esc_html($title); ?></p>
    <?php endif; ?>
  </div>
<?php endforeach; ?>
      </div>
    <?php endif; ?>
    <div class="mb-24 flex justify-center">
    <?php
          echo do_shortcode( '
          [ae-custom-form id=1 no_profile_link=true no_salutation=true]
          <div class="m-auto">
  <button type="submit" class="button text-black py-4 uppercase text-xs my-4 md:w-auto md:text-xl inline-block">
    JOIN MAILING LIST FOR EARLY ACCESS
  </button>
          </div>
          [/ae-custom-form]   
          ' );
          ?>
          </div>
  </section>
<?php endif; ?>



