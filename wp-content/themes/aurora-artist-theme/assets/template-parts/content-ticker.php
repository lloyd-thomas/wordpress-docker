<?php

$cat_name = 'news_ticker';
$the_query = new WP_Query(array(
    'category_name' => $cat_name,
    'posts_per_page' => -1,
    //'meta_key' => 'date_of_release',
    //'orderby' => 'meta_value_num',
    'order' => 'DESC'
));

$my_ID = get_the_ID();
$string = "";
// The Loop
if ($the_query->have_posts()) {
        
    while ($the_query->have_posts()) {
        $the_query->the_post();  ?>

                    <?php
    $rows = get_field('news_item');
if( $rows ) {
    echo '<div class="ticker-wrap"><div class="ticker">';
    foreach( $rows as $row ) {
        $title = $row['title'];
        $body = $row['body'];
        $date = $row['date'];
        echo '<div class="ticker__item">';
        echo  $date." ".$title." ".$body;
        echo '</div>';
    }
    echo '</div></div>';
}
    
?>
<?php

}

} else { ?>
no posts
<?php } ?>