<?php
/*
Template Name: Home
 */
get_header();
?>

<?php
/*********** CONTENT *************/
// Get all posts as a list
$args      = array(
	'posts_per_page' => - 1,
	'orderby'     => 'date',
	'order'       => 'DESC',
	'cat' => '-23'
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) :

	echo '<main id="list-content"><div class="container"><ul id="list-of-posts" class="content-padding">';

	$year_marker = '';
	while ( $the_query->have_posts() ) : $the_query->the_post();
		$title = get_the_title();
		$link  = get_the_permalink();
		if ( get_the_date( 'Y' ) != $year_marker ) {
			echo '<li class="year-item"><span class="sharp">#</span><span>' . get_the_date( 'Y' ) . '</span></li>';
			$year_marker = get_the_date( 'Y' );
		}
		?>
        <li class="post-item"><a href="<?php echo $link; ?>">- <?php echo $title; ?></a></li>
	<?php endwhile;

	echo '</ul></div></main>';

endif; ?>

<?php get_footer(); ?>
