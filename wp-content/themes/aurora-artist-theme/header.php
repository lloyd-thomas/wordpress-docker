<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aurora-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
</head>

<body <?php body_class('bg-[#E3DFDF] dark:bg-darkbg'); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
     

        <header id="masthead" class="site-header overflow-x-hidden">
            <nav id="site-navigation" class="fixed z-20 bg-darkbg opacity-0 transition ease-in-out top-0 pointer-events-none main-navigation w-screen h-full flex items-center dark:bg-darkbg">
                <div class="px-4 w-full">
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu-1',
                        'menu_id' => 'primary-menu',
                        'items_wrap' => '<ul id="%1$s" class="%2$s flex tracking-widest justify-center w-full flex-col uppercase text-white text-center">%3$s</ul>',
                    ));
                    ?>

                </div>
            </nav>

            <div id="secondaryNav" class="fixed top-0 z-30 w-full flex justify-between items-center">
                <div id="toggleWrapper" class="p-4 md:p-7">
                    <?php get_template_part('template-parts/content', 'toggle'); ?>
                </div>
                <div id="mobileLogoWrapper" class="flex-none w-auto">
                    <?php
                    if (function_exists('the_custom_logo')) {
                        the_custom_logo();
                    }
                    ?>
                </div>
                <div id="burger" class="openMenu cursor-pointer flex p-4 md:p-7 dark:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="15" viewBox="0 0 22 15" class="fill-current stroke-current">
                        <g data-name="Icon feather-menu" transform="translate(1 1)">
                            <path id="Path_4" data-name="Path 4" d="M4.5,18h20" transform="translate(-4.5 -11.5)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            <path id="Path_5" data-name="Path 5" d="M4.5,9h20" transform="translate(-4.5 -9)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            <path id="Path_6" data-name="Path 6" d="M4.5,27h20" transform="translate(-4.5 -14)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </g>
                    </svg>
                </div>
            </div>

            <div class="fixed top-0 right-0 z-30">
                <div id="closeMenuBtn" class="closeMenu cursor-pointer p-4 md:p-7 hidden text-white">
                <?php get_template_part('template-parts/content', 'closesvg'); ?>
                </div>
            </div>
           
        </header>
        <!-- #masthead -->
