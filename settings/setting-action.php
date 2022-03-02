<?php
//header setup
if (!function_exists ('setup_header_before')){
    function setup_header_before(){
		echo get_template_part("settings/templates/hearder_before");
	}
}
add_action( 'header_before_content', 'setup_header_before' );

if (!function_exists ('setup_header_after')){
    function setup_header_after(){
		echo get_template_part("settings/templates/hearder_after");
	}
}
add_action( 'header_after_content', 'setup_header_after' );

//footer setup
if (!function_exists ('setup_footer_before')){
    function setup_footer_before(){
		echo get_template_part("settings/templates/footer_before");
	}
}
add_action( 'footer_before_content', 'setup_footer_before' );

if (!function_exists ('setup_footer_after')){
    function setup_footer_after(){
		echo get_template_part("settings/templates/footer_after");
	}
}
add_action( 'footer_after_content', 'setup_footer_after' );

//primary content
if (!function_exists ('setup_primary_before')){
    function setup_primary_before($class){
		echo apply_filters( 'get_primary_content_before', $class);
	}
}
add_action( 'primary_content_before_content', 'setup_primary_before' );

if (!function_exists ('setup_primary_after')){
    function setup_primary_after(){
		echo apply_filters( 'get_primary_content_after', 'end' );
	}
}
add_action( 'primary_content_after_content', 'setup_primary_after' );