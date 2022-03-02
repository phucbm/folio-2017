<?php
/*-------------------------------------------------------
*			Enable Menu in Theme
*-------------------------------------------------------*/
function theme_setup()
{
    register_nav_menu('primary', __('Navigation Menu', 'theme'));
    add_editor_style();
}
add_action('after_setup_theme', 'theme_setup');

/*-------------------------------------------------------
*			Disable admin bar in font-end
*-------------------------------------------------------*/
function my_function_admin_bar()
{
    return false;
}
add_filter('show_admin_bar', 'my_function_admin_bar');

/*-------------------------------------------------------
*			Breadrum
*-------------------------------------------------------*/
function custom_bcn_template_tags($replacements, $type, $id)
{
    if (count($type) == 1 && current($type) == 'home') {
        $replacements['%title%'] = __('Home', 'theme');
        $replacements['%htitle%'] = __('Home', 'theme');
        $replacements['%ftitle%'] = __('Home', 'theme');
        $replacements['%fhtitle%'] = __('Home', 'theme');
    }

    if (count($type) == 2 && $type[0] == 'search') {
        $replacements['%htitle%'] = sprintf(__('Results for %s', 'theme'), $replacements['%htitle%']);
        $replacements['%fhtitle%'] = sprintf(__('Results for %s', 'theme'), $replacements['%htitle%']);
    }


    return $replacements;
}
add_filter('bcn_template_tags', 'custom_bcn_template_tags', 10, 3);

/*-------------------------------------------------------
*			Change form submit to button
*-------------------------------------------------------*/
// filter the Gravity Forms button type
function form_submit_button( $button, $form ) {
    return "<button class='btn_w_bg' id='gform_submit_button_{$form['id']}'><span>{$form['button']['text']}</span></button>";
}
add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );

/*-------------------------------------------------------
*			Add slug body
*-------------------------------------------------------*/
function add_slug_body_class($classes)
{
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }

    return $classes;
}
add_filter('body_class', 'add_slug_body_class');

/*-------------------------------------------------------
*			Multi-languages: show in front-end
*-------------------------------------------------------*/
if (!function_exists ('show_language_selector')){
    function show_language_selector(){
        $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=code&order=asc' );
        if(!empty($languages)){
            echo '<ul class="lansel clearfix">';

            $html = '';
            foreach($languages as $l){
                if($l['active']) {
                    $html .= '<li><span>'.__($l['tag'], 'theme').'</span></li>';
                }
            }
            foreach($languages as $l){
                if(!$l['active']) {
                    $html .= '<li>';
                    $html .= '<a href="' . $l['url'] . '">';
                    $html .= '' . __($l['tag'], 'theme') . '';
                    $html .= '</a>';
                    $html .= '</li>';
                }
            }
            echo $html;
            echo '</ul>';
        }
    }
}

/*-------------------------------------------------------
*			Get Logo of Website
*-------------------------------------------------------*/
if (!function_exists ('show_logo')){
    function show_logo(){
        $html = '';
        $html .= '<a href="'.SITE_URL.'">';
	    $html .= '<img src="'.get_field("logo", "option").'" alt="'.get_bloginfo("name").' - '.get_bloginfo("description").'" title="Designed by ChinChin">';
        $html .= '</a>';
        echo $html;
    }
}

/*-------------------------------------------------------
*			Get Menu of Website
*-------------------------------------------------------*/
if (!function_exists ('show_menu_in_header')){
    function show_menu_in_header($menuname, $location="header"){
	    $html = '';
        if($location=="header"){
	        $html .= '<div class="btn_menu responsive_block"><span class="fa fa-bars"></span></div>';
        }

        if($location=="footer"){

        }
	    $html .= wp_nav_menu(array('menu' => $menuname, 'container_class' => 'menu-main-menu-container clearfix'));
        echo $html;
    }
}

/*-------------------------------------------------------
*			Get Banner of Website
*-------------------------------------------------------*/
if (!function_exists ('show_banner_in_header')){
    function show_banner_in_header(){
        $html = '';
        $html .= '<div class="banner-wrapper">';
        $img_banner = get_featured_image(get_the_ID());
        if(is_singular('post')){
            $img_banner = get_featured_image(get_option( 'page_for_posts' ));
        }
        if($img_banner == '') {
            $img_banner = get_field('default_banner', 'option');
        }
        if(is_front_page()) {
        } else {
            $html .= '<div class="page-banner" style="background-image: url('.$img_banner.');"><img src='.$img_banner.'></div>';
        }
        $html .= '</div>';
        echo $html;
    }
}

/*-------------------------------------------------------
*			Get Featured Image of Website
*-------------------------------------------------------*/
if (!function_exists ('get_featured_image')){
    function get_featured_image($ID, $tmp=''){
        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($ID), 'full');
        $img = $thumb[0];
        if($img == ''){
            if($tmp == '') {
                $img = get_field('banner_default', 'option');
            } else {
                $img = get_field('image_default', 'option');
            }
        }
        return $img;
    }
}

/*-------------------------------------------------------
*			Get Page Title of Website
*-------------------------------------------------------*/
if (!function_exists ('get_page_title_custom')){
    function get_page_title_custom(){
        $html = '';
        global $wp_query;
        $object = $wp_query->get_queried_object();
        $parent = $object->post_parent; // get parent
        $grand = get_post($parent)->post_parent; // get grandparent
        if(is_404()) {
            $html .= '<h1 class="page-title"><span>';
            $html .= __('404', 'theme');
            $html .= '</span></h1>';
        } elseif(is_singular('post')) {
            $html .= '<h2 class="page-title"><span>';
            $html .= get_the_title(get_option( 'page_for_posts' ));
            $html .= '</span></h2>';
        } else {
            $html .= '<h1 class="page-title"><span>'.get_the_title().'</span></h1>';
        }
        return $html;
    }
}

/*-------------------------------------------------------
*			Get Breadcrumbs of Website
*-------------------------------------------------------*/
if (!function_exists ('get_breadcrumbs_custom')){
    function get_breadcrumbs_custom(){
        $html = '';
        $html .= bcn_display();
        return $html;
    }
}
