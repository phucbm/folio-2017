<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<?php
$fb_appID = get_field('facebook_app_id', 'option');
$page_id = get_queried_object_id();

/*$post_thumbnail = '';
if ( has_post_thumbnail( $page_id ) ) :
	$image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'optional-size' );
	$post_thumbnail = $image_array[0];
else :
	$post_thumbnail = '';
endif;*/

$post_description = get_the_excerpt($page_id);

?>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="fb:app_id" content="<?php echo $fb_appID;?>" />
    <meta property="og:description" content="<?php echo $post_description;?>" />
    <title>
        <?php
            if(is_tag()){
	            $tag = get_queried_object();
	            $tag_title = $tag->slug;
	            echo 'Tag: '.$tag_title.' | '.get_bloginfo('name');
            }
            else {wp_title('|', true, 'right');}
        ?>
    </title>
    <?php wp_head(); ?>

    <?= get_field('gtm_head', 'option') ?>
</head>
<body <?php body_class(); ?>>
<?= get_field('gtm_body', 'option') ?>

<!------ FACEBOOK --------->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11&appId=507805842747161';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!------ END FACEBOOK --------->

<header class="main_header">
    <div data-base-url="<?php echo SITE_URL; ?>"></div>