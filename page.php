<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package oversizedtemplate
 */

get_header();
?>

	<div id="primary" class="container">
        <div class="container">
            <div class="row mt-3">
                <div class="col-12 p-0">
<!--                    <div class="arrow-left"></div>-->
                    <a class="back-link" href="javascript:history.go(-1)"><img src="<?php echo get_template_directory_uri(); ?>/assets/image/left-arrow.png" alt=""> назад</a>
                </div>
            </div>
        </div>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</div><!-- #main -->

<?php
get_sidebar();
get_footer();
