<?php
/**
 * The template for displaying all pages
 * 
 * Template Name: Map
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aurora-theme
 */
acf_form_head();
get_header();

?>

<main id="primary" class="site-main">
 
<?php
    // Ensure ACF is active
    if( function_exists('acf_form') ) {

        // Form settings
        $form_settings = array(
            'post_id'       => 'new_post',
            'new_post'      => array(
                'post_type'     => 'post',
                'post_status'   => 'pending' // Change to 'publish' if immediate publication is desired
            ),
            'fields'        => array('location_image'), // List your fields here
            'submit_value'  => __("Submit Your Entry", 'acf'),
            'updated_message' => __("Thank you for your submission!", 'acf'),
        );

        // Display the form
        acf_form($form_settings);

    } else {
        echo '<p>ACF plugin is not activated.</p>';
    }
    ?>
</main><!-- #main -->

<?php
get_footer();
?>
