<?php
define('VC_ICON', get_template_directory_uri().'/images/vc-logo.png');
define('VC_CATEGORY', __( 'Đầu quắn\' elements', 'theme' ));

/***** Element Description: WebpageOverview *****/
// Element Class
class vcWebpageQuickview extends WPBakeryShortCode {
	// Element Init
	function __construct() {
		add_action( 'init', array( $this, 'vc_webpagequickview_mapping' ) );
		add_shortcode( 'vc_webpagequickview', array( $this, 'vc_webpagequickview_html' ) );
	}

	// Element Mapping
	public function vc_webpagequickview_mapping() {
		// Stop all if VC is not enabled
		if ( ! defined( 'WPB_VC_VERSION' ) ) { return; }

		// Map the block with vc_map()
		vc_map(
			array(
				'name'        => __( 'Webpage Screenshot', 'theme' ),
				'base'        => 'vc_webpagequickview',
				'description' => __( 'Show webpage screenshot with scrollbar.', 'theme' ),
				'category'    => VC_CATEGORY,
				'icon' => VC_ICON,
				'params'      => array(
					array(
						'type'        => 'textfield',
						'holder'      => 'h3',
						'class'       => '',
						'heading'     => __( 'Caption', 'theme' ),
						'param_name'  => 'caption',
						'description' => __( '', 'phucbm' )
					),
					array(
						'type'        => 'attach_image',
						'holder'      => 'div',
						'class'       => '',
						'heading'     => __( 'Choose web page', 'theme' ),
						'param_name'  => 'web_page',
						'description' => __( '', 'phucbm' )
					)
				)
			)
		);

	}

	// Element HTML
	public function vc_webpagequickview_html( $atts ) {
		// Params extraction
		$img = $atts['web_page'];
		$caption = $atts['caption'];

		$html = "";

		$html .= '<div class="webpage-overview">';

		$html .= '<div class="webpage-caption"><h3>'.$caption.'</h3></div>';

		$html .= '<div class="webpage-img">';
		$html .= '<img src="' . wp_get_attachment_image_src( $img, "img-large" )[0] . '" alt="' . $img . '"/>';
		$html .= '</div>';

		$html .= '</div>';

		return $html;
	}

} // End Element Class
// Element Class Init
new vcWebpageQuickview();

?>