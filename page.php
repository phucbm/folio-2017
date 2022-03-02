<?php get_header(); ?>
    <main id="content" class="main_content">
        <div class="container">
            <div class="the-post content-padding">

                <div class="post-title"><h2><?php echo get_the_title(); ?></h2></div>

                <div class="post-content"><?php the_content(); ?></div>

				<?php get_fb_plugin( get_the_permalink() ); ?>

            </div>
        </div>
    </main>
<?php get_footer(); ?>