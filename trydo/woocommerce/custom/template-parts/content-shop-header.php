<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package trydo
 */
$rbt_options = Helper::trydo_get_options();
$trydo_shop_wrapper_class = ($rbt_options['wc_general_sidebar'] === 'no') || !is_active_sidebar( 'sidebar-shop' ) ? 'col-12':'col-lg-8 col-md-12 col-12';
?>
<div class="trydo-container rn-section-gap">
	<div class="container">
		<div class="row row--25">
            <!-- Left Sidebar here-->

            <?php if ( is_active_sidebar( 'sidebar-shop' ) && $rbt_options['wc_general_sidebar'] == 'left') { ?>
                <div class="col-lg-4 col-md-12 col-12 mt_md--40 mt_sm--40">
                    <?php dynamic_sidebar('sidebar-shop'); ?>
                </div>
            <?php } ?>

			<div class="<?php echo esc_attr($trydo_shop_wrapper_class); ?>">
				<div class="trydo-container-content">