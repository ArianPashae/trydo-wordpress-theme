<?php
/**
 * @author  Rainbow-Themes
 * @since   1.0
 * @version 1.0
 * @package trydo
 */

trait PostMeta
{
    // Post Meta
    public static function postmeta()
    {
        $trydo_options = Helper::trydo_get_options();
        ?>
        <div class="author">
            
            <div class="info">
                <ul class="blog-meta">
                    <?php
                    if ($trydo_options['trydo_show_post_author_meta'] != 'no') { ?>
                        <li><i data-feather="user"></i><?php the_author(); ?></li>
                    <?php } ?>
                    <?php if ($trydo_options['trydo_show_post_publish_date_meta'] !== 'no') { ?>
                        <li><i data-feather="clock"></i><?php echo get_the_time(get_option('date_format')); ?></li>
                    <?php } ?>
                    <?php if ($trydo_options['trydo_show_post_updated_date_meta'] !== 'no') { ?>
                        <li><i data-feather="edit"></i><?php echo the_modified_time(get_option('date_format')); ?></li>
                    <?php } ?>
                    <?php if ($trydo_options['trydo_show_post_reading_time_meta'] !== 'no') { ?>
                        <li><i data-feather="watch"></i><?php echo trydo_content_estimated_reading_time(get_the_content()); ?></li>
                    <?php } ?>
                    <?php if ($trydo_options['trydo_show_post_comments_meta'] !== 'no') { ?>
                        <li class="single-post-meta-comment"><i data-feather="message-circle"></i><?php comments_popup_link(esc_html__('No Comments', 'trydo'), esc_html__('1 Comment', 'trydo'), esc_html__('% Comments', 'trydo'), 'post-comment', esc_html__('Comments off', 'trydo')); ?></li>
                    <?php } ?>
                    <?php if (($trydo_options['trydo_show_post_categories_meta'] !== 'no') && has_category()) { ?>
                        <li class="single-post-meta-categories"><i data-feather="folder"></i><?php the_category(' '); ?></li>
                    <?php } ?>
                    <?php if (($trydo_options['trydo_show_post_tags_meta'] !== 'no') && has_tag()) { ?>
                        <li class="single-post-meta-tag"><i data-feather="tag"></i><?php the_tags(' ', ' '); ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php }


    // Single post meta
    public static function singlepostmeta()
    {
        $trydo_options = Helper::trydo_get_options();
        ?>
        <div class="author">
            <div class="info">
                <ul class="blog-meta d-flex justify-content-center align-items-center">
                    <?php if ($trydo_options['trydo_show_blog_details_publish_date_meta'] !== 'no') { ?>
                        <li><i data-feather="clock"></i><?php echo get_the_time(get_option('date_format')); ?></li>
                    <?php } ?>
                    <?php if ($trydo_options['trydo_show_blog_details_updated_date_meta'] !== 'no') { ?>
                        <li><i data-feather="edit"></i><?php echo the_modified_time(get_option('date_format')); ?></li>
                    <?php } ?>
                    <?php if ($trydo_options['trydo_show_blog_details_author_meta'] != 'no') { ?>
                        <li><i data-feather="user"></i><?php the_author(); ?></li>
                    <?php } ?>
                    <?php if ($trydo_options['trydo_show_blog_details_reading_time_meta'] !== 'no') { ?>
                        <li><i data-feather="watch"></i><?php echo trydo_content_estimated_reading_time(get_the_content()); ?></li>
                    <?php } ?>
                    <?php if ($trydo_options['trydo_show_blog_details_comments_meta'] !== 'no') { ?>
                        <li class="single-post-meta-comment"><i data-feather="message-circle"></i><?php comments_popup_link(esc_html__('No Comments', 'trydo'), esc_html__('1 Comment', 'trydo'), esc_html__('% Comments', 'trydo'), 'post-comment', esc_html__('Comments off', 'trydo')); ?></li>
                    <?php } ?>
                    <?php if (($trydo_options['trydo_show_blog_details_categories_meta'] !== 'no') && has_category()) { ?>
                        <li class="single-post-meta-categories"><i data-feather="folder"></i><?php the_category(' '); ?></li>
                    <?php } ?>
                    <?php if (($trydo_options['trydo_show_blog_details_tags_meta'] !== 'no') && has_tag()) { ?>
                        <li class="single-post-meta-tag"><i data-feather="tag"></i><?php the_tags(' ', ' '); ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php }

    public static function trydo_read_more()
    {
        $trydo_options = Helper::trydo_get_options();
        if ($trydo_options['trydo_enable_readmore_btn'] !== 'no') { ?>
            <a class="trydo-button btn-large btn-transparent" href="<?php the_permalink(); ?>"><span
                        class="button-text"><?php echo esc_html($trydo_options['trydo_readmore_text'], 'trydo') ?></span><span
                        class="button-icon"></span></a>
        <?php }
    }


}



