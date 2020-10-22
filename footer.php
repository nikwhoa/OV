<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package oversizedtemplate
 */

?>
<footer>
    <div class="container">
	<div class="row">
        <div class="col-xl-6">
        <?php
	$menuParameters = array(
		'container'       => 'div',
		'echo'            => false,
		'container_class' => 'nav footer-nav',
//		'container_id'    => 'qqmyDropdown',
		'items_wrap'      => '%3$s',
		'depth'           => 0,
	);

	echo strip_tags( wp_nav_menu( $menuParameters ), '<div><a>' );
	?>
        </div>
        <div class="col-xl-6 text-right">
            <div class="nav footer-nav social-links">
                <a href="https://www.instagram.com/oversized_studio">instagram</a>
                <a href="<?php echo wpm_translate_url( get_permalink( 342 ) ); ?>">OVERSIZED BOOK</a>
<!--                <a href="/ov-books">OV BOOK</a>-->
            </div>

        </div>
    </div>
    </div>
</footer>
<div class="container">
    <div class="row pt-5 copyright">
        <div class="col-12 text-center">
            <div class="visa-mastercard mb-4">
                <img src="<?php echo get_template_directory_uri() . '/assets/image/visa-mastercard.png' ?>" alt="">
            </div>
            OVERSIZED — 2020
        </div>
    </div>
</div>
</div> <!-- container wrapper is ending -->
<?php wp_footer(); ?>
<script>
    // let photoNumbers = document.getElementsByClassName('flex-control-nav');
    // let activePhoto = document.getElementsByClassName('flex-active');
    // // photoNumbers[0].children[1].style.display = 'none';
    // // debugger
    // function f() {
    //     photoNumbers[0].children[0].style.display = 'none';
    //     photoNumbers[0].children[1].style.display = 'none';
    //     photoNumbers[0].children[2].style.display = 'none';
    //     activePhoto[0].style.display = 'block';
    // }
    // // setTimeout(f, 5000);
    // window.onload = f;
    // let photoNumbers = document.getElementsByClassName('flex-control-nav');
</script>
</body>
</html>
