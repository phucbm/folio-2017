<?php
/*
Template Name: iLixi Project
Template Post Type: post
 */
?>

<?php
// get background
$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');

// get slider
$slider = get_field( 'ilixi_slider', $post->ID );

// get info link
$info = get_field( 'ilixi_info', $post->ID );
$info_txt = $info['text'];
$info_url = $info['url'];

?>

<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <main id="content" class="main_content ilixi" style='background-image: url("<?php echo $featured_img_url;?>")'>
        <div class="container">
            <div class="inner-content content-padding">

                <!-- navigate cursor -->
                <div id="cursor"><div class="pointer"></div></div>

                <!-- navigate cursor -->
                <div id="info-link"><a href="<?php echo $info_url;?>"><?php echo $info_txt;?></a></div>

                <div class="ilixi-slider">
                    <div class="ilixi-slider-inner">
                        <!-- loop begin -->
						<?php foreach ( $slider as $key => $slide ) {
							$slide_item = $slide['slide_item'];
							$is_has_title = $slide_item['is_has_title'] ? '' : 'hidden';
							$title = $slide_item['title'];
							$img = $slide_item['image'];
							$txt = $slide_item['text'];
							?>
                            <div class="slide-item">
                                <div class="slide-item-inner">
                                    <div class="slide-title <?php echo $is_has_title;?>"><h3><?php echo $title;?></h3></div>
                                    <div class="slide-image" style='background-image: url("<?php echo $img;?>")'>
                                        <img src="<?php echo $img;?>" alt="<?php echo $title.'-thumbnail';?>">
                                    </div>
                                    <div class="slide-text"><?php echo $txt;?></div>
                                </div>
                            </div>
						<?php } ?>
                        <!-- loop end -->
                    </div>
                </div>

	            <?php get_fb_plugin( get_the_permalink(), 'no-comment' ); ?>

            </div>
        </div>
    </main>
<?php endwhile; ?>
<?php get_footer(); ?>
