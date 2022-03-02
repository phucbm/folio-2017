<?php do_action( 'footer_before_content' ); ?>

    <div class="container"><div class="footer-inner">

    <div class="social-icons">
		<?php
		$icons = get_field( 'social_icons', 'option' );
		foreach ( $icons as $item ) {
			echo '<a href="' . $item['item']['url'] . '" target="_blank">' . $item['item']['icon'] . '</a>';
		} ?>
    </div>
            
    <div class="copyright">
		<?php echo get_field( 'copyright', 'option' ); ?>
    </div>

    <div class="creative-commons">
        <a href="https://creativecommons.org/licenses/by-nc-nd/4.0/" target="_blank">
            <img src="<?php echo THEME_URL; ?>/images/creativecommons.png">
        </a>
    </div>

    </div></div>

<?php do_action( 'footer_after_content' ); ?>