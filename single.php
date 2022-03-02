<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


	<?php
	// GET CONTENT
	$title = get_the_title();

	$content   = get_the_content();
	$date_t    = '<span class="hide-on-mobile"> - ' . get_the_time( 'h:m:s a' ) . '</span>';
	$date      = get_the_date( 'd' ) . ' Thg ' . get_the_date( 'm Y' ) . $date_t;
	$dura_read = get_read_duration( $content ) . ' phút đọc';

	$tags = array();
	foreach ( get_the_tags() as $tag ) {
		$tags[ $tag->name ] = get_tag_link( $tag->term_id );
	}

	$tag_container = '';
	if ( count( $tags ) > 0 ) {
		$tag_label = count( $tags ) > 1 ? 'Tags:' : 'Tag:';

		$tag_container .= '<ul class="tag-list">';
		$tag_container .= '<li class="tag-label">' . $tag_label . '</li>';

		foreach ( $tags as $name => $url ) {
			$tag_container .= '<li class="tag-item"><a href="' . $url . '">' . $name . '</a></li>';
		}

		$tag_container .= '</ul>';

	}

	?>

    <main id="content" class="main_content">
        <div class="container">
            <div class="the-post content-padding">

                <div class="post-title"><h2><?php echo $title; ?></h2></div>

                <div class="post-info">
                    <span class="publish-time"><?php echo $date; ?></span>
                    <span class="divider"></span>
                    <span class="duration-read"><?php echo $dura_read; ?></span>
                </div>

                <div class="post-content"><?php the_content(); ?></div>

                <div class="post-tags"> <?php echo $tag_container; ?> </div>

				<?php get_fb_plugin( get_the_permalink() ); ?>

            </div>
        </div>
    </main>

<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>