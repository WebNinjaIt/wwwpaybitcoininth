<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post;
?>

<?php do_action( 'wp_realestate_before_agency_content', $post->ID ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="agency-grid agency-item">
        <?php if ( has_post_thumbnail() ) { ?>
            <div class="top-info">
                <div class="member-thumbnail-wrapper flex-middle justify-content-center">
                    <?php homeo_agency_display_image($post,'medium'); ?>
                    
                </div>
            </div>
        <?php } ?>
        <div class="agency-information">
            
            <?php the_title( sprintf( '<h2 class="agency-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            <?php homeo_agency_display_type( $post ); ?>
            <div class="metas">
                <?php homeo_agency_display_full_location( $post ); ?>
                <?php homeo_agency_display_phone($post, 'title'); ?>
                <?php homeo_agency_display_fax($post, 'title'); ?>
                <?php homeo_agency_display_email($post, 'title'); ?>
                <?php homeo_agency_display_website($post, 'title'); ?>
            </div>
        </div>
    	
        <div class="agency-information-bottom flex-middle">
            <?php homeo_agency_display_socials($post); ?>
            <div class="ali-right">
                <a href="<?php the_permalink(); ?>" class="view-my-listings text-theme"><?php esc_html_e('View More', 'homeo'); ?><i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
</article><!-- #post-## -->

<?php do_action( 'wp_realestate_after_agency_content', $post->ID ); ?>