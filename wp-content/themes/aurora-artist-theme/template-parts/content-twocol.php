<div class="sm:grid sm:grid-flow-col sm:cols-2">
<?php
$block_one = get_field('two_column_call_to_action_block_one');
if( $block_one ): ?>
    <div class="relative">
        <div class="absolute w-full h-full overflow-hidden noisewrapper pointer-events-none"></div>
        <div class="absolute w-full h-full flex items-center justify-center">
            <div>
            <div class="text-white uppercase mb-4 font-demi-bold tracking-widest sm:text-xl"><?php echo esc_html( $block_one['column_title'] ); ?></div>
            <a data-fancybox="video1" href="<?php echo $block_one['column_link']['url'] ?>" class="button w-52 block bg-darkbg text-white   py-4 uppercase font-demi-bold tracking-widest text-xs"><?php echo esc_html( $block_one['column_button_text'] ); ?></a>
            </div>
        </div>

        <img class="aspect-landscape object-cover w-full h-full" src="<?php echo $block_one['column_image']['url'] ?>" />
    </div>
    <?php endif; ?>
<?php
$block_two= get_field('two_column_call_to_action_block_two');
if( $block_two ): ?>
      <div class="relative">
      <div class="absolute w-full h-full overflow-hidden noisewrapper pointer-events-none"></div>
      <div class="absolute w-full h-full flex items-center justify-center">
            <div>
            <div class="text-white uppercase mb-4 font-demi-bold tracking-widest sm:text-xl"><?php echo esc_html( $block_two['column_title'] ); ?></div>
            <a data-fancybox="video2" href="<?php echo $block_two['column_link']['url'] ?>" class="button w-52 block bg-darkbg text-white   py-4 uppercase font-demi-bold tracking-widest text-xs"><?php echo esc_html( $block_two['column_button_text'] ); ?></a>
            </div>
        </div>

       <a data-fancybox="video-gallery" href="<?php echo $block_two['column_link']['url'] ?>"><img class="aspect-landscape object-cover w-full h-full" src="<?php echo $block_two['column_image']['url'] ?>" /></a>
   </div>
    
<?php endif; ?>
</div>