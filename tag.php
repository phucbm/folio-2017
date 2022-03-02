<?php get_header(); ?>
<?php
$i = 0;
$tag = get_queried_object();
$tag_title = $tag->slug;
?>
<?php if ( have_posts() ) :

	echo '<main id="list-content"><div class="container"><ul id="list-of-posts" class="content-padding">';

	$year_marker = '';

	while ( have_posts() ) : the_post(); ?>

		<?php $title = get_the_title();
		$link        = get_the_permalink();
		if ( $i == 0 ) {
			echo '<li class="year-item"><span># Tag:' . $tag_title . '</span></li>';
		}
		$i++;
		?>
        <li class="post-item"><a href="<?php echo $link; ?>">- <?php echo $title; ?></a></li>

	<?php

	endwhile;

	echo '</ul></div></main>';

endif; ?>
<?php get_footer(); ?>