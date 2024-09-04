<div id="subscribePopup" class="md:fixed right-0 bottom-0 p-4 md:p-7 w-full md:max-w-[340px] md:z-30">
    <div class="bg-darkbg text-white p-4 rounded-2xl md:rounded-3xl md:drop-shadow-xl ">
        <div id="closeSubscribePopup" class="hidden absolute top-0 right-0 p-4 md:block"><?php get_template_part('template-parts/content', 'closesvg'); ?></div>
<div class="mt-4">Never miss a beat 🫀<br />
Sign up to receive news and updates from AURORA.<br />

<?php
    echo do_shortcode( '
    [ae-custom-form id=1 no_profile_link=true no_salutation=true]
    <span id="newsletter">
    <div class="button-ticket my-4 bg-aurora_grey text-black">Subscribe</div>
    </span>
    [/ae-custom-form]   
    ' );
?>
</div>
</div>
</div>