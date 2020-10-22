<?php

/*
Template Name: Template for main page
Template Post Type: post, page, event
*/
get_header();

?>
    <div class="main-page-wrapper">
        <div class="individualny-zakaz-link">
            <a href="#"><?php echo wpm_translate_string( '[:ru]Индивидуальный заказ[:en]Upcycle it' ); ?></a>
            <div class="individualny-zakaz-link-arrow"></div>
        </div>

        <div class="welcome-screen mt-5">
            <div class="based">
                Kyiv based
            </div>
            <div class="studio w3-animate-left">
                studio
            </div>
            <div class="welcome-image">
				<?php echo do_shortcode( '[sp_wpcarousel id="77"]' ); ?>
            </div>
            <!--		<img src="https://i.picsum.photos/id/296/448/538.jpg?hmac=V7iUh2EzbdseybVZU1HLmR-TZybFoanKGunWqOFw8Yc" alt="">-->
            <div class="established">Established at 2018</div>

            <div class="oversized w3-animate-right">
                oversized
            </div>
            <div class="upcycle">Upcycle it</div>
            <div class="ellipse"></div>
            <div class="numbers">
                <div class="item">01</div>
                <div class="item item-2">02</div>
                <div class="item">03</div>
            </div>
        </div>
        <div class="upcycle-screen">
            <div class="container">

                <div class="row">
                    <div class="col-12 mt-lg-5 mt-xl-5 pt-lg-5 pt-xl-5 pt-3 mt-3 mb-5">
                        <h2 class='upcycle-title'>upcycle it</h2>
                        <div class="line"></div>
                    </div>
                </div>
                <div class="row mt-5">
					<?php
					//	            global $post;

					$myposts = get_posts( array(
						'posts_per_page' => 2,
						'post_type'      => 'ovbook',
//							'meta_key'       => 'ochki',
//							'orderby'        => 'meta_value_num',
						'order'          => 'ASC'
					) );
					if ( $myposts ) {
						foreach ( $myposts as $post ) :
							setup_postdata( $post );
							?>
                            <div class="col-lg-6 col-12 upcycle-home-left-image">
                                <a href="<?php echo wpm_translate_url( get_permalink( 342 ) ); ?>">
                                    <img class="upcycle-image" src="<?php the_post_thumbnail_url( '100%' ); ?> " alt="">
                                </a>
                            </div>
						<?php
						endforeach;
						wp_reset_postdata();
					}
					?>
                </div>
                <div class="row d-none d-xl-flex">
                    <div class="col-xl-6 text-right sustainable-text">sustainable</div>
                    <div class="col-xl-6 mt-2 text-right">
                        <!--                        <div class="arrow-right"></div>-->
                        <a href="<?php echo wpm_translate_url( get_permalink( 342 ) ); ?>">
                            <img class='right-arrow'
                                 src='https://theoversized.com/wp-content/themes/oversizedtemplate/assets/image/left-arrow.png'>
                            <!--                    <i class="fas fa-arrow-right fa-lg"></i>-->
                        </a>
                    </div>
                    <span class="sustainable"></span>
                </div>
                <div class="about-us-ellipse"></div>
                <!-- about us -->
                <div class="row mt-5 pt-5 about-us-div">
                    <div class="col-xl-7 col-12 aligncenter text-center">
                        <div class="about-us">
                            <h2><?php echo get_the_title( 81 ); ?></h2>
                            <div class="about-us-line"></div>
							<?php $content = get_post_field( 'post_content', 81 );
							echo $content ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- double collection -->
            <div class="container">
                <div class="row mt-5 pt-5">
                    <div class="col-xl-8 col-12 main-collections aligncenter text-center">
                        <div class="collection-link">
<!--                            <img src="--><?php //echo get_template_directory_uri() . '/assets/image/26_1.png' ?><!--" alt="">-->
                            <img src="/wp-content/uploads/2020/09/26_compressed.jpg" alt="">
                        </div>
                        <div class="collection-link-second-image">
                            <img src="<?php echo get_template_directory_uri() . '/assets/image/25 1-.jpg' ?>" alt="">
                        </div>
                        <div class="collection-line mt-4"></div>
                        <div class="collection-link-title">Upcycled collection</div>
                        <div class="row mt-5 mb-5 pt-5">
                            <div class="col-12 mb-5 pt-5">
                                <div class="link-to-catalog">
                                    <a href="<?php echo wpm_translate_url( get_permalink( 12 ) ); ?>"><?php echo get_the_title( 12 ); ?></a>
                                    <div class="arrow-right link-to-catalog-arrow"></div>
                                </div>
                                <div class="collection-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collection-circle"></div>
            <div class="collection-circle-line"></div>
        </div>
        <!--collection link to catalog-->
        <div class="container-fluid clear-collection m-0">
            <div class="row">
                <div class="col-12">
                    <img src="/wp-content/themes/oversizedtemplate/assets/image/collection-image.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-5 mt-xl-5 pt-lg-5 pt-xl-5 pt-3 mt-3 mb-5 pb-5">
                <div class="col-12">
                    <div class="we-create-wrapper">
                        <div class="we-create-first-line"></div>
                        we create beauty <br>from &nbsp;used&nbsp; clothes
                        <div class="we-create-second-line"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

<?php
get_footer();
?>