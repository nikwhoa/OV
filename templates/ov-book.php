<?php

/*
Template Name: Template for general ov book page
Template Post Type: post, page, event
*/
get_header();

?>
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <!--                    <div class="arrow-left"></div>-->
                <a class="back-link" href="javascript:history.go(-1)"><img src="<?php echo get_template_directory_uri(); ?>/assets/image/left-arrow.png" alt=""> назад</a>

            </div>
        </div>
    </div>
    <div class="main-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="post-<?php the_ID(); ?>" <?php post_class( 'row mt-4' ); ?>>
                        <div class="col-12 entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                        </div><!-- .entry-header -->
                    </div>
                </div>
                <div class="row">
	                    <?php
	                    //	            global $post;

	                    $myposts = get_posts( array(
		                    'posts_per_page' => -1,
		                    'post_type'      => 'ovbook',
//							'meta_key'       => 'ochki',
//							'orderby'        => 'meta_value_num',
		                    'order'          => 'ASC'
	                    ) );
	                    if ( $myposts ) {
		                    foreach ( $myposts as $post ) :
			                    setup_postdata( $post );
			                    ?>
                                <div class="col-lg-4 mt-5 col-12 upcycle-home-left-image">
                                    <a href="<?php the_permalink(); ?>" class="ov-book-general-photo">
                                        <img class="upcycle-image" src="<?php the_post_thumbnail_url( '100%' ); ?> " alt="">
                                    </a>
                                </div>
		                    <?php
		                    endforeach;
		                    wp_reset_postdata();
	                    }
	                    ?>
                </div>
            </div>

        </div>
    </div>
<div class="divider-xl"></div>
<?php
get_footer();
?>