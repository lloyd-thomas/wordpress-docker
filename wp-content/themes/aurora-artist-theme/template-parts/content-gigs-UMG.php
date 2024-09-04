<div class="bg-black rounded-2xl text-white w-full md:rounded-3xl md:py-32">

<table class="gigs uppercase border-spacing-2 text-xs md:text-base md:max-w-4xl md:m-auto">
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <?php
    // get gigs - and puts them in the desired order
    $posts = get_posts(array(
        'post_type' => 'umg_live',
        'posts_per_page' => -1,
        'meta_key' => 'gigdate',
        'orderby' => 'meta_value',
        'order' => 'ASC'
    ));

    if ($posts) {
        foreach ($posts as $post) {
            // get fields we want
            $date = date_create(get_field('gigdate'));
            $date = date_format($date, 'd F Y');
            $venue = get_field('gigvenue');
            $city = get_field('gigvenuecity');
            $country = get_field('gigvenuecountry');
            $tickets = get_field('gigticketlink');

            // output a table row
            echo "<tr>";
            echo "<td class='px-2 py-3 text-left md:px-4'>$date<br /> $venue</td>";
            echo "<td class='pr-2 py-3 md:pr-4'>$city, $country</td>";
            echo "<td class='py-3'><a class='button-ticket bg-gray-400' href='$tickets' target='_blank' rel='noopener noreferrer'>TICKETS</a></td>";
            echo "</tr>";
        }
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata();
    }
    ?>
</table>

</div>