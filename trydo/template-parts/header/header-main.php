<?php
/**
 * Template part for displaying main header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trydo
 */
$trydo_options = Helper::trydo_get_options();
$header_layout = Helper::trydo_header_layout();
$header_area = $header_layout['header_area'];
$header_style = $header_layout['header_style'];


/**
 * Style Switcher
 */
if (isset($trydo_options['show_ld_switcher_form_user_end'])) {
    if ($trydo_options['show_ld_switcher_form_user_end'] === 'on' || $trydo_options['show_ld_switcher_form_user_end'] == 1) {
        ?>
        <div id="my_switcher" class="my_switcher">
            <ul>
                <li>
                    <a href="javascript: void(0);" data-theme="light" class="setColor light">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sun-01.svg" alt="Sun images">
                        <span title="Light Mode">Light</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" data-theme="dark" class="setColor dark">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/vector.svg" alt="Vector Images">
                        <span title="Dark Mode">Dark</span>
                    </a>
                </li>
            </ul>
        </div>
        <?php
    }
}

/**
 * Load Header
 */
if ("no" !== $header_area && "0" !== $header_area) {
    get_template_part('template-parts/header/header', $header_style);
}

/**
 * Load Page Title Wrapper
 */
get_template_part('template-parts/title/title-wrapper');

?>
<!-- Start Page Wrapper  -->
<main class="page-wrapper">


