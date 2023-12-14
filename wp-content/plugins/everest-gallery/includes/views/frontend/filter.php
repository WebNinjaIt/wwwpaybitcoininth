<?php
if ( isset($gallery_details[ 'filter_options' ][ 'filter_status' ], $gallery_details[ 'filter_options' ][ 'filters' ]) ) {
    $filter_layout = (isset($gallery_details[ 'filter_options' ][ 'filter_layout' ])) ? 'eg-filter-' . esc_attr($gallery_details[ 'filter_options' ][ 'filter_layout' ]) : 'eg-filter-layout-1';
    ?>
    <div class="eg-filter-wrap <?php echo $filter_layout; ?>">
        <ul>
            <?php $all_label = (isset($gallery_details[ 'filter_options' ][ 'all_label' ]) && $gallery_details[ 'filter_options' ][ 'all_label' ] != '') ? esc_attr($gallery_details[ 'filter_options' ][ 'all_label' ]) : __('All', 'everest-gallery'); ?>
            <li><a href="javascript:void(0);" class="eg-filter-trigger eg-active-filter" data-filter-key="all" data-layout-type="<?php echo esc_attr($gallery_details[ 'layout' ][ 'layout_type' ]); ?>"><?php echo $all_label; ?></a></li>
            <?php
            if ( count($gallery_details[ 'filter_options' ][ 'filters' ]) ) {
                foreach ( $gallery_details[ 'filter_options' ][ 'filters' ] as $filter_key => $filter_details ) {
                    ?>
                    <li><a href="javascript:void(0);" data-filter-key="<?php echo $filter_key; ?>" class="eg-filter-trigger" data-layout-type="<?php echo esc_attr($gallery_details[ 'layout' ][ 'layout_type' ]); ?>"><?php echo esc_attr($filter_details[ 'label' ]); ?></a></li>
                        <?php
                    }
                }
                ?>
        </ul>
    </div>
    <?php
}
?>

