<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aurora-theme
 */

?>
<?php get_template_part( 'template-parts/content', 'newsletter' );?>
<footer id="colophon" class="site-footer"> 

<?php get_template_part( 'template-parts/content', 'socialtext' ); ?>
<?php get_template_part( 'template-parts/content', 'legal' ); ?>
<?php get_template_part( 'template-parts/content', 'labels' ); ?>

   
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>

<script>
        var umgCookieParams = {
            bannerPos: 'bottom',
        }
    </script>


    <script src="https://www.umusic.co.uk/cookies.js"></script>

</body>
</html>
