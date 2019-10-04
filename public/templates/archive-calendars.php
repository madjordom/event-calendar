<?php
get_header();

add_filter( 'get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});
?>
	
<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	<div class="entry-content">
<?php 
the_archive_title( '<h1 class="page-title">', '</h1>' );

$args = array(  
        'post_type' => 'event',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
        'orderby' => 'title', 
        'order' => 'ASC',
        'cat' => 'calendars',
    );

    $loop = new WP_Query( $args ); 
    echo '<table style="border:none;">';    
    while ( $loop->have_posts() ) : $loop->the_post();
		$country_term = get_terms('countrys');
		if ($country_term !='') {foreach ($country_term as $country_terms) {$countrys .= $country_terms->name.', ';}}
        echo '' . '<tr style="border:none !important;"><td style="width:200px; border:none !important;">' . get_field('event_date') . '</td><td style="border:none !important;">' . get_the_title().' - ' .$countrys .get_field('event_town'). '</td></tr>' ;
		$countrys ='';
    endwhile;
	echo '</table>';
    wp_reset_postdata();?>
	</div>
	</main><!-- .site-main -->
</section><!-- .content-area -->
<?php get_footer(); ?>