<?php
/**
* The template part for displaying an Author biography
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package trydo
*/
$author_id = get_the_author_meta('ID');
$author_info = get_userdata(get_the_author_meta( 'ID' ));
$author_role = implode(', ', $author_info->roles);
?>
<div class="trydo-blog-author">
    <div class="author d-flex">
        <div class="author-thumb">
            <?php
            $trydo_author_bio_avatar_size = apply_filters( 'trydo_author_bio_avatar_size', 100 );
            echo get_avatar( get_the_author_meta( 'user_email' ), $trydo_author_bio_avatar_size );
            ?>
        </div>
        <div class="info">
            <h5 class="title"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ))); ?>"><?php echo get_the_author(); ?></a></h5>
            <?php
            if(get_the_author_meta( 'user_description' )){ ?>
                <p class="subtitle-2"><?php the_author_meta( 'user_description' ); ?></p>
            <?php }  ?>

            <?php if( have_rows('trydo_add_social_icons', 'user_'. $author_id) ): ?>
                <ul class="social-share justify-content-start">
                    <?php
                    while( have_rows('trydo_add_social_icons', 'user_'. $author_id) ): the_row();
                        $social_icon = get_sub_field('trydo_enter_social_icon_markup');
                        $social_link = get_sub_field('trydo_enter_social_icon_link');  ?>
                        <li><a href="<?php echo esc_url($social_link); ?>"><?php echo awescapeing($social_icon); ?></a></li> <?php
                    endwhile;
                    ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>