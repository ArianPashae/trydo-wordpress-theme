<?php
/**
 * Template part for displaying portfolio template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trydo
 */

$terms = get_the_terms($post->ID, 'portfolio-cat');
$trydo_options = Helper::trydo_get_options();

?>
<div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--40">
    <div class="portfolio">
        <div class="thumbnail-inner">
            <div class="thumbnail image-1"
                 style="background-image: url(<?php the_post_thumbnail_url($settings['trydo-portfolio-thumb']); ?>)"></div>
            <div class="bg-blr-image image-1"
                 style="background-image: url(<?php the_post_thumbnail_url($settings['trydo-portfolio-thumb']); ?>)"></div>
        </div>
        <div class="content">
            <div class="inner">
                <?php if ($terms && !is_wp_error($terms)): ?>
                    <p><?php foreach ($terms as $term) { ?>
                            <span><?php echo esc_html($term->name); ?></span>
                        <?php } ?>
                    </p>
                <?php endif ?>
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <?php if ($trydo_options['trydo_enable_case_study_button'] == 'yes') { ?>
                    <div class="portfolio-button">
                        <a class="rn-btn"
                           href="<?php the_permalink(); ?>"><?php echo esc_html($trydo_options['trydo_enable_case_study_button_text']); ?></a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- End Single Portfolio  -->