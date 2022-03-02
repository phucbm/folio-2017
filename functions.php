<?php
define( 'SITE_URL', get_site_url() );
define( 'THEME_URL', get_template_directory_uri() );
define( 'THEME_PATH', get_template_directory() );
define( 'THEME_NAME', get_bloginfo( 'name' ) );

/*-------------------------------------------------------
*			Settings add_filter && add_action
*           this two files are used to add wrappers for primary content,
*           and to initial header and footer.
*-------------------------------------------------------*/
include_once( "settings/filters/setting-filter.php" );
include_once( "settings/actions/setting-action.php" );

/*-------------------------------------------------------
*			Main function
*-------------------------------------------------------*/
include_once( "settings/functions/main-func.php" );

/*-------------------------------------------------------
*			Visual Composer Custom
*-------------------------------------------------------*/
if ( ! function_exists( 'is_plugin_active' ) ) {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
$load_vc_map = is_plugin_active( 'js_composer/js_composer.php' );

if ( function_exists( 'acf_add_options_page' ) ) {
	/*add & set name for option menu*/
	acf_add_options_page( array(
		'page_title' => 'PhucBM options',
		'menu_title' => 'PhucBM options',
		'menu_slug'  => 'theme-general-settings'
	) );

	acf_add_options_sub_page( array(
		'page_title'  => 'General options',
		'menu_title'  => 'General options',
		'parent_slug' => 'theme-general-settings',
	) );
	acf_add_options_sub_page( array(
		'page_title'  => '404',
		'menu_title'  => '404',
		'parent_slug' => 'theme-general-settings',
	) );
}

function theme_scripts() {
	// typography
	wp_register_style( 'style-typo', THEME_URL . '/css/typography.css', false, '1.0.0', 'all' );

	//css
	wp_enqueue_style( 'style-editor', THEME_URL . '/editor-style.css', false, '1.0.0', 'all' );
	wp_enqueue_style( 'style-skeleton', THEME_URL . '/css/skeleton.css', false, '1.0.0', 'all' );
	wp_enqueue_style( 'style-layout', THEME_URL . '/css/style.css', false, '1.0.0', 'all' );
	wp_enqueue_style( 'style-responsive', THEME_URL . '/css/responsive.css', false, '1.0.0', 'all' );
	wp_enqueue_style( 'style-font-awesome', THEME_URL . '/css/font-awesome.min.css', false, '1.0.0', 'all' );
	wp_enqueue_style( 'style-slick', THEME_URL . '/css/slick.css', false, '1.0.0', 'all' );
	wp_enqueue_style( 'style-slick-theme', THEME_URL . '/css/slick-theme.css', false, '1.0.0', 'all' );
	wp_enqueue_style( 'style-modal', THEME_URL . '/css/jquery.mCustomScrollbar.css', false, '1.0.0', 'all' );

	//js
	wp_enqueue_script( 'script-modal', THEME_URL . '/js/jquery.mCustomScrollbar.concat.min.js', array( 'jquery' ), '1.0.0', false );
	wp_enqueue_script( 'script-slick', THEME_URL . '/js/slick.js', array( 'jquery' ), '1.0.0', false );
	wp_enqueue_script( 'script-tilt', THEME_URL . '/js/tilt.jquery.js', array( 'jquery' ), '1.0.0', false );
	wp_enqueue_script( 'script-theme', THEME_URL . '/js/theme.js', array( 'jquery' ), '1.0.0', false );
}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );

// Before VC Init
add_action( 'vc_before_init', 'vc_before_init_actions' );
function vc_before_init_actions() {
	// Require new custom Element
	include_once('vc-elements/vc-element.php');
}

/**** print object - for testing only ****/
function purinto( $obj ) {
	echo '<pre>';
	print_r( $obj );
	echo '</pre>';
}

/********** count duration read ************/
function get_read_duration( $str ) {
	$word_count        = str_word_count( $str );
	$averageWPM        = get_field( 'average_wpm', 'option' );
	$estimate_duration = $word_count / $averageWPM;

	return round( $estimate_duration );
}

/********* load Bootstrap ************/
function get_bootstrap() {
	$ref = '';

	$ref .= '<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>';

	$ref .= '<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>';


	echo $ref;
}

/********* facebook plugin **********/
function get_fb_plugin( $url, $option='' ) {
	$fb = '';
	$fb .= '<div class="interaction-section"><div class="inner"><div class="like-share">';
	$fb .= '<div class="fb-like" data-href="'.$url.'" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div></div>';

	if( $option != 'no-comment' ){
		$fb .= '<div class="comment-section">';
		$fb .= '<div class="fb-comments" data-href = "'.$url.'" data-numposts = "5" data-width="100%"></div > ';
		$fb .= '</div >';
	}

	$fb .= '</div></div>';
	echo $fb;
}