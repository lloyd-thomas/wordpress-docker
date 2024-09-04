<?php if (have_rows('featured_content')): ?>
    <div class="relative">
        <div class="pr-4 flex md:grid md:grid-cols-2 gap-8 snap-x snap-mandatory overflow-x-auto md:pr-0 md:overflow-x-hidden">
            <?php while (have_rows('featured_content')): the_row();
                $title = get_sub_field('title');
                $image = get_sub_field('image');
                $link = get_sub_field('link');
                ?>
                <div class="snap-start flex-shrink-0 w-5/6 md:w-auto">
                    <div class="relative">
                        <?php if ($image): ?>
                            <div class="relative pl-4 pt-4 md:p-0">
                                <a href="<?php echo esc_url($link['url']); ?>"><img class="w-full object-cover rounded-2xl md:rounded-3xl" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"></a>
                                <div class="absolute right-4 bottom-4">
                                   <a class="button-small text-white bg-white bg-opacity-40 flex items-center" href="<?php echo esc_url($link['url']); ?>"><div class="mr-2">LISTEN</div><div class="w-5"><?php get_template_part('template-parts/content', 'circleplus'); ?></div></a>
                                </div>
                        </div>
                        <?php endif; ?>
                        <div class="mt-2 text-left px-4 pb-4 md:p-0">
                            <?php if ($link): ?>
                                <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target'] ? $link['target'] : '_self'); ?>" class="text-sm font-semibold text-opacity-60 text-black dark:text-white">
                                    <?php echo esc_html($title); ?>
                                </a>
                            <?php else: ?>
                                <h2 class="text-sm font-semibold text-opacity-60 text-black dark:text-white"><?php echo esc_html($title); ?></h2>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>