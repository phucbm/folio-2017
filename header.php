<?php do_action( 'header_before_content' ); ?>
<?php
$header_title = get_field( 'header_title', 'option' );
$intro        = get_field( 'intro', 'option' );
?>

    <div class="container">

        <div class="header-inner">

            <h1 class="header-title"><?php echo $header_title; ?></h1>

            <div class="header-logo">
				<?php show_logo(); ?>
            </div>

            <div class="header-intro">
				<?php echo $intro; ?>
            </div>
            
        </div>
    </div>

<?php do_action( 'header_after_content' ); ?>