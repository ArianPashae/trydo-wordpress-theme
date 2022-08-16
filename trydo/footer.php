<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trydo
 */

?>
</main>
<!-- End Page Wrapper -->
<?php
$footer_layout 			= Helper::trydo_footer_layout();
$footer_area 			= $footer_layout['footer_area'];
$footer_style 			= $footer_layout['footer_style'];
if( "no" !== $footer_area && "0" !== $footer_area ){
    get_template_part('template-parts/footer/footer', $footer_style);
}
?>
</div>
<!-- End main page -->
<?php wp_footer(); ?>
</body>
</html>
