<?php
if ( isset($gallery_details[ 'pagination' ][ 'status' ]) && $total_page > 1 ) {
    if ( $gallery_details[ 'pagination' ][ 'type' ] == 'page_numbers' ) {
        $pagination_layout_class = isset($gallery_details[ 'pagination' ][ 'pagination_layout' ]) ? 'eg-pagination-' . esc_attr($gallery_details[ 'pagination' ][ 'pagination_layout' ]) : 'eg-pagination-layout-1';
        $upper_limit = ($total_page <= 5) ? $total_page : 5;
        ?>
        <div class="eg-pagination-block <?php echo $pagination_layout_class; ?>">
            <ul>
                <?php /*   <li style="display:none;" class="eg-previous-page-wrap"><a href="javascript:void(0);" data-page-number="0" class="eg-previous-page" data-layout-type="<?php echo $gallery_details[ 'layout' ][ 'layout_type' ]; ?>" data-gallery-id="<?php echo $gallery_row[ 'gallery_id' ]; ?>">&lt;</a></li> */ ?>
                <?php
                for ( $i = 1; $i <= $upper_limit; $i++ ) {
                    ?>
                    <li><a href="javascript:void(0);" data-total-page="<?php echo $total_page; ?>" data-page-number="<?php echo $i; ?>" class= "<?php echo ($i == 1) ? 'eg-current-page' : ''; ?> eg-page-link" data-layout-type="<?php echo $gallery_details[ 'layout' ][ 'layout_type' ]; ?>" data-gallery-id="<?php echo $gallery_row[ 'gallery_id' ]; ?>"><?php echo $i; ?></a></li>
                    <?php
                }
                ?>
                <li class="eg-next-page-wrap"><a href="javascript:void(0);" data-total-page="<?php echo $total_page; ?>" data-page-number="2" class="eg-next-page" data-layout-type="<?php echo $gallery_details[ 'layout' ][ 'layout_type' ]; ?>" data-gallery-id="<?php echo $gallery_row[ 'gallery_id' ]; ?>">&gt;</a></li>
            </ul>
            <img src="<?php echo EG_IMG_DIR . 'ajax-loader-add.gif'; ?>" class="eg-ajax-loader" style="display:none;"/>
        </div>
        <?php
    } else {
        $load_more_layout_class = isset($gallery_details[ 'pagination' ][ 'load_more' ][ 'load_more_layout' ]) ? 'eg-load-more-' . esc_attr($gallery_details[ 'pagination' ][ 'load_more' ][ 'load_more_layout' ]) : 'eg-load-more-layout-1';
        ?>
        <div class="eg-load-more-block <?php echo $load_more_layout_class; ?>">
            <a class="eg-load-more-trigger" href="javascript:void(0);"
               data-page-number="1"
               data-layout-type="<?php echo $gallery_details[ 'layout' ][ 'layout_type' ]; ?>"
               data-gallery-id="<?php echo $gallery_row[ 'gallery_id' ]; ?>"
               data-total-page="<?php echo $total_page; ?>"
               >
                   <?php echo ($gallery_details[ 'pagination' ][ 'load_more' ][ 'text' ] != '') ? esc_attr($gallery_details[ 'pagination' ][ 'load_more' ][ 'text' ]) : __('Load More', 'everest-gallery'); ?>
            </a>
            <?php $loader = isset($gallery_details[ 'pagination' ][ 'load_more' ][ 'loader' ]) ? esc_attr($gallery_details[ 'pagination' ][ 'load_more' ][ 'loader' ]) : 'loader-1.gif'; ?>
            <img src="<?php echo EG_IMG_DIR . 'loaders/' . $loader; ?>" class="eg-ajax-loader" style="display:none;"/>
        </div>
        <?php
    }
}