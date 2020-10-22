<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package oversizedtemplate
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
	                <?php
	                $postData = get_post_meta(get_the_ID());
	                $photos_query = $postData['gallery_data'][0];
	                if (!empty($photos_query)):
		                $photos_array = unserialize($photos_query);
		                $url_array = $photos_array['image_url'];
		                for (
			                $i = 0;
			                $i < count($url_array);
			                $i++
		                ) { ?>
                            <div id="photo" class="col-xl-6 col-12 mt-5">
                                <img class="img-fluid" src="<?php echo $url_array[$i]; ?>">
                            </div>
		                <?php } endif; ?>
                </div>
            </div>

        </div>
    </div>




    <div class="divider-xl"></div>

<?php
get_sidebar();
get_footer();
