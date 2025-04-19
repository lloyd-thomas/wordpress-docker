
<?php
// Get the group field
$about = get_field('about_content');

if ($about):
    // Get the individual sub-fields
    $background_video = $about['background_video'];
    $background_image = $about['background_image'];
    $background_colour = $about['background_colour'];
    $title = $about['title'];
    $content = $about['content'];
?>

    <div class="bg-cover w-full relative overflow-hidden rounded-l-2xl sm:rounded-l-3xl">

<div class="relative w-full h-full min-h-[80vh] md:pt-32 md:pb-[600px]" style="background-color: <?php echo esc_attr($background_colour); ?>;">
    <?php if ($background_video): ?>
        <video autoplay muted loop class="absolute top-1/2 left-1/2 min-w-full min-h-full w-auto h-auto transform -translate-x-2/3 -translate-y-1/2 z-0">
            <source src="<?php echo esc_url($background_video); ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    <?php elseif ($background_image): ?>
        <div class="hidden absolute top-1/2 left-1/2 min-w-full min-h-full w-auto h-auto transform -translate-x-[38%] -translate-y-[46%] z-0 md:block " style="background-image: url('<?php echo esc_url($background_image['url']); ?>'); background-size: cover; background-position: center;"></div>
    <?php endif; ?>

    <div class="relative z-10 pt-12 text-black leading-loose text-left max-w-2xl mx-auto md:leading-8 md:text-xl md:px-7 ">
        <!--
        <?php if ($title): ?>
            <h1 class="text-3xl font-bold mb-4"><?php echo esc_html($title); ?></h1>
        <?php endif; ?>

        -->

        <?php if ($content): ?>
            <div class="prose px-8">
                <?php echo $content; // WYSIWYG content can contain HTML ?>
            </div>
        <?php endif; ?>
        <?php if ($background_image): ?>
            <div class="relative h-[60vh] md:hidden -z-10">
                <div class="absolute -right-4 bottom-0 w-full aspect-[3/4] " style="background-image: url('<?php echo esc_url($background_image['url']); ?>'); background-size: cover; background-position: center;"></div>
        </div>
   
                <?php endif; ?>
    </div>
    </div>


<?php endif; ?>
