<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package trydo
 */

$trydo_quote_author_name = rbt_get_acf_data('trydo_quote_author_name');
$trydo_quote_author = !empty($trydo_quote_author_name) ? $trydo_quote_author_name : get_the_author();
$trydo_quote_author_name_designation = rbt_get_acf_data('trydo_quote_author_name_designation');
?>
<!-- Start Single Blog  -->
<div id="post-<?php the_ID(); ?>" <?php post_class('trydo-blog-list quote-blog mt--50 mt_md--30 mt_sm--30 mt_lg--50'); ?>>
    <div class="blog-top">
        <blockquote>
            <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        </blockquote>
    </div>
</div>
<!-- End Single Blog  -->

