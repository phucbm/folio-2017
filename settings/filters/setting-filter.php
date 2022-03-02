<?php
/*-------------------------------------------------------
*			filter primary content before
*-------------------------------------------------------*/
if (!function_exists ('filter_primary_content_before')){
    function filter_primary_content_before( $class ) {
		$classname = ' '.$class; $tmp ='';
        $html = '';
        if(is_front_page()) {$tmp = '-home';}
		$html .= '<div id="primary'.$tmp.'" class="content-area'.$classname.'">';
			$html .= '<main id="content" class="main_content">';
				$html .= '<div class="page-content">';
        return $html;
    }
}
add_filter( 'get_primary_content_before', 'filter_primary_content_before' );

/*-------------------------------------------------------
*			filter primary content after
*-------------------------------------------------------*/
if (!function_exists ('filter_primary_content_after')){
    function filter_primary_content_after($class) {
        $html = '';
		$html .= '</div>';
		$html .= '</main>';
		$html .= '</div>';
        return $html;
    }
}
add_filter( 'get_primary_content_after', 'filter_primary_content_after' );
