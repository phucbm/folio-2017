<?php get_header(); ?>
<?php do_action( 'primary_content_before_content', '404-page' ); ?>
<?php echo get_field('404_page','option')?>
<?php do_action( 'primary_content_after_content' ); ?>
<?php get_footer(); ?>
